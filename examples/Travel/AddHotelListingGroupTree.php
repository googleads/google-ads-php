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

namespace Google\Ads\GoogleAds\Examples\Travel;

require __DIR__ . '/../../vendor/autoload.php';

use GetOpt\GetOpt;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentNames;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentParser;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsException;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\Util\V18\ResourceNames;
use Google\Ads\GoogleAds\V18\Common\HotelClassInfo;
use Google\Ads\GoogleAds\V18\Common\HotelCountryRegionInfo;
use Google\Ads\GoogleAds\V18\Common\ListingDimensionInfo;
use Google\Ads\GoogleAds\V18\Common\ListingGroupInfo;
use Google\Ads\GoogleAds\V18\Enums\AdGroupStatusEnum\AdGroupStatus;
use Google\Ads\GoogleAds\V18\Enums\ListingGroupTypeEnum\ListingGroupType;
use Google\Ads\GoogleAds\V18\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V18\Resources\AdGroupCriterion;
use Google\Ads\GoogleAds\V18\Services\AdGroupCriterionOperation;
use Google\Ads\GoogleAds\V18\Services\MutateAdGroupCriteriaRequest;
use Google\ApiCore\ApiException;

/**
 * This example shows how to add a hotel listing group tree, which has two levels. The first level
 * is partitioned by the hotel class. The second level is partitioned by the country region.
 *
 * Each level is composed of two types of nodes: `UNIT` and `SUBDIVISION`.
 * `UNIT` nodes serve as a leaf node in a tree and can have bid amount set.
 * `SUBDIVISION` nodes serve as an internal node where a subtree will be built. The `SUBDIVISION`
 * node can't have bid amount set.
 * See https://developers.google.com/google-ads/api/docs/hotel-ads/overview for more information.
 *
 * Note: Only one listing group tree can be added. Attempting to add another listing group tree to
 * an ad group that already has one will fail.
 */
class AddHotelListingGroupTree
{
    private const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';
    private const AD_GROUP_ID = 'INSERT_AD_GROUP_ID_HERE';

    // Specify the CPC bid micro amount to be set on a created ad group criterion.
    // For simplicity, each ad group criterion will use the below amount equally. In practice, you
    // probably want to use different values for each ad group criterion.
    private const PERCENT_CPC_BID_MICRO_AMOUNT = 1000000;

    /**
     * @var int $nextTempId
     *
     * The next temporary criterion ID to be used, which is a negative integer.
     *
     * When creating a tree, we need to specify the parent-child relationships
     * between nodes. However, until a criterion has been created on the server
     * we do not have a criterion ID with which to refer to it.
     *
     * Instead we can specify temporary IDs that are specific to a single mutate
     * request. Once a criterion is created, it is assigned an ID as normal and
     * the temporary ID will no longer refer to it.
     */
    private static $nextTempId = -1;

    public static function main()
    {
        // Either pass the required parameters for this example on the command line, or insert them
        // into the constants above.
        $options = (new ArgumentParser())->parseCommandArguments([
            ArgumentNames::CUSTOMER_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::AD_GROUP_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::PERCENT_CPC_BID_MICRO_AMOUNT => GetOpt::OPTIONAL_ARGUMENT
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
                $options[ArgumentNames::AD_GROUP_ID] ?: self::AD_GROUP_ID,
                $options[ArgumentNames::PERCENT_CPC_BID_MICRO_AMOUNT]
                    ?: self::PERCENT_CPC_BID_MICRO_AMOUNT
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
     * @param int $percentCpcBidMicroAmount the percent CPC bid micro amount to set on created ad
     *     group criteria
     */
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        int $adGroupId,
        int $percentCpcBidMicroAmount
    ) {
        $operations = [];

        // Creates the root of the tree as a SUBDIVISION node.
        $rootResourceName =
            self::addRootNode($customerId, $adGroupId, $operations, $percentCpcBidMicroAmount);

        // Creates child nodes of level 1, partitioned by the hotel class info.
        $otherHotelResourceName = self::addLevel1Nodes(
            $customerId,
            $adGroupId,
            $rootResourceName,
            $operations,
            $percentCpcBidMicroAmount
        );

        // Creates child nodes of level 2, partitioned by the hotel country region info.
        self::addLevel2Nodes(
            $customerId,
            $adGroupId,
            $otherHotelResourceName,
            $operations,
            $percentCpcBidMicroAmount
        );

        $adGroupCriterionServiceClient = $googleAdsClient->getAdGroupCriterionServiceClient();
        $response = $adGroupCriterionServiceClient->mutateAdGroupCriteria(
            MutateAdGroupCriteriaRequest::build($customerId, $operations)
        );

        printf("Added %d listing group info entities.%s", count($response->getResults()), PHP_EOL);
        foreach ($response->getResults() as $adGroupCriterion) {
            print $adGroupCriterion->getResourceName() . PHP_EOL;
        }
    }

    /**
     * Creates the root node of the listing group tree and adds its create operation to the
     * operations list.
     *
     * @param int $customerId the customer ID
     * @param int $adGroupId the ad group ID
     * @param AdGroupCriterionOperation[] $operations the operations
     * @param int $percentCpcBidMicroAmount the CPC bid micro amount to set on created ad group
     *     criteria
     * @return string the root node's resource name
     */
    private static function addRootNode(
        int $customerId,
        int $adGroupId,
        array &$operations,
        int $percentCpcBidMicroAmount
    ) {
        // Creates the root of the tree as a SUBDIVISION node.
        $root = self::createListingGroupInfo(ListingGroupType::SUBDIVISION);
        $rootAdGroupCriterion =
            self::createAdGroupCriterion($customerId, $adGroupId, $root, $percentCpcBidMicroAmount);
        $operation = self::generateCreateOperation($rootAdGroupCriterion);
        $operations[] = $operation;

        self::$nextTempId--;
        return $rootAdGroupCriterion->getResourceName();
    }

    /**
     * Creates child nodes of level 1, partitioned by the hotel class info.
     *
     * @param int $customerId the customer ID
     * @param int $adGroupId the ad group ID
     * @param string $rootResourceName the resource name of the root node
     * @param AdGroupCriterionOperation[] $operations the operations list
     * @param int $percentCpcBidMicroAmount the CPC bid micro amount to set on created ad group
     *     criteria
     * @return string the "other hotel classes" node's resource name, which serves as a parent node
     *     for the next level
     */
    // [START add_hotel_listing_group_tree]
    private static function addLevel1Nodes(
        int $customerId,
        int $adGroupId,
        string $rootResourceName,
        array &$operations,
        int $percentCpcBidMicroAmount
    ) {
        // Creates hotel class info and dimension info for 5-star hotels.
        $fiveStarredDimensionInfo = new ListingDimensionInfo([
            'hotel_class' => new HotelClassInfo(['value' => 5])
        ]);
        // Creates listing group info for 5-star hotels as a UNIT node.
        $fiveStarredUnit = self::createListingGroupInfo(
            ListingGroupType::UNIT,
            $rootResourceName,
            $fiveStarredDimensionInfo
        );
        // Creates an ad group criterion for 5-star hotels.
        $fiveStarredAdGroupCriterion = self::createAdGroupCriterion(
            $customerId,
            $adGroupId,
            $fiveStarredUnit,
            $percentCpcBidMicroAmount
        );
        // Decrements the temp ID for the next ad group criterion.
        self::$nextTempId--;
        $operation = self::generateCreateOperation($fiveStarredAdGroupCriterion);
        $operations[] = $operation;

        // You can also create more UNIT nodes for other hotel classes by copying the above code in
        // this method and modifying the value passed to HotelClassInfo() to the value you want.
        // For instance, passing 4 instead of 5 in the above code will create a UNIT node of 4-star
        // hotels instead.

        // Creates hotel class info and dimension info for other hotel classes by *not* specifying
        // any attributes on those object.
        $othersHotelsDimensionInfo = new ListingDimensionInfo([
            'hotel_class' => new HotelClassInfo()
        ]);
        // Creates listing group info for other hotel classes as a SUBDIVISION node, which will be
        // used as a parent node for children nodes of the next level.
        $otherHotelsSubDivision = self::createListingGroupInfo(
            ListingGroupType::SUBDIVISION,
            $rootResourceName,
            $othersHotelsDimensionInfo
        );
        // Creates an ad group criterion for other hotel classes.
        $otherHotelsAdGroupCriterion = self::createAdGroupCriterion(
            $customerId,
            $adGroupId,
            $otherHotelsSubDivision,
            $percentCpcBidMicroAmount
        );
        $operation = self::generateCreateOperation($otherHotelsAdGroupCriterion);
        $operations[] = $operation;

        self::$nextTempId--;
        return $otherHotelsAdGroupCriterion->getResourceName();
    }
    // [END add_hotel_listing_group_tree]

    /**
     * Creates child nodes of level 2, partitioned by the country region.
     *
     * @param int $customerId the customer ID
     * @param int $adGroupId the ad group ID
     * @param string $parentResourceName the resource name of parent criterion for all nodes at this
     *     level
     * @param AdGroupCriterionOperation[] $operations the operations list
     * @param int $percentCpcBidMicroAmount the CPC bid micro amount to set on created ad group
     *     criteria
     */
    private static function addLevel2Nodes(
        int $customerId,
        int $adGroupId,
        string $parentResourceName,
        array &$operations,
        int $percentCpcBidMicroAmount
    ) {
        // The criterion ID for Japan is 2392.
        // See https://developers.google.com/adwords/api/docs/appendix/geotargeting for criteria ID
        // of other countries.
        $japanGeoTargetConstantId = 2392;
        $japanDimensionInfo = new ListingDimensionInfo([
            // Creates hotel country region info and dimension info for hotels in Japan.
            'hotel_country_region' => new HotelCountryRegionInfo([
                'country_region_criterion' =>
                    ResourceNames::forGeoTargetConstant($japanGeoTargetConstantId)
            ])
        ]);
        // Creates listing group info for hotels in Japan as a UNIT node.
        $japanHotelsUnit = self::createListingGroupInfo(
            ListingGroupType::UNIT,
            $parentResourceName,
            $japanDimensionInfo
        );
        // Creates an ad group criterion for hotels in Japan.
        $japanHotelsAdGroupCriterion = self::createAdGroupCriterion(
            $customerId,
            $adGroupId,
            $japanHotelsUnit,
            $percentCpcBidMicroAmount
        );
        // Decrements the temp ID for the next ad group criterion.
        self::$nextTempId--;
        $operation = self::generateCreateOperation($japanHotelsAdGroupCriterion);
        $operations[] = $operation;

        // Creates hotel class info and dimension info for hotels in other regions.
        $otherHotelRegionsDimensionInfo = new ListingDimensionInfo([
            'hotel_country_region' => new HotelCountryRegionInfo()
        ]);
        // Creates listing group info for hotels in other regions as a UNIT node.
        // The "others" node is always required for every level of the tree.
        $otherHotelRegionsUnit = self::createListingGroupInfo(
            ListingGroupType::UNIT,
            $parentResourceName,
            $otherHotelRegionsDimensionInfo
        );
        // Creates an ad group criterion for other hotel country regions.
        $otherHotelRegionsAdGroupCriterion = self::createAdGroupCriterion(
            $customerId,
            $adGroupId,
            $otherHotelRegionsUnit,
            $percentCpcBidMicroAmount
        );
        $operation = self::generateCreateOperation($otherHotelRegionsAdGroupCriterion);
        $operations[] = $operation;
    }

    /**
     * Creates the listing group info with the provided parameters.
     *
     * @param int $listingGroupType the listing group type
     * @param string|null $parentCriterionResourceName optional, the resource name of parent
     *     criterion ID of the listing group info
     * @param ListingDimensionInfo|null $caseValue optional, the dimension info for the listing
     *     group
     * @return ListingGroupInfo the created listing group info
     */
    private static function createListingGroupInfo(
        int $listingGroupType,
        string $parentCriterionResourceName = null,
        ListingDimensionInfo $caseValue = null
    ) {
        $listingGroupInfo = new ListingGroupInfo([
            'type' => $listingGroupType
        ]);
        if (!is_null($parentCriterionResourceName)) {
            $listingGroupInfo->setParentAdGroupCriterion($parentCriterionResourceName);
            $listingGroupInfo->setCaseValue($caseValue);
        }

        return $listingGroupInfo;
    }

    /**
     * Creates an ad group criterion from the provided listing group info.
     * Bid amount will be set on the created ad group criterion when listing group info type is
     * `UNIT`. Setting bid amount for `SUBDIVISION` types is not allowed.
     *
     * @param int $customerId the customer ID
     * @param int $adGroupId the ad group ID
     * @param ListingGroupInfo $listingGroupInfo the listing group info
     * @param int $percentCpcBidMicroAmount the CPC bid micro amount to set for the ad group
     *     criterion
     * @return AdGroupCriterion the created ad group criterion
     */
    private static function createAdGroupCriterion(
        int $customerId,
        int $adGroupId,
        ListingGroupInfo $listingGroupInfo,
        int $percentCpcBidMicroAmount
    ) {
        $adGroupCriterion = new AdGroupCriterion([
            'status' => AdGroupStatus::ENABLED,
            'listing_group' => $listingGroupInfo,
            'resource_name' =>
                ResourceNames::forAdGroupCriterion($customerId, $adGroupId, self::$nextTempId)
        ]);

        // Bids are valid only for UNIT nodes.
        if ($listingGroupInfo->getType() == ListingGroupType::UNIT) {
            $adGroupCriterion->setPercentCpcBidMicros($percentCpcBidMicroAmount);
        }

        return $adGroupCriterion;
    }

    /**
     * Creates an operation for creating the specified ad group criterion.
     *
     * @param AdGroupCriterion $adGroupCriterion the ad group criterion to create an operation for
     * @return AdGroupCriterionOperation the created ad group criterion operation
     */
    private static function generateCreateOperation(AdGroupCriterion $adGroupCriterion)
    {
        $operation = new AdGroupCriterionOperation();
        $operation->setCreate($adGroupCriterion);

        return $operation;
    }
}

AddHotelListingGroupTree::main();
