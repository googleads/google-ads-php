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

namespace Google\Ads\GoogleAds\Examples\Misc;

require __DIR__ . '/../../vendor/autoload.php';

use GetOpt\GetOpt;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentNames;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentParser;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsException;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsServerStreamDecorator;
use Google\Ads\GoogleAds\V18\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V18\Services\GoogleAdsRow;
use Google\Ads\GoogleAds\V18\Services\SearchGoogleAdsRequest;
use Google\Ads\GoogleAds\V18\Services\SearchGoogleAdsStreamRequest;
use Google\ApiCore\ApiException;
use Google\ApiCore\ApiStatus;

/**
 * This example illustrates the use of custom client timeouts in the context of server streaming and
 * unary calls.
 *
 * For more information about the concepts, see this documentation:
 * https://grpc.io/docs/what-is-grpc/core-concepts/#rpc-life-cycle.
 */
class SetCustomClientTimeouts
{
    private const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';

    private const CLIENT_TIMEOUT_MILLIS = 5 * 60 * 1000; // 5 minutes in millis

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
        $googleAdsClient = (new GoogleAdsClientBuilder())
            ->fromFile()
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
        self::makeServerStreamingCall($googleAdsClient, $customerId);
        self::makeUnaryCall($googleAdsClient, $customerId);
    }

    /**
     * Makes a server streaming call using a custom client timeout.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     */
    // [START set_custom_client_timeouts]
    private static function makeServerStreamingCall(
        GoogleAdsClient $googleAdsClient,
        int $customerId
    ) {
        $googleAdsServiceClient = $googleAdsClient->getGoogleAdsServiceClient();
        // Creates a query that retrieves all campaign IDs.
        $query = 'SELECT campaign.id FROM campaign';

        $output = '';
        try {
            // Issues a search stream request by setting a custom client timeout.
            /** @var GoogleAdsServerStreamDecorator $stream */
            $stream = $googleAdsServiceClient->searchStream(
                SearchGoogleAdsStreamRequest::build($customerId, $query),
                [
                    // Any server streaming call has a default timeout setting. For this
                    // particular call, the default setting can be found in the following file:
                    // https://github.com/googleads/google-ads-php/blob/master/src/Google/Ads/GoogleAds/V18/Services/resources/google_ads_service_client_config.json.
                    //
                    // When making a server streaming call, an optional argument is provided and can
                    // be used to override the default timeout setting with a given value.
                    'timeoutMillis' => self::CLIENT_TIMEOUT_MILLIS
                ]
            );
            // Iterates over all rows in all messages and collects the campaign IDs.
            foreach ($stream->iterateAllElements() as $googleAdsRow) {
                /** @var GoogleAdsRow $googleAdsRow */
                $output .= ' ' . $googleAdsRow->getCampaign()->getId();
            }
            print 'The server streaming call completed before the timeout.' . PHP_EOL;
        } catch (ApiException $exception) {
            if ($exception->getStatus() === ApiStatus::DEADLINE_EXCEEDED) {
                print 'The server streaming call did not complete before the timeout.' . PHP_EOL;
            } else {
                // Bubbles up if the exception is not about timeout.
                throw $exception;
            }
        } finally {
            print 'All campaign IDs retrieved:' . ($output ?: ' None') . PHP_EOL;
        }
    }
    // [END set_custom_client_timeouts]

    /**
     * Makes an unary call using a custom client timeout.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     */
    // [START set_custom_client_timeouts_1]
    private static function makeUnaryCall(GoogleAdsClient $googleAdsClient, int $customerId)
    {
        $googleAdsServiceClient = $googleAdsClient->getGoogleAdsServiceClient();
        // Creates a query that retrieves all campaign IDs.
        $query = 'SELECT campaign.id FROM campaign';

        $output = '';
        try {
            // Issues a search request by setting a custom client timeout.
            $response = $googleAdsServiceClient->search(
                SearchGoogleAdsRequest::build($customerId, $query),
                [
                    // Any unary call is retryable and has default retry settings.
                    // Complete information about these settings can be found here:
                    // https://googleapis.github.io/gax-php/master/Google/ApiCore/RetrySettings.html.
                    // For this particular call, the default retry settings can be found in the
                    // following file:
                    // https://github.com/googleads/google-ads-php/blob/master/src/Google/Ads/GoogleAds/V18/Services/resources/google_ads_service_client_config.json.
                    //
                    // When making an unary call, an optional argument is provided and can be
                    // used to override the default retry settings with given values.
                    'retrySettings' => [
                        // Sets the maximum accumulative timeout of the call, it includes all tries.
                        'totalTimeoutMillis' => self::CLIENT_TIMEOUT_MILLIS,
                        // Sets the timeout that is used for the first try to one tenth of the
                        // maximum accumulative timeout of the call.
                        // Note: This overrides the default value and can lead to
                        // RequestError.RPC_DEADLINE_TOO_SHORT errors when too small. We recommend
                        // to do it only if necessary.
                        'initialRpcTimeoutMillis' => self::CLIENT_TIMEOUT_MILLIS / 10,
                        // Sets the maximum timeout that can be used for any given try to one fifth
                        // of the maximum accumulative timeout of the call (two times greater than
                        // the timeout that is used for the first try).
                        'maxRpcTimeoutMillis' => self::CLIENT_TIMEOUT_MILLIS / 5
                    ]
                ]
            );
            // Iterates over all rows in all messages and collects the campaign IDs.
            foreach ($response->iterateAllElements() as $googleAdsRow) {
                /** @var GoogleAdsRow $googleAdsRow */
                $output .= ' ' . $googleAdsRow->getCampaign()->getId();
            }
            print 'The unary call completed before the timeout.' . PHP_EOL;
        } catch (ApiException $exception) {
            if ($exception->getStatus() === ApiStatus::DEADLINE_EXCEEDED) {
                print 'The unary call did not complete before the timeout.' . PHP_EOL;
            } else {
                // Bubbles up if the exception is not about timeout.
                throw $exception;
            }
        } finally {
            print 'All campaign IDs retrieved:' . ($output ?: ' None') . PHP_EOL;
        }
    }
    // [END set_custom_client_timeouts_1]
}

SetCustomClientTimeouts::main();
