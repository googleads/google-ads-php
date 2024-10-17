<?php

/**
 * Copyright 2018 Google LLC
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
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsException;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\Util\V18\ResourceNames;
use Google\Ads\GoogleAds\V18\Common\ProductBrandInfo;
use Google\Ads\GoogleAds\V18\Common\ListingDimensionInfo;
use Google\Ads\GoogleAds\V18\Common\ListingGroupInfo;
use Google\Ads\GoogleAds\V18\Common\ProductConditionInfo;
use Google\Ads\GoogleAds\V18\Enums\AdGroupCriterionStatusEnum\AdGroupCriterionStatus;
use Google\Ads\GoogleAds\V18\Enums\ListingGroupTypeEnum\ListingGroupType;
use Google\Ads\GoogleAds\V18\Enums\ProductConditionEnum\ProductCondition;
use Google\Ads\GoogleAds\V18\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V18\Resources\AdGroupCriterion;
use Google\Ads\GoogleAds\V18\Services\AdGroupCriterionOperation;
use Google\Ads\GoogleAds\V18\Services\GoogleAdsRow;
use Google\Ads\GoogleAds\V18\Services\MutateAdGroupCriteriaRequest;
use Google\Ads\GoogleAds\V18\Services\SearchGoogleAdsRequest;
use Google\ApiCore\ApiException;

/**
 * This example shows how to add a shopping listing group tree to a shopping ad group. The example
 * will optionally clear an existing listing group tree and rebuild it to include the following tree
 * structure:
 *
 * <pre>
 * ProductCanonicalCondition NEW $0.20
 * ProductCanonicalCondition USED $0.10
 * ProductCanonicalCondition null (everything else)
 *  ProductBrand CoolBrand $0.90
 *  ProductBrand CheapBrand $0.01
 *  ProductBrand null (everything else) $0.50
 * </pre>
 */
class AddShoppingProductListingGroupTree
{
    private const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';
    private const AD_GROUP_ID = 'INSERT_AD_GROUP_ID_HERE';
    private const REPLACE_EXISTING_TREE = 'INSERT_BOOLEAN_TRUE_OR_FALSE_HERE';

    public static function main()
    {
        // Either pass the required parameters for this example on the command line, or insert them
        // into the constants above.
        $options = (new ArgumentParser())->parseCommandArguments([
            ArgumentNames::CUSTOMER_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::AD_GROUP_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::REPLACE_EXISTING_TREE => GetOpt::REQUIRED_ARGUMENT
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
                $options[ArgumentNames::AD_GROUP_ID]
                    ?: self::AD_GROUP_ID,
                $options[ArgumentNames::REPLACE_EXISTING_TREE]
                    ?: self::REPLACE_EXISTING_TREE
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
     * @param int $adGroupId the ad group ID
     * @param bool $replaceExistingTree true if it should replace the existing listing group
     *     tree on the ad group, if it already exists. The example will throw a
     *     'LISTING_GROUP_ALREADY_EXISTS' error if listing group tree already exists and this option
     *     is not set to true
     */
    // [START add_shopping_product_listing_group_tree]
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        int $adGroupId,
        bool $replaceExistingTree
    ) {
        // 1) Optional: Remove the existing listing group tree, if it already exists on the ad
        // group.
        if ($replaceExistingTree === 'true') {
            self::removeListingGroupTree($googleAdsClient, $customerId, $adGroupId);
        }
        // Create a list of ad group criteria to add.
        $operations = [];

        // 2) Construct the listing group tree "root" node.

        // Subdivision node: (Root node)
        $adGroupCriterionRoot = self::createListingGroupSubdivision($customerId, $adGroupId);
        // Get the resource name that will be used for the root node.
        // This resource has not been created yet and will include the temporary ID as part of the
        // criterion ID.
        $adGroupCriterionResourceNameRoot = $adGroupCriterionRoot->getResourceName();
        $operations[] = new AdGroupCriterionOperation(['create' => $adGroupCriterionRoot]);

        // 3) Construct the listing group unit nodes for NEW, USED and other.

        // Biddable Unit node: (Condition NEW node)
        // * Product Condition: NEW
        // * CPC bid: $0.20
        $adGroupCriterionConditionNew = self::createListingGroupUnitBiddable(
            $customerId,
            $adGroupId,
            $adGroupCriterionResourceNameRoot,
            new ListingDimensionInfo([
                'product_condition' => new ProductConditionInfo(
                    ['condition' => ProductCondition::PBNEW]
                )
            ]),
            200000
        );
        $operations[] = new AdGroupCriterionOperation(['create' => $adGroupCriterionConditionNew]);

        // Biddable Unit node: (Condition USED node)
        // * Product Condition: USED
        // * CPC bid: $0.10
        $adGroupCriterionConditionUsed = self::createListingGroupUnitBiddable(
            $customerId,
            $adGroupId,
            $adGroupCriterionResourceNameRoot,
            new ListingDimensionInfo([
                'product_condition' => new ProductConditionInfo(
                    ['condition' => ProductCondition::USED]
                )
            ]),
            100000
        );
        $operations[] = new AdGroupCriterionOperation(['create' => $adGroupCriterionConditionUsed]);

        // Sub-division node: (Condition "other" node)
        // * Product Condition: (not specified)
        $adGroupCriterionConditionOther = self::createListingGroupSubdivision(
            $customerId,
            $adGroupId,
            $adGroupCriterionResourceNameRoot,
            new ListingDimensionInfo([
                // All sibling nodes must have the same dimension type, even if they don't contain a
                // bid.
                'product_condition' => new ProductConditionInfo()
            ])
        );
        $operations[] =
            new AdGroupCriterionOperation(['create' => $adGroupCriterionConditionOther]);

        // Get the resource name that will be used for the condition other node.
        // This resource has not been created yet and will include the temporary ID as part of the
        // criterion ID.
        $adGroupCriterionResourceNameConditionOther =
            $adGroupCriterionConditionOther->getResourceName();

        // 4) Construct the listing group unit nodes for CoolBrand, CheapBrand and other.

        // Biddable Unit node: (Brand CoolBrand node)
        // * Brand: CoolBrand
        // * CPC bid: $0.90
        $adGroupCriterionBrandCoolBrand = self::createListingGroupUnitBiddable(
            $customerId,
            $adGroupId,
            $adGroupCriterionResourceNameConditionOther,
            new ListingDimensionInfo([
                'product_brand' => new ProductBrandInfo(['value' => 'CoolBrand'])
            ]),
            900000
        );
        $operations[] =
            new AdGroupCriterionOperation(['create' => $adGroupCriterionBrandCoolBrand]);

        // Biddable Unit node: (Brand CheapBrand node)
        // * Brand: CheapBrand
        // * CPC bid: $0.01
        $adGroupCriterionBrandCheapBrand = self::createListingGroupUnitBiddable(
            $customerId,
            $adGroupId,
            $adGroupCriterionResourceNameConditionOther,
            new ListingDimensionInfo([
                'product_brand' => new ProductBrandInfo(['value' => 'CheapBrand'])
            ]),
            10000
        );
        $operations[] =
            new AdGroupCriterionOperation(['create' => $adGroupCriterionBrandCheapBrand]);

        // Biddable Unit node: (Brand other node)
        // * CPC bid: $0.05
        $adGroupCriterionBrandOtherBrand = self::createListingGroupUnitBiddable(
            $customerId,
            $adGroupId,
            $adGroupCriterionResourceNameConditionOther,
            new ListingDimensionInfo([
                'product_brand' => new ProductBrandInfo()
            ]),
            50000
        );
        $operations[] =
            new AdGroupCriterionOperation(['create' => $adGroupCriterionBrandOtherBrand]);

        // Issues a mutate request.
        $adGroupCriterionServiceClient = $googleAdsClient->getAdGroupCriterionServiceClient();
        $response = $adGroupCriterionServiceClient->mutateAdGroupCriteria(
            MutateAdGroupCriteriaRequest::build($customerId, $operations)
        );
        printf(
            'Added %d ad group criteria for listing group tree with the following resource '
            . 'names:%s',
            $response->getResults()->count(),
            PHP_EOL
        );
        foreach ($response->getResults() as $addedAdGroupCriterion) {
            /** @var AdGroupCriterion $addedAdGroupCriterion */
            print $addedAdGroupCriterion->getResourceName() . PHP_EOL;
        }
    }
    // [END add_shopping_product_listing_group_tree]

    /**
     * Removes all the ad group criteria that define the existing listing group tree for an ad
     * group.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param int $adGroupId the ID of ad group that the existing listing group tree will be
     *     removed from
     */
    private static function removeListingGroupTree(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        int $adGroupId
    ) {
        $googleAdsServiceClient = $googleAdsClient->getGoogleAdsServiceClient();
        // Creates a query that retrieves a listing group tree.
        $query = 'SELECT ad_group_criterion.resource_name '
            . 'FROM ad_group_criterion '
            . 'WHERE ad_group_criterion.type = LISTING_GROUP '
            . 'AND ad_group_criterion.listing_group.parent_ad_group_criterion IS NULL '
            . 'AND ad_group.id = ' . $adGroupId;

        // Issues a search request.
        $response =
            $googleAdsServiceClient->search(SearchGoogleAdsRequest::build($customerId, $query));

        $operations = [];
        // Iterates over all rows in all pages and prints the requested field values for
        // the listing group tree in each row.
        foreach ($response->iterateAllElements() as $googleAdsRow) {
            /** @var GoogleAdsRow $googleAdsRow */
            $adGroupCriterion = $googleAdsRow->getAdGroupCriterion();
            printf(
                "Found an ad group criterion with the resource name: '%s'.%s",
                $adGroupCriterion->getResourceName(),
                PHP_EOL
            );

            // Creates an ad group criterion operation.
            $adGroupCriterionOperation = new AdGroupCriterionOperation();
            $adGroupCriterionOperation->setRemove($adGroupCriterion->getResourceName());
            $operations[] = $adGroupCriterionOperation;
        }
        if (count($operations) > 0) {
            // Issues a mutate request.
            $adGroupCriterionServiceClient = $googleAdsClient->getAdGroupCriterionServiceClient();
            $response = $adGroupCriterionServiceClient->mutateAdGroupCriteria(
                MutateAdGroupCriteriaRequest::build($customerId, $operations)
            );
            printf("Removed %d ad group criteria.%s", $response->getResults()->count(), PHP_EOL);
        }
    }

    /**
     * Creates a new criterion containing a subdivision listing group node. If the parent ad group
     * criterion resource name is not specified, this method creates a root node.
     *
     * @param int $customerId the customer ID
     * @param int $adGroupId the ad group ID
     * @param string|null $parentAdGroupCriterionResourceName the resource name of the parent of
     *     this criterion. If null, this method will create a root of the tree
     * @param ListingDimensionInfo|null $listingDimensionInfo the listing dimension info to be set
     *     for this listing group. This is required for non-root subdivisions
     * @return AdGroupCriterion the ad group criterion that contains the listing group root node
     */
    private static function createListingGroupSubdivision(
        int $customerId,
        int $adGroupId,
        string $parentAdGroupCriterionResourceName = null,
        ListingDimensionInfo $listingDimensionInfo = null
    ) {
        static $tempId = 0;
        $listingGroupInfo = new ListingGroupInfo([
            // Set the type as a SUBDIVISION, which will allow the node to be the parent of
            // another sub-tree.
            'type' => ListingGroupType::SUBDIVISION
        ]);
        // If $parentAdGroupCriterionResourceName and $listingDimensionInfo are not null, create
        // a non-root division by setting its parent and case value.
        if (!is_null($parentAdGroupCriterionResourceName) && !is_null($listingDimensionInfo)) {
            // Set the ad group criterion resource name for the parent listing group.
            // This can include a temporary ID if the parent criterion is not yet created.
            $listingGroupInfo->setParentAdGroupCriterion($parentAdGroupCriterionResourceName);
            // Case values contain the listing dimension used for the node.
            $listingGroupInfo->setCaseValue($listingDimensionInfo);
        }

        $adGroupCriterion = new AdGroupCriterion([
            // The resource name the criterion will be created with. This will define the ID for the
            // ad group criterion.
            'resource_name' => ResourceNames::forAdGroupCriterion(
                $customerId,
                $adGroupId,
                // Specify a decreasing negative number as a temporary ad group criterion ID. The
                // ad group criterion will get the real ID when created on the server.
                --$tempId
            ),
            'status' => AdGroupCriterionStatus::ENABLED,
            'listing_group' => $listingGroupInfo
        ]);

        return $adGroupCriterion;
    }

    /**
     * Creates a new criterion containing a biddable unit listing group node.
     *
     * @param int $customerId the customer ID
     * @param int $adGroupId the ad group ID
     * @param string $parentAdGroupCriterionResourceName the resource name of the parent of this
     *     criterion
     * @param ListingDimensionInfo $listingDimensionInfo the listing dimension info to be set for
     *     this listing group
     * @param int $cpcBidMicros the CPC bid for items in this listing group. This value should be
     *     specified
     * @return AdGroupCriterion the ad group criterion that contains the biddable unit listing
     *     group node
     */
    private static function createListingGroupUnitBiddable(
        int $customerId,
        int $adGroupId,
        string $parentAdGroupCriterionResourceName,
        ListingDimensionInfo $listingDimensionInfo,
        int $cpcBidMicros
    ) {
        // Note: There are two approaches for creating new unit nodes:
        // (1) Set the ad group resource name on the criterion (no temporary ID required).
        // (2) Use a temporary ID to construct the criterion resource name and set it using
        // setResourceName.
        // In both cases you must set the parentAdGroupCriterionResourceName on the listing
        // group for non-root nodes.
        // This example demonstrates method (1).
        $adGroupCriterion = new AdGroupCriterion([
            // The ad group the listing group will be attached to.
            'ad_group' => ResourceNames::forAdGroup($customerId, $adGroupId),
            'status' => AdGroupCriterionStatus::ENABLED,
            'listing_group' => new ListingGroupInfo([
                // Set the type as a UNIT, which will allow the group to be biddable.
                'type' => ListingGroupType::UNIT,
                // Set the ad group criterion resource name for the parent listing group.
                // This can include a temporary ID if the parent criterion is not yet created.
                'parent_ad_group_criterion' => $parentAdGroupCriterionResourceName,
                // Case values contain the listing dimension used for the node.
                'case_value' => $listingDimensionInfo
            ]),
            // Set the bid for this listing group unit.
            // This will be used as the CPC bid for items that are included in this listing group.
            'cpc_bid_micros' => $cpcBidMicros
        ]);

        return $adGroupCriterion;
    }
}

AddShoppingProductListingGroupTree::main();
