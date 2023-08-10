<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v14/errors/request_error.proto

namespace Google\Ads\GoogleAds\V14\Errors\RequestErrorEnum;

use UnexpectedValueException;

/**
 * Enum describing possible request errors.
 *
 * Protobuf type <code>google.ads.googleads.v14.errors.RequestErrorEnum.RequestError</code>
 */
class RequestError
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
     * Resource name is required for this request.
     *
     * Generated from protobuf enum <code>RESOURCE_NAME_MISSING = 3;</code>
     */
    const RESOURCE_NAME_MISSING = 3;
    /**
     * Resource name provided is malformed.
     *
     * Generated from protobuf enum <code>RESOURCE_NAME_MALFORMED = 4;</code>
     */
    const RESOURCE_NAME_MALFORMED = 4;
    /**
     * Resource name provided is malformed.
     *
     * Generated from protobuf enum <code>BAD_RESOURCE_ID = 17;</code>
     */
    const BAD_RESOURCE_ID = 17;
    /**
     * Customer ID is invalid.
     *
     * Generated from protobuf enum <code>INVALID_CUSTOMER_ID = 16;</code>
     */
    const INVALID_CUSTOMER_ID = 16;
    /**
     * Mutate operation should have either create, update, or remove specified.
     *
     * Generated from protobuf enum <code>OPERATION_REQUIRED = 5;</code>
     */
    const OPERATION_REQUIRED = 5;
    /**
     * Requested resource not found.
     *
     * Generated from protobuf enum <code>RESOURCE_NOT_FOUND = 6;</code>
     */
    const RESOURCE_NOT_FOUND = 6;
    /**
     * Next page token specified in user request is invalid.
     *
     * Generated from protobuf enum <code>INVALID_PAGE_TOKEN = 7;</code>
     */
    const INVALID_PAGE_TOKEN = 7;
    /**
     * Next page token specified in user request has expired.
     *
     * Generated from protobuf enum <code>EXPIRED_PAGE_TOKEN = 8;</code>
     */
    const EXPIRED_PAGE_TOKEN = 8;
    /**
     * Page size specified in user request is invalid.
     *
     * Generated from protobuf enum <code>INVALID_PAGE_SIZE = 22;</code>
     */
    const INVALID_PAGE_SIZE = 22;
    /**
     * Required field is missing.
     *
     * Generated from protobuf enum <code>REQUIRED_FIELD_MISSING = 9;</code>
     */
    const REQUIRED_FIELD_MISSING = 9;
    /**
     * The field cannot be modified because it's immutable. It's also possible
     * that the field can be modified using 'create' operation but not 'update'.
     *
     * Generated from protobuf enum <code>IMMUTABLE_FIELD = 11;</code>
     */
    const IMMUTABLE_FIELD = 11;
    /**
     * Received too many entries in request.
     *
     * Generated from protobuf enum <code>TOO_MANY_MUTATE_OPERATIONS = 13;</code>
     */
    const TOO_MANY_MUTATE_OPERATIONS = 13;
    /**
     * Request cannot be executed by a manager account.
     *
     * Generated from protobuf enum <code>CANNOT_BE_EXECUTED_BY_MANAGER_ACCOUNT = 14;</code>
     */
    const CANNOT_BE_EXECUTED_BY_MANAGER_ACCOUNT = 14;
    /**
     * Mutate request was attempting to modify a readonly field.
     * For instance, Budget fields can be requested for Ad Group,
     * but are read-only for adGroups:mutate.
     *
     * Generated from protobuf enum <code>CANNOT_MODIFY_FOREIGN_FIELD = 15;</code>
     */
    const CANNOT_MODIFY_FOREIGN_FIELD = 15;
    /**
     * Enum value is not permitted.
     *
     * Generated from protobuf enum <code>INVALID_ENUM_VALUE = 18;</code>
     */
    const INVALID_ENUM_VALUE = 18;
    /**
     * The developer-token parameter is required for all requests.
     *
     * Generated from protobuf enum <code>DEVELOPER_TOKEN_PARAMETER_MISSING = 19;</code>
     */
    const DEVELOPER_TOKEN_PARAMETER_MISSING = 19;
    /**
     * The login-customer-id parameter is required for this request.
     *
     * Generated from protobuf enum <code>LOGIN_CUSTOMER_ID_PARAMETER_MISSING = 20;</code>
     */
    const LOGIN_CUSTOMER_ID_PARAMETER_MISSING = 20;
    /**
     * page_token is set in the validate only request
     *
     * Generated from protobuf enum <code>VALIDATE_ONLY_REQUEST_HAS_PAGE_TOKEN = 21;</code>
     */
    const VALIDATE_ONLY_REQUEST_HAS_PAGE_TOKEN = 21;
    /**
     * return_summary_row cannot be enabled if request did not select any
     * metrics field.
     *
     * Generated from protobuf enum <code>CANNOT_RETURN_SUMMARY_ROW_FOR_REQUEST_WITHOUT_METRICS = 29;</code>
     */
    const CANNOT_RETURN_SUMMARY_ROW_FOR_REQUEST_WITHOUT_METRICS = 29;
    /**
     * return_summary_row should not be enabled for validate only requests.
     *
     * Generated from protobuf enum <code>CANNOT_RETURN_SUMMARY_ROW_FOR_VALIDATE_ONLY_REQUESTS = 30;</code>
     */
    const CANNOT_RETURN_SUMMARY_ROW_FOR_VALIDATE_ONLY_REQUESTS = 30;
    /**
     * return_summary_row parameter value should be the same between requests
     * with page_token field set and their original request.
     *
     * Generated from protobuf enum <code>INCONSISTENT_RETURN_SUMMARY_ROW_VALUE = 31;</code>
     */
    const INCONSISTENT_RETURN_SUMMARY_ROW_VALUE = 31;
    /**
     * The total results count cannot be returned if it was not requested in the
     * original request.
     *
     * Generated from protobuf enum <code>TOTAL_RESULTS_COUNT_NOT_ORIGINALLY_REQUESTED = 32;</code>
     */
    const TOTAL_RESULTS_COUNT_NOT_ORIGINALLY_REQUESTED = 32;
    /**
     * Deadline specified by the client was too short.
     *
     * Generated from protobuf enum <code>RPC_DEADLINE_TOO_SHORT = 33;</code>
     */
    const RPC_DEADLINE_TOO_SHORT = 33;
    /**
     * This API version has been sunset and is no longer supported.
     *
     * Generated from protobuf enum <code>UNSUPPORTED_VERSION = 38;</code>
     */
    const UNSUPPORTED_VERSION = 38;
    /**
     * The Google Cloud project in the request was not found.
     *
     * Generated from protobuf enum <code>CLOUD_PROJECT_NOT_FOUND = 39;</code>
     */
    const CLOUD_PROJECT_NOT_FOUND = 39;

    private static $valueToName = [
        self::UNSPECIFIED => 'UNSPECIFIED',
        self::UNKNOWN => 'UNKNOWN',
        self::RESOURCE_NAME_MISSING => 'RESOURCE_NAME_MISSING',
        self::RESOURCE_NAME_MALFORMED => 'RESOURCE_NAME_MALFORMED',
        self::BAD_RESOURCE_ID => 'BAD_RESOURCE_ID',
        self::INVALID_CUSTOMER_ID => 'INVALID_CUSTOMER_ID',
        self::OPERATION_REQUIRED => 'OPERATION_REQUIRED',
        self::RESOURCE_NOT_FOUND => 'RESOURCE_NOT_FOUND',
        self::INVALID_PAGE_TOKEN => 'INVALID_PAGE_TOKEN',
        self::EXPIRED_PAGE_TOKEN => 'EXPIRED_PAGE_TOKEN',
        self::INVALID_PAGE_SIZE => 'INVALID_PAGE_SIZE',
        self::REQUIRED_FIELD_MISSING => 'REQUIRED_FIELD_MISSING',
        self::IMMUTABLE_FIELD => 'IMMUTABLE_FIELD',
        self::TOO_MANY_MUTATE_OPERATIONS => 'TOO_MANY_MUTATE_OPERATIONS',
        self::CANNOT_BE_EXECUTED_BY_MANAGER_ACCOUNT => 'CANNOT_BE_EXECUTED_BY_MANAGER_ACCOUNT',
        self::CANNOT_MODIFY_FOREIGN_FIELD => 'CANNOT_MODIFY_FOREIGN_FIELD',
        self::INVALID_ENUM_VALUE => 'INVALID_ENUM_VALUE',
        self::DEVELOPER_TOKEN_PARAMETER_MISSING => 'DEVELOPER_TOKEN_PARAMETER_MISSING',
        self::LOGIN_CUSTOMER_ID_PARAMETER_MISSING => 'LOGIN_CUSTOMER_ID_PARAMETER_MISSING',
        self::VALIDATE_ONLY_REQUEST_HAS_PAGE_TOKEN => 'VALIDATE_ONLY_REQUEST_HAS_PAGE_TOKEN',
        self::CANNOT_RETURN_SUMMARY_ROW_FOR_REQUEST_WITHOUT_METRICS => 'CANNOT_RETURN_SUMMARY_ROW_FOR_REQUEST_WITHOUT_METRICS',
        self::CANNOT_RETURN_SUMMARY_ROW_FOR_VALIDATE_ONLY_REQUESTS => 'CANNOT_RETURN_SUMMARY_ROW_FOR_VALIDATE_ONLY_REQUESTS',
        self::INCONSISTENT_RETURN_SUMMARY_ROW_VALUE => 'INCONSISTENT_RETURN_SUMMARY_ROW_VALUE',
        self::TOTAL_RESULTS_COUNT_NOT_ORIGINALLY_REQUESTED => 'TOTAL_RESULTS_COUNT_NOT_ORIGINALLY_REQUESTED',
        self::RPC_DEADLINE_TOO_SHORT => 'RPC_DEADLINE_TOO_SHORT',
        self::UNSUPPORTED_VERSION => 'UNSUPPORTED_VERSION',
        self::CLOUD_PROJECT_NOT_FOUND => 'CLOUD_PROJECT_NOT_FOUND',
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
class_alias(RequestError::class, \Google\Ads\GoogleAds\V14\Errors\RequestErrorEnum_RequestError::class);

