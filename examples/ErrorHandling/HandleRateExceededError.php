<?php

/**
 * Copyright 2019 Google LLC
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

namespace Google\Ads\GoogleAds\Examples\ErrorHandling;

require __DIR__ . '/../../vendor/autoload.php';

use GetOpt\GetOpt;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentNames;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentParser;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsException;
use Google\Ads\GoogleAds\Util\V18\ResourceNames;
use Google\Ads\GoogleAds\V18\Common\KeywordInfo;
use Google\Ads\GoogleAds\V18\Enums\AdGroupCriterionStatusEnum\AdGroupCriterionStatus;
use Google\Ads\GoogleAds\V18\Enums\KeywordMatchTypeEnum\KeywordMatchType;
use Google\Ads\GoogleAds\V18\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V18\Errors\QuotaErrorEnum\QuotaError;
use Google\Ads\GoogleAds\V18\Resources\AdGroupCriterion;
use Google\Ads\GoogleAds\V18\Services\AdGroupCriterionOperation;
use Google\Ads\GoogleAds\V18\Services\GoogleAdsRow;
use Google\Ads\GoogleAds\V18\Services\MutateAdGroupCriteriaRequest;
use Google\ApiCore\ApiException;
use Exception;

/**
 * Handles RateExceededError in an application. This code example runs 5 requests sequentially,
 * each request attempting to validate 100 keywords. While it is unlikely that running
 * these requests would trigger a rate exceeded error, substantially increasing the
 * number of requests may have that effect. Note that this example is for illustrative
 * purposes only, and you shouldn't intentionally try to trigger a rate exceed error in your
 * application.
 */
class HandleRateExceededError
{
    private const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';
    private const AD_GROUP_ID = 'INSERT_AD_GROUP_ID_HERE';

    // Number of requests to be run.
    private const NUM_REQUESTS = 5;
    // Number of keywords to be validated in each API call.
    private const NUM_KEYWORDS = 100;
    // Number of retries to be run in case of a RateExceededError.
    private const NUM_RETRIES = 3;
    // Minimum number of seconds to wait before a retry.
    private const RETRY_SECONDS = 10;

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
     * @param int $adGroupId the ad group ID to validate keywords from
     */
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        int $adGroupId
    ) {
        // Sequentially sends the requests.
        for ($i = 0; $i < self::NUM_REQUESTS; $i++) {
            // Creates operations.
            $operations = self::createAdGroupCriterionOperations($customerId, $adGroupId, $i);

            try {
                $retryCount = 0;
                $retrySeconds = self::RETRY_SECONDS;
                while ($retryCount < self::NUM_RETRIES) {
                    try {
                        // Sends request.
                        self::requestMutateAndDisplayResult(
                            $googleAdsClient,
                            $customerId,
                            $operations
                        );
                        break;
                    } catch (GoogleAdsException $googleAdsException) {
                        $hasRateExceededError = false;
                        foreach (
                            $googleAdsException->getGoogleAdsFailure()
                                ->getErrors() as $googleAdsError
                        ) {
                            // Checks if any of the errors are QuotaError.RESOURCE_EXHAUSTED or
                            // QuotaError.RESOURCE_TEMPORARILY_EXHAUSTED.
                            if (
                                $googleAdsError->getErrorCode()->getQuotaError()
                                    == QuotaError::RESOURCE_EXHAUSTED
                                || $googleAdsError->getErrorCode()->getQuotaError()
                                    == QuotaError::RESOURCE_TEMPORARILY_EXHAUSTED
                            ) {
                                printf(
                                    'Received rate exceeded error, retry after %d seconds.%s',
                                    $retrySeconds,
                                    PHP_EOL
                                );
                                sleep($retrySeconds);
                                $hasRateExceededError = true;
                                $retryCount++;
                                // Uses an exponential back-off policy.
                                $retrySeconds *= 2;
                                break;
                            }
                        }
                        // Bubbles up when there is not RateExceededError
                        if (!$hasRateExceededError) {
                            throw $googleAdsException;
                        }
                    } finally {
                        // Bubbles up when the number of retries has already been reached.
                        if ($retryCount == self::NUM_RETRIES) {
                            throw new Exception(sprintf(
                                'Could not recover after making %d attempts.%s',
                                $retryCount,
                                PHP_EOL
                            ));
                        }
                    }
                }
            } catch (Exception $exception) {
                // Prints any unhandled exception and bubbles up.
                printf(
                    'Failed to validate keywords.%1$s%2$s%1$s',
                    PHP_EOL,
                    $exception->getMessage()
                );
                throw $exception;
            }
        }
    }

    /**
     * Creates ad group criterion operations.
     *
     * @param int $customerId the customer ID
     * @param int $adGroupId the ad group ID to link the ad group criteria to
     * @param int $reqIndex the request index
     * @return array the created ad group criterion operations
     */
    private static function createAdGroupCriterionOperations(
        int $customerId,
        int $adGroupId,
        int $reqIndex
    ) {
        $operations = [];
        for ($i = 0; $i < self::NUM_KEYWORDS; $i++) {
            // Creates a keyword info.
            $keywordInfo = new KeywordInfo([
                'text' => 'mars cruise req ' . $reqIndex . ' seed ' . $i,
                'match_type' => KeywordMatchType::EXACT
            ]);

            // Constructs an ad group criterion using the keyword text info above.
            $adGroupCriterion = new AdGroupCriterion([
                'ad_group' => ResourceNames::forAdGroup($customerId, $adGroupId),
                'status' => AdGroupCriterionStatus::ENABLED,
                'keyword' => $keywordInfo
            ]);

            // Creates an ad group criterion operation.
            $adGroupCriterionOperation = new AdGroupCriterionOperation();
            $adGroupCriterionOperation->setCreate($adGroupCriterion);
            $operations[] = $adGroupCriterionOperation;
        }
        return $operations;
    }

    /**
     * Requests a mutate of ad group criterion operations and displays the results.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param array $operations the ad group criterion operations
     */
    private static function requestMutateAndDisplayResult(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        array $operations
    ) {
        $adGroupCriterionServiceClient = $googleAdsClient->getAdGroupCriterionServiceClient();
        // Makes a validateOnly mutate request.
        $response = $adGroupCriterionServiceClient->mutateAdGroupCriteria(
            MutateAdGroupCriteriaRequest::build($customerId, $operations)
                ->setPartialFailure(false)
                ->setValidateOnly(true)
        );
        // Displays the results.
        printf(
            "Added %d ad group criteria:%s",
            $response->getResults()->count(),
            PHP_EOL
        );
        foreach ($response->getResults() as $result) {
            /** @var GoogleAdsRow $result */
            print $result->getAdGroupCriterion()->getResourceName() . PHP_EOL;
        }
    }
}

HandleRateExceededError::main();
