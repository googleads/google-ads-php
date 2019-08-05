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
use Google\Ads\GoogleAds\Lib\V2\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V2\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V2\GoogleAdsException;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\V2\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V2\Resources\Customer;
use Google\ApiCore\ApiException;
use Google\Protobuf\BoolValue;
use Google\Protobuf\StringValue;

/**
 * This example illustrates how to create a new customer under a given manager account.
 *
 * Note: this example must be run using the credentials of a Google Ads manager account. By default,
 * the new account will only be accessible via the manager account.
 */
class CreateCustomer
{
    const MANAGER_CUSTOMER_ID = 'INSERT_MANAGER_CUSTOMER_ID_HERE';

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
        $googleAdsClient = (new GoogleAdsClientBuilder())
            ->fromFile()
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
        } catch (ApiException $apiException) {
            printf(
                "ApiException was thrown with message '%s'.%s",
                $apiException->getMessage(),
                PHP_EOL
            );
        }
    }

    /**
     * Runs the example.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $managerCustomerId the manager customer ID
     */
    public static function runExample(GoogleAdsClient $googleAdsClient, int $managerCustomerId)
    {
        $customer = new Customer([
            'descriptive_name' => new StringValue(
                ['value' => 'Account created with CustomerService on ' . date('Ymd h:i:s')]
            ),
            // For a list of valid currency codes and time zones see this documentation:
            // https://developers.google.com/adwords/api/docs/appendix/codes-formats.
            'currency_code' => new StringValue(['value' => 'USD']),
            'time_zone' => new StringValue(['value' => 'America/New_York']),
            // The below values are optional. For more information about URL
            // options see: https://support.google.com/google-ads/answer/6305348.
            'tracking_url_template' => new StringValue(['value' => '{lpurl}?device={device}']),
            'final_url_suffix' => new StringValue([
                    'value' => 'keyword={keyword}&matchtype={matchtype}&adgroupid={adgroupid}'
            ]),
            'has_partners_badge' => new BoolValue(['value' => false])
        ]);

        // Issues a mutate request to create an account
        $customerServiceClient = $googleAdsClient->getCustomerServiceClient();
        $response = $customerServiceClient->createCustomerClient($managerCustomerId, $customer);

        printf(
            'Created a customer with resource name "%s" under the manager account with '
            . 'customer ID %d.%s',
            $response->getResourceName(),
            $managerCustomerId,
            PHP_EOL
        );
    }
}

CreateCustomer::main();
