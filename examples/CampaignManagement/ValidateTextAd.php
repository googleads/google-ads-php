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
use Google\Ads\GoogleAds\Lib\V2\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V2\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V2\GoogleAdsException;
use Google\Ads\GoogleAds\Util\V2\ResourceNames;
use Google\Ads\GoogleAds\V2\Common\ExpandedTextAdInfo;
use Google\Ads\GoogleAds\V2\Common\PolicyTopicEntry;
use Google\Ads\GoogleAds\V2\Enums\AdGroupAdStatusEnum\AdGroupAdStatus;
use Google\Ads\GoogleAds\V2\Enums\PolicyTopicEntryTypeEnum\PolicyTopicEntryType;
use Google\Ads\GoogleAds\V2\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V2\Errors\PolicyFindingErrorEnum\PolicyFindingError;
use Google\Ads\GoogleAds\V2\Errors\PolicyViolationErrorEnum\PolicyViolationError;
use Google\Ads\GoogleAds\V2\Resources\Ad;
use Google\Ads\GoogleAds\V2\Resources\AdGroupAd;
use Google\Ads\GoogleAds\V2\Services\AdGroupAdOperation;
use Google\ApiCore\ApiException;
use Google\Protobuf\StringValue;

/**
 * This code example shows how to use the validateOnly header to validate
 * an expanded text ad. No objects will be created, but exceptions will
 * still be thrown.
 */
class ValidateTextAd
{
    const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';
    const AD_GROUP_ID = 'INSERT_AD_GROUP_ID_HERE';

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
                $options[ArgumentNames::AD_GROUP_ID] ?: self::AD_GROUP_ID,
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
     * @param int $customerId the customer ID
     * @param int $adGroupId the ad group ID to validate the ad againts
     */
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        int $adGroupId
    ) {
        // Creates the expanded text ad info.
        $expandedTextAdInfo = new ExpandedTextAdInfo([
            'description' => new StringValue(['value' => 'Luxury Cruise to Mars']),
            'headline_part1' => new StringValue(['value' => 'Visit the Red Planet in style.']),
            'headline_part2' => new StringValue(['value' => 'Low-gravity fun for everyone!!'])
        ]);

        // Sets the expanded text ad info on an ad.
        $ad = new Ad([
            'expanded_text_ad' => $expandedTextAdInfo,
            'final_urls' => [new StringValue(['value' => 'http://www.example.com'])]
        ]);

        // Creates an ad group ad to hold the above ad.
        $adGroupAd = new AdGroupAd([
            'ad_group' => new StringValue([
                'value' => ResourceNames::forAdGroup($customerId, $adGroupId)
            ]),
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
            $response = $adGroupAdServiceClient->mutateAdGroupAds(
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
                /** @var GoogleAdsError $googleAdsError */
                if ($googleAdsError->getErrorCode()->getPolicyFindingError()
                    == PolicyFindingError::POLICY_FINDING
                    || $googleAdsError->getErrorCode()->getPolicyViolationError()
                    == PolicyViolationError::POLICY_ERROR) {
                    // Only one of PolicyFindingDetails or PolicyViolationDetails will be
                    // populated. PolicyViolationDetails is used by some ad formats, and
                    // PolicyFindingDetails by others.
                    if ($googleAdsError->getDetails()->getPolicyFindingDetails()) {
                        $details = $googleAdsError->getDetails()->getPolicyFindingDetails();
                        foreach ($details->getPolicyTopicEntries() as $entry) {
                            /** @var PolicyTopicEntry $entry */
                            printf(
                                "%d) Policy topic entry with topic '%s' and type '%s'" .
                                " was found.%s",
                                $count,
                                $entry->getTopicUnwrapped(),
                                PolicyTopicEntryType::name($entry->getType()),
                                PHP_EOL
                            );
                        }
                    } else if ($googleAdsError->getDetails()->getPolicyViolationDetails()) {
                        $details = $googleAdsError->getDetails()->getPolicyViolationDetails();
                        printf(
                            "%d) Policy violation with name '%s' and isExemptable %s" .
                            " was found.%s",
                            $count,
                            $details->getExternalPolicyName(),
                            var_export($details->getIsExemptible(), true),
                            PHP_EOL
                        );
                    }
                    $count++;
                }
            }
        }
    }
}

ValidateTextAd::main();
