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

namespace Google\Ads\GoogleAds\Examples\Recommendations;

require __DIR__ . '/../../vendor/autoload.php';

use GetOpt\GetOpt;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentNames;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentParser;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsException;
use Google\Ads\GoogleAds\V18\Enums\KeywordMatchTypeEnum\KeywordMatchType;
use Google\Ads\GoogleAds\V18\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V18\Resources\Recommendation;
use Google\Ads\GoogleAds\V18\Services\ApplyRecommendationOperation;
use Google\Ads\GoogleAds\V18\Services\ApplyRecommendationRequest;
use Google\Ads\GoogleAds\V18\Services\GoogleAdsRow;
use Google\Ads\GoogleAds\V18\Services\SearchGoogleAdsRequest;
use Google\ApiCore\ApiException;

/**
 * This example shows how to retrieve recommendations and apply them in a batch.
 *
 * Recommendations should be applied shortly after they're retrieved. Depending on
 * the recommendation type, a recommendation can become obsolete quickly, and
 * obsolete recommendations throw an error when applied. For more details, see:
 * https://developers.google.com/google-ads/api/docs/recommendations#take_action
 *
 * You can subscribe to certain recommendation types to apply them automatically.
 * For more details, see:
 * https://developers.google.com/google-ads/api/docs/recommendations#auto-apply
 *
 * You can also proactively generate certain recommendation
 * types during the campaign construction process. For more details see:
 * https://developers.google.com/google-ads/api/docs/recommendations#recommendations-in-campaign-construction.
 */
class DetectAndApplyRecommendations
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
    public static function runExample(GoogleAdsClient $googleAdsClient, int $customerId)
    {
        // [START detect_keyword_recommendations]
        $googleAdsServiceClient = $googleAdsClient->getGoogleAdsServiceClient();
        // Creates a query that retrieves keyword recommendations.
        $query = 'SELECT recommendation.resource_name, recommendation.campaign, '
            . 'recommendation.keyword_recommendation '
            . 'FROM recommendation '
            . 'WHERE recommendation.type = KEYWORD ';
        // Issues a search request to detect keyword recommendations that exist for the
        // customer account.
        $response =
            $googleAdsServiceClient->search(SearchGoogleAdsRequest::build($customerId, $query));

        $operations = [];
        // Iterates over all rows in all pages and prints the requested field values for
        // the recommendation in each row.
        foreach ($response->iterateAllElements() as $googleAdsRow) {
            /** @var GoogleAdsRow $googleAdsRow */
            $recommendation = $googleAdsRow->getRecommendation();
            printf(
                "Keyword recommendation with resource name '%s' was found for campaign "
                . "with resource name '%s':%s",
                $recommendation->getResourceName(),
                $recommendation->getCampaign(),
                PHP_EOL
            );
            if (!is_null($recommendation->getKeywordRecommendation())) {
                $keyword = $recommendation->getKeywordRecommendation()->getKeyword();
                printf(
                    "\tKeyword = '%s'%s\ttype = '%s'%s",
                    $keyword->getText(),
                    PHP_EOL,
                    KeywordMatchType::name($keyword->getMatchType()),
                    PHP_EOL
                );
            }
            // Creates an ApplyRecommendationOperation that will be used to apply this
            // recommendation, and adds it to the list of operations.
            $operations[] = self::buildRecommendationOperation($recommendation->getResourceName());
        }
        // [END detect_keyword_recommendations]

        // If there are operations present, send a request to apply the recommendations.
        if (empty($operations)) {
            print 'No recommendations found.' . PHP_EOL;
        } else {
            self::applyRecommendations($googleAdsClient, $customerId, $operations);
        }
    }

    /**
     * Creates a ApplyRecommendationOperation to apply the given recommendation.
     *
     * @param string $recommendationResourceName the resource name of the recommendation to apply
     * @return ApplyRecommendationOperation the created ApplyRecommendationOperation
     */
    // [START build_apply_recommendation_operation]
    private static function buildRecommendationOperation(
        string $recommendationResourceName
    ): ApplyRecommendationOperation {
        // If you have a recommendation_id instead of the resource name, you can create a resource
        // name from it like this:
        /*
        $recommendationResourceName =
            ResourceNames::forRecommendation($customerId, $recommendationId);
        */

        // Each recommendation type has optional parameters to override the recommended values.
        // This is an example to override a recommended ad when a TextAdRecommendation is applied.
        // For details, please read
        // https://developers.google.com/google-ads/api/reference/rpc/latest/ApplyRecommendationOperation.
        /*
        $overridingAd = new Ad([
            'id' => 'INSERT_AD_ID_AS_INTEGER_HERE'
        ]);
        $applyRecommendationOperation->setTextAd(new TextAdParameters(['ad' => $overridingAd]));
        */

        // Issues a mutate request to apply the recommendation.
        $applyRecommendationOperation = new ApplyRecommendationOperation();
        $applyRecommendationOperation->setResourceName($recommendationResourceName);
        return $applyRecommendationOperation;
    }
    // [END build_apply_recommendation_operation]

    /**
     * Applies a batch of recommendations.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param array $operations the list of ApplyRecommendationOperation to be sent
     */
    // [START apply_recommendation]
    private static function applyRecommendations(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        array $operations
    ): void {
        // Issues a mutate request to apply the recommendations.
        $recommendationServiceClient = $googleAdsClient->getRecommendationServiceClient();
        $response = $recommendationServiceClient->applyRecommendation(
            ApplyRecommendationRequest::build($customerId, $operations)
        );
        foreach ($response->getResults() as $appliedRecommendation) {
            /** @var Recommendation $appliedRecommendation */
            printf(
                "Applied a recommendation with resource name: '%s'.%s",
                $appliedRecommendation->getResourceName(),
                PHP_EOL
            );
        }
    }
    // [END apply_recommendation]
}

DetectAndApplyRecommendations::main();
