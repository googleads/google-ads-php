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
use Google\Ads\GoogleAds\Lib\V13\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V13\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V13\GoogleAdsException;
use Google\Ads\GoogleAds\Util\V13\ResourceNames;
use Google\Ads\GoogleAds\V13\Common\AdTextAsset;
use Google\Ads\GoogleAds\V13\Common\ResponsiveSearchAdInfo;
use Google\Ads\GoogleAds\V13\Enums\AdGroupAdStatusEnum\AdGroupAdStatus;
use Google\Ads\GoogleAds\V13\Enums\ServedAssetFieldTypeEnum\ServedAssetFieldType;
use Google\Ads\GoogleAds\V13\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V13\Resources\Ad;
use Google\Ads\GoogleAds\V13\Resources\AdGroupAd;
use Google\Ads\GoogleAds\V13\Services\AdGroupAdOperation;
use Google\ApiCore\ApiException;

/**
 * This example adds a responsive search ad to a given ad group. To get ad groups,
 * run GetAdGroups.php.
 */
class AddResponsiveSearchAd
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
     * @param int $adGroupId the ad group ID to add a responsive search ad to
     */
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        int $adGroupId
    ) {
        // Creates an ad and sets responsive search ad info.
        $ad = new Ad([
            'responsive_search_ad' => new ResponsiveSearchAdInfo([
                'headlines' => [
                    // Sets a pinning to always choose this asset for HEADLINE_1. Pinning is
                    // optional; if no pinning is set, then headlines and descriptions will be
                    // rotated and the ones that perform best will be used more often.
                    self::createAdTextAsset(
                        'Cruise to Mars #' . Helper::getShortPrintableDatetime(),
                        ServedAssetFieldType::HEADLINE_1
                    ),
                    self::createAdTextAsset('Best Space Cruise Line'),
                    self::createAdTextAsset('Experience the Stars')
                ],
                'descriptions' => [
                    self::createAdTextAsset('Buy your tickets now'),
                    self::createAdTextAsset('Visit the Red Planet')
                ],
                'path1' => 'all-inclusive',
                'path2' => 'deals'
            ]),
            'final_urls' => ['http://www.example.com']
        ]);

        // Creates an ad group ad to hold the above ad.
        $adGroupAd = new AdGroupAd([
            'ad_group' => ResourceNames::forAdGroup($customerId, $adGroupId),
            'status' => AdGroupAdStatus::PAUSED,
            'ad' => $ad
        ]);

        // Creates an ad group ad operation.
        $adGroupAdOperation = new AdGroupAdOperation();
        $adGroupAdOperation->setCreate($adGroupAd);

        // Issues a mutate request to add the ad group ad.
        $adGroupAdServiceClient = $googleAdsClient->getAdGroupAdServiceClient();
        $response = $adGroupAdServiceClient->mutateAdGroupAds($customerId, [$adGroupAdOperation]);

        $createdAdGroupAdResourceName = $response->getResults()[0]->getResourceName();
        printf(
            "Created responsive search ad with resource name '%s'.%s",
            $createdAdGroupAdResourceName,
            PHP_EOL
        );
    }

    /**
     * Creates an ad text asset with the specified text and pin field enum value.
     *
     * @param string $text the text to be set
     * @param int|null $pinField the enum value of the pin field
     * @return AdTextAsset the created ad text asset
     */
    private static function createAdTextAsset(string $text, int $pinField = null): AdTextAsset
    {
        $adTextAsset = new AdTextAsset(['text' => $text]);
        if (!is_null($pinField)) {
            $adTextAsset->setPinnedField($pinField);
        }
        return $adTextAsset;
    }
}

AddResponsiveSearchAd::main();
