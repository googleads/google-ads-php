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

namespace Google\Ads\GoogleAds\Examples\AccountManagement;

require __DIR__ . '/../../vendor/autoload.php';

use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsException;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\V18\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V18\Services\ListAccessibleCustomersRequest;
use Google\ApiCore\ApiException;

/**
 * This example lists the resource names for the customers that the authenticating user has access
 * to.
 *
 * The customer IDs retrieved from the resource names can be used to set
 * the login-customer-id configuration. For more information see this
 * documentation:
 * https://developers.google.com/google-ads/api/docs/concepts/call-structure#cid
 */
class ListAccessibleCustomers
{
    public static function main()
    {
        // Generate a refreshable OAuth2 credential for authentication.
        $oAuth2Credential = (new OAuth2TokenBuilder())->fromFile()->build();

        // Construct a Google Ads client configured from a properties file and the
        // OAuth2 credentials above.
        $googleAdsClient = (new GoogleAdsClientBuilder())->fromFile()
            ->withOAuth2Credential($oAuth2Credential)
            ->build();

        try {
            self::runExample($googleAdsClient);
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
     */
    // [START list_accessible_customers]
    public static function runExample(GoogleAdsClient $googleAdsClient)
    {
        $customerServiceClient = $googleAdsClient->getCustomerServiceClient();

        // Issues a request for listing all accessible customers.
        $accessibleCustomers =
            $customerServiceClient->listAccessibleCustomers(new ListAccessibleCustomersRequest());
        print 'Total results: ' . count($accessibleCustomers->getResourceNames()) . PHP_EOL;

        // Iterates over all accessible customers' resource names and prints them.
        foreach ($accessibleCustomers->getResourceNames() as $resourceName) {
            /** @var string $resourceName */
            printf("Customer resource name: '%s'%s", $resourceName, PHP_EOL);
        }
    }
    // [END list_accessible_customers]
}

ListAccessibleCustomers::main();
