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

namespace Google\Ads\GoogleAds\Examples\Remarketing;

require __DIR__ . '/../../vendor/autoload.php';

use GetOpt\GetOpt;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentNames;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentParser;
use Google\Ads\GoogleAds\Examples\Utils\Helper;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsException;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsServerStreamDecorator;
use Google\Ads\GoogleAds\Util\V18\GoogleAdsFailures;
use Google\Ads\GoogleAds\Util\V18\ResourceNames;
use Google\Ads\GoogleAds\V18\Common\Consent;
use Google\Ads\GoogleAds\V18\Common\ItemAttribute;
use Google\Ads\GoogleAds\V18\Common\OfflineUserAddressInfo;
use Google\Ads\GoogleAds\V18\Common\StoreSalesMetadata;
use Google\Ads\GoogleAds\V18\Common\StoreSalesThirdPartyMetadata;
use Google\Ads\GoogleAds\V18\Common\TransactionAttribute;
use Google\Ads\GoogleAds\V18\Common\UserData;
use Google\Ads\GoogleAds\V18\Common\UserIdentifier;
use Google\Ads\GoogleAds\V18\Enums\ConsentStatusEnum\ConsentStatus;
use Google\Ads\GoogleAds\V18\Enums\OfflineUserDataJobFailureReasonEnum\OfflineUserDataJobFailureReason;
use Google\Ads\GoogleAds\V18\Enums\OfflineUserDataJobStatusEnum\OfflineUserDataJobStatus;
use Google\Ads\GoogleAds\V18\Enums\OfflineUserDataJobTypeEnum\OfflineUserDataJobType;
use Google\Ads\GoogleAds\V18\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V18\Resources\OfflineUserDataJob;
use Google\Ads\GoogleAds\V18\Services\AddOfflineUserDataJobOperationsRequest;
use Google\Ads\GoogleAds\V18\Services\AddOfflineUserDataJobOperationsResponse;
use Google\Ads\GoogleAds\V18\Services\Client\OfflineUserDataJobServiceClient;
use Google\Ads\GoogleAds\V18\Services\CreateOfflineUserDataJobRequest;
use Google\Ads\GoogleAds\V18\Services\CreateOfflineUserDataJobResponse;
use Google\Ads\GoogleAds\V18\Services\GoogleAdsRow;
use Google\Ads\GoogleAds\V18\Services\OfflineUserDataJobOperation;
use Google\Ads\GoogleAds\V18\Services\RunOfflineUserDataJobRequest;
use Google\Ads\GoogleAds\V18\Services\SearchGoogleAdsStreamRequest;
use Google\ApiCore\ApiException;

/**
 * Uploads offline data for store sales transactions.
 *
 * This feature is only available to allowlisted accounts. See
 * https://support.google.com/google-ads/answer/7620302 for more details.
 */
class UploadStoreSalesTransactions
{
    private const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';

    /**
     * The type of user data in the job (first or third party). If you have an official
     * store sales partnership with Google, use STORE_SALES_UPLOAD_THIRD_PARTY.
     * Otherwise, use STORE_SALES_UPLOAD_FIRST_PARTY or omit this parameter.
     */
    private const OFFLINE_USER_DATA_JOB_TYPE = 'STORE_SALES_UPLOAD_FIRST_PARTY';
    /** The ID of a store sales conversion action. */
    private const CONVERSION_ACTION_ID = 'INSERT_CONVERSION_ACTION_ID_HERE';
    /**
     * Optional (but recommended) external ID to identify the offline user data job.
     * The external ID for the offline user data job.
     */
    private const EXTERNAL_ID = null;
    /**
     * Only required after creating a custom key and custom values in the account.
     * Custom key and values are used to segment store sales conversions.
     * This measurement can be used to provide more advanced insights.
     */
    private const CUSTOM_KEY = null;

    // Optional: If uploading third party data, also specify the following values:
    /**
     * The date and time the advertiser uploaded data to the partner.
     * The date/time must be in the format "yyyy-MM-dd hh:mm:ss".
     */
    private const ADVERTISER_UPLOAD_DATE_TIME = null;
    /** The version of partner IDs to be used for uploads. */
    private const BRIDGE_MAP_VERSION_ID = null;
    /** The ID of the third party partner. */
    private const PARTNER_ID = null;
    // Optional: The consent status for ad personalization.
    private const AD_PERSONALIZATION_CONSENT = null;
    // Optional: The consent status for ad user data.
    private const AD_USER_DATA_CONSENT = null;

    // Optional: Below constants are only required if uploading with item attributes.
    /**
     * Specify a unique identifier of a product, either the Merchant Center
     * Item ID or Global Trade Item Number (GTIN).
     */
    private const ITEM_ID = null;
    /**
     * Specify a Merchant Center Account ID.
     */
    private const MERCHANT_CENTER_ACCOUNT_ID = null;
    /**
     * Specify a two-letter country code of the location associated with the
     * feed where your items are uploaded.
     * For a list of country codes see:
     * https://developers.google.com/google-ads/api/reference/data/codes-formats#expandable-16
     */
    private const COUNTRY_CODE = null;
    /**
     * Specify a two-letter language code of the language associated with
     * the feed where your items are uploaded.
     * For a list of language codes see:
     * https://developers.google.com/google-ads/api/reference/data/codes-formats#expandable-7
     */
    private const LANGUAGE_CODE = null;
    /**
     * Specify a number of items sold.
     */
    private const QUANTITY = 1;

    public static function main()
    {
        // Either pass the required parameters for this example on the command line, or insert them
        // into the constants above.
        $options = (new ArgumentParser())->parseCommandArguments([
            ArgumentNames::CUSTOMER_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::OFFLINE_USER_DATA_JOB_TYPE => GetOpt::OPTIONAL_ARGUMENT,
            ArgumentNames::CONVERSION_ACTION_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::AD_PERSONALIZATION_CONSENT => GetOpt::OPTIONAL_ARGUMENT,
            ArgumentNames::AD_USER_DATA_CONSENT => GetOpt::OPTIONAL_ARGUMENT,
            ArgumentNames::EXTERNAL_ID => GetOpt::OPTIONAL_ARGUMENT,
            ArgumentNames::CUSTOM_KEY => GetOpt::OPTIONAL_ARGUMENT,
            ArgumentNames::ADVERTISER_UPLOAD_DATE_TIME => GetOpt::OPTIONAL_ARGUMENT,
            ArgumentNames::BRIDGE_MAP_VERSION_ID => GetOpt::OPTIONAL_ARGUMENT,
            ArgumentNames::PARTNER_ID => GetOpt::OPTIONAL_ARGUMENT,
            ArgumentNames::ITEM_ID => GetOpt::OPTIONAL_ARGUMENT,
            ArgumentNames::MERCHANT_CENTER_ACCOUNT_ID => GetOpt::OPTIONAL_ARGUMENT,
            ArgumentNames::COUNTRY_CODE => GetOpt::OPTIONAL_ARGUMENT,
            ArgumentNames::LANGUAGE_CODE => GetOpt::OPTIONAL_ARGUMENT,
            ArgumentNames::QUANTITY => GetOpt::OPTIONAL_ARGUMENT
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
                $options[ArgumentNames::CUSTOMER_ID] ?: self::CUSTOMER_ID,
                $options[ArgumentNames::OFFLINE_USER_DATA_JOB_TYPE]
                    ?: self::OFFLINE_USER_DATA_JOB_TYPE,
                $options[ArgumentNames::CONVERSION_ACTION_ID] ?: self::CONVERSION_ACTION_ID,
                $options[ArgumentNames::AD_PERSONALIZATION_CONSENT]
                    ? ConsentStatus::value($options[ArgumentNames::AD_PERSONALIZATION_CONSENT])
                    : self::AD_PERSONALIZATION_CONSENT,
                $options[ArgumentNames::AD_USER_DATA_CONSENT]
                    ? ConsentStatus::value($options[ArgumentNames::AD_USER_DATA_CONSENT])
                    : self::AD_USER_DATA_CONSENT,
                $options[ArgumentNames::EXTERNAL_ID] ?: self::EXTERNAL_ID,
                $options[ArgumentNames::CUSTOM_KEY] ?: self::CUSTOM_KEY,
                $options[ArgumentNames::ADVERTISER_UPLOAD_DATE_TIME]
                    ?: self::ADVERTISER_UPLOAD_DATE_TIME,
                $options[ArgumentNames::BRIDGE_MAP_VERSION_ID] ?: self::BRIDGE_MAP_VERSION_ID,
                $options[ArgumentNames::PARTNER_ID] ?: self::PARTNER_ID,
                $options[ArgumentNames::ITEM_ID] ?: self::ITEM_ID,
                $options[ArgumentNames::MERCHANT_CENTER_ACCOUNT_ID]
                    ?: self::MERCHANT_CENTER_ACCOUNT_ID,
                $options[ArgumentNames::COUNTRY_CODE] ?: self::COUNTRY_CODE,
                $options[ArgumentNames::LANGUAGE_CODE] ?: self::LANGUAGE_CODE,
                $options[ArgumentNames::QUANTITY] ?: self::QUANTITY
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
     * @param string|null $offlineUserDataJobType the type of offline user data in the job (first
     *     party or third party). If you have an official store sales partnership with Google, use
     *     `STORE_SALES_UPLOAD_THIRD_PARTY`. Otherwise, use `STORE_SALES_UPLOAD_FIRST_PARTY`
     * @param int $conversionActionId the ID of a store sales conversion action
     * @param int|null $adPersonalizationConsent the ad personalization consent status
     * @param int|null $adUserDataConsent the ad user data consent status
     * @param int|null $externalId optional (but recommended) external ID for the offline user data
     *     job
     * @param string|null $customKey the custom key to segment store sales conversions. Only
     *     required after creating a custom key and custom values in the account.
     * @param string|null $advertiserUploadDateTime date and time the advertiser uploaded data to
     *     the partner. Only required for third party uploads
     * @param string|null $bridgeMapVersionId version of partner IDs to be used for uploads. Only
     *     required for third party uploads
     * @param int|null $partnerId ID of the third party partner. Only required for third party
     *     uploads
     * @param string|null $itemId a unique identifier of a product, either the Merchant Center Item
     *     ID or Global Trade Item Number (GTIN)
     * @param int|null $merchantCenterAccountId a Merchant Center Account ID
     * @param string|null $countryCode a two-letter country code of the location associated with the
     *     feed where your items are uploaded
     * @param string|null $languageCode a two-letter language code of the language associated with
     *     the feed where your items are uploaded
     * @param int|null $quantity the number of items sold. Can only be set when at least one other
     *     item attribute has been provided
     */
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        ?string $offlineUserDataJobType,
        int $conversionActionId,
        ?int $adPersonalizationConsent,
        ?int $adUserDataConsent,
        ?int $externalId,
        ?string $customKey,
        ?string $advertiserUploadDateTime,
        ?string $bridgeMapVersionId,
        ?int $partnerId,
        ?string $itemId,
        ?int $merchantCenterAccountId,
        ?string $countryCode,
        ?string $languageCode,
        ?int $quantity
    ) {
        $offlineUserDataJobServiceClient = $googleAdsClient->getOfflineUserDataJobServiceClient();

        // Creates an offline user data job for uploading transactions.
        $offlineUserDataJobResourceName = self::createOfflineUserDataJob(
            $offlineUserDataJobServiceClient,
            $customerId,
            $offlineUserDataJobType,
            $externalId,
            $customKey,
            $advertiserUploadDateTime,
            $bridgeMapVersionId,
            $partnerId
        );

        // Adds transactions to the job.
        self::addTransactionsToOfflineUserDataJob(
            $offlineUserDataJobServiceClient,
            $customerId,
            $offlineUserDataJobResourceName,
            $conversionActionId,
            $adPersonalizationConsent,
            $adUserDataConsent,
            $itemId,
            $merchantCenterAccountId,
            $countryCode,
            $languageCode,
            $quantity
        );

        // Issues an asynchronous request to run the offline user data job.
        $offlineUserDataJobServiceClient->runOfflineUserDataJob(
            RunOfflineUserDataJobRequest::build($offlineUserDataJobResourceName)
        );

        printf(
            "Sent request to asynchronously run offline user data job: '%s'.%s",
            $offlineUserDataJobResourceName,
            PHP_EOL
        );

        // Offline user data jobs may take up to 24 hours to complete, so instead of waiting for the
        // job to complete, retrieves and displays the job status once and then prints the query to
        // use to check the job again later.
        self::checkJobStatus($googleAdsClient, $customerId, $offlineUserDataJobResourceName);
    }

    /**
     * Creates an offline user data job for uploading store sales transactions.
     *
     * @param OfflineUserDataJobServiceClient $offlineUserDataJobServiceClient the offline user
     *     data job service client
     * @param int $customerId the customer ID
     * @param string|null $offlineUserDataJobType the type of offline user data in the job (first
     *     party or third party). If you have an official store sales partnership with Google, use
     *     `STORE_SALES_UPLOAD_THIRD_PARTY`. Otherwise, use `STORE_SALES_UPLOAD_FIRST_PARTY`
     * @param int|null $externalId optional (but recommended) external ID for the offline user data
     *     job
     * @param string|null $customKey the custom key to segment store sales conversions. Only
     *     required after creating a custom key and custom values in the account.
     * @param string|null $advertiserUploadDateTime date and time the advertiser uploaded data to
     *     the partner. Only required for third party uploads
     * @param string|null $bridgeMapVersionId version of partner IDs to be used for uploads. Only
     *     required for third party uploads
     * @param int|null $partnerId ID of the third party partner. Only required for third party
     *     uploads
     * @return string the resource name of the created job
     */
    private static function createOfflineUserDataJob(
        OfflineUserDataJobServiceClient $offlineUserDataJobServiceClient,
        int $customerId,
        ?string $offlineUserDataJobType,
        ?int $externalId,
        ?string $customKey,
        ?string $advertiserUploadDateTime,
        ?string $bridgeMapVersionId,
        ?int $partnerId
    ): string {
        // TIP: If you are migrating from the AdWords API, please note that Google Ads API uses the
        // term "fraction" instead of "rate". For example, loyaltyRate in the AdWords API is called
        // loyaltyFraction in the Google Ads API.
        // Please refer to https://support.google.com/google-ads/answer/7506124 for additional
        // details.
        $storeSalesMetadata = new StoreSalesMetadata([
            // Sets the fraction of your overall sales that you (or the advertiser, in the third
            // party case) can associate with a customer (email, phone number, address, etc.) in
            // your database or loyalty program.
            // For example, set this to 0.7 if you have 100 transactions over 30 days, and out of
            // those 100 transactions, you can identify 70 by an email address or phone number.
            'loyalty_fraction' => 0.7,
            // Sets the fraction of sales you're uploading out of the overall sales that you (or the
            // advertiser, in the third party case) can associate with a customer. In most cases,
            // you will set this to 1.0.
            // Continuing the example above for loyalty fraction, a value of 1.0 here indicates that
            // you are uploading all 70 of the transactions that can be identified by an email
            // address or phone number.
            'transaction_upload_fraction' => 1.0,
        ]);
        if (!is_null($customKey)) {
            $storeSalesMetadata->setCustomKey($customKey);
        }
        if (
            OfflineUserDataJobType::value($offlineUserDataJobType)
                === OfflineUserDataJobType::STORE_SALES_UPLOAD_THIRD_PARTY
        ) {
            // Creates additional metadata required for uploading third party data.
            $storeSalesThirdPartyMetadata = new StoreSalesThirdPartyMetadata([
                // The date/time must be in the format "yyyy-MM-dd hh:mm:ss".
                'advertiser_upload_date_time' => $advertiserUploadDateTime,
                // Sets the fraction of transactions you received from the advertiser that have
                // valid formatting and values. This captures any transactions the advertiser
                // provided to you but which you are unable to upload to Google due to formatting
                // errors or missing data.
                // In most cases, you will set this to 1.0.
                'valid_transaction_fraction' => 1.0,
                // Sets the fraction of valid transactions (as defined above) you received from the
                // advertiser that you (the third party) have matched to an external user ID on your
                // side.
                // In most cases, you will set this to 1.0.
                'partner_match_fraction' => 1.0,
                // Sets the fraction of transactions you (the third party) are uploading out of the
                // transactions you received from the advertiser that meet both of the following
                // criteria:
                // 1. Are valid in terms of formatting and values. See valid transaction fraction
                // above.
                // 2. You matched to an external user ID on your side. See partner match fraction
                // above.
                // In most cases, you will set this to 1.0.
                'partner_upload_fraction' => 1.0,
                // Please speak with your Google representative to get the values to use for the
                // bridge map version and partner IDs.
                // Sets the version of partner IDs to be used for uploads.
                'bridge_map_version_id' => $bridgeMapVersionId,
                // Sets the third party partner ID uploading the transactions.
                'partner_id' => $partnerId,
            ]);
            $storeSalesMetadata->setThirdPartyMetadata($storeSalesThirdPartyMetadata);
        }
        // Creates a new offline user data job.
        $offlineUserDataJob = new OfflineUserDataJob([
            'type' => OfflineUserDataJobType::value($offlineUserDataJobType),
            'store_sales_metadata' => $storeSalesMetadata
        ]);
        if (!is_null($externalId)) {
            $offlineUserDataJob->setExternalId($externalId);
        }

        // Issues a request to create the offline user data job.
        /** @var CreateOfflineUserDataJobResponse $createOfflineUserDataJobResponse */
        $createOfflineUserDataJobResponse =
            $offlineUserDataJobServiceClient->createOfflineUserDataJob(
                CreateOfflineUserDataJobRequest::build($customerId, $offlineUserDataJob)
            );
        $offlineUserDataJobResourceName = $createOfflineUserDataJobResponse->getResourceName();
        printf(
            "Created an offline user data job with resource name: '%s'.%s",
            $offlineUserDataJobResourceName,
            PHP_EOL
        );

        return $offlineUserDataJobResourceName;
    }

    /**
     * Adds operations to the job for a set of sample transactions.
     *
     * @param OfflineUserDataJobServiceClient $offlineUserDataJobServiceClient the offline user
     *     data job service client
     * @param int $customerId the customer ID
     * @param string $offlineUserDataJobResourceName the resource name of the created offline user
     *     data job
     * @param int $conversionActionId the ID of a store sales conversion action
     * @param int|null $adPersonalizationConsent the ad personalization consent status
     * @param int|null $adUserDataConsent the ad user data consent status
     * @param string|null $itemId a unique identifier of a product, either the Merchant Center Item
     *     ID or Global Trade Item Number (GTIN)
     * @param int|null $merchantCenterAccountId a Merchant Center Account ID
     * @param string|null $countryCode a two-letter country code of the location associated with the
     *     feed where your items are uploaded
     * @param string|null $languageCode a two-letter language code of the language associated with
     *     the feed where your items are uploaded
     * @param int|null $quantity the number of items sold. Can only be set when at least one other
     *     item attribute has been provided
     */
    private static function addTransactionsToOfflineUserDataJob(
        OfflineUserDataJobServiceClient $offlineUserDataJobServiceClient,
        int $customerId,
        string $offlineUserDataJobResourceName,
        int $conversionActionId,
        ?int $adPersonalizationConsent,
        ?int $adUserDataConsent,
        ?string $itemId,
        ?int $merchantCenterAccountId,
        ?string $countryCode,
        ?string $languageCode,
        ?int $quantity
    ) {
        // Constructs the operation for each transaction.
        $userDataJobOperations = self::buildOfflineUserDataJobOperations(
            $customerId,
            $conversionActionId,
            $adPersonalizationConsent,
            $adUserDataConsent,
            $itemId,
            $merchantCenterAccountId,
            $countryCode,
            $languageCode,
            $quantity
        );

        // [START enable_warnings_1]
        // Issues a request to add the operations to the offline user data job.
        /** @var AddOfflineUserDataJobOperationsResponse $operationResponse */
        $request = AddOfflineUserDataJobOperationsRequest::build(
            $offlineUserDataJobResourceName,
            $userDataJobOperations
        );
        // (Optional) Enables partial failure and warnings.
        $request->setEnablePartialFailure(true)->setEnableWarnings(true);
        $response = $offlineUserDataJobServiceClient->addOfflineUserDataJobOperations($request);
        // [END enable_warnings_1]

        // Prints the status message if any partial failure error is returned.
        // NOTE: The details of each partial failure error are not printed here, you can refer to
        // the example HandlePartialFailure.php to learn more.
        if ($response->hasPartialFailureError()) {
            printf(
                "Encountered %d partial failure errors while adding %d operations to the "
                . "offline user data job: '%s'. Only the successfully added operations will be "
                . "executed when the job runs.%s",
                count($response->getPartialFailureError()->getDetails()),
                count($userDataJobOperations),
                $response->getPartialFailureError()->getMessage(),
                PHP_EOL
            );
        } else {
            printf(
                "Successfully added %d operations to the offline user data job.%s",
                count($userDataJobOperations),
                PHP_EOL
            );
        }

        // [START enable_warnings_2]
        // Prints the number of warnings if any warnings are returned. You can access
        // details of each warning using the same approach you'd use for partial failure
        // errors.
        if ($response->hasWarning()) {
            // Extracts all the warning errors from the response details into a single
            // GoogleAdsFailure object.
            $warningFailure = GoogleAdsFailures::fromAnys($response->getWarning()->getDetails());
            // Prints some information about the warnings encountered.
            printf(
                "Encountered %d warning(s).%s",
                count($warningFailure->getErrors()),
                PHP_EOL
            );
        }
        // [END enable_warnings_2]
    }

    /**
     * Creates a list of offline user data job operations for sample transactions.
     *
     * @param int $customerId the customer ID
     * @param int $conversionActionId the ID of a store sales conversion action
     * @param int|null $adPersonalizationConsent the ad personalization consent status
     * @param int|null $adUserDataConsent the ad user data consent status
     * @return OfflineUserDataJobOperation[] an array with the operations
     * @param string|null $itemId a unique identifier of a product, either the Merchant Center Item
     *     ID or Global Trade Item Number (GTIN)
     * @param int|null $merchantCenterAccountId a Merchant Center Account ID
     * @param string|null $countryCode a two-letter country code of the location associated with the
     *     feed where your items are uploaded
     * @param string|null $languageCode a two-letter language code of the language associated with
     *     the feed where your items are uploaded
     * @param int|null $quantity the number of items sold. Can only be set when at least one other
     *     item attribute has been provided
     */
    private static function buildOfflineUserDataJobOperations(
        $customerId,
        $conversionActionId,
        ?int $adPersonalizationConsent,
        ?int $adUserDataConsent,
        ?string $itemId,
        ?int $merchantCenterAccountId,
        ?string $countryCode,
        ?string $languageCode,
        ?int $quantity
    ): array {
        // Creates the first transaction for upload based on an email address and state.
        $userDataWithEmailAddress = new UserData([
            'user_identifiers' => [
                new UserIdentifier([
                    // Email addresses must be normalized and hashed.
                    'hashed_email' => self::normalizeAndHash('dana@example.com')
                ]),
                new UserIdentifier([
                    'address_info' => new OfflineUserAddressInfo(['state' => 'NY'])
                ])
            ],
            'transaction_attribute' => new TransactionAttribute([
                'conversion_action'
                    => ResourceNames::forConversionAction($customerId, $conversionActionId),
                'currency_code' => 'USD',
                // Converts the transaction amount from $200 USD to micros.
                'transaction_amount_micros' => Helper::baseToMicro(200),
                // Specifies the date and time of the transaction. The format is
                // "YYYY-MM-DD HH:MM:SS[+HH:MM]", where [+HH:MM] is an optional
                // timezone offset from UTC. If the offset is absent, the API will
                // use the account's timezone as default. Examples: "2018-03-05 09:15:00"
                // or "2018-02-01 14:34:30+03:00".
                'transaction_date_time' => '2020-05-01 23:52:12'
                // OPTIONAL: If uploading data with custom key and values, also specify the
                // following value:
                // 'custom_value' => 'INSERT_CUSTOM_VALUE_HERE'
            ])
        ]);

        // Adds consent information if specified.
        if (!empty($adPersonalizationConsent) || !empty($adUserDataConsent)) {
            $consent = new Consent();
            if (!empty($adPersonalizationConsent)) {
                $consent->setAdPersonalization($adPersonalizationConsent);
            }
            if (!empty($adUserDataConsent)) {
                $consent->setAdUserData($adUserDataConsent);
            }
            // Specifies whether user consent was obtained for the data you are uploading. See
            // https://www.google.com/about/company/user-consent-policy for details.
            $userDataWithEmailAddress->setConsent($consent);
        }

        // Creates the second transaction for upload based on a physical address.
        $userDataWithPhysicalAddress = new UserData([
            'user_identifiers' => [
                new UserIdentifier([
                    'address_info' => new OfflineUserAddressInfo([
                        // First and last name must be normalized and hashed.
                        'hashed_first_name' => self::normalizeAndHash('Dana'),
                        'hashed_last_name' => self::normalizeAndHash('Quinn'),
                        // Country code and zip code are sent in plain text.
                        'country_code' => 'US',
                        'postal_code' => '10011'
                    ])
                ])
            ],
            'transaction_attribute' => new TransactionAttribute([
                'conversion_action'
                    => ResourceNames::forConversionAction($customerId, $conversionActionId),
                'currency_code' => 'EUR',
                // Converts the transaction amount from 450 EUR to micros.
                'transaction_amount_micros' => Helper::baseToMicro(450),
                // Specifies the date and time of the transaction. This date and time will be
                // interpreted by the API using the Google Ads customer's time zone.
                // The date/time must be in the format "yyyy-MM-dd hh:mm:ss".
                'transaction_date_time' => '2020-05-14 19:07:02'
            ])
        ]);

        // Optional: If uploading data with item attributes, also assign these values
        // in the transaction attribute.
        if (!empty($itemId)) {
            $userDataWithPhysicalAddress->getTransactionAttribute()->setItemAttribute(
                new ItemAttribute([
                    'item_id' => $itemId,
                    'merchant_id' => $merchantCenterAccountId,
                    'country_code' => $countryCode,
                    'language_code' => $languageCode,
                    // Quantity field should only be set when at least one of the other item
                    // attribute fields is present.
                    'quantity' => $quantity
                ])
            );
        }

        // Creates the operations to add the two transactions.
        $operations = [];
        foreach ([$userDataWithEmailAddress, $userDataWithPhysicalAddress] as $userData) {
            $operations[] = new OfflineUserDataJobOperation(['create' => $userData]);
        }

        return $operations;
    }

    /**
     * Returns the result of normalizing and then hashing the string.
     * Private customer data must be hashed during upload, as described at
     * https://support.google.com/google-ads/answer/7506124.
     *
     * @param string $value the value to normalize and hash
     * @return string the normalized and hashed value
     */
    private static function normalizeAndHash(string $value): string
    {
        return hash('sha256', strtolower(trim($value)));
    }

    /**
     * Retrieves, checks, and prints the status of the offline user data job.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param string $offlineUserDataJobResourceName the resource name of the created offline user
     *     data job
     */
    private static function checkJobStatus(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        string $offlineUserDataJobResourceName
    ) {
        $googleAdsServiceClient = $googleAdsClient->getGoogleAdsServiceClient();

        // Creates a query that retrieves the offline user data.
        $query = "SELECT offline_user_data_job.resource_name, "
            . "offline_user_data_job.id, "
            . "offline_user_data_job.status, "
            . "offline_user_data_job.type, "
            . "offline_user_data_job.failure_reason "
            . "FROM offline_user_data_job "
            . "WHERE offline_user_data_job.resource_name = '$offlineUserDataJobResourceName'";

        // Issues a search stream request.
        /** @var GoogleAdsServerStreamDecorator $stream */
        $stream = $googleAdsServiceClient->searchStream(
            SearchGoogleAdsStreamRequest::build($customerId, $query)
        );

        // Prints out some information about the offline user data.
        /** @var GoogleAdsRow $googleAdsRow */
        $googleAdsRow = $stream->iterateAllElements()->current();
        $offlineUserDataJob = $googleAdsRow->getOfflineUserDataJob();
        printf(
            "Offline user data job ID %d with type '%s' has status: %s.%s",
            $offlineUserDataJob->getId(),
            OfflineUserDataJobType::name($offlineUserDataJob->getType()),
            OfflineUserDataJobStatus::name($offlineUserDataJob->getStatus()),
            PHP_EOL
        );

        if (OfflineUserDataJobStatus::FAILED === $offlineUserDataJob->getStatus()) {
            printf(
                "  Failure reason: %s%s",
                OfflineUserDataJobFailureReason::name($offlineUserDataJob->getFailureReason()),
                PHP_EOL
            );
        } elseif (
            OfflineUserDataJobStatus::PENDING === $offlineUserDataJob->getStatus()
            || OfflineUserDataJobStatus::RUNNING === $offlineUserDataJob->getStatus()
        ) {
            printf(
                '%1$sTo check the status of the job periodically, use the following GAQL '
                . 'query with GoogleAdsService.search:%1$s%2$s%1$s.',
                PHP_EOL,
                $query
            );
        }
    }
}

UploadStoreSalesTransactions::main();
