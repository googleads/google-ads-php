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

namespace Google\Ads\GoogleAds\Examples\AccountManagement;

require __DIR__ . '/../../vendor/autoload.php';

use GetOpt\GetOpt;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentNames;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentParser;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsException;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\V18\Enums\ChangeStatusOperationEnum\ChangeStatusOperation;
use Google\Ads\GoogleAds\V18\Enums\ChangeStatusResourceTypeEnum\ChangeStatusResourceType;
use Google\Ads\GoogleAds\V18\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V18\Resources\ChangeStatus;
use Google\Ads\GoogleAds\V18\Services\GoogleAdsRow;
use Google\Ads\GoogleAds\V18\Services\SearchGoogleAdsRequest;
use Google\ApiCore\ApiException;

/**
 * This example gets a list of which resources have been changed in your account.
 */
class GetChangeSummary
{
    private const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';

    public static function main()
    {
        // Either pass the required parameters for this example on the command line, or insert them
        // into the constants above.
        $options = (new ArgumentParser())->parseCommandArguments([
            ArgumentNames::CUSTOMER_ID => GetOpt::REQUIRED_ARGUMENT
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
                $options[ArgumentNames::CUSTOMER_ID] ?: self::CUSTOMER_ID
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
     */
    // [START get_change_summary]
    public static function runExample(GoogleAdsClient $googleAdsClient, int $customerId)
    {
        $googleAdsServiceClient = $googleAdsClient->getGoogleAdsServiceClient();
        // Creates a query to find information about changed resources in your account.
        $query = 'SELECT change_status.resource_name, '
            . 'change_status.last_change_date_time, '
            . 'change_status.resource_status, '
            . 'change_status.resource_type, '
            . 'change_status.ad_group, '
            . 'change_status.ad_group_ad, '
            . 'change_status.ad_group_bid_modifier, '
            . 'change_status.ad_group_criterion, '
            . 'change_status.ad_group_feed, '
            . 'change_status.campaign, '
            . 'change_status.campaign_criterion, '
            . 'change_status.campaign_feed, '
            . 'change_status.feed, '
            . 'change_status.feed_item '
            . 'FROM change_status '
            . 'WHERE change_status.last_change_date_time DURING LAST_14_DAYS '
            . 'ORDER BY change_status.last_change_date_time '
            . 'LIMIT 10000';

        // Issues a search request.
        $response = $googleAdsServiceClient->search(
            SearchGoogleAdsRequest::build($customerId, $query)
        );

        // Iterates over all rows in all pages and prints the requested field values for
        // the change status in each row.
        foreach ($response->iterateAllElements() as $googleAdsRow) {
            /** @var GoogleAdsRow $googleAdsRow */
            printf(
                "On %s, change status '%s' shows resource '%s' with type '%s' and status '%s'.%s",
                $googleAdsRow->getChangeStatus()->getLastChangeDateTime(),
                $googleAdsRow->getChangeStatus()->getResourceName(),
                self::getResourceNameForResourceType($googleAdsRow->getChangeStatus()),
                ChangeStatusResourceType::name(
                    $googleAdsRow->getChangeStatus()->getResourceType()
                ),
                ChangeStatusOperation::name($googleAdsRow->getChangeStatus()->getResourceStatus()),
                PHP_EOL
            );
        }
    }

    /**
     * Gets the resource name for the resource type of the change status object.
     *
     * Each returned row contains all possible changed resources, only one of which is populated
     * with the name of the changed resource. This function returns the resource name of the
     * changed resource based on the resource type.
     *
     * @param ChangeStatus $changeStatus the change status object for getting changed resource
     * @return string the name of the resource that changed
     */
    private static function getResourceNameForResourceType(
        ChangeStatus $changeStatus
    ) {
        $resourceType = $changeStatus->getResourceType();
        $resourceName = ''; // Default value for UNSPECIFIED or UNKNOWN resource type.
        switch ($resourceType) {
            case ChangeStatusResourceType::AD_GROUP:
                $resourceName = $changeStatus->getAdGroup();
                break;
            case ChangeStatusResourceType::AD_GROUP_AD:
                $resourceName = $changeStatus->getAdGroupAd();
                break;
            case ChangeStatusResourceType::AD_GROUP_BID_MODIFIER:
                $resourceName = $changeStatus->getAdGroupBidModifier();
                break;
            case ChangeStatusResourceType::AD_GROUP_CRITERION:
                $resourceName = $changeStatus->getAdGroupCriterion();
                break;
            case ChangeStatusResourceType::AD_GROUP_FEED:
                $resourceName = $changeStatus->getAdGroupFeed();
                break;
            case ChangeStatusResourceType::CAMPAIGN:
                $resourceName = $changeStatus->getCampaign();
                break;
            case ChangeStatusResourceType::CAMPAIGN_CRITERION:
                $resourceName = $changeStatus->getCampaignCriterion();
                break;
            case ChangeStatusResourceType::CAMPAIGN_FEED:
                $resourceName = $changeStatus->getCampaignFeed();
                break;
            case ChangeStatusResourceType::FEED:
                $resourceName = $changeStatus->getFeed();
                break;
            case ChangeStatusResourceType::FEED_ITEM:
                $resourceName = $changeStatus->getFeedItem();
                break;
        }

        return $resourceName;
    }
    // [END get_change_summary]
}

GetChangeSummary::main();
