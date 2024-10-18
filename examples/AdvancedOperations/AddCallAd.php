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

namespace Google\Ads\GoogleAds\Examples\AdvancedOperations;

require __DIR__ . '/../../vendor/autoload.php';

use GetOpt\GetOpt;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentNames;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentParser;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsException;
use Google\Ads\GoogleAds\Util\V18\ResourceNames;
use Google\Ads\GoogleAds\V18\Common\CallAdInfo;
use Google\Ads\GoogleAds\V18\Enums\AdGroupAdStatusEnum\AdGroupAdStatus;
use Google\Ads\GoogleAds\V18\Enums\CallConversionReportingStateEnum\CallConversionReportingState;
use Google\Ads\GoogleAds\V18\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V18\Resources\Ad;
use Google\Ads\GoogleAds\V18\Resources\AdGroupAd;
use Google\Ads\GoogleAds\V18\Services\AdGroupAdOperation;
use Google\Ads\GoogleAds\V18\Services\MutateAdGroupAdsRequest;
use Google\ApiCore\ApiException;

/**
 * This example adds a call ad to a given ad group. More information about call ads can be
 * found at https://support.google.com/google-ads/answer/6341403.
 * To get ad groups, run GetAdGroups.php.
 */
class AddCallAd
{
    private const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';
    private const AD_GROUP_ID = 'INSERT_AD_GROUP_ID_HERE';
    // Specifies the phone country code here or the default specified below will be used.
    // See supported codes at:
    // https://developers.google.com/google-ads/api/reference/data/codes-formats#expandable-17
    private const PHONE_COUNTRY = 'US';
    private const PHONE_NUMBER = 'INSERT_PHONE_NUMBER_HERE';
    // Optional: Specifies the conversion action ID to attribute call conversions to. If not set,
    // the default conversion action is used.
    private const CONVERSION_ACTION_ID = null;

    public static function main()
    {
        // Either pass the required parameters for this example on the command line, or insert them
        // into the constants above.
        $options = (new ArgumentParser())->parseCommandArguments([
            ArgumentNames::CUSTOMER_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::AD_GROUP_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::PHONE_COUNTRY => GetOpt::OPTIONAL_ARGUMENT,
            ArgumentNames::PHONE_NUMBER => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::CONVERSION_ACTION_ID => GetOpt::OPTIONAL_ARGUMENT
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
                $options[ArgumentNames::PHONE_COUNTRY] ?: self::PHONE_COUNTRY,
                $options[ArgumentNames::PHONE_NUMBER] ?: self::PHONE_NUMBER,
                $options[ArgumentNames::CONVERSION_ACTION_ID] ?: self::CONVERSION_ACTION_ID
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
     * @param int $adGroupId the ad group ID to add a call ad to
     * @param string $phoneCountry the phone country (2-letter code)
     * @param string $phoneNumber the raw phone number, e.g. '(800) 555-0100'
     * @param int|null $conversionActionId the conversion action ID to attribute conversions to
     */
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        int $adGroupId,
        string $phoneCountry,
        string $phoneNumber,
        ?int $conversionActionId
    ) {
        // Creates an ad group ad for the new ad.
        $adGroupAd = new AdGroupAd([
            'ad_group' => ResourceNames::forAdGroup($customerId, $adGroupId),
            'status' => AdGroupAdStatus::PAUSED,
            'ad' => new Ad([
                // The URL of the webpage to refer to.
                'final_urls' => ['https://www.example.com'],
                'call_ad' => new CallAdInfo([
                    // Sets basic information.
                    'business_name' => 'Google',
                    'headline1' => 'Travel',
                    'headline2' => 'Discover',
                    'description1' => 'Travel the World',
                    'description2' => 'Travel the Universe',
                    // Sets the country code and phone number of the business to call.
                    'country_code' => $phoneCountry,
                    'phone_number' => $phoneNumber,
                    // Sets the verification URL to a webpage that includes the phone number.
                    'phone_number_verification_url' => 'https://www.example.com/contact',

                    // The fields below are optional.
                    // Configures call tracking and reporting.
                    'call_tracked' => true,
                    'disable_call_conversion' => false,
                    // Sets path parts to append for display.
                    'path1' => 'services',
                    'path2' => 'travels'
                ])
            ])
        ]);

        // Sets the conversion action ID to the one provided if any.
        if (!is_null($conversionActionId)) {
            $adGroupAd->getAd()->getCallAd()->setConversionAction(
                ResourceNames::forConversionAction($customerId, $conversionActionId)
            );
            $adGroupAd->getAd()->getCallAd()->setConversionReportingState(
                CallConversionReportingState::USE_RESOURCE_LEVEL_CALL_CONVERSION_ACTION
            );
        }

        // Creates an ad group ad operation.
        $adGroupAdOperation = new AdGroupAdOperation();
        $adGroupAdOperation->setCreate($adGroupAd);

        // Issues a mutate request to add the ad group ad.
        $adGroupAdServiceClient = $googleAdsClient->getAdGroupAdServiceClient();
        $adGroupAdResponse = $adGroupAdServiceClient->mutateAdGroupAds(
            MutateAdGroupAdsRequest::build($customerId, [$adGroupAdOperation])
        );

        // Prints information about the newly created ad group ad.
        printf(
            "Created ad group ad with resource name: '%s'.%s",
            $adGroupAdResponse->getResults()[0]->getResourceName(),
            PHP_EOL
        );
    }
}

AddCallAd::main();
