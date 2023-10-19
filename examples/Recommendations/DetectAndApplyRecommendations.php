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
use Google\Ads\GoogleAds\Lib\V15\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V15\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V15\GoogleAdsException;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\Lib\V15\GoogleAdsServerStreamDecorator;
use Google\Ads\GoogleAds\V15\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V15\Services\ApplyRecommendationOperation;
use Google\Ads\GoogleAds\V15\Services\ApplyRecommendationResult;
use Google\Ads\GoogleAds\V15\Services\GoogleAdsRow;
use Google\Ads\GoogleAds\V15\Services\SearchGoogleAdsStreamRequest;
use Google\ApiCore\ApiException;

/**
 * The auto-apply feature, which automatically applies recommendations as they become eligible,
 * is currently supported by the Google Ads UI but not by the Google Ads API. See
 * https://support.google.com/google-ads/answer/10279006 for more information on using auto-apply
 * in the Google Ads UI.
 *
 * This example demonstrates how an alternative can be implemented with the features that are
 * currently supported by the Google Ads API. It periodically retrieves and applies `KEYWORD`
 * recommendations with default parameters.
 */
class DetectAndApplyRecommendations
{
    private const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';

    // The maximum number of recommendations to periodically retrieve and apply.  In a real
    // application, such a limit would typically not be used.
    private const MAX_RESULT_SIZE = 2;
    // The number of times to retrieve and apply recommendations. In a real application, such a
    // limit would typically not be used.
    private const NUMBER_OF_RUNS = 3;
    // The time to wait between two runs. In a real application, this would typically be set to
    // minutes or hours instead of seconds.
    private const PERIOD_IN_SECONDS = 5;

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
    public static function runExample(GoogleAdsClient $googleAdsClient, int $customerId)
    {
        $googleAdsServiceClient = $googleAdsClient->getGoogleAdsServiceClient();
        // Creates a query that retrieves keyword recommendations.
        $query = 'SELECT recommendation.resource_name '
            . 'FROM recommendation '
            . 'WHERE recommendation.type = KEYWORD '
            . 'LIMIT ' . self::MAX_RESULT_SIZE;

        $recommendationServiceClient = $googleAdsClient->getRecommendationServiceClient();
        for ($i = 0; $i < self::NUMBER_OF_RUNS; $i++) {
            // Issues a search stream request.
            /* @var GoogleAdsServerStreamDecorator $stream */
            $stream = $googleAdsServiceClient->searchStream(
                SearchGoogleAdsStreamRequest::build($customerId, $query)
            );

            // Creates apply operations for all the recommendations found.
            $applyRecommendationOperations = [];
            foreach ($stream->iterateAllElements() as $googleAdsRow) {
                /** @var GoogleAdsRow $googleAdsRow */
                $applyRecommendationOperations[] = new ApplyRecommendationOperation([
                    'resource_name' => $googleAdsRow->getRecommendation()->getResourceName()
                ]);
            }

            if ($applyRecommendationOperations) {
                // Sends the apply recommendation request and prints information.
                $response = $recommendationServiceClient->applyRecommendation(
                    $customerId,
                    $applyRecommendationOperations
                );
                foreach ($response->getResults() as $result) {
                    /** @var ApplyRecommendationResult $result */
                    printf(
                        'Applied recommendation with resource name: "%s".%s',
                        $result->getResourceName(),
                        PHP_EOL
                    );
                }
            } else {
                print 'No recommendations were found.' . PHP_EOL;
            }
            print PHP_EOL;

            if ($i < self::NUMBER_OF_RUNS - 1) {
                printf(
                    "Waiting %d seconds before checking for additional recommendations.%s",
                    self::PERIOD_IN_SECONDS,
                    PHP_EOL
                );
                sleep(self::PERIOD_IN_SECONDS);
            }
        }
    }
}

DetectAndApplyRecommendations::main();
