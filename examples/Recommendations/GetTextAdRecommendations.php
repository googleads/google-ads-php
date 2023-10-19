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

namespace Google\Ads\GoogleAds\Examples\Recommendations;

require __DIR__ . '/../../vendor/autoload.php';

use GetOpt\GetOpt;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentNames;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentParser;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\Lib\V15\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V15\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V15\GoogleAdsException;
use Google\Ads\GoogleAds\V15\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V15\Services\GoogleAdsRow;
use Google\Ads\GoogleAds\V15\Services\SearchGoogleAdsRequest;
use Google\ApiCore\ApiException;

/** This example gets all `TEXT_AD` recommendations. */
class GetTextAdRecommendations
{
    private const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';

    private const PAGE_SIZE = 1000;

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
            // We set this value to true to show how to use GAPIC v2 source code. You can remove the
            // below line if you wish to use the old-style source code. Note that in that case, you
            // probably need to modify some parts of the code below to make it work.
            // For more information, see
            // https://developers.devsite.corp.google.com/google-ads/api/docs/client-libs/php/gapic.
            ->usingGapicV2Source(true)
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
    // [START get_text_ad_recommendations]
    public static function runExample(GoogleAdsClient $googleAdsClient, int $customerId)
    {
        $googleAdsServiceClient = $googleAdsClient->getGoogleAdsServiceClient();
        // Creates a query that retrieves recommendations for text ads.
        $query = 'SELECT recommendation.type, recommendation.campaign, '
            . 'recommendation.text_ad_recommendation '
            . 'FROM recommendation '
            . 'WHERE recommendation.type = TEXT_AD';

        // Issues a search request by specifying page size.
        $response = $googleAdsServiceClient->search(
            SearchGoogleAdsRequest::build($customerId, $query)->setPageSize(self::PAGE_SIZE)
        );

        // Iterates over all rows in all pages and prints the requested field values for
        // the recommendation in each row.
        foreach ($response->iterateAllElements() as $googleAdsRow) {
            /** @var GoogleAdsRow $googleAdsRow */
            $recommendation = $googleAdsRow->getRecommendation();
            printf(
                "Recommendation with resource name '%s' was found for campaign "
                . "with resource name '%s':%s",
                $recommendation->getResourceName(),
                $recommendation->getCampaign(),
                PHP_EOL
            );
            $recommendedAd = $recommendation->getTextAdRecommendation()->getAd();
            if (!is_null($recommendedAd->getExpandedTextAd())) {
                $recommendedExpandedTextAd = $recommendedAd->getExpandedTextAd();
                printf(
                    "\tHeadline part 1 is '%s'.%s",
                    $recommendedExpandedTextAd->getHeadlinePart1(),
                    PHP_EOL
                );
                printf(
                    "\tHeadline part 2 is '%s'.%s",
                    $recommendedExpandedTextAd->getHeadlinePart2(),
                    PHP_EOL
                );
                printf(
                    "\tDescription is '%s'%s",
                    $recommendedExpandedTextAd->getDescription(),
                    PHP_EOL
                );
            }
            if (!is_null($recommendedAd->getDisplayUrl())) {
                printf("\tDisplay URL is '%s'.%s", $recommendedAd->getDisplayUrl(), PHP_EOL);
            }
            foreach ($recommendedAd->getFinalUrls() as $finalUrl) {
                /** @var string $finalUrl */
                printf("\tFinal URL is '%s'.%s", $finalUrl, PHP_EOL);
            }
            foreach ($recommendedAd->getFinalMobileUrls() as $finalMobileUrl) {
                /** @var string $finalMobileUrl */
                printf("\tFinal Mobile URL is '%s'.%s", $finalMobileUrl, PHP_EOL);
            }
        }
    }
    // [END get_text_ad_recommendations]
}

GetTextAdRecommendations::main();
