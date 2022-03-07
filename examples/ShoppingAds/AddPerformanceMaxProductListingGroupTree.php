<?php

/**
 * Copyright 2022 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     https://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

namespace Google\Ads\GoogleAds\Examples\ShoppingAds;

require __DIR__ . '/../../vendor/autoload.php';

use GetOpt\GetOpt;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentNames;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentParser;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\Lib\V10\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V10\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V10\GoogleAdsException;
use Google\Ads\GoogleAds\Util\V10\ResourceNames;
use Google\Ads\GoogleAds\V10\Enums\ListingGroupFilterProductConditionEnum\ListingGroupFilterProductCondition;
use Google\Ads\GoogleAds\V10\Enums\ListingGroupFilterTypeEnum\ListingGroupFilterType;
use Google\Ads\GoogleAds\V10\Enums\ListingGroupFilterVerticalEnum\ListingGroupFilterVertical;
use Google\Ads\GoogleAds\V10\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V10\Resources\AssetGroupListingGroupFilter;
use Google\Ads\GoogleAds\V10\Resources\ListingGroupFilterDimension;
use Google\Ads\GoogleAds\V10\Services\AssetGroupListingGroupFilterOperation;
use Google\Ads\GoogleAds\V10\Services\GoogleAdsRow;
use Google\Ads\GoogleAds\V10\Services\MutateGoogleAdsResponse;
use Google\Ads\GoogleAds\V10\Services\MutateOperation;
use Google\Ads\GoogleAds\V10\Services\MutateOperationResponse;
use Google\ApiCore\ApiException;
use Google\ApiCore\Serializer;

/**
 * This example shows how to add product partitions to a Performance Max retail campaign.
 *
 * For Performance Max campaigns, product partitions are represented using the
 * AssetGroupListingGroupFilter resource. This resource can be combined with itself to form a
 * hierarchy that creates a product partition tree.
 *
 * For more information about Performance Max retail campaigns, see the
 * AddPerformanceMaxRetailCampaign example.
 */
class AddPerformanceMaxProductListingGroupTree
{
    private const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';
    private const ASSET_GROUP_ID = 'INSERT_ASSET_GROUP_ID_HERE';
    // Optional: Removes the existing listing group tree from the asset group or not.
    //
    // If the current asset group already has a tree of listing group filters, and you
    // try to add a new set of listing group filters including a root filter, you'll
    // receive a 'ASSET_GROUP_LISTING_GROUP_FILTER_ERROR_MULTIPLE_ROOTS' error.
    //
    // Setting this option to true will remove the existing tree and prevent this error.
    private const REPLACE_EXISTING_TREE = false;

    // We specify temporary IDs that are specific to a single mutate request.
    // Temporary IDs are always negative and unique within one mutate request.
    private const LISTING_GROUP_ROOT_TEMPORARY_ID = -1;

    private const PAGE_SIZE = 1000;

    public static function main()
    {
        // Either pass the required parameters for this example on the command line, or insert them
        // into the constants above.
        $options = (new ArgumentParser())->parseCommandArguments([
            ArgumentNames::CUSTOMER_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::ASSET_GROUP_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::REPLACE_EXISTING_TREE => GetOpt::OPTIONAL_ARGUMENT
        ]);

        // Generate a refreshable OAuth2 credential for authentication.
        $oAuth2Credential = (new OAuth2TokenBuilder())->fromFile()->build();

        // Construct a Google Ads client configured from a properties file and the
        // OAuth2 credentials above.
        $googleAdsClient = (new GoogleAdsClientBuilder())->fromFile()
            ->withOAuth2Credential($oAuth2Credential)
            ->build();

        try {
            self::runExample(
                $googleAdsClient,
                $options[ArgumentNames::CUSTOMER_ID] ?: self::CUSTOMER_ID,
                $options[ArgumentNames::ASSET_GROUP_ID] ?: self::ASSET_GROUP_ID,
                filter_var(
                    $options[ArgumentNames::REPLACE_EXISTING_TREE]
                        ?: self::REPLACE_EXISTING_TREE,
                    FILTER_VALIDATE_BOOLEAN
                )
            );
        } catch (GoogleAdsException $googleAdsException) {
            printf(
                "Request with ID '%s' has failed.%sGoogle Ads failure details:%s",
                $googleAdsException->getRequestId(),
                PHP_EOL,
                PHP_EOL
            );
            foreach ($googleAdsException->getGoogleAdsFailure()->getErrors() as $error) {
                /** @var GoogleAdsError $error */
                printf(
                    "\t%s: %s%s",
                    $error->getErrorCode()->getErrorCode(),
                    $error->getMessage(),
                    PHP_EOL
                );
            }
            exit(1);
        } catch (ApiException $apiException) {
            printf(
                "ApiException was thrown with message '%s'.%s",
                $apiException->getMessage(),
                PHP_EOL
            );
            exit(1);
        }
    }

    /**
     * Runs the example.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param int $assetGroupId the asset group ID
     * @param bool $replaceExistingTree true if it should replace the existing listing group
     *     tree on the asset group
     */
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        int $assetGroupId,
        bool $replaceExistingTree
    ) {
        // [START add_performance_max_product_listing_group_tree_1]

        // We create all the mutate operations that manipulate a specific asset group for a specific
        // customer. The operations are used to optionally remove all asset group listing group
        // filters from the tree, and then to construct a new tree of filters. These filters can
        // have a parent-child relationship, and also include a special root that includes all
        // children.
        //
        // When creating these filters, we use temporary IDs to create the hierarchy between
        // the root listing group filter, and the subdivisions and leave nodes beneath that.
        $mutateOperations = [];
        if ($replaceExistingTree === true) {
            $existingListingGroupFilters = self::getAllExistingListingGroupFilterAssetsInAssetGroup(
                $googleAdsClient,
                $customerId,
                ResourceNames::forAssetGroup($customerId, $assetGroupId)
            );
            if (count($existingListingGroupFilters) > 0) {
                $mutateOperations = array_merge(
                    $mutateOperations,
                    // Ensures the creation of remove operations in the correct order (child listing
                    // group filters must be removed before their parents).
                    self::createMutateOperationsForRemovingListingGroupFiltersTree(
                        $existingListingGroupFilters
                    )
                );
            }
        }

        $mutateOperations[] = self::createMutateOperationForRoot(
            $customerId,
            $assetGroupId,
            self::LISTING_GROUP_ROOT_TEMPORARY_ID
        );

        // The temporary ID to be used for creating subdivisions and units.
        static $tempId = self::LISTING_GROUP_ROOT_TEMPORARY_ID - 1;

        $mutateOperations[] = self::createMutateOperationForUnit(
            $customerId,
            $assetGroupId,
            $tempId--,
            self::LISTING_GROUP_ROOT_TEMPORARY_ID,
            new ListingGroupFilterDimension([
                'product_condition' => new ListingGroupFilterDimension\ProductCondition([
                    'condition' => ListingGroupFilterProductCondition::PBNEW
                ])
            ])
        );

        $mutateOperations[] = self::createMutateOperationForUnit(
            $customerId,
            $assetGroupId,
            $tempId--,
            self::LISTING_GROUP_ROOT_TEMPORARY_ID,
            new ListingGroupFilterDimension([
                'product_condition' => new ListingGroupFilterDimension\ProductCondition([
                    'condition' => ListingGroupFilterProductCondition::USED
                ])
            ])
        );

        // We save this ID to create child nodes underneath it.
        $conditionOtherSubdivisionId = $tempId--;

        // We're calling createMutateOperationForSubdivision() because this listing group will
        // have children.
        $mutateOperations[] = self::createMutateOperationForSubdivision(
            $customerId,
            $assetGroupId,
            $conditionOtherSubdivisionId,
            self::LISTING_GROUP_ROOT_TEMPORARY_ID,
            new ListingGroupFilterDimension([
                // All sibling nodes must have the same dimension type. We use an empty
                // ProductCondition to indicate that this is an "Other" partition.
                'product_condition' => new ListingGroupFilterDimension\ProductCondition()
            ])
        );

        $mutateOperations[] = self::createMutateOperationForUnit(
            $customerId,
            $assetGroupId,
            $tempId--,
            $conditionOtherSubdivisionId,
            new ListingGroupFilterDimension([
                'product_brand' => new ListingGroupFilterDimension\ProductBrand([
                    'value' => 'CoolBrand'
                ])
            ])
        );

        $mutateOperations[] = self::createMutateOperationForUnit(
            $customerId,
            $assetGroupId,
            $tempId--,
            $conditionOtherSubdivisionId,
            new ListingGroupFilterDimension([
                'product_brand' => new ListingGroupFilterDimension\ProductBrand([
                    'value' => 'CheapBrand'
                ])
            ])
        );

        $mutateOperations[] = self::createMutateOperationForUnit(
            $customerId,
            $assetGroupId,
            $tempId--,
            $conditionOtherSubdivisionId,
            new ListingGroupFilterDimension([
                'product_brand' => new ListingGroupFilterDimension\ProductBrand()
            ])
        );

        // Issues a mutate request to create everything and prints its information.
        $googleAdsServiceClient = $googleAdsClient->getGoogleAdsServiceClient();
        $response = $googleAdsServiceClient->mutate(
            $customerId,
            $mutateOperations
        );

        self::printResponseDetails($mutateOperations, $response);
        // [END add_performance_max_product_listing_group_tree_1]
    }

    /**
     * Fetches all of the asset group listing group filters in an asset group.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param int $assetGroupResourceName the resource name of the asset group
     * @return AssetGroupListingGroupFilter[] the list of asset group listing group filters
     */
    // [START add_performance_max_product_listing_group_tree_7]
    private static function getAllExistingListingGroupFilterAssetsInAssetGroup(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        string $assetGroupResourceName
    ): array {
        $googleAdsServiceClient = $googleAdsClient->getGoogleAdsServiceClient();
        // Creates a query that retrieves asset group listing group filters.
        $query = sprintf(
            'SELECT asset_group_listing_group_filter.resource_name, '
            . 'asset_group_listing_group_filter.parent_listing_group_filter '
            . 'FROM asset_group_listing_group_filter '
            . 'WHERE asset_group_listing_group_filter.asset_group = "%s"',
            $assetGroupResourceName
        );

        // Issues a search request by specifying page size.
        $response =
            $googleAdsServiceClient->search($customerId, $query, ['pageSize' => self::PAGE_SIZE]);

        $assetGroupListingGroupFilters = [];
        // Iterates over all rows in all pages to get an asset group listing group filter.
        // The limit to the number of listing group filters permitted in a Performance
        // Max campaign can be found here:
        // https://developers.google.com/google-ads/api/docs/best-practices/system-limits.
        foreach ($response->iterateAllElements() as $googleAdsRow) {
            /** @var GoogleAdsRow $googleAdsRow */
            $assetGroupListingGroupFilters[] = $googleAdsRow->getAssetGroupListingGroupFilter();
        }
        return $assetGroupListingGroupFilters;
    }
    // [END add_performance_max_product_listing_group_tree_7]

    /**
     * Removes an existing tree of asset group listing group filters.
     *
     * Asset group listing group filters must be removed in a specific order: all of the children
     * of a filter must be removed before the filter itself, otherwise the API will return an
     * error.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param AssetGroupListingGroupFilter[] $assetGroupListingGroupFilters the existing asset
     *     group listing group filters
     * @return MutateOperation[] the list of MutateOperations to remove all listing groups
     */
    private static function createMutateOperationsForRemovingListingGroupFiltersTree(
        array $assetGroupListingGroupFilters
    ): array {
        if (empty($assetGroupListingGroupFilters)) {
            throw new \UnexpectedValueException('No listing group filters to remove');
        }

        $resourcesToListingGroupFilters = [];
        $parentsToChildren = [];
        $rootResourceName = null;
        foreach ($assetGroupListingGroupFilters as $assetGroupListingGroupFilter) {
            $resourcesToListingGroupFilters[$assetGroupListingGroupFilter->getResourceName()] =
                $assetGroupListingGroupFilter;
            // When the node has no parent, it means it's the root node, which is treated
            // differently.
            if (empty($assetGroupListingGroupFilter->getParentListingGroupFilter())) {
                if (!is_null($rootResourceName)) {
                    throw new \UnexpectedValueException('More than one root node found.');
                }
                $rootResourceName = $assetGroupListingGroupFilter->getResourceName();
                continue;
            }

            $parentResourceName = $assetGroupListingGroupFilter->getParentListingGroupFilter();
            $siblings = [];

            // Checks to see if we've already visited a sibling in this group, and fetches or
            // creates a new set as required.
            if (array_key_exists($parentResourceName, $parentsToChildren)) {
                $siblings = $parentsToChildren[$parentResourceName];
            }
            $siblings[] = $assetGroupListingGroupFilter->getResourceName();
            $parentsToChildren[$parentResourceName] = $siblings;
        }

        // [START add_performance_max_product_listing_group_tree_2]
        return self::createMutateOperationsForRemovingDescendents(
            $rootResourceName,
            $parentsToChildren
        );
        // [END add_performance_max_product_listing_group_tree_2]
    }

    /**
     * Creates a list of mutate operations that remove all the descendents of the specified
     * asset group listing group filter's resource name. The order of removal is post-order,
     * where all the children (and their children, recursively) are removed first. Then,
     * the node itself is removed.
     *
     * @param string $assetGroupListingGroupFilterResourceName the resource name of the root of
     *     listing group tree
     * @param array $parentsToChildren the map from parent resource names to children resource
     *     names
     * @return MutateOperation[] the list of MutateOperations to remove all listing groups
     */
    // [START add_performance_max_product_listing_group_tree_3]
    private static function createMutateOperationsForRemovingDescendents(
        string $assetGroupListingGroupFilterResourceName,
        array $parentsToChildren
    ): array {
        $operations = [];
        if (array_key_exists($assetGroupListingGroupFilterResourceName, $parentsToChildren)) {
            foreach ($parentsToChildren[$assetGroupListingGroupFilterResourceName] as $child) {
                $operations = array_merge(
                    $operations,
                    self::createMutateOperationsForRemovingDescendents($child, $parentsToChildren)
                );
            }
        }

        $operations[] = new MutateOperation([
            'asset_group_listing_group_filter_operation'
                => new AssetGroupListingGroupFilterOperation([
                    'remove' => $assetGroupListingGroupFilterResourceName
                ])
        ]);
        return $operations;
    }
    // [END add_performance_max_product_listing_group_tree_3]

    /**
     * Creates a mutate operation that creates a root asset group listing group filter for the
     * factory's asset group.
     *
     * The root node or partition is the default, which is displayed as "All Products".
     *
     * @param int $customerId the customer ID
     * @param int $assetGroupId the asset group ID
     * @param int $rootListingGroupId the root listing group ID
     * @return MutateOperation the mutate operation for creating the root
     */
    // [START add_performance_max_product_listing_group_tree_4]
    private static function createMutateOperationForRoot(
        int $customerId,
        int $assetGroupId,
        int $rootListingGroupId
    ): MutateOperation {
        return self::createMutateOperationForSubdivision(
            $customerId,
            $assetGroupId,
            $rootListingGroupId
        );
    }
    // [END add_performance_max_product_listing_group_tree_4]

    /**
     * Creates a mutate operation that creates a intermediate asset group listing group filter.
     *
     * @param int $customerId the customer ID
     * @param int $assetGroupId the asset group ID
     * @param int $assetGroupListingGroupFilterId the ID of the asset group listing group filter to
     *     be created
     * @param int|null $parentId the ID of the parent of asset group listing group filter to be
     *      created
     * @param ListingGroupFilterDimension|null $listingGroupFilterDimension the listing group
     *     filter dimension to associate with the asset group listing group filter
     * @return MutateOperation the mutate operation for creating a subdivision
     */
    // [START add_performance_max_product_listing_group_tree_5]
    private static function createMutateOperationForSubdivision(
        int $customerId,
        int $assetGroupId,
        int $assetGroupListingGroupFilterId,
        ?int $parentId = null,
        ?ListingGroupFilterDimension $listingGroupFilterDimension = null
    ): MutateOperation {
        $assetGroupListingGroupFilter = new AssetGroupListingGroupFilter([
            'resource_name' => ResourceNames::forAssetGroupListingGroupFilter(
                $customerId,
                $assetGroupId,
                $assetGroupListingGroupFilterId
            ),
            'asset_group' => ResourceNames::forAssetGroup($customerId, $assetGroupId),
            // Sets the type as a SUBDIVISION, which will allow the node to be the parent of
            // another sub-tree.
            'type' => ListingGroupFilterType::SUBDIVISION,
            // Because this is a Performance Max campaign for retail, we need to specify
            // that this is in the shopping vertical.
            'vertical' => ListingGroupFilterVertical::SHOPPING
        ]);
        // If $parentId and $listingGroupFilterDimension are not null, creates
        // a non-root division by setting its parent and case value.
        if (!is_null($parentId) && !is_null($listingGroupFilterDimension)) {
            $assetGroupListingGroupFilter->setParentListingGroupFilter(
                ResourceNames::forAssetGroupListingGroupFilter(
                    $customerId,
                    $assetGroupId,
                    $parentId
                )
            );
            // Case values contain the listing dimension used for the node.
            $assetGroupListingGroupFilter->setCaseValue($listingGroupFilterDimension);
        }

        return new MutateOperation([
            'asset_group_listing_group_filter_operation'
                => new AssetGroupListingGroupFilterOperation([
                    'create' => $assetGroupListingGroupFilter
                ])
        ]);
    }
    // [END add_performance_max_product_listing_group_tree_5]

    /**
     * Creates a mutate operation that creates a child asset group listing group filter (unit
     * node).
     *
     * Use this method if the filter won't have child filters. Otherwise, use
     * createMutateOperationForSubdivision().
     *
     * @param int $customerId the customer ID
     * @param int $assetGroupId the asset group ID
     * @param int $assetGroupListingGroupFilterId the ID of the asset group listing group filter to
     *     be created
     * @param int $parentId the ID of the parent of asset group listing group filter to be
     *      created
     * @param ListingGroupFilterDimension $listingGroupFilterDimension the listing group
     *     filter dimension to associate with the asset group listing group filter
     * @return MutateOperation the mutate operation for creating a unit
     */
    // [START add_performance_max_product_listing_group_tree_6]
    private static function createMutateOperationForUnit(
        int $customerId,
        int $assetGroupId,
        int $assetGroupListingGroupFilterId,
        string $parentId,
        ListingGroupFilterDimension $listingGroupFilterDimension
    ): MutateOperation {
        $assetGroupListingGroupFilter = new AssetGroupListingGroupFilter([
            'resource_name' => ResourceNames::forAssetGroupListingGroupFilter(
                $customerId,
                $assetGroupId,
                $assetGroupListingGroupFilterId
            ),
            'asset_group' => ResourceNames::forAssetGroup($customerId, $assetGroupId),
            'parent_listing_group_filter' => ResourceNames::forAssetGroupListingGroupFilter(
                $customerId,
                $assetGroupId,
                $parentId
            ),
            // Sets the type as a UNIT_INCLUDED to indicate that this asset group listing group
            // filter won't have children.
            'type' => ListingGroupFilterType::UNIT_INCLUDED,
            // Because this is a Performance Max campaign for retail, we need to specify
            // that this is in the shopping vertical.
            'vertical' => ListingGroupFilterVertical::SHOPPING,
            'case_value' => $listingGroupFilterDimension
        ]);

        return new MutateOperation([
            'asset_group_listing_group_filter_operation'
                => new AssetGroupListingGroupFilterOperation([
                    'create' => $assetGroupListingGroupFilter
                ])
        ]);
    }
    // [END add_performance_max_product_listing_group_tree_6]

    /**
     * Prints the details of a mutate google ads response. Parses the "response" oneof field name
     * and uses it to extract the new entity's name and resource name.
     *
     * @param MutateOperation[] $mutateOperations the submitted mutate operations
     * @param MutateGoogleAdsResponse $mutateGoogleAdsResponse the mutate Google Ads response
     */
    private static function printResponseDetails(
        array $mutateOperations,
        MutateGoogleAdsResponse $mutateGoogleAdsResponse
    ): void {
        $i = 0;
        foreach (
            $mutateGoogleAdsResponse->getMutateOperationResponses() as $mutateOperationResponse
        ) {
            /** @var MutateOperationResponse $mutateOperationResponse */
            if (
                $mutateOperationResponse->getResponse()
                    !== 'asset_group_listing_group_filter_result'
            ) {
                // Trims the substring "_result" from the end of the entity name.
                printf(
                    "Unsupported entity type: %s.%s",
                    substr($mutateOperationResponse->getResponse(), 0, -strlen('_result')),
                    PHP_EOL
                );
                continue;
            }

            $operation = $mutateOperations[$i]->getAssetGroupListingGroupFilterOperation();
            $getter = Serializer::getGetter($mutateOperationResponse->getResponse());
            switch ($operation->getOperation()) {
                case 'create':
                    printf(
                        "Created an asset group listing group filter with resource name: "
                         . " '%s'.%s",
                        $mutateOperationResponse->$getter()->getResourceName(),
                        PHP_EOL
                    );
                    break;
                case 'remove':
                    printf(
                        "Removed an asset group listing group filter with resource name: "
                        . " '%s'.%s",
                        $mutateOperationResponse->$getter()->getResourceName(),
                        PHP_EOL
                    );
                    break;
                default:
                    printf(
                        "Unsupported operation type: '%s'.%s",
                        $operation->getOperation(),
                        PHP_EOL
                    );
            }
            $i++;
        }
    }
}

AddPerformanceMaxProductListingGroupTree::main();
