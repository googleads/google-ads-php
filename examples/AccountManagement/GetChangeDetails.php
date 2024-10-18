<?php

/**
 * Copyright 2020 Google LLC
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

use DateTime;
use GetOpt\GetOpt;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentNames;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentParser;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsException;
use Google\Ads\GoogleAds\Util\FieldMasks;
use Google\Ads\GoogleAds\V18\Enums\ChangeClientTypeEnum\ChangeClientType;
use Google\Ads\GoogleAds\V18\Enums\ChangeEventResourceTypeEnum\ChangeEventResourceType;
use Google\Ads\GoogleAds\V18\Enums\ResourceChangeOperationEnum\ResourceChangeOperation;
use Google\Ads\GoogleAds\V18\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V18\Services\GoogleAdsRow;
use Google\Ads\GoogleAds\V18\Services\SearchGoogleAdsRequest;
use Google\ApiCore\ApiException;
use Google\Protobuf\Internal\Message;
use Google\Protobuf\Internal\RepeatedField;

/**
 * This example gets specific details about the most recent changes in your
 * account, including which field changed and the old and new values.
 */
class GetChangeDetails
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
    // [START get_change_details]
    public static function runExample(GoogleAdsClient $googleAdsClient, int $customerId)
    {
        $googleAdsServiceClient = $googleAdsClient->getGoogleAdsServiceClient();

        // Constructs a query to find details for recent changes in your account.
        // The LIMIT clause is required for the change_event resource.
        // The maximum size is 10000, but a low limit was set here for demonstrative
        // purposes.
        // The WHERE clause on change_date_time is also required. It must specify a
        // window of at most 30 days within the past 30 days.
        $query = 'SELECT change_event.resource_name, '
            . 'change_event.change_date_time, '
            . 'change_event.change_resource_name, '
            . 'change_event.user_email, '
            . 'change_event.client_type, '
            . 'change_event.change_resource_type, '
            . 'change_event.old_resource, '
            . 'change_event.new_resource, '
            . 'change_event.resource_change_operation, '
            . 'change_event.changed_fields '
            . 'FROM change_event '
            . sprintf(
                'WHERE change_event.change_date_time <= %s ',
                date_format(new DateTime('+1 day'), 'Ymd')
            ) . sprintf(
                'AND change_event.change_date_time >= %s ',
                date_format(new DateTime('-14 days'), 'Ymd')
            ) . 'ORDER BY change_event.change_date_time DESC '
            . 'LIMIT 5';
        // Issues a search request.
        $response =
            $googleAdsServiceClient->search(SearchGoogleAdsRequest::build($customerId, $query));

        // Iterates over all rows in all pages and prints the requested field values for
        // the change event in each row.
        foreach ($response->iterateAllElements() as $googleAdsRow) {
            /** @var GoogleAdsRow $googleAdsRow */
            $changeEvent = $googleAdsRow->getChangeEvent();
            $oldResource = $changeEvent->getOldResource();
            $newResource = $changeEvent->getNewResource();

            $isResourceTypeKnown = true;
            $oldResourceEntity = null;
            $newResourceEntity = null;
            switch ($changeEvent->getChangeResourceType()) {
                case ChangeEventResourceType::AD:
                    $oldResourceEntity = $oldResource->getAd();
                    $newResourceEntity = $newResource->getAd();
                    break;
                case ChangeEventResourceType::AD_GROUP:
                    $oldResourceEntity = $oldResource->getAdGroup();
                    $newResourceEntity = $newResource->getAdGroup();
                    break;
                case ChangeEventResourceType::AD_GROUP_AD:
                    $oldResourceEntity = $oldResource->getAdGroupAd();
                    $newResourceEntity = $newResource->getAdGroupAd();
                    break;
                case ChangeEventResourceType::AD_GROUP_ASSET:
                    $oldResourceEntity = $oldResource->getAdGroupAsset();
                    $newResourceEntity = $newResource->getAdGroupAsset();
                    break;
                case ChangeEventResourceType::AD_GROUP_CRITERION:
                    $oldResourceEntity = $oldResource->getAdGroupCriterion();
                    $newResourceEntity = $newResource->getAdGroupCriterion();
                    break;
                case ChangeEventResourceType::AD_GROUP_BID_MODIFIER:
                    $oldResourceEntity = $oldResource->getAdGroupBidModifier();
                    $newResourceEntity = $newResource->getAdGroupBidModifier();
                    break;
                case ChangeEventResourceType::ASSET:
                    $oldResourceEntity = $oldResource->getAsset();
                    $newResourceEntity = $newResource->getAsset();
                    break;
                case ChangeEventResourceType::ASSET_SET:
                    $oldResourceEntity = $oldResource->getAssetSet();
                    $newResourceEntity = $newResource->getAssetSet();
                    break;
                case ChangeEventResourceType::ASSET_SET_ASSET:
                    $oldResourceEntity = $oldResource->getAssetSetAsset();
                    $newResourceEntity = $newResource->getAssetSetAsset();
                    break;
                case ChangeEventResourceType::CAMPAIGN:
                    $oldResourceEntity = $oldResource->getCampaign();
                    $newResourceEntity = $newResource->getCampaign();
                    break;
                case ChangeEventResourceType::CAMPAIGN_ASSET:
                    $oldResourceEntity = $oldResource->getCampaignAsset();
                    $newResourceEntity = $newResource->getCampaignAsset();
                    break;
                case ChangeEventResourceType::CAMPAIGN_ASSET_SET:
                    $oldResourceEntity = $oldResource->getCampaignAssetSet();
                    $newResourceEntity = $newResource->getCampaignAssetSet();
                    break;
                case ChangeEventResourceType::CAMPAIGN_BUDGET:
                    $oldResourceEntity = $oldResource->getCampaignBudget();
                    $newResourceEntity = $newResource->getCampaignBudget();
                    break;
                case ChangeEventResourceType::CAMPAIGN_CRITERION:
                    $oldResourceEntity = $oldResource->getCampaignCriterion();
                    $newResourceEntity = $newResource->getCampaignCriterion();
                    break;
                case ChangeEventResourceType::AD_GROUP_FEED:
                    $oldResourceEntity = $oldResource->getAdGroupFeed();
                    $newResourceEntity = $newResource->getAdGroupFeed();
                    break;
                case ChangeEventResourceType::CAMPAIGN_FEED:
                    $oldResourceEntity = $oldResource->getCampaignFeed();
                    $newResourceEntity = $newResource->getCampaignFeed();
                    break;
                case ChangeEventResourceType::CUSTOMER_ASSET:
                    $oldResourceEntity = $oldResource->getCustomerAsset();
                    $newResourceEntity = $newResource->getCustomerAsset();
                    break;
                case ChangeEventResourceType::FEED:
                    $oldResourceEntity = $oldResource->getFeed();
                    $newResourceEntity = $newResource->getFeed();
                    break;
                case ChangeEventResourceType::FEED_ITEM:
                    $oldResourceEntity = $oldResource->getFeedItem();
                    $newResourceEntity = $newResource->getFeedItem();
                    break;
                default:
                    $isResourceTypeKnown = false;
                    break;
            }
            if (!$isResourceTypeKnown) {
                printf(
                    "Unknown change_resource_type %s.%s",
                    ChangeEventResourceType::name($changeEvent->getChangeResourceType()),
                    PHP_EOL
                );
            }
            $resourceChangeOperation = $changeEvent->getResourceChangeOperation();
            printf(
                "On %s, user '%s' used interface '%s' to perform a(n) '%s' operation on a '%s' "
                . "with resource name '%s'.%s",
                $changeEvent->getChangeDateTime(),
                $changeEvent->getUserEmail(),
                ChangeClientType::name($changeEvent->getClientType()),
                ResourceChangeOperation::name($resourceChangeOperation),
                ChangeEventResourceType::name($changeEvent->getChangeResourceType()),
                $changeEvent->getChangeResourceName(),
                PHP_EOL
            );

            if (
                $resourceChangeOperation !== ResourceChangeOperation::CREATE
                && $resourceChangeOperation !== ResourceChangeOperation::UPDATE
            ) {
                continue;
            }
            foreach ($changeEvent->getChangedFields()->getPaths() as $path) {
                $newValueStr = self::convertToString(
                    FieldMasks::getFieldValue($path, $newResourceEntity, true)
                );
                if ($resourceChangeOperation === ResourceChangeOperation::CREATE) {
                    printf("\t'$path' set to '%s'.%s", $newValueStr, PHP_EOL);
                } elseif ($resourceChangeOperation === ResourceChangeOperation::UPDATE) {
                    printf(
                        "\t'$path' changed from '%s' to '%s'.%s",
                        self::convertToString(
                            FieldMasks::getFieldValue($path, $oldResourceEntity, true)
                        ),
                        $newValueStr,
                        PHP_EOL
                    );
                }
            }
        }
    }

    /**
     * Converts the specified value to string.
     *
     * @param mixed $value the value to be converted to string
     * @return string the value in string
     */
    private static function convertToString($value)
    {
        if (is_null($value)) {
            return 'no value';
        }
        if (gettype($value) === 'boolean') {
            return $value ? 'true' : 'false';
        } elseif (gettype($value) === 'object') {
            if (get_class($value) === RepeatedField::class) {
                $strValues = [];
                foreach (iterator_to_array($value->getIterator()) as $element) {
                    /** @type Message $element */
                    $strValues[] = $element->serializeToJsonString();
                }
                return '[' . implode(',', $strValues) . ']';
            }
            return json_encode($value);
        } else {
            return strval($value);
        }
    }
    // [END get_change_details]
}

GetChangeDetails::main();
