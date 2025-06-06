<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/enums/brand_request_rejection_reason.proto

namespace Google\Ads\GoogleAds\V20\Enums\BrandRequestRejectionReasonEnum;

use UnexpectedValueException;

/**
 * Enumeration of different brand request rejection reasons.
 *
 * Protobuf type <code>google.ads.googleads.v20.enums.BrandRequestRejectionReasonEnum.BrandRequestRejectionReason</code>
 */
class BrandRequestRejectionReason
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
     * Brand is already present in the commercial brand set.
     *
     * Generated from protobuf enum <code>EXISTING_BRAND = 2;</code>
     */
    const EXISTING_BRAND = 2;
    /**
     * Brand is already present in the commercial brand set, but is a variant.
     *
     * Generated from protobuf enum <code>EXISTING_BRAND_VARIANT = 3;</code>
     */
    const EXISTING_BRAND_VARIANT = 3;
    /**
     * Brand information is not correct (eg: URL and name don't match).
     *
     * Generated from protobuf enum <code>INCORRECT_INFORMATION = 4;</code>
     */
    const INCORRECT_INFORMATION = 4;
    /**
     * Not a valid brand as per Google policy.
     *
     * Generated from protobuf enum <code>NOT_A_BRAND = 5;</code>
     */
    const NOT_A_BRAND = 5;

    private static $valueToName = [
        self::UNSPECIFIED => 'UNSPECIFIED',
        self::UNKNOWN => 'UNKNOWN',
        self::EXISTING_BRAND => 'EXISTING_BRAND',
        self::EXISTING_BRAND_VARIANT => 'EXISTING_BRAND_VARIANT',
        self::INCORRECT_INFORMATION => 'INCORRECT_INFORMATION',
        self::NOT_A_BRAND => 'NOT_A_BRAND',
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
class_alias(BrandRequestRejectionReason::class, \Google\Ads\GoogleAds\V20\Enums\BrandRequestRejectionReasonEnum_BrandRequestRejectionReason::class);

