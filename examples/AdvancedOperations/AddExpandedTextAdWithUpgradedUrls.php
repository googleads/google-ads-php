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

namespace Google\Ads\GoogleAds\Examples\AdvancedOperations;

require __DIR__ . '/../../vendor/autoload.php';

use GetOpt\GetOpt;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentNames;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentParser;
use Google\Ads\GoogleAds\Lib\V8\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V8\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V8\GoogleAdsException;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\V8\Common\CustomParameter;
use Google\Ads\GoogleAds\V8\Common\ExpandedTextAdInfo;
use Google\Ads\GoogleAds\V8\Enums\AdGroupAdStatusEnum\AdGroupAdStatus;
use Google\Ads\GoogleAds\V8\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V8\Resources\Ad;
use Google\Ads\GoogleAds\V8\Resources\AdGroupAd;
use Google\Ads\GoogleAds\V8\Services\AdGroupAdOperation;
use Google\Ads\GoogleAds\V8\Services\AdGroupServiceClient;
use Google\ApiCore\ApiException;

/**
 * This example demonstrates how to add expanded text ads to a given ad group.
 * To get ad groups, run GetAdGroups.php.
 */
class AddExpandedTextAdWithUpgradedUrls
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
     * @param int $adGroupId the ad group ID to add a keyword to
     */
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        int $adGroupId
    ) {
        // Creates the expanded text ad info.
        $expandedTextAdInfo = new ExpandedTextAdInfo([
            'headline_part1' => 'Luxury Cruise to Mars',
            'headline_part2' => 'Visit the Red Planet in style.',
            'description' => 'Low-gravity fun for everyone!'
        ]);

        $ad = new Ad([
            // Sets the expanded text ad info on an Ad.
            'expanded_text_ad' => $expandedTextAdInfo,
            // Specifies a list of final URLs. This field cannot be set if URL field is set. This
            // may be specified at ad and criterion levels.
            'final_urls' => [
                'http://www.example.com/cruise/space/',
                'http://www.example.com/locations/mars/'
            ],
            // Specifies a tracking URL for 3rd party tracking provider. You may specify one at
            // customer, campaign, ad group, ad or criterion levels.
            'tracking_url_template' =>
                'http://tracker.example.com/?season={_season}&promocode={_promocode}&u={lpurl}',
            // Since your tracking URL has two custom parameters, provide their values too. This can
            // be provided at campaign, ad group, ad or criterion levels.
            'url_custom_parameters' => [
                new CustomParameter(['key' => 'season', 'value' => 'christmas']),
                new CustomParameter(['key' => 'promocode', 'value' => 'NY123'])
            ]
        ]);

        // Specifies a list of final mobile URLs. This field cannot be set if URL field is set, or
        // finalUrls is unset. This may be specified at ad and criterion levels.
        /*
        $ad->setFinalMobileUrls([
            'http://mobile.example.com/cruise/space/',
            'http://mobile.example.com/locations/mars/'
        ]);
        */

        // Creates an ad group ad to hold the above ad.
        $adGroupAd = new AdGroupAd([
            'ad_group' => AdGroupServiceClient::adGroupName($customerId, $adGroupId),
            'status' => AdGroupAdStatus::PAUSED,
            'ad' => $ad
        ]);

        // Creates an ad group ad operation and add it to the operations array.
        $adGroupAdOperation = new AdGroupAdOperation();
        $adGroupAdOperation->setCreate($adGroupAd);

        // Issues a mutate request to add the ad group ads.
        $adGroupAdServiceClient = $googleAdsClient->getAdGroupAdServiceClient();
        $response = $adGroupAdServiceClient->mutateAdGroupAds($customerId, [$adGroupAdOperation]);

        foreach ($response->getResults() as $addedAdGroupAd) {
            /** @var AdGroupAd $addedAdGroupAd */
            printf(
                "Added an expanded text ad with resource name: '%s'%s",
                $addedAdGroupAd->getResourceName(),
                PHP_EOL
            );
        }
    }
}

AddExpandedTextAdWithUpgradedUrls::main();
