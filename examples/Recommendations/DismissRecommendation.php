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
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsException;
use Google\Ads\GoogleAds\Util\V18\ResourceNames;
use Google\Ads\GoogleAds\V18\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V18\Resources\Recommendation;
use Google\Ads\GoogleAds\V18\Services\DismissRecommendationRequest;
use Google\Ads\GoogleAds\V18\Services\DismissRecommendationRequest\DismissRecommendationOperation;
use Google\ApiCore\ApiException;

/**
 * This example dismisses a given recommendation.
 */
class DismissRecommendation
{
    private const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';
    // Recommendation ID is the last alphanumeric portion of the resource name obtained from
    // ResourceNames::forRecommendation(), which has the format of
    // `customers/<customer_id>/recommendations/<recommendation_id>`.
    private const RECOMMENDATION_ID = 'INSERT_RECOMMENDATION_ID_HERE';

    public static function main()
    {
        // Either pass the required parameters for this example on the command line, or insert them
        // into the constants above.
        $options = (new ArgumentParser())->parseCommandArguments([
            ArgumentNames::CUSTOMER_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::RECOMMENDATION_ID => GetOpt::REQUIRED_ARGUMENT
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
                $options[ArgumentNames::RECOMMENDATION_ID] ?: self::RECOMMENDATION_ID
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
     * @param string $recommendationId the recommendation ID to dismiss
     */
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        string $recommendationId
    ) {
        $recommendationResourceName =
            ResourceNames::forRecommendation($customerId, $recommendationId);

        $dismissRecommendationOperation = new DismissRecommendationOperation();
        $dismissRecommendationOperation->setResourceName($recommendationResourceName);

        // Issues a mutate request to dismiss the recommendation.
        $recommendationServiceClient = $googleAdsClient->getRecommendationServiceClient();
        $response = $recommendationServiceClient->dismissRecommendation(
            DismissRecommendationRequest::build($customerId, [$dismissRecommendationOperation])
        );
        /** @var Recommendation $dismissedRecommendation */
        $dismissedRecommendation = $response->getResults()[0];

        printf(
            "Dismissed recommendation with resource name: '%s'.%s",
            $dismissedRecommendation->getResourceName(),
            PHP_EOL
        );
    }
}

DismissRecommendation::main();
