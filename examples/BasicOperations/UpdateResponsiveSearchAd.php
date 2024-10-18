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

namespace Google\Ads\GoogleAds\Examples\BasicOperations;

require __DIR__ . '/../../vendor/autoload.php';

use GetOpt\GetOpt;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentNames;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentParser;
use Google\Ads\GoogleAds\Examples\Utils\Helper;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsException;
use Google\Ads\GoogleAds\Util\FieldMasks;
use Google\Ads\GoogleAds\Util\V18\ResourceNames;
use Google\Ads\GoogleAds\V18\Common\AdTextAsset;
use Google\Ads\GoogleAds\V18\Common\ResponsiveSearchAdInfo;
use Google\Ads\GoogleAds\V18\Enums\ServedAssetFieldTypeEnum\ServedAssetFieldType;
use Google\Ads\GoogleAds\V18\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V18\Resources\Ad;
use Google\Ads\GoogleAds\V18\Services\AdOperation;
use Google\Ads\GoogleAds\V18\Services\MutateAdsRequest;
use Google\ApiCore\ApiException;

/**
 * This example updates a responsive search ad. To get responsive search ads, run
 * GetResponsiveSearchAds.php.
 */
class UpdateResponsiveSearchAd
{
    private const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';
    private const AD_ID = 'INSERT_AD_ID_HERE';

    public static function main()
    {
        // Either pass the required parameters for this example on the command line, or insert them
        // into the constants above.
        $options = (new ArgumentParser())->parseCommandArguments([
            ArgumentNames::CUSTOMER_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::AD_ID => GetOpt::REQUIRED_ARGUMENT
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
                $options[ArgumentNames::AD_ID] ?: self::AD_ID
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
     * @param int $adId the ad ID to update
     */
    // [START update_responsive_search_ad]
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        int $adId
    ) {
        // Creates an ad with the specified resource name and other changes.
        $ad = new Ad([
            'resource_name' => ResourceNames::forAd($customerId, $adId),
            'responsive_search_ad' => new ResponsiveSearchAdInfo([
                // Update some properties of the responsive search ad.
                'headlines' => [
                    new AdTextAsset([
                        'text' => 'Cruise to Pluto #' . Helper::getShortPrintableDatetime(),
                        'pinned_field' => ServedAssetFieldType::HEADLINE_1
                    ]),
                    new AdTextAsset(['text' => 'Tickets on sale now']),
                    new AdTextAsset(['text' => 'Buy your ticket now'])
                ],
                'descriptions' => [
                    new AdTextAsset(['text' => 'Best space cruise ever.']),
                    new AdTextAsset([
                        'text' => 'The most wonderful space experience you will ever have.'])
                ]
            ]),
            'final_urls' => ['http://www.example.com'],
            'final_mobile_urls' => ['http://www.example.com/mobile']
        ]);

        // Constructs an operation that will update the ad, using the FieldMasks to derive the
        // update mask. This mask tells the Google Ads API which attributes of the ad you want to
        // change.
        $adOperation = new AdOperation();
        $adOperation->setUpdate($ad);
        $adOperation->setUpdateMask(FieldMasks::allSetFieldsOf($ad));

        // Issues a mutate request to update the ad.
        $adServiceClient = $googleAdsClient->getAdServiceClient();
        $response =
            $adServiceClient->mutateAds(MutateAdsRequest::build($customerId, [$adOperation]));

        // Prints the resource name of the updated ad.
        /** @var Ad $updatedAd */
        $updatedAd = $response->getResults()[0];
        printf(
            "Updated ad with resource name: '%s'.%s",
            $updatedAd->getResourceName(),
            PHP_EOL
        );
    }
    // [END update_responsive_search_ad]
}

UpdateResponsiveSearchAd::main();
