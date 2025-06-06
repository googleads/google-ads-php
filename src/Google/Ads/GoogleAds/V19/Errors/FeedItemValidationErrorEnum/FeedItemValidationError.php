<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/errors/feed_item_validation_error.proto

namespace Google\Ads\GoogleAds\V19\Errors\FeedItemValidationErrorEnum;

use UnexpectedValueException;

/**
 * The possible validation errors of a feed item.
 *
 * Protobuf type <code>google.ads.googleads.v19.errors.FeedItemValidationErrorEnum.FeedItemValidationError</code>
 */
class FeedItemValidationError
{
    /**
     * No value has been specified.
     *
     * Generated from protobuf enum <code>UNSPECIFIED = 0;</code>
     */
    const UNSPECIFIED = 0;
    /**
     * Used for return value only. Represents value unknown in this version.
     *
     * Generated from protobuf enum <code>UNKNOWN = 1;</code>
     */
    const UNKNOWN = 1;
    /**
     * String is too short.
     *
     * Generated from protobuf enum <code>STRING_TOO_SHORT = 2;</code>
     */
    const STRING_TOO_SHORT = 2;
    /**
     * String is too long.
     *
     * Generated from protobuf enum <code>STRING_TOO_LONG = 3;</code>
     */
    const STRING_TOO_LONG = 3;
    /**
     * Value is not provided.
     *
     * Generated from protobuf enum <code>VALUE_NOT_SPECIFIED = 4;</code>
     */
    const VALUE_NOT_SPECIFIED = 4;
    /**
     * Phone number format is invalid for region.
     *
     * Generated from protobuf enum <code>INVALID_DOMESTIC_PHONE_NUMBER_FORMAT = 5;</code>
     */
    const INVALID_DOMESTIC_PHONE_NUMBER_FORMAT = 5;
    /**
     * String does not represent a phone number.
     *
     * Generated from protobuf enum <code>INVALID_PHONE_NUMBER = 6;</code>
     */
    const INVALID_PHONE_NUMBER = 6;
    /**
     * Phone number format is not compatible with country code.
     *
     * Generated from protobuf enum <code>PHONE_NUMBER_NOT_SUPPORTED_FOR_COUNTRY = 7;</code>
     */
    const PHONE_NUMBER_NOT_SUPPORTED_FOR_COUNTRY = 7;
    /**
     * Premium rate number is not allowed.
     *
     * Generated from protobuf enum <code>PREMIUM_RATE_NUMBER_NOT_ALLOWED = 8;</code>
     */
    const PREMIUM_RATE_NUMBER_NOT_ALLOWED = 8;
    /**
     * Phone number type is not allowed.
     *
     * Generated from protobuf enum <code>DISALLOWED_NUMBER_TYPE = 9;</code>
     */
    const DISALLOWED_NUMBER_TYPE = 9;
    /**
     * Specified value is outside of the valid range.
     *
     * Generated from protobuf enum <code>VALUE_OUT_OF_RANGE = 10;</code>
     */
    const VALUE_OUT_OF_RANGE = 10;
    /**
     * Call tracking is not supported in the selected country.
     *
     * Generated from protobuf enum <code>CALLTRACKING_NOT_SUPPORTED_FOR_COUNTRY = 11;</code>
     */
    const CALLTRACKING_NOT_SUPPORTED_FOR_COUNTRY = 11;
    /**
     * Customer is not on the allow-list for call tracking.
     *
     * Generated from protobuf enum <code>CUSTOMER_NOT_IN_ALLOWLIST_FOR_CALLTRACKING = 99;</code>
     */
    const CUSTOMER_NOT_IN_ALLOWLIST_FOR_CALLTRACKING = 99;
    /**
     * Country code is invalid.
     *
     * Generated from protobuf enum <code>INVALID_COUNTRY_CODE = 13;</code>
     */
    const INVALID_COUNTRY_CODE = 13;
    /**
     * The specified mobile app id is invalid.
     *
     * Generated from protobuf enum <code>INVALID_APP_ID = 14;</code>
     */
    const INVALID_APP_ID = 14;
    /**
     * Some required field attributes are missing.
     *
     * Generated from protobuf enum <code>MISSING_ATTRIBUTES_FOR_FIELDS = 15;</code>
     */
    const MISSING_ATTRIBUTES_FOR_FIELDS = 15;
    /**
     * Invalid email button type for email extension.
     *
     * Generated from protobuf enum <code>INVALID_TYPE_ID = 16;</code>
     */
    const INVALID_TYPE_ID = 16;
    /**
     * Email address is invalid.
     *
     * Generated from protobuf enum <code>INVALID_EMAIL_ADDRESS = 17;</code>
     */
    const INVALID_EMAIL_ADDRESS = 17;
    /**
     * The HTTPS URL in email extension is invalid.
     *
     * Generated from protobuf enum <code>INVALID_HTTPS_URL = 18;</code>
     */
    const INVALID_HTTPS_URL = 18;
    /**
     * Delivery address is missing from email extension.
     *
     * Generated from protobuf enum <code>MISSING_DELIVERY_ADDRESS = 19;</code>
     */
    const MISSING_DELIVERY_ADDRESS = 19;
    /**
     * FeedItem scheduling start date comes after end date.
     *
     * Generated from protobuf enum <code>START_DATE_AFTER_END_DATE = 20;</code>
     */
    const START_DATE_AFTER_END_DATE = 20;
    /**
     * FeedItem scheduling start time is missing.
     *
     * Generated from protobuf enum <code>MISSING_FEED_ITEM_START_TIME = 21;</code>
     */
    const MISSING_FEED_ITEM_START_TIME = 21;
    /**
     * FeedItem scheduling end time is missing.
     *
     * Generated from protobuf enum <code>MISSING_FEED_ITEM_END_TIME = 22;</code>
     */
    const MISSING_FEED_ITEM_END_TIME = 22;
    /**
     * Cannot compute system attributes on a FeedItem that has no FeedItemId.
     *
     * Generated from protobuf enum <code>MISSING_FEED_ITEM_ID = 23;</code>
     */
    const MISSING_FEED_ITEM_ID = 23;
    /**
     * Call extension vanity phone numbers are not supported.
     *
     * Generated from protobuf enum <code>VANITY_PHONE_NUMBER_NOT_ALLOWED = 24;</code>
     */
    const VANITY_PHONE_NUMBER_NOT_ALLOWED = 24;
    /**
     * Invalid review text.
     *
     * Generated from protobuf enum <code>INVALID_REVIEW_EXTENSION_SNIPPET = 25;</code>
     */
    const INVALID_REVIEW_EXTENSION_SNIPPET = 25;
    /**
     * Invalid format for numeric value in ad parameter.
     *
     * Generated from protobuf enum <code>INVALID_NUMBER_FORMAT = 26;</code>
     */
    const INVALID_NUMBER_FORMAT = 26;
    /**
     * Invalid format for date value in ad parameter.
     *
     * Generated from protobuf enum <code>INVALID_DATE_FORMAT = 27;</code>
     */
    const INVALID_DATE_FORMAT = 27;
    /**
     * Invalid format for price value in ad parameter.
     *
     * Generated from protobuf enum <code>INVALID_PRICE_FORMAT = 28;</code>
     */
    const INVALID_PRICE_FORMAT = 28;
    /**
     * Unrecognized type given for value in ad parameter.
     *
     * Generated from protobuf enum <code>UNKNOWN_PLACEHOLDER_FIELD = 29;</code>
     */
    const UNKNOWN_PLACEHOLDER_FIELD = 29;
    /**
     * Enhanced sitelinks must have both description lines specified.
     *
     * Generated from protobuf enum <code>MISSING_ENHANCED_SITELINK_DESCRIPTION_LINE = 30;</code>
     */
    const MISSING_ENHANCED_SITELINK_DESCRIPTION_LINE = 30;
    /**
     * Review source is ineligible.
     *
     * Generated from protobuf enum <code>REVIEW_EXTENSION_SOURCE_INELIGIBLE = 31;</code>
     */
    const REVIEW_EXTENSION_SOURCE_INELIGIBLE = 31;
    /**
     * Review text cannot contain hyphens or dashes.
     *
     * Generated from protobuf enum <code>HYPHENS_IN_REVIEW_EXTENSION_SNIPPET = 32;</code>
     */
    const HYPHENS_IN_REVIEW_EXTENSION_SNIPPET = 32;
    /**
     * Review text cannot contain double quote characters.
     *
     * Generated from protobuf enum <code>DOUBLE_QUOTES_IN_REVIEW_EXTENSION_SNIPPET = 33;</code>
     */
    const DOUBLE_QUOTES_IN_REVIEW_EXTENSION_SNIPPET = 33;
    /**
     * Review text cannot contain quote characters.
     *
     * Generated from protobuf enum <code>QUOTES_IN_REVIEW_EXTENSION_SNIPPET = 34;</code>
     */
    const QUOTES_IN_REVIEW_EXTENSION_SNIPPET = 34;
    /**
     * Parameters are encoded in the wrong format.
     *
     * Generated from protobuf enum <code>INVALID_FORM_ENCODED_PARAMS = 35;</code>
     */
    const INVALID_FORM_ENCODED_PARAMS = 35;
    /**
     * URL parameter name must contain only letters, numbers, underscores, and
     * dashes.
     *
     * Generated from protobuf enum <code>INVALID_URL_PARAMETER_NAME = 36;</code>
     */
    const INVALID_URL_PARAMETER_NAME = 36;
    /**
     * Cannot find address location.
     *
     * Generated from protobuf enum <code>NO_GEOCODING_RESULT = 37;</code>
     */
    const NO_GEOCODING_RESULT = 37;
    /**
     * Review extension text has source name.
     *
     * Generated from protobuf enum <code>SOURCE_NAME_IN_REVIEW_EXTENSION_TEXT = 38;</code>
     */
    const SOURCE_NAME_IN_REVIEW_EXTENSION_TEXT = 38;
    /**
     * Some phone numbers can be shorter than usual. Some of these short numbers
     * are carrier-specific, and we disallow those in ad extensions because they
     * will not be available to all users.
     *
     * Generated from protobuf enum <code>CARRIER_SPECIFIC_SHORT_NUMBER_NOT_ALLOWED = 39;</code>
     */
    const CARRIER_SPECIFIC_SHORT_NUMBER_NOT_ALLOWED = 39;
    /**
     * Triggered when a request references a placeholder field id that does not
     * exist.
     *
     * Generated from protobuf enum <code>INVALID_PLACEHOLDER_FIELD_ID = 40;</code>
     */
    const INVALID_PLACEHOLDER_FIELD_ID = 40;
    /**
     * URL contains invalid ValueTrack tags or format.
     *
     * Generated from protobuf enum <code>INVALID_URL_TAG = 41;</code>
     */
    const INVALID_URL_TAG = 41;
    /**
     * Provided list exceeds acceptable size.
     *
     * Generated from protobuf enum <code>LIST_TOO_LONG = 42;</code>
     */
    const LIST_TOO_LONG = 42;
    /**
     * Certain combinations of attributes aren't allowed to be specified in the
     * same feed item.
     *
     * Generated from protobuf enum <code>INVALID_ATTRIBUTES_COMBINATION = 43;</code>
     */
    const INVALID_ATTRIBUTES_COMBINATION = 43;
    /**
     * An attribute has the same value repeatedly.
     *
     * Generated from protobuf enum <code>DUPLICATE_VALUES = 44;</code>
     */
    const DUPLICATE_VALUES = 44;
    /**
     * Advertisers can link a conversion action with a phone number to indicate
     * that sufficiently long calls forwarded to that phone number should be
     * counted as conversions of the specified type.  This is an error message
     * indicating that the conversion action specified is invalid (for example,
     * the conversion action does not exist within the appropriate Google Ads
     * account, or it is a type of conversion not appropriate to phone call
     * conversions).
     *
     * Generated from protobuf enum <code>INVALID_CALL_CONVERSION_ACTION_ID = 45;</code>
     */
    const INVALID_CALL_CONVERSION_ACTION_ID = 45;
    /**
     * Tracking template requires final url to be set.
     *
     * Generated from protobuf enum <code>CANNOT_SET_WITHOUT_FINAL_URLS = 46;</code>
     */
    const CANNOT_SET_WITHOUT_FINAL_URLS = 46;
    /**
     * An app id was provided that doesn't exist in the given app store.
     *
     * Generated from protobuf enum <code>APP_ID_DOESNT_EXIST_IN_APP_STORE = 47;</code>
     */
    const APP_ID_DOESNT_EXIST_IN_APP_STORE = 47;
    /**
     * Invalid U2 final url.
     *
     * Generated from protobuf enum <code>INVALID_FINAL_URL = 48;</code>
     */
    const INVALID_FINAL_URL = 48;
    /**
     * Invalid U2 tracking url.
     *
     * Generated from protobuf enum <code>INVALID_TRACKING_URL = 49;</code>
     */
    const INVALID_TRACKING_URL = 49;
    /**
     * Final URL should start from App download URL.
     *
     * Generated from protobuf enum <code>INVALID_FINAL_URL_FOR_APP_DOWNLOAD_URL = 50;</code>
     */
    const INVALID_FINAL_URL_FOR_APP_DOWNLOAD_URL = 50;
    /**
     * List provided is too short.
     *
     * Generated from protobuf enum <code>LIST_TOO_SHORT = 51;</code>
     */
    const LIST_TOO_SHORT = 51;
    /**
     * User Action field has invalid value.
     *
     * Generated from protobuf enum <code>INVALID_USER_ACTION = 52;</code>
     */
    const INVALID_USER_ACTION = 52;
    /**
     * Type field has invalid value.
     *
     * Generated from protobuf enum <code>INVALID_TYPE_NAME = 53;</code>
     */
    const INVALID_TYPE_NAME = 53;
    /**
     * Change status for event is invalid.
     *
     * Generated from protobuf enum <code>INVALID_EVENT_CHANGE_STATUS = 54;</code>
     */
    const INVALID_EVENT_CHANGE_STATUS = 54;
    /**
     * The header of a structured snippets extension is not one of the valid
     * headers.
     *
     * Generated from protobuf enum <code>INVALID_SNIPPETS_HEADER = 55;</code>
     */
    const INVALID_SNIPPETS_HEADER = 55;
    /**
     * Android app link is not formatted correctly
     *
     * Generated from protobuf enum <code>INVALID_ANDROID_APP_LINK = 56;</code>
     */
    const INVALID_ANDROID_APP_LINK = 56;
    /**
     * Phone number incompatible with call tracking for country.
     *
     * Generated from protobuf enum <code>NUMBER_TYPE_WITH_CALLTRACKING_NOT_SUPPORTED_FOR_COUNTRY = 57;</code>
     */
    const NUMBER_TYPE_WITH_CALLTRACKING_NOT_SUPPORTED_FOR_COUNTRY = 57;
    /**
     * The input is identical to a reserved keyword
     *
     * Generated from protobuf enum <code>RESERVED_KEYWORD_OTHER = 58;</code>
     */
    const RESERVED_KEYWORD_OTHER = 58;
    /**
     * Each option label in the message extension must be unique.
     *
     * Generated from protobuf enum <code>DUPLICATE_OPTION_LABELS = 59;</code>
     */
    const DUPLICATE_OPTION_LABELS = 59;
    /**
     * Each option prefill in the message extension must be unique.
     *
     * Generated from protobuf enum <code>DUPLICATE_OPTION_PREFILLS = 60;</code>
     */
    const DUPLICATE_OPTION_PREFILLS = 60;
    /**
     * In message extensions, the number of optional labels and optional
     * prefills must be the same.
     *
     * Generated from protobuf enum <code>UNEQUAL_LIST_LENGTHS = 61;</code>
     */
    const UNEQUAL_LIST_LENGTHS = 61;
    /**
     * All currency codes in an ad extension must be the same.
     *
     * Generated from protobuf enum <code>INCONSISTENT_CURRENCY_CODES = 62;</code>
     */
    const INCONSISTENT_CURRENCY_CODES = 62;
    /**
     * Headers in price extension are not unique.
     *
     * Generated from protobuf enum <code>PRICE_EXTENSION_HAS_DUPLICATED_HEADERS = 63;</code>
     */
    const PRICE_EXTENSION_HAS_DUPLICATED_HEADERS = 63;
    /**
     * Header and description in an item are the same.
     *
     * Generated from protobuf enum <code>ITEM_HAS_DUPLICATED_HEADER_AND_DESCRIPTION = 64;</code>
     */
    const ITEM_HAS_DUPLICATED_HEADER_AND_DESCRIPTION = 64;
    /**
     * Price extension has too few items.
     *
     * Generated from protobuf enum <code>PRICE_EXTENSION_HAS_TOO_FEW_ITEMS = 65;</code>
     */
    const PRICE_EXTENSION_HAS_TOO_FEW_ITEMS = 65;
    /**
     * The given value is not supported.
     *
     * Generated from protobuf enum <code>UNSUPPORTED_VALUE = 66;</code>
     */
    const UNSUPPORTED_VALUE = 66;
    /**
     * Invalid final mobile url.
     *
     * Generated from protobuf enum <code>INVALID_FINAL_MOBILE_URL = 67;</code>
     */
    const INVALID_FINAL_MOBILE_URL = 67;
    /**
     * The given string value of Label contains invalid characters
     *
     * Generated from protobuf enum <code>INVALID_KEYWORDLESS_AD_RULE_LABEL = 68;</code>
     */
    const INVALID_KEYWORDLESS_AD_RULE_LABEL = 68;
    /**
     * The given URL contains value track parameters.
     *
     * Generated from protobuf enum <code>VALUE_TRACK_PARAMETER_NOT_SUPPORTED = 69;</code>
     */
    const VALUE_TRACK_PARAMETER_NOT_SUPPORTED = 69;
    /**
     * The given value is not supported in the selected language of an
     * extension.
     *
     * Generated from protobuf enum <code>UNSUPPORTED_VALUE_IN_SELECTED_LANGUAGE = 70;</code>
     */
    const UNSUPPORTED_VALUE_IN_SELECTED_LANGUAGE = 70;
    /**
     * The iOS app link is not formatted correctly.
     *
     * Generated from protobuf enum <code>INVALID_IOS_APP_LINK = 71;</code>
     */
    const INVALID_IOS_APP_LINK = 71;
    /**
     * iOS app link or iOS app store id is missing.
     *
     * Generated from protobuf enum <code>MISSING_IOS_APP_LINK_OR_IOS_APP_STORE_ID = 72;</code>
     */
    const MISSING_IOS_APP_LINK_OR_IOS_APP_STORE_ID = 72;
    /**
     * Promotion time is invalid.
     *
     * Generated from protobuf enum <code>PROMOTION_INVALID_TIME = 73;</code>
     */
    const PROMOTION_INVALID_TIME = 73;
    /**
     * Both the percent off and money amount off fields are set.
     *
     * Generated from protobuf enum <code>PROMOTION_CANNOT_SET_PERCENT_OFF_AND_MONEY_AMOUNT_OFF = 74;</code>
     */
    const PROMOTION_CANNOT_SET_PERCENT_OFF_AND_MONEY_AMOUNT_OFF = 74;
    /**
     * Both the promotion code and orders over amount fields are set.
     *
     * Generated from protobuf enum <code>PROMOTION_CANNOT_SET_PROMOTION_CODE_AND_ORDERS_OVER_AMOUNT = 75;</code>
     */
    const PROMOTION_CANNOT_SET_PROMOTION_CODE_AND_ORDERS_OVER_AMOUNT = 75;
    /**
     * Too many decimal places are specified.
     *
     * Generated from protobuf enum <code>TOO_MANY_DECIMAL_PLACES_SPECIFIED = 76;</code>
     */
    const TOO_MANY_DECIMAL_PLACES_SPECIFIED = 76;
    /**
     * Ad Customizers are present and not allowed.
     *
     * Generated from protobuf enum <code>AD_CUSTOMIZERS_NOT_ALLOWED = 77;</code>
     */
    const AD_CUSTOMIZERS_NOT_ALLOWED = 77;
    /**
     * Language code is not valid.
     *
     * Generated from protobuf enum <code>INVALID_LANGUAGE_CODE = 78;</code>
     */
    const INVALID_LANGUAGE_CODE = 78;
    /**
     * Language is not supported.
     *
     * Generated from protobuf enum <code>UNSUPPORTED_LANGUAGE = 79;</code>
     */
    const UNSUPPORTED_LANGUAGE = 79;
    /**
     * IF Function is present and not allowed.
     *
     * Generated from protobuf enum <code>IF_FUNCTION_NOT_ALLOWED = 80;</code>
     */
    const IF_FUNCTION_NOT_ALLOWED = 80;
    /**
     * Final url suffix is not valid.
     *
     * Generated from protobuf enum <code>INVALID_FINAL_URL_SUFFIX = 81;</code>
     */
    const INVALID_FINAL_URL_SUFFIX = 81;
    /**
     * Final url suffix contains an invalid tag.
     *
     * Generated from protobuf enum <code>INVALID_TAG_IN_FINAL_URL_SUFFIX = 82;</code>
     */
    const INVALID_TAG_IN_FINAL_URL_SUFFIX = 82;
    /**
     * Final url suffix is formatted incorrectly.
     *
     * Generated from protobuf enum <code>INVALID_FINAL_URL_SUFFIX_FORMAT = 83;</code>
     */
    const INVALID_FINAL_URL_SUFFIX_FORMAT = 83;
    /**
     * Consent for call recording, which is required for the use of call
     * extensions, was not provided by the advertiser. See
     * https://support.google.com/google-ads/answer/7412639.
     *
     * Generated from protobuf enum <code>CUSTOMER_CONSENT_FOR_CALL_RECORDING_REQUIRED = 84;</code>
     */
    const CUSTOMER_CONSENT_FOR_CALL_RECORDING_REQUIRED = 84;
    /**
     * Multiple message delivery options are set.
     *
     * Generated from protobuf enum <code>ONLY_ONE_DELIVERY_OPTION_IS_ALLOWED = 85;</code>
     */
    const ONLY_ONE_DELIVERY_OPTION_IS_ALLOWED = 85;
    /**
     * No message delivery option is set.
     *
     * Generated from protobuf enum <code>NO_DELIVERY_OPTION_IS_SET = 86;</code>
     */
    const NO_DELIVERY_OPTION_IS_SET = 86;
    /**
     * String value of conversion reporting state field is not valid.
     *
     * Generated from protobuf enum <code>INVALID_CONVERSION_REPORTING_STATE = 87;</code>
     */
    const INVALID_CONVERSION_REPORTING_STATE = 87;
    /**
     * Image size is not right.
     *
     * Generated from protobuf enum <code>IMAGE_SIZE_WRONG = 88;</code>
     */
    const IMAGE_SIZE_WRONG = 88;
    /**
     * Email delivery is not supported in the country specified in the country
     * code field.
     *
     * Generated from protobuf enum <code>EMAIL_DELIVERY_NOT_AVAILABLE_IN_COUNTRY = 89;</code>
     */
    const EMAIL_DELIVERY_NOT_AVAILABLE_IN_COUNTRY = 89;
    /**
     * Auto reply is not supported in the country specified in the country code
     * field.
     *
     * Generated from protobuf enum <code>AUTO_REPLY_NOT_AVAILABLE_IN_COUNTRY = 90;</code>
     */
    const AUTO_REPLY_NOT_AVAILABLE_IN_COUNTRY = 90;
    /**
     * Invalid value specified for latitude.
     *
     * Generated from protobuf enum <code>INVALID_LATITUDE_VALUE = 91;</code>
     */
    const INVALID_LATITUDE_VALUE = 91;
    /**
     * Invalid value specified for longitude.
     *
     * Generated from protobuf enum <code>INVALID_LONGITUDE_VALUE = 92;</code>
     */
    const INVALID_LONGITUDE_VALUE = 92;
    /**
     * Too many label fields provided.
     *
     * Generated from protobuf enum <code>TOO_MANY_LABELS = 93;</code>
     */
    const TOO_MANY_LABELS = 93;
    /**
     * Invalid image url.
     *
     * Generated from protobuf enum <code>INVALID_IMAGE_URL = 94;</code>
     */
    const INVALID_IMAGE_URL = 94;
    /**
     * Latitude value is missing.
     *
     * Generated from protobuf enum <code>MISSING_LATITUDE_VALUE = 95;</code>
     */
    const MISSING_LATITUDE_VALUE = 95;
    /**
     * Longitude value is missing.
     *
     * Generated from protobuf enum <code>MISSING_LONGITUDE_VALUE = 96;</code>
     */
    const MISSING_LONGITUDE_VALUE = 96;
    /**
     * Unable to find address.
     *
     * Generated from protobuf enum <code>ADDRESS_NOT_FOUND = 97;</code>
     */
    const ADDRESS_NOT_FOUND = 97;
    /**
     * Cannot target provided address.
     *
     * Generated from protobuf enum <code>ADDRESS_NOT_TARGETABLE = 98;</code>
     */
    const ADDRESS_NOT_TARGETABLE = 98;
    /**
     * The specified asset ID does not exist.
     *
     * Generated from protobuf enum <code>INVALID_ASSET_ID = 100;</code>
     */
    const INVALID_ASSET_ID = 100;
    /**
     * The asset type cannot be set for the field.
     *
     * Generated from protobuf enum <code>INCOMPATIBLE_ASSET_TYPE = 101;</code>
     */
    const INCOMPATIBLE_ASSET_TYPE = 101;
    /**
     * The image has unexpected size.
     *
     * Generated from protobuf enum <code>IMAGE_ERROR_UNEXPECTED_SIZE = 102;</code>
     */
    const IMAGE_ERROR_UNEXPECTED_SIZE = 102;
    /**
     * The image aspect ratio is not allowed.
     *
     * Generated from protobuf enum <code>IMAGE_ERROR_ASPECT_RATIO_NOT_ALLOWED = 103;</code>
     */
    const IMAGE_ERROR_ASPECT_RATIO_NOT_ALLOWED = 103;
    /**
     * The image file is too large.
     *
     * Generated from protobuf enum <code>IMAGE_ERROR_FILE_TOO_LARGE = 104;</code>
     */
    const IMAGE_ERROR_FILE_TOO_LARGE = 104;
    /**
     * The image format is unsupported.
     *
     * Generated from protobuf enum <code>IMAGE_ERROR_FORMAT_NOT_ALLOWED = 105;</code>
     */
    const IMAGE_ERROR_FORMAT_NOT_ALLOWED = 105;
    /**
     * Image violates constraints without more details.
     *
     * Generated from protobuf enum <code>IMAGE_ERROR_CONSTRAINTS_VIOLATED = 106;</code>
     */
    const IMAGE_ERROR_CONSTRAINTS_VIOLATED = 106;
    /**
     * An error occurred when validating image.
     *
     * Generated from protobuf enum <code>IMAGE_ERROR_SERVER_ERROR = 107;</code>
     */
    const IMAGE_ERROR_SERVER_ERROR = 107;

    private static $valueToName = [
        self::UNSPECIFIED => 'UNSPECIFIED',
        self::UNKNOWN => 'UNKNOWN',
        self::STRING_TOO_SHORT => 'STRING_TOO_SHORT',
        self::STRING_TOO_LONG => 'STRING_TOO_LONG',
        self::VALUE_NOT_SPECIFIED => 'VALUE_NOT_SPECIFIED',
        self::INVALID_DOMESTIC_PHONE_NUMBER_FORMAT => 'INVALID_DOMESTIC_PHONE_NUMBER_FORMAT',
        self::INVALID_PHONE_NUMBER => 'INVALID_PHONE_NUMBER',
        self::PHONE_NUMBER_NOT_SUPPORTED_FOR_COUNTRY => 'PHONE_NUMBER_NOT_SUPPORTED_FOR_COUNTRY',
        self::PREMIUM_RATE_NUMBER_NOT_ALLOWED => 'PREMIUM_RATE_NUMBER_NOT_ALLOWED',
        self::DISALLOWED_NUMBER_TYPE => 'DISALLOWED_NUMBER_TYPE',
        self::VALUE_OUT_OF_RANGE => 'VALUE_OUT_OF_RANGE',
        self::CALLTRACKING_NOT_SUPPORTED_FOR_COUNTRY => 'CALLTRACKING_NOT_SUPPORTED_FOR_COUNTRY',
        self::CUSTOMER_NOT_IN_ALLOWLIST_FOR_CALLTRACKING => 'CUSTOMER_NOT_IN_ALLOWLIST_FOR_CALLTRACKING',
        self::INVALID_COUNTRY_CODE => 'INVALID_COUNTRY_CODE',
        self::INVALID_APP_ID => 'INVALID_APP_ID',
        self::MISSING_ATTRIBUTES_FOR_FIELDS => 'MISSING_ATTRIBUTES_FOR_FIELDS',
        self::INVALID_TYPE_ID => 'INVALID_TYPE_ID',
        self::INVALID_EMAIL_ADDRESS => 'INVALID_EMAIL_ADDRESS',
        self::INVALID_HTTPS_URL => 'INVALID_HTTPS_URL',
        self::MISSING_DELIVERY_ADDRESS => 'MISSING_DELIVERY_ADDRESS',
        self::START_DATE_AFTER_END_DATE => 'START_DATE_AFTER_END_DATE',
        self::MISSING_FEED_ITEM_START_TIME => 'MISSING_FEED_ITEM_START_TIME',
        self::MISSING_FEED_ITEM_END_TIME => 'MISSING_FEED_ITEM_END_TIME',
        self::MISSING_FEED_ITEM_ID => 'MISSING_FEED_ITEM_ID',
        self::VANITY_PHONE_NUMBER_NOT_ALLOWED => 'VANITY_PHONE_NUMBER_NOT_ALLOWED',
        self::INVALID_REVIEW_EXTENSION_SNIPPET => 'INVALID_REVIEW_EXTENSION_SNIPPET',
        self::INVALID_NUMBER_FORMAT => 'INVALID_NUMBER_FORMAT',
        self::INVALID_DATE_FORMAT => 'INVALID_DATE_FORMAT',
        self::INVALID_PRICE_FORMAT => 'INVALID_PRICE_FORMAT',
        self::UNKNOWN_PLACEHOLDER_FIELD => 'UNKNOWN_PLACEHOLDER_FIELD',
        self::MISSING_ENHANCED_SITELINK_DESCRIPTION_LINE => 'MISSING_ENHANCED_SITELINK_DESCRIPTION_LINE',
        self::REVIEW_EXTENSION_SOURCE_INELIGIBLE => 'REVIEW_EXTENSION_SOURCE_INELIGIBLE',
        self::HYPHENS_IN_REVIEW_EXTENSION_SNIPPET => 'HYPHENS_IN_REVIEW_EXTENSION_SNIPPET',
        self::DOUBLE_QUOTES_IN_REVIEW_EXTENSION_SNIPPET => 'DOUBLE_QUOTES_IN_REVIEW_EXTENSION_SNIPPET',
        self::QUOTES_IN_REVIEW_EXTENSION_SNIPPET => 'QUOTES_IN_REVIEW_EXTENSION_SNIPPET',
        self::INVALID_FORM_ENCODED_PARAMS => 'INVALID_FORM_ENCODED_PARAMS',
        self::INVALID_URL_PARAMETER_NAME => 'INVALID_URL_PARAMETER_NAME',
        self::NO_GEOCODING_RESULT => 'NO_GEOCODING_RESULT',
        self::SOURCE_NAME_IN_REVIEW_EXTENSION_TEXT => 'SOURCE_NAME_IN_REVIEW_EXTENSION_TEXT',
        self::CARRIER_SPECIFIC_SHORT_NUMBER_NOT_ALLOWED => 'CARRIER_SPECIFIC_SHORT_NUMBER_NOT_ALLOWED',
        self::INVALID_PLACEHOLDER_FIELD_ID => 'INVALID_PLACEHOLDER_FIELD_ID',
        self::INVALID_URL_TAG => 'INVALID_URL_TAG',
        self::LIST_TOO_LONG => 'LIST_TOO_LONG',
        self::INVALID_ATTRIBUTES_COMBINATION => 'INVALID_ATTRIBUTES_COMBINATION',
        self::DUPLICATE_VALUES => 'DUPLICATE_VALUES',
        self::INVALID_CALL_CONVERSION_ACTION_ID => 'INVALID_CALL_CONVERSION_ACTION_ID',
        self::CANNOT_SET_WITHOUT_FINAL_URLS => 'CANNOT_SET_WITHOUT_FINAL_URLS',
        self::APP_ID_DOESNT_EXIST_IN_APP_STORE => 'APP_ID_DOESNT_EXIST_IN_APP_STORE',
        self::INVALID_FINAL_URL => 'INVALID_FINAL_URL',
        self::INVALID_TRACKING_URL => 'INVALID_TRACKING_URL',
        self::INVALID_FINAL_URL_FOR_APP_DOWNLOAD_URL => 'INVALID_FINAL_URL_FOR_APP_DOWNLOAD_URL',
        self::LIST_TOO_SHORT => 'LIST_TOO_SHORT',
        self::INVALID_USER_ACTION => 'INVALID_USER_ACTION',
        self::INVALID_TYPE_NAME => 'INVALID_TYPE_NAME',
        self::INVALID_EVENT_CHANGE_STATUS => 'INVALID_EVENT_CHANGE_STATUS',
        self::INVALID_SNIPPETS_HEADER => 'INVALID_SNIPPETS_HEADER',
        self::INVALID_ANDROID_APP_LINK => 'INVALID_ANDROID_APP_LINK',
        self::NUMBER_TYPE_WITH_CALLTRACKING_NOT_SUPPORTED_FOR_COUNTRY => 'NUMBER_TYPE_WITH_CALLTRACKING_NOT_SUPPORTED_FOR_COUNTRY',
        self::RESERVED_KEYWORD_OTHER => 'RESERVED_KEYWORD_OTHER',
        self::DUPLICATE_OPTION_LABELS => 'DUPLICATE_OPTION_LABELS',
        self::DUPLICATE_OPTION_PREFILLS => 'DUPLICATE_OPTION_PREFILLS',
        self::UNEQUAL_LIST_LENGTHS => 'UNEQUAL_LIST_LENGTHS',
        self::INCONSISTENT_CURRENCY_CODES => 'INCONSISTENT_CURRENCY_CODES',
        self::PRICE_EXTENSION_HAS_DUPLICATED_HEADERS => 'PRICE_EXTENSION_HAS_DUPLICATED_HEADERS',
        self::ITEM_HAS_DUPLICATED_HEADER_AND_DESCRIPTION => 'ITEM_HAS_DUPLICATED_HEADER_AND_DESCRIPTION',
        self::PRICE_EXTENSION_HAS_TOO_FEW_ITEMS => 'PRICE_EXTENSION_HAS_TOO_FEW_ITEMS',
        self::UNSUPPORTED_VALUE => 'UNSUPPORTED_VALUE',
        self::INVALID_FINAL_MOBILE_URL => 'INVALID_FINAL_MOBILE_URL',
        self::INVALID_KEYWORDLESS_AD_RULE_LABEL => 'INVALID_KEYWORDLESS_AD_RULE_LABEL',
        self::VALUE_TRACK_PARAMETER_NOT_SUPPORTED => 'VALUE_TRACK_PARAMETER_NOT_SUPPORTED',
        self::UNSUPPORTED_VALUE_IN_SELECTED_LANGUAGE => 'UNSUPPORTED_VALUE_IN_SELECTED_LANGUAGE',
        self::INVALID_IOS_APP_LINK => 'INVALID_IOS_APP_LINK',
        self::MISSING_IOS_APP_LINK_OR_IOS_APP_STORE_ID => 'MISSING_IOS_APP_LINK_OR_IOS_APP_STORE_ID',
        self::PROMOTION_INVALID_TIME => 'PROMOTION_INVALID_TIME',
        self::PROMOTION_CANNOT_SET_PERCENT_OFF_AND_MONEY_AMOUNT_OFF => 'PROMOTION_CANNOT_SET_PERCENT_OFF_AND_MONEY_AMOUNT_OFF',
        self::PROMOTION_CANNOT_SET_PROMOTION_CODE_AND_ORDERS_OVER_AMOUNT => 'PROMOTION_CANNOT_SET_PROMOTION_CODE_AND_ORDERS_OVER_AMOUNT',
        self::TOO_MANY_DECIMAL_PLACES_SPECIFIED => 'TOO_MANY_DECIMAL_PLACES_SPECIFIED',
        self::AD_CUSTOMIZERS_NOT_ALLOWED => 'AD_CUSTOMIZERS_NOT_ALLOWED',
        self::INVALID_LANGUAGE_CODE => 'INVALID_LANGUAGE_CODE',
        self::UNSUPPORTED_LANGUAGE => 'UNSUPPORTED_LANGUAGE',
        self::IF_FUNCTION_NOT_ALLOWED => 'IF_FUNCTION_NOT_ALLOWED',
        self::INVALID_FINAL_URL_SUFFIX => 'INVALID_FINAL_URL_SUFFIX',
        self::INVALID_TAG_IN_FINAL_URL_SUFFIX => 'INVALID_TAG_IN_FINAL_URL_SUFFIX',
        self::INVALID_FINAL_URL_SUFFIX_FORMAT => 'INVALID_FINAL_URL_SUFFIX_FORMAT',
        self::CUSTOMER_CONSENT_FOR_CALL_RECORDING_REQUIRED => 'CUSTOMER_CONSENT_FOR_CALL_RECORDING_REQUIRED',
        self::ONLY_ONE_DELIVERY_OPTION_IS_ALLOWED => 'ONLY_ONE_DELIVERY_OPTION_IS_ALLOWED',
        self::NO_DELIVERY_OPTION_IS_SET => 'NO_DELIVERY_OPTION_IS_SET',
        self::INVALID_CONVERSION_REPORTING_STATE => 'INVALID_CONVERSION_REPORTING_STATE',
        self::IMAGE_SIZE_WRONG => 'IMAGE_SIZE_WRONG',
        self::EMAIL_DELIVERY_NOT_AVAILABLE_IN_COUNTRY => 'EMAIL_DELIVERY_NOT_AVAILABLE_IN_COUNTRY',
        self::AUTO_REPLY_NOT_AVAILABLE_IN_COUNTRY => 'AUTO_REPLY_NOT_AVAILABLE_IN_COUNTRY',
        self::INVALID_LATITUDE_VALUE => 'INVALID_LATITUDE_VALUE',
        self::INVALID_LONGITUDE_VALUE => 'INVALID_LONGITUDE_VALUE',
        self::TOO_MANY_LABELS => 'TOO_MANY_LABELS',
        self::INVALID_IMAGE_URL => 'INVALID_IMAGE_URL',
        self::MISSING_LATITUDE_VALUE => 'MISSING_LATITUDE_VALUE',
        self::MISSING_LONGITUDE_VALUE => 'MISSING_LONGITUDE_VALUE',
        self::ADDRESS_NOT_FOUND => 'ADDRESS_NOT_FOUND',
        self::ADDRESS_NOT_TARGETABLE => 'ADDRESS_NOT_TARGETABLE',
        self::INVALID_ASSET_ID => 'INVALID_ASSET_ID',
        self::INCOMPATIBLE_ASSET_TYPE => 'INCOMPATIBLE_ASSET_TYPE',
        self::IMAGE_ERROR_UNEXPECTED_SIZE => 'IMAGE_ERROR_UNEXPECTED_SIZE',
        self::IMAGE_ERROR_ASPECT_RATIO_NOT_ALLOWED => 'IMAGE_ERROR_ASPECT_RATIO_NOT_ALLOWED',
        self::IMAGE_ERROR_FILE_TOO_LARGE => 'IMAGE_ERROR_FILE_TOO_LARGE',
        self::IMAGE_ERROR_FORMAT_NOT_ALLOWED => 'IMAGE_ERROR_FORMAT_NOT_ALLOWED',
        self::IMAGE_ERROR_CONSTRAINTS_VIOLATED => 'IMAGE_ERROR_CONSTRAINTS_VIOLATED',
        self::IMAGE_ERROR_SERVER_ERROR => 'IMAGE_ERROR_SERVER_ERROR',
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
class_alias(FeedItemValidationError::class, \Google\Ads\GoogleAds\V19\Errors\FeedItemValidationErrorEnum_FeedItemValidationError::class);

