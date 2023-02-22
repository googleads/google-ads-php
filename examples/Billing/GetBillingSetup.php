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

namespace Google\Ads\GoogleAds\Examples\Billing;

require __DIR__ . '/../../vendor/autoload.php';

use GetOpt\GetOpt;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentNames;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentParser;
use Google\Ads\GoogleAds\Lib\V13\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V13\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V13\GoogleAdsException;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\V13\Enums\BillingSetupStatusEnum\BillingSetupStatus;
use Google\Ads\GoogleAds\V13\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V13\Services\GoogleAdsRow;
use Google\ApiCore\ApiException;

/** This sample gets all BillingSetup objects available for the specified customer ID. */
class GetBillingSetup
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
    // [START get_billing_setup]
    public static function runExample(GoogleAdsClient $googleAdsClient, int $customerId)
    {
        $googleAdsServiceClient = $googleAdsClient->getGoogleAdsServiceClient();
        // Creates a query that retrieves the billing setups.
        $query = 'SELECT billing_setup.id, '
        . '  billing_setup.status, '
        . '  billing_setup.payments_account_info.payments_account_id, '
        . '  billing_setup.payments_account_info.payments_account_name, '
        . '  billing_setup.payments_account_info.payments_profile_id, '
        . '  billing_setup.payments_account_info.payments_profile_name, '
        . '  billing_setup.payments_account_info.secondary_payments_profile_id '
        . 'FROM billing_setup';

        // Issues a search request by specifying page size.
        $response =
            $googleAdsServiceClient->search($customerId, $query, ['pageSize' => self::PAGE_SIZE]);

        // Iterates over all rows in all pages and prints the requested field values for
        // the billing setup in each row.
        foreach ($response->iterateAllElements() as $googleAdsRow) {
            /** @var GoogleAdsRow $googleAdsRow */
            $paymentAccountInfo = $googleAdsRow->getBillingSetup()->getPaymentsAccountInfo();
            if (is_null($paymentAccountInfo)) {
                printf(
                    'Found the billing setup with ID %1$d, %3$s'
                    . '  status \'%2$d\' with no payment account info. %3$s',
                    $googleAdsRow->getBillingSetup()->getId(),
                    $googleAdsRow->getBillingSetup()->getStatus(),
                    PHP_EOL
                );
                continue;
            }
            printf(
                'Found the billing setup with ID %1$d, %8$s'
                . '  status \'%2$s\', %8$s'
                . '  payments account ID \'%3$s\', %8$s'
                . '  payments account name \'%4$s\', %8$s'
                . '  payments profile ID \'%5$s\', %8$s'
                . '  payments profile name \'%6$s\', %8$s'
                . '  secondary payments profile ID \'%7$s\'.%8$s',
                $googleAdsRow->getBillingSetup()->getId(),
                BillingSetupStatus::name($googleAdsRow->getBillingSetup()->getStatus()),
                $paymentAccountInfo->getPaymentsAccountId(),
                $paymentAccountInfo->getPaymentsAccountName(),
                $paymentAccountInfo->getPaymentsProfileId(),
                $paymentAccountInfo->getPaymentsProfileName(),
                $paymentAccountInfo->getSecondaryPaymentsProfileId()
                    ? $paymentAccountInfo->getSecondaryPaymentsProfileId()
                    : 'None',
                PHP_EOL
            );
        }
    }
    // [END get_billing_setup]
}

GetBillingSetup::main();
