<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/errors/authentication_error.proto

namespace Google\Ads\GoogleAds\V20\Errors\AuthenticationErrorEnum;

use UnexpectedValueException;

/**
 * Enum describing possible authentication errors.
 *
 * Protobuf type <code>google.ads.googleads.v20.errors.AuthenticationErrorEnum.AuthenticationError</code>
 */
class AuthenticationError
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
     * Authentication of the request failed.
     *
     * Generated from protobuf enum <code>AUTHENTICATION_ERROR = 2;</code>
     */
    const AUTHENTICATION_ERROR = 2;
    /**
     * Client customer ID is not a number.
     *
     * Generated from protobuf enum <code>CLIENT_CUSTOMER_ID_INVALID = 5;</code>
     */
    const CLIENT_CUSTOMER_ID_INVALID = 5;
    /**
     * No customer found for the provided customer ID.
     *
     * Generated from protobuf enum <code>CUSTOMER_NOT_FOUND = 8;</code>
     */
    const CUSTOMER_NOT_FOUND = 8;
    /**
     * Client's Google account is deleted.
     *
     * Generated from protobuf enum <code>GOOGLE_ACCOUNT_DELETED = 9;</code>
     */
    const GOOGLE_ACCOUNT_DELETED = 9;
    /**
     * Google account login token in the cookie is invalid.
     *
     * Generated from protobuf enum <code>GOOGLE_ACCOUNT_COOKIE_INVALID = 10;</code>
     */
    const GOOGLE_ACCOUNT_COOKIE_INVALID = 10;
    /**
     * A problem occurred during Google account authentication.
     *
     * Generated from protobuf enum <code>GOOGLE_ACCOUNT_AUTHENTICATION_FAILED = 25;</code>
     */
    const GOOGLE_ACCOUNT_AUTHENTICATION_FAILED = 25;
    /**
     * The user in the Google account login token does not match the user ID in
     * the cookie.
     *
     * Generated from protobuf enum <code>GOOGLE_ACCOUNT_USER_AND_ADS_USER_MISMATCH = 12;</code>
     */
    const GOOGLE_ACCOUNT_USER_AND_ADS_USER_MISMATCH = 12;
    /**
     * Login cookie is required for authentication.
     *
     * Generated from protobuf enum <code>LOGIN_COOKIE_REQUIRED = 13;</code>
     */
    const LOGIN_COOKIE_REQUIRED = 13;
    /**
     * The Google account that generated the OAuth access
     * token is not associated with a Google Ads account. Create a new
     * account, or add the Google account to an existing Google Ads account.
     *
     * Generated from protobuf enum <code>NOT_ADS_USER = 14;</code>
     */
    const NOT_ADS_USER = 14;
    /**
     * OAuth token in the header is not valid.
     *
     * Generated from protobuf enum <code>OAUTH_TOKEN_INVALID = 15;</code>
     */
    const OAUTH_TOKEN_INVALID = 15;
    /**
     * OAuth token in the header has expired.
     *
     * Generated from protobuf enum <code>OAUTH_TOKEN_EXPIRED = 16;</code>
     */
    const OAUTH_TOKEN_EXPIRED = 16;
    /**
     * OAuth token in the header has been disabled.
     *
     * Generated from protobuf enum <code>OAUTH_TOKEN_DISABLED = 17;</code>
     */
    const OAUTH_TOKEN_DISABLED = 17;
    /**
     * OAuth token in the header has been revoked.
     *
     * Generated from protobuf enum <code>OAUTH_TOKEN_REVOKED = 18;</code>
     */
    const OAUTH_TOKEN_REVOKED = 18;
    /**
     * OAuth token HTTP header is malformed.
     *
     * Generated from protobuf enum <code>OAUTH_TOKEN_HEADER_INVALID = 19;</code>
     */
    const OAUTH_TOKEN_HEADER_INVALID = 19;
    /**
     * Login cookie is not valid.
     *
     * Generated from protobuf enum <code>LOGIN_COOKIE_INVALID = 20;</code>
     */
    const LOGIN_COOKIE_INVALID = 20;
    /**
     * User ID in the header is not a valid ID.
     *
     * Generated from protobuf enum <code>USER_ID_INVALID = 22;</code>
     */
    const USER_ID_INVALID = 22;
    /**
     * An account administrator changed this account's authentication settings.
     * To access this Google Ads account, enable 2-Step Verification in your
     * Google account at https://www.google.com/landing/2step.
     *
     * Generated from protobuf enum <code>TWO_STEP_VERIFICATION_NOT_ENROLLED = 23;</code>
     */
    const TWO_STEP_VERIFICATION_NOT_ENROLLED = 23;
    /**
     * An account administrator changed this account's authentication settings.
     * To access this Google Ads account, enable Advanced Protection in your
     * Google account at https://landing.google.com/advancedprotection.
     *
     * Generated from protobuf enum <code>ADVANCED_PROTECTION_NOT_ENROLLED = 24;</code>
     */
    const ADVANCED_PROTECTION_NOT_ENROLLED = 24;
    /**
     * The Cloud organization associated with the project is not recognized.
     *
     * Generated from protobuf enum <code>ORGANIZATION_NOT_RECOGNIZED = 26;</code>
     */
    const ORGANIZATION_NOT_RECOGNIZED = 26;
    /**
     * The Cloud organization associated with the project is not approved for
     * prod access.
     *
     * Generated from protobuf enum <code>ORGANIZATION_NOT_APPROVED = 27;</code>
     */
    const ORGANIZATION_NOT_APPROVED = 27;
    /**
     * The Cloud organization associated with the project is not associated with
     * the developer token.
     *
     * Generated from protobuf enum <code>ORGANIZATION_NOT_ASSOCIATED_WITH_DEVELOPER_TOKEN = 28;</code>
     */
    const ORGANIZATION_NOT_ASSOCIATED_WITH_DEVELOPER_TOKEN = 28;
    /**
     * The developer token is not valid.
     *
     * Generated from protobuf enum <code>DEVELOPER_TOKEN_INVALID = 29;</code>
     */
    const DEVELOPER_TOKEN_INVALID = 29;

    private static $valueToName = [
        self::UNSPECIFIED => 'UNSPECIFIED',
        self::UNKNOWN => 'UNKNOWN',
        self::AUTHENTICATION_ERROR => 'AUTHENTICATION_ERROR',
        self::CLIENT_CUSTOMER_ID_INVALID => 'CLIENT_CUSTOMER_ID_INVALID',
        self::CUSTOMER_NOT_FOUND => 'CUSTOMER_NOT_FOUND',
        self::GOOGLE_ACCOUNT_DELETED => 'GOOGLE_ACCOUNT_DELETED',
        self::GOOGLE_ACCOUNT_COOKIE_INVALID => 'GOOGLE_ACCOUNT_COOKIE_INVALID',
        self::GOOGLE_ACCOUNT_AUTHENTICATION_FAILED => 'GOOGLE_ACCOUNT_AUTHENTICATION_FAILED',
        self::GOOGLE_ACCOUNT_USER_AND_ADS_USER_MISMATCH => 'GOOGLE_ACCOUNT_USER_AND_ADS_USER_MISMATCH',
        self::LOGIN_COOKIE_REQUIRED => 'LOGIN_COOKIE_REQUIRED',
        self::NOT_ADS_USER => 'NOT_ADS_USER',
        self::OAUTH_TOKEN_INVALID => 'OAUTH_TOKEN_INVALID',
        self::OAUTH_TOKEN_EXPIRED => 'OAUTH_TOKEN_EXPIRED',
        self::OAUTH_TOKEN_DISABLED => 'OAUTH_TOKEN_DISABLED',
        self::OAUTH_TOKEN_REVOKED => 'OAUTH_TOKEN_REVOKED',
        self::OAUTH_TOKEN_HEADER_INVALID => 'OAUTH_TOKEN_HEADER_INVALID',
        self::LOGIN_COOKIE_INVALID => 'LOGIN_COOKIE_INVALID',
        self::USER_ID_INVALID => 'USER_ID_INVALID',
        self::TWO_STEP_VERIFICATION_NOT_ENROLLED => 'TWO_STEP_VERIFICATION_NOT_ENROLLED',
        self::ADVANCED_PROTECTION_NOT_ENROLLED => 'ADVANCED_PROTECTION_NOT_ENROLLED',
        self::ORGANIZATION_NOT_RECOGNIZED => 'ORGANIZATION_NOT_RECOGNIZED',
        self::ORGANIZATION_NOT_APPROVED => 'ORGANIZATION_NOT_APPROVED',
        self::ORGANIZATION_NOT_ASSOCIATED_WITH_DEVELOPER_TOKEN => 'ORGANIZATION_NOT_ASSOCIATED_WITH_DEVELOPER_TOKEN',
        self::DEVELOPER_TOKEN_INVALID => 'DEVELOPER_TOKEN_INVALID',
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
class_alias(AuthenticationError::class, \Google\Ads\GoogleAds\V20\Errors\AuthenticationErrorEnum_AuthenticationError::class);

