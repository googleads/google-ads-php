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

namespace Google\Ads\GoogleAds\Examples\AccountManagement;

require __DIR__ . '/../../vendor/autoload.php';

use GetOpt\GetOpt;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentNames;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentParser;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsException;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\V18\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V18\Resources\Customer;
use Google\Ads\GoogleAds\V18\Services\CreateCustomerClientRequest;
use Google\ApiCore\ApiException;

/**
 * This example illustrates how to create a new customer under a given manager account.
 *
 * Note: this example must be run using the credentials of a Google Ads manager account. By default,
 * the new account will only be accessible via the manager account.
 */
class CreateCustomer
{
    private const MANAGER_CUSTOMER_ID = 'INSERT_MANAGER_CUSTOMER_ID_HERE';

    public static function main()
    {
        // Either pass the required parameters for this example on the command line, or insert them
        // into the constants above.
        $options = (new ArgumentParser())->parseCommandArguments([
            ArgumentNames::MANAGER_CUSTOMER_ID => GetOpt::REQUIRED_ARGUMENT
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
                $options[ArgumentNames::MANAGER_CUSTOMER_ID] ?: self::MANAGER_CUSTOMER_ID
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
     * @param int $managerCustomerId the manager customer ID
     */
    // [START create_customer]
    public static function runExample(GoogleAdsClient $googleAdsClient, int $managerCustomerId)
    {
        $customer = new Customer([
            'descriptive_name' => 'Account created with CustomerService on ' . date('Ymd h:i:s'),
            // For a list of valid currency codes and time zones see this documentation:
            // https://developers.google.com/google-ads/api/reference/data/codes-formats.
            'currency_code' => 'USD',
            'time_zone' => 'America/New_York',
            // The below values are optional. For more information about URL
            // options see: https://support.google.com/google-ads/answer/6305348.
            'tracking_url_template' => '{lpurl}?device={device}',
            'final_url_suffix' => 'keyword={keyword}&matchtype={matchtype}&adgroupid={adgroupid}'
        ]);

        // Issues a mutate request to create an account
        $customerServiceClient = $googleAdsClient->getCustomerServiceClient();
        $response = $customerServiceClient->createCustomerClient(
            CreateCustomerClientRequest::build($managerCustomerId, $customer)
        );

        printf(
            'Created a customer with resource name "%s" under the manager account with '
            . 'customer ID %d.%s',
            $response->getResourceName(),
            $managerCustomerId,
            PHP_EOL
        );
    }
    // [END create_customer]
}

CreateCustomer::main();
