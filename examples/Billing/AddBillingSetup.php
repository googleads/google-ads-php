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

namespace Google\Ads\GoogleAds\Examples\Billing;

require __DIR__ . '/../../vendor/autoload.php';

use Exception;
use GetOpt\GetOpt;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentNames;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentParser;
use Google\Ads\GoogleAds\Examples\Utils\Helper;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsException;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsServerStreamDecorator;
use Google\Ads\GoogleAds\Util\V18\ResourceNames;
use Google\Ads\GoogleAds\V18\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V18\Resources\BillingSetup;
use Google\Ads\GoogleAds\V18\Resources\BillingSetup\PaymentsAccountInfo;
use Google\Ads\GoogleAds\V18\Services\BillingSetupOperation;
use Google\Ads\GoogleAds\V18\Services\GoogleAdsRow;
use Google\Ads\GoogleAds\V18\Services\MutateBillingSetupRequest;
use Google\Ads\GoogleAds\V18\Services\SearchGoogleAdsStreamRequest;
use Google\ApiCore\ApiException;

/**
 * This example creates a billing setup for a customer. A billing setup is a link between
 * a payments account and a customer. The new billing setup can either reuse an existing payments
 * account, or create a new payments account with a given payments profile.
 * Billing setups are applicable for clients on monthly invoicing only. See here for details
 * about applying for monthly invoicing: https://support.google.com/google-ads/answer/2375377.
 * In the case of consolidated billing, a payments account is linked to the manager account and
 * is linked to a customer account via a billing setup.
 */
class AddBillingSetup
{
    private const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';

    // Either a payments account ID or a payments profile ID must be provided for the example
    // to run successfully. If both are provided, only the payments account ID will be used.
    // See: https://developers.google.com/google-ads/api/docs/billing/billing-setups#creating_new_billing_setups
    /**
     * Provide an existing payments account ID to link to the new billing setup. Must be
     * formatted as "1234-5678-9012-3456".
     */
    private const PAYMENTS_ACCOUNT_ID = null;
    /**
     * Alternatively, provide a payments profile ID which will be linked to a new payments
     * account and the new billing setup. Must be formatted as "1234-5678-9012".
     */
    private const PAYMENTS_PROFILE_ID = null;

    public static function main()
    {
        // Either pass the required parameters for this example on the command line, or insert them
        // into the constants above.
        $options = (new ArgumentParser())->parseCommandArguments([
            ArgumentNames::CUSTOMER_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::PAYMENTS_ACCOUNT_ID => GetOpt::OPTIONAL_ARGUMENT,
            ArgumentNames::PAYMENTS_PROFILE_ID => GetOpt::OPTIONAL_ARGUMENT
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
                $options[ArgumentNames::PAYMENTS_ACCOUNT_ID] ?: self::PAYMENTS_ACCOUNT_ID,
                $options[ArgumentNames::PAYMENTS_PROFILE_ID] ?: self::PAYMENTS_PROFILE_ID
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
     * @param string|null $paymentsAccountId optional, payments account ID to attach to the new
     *     billing setup. Must be formatted as "1234-5678-9012-3456"
     * @param string|null $paymentsProfileId optional, payments profile ID to attach to a new
     *     payments account and to the new billing setup. Must be formatted as "1234-5678-9012"
     */
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        ?string $paymentsAccountId,
        ?string $paymentsProfileId
    ) {
        // Constructs a new billing setup.
        $billingSetup = self::createBillingSetup(
            $customerId,
            $paymentsAccountId,
            $paymentsProfileId
        );
        self::setBillingSetupDateTimes($googleAdsClient, $customerId, $billingSetup);

        $billingSetupOperation = new BillingSetupOperation();
        $billingSetupOperation->setCreate($billingSetup);

        // Issues a mutate request to add the billing setup.
        $billingSetupServiceClient = $googleAdsClient->getBillingSetupServiceClient();
        $response = $billingSetupServiceClient->mutateBillingSetup(
            MutateBillingSetupRequest::build($customerId, $billingSetupOperation)
        );

        printf(
            "Added new billing setup with resource name '%s'.%s",
            $response->getResult()->getResourceName(),
            PHP_EOL
        );
    }

    /**
     * Creates and returns a new billing setup instance with complete payment details. One of
     * the payments account ID or payments profile ID must be provided.
     *
     * @param int $customerId the customer ID
     * @param string|null $paymentsAccountId optional, payments account ID to attach to the new
     *     billing setup. Must be formatted as "1234-5678-9012-3456"
     * @param string|null $paymentsProfileId optional, payments profile ID to attach to a new
     *     payments account and to the new billing setup. Must be formatted as "1234-5678-9012"
     * @return BillingSetup the created billing setup
     */
    public static function createBillingSetup(
        int $customerId,
        ?string $paymentsAccountId,
        ?string $paymentsProfileId
    ): BillingSetup {
        $billingSetup = new BillingSetup();

        // Sets the appropriate payments account field.
        if (!is_null($paymentsAccountId)) {
            // If a payments account ID has been provided, set the resource name.
            // You can list available payments accounts via the PaymentsAccountService's
            // ListPaymentsAccounts method.
            $billingSetup->setPaymentsAccount(
                ResourceNames::forPaymentsAccount($customerId, $paymentsAccountId)
            );
        } elseif (!is_null($paymentsProfileId)) {
            // Otherwise, create a new payments account by setting the payments account info.
            // See https://support.google.com/google-ads/answer/7268503 for more information about
            // payments profiles.
            $billingSetup->setPaymentsAccountInfo(new PaymentsAccountInfo([
                'payments_account_name' => 'Payments Account #' . Helper::getPrintableDatetime(),
                'payments_profile_id' => $paymentsProfileId
            ]));
        } else {
            throw new \UnexpectedValueException(
                'No payments account ID or payments profile ID is provided.' . PHP_EOL
            );
        }

        return $billingSetup;
    }

    /**
     * Sets the starting and ending date times for the new billing setup. Queries the customer's
     * account to see if there are any approved billing setups. If there are any, the new billing
     * setup starting date time is set to one day after the last. If not, the billing setup is
     * set to start immediately. The ending date is set to one day after the starting date time.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param BillingSetup $billingSetup the billing setup whose starting and ending date times
     *     will be set
     */
    public static function setBillingSetupDateTimes(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        BillingSetup $billingSetup
    ) {
        // The query to search existing approved billing setups in the end date time descending
        // order.
        // See GetBillingSetup.php for a more detailed example of how to retrieve billing setups.
        $query = 'SELECT billing_setup.end_date_time ' .
            'FROM billing_setup ' .
            'WHERE billing_setup.status = APPROVED ' .
            'ORDER BY billing_setup.end_date_time DESC';

        // Issues a search stream request.
        /** @var GoogleAdsServerStreamDecorator $stream */
        $stream = $googleAdsClient->getGoogleAdsServiceClient()->searchStream(
            SearchGoogleAdsStreamRequest::build($customerId, $query)
        );
        /** @var GoogleAdsRow $googleAdsRow */
        $googleAdsRow = $stream->iterateAllElements()->current();

        if (!is_null($googleAdsRow)) {
            // Retrieves the ending date time of the last billing setup
            $lastEndingDateTimeString = $googleAdsRow->getBillingSetup()->getEndDateTime();

            if (is_null($lastEndingDateTimeString)) {
                // A null ending date time indicates that the current billing setup is set to run
                // indefinitely. Billing setups cannot overlap, so throw an exception in this case.
                throw new Exception(
                    'Cannot set starting and ending date times for the new billing setup; the ' .
                    'latest existing billing setup is set to run indefinitely.'
                );
            }

            // Sets the new billing setup to start one day after the ending date time.
            $startDate = strtotime('+1 day', strtotime($lastEndingDateTimeString));
        } else {
            // Otherwise, the only acceptable start date time is today.
            $startDate = time();
        }
        $billingSetup->setStartDateTime(date('Y-m-d', $startDate));
        // Sets the new billing setup to end one day after the starting date time.
        $billingSetup->setEndDateTime(date('Y-m-d', strtotime('+1 day', $startDate)));
    }
}

AddBillingSetup::main();
