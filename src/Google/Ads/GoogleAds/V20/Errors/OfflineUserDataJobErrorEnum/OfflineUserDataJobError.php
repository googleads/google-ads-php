<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/errors/offline_user_data_job_error.proto

namespace Google\Ads\GoogleAds\V20\Errors\OfflineUserDataJobErrorEnum;

use UnexpectedValueException;

/**
 * Enum describing possible request errors.
 *
 * Protobuf type <code>google.ads.googleads.v20.errors.OfflineUserDataJobErrorEnum.OfflineUserDataJobError</code>
 */
class OfflineUserDataJobError
{
    /**
     * Enum unspecified.
     *
     * Generated from protobuf enum <code>UNSPECIFIED = 0;</code>
     */
    const UNSPECIFIED = 0;
    /**
     * The received error code is not known in this version.
     *
     * Generated from protobuf enum <code>UNKNOWN = 1;</code>
     */
    const UNKNOWN = 1;
    /**
     * The user list ID provided for the job is invalid.
     *
     * Generated from protobuf enum <code>INVALID_USER_LIST_ID = 3;</code>
     */
    const INVALID_USER_LIST_ID = 3;
    /**
     * Type of the user list is not applicable for the job.
     *
     * Generated from protobuf enum <code>INVALID_USER_LIST_TYPE = 4;</code>
     */
    const INVALID_USER_LIST_TYPE = 4;
    /**
     * Customer is not allowisted for using user ID in upload data.
     *
     * Generated from protobuf enum <code>NOT_ON_ALLOWLIST_FOR_USER_ID = 33;</code>
     */
    const NOT_ON_ALLOWLIST_FOR_USER_ID = 33;
    /**
     * Upload data is not compatible with the upload key type of the associated
     * user list.
     *
     * Generated from protobuf enum <code>INCOMPATIBLE_UPLOAD_KEY_TYPE = 6;</code>
     */
    const INCOMPATIBLE_UPLOAD_KEY_TYPE = 6;
    /**
     * The user identifier is missing valid data.
     *
     * Generated from protobuf enum <code>MISSING_USER_IDENTIFIER = 7;</code>
     */
    const MISSING_USER_IDENTIFIER = 7;
    /**
     * The mobile ID is malformed.
     *
     * Generated from protobuf enum <code>INVALID_MOBILE_ID_FORMAT = 8;</code>
     */
    const INVALID_MOBILE_ID_FORMAT = 8;
    /**
     * Maximum number of user identifiers allowed per request is 100,000 and per
     * operation is 20.
     *
     * Generated from protobuf enum <code>TOO_MANY_USER_IDENTIFIERS = 9;</code>
     */
    const TOO_MANY_USER_IDENTIFIERS = 9;
    /**
     * Customer is not on the allow-list for store sales direct data.
     *
     * Generated from protobuf enum <code>NOT_ON_ALLOWLIST_FOR_STORE_SALES_DIRECT = 31;</code>
     */
    const NOT_ON_ALLOWLIST_FOR_STORE_SALES_DIRECT = 31;
    /**
     * Customer is not on the allow-list for unified store sales data.
     *
     * Generated from protobuf enum <code>NOT_ON_ALLOWLIST_FOR_UNIFIED_STORE_SALES = 32;</code>
     */
    const NOT_ON_ALLOWLIST_FOR_UNIFIED_STORE_SALES = 32;
    /**
     * The partner ID in store sales direct metadata is invalid.
     *
     * Generated from protobuf enum <code>INVALID_PARTNER_ID = 11;</code>
     */
    const INVALID_PARTNER_ID = 11;
    /**
     * The data in user identifier should not be encoded.
     *
     * Generated from protobuf enum <code>INVALID_ENCODING = 12;</code>
     */
    const INVALID_ENCODING = 12;
    /**
     * The country code is invalid.
     *
     * Generated from protobuf enum <code>INVALID_COUNTRY_CODE = 13;</code>
     */
    const INVALID_COUNTRY_CODE = 13;
    /**
     * Incompatible user identifier when using third_party_user_id for store
     * sales direct first party data or not using third_party_user_id for store
     * sales third party data.
     *
     * Generated from protobuf enum <code>INCOMPATIBLE_USER_IDENTIFIER = 14;</code>
     */
    const INCOMPATIBLE_USER_IDENTIFIER = 14;
    /**
     * A transaction time in the future is not allowed.
     *
     * Generated from protobuf enum <code>FUTURE_TRANSACTION_TIME = 15;</code>
     */
    const FUTURE_TRANSACTION_TIME = 15;
    /**
     * The conversion_action specified in transaction_attributes is used to
     * report conversions to a conversion action configured in Google Ads. This
     * error indicates there is no such conversion action in the account.
     *
     * Generated from protobuf enum <code>INVALID_CONVERSION_ACTION = 16;</code>
     */
    const INVALID_CONVERSION_ACTION = 16;
    /**
     * Mobile ID is not supported for store sales direct data.
     *
     * Generated from protobuf enum <code>MOBILE_ID_NOT_SUPPORTED = 17;</code>
     */
    const MOBILE_ID_NOT_SUPPORTED = 17;
    /**
     * When a remove-all operation is provided, it has to be the first operation
     * of the operation list.
     *
     * Generated from protobuf enum <code>INVALID_OPERATION_ORDER = 18;</code>
     */
    const INVALID_OPERATION_ORDER = 18;
    /**
     * Mixing creation and removal of offline data in the same job is not
     * allowed.
     *
     * Generated from protobuf enum <code>CONFLICTING_OPERATION = 19;</code>
     */
    const CONFLICTING_OPERATION = 19;
    /**
     * The external update ID already exists.
     *
     * Generated from protobuf enum <code>EXTERNAL_UPDATE_ID_ALREADY_EXISTS = 21;</code>
     */
    const EXTERNAL_UPDATE_ID_ALREADY_EXISTS = 21;
    /**
     * Once the upload job is started, new operations cannot be added.
     *
     * Generated from protobuf enum <code>JOB_ALREADY_STARTED = 22;</code>
     */
    const JOB_ALREADY_STARTED = 22;
    /**
     * Remove operation is not allowed for store sales direct updates.
     *
     * Generated from protobuf enum <code>REMOVE_NOT_SUPPORTED = 23;</code>
     */
    const REMOVE_NOT_SUPPORTED = 23;
    /**
     * Remove-all is not supported for certain offline user data job types.
     *
     * Generated from protobuf enum <code>REMOVE_ALL_NOT_SUPPORTED = 24;</code>
     */
    const REMOVE_ALL_NOT_SUPPORTED = 24;
    /**
     * The SHA256 encoded value is malformed.
     *
     * Generated from protobuf enum <code>INVALID_SHA256_FORMAT = 25;</code>
     */
    const INVALID_SHA256_FORMAT = 25;
    /**
     * The custom key specified is not enabled for the unified store sales
     * upload.
     *
     * Generated from protobuf enum <code>CUSTOM_KEY_DISABLED = 26;</code>
     */
    const CUSTOM_KEY_DISABLED = 26;
    /**
     * The custom key specified is not predefined through the Google Ads UI.
     *
     * Generated from protobuf enum <code>CUSTOM_KEY_NOT_PREDEFINED = 27;</code>
     */
    const CUSTOM_KEY_NOT_PREDEFINED = 27;
    /**
     * The custom key specified is not set in the upload.
     *
     * Generated from protobuf enum <code>CUSTOM_KEY_NOT_SET = 29;</code>
     */
    const CUSTOM_KEY_NOT_SET = 29;
    /**
     * The customer has not accepted the customer data terms in the conversion
     * settings page.
     *
     * Generated from protobuf enum <code>CUSTOMER_NOT_ACCEPTED_CUSTOMER_DATA_TERMS = 30;</code>
     */
    const CUSTOMER_NOT_ACCEPTED_CUSTOMER_DATA_TERMS = 30;
    /**
     * User attributes cannot be uploaded into a user list.
     *
     * Generated from protobuf enum <code>ATTRIBUTES_NOT_APPLICABLE_FOR_CUSTOMER_MATCH_USER_LIST = 34;</code>
     */
    const ATTRIBUTES_NOT_APPLICABLE_FOR_CUSTOMER_MATCH_USER_LIST = 34;
    /**
     * Lifetime bucket value must be a number from 0 to 10; 0 is only accepted
     * for remove operations
     *
     * Generated from protobuf enum <code>LIFETIME_VALUE_BUCKET_NOT_IN_RANGE = 35;</code>
     */
    const LIFETIME_VALUE_BUCKET_NOT_IN_RANGE = 35;
    /**
     * Identifiers not supported for Customer Match attributes. User attributes
     * can only be provided with contact info (email, phone, address) user
     * identifiers.
     *
     * Generated from protobuf enum <code>INCOMPATIBLE_USER_IDENTIFIER_FOR_ATTRIBUTES = 36;</code>
     */
    const INCOMPATIBLE_USER_IDENTIFIER_FOR_ATTRIBUTES = 36;
    /**
     * A time in the future is not allowed.
     *
     * Generated from protobuf enum <code>FUTURE_TIME_NOT_ALLOWED = 37;</code>
     */
    const FUTURE_TIME_NOT_ALLOWED = 37;
    /**
     * Last purchase date time cannot be less than acquisition date time.
     *
     * Generated from protobuf enum <code>LAST_PURCHASE_TIME_LESS_THAN_ACQUISITION_TIME = 38;</code>
     */
    const LAST_PURCHASE_TIME_LESS_THAN_ACQUISITION_TIME = 38;
    /**
     * Only emails are accepted as user identifiers for shopping loyalty match.
     * {-- api.dev/not-precedent: The identifier is not limited to ids, but
     * also include other user info eg. phone numbers.}
     *
     * Generated from protobuf enum <code>CUSTOMER_IDENTIFIER_NOT_ALLOWED = 39;</code>
     */
    const CUSTOMER_IDENTIFIER_NOT_ALLOWED = 39;
    /**
     * Provided item ID is invalid.
     *
     * Generated from protobuf enum <code>INVALID_ITEM_ID = 40;</code>
     */
    const INVALID_ITEM_ID = 40;
    /**
     * First purchase date time cannot be greater than the last purchase date
     * time.
     *
     * Generated from protobuf enum <code>FIRST_PURCHASE_TIME_GREATER_THAN_LAST_PURCHASE_TIME = 42;</code>
     */
    const FIRST_PURCHASE_TIME_GREATER_THAN_LAST_PURCHASE_TIME = 42;
    /**
     * Provided lifecycle stage is invalid.
     *
     * Generated from protobuf enum <code>INVALID_LIFECYCLE_STAGE = 43;</code>
     */
    const INVALID_LIFECYCLE_STAGE = 43;
    /**
     * The event value of the Customer Match user attribute is invalid.
     *
     * Generated from protobuf enum <code>INVALID_EVENT_VALUE = 44;</code>
     */
    const INVALID_EVENT_VALUE = 44;
    /**
     * All the fields are not present in the EventAttribute of the Customer
     * Match.
     *
     * Generated from protobuf enum <code>EVENT_ATTRIBUTE_ALL_FIELDS_ARE_REQUIRED = 45;</code>
     */
    const EVENT_ATTRIBUTE_ALL_FIELDS_ARE_REQUIRED = 45;
    /**
     * Consent was provided at the operation level for an OfflineUserDataJobType
     * that expects it at the job level. The provided operation-level consent
     * will be ignored.
     *
     * Generated from protobuf enum <code>OPERATION_LEVEL_CONSENT_PROVIDED = 48;</code>
     */
    const OPERATION_LEVEL_CONSENT_PROVIDED = 48;

    private static $valueToName = [
        self::UNSPECIFIED => 'UNSPECIFIED',
        self::UNKNOWN => 'UNKNOWN',
        self::INVALID_USER_LIST_ID => 'INVALID_USER_LIST_ID',
        self::INVALID_USER_LIST_TYPE => 'INVALID_USER_LIST_TYPE',
        self::NOT_ON_ALLOWLIST_FOR_USER_ID => 'NOT_ON_ALLOWLIST_FOR_USER_ID',
        self::INCOMPATIBLE_UPLOAD_KEY_TYPE => 'INCOMPATIBLE_UPLOAD_KEY_TYPE',
        self::MISSING_USER_IDENTIFIER => 'MISSING_USER_IDENTIFIER',
        self::INVALID_MOBILE_ID_FORMAT => 'INVALID_MOBILE_ID_FORMAT',
        self::TOO_MANY_USER_IDENTIFIERS => 'TOO_MANY_USER_IDENTIFIERS',
        self::NOT_ON_ALLOWLIST_FOR_STORE_SALES_DIRECT => 'NOT_ON_ALLOWLIST_FOR_STORE_SALES_DIRECT',
        self::NOT_ON_ALLOWLIST_FOR_UNIFIED_STORE_SALES => 'NOT_ON_ALLOWLIST_FOR_UNIFIED_STORE_SALES',
        self::INVALID_PARTNER_ID => 'INVALID_PARTNER_ID',
        self::INVALID_ENCODING => 'INVALID_ENCODING',
        self::INVALID_COUNTRY_CODE => 'INVALID_COUNTRY_CODE',
        self::INCOMPATIBLE_USER_IDENTIFIER => 'INCOMPATIBLE_USER_IDENTIFIER',
        self::FUTURE_TRANSACTION_TIME => 'FUTURE_TRANSACTION_TIME',
        self::INVALID_CONVERSION_ACTION => 'INVALID_CONVERSION_ACTION',
        self::MOBILE_ID_NOT_SUPPORTED => 'MOBILE_ID_NOT_SUPPORTED',
        self::INVALID_OPERATION_ORDER => 'INVALID_OPERATION_ORDER',
        self::CONFLICTING_OPERATION => 'CONFLICTING_OPERATION',
        self::EXTERNAL_UPDATE_ID_ALREADY_EXISTS => 'EXTERNAL_UPDATE_ID_ALREADY_EXISTS',
        self::JOB_ALREADY_STARTED => 'JOB_ALREADY_STARTED',
        self::REMOVE_NOT_SUPPORTED => 'REMOVE_NOT_SUPPORTED',
        self::REMOVE_ALL_NOT_SUPPORTED => 'REMOVE_ALL_NOT_SUPPORTED',
        self::INVALID_SHA256_FORMAT => 'INVALID_SHA256_FORMAT',
        self::CUSTOM_KEY_DISABLED => 'CUSTOM_KEY_DISABLED',
        self::CUSTOM_KEY_NOT_PREDEFINED => 'CUSTOM_KEY_NOT_PREDEFINED',
        self::CUSTOM_KEY_NOT_SET => 'CUSTOM_KEY_NOT_SET',
        self::CUSTOMER_NOT_ACCEPTED_CUSTOMER_DATA_TERMS => 'CUSTOMER_NOT_ACCEPTED_CUSTOMER_DATA_TERMS',
        self::ATTRIBUTES_NOT_APPLICABLE_FOR_CUSTOMER_MATCH_USER_LIST => 'ATTRIBUTES_NOT_APPLICABLE_FOR_CUSTOMER_MATCH_USER_LIST',
        self::LIFETIME_VALUE_BUCKET_NOT_IN_RANGE => 'LIFETIME_VALUE_BUCKET_NOT_IN_RANGE',
        self::INCOMPATIBLE_USER_IDENTIFIER_FOR_ATTRIBUTES => 'INCOMPATIBLE_USER_IDENTIFIER_FOR_ATTRIBUTES',
        self::FUTURE_TIME_NOT_ALLOWED => 'FUTURE_TIME_NOT_ALLOWED',
        self::LAST_PURCHASE_TIME_LESS_THAN_ACQUISITION_TIME => 'LAST_PURCHASE_TIME_LESS_THAN_ACQUISITION_TIME',
        self::CUSTOMER_IDENTIFIER_NOT_ALLOWED => 'CUSTOMER_IDENTIFIER_NOT_ALLOWED',
        self::INVALID_ITEM_ID => 'INVALID_ITEM_ID',
        self::FIRST_PURCHASE_TIME_GREATER_THAN_LAST_PURCHASE_TIME => 'FIRST_PURCHASE_TIME_GREATER_THAN_LAST_PURCHASE_TIME',
        self::INVALID_LIFECYCLE_STAGE => 'INVALID_LIFECYCLE_STAGE',
        self::INVALID_EVENT_VALUE => 'INVALID_EVENT_VALUE',
        self::EVENT_ATTRIBUTE_ALL_FIELDS_ARE_REQUIRED => 'EVENT_ATTRIBUTE_ALL_FIELDS_ARE_REQUIRED',
        self::OPERATION_LEVEL_CONSENT_PROVIDED => 'OPERATION_LEVEL_CONSENT_PROVIDED',
    ];

    public static function name($value)
    {
        if (!isset(self::$valueToName[$value])) {
            throw new UnexpectedValueException(sprintf(
                    'Enum %s has no name defined for value %s', __CLASS__, $value));
        }
        return self::$valueToName[$value];
    }


    public static function value($name)
    {
        $const = __CLASS__ . '::' . strtoupper($name);
        if (!defined($const)) {
            throw new UnexpectedValueException(sprintf(
                    'Enum %s has no value defined for name %s', __CLASS__, $name));
        }
        return constant($const);
    }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OfflineUserDataJobError::class, \Google\Ads\GoogleAds\V20\Errors\OfflineUserDataJobErrorEnum_OfflineUserDataJobError::class);

