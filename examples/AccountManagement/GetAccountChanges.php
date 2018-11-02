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
use Google\Ads\GoogleAds\Lib\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\GoogleAdsException;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\V0\Enums\ChangeStatusResourceTypeEnum\ChangeStatusResourceType;
use Google\Ads\GoogleAds\V0\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V0\Resources\ChangeStatus;
use Google\Ads\GoogleAds\V0\Services\GoogleAdsRow;
use Google\ApiCore\ApiException;

/**
 * This example gets the changes in the account made in the last 7 days.
 */
class GetAccountChanges
{
    const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';
    const PAGE_SIZE = 1000;

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
        } catch (ApiException $apiException) {
            printf(
                "ApiException was thrown with message '%s'.%s",
                $apiException->getMessage(),
                PHP_EOL
            );
        }
    }

    /**
     * Runs the example.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the client customer ID without hyphens
     */
    public static function runExample(GoogleAdsClient $googleAdsClient, $customerId)
    {
        $googleAdsServiceClient = $googleAdsClient->getGoogleAdsServiceClient();
        // Creates a query that retrieves all change statuses.
        $query = 'SELECT change_status.resource_name, '
           . 'change_status.last_change_date_time, '
           . 'change_status.resource_type, '
           . 'change_status.campaign, '
           . 'change_status.ad_group, '
           . 'change_status.resource_status, '
           . 'change_status.ad_group_ad, '
           . 'change_status.ad_group_criterion, '
           . 'change_status.campaign_criterion '
           . 'FROM change_status '
           . 'WHERE change_status.last_change_date_time DURING LAST_7_DAYS '
           . 'ORDER BY change_status.last_change_date_time';

        // Issues a search request by specifying page size.
        $response =
            $googleAdsServiceClient->search($customerId, $query, ['pageSize' => self::PAGE_SIZE]);

        // Iterates over all rows in all pages and prints the requested field values for
        // the change status in each row.
        foreach ($response->iterateAllElements() as $googleAdsRow) {
            /** @var GoogleAdsRow $googleAdsRow */
            // Note that the resource type and resource status printed below are enum values.
            // For example, a value of 3 will be returned when the resource type is 'AD_GROUP'.
            // A mapping of enum names to values can be found in the following files:
            // * ChangeStatusResourceType.php (for resource type)
            // * ChangeStatusOperation.php (for resource status)
            printf(
                "On %s, change status '%s' shows resource '%s' with type %d and status %d.%s",
                $googleAdsRow->getChangeStatus()->getLastChangeDateTime()->getValue(),
                $googleAdsRow->getChangeStatus()->getResourceName(),
                self::getResourceNameForResourceType($googleAdsRow->getChangeStatus()),
                $googleAdsRow->getChangeStatus()->getResourceType(),
                $googleAdsRow->getChangeStatus()->getResourceStatus(),
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
                $resourceName = $changeStatus->getAdGroup()->getValue();
                break;
            case ChangeStatusResourceType::AD_GROUP_AD:
                $resourceName = $changeStatus->getAdGroupAd()->getValue();
                break;
            case ChangeStatusResourceType::AD_GROUP_CRITERION:
                $resourceName = $changeStatus->getAdGroupCriterion()->getValue();
                break;
            case ChangeStatusResourceType::CAMPAIGN:
                $resourceName = $changeStatus->getCampaign()->getValue();
                break;
            case ChangeStatusResourceType::CAMPAIGN_CRITERION:
                $resourceName = $changeStatus->getCampaignCriterion()->getValue();
                break;
        }

        return $resourceName;
    }
}

GetAccountChanges::main();
