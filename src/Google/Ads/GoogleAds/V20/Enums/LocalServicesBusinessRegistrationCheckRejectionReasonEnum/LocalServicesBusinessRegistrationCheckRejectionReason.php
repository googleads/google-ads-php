<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/enums/local_services_business_registration_check_rejection_reason.proto

namespace Google\Ads\GoogleAds\V20\Enums\LocalServicesBusinessRegistrationCheckRejectionReasonEnum;

use UnexpectedValueException;

/**
 * Enums describing possible rejection reasons of a local services business
 * registration check verification artifact.
 *
 * Protobuf type <code>google.ads.googleads.v20.enums.LocalServicesBusinessRegistrationCheckRejectionReasonEnum.LocalServicesBusinessRegistrationCheckRejectionReason</code>
 */
class LocalServicesBusinessRegistrationCheckRejectionReason
{
    /**
     * Not specified.
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
     * Business name doesn't match business name for the Local Services Ad.
     *
     * Generated from protobuf enum <code>BUSINESS_NAME_MISMATCH = 2;</code>
     */
    const BUSINESS_NAME_MISMATCH = 2;
    /**
     * Business details mismatch.
     *
     * Generated from protobuf enum <code>BUSINESS_DETAILS_MISMATCH = 3;</code>
     */
    const BUSINESS_DETAILS_MISMATCH = 3;
    /**
     * Business registration ID not found.
     *
     * Generated from protobuf enum <code>ID_NOT_FOUND = 4;</code>
     */
    const ID_NOT_FOUND = 4;
    /**
     * Uploaded document not clear, blurry, etc.
     *
     * Generated from protobuf enum <code>POOR_DOCUMENT_IMAGE_QUALITY = 5;</code>
     */
    const POOR_DOCUMENT_IMAGE_QUALITY = 5;
    /**
     * Uploaded document has expired.
     *
     * Generated from protobuf enum <code>DOCUMENT_EXPIRED = 6;</code>
     */
    const DOCUMENT_EXPIRED = 6;
    /**
     * Document revoked or annuled.
     *
     * Generated from protobuf enum <code>DOCUMENT_INVALID = 7;</code>
     */
    const DOCUMENT_INVALID = 7;
    /**
     * Document type mismatch.
     *
     * Generated from protobuf enum <code>DOCUMENT_TYPE_MISMATCH = 8;</code>
     */
    const DOCUMENT_TYPE_MISMATCH = 8;
    /**
     * Uploaded document could not be verified as legitimate.
     *
     * Generated from protobuf enum <code>DOCUMENT_UNVERIFIABLE = 9;</code>
     */
    const DOCUMENT_UNVERIFIABLE = 9;
    /**
     * The business registration process could not be completed due to an issue.
     * Contact https://support.google.com/localservices to learn more.
     *
     * Generated from protobuf enum <code>OTHER = 10;</code>
     */
    const OTHER = 10;

    private static $valueToName = [
        self::UNSPECIFIED => 'UNSPECIFIED',
        self::UNKNOWN => 'UNKNOWN',
        self::BUSINESS_NAME_MISMATCH => 'BUSINESS_NAME_MISMATCH',
        self::BUSINESS_DETAILS_MISMATCH => 'BUSINESS_DETAILS_MISMATCH',
        self::ID_NOT_FOUND => 'ID_NOT_FOUND',
        self::POOR_DOCUMENT_IMAGE_QUALITY => 'POOR_DOCUMENT_IMAGE_QUALITY',
        self::DOCUMENT_EXPIRED => 'DOCUMENT_EXPIRED',
        self::DOCUMENT_INVALID => 'DOCUMENT_INVALID',
        self::DOCUMENT_TYPE_MISMATCH => 'DOCUMENT_TYPE_MISMATCH',
        self::DOCUMENT_UNVERIFIABLE => 'DOCUMENT_UNVERIFIABLE',
        self::OTHER => 'OTHER',
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
class_alias(LocalServicesBusinessRegistrationCheckRejectionReason::class, \Google\Ads\GoogleAds\V20\Enums\LocalServicesBusinessRegistrationCheckRejectionReasonEnum_LocalServicesBusinessRegistrationCheckRejectionReason::class);

