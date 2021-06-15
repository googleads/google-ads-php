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

namespace Google\Ads\GoogleAds\Examples\CampaignManagement;

require __DIR__ . '/../../vendor/autoload.php';

use GetOpt\GetOpt;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentNames;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentParser;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\Lib\V8\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V8\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V8\GoogleAdsException;
use Google\Ads\GoogleAds\Util\V8\ResourceNames;
use Google\Ads\GoogleAds\V8\Common\ExpandedTextAdInfo;
use Google\Ads\GoogleAds\V8\Common\PolicyTopicEntry;
use Google\Ads\GoogleAds\V8\Enums\AdGroupAdStatusEnum\AdGroupAdStatus;
use Google\Ads\GoogleAds\V8\Enums\PolicyTopicEntryTypeEnum\PolicyTopicEntryType;
use Google\Ads\GoogleAds\V8\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V8\Errors\PolicyFindingErrorEnum\PolicyFindingError;
use Google\Ads\GoogleAds\V8\Resources\Ad;
use Google\Ads\GoogleAds\V8\Resources\AdGroupAd;
use Google\Ads\GoogleAds\V8\Services\AdGroupAdOperation;
use Google\ApiCore\ApiException;

/**
 * This code example shows how to use the validateOnly header to validate
 * an expanded text ad. No objects will be created, but exceptions will
 * still be thrown.
 */
class ValidateTextAd
{
    private const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';
    private const AD_GROUP_ID = 'INSERT_AD_GROUP_ID_HERE';

    public static function main()
    {
        // Either pass the required parameters for this example on the command line, or insert them
        // into the constants above.
        $options = (new ArgumentParser())->parseCommandArguments([
            ArgumentNames::CUSTOMER_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::AD_GROUP_ID => GetOpt::REQUIRED_ARGUMENT
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
                $options[ArgumentNames::AD_GROUP_ID] ?: self::AD_GROUP_ID
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
     * @param int $adGroupId the ad group ID to validate the ad against
     */
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        int $adGroupId
    ) {
        // Creates the expanded text ad info.
        $expandedTextAdInfo = new ExpandedTextAdInfo([
            'description' => 'Luxury Cruise to Mars',
            'headline_part1' => 'Visit the Red Planet in style.',
            // Adds a headline that will trigger a policy violation to demonstrate error handling.
            'headline_part2' => 'Low-gravity fun for everyone!!'
        ]);

        // Sets the expanded text ad info on an ad.
        $ad = new Ad([
            'expanded_text_ad' => $expandedTextAdInfo,
            'final_urls' => ['http://www.example.com']
        ]);

        // Creates an ad group ad to hold the above ad.
        $adGroupAd = new AdGroupAd([
            'ad_group' => ResourceNames::forAdGroup($customerId, $adGroupId),
            // Optional: Set the status.
            'status' => AdGroupAdStatus::PAUSED,
            'ad' => $ad
        ]);

        // Creates the ad group ad operation.
        $adGroupAdOperation = new AdGroupAdOperation();
        $adGroupAdOperation->setCreate($adGroupAd);
        $adGroupAdServiceClient = $googleAdsClient->getAdGroupAdServiceClient();

        try {
            // Try sending a mutate request to add the ad group ad.
            $adGroupAdServiceClient->mutateAdGroupAds(
                $customerId,
                [$adGroupAdOperation],
                ['validateOnly' => true]
            );

            // Since validation is ON, result will be null.
            printf("Expanded text ad validated successfully.%s", PHP_EOL);
        } catch (GoogleAdsException $googleAdsException) {
            // This block will be hit if there is a validation error from the server.
            printf("There were validation error(s) while adding expanded text ad.%s", PHP_EOL);

            $count = 1;
            foreach ($googleAdsException->getGoogleAdsFailure()->getErrors() as $googleAdsError) {
                // Note: Policy violation errors are returned as PolicyFindingErrors. See
                // https://developers.google.com/google-ads/api/docs/policy-exemption/overview
                // for additional details.
                /** @var GoogleAdsError $googleAdsError */
                if (
                    $googleAdsError->getErrorCode()->getPolicyFindingError() ==
                    PolicyFindingError::POLICY_FINDING
                ) {
                    if ($googleAdsError->getDetails()->getPolicyFindingDetails()) {
                        $details = $googleAdsError->getDetails()->getPolicyFindingDetails();
                        foreach ($details->getPolicyTopicEntries() as $entry) {
                            /** @var PolicyTopicEntry $entry */
                            printf(
                                "%d) Policy topic entry with topic '%s' and type '%s'" .
                                " was found.%s",
                                $count,
                                $entry->getTopic(),
                                PolicyTopicEntryType::name($entry->getType()),
                                PHP_EOL
                            );
                        }
                    }
                    $count++;
                }
            }
        }
    }
}

ValidateTextAd::main();
