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
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsException;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\V18\Common\AdTextAsset;
use Google\Ads\GoogleAds\V18\Enums\AdGroupAdStatusEnum\AdGroupAdStatus;
use Google\Ads\GoogleAds\V18\Enums\ServedAssetFieldTypeEnum\ServedAssetFieldType;
use Google\Ads\GoogleAds\V18\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V18\Services\GoogleAdsRow;
use Google\Ads\GoogleAds\V18\Services\SearchGoogleAdsRequest;
use Google\ApiCore\ApiException;
use Google\Protobuf\Internal\RepeatedField;

/**
 * This example gets non-removed responsive search ads in a specified ad group.
 * To add responsive search ads, run BasicOperations/AddResponsiveSearchAd.php.
 * To get ad groups, run BasicOperations/GetAdGroups.php.
 */
class GetResponsiveSearchAds
{
    private const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';
    // Optional: Specify an ad group ID below to restrict search to only a given ad group.
    private const AD_GROUP_ID = null;

    public static function main()
    {
        // Either pass the required parameters for this example on the command line, or insert them
        // into the constants above.
        $options = (new ArgumentParser())->parseCommandArguments([
            ArgumentNames::CUSTOMER_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::AD_GROUP_ID => GetOpt::OPTIONAL_ARGUMENT
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
     * @param int|null $adGroupId the ad group ID for which responsive search ads will be retrieved.
     *     If `null`, returns from all ad groups
     */
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        ?int $adGroupId
    ) {
        $googleAdsServiceClient = $googleAdsClient->getGoogleAdsServiceClient();

        // Creates a query that retrieves responsive search ads.
        $query =
            'SELECT ad_group.id, '
            . 'ad_group_ad.ad.id, '
            . 'ad_group_ad.ad.responsive_search_ad.headlines, '
            . 'ad_group_ad.ad.responsive_search_ad.descriptions, '
            . 'ad_group_ad.status '
            . 'FROM ad_group_ad '
            . 'WHERE ad_group_ad.ad.type = RESPONSIVE_SEARCH_AD '
            . 'AND ad_group_ad.status != "REMOVED"';
        if (!is_null($adGroupId)) {
            $query .= " AND ad_group.id = $adGroupId";
        }

        // Issues a search request.
        $response =
            $googleAdsServiceClient->search(SearchGoogleAdsRequest::build($customerId, $query));

        // Iterates over all rows in all pages and prints the requested field values for
        // the responsive search ad in each row.
        $isEmptyResult = true;
        foreach ($response->iterateAllElements() as $googleAdsRow) {
            /** @var GoogleAdsRow $googleAdsRow */
            $isEmptyResult = false;
            $ad = $googleAdsRow->getAdGroupAd()->getAd();
            printf(
                "Responsive search ad with resource name '%s' and status '%s' was found.%s",
                $ad->getResourceName(),
                AdGroupAdStatus::name($googleAdsRow->getAdGroupAd()->getStatus()),
                PHP_EOL
            );
            $responsiveSearchAdInfo = $ad->getResponsiveSearchAd();
            printf(
                'Headlines:%1$s%2$sDescriptions:%1$s%3$s%1$s',
                PHP_EOL,
                self::convertAdTextAssetsToString($responsiveSearchAdInfo->getHeadlines()),
                self::convertAdTextAssetsToString($responsiveSearchAdInfo->getDescriptions())
            );
        }
        if ($isEmptyResult) {
            print 'No responsive search ads were found.' . PHP_EOL;
        }
    }

    /**
     * Converts the list of AdTextAsset objects into a string representation.
     *
     * @param RepeatedField $assets the list of AdTextAsset objects
     * @return string the string representation of the provided list of AdTextAsset objects
     */
    private static function convertAdTextAssetsToString(RepeatedField $assets): string
    {
        $result = '';
        foreach ($assets as $asset) {
            /** @var AdTextAsset $asset */
            $result .= sprintf(
                "\t%s pinned to %s.%s",
                $asset->getText(),
                ServedAssetFieldType::name($asset->getPinnedField()),
                PHP_EOL
            );
        }
        return $result;
    }
}

GetResponsiveSearchAds::main();
