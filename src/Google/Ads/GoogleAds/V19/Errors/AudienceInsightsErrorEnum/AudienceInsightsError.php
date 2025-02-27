<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/errors/audience_insights_error.proto

namespace Google\Ads\GoogleAds\V19\Errors\AudienceInsightsErrorEnum;

use UnexpectedValueException;

/**
 * Enum describing possible errors from AudienceInsightsService.
 *
 * Protobuf type <code>google.ads.googleads.v19.errors.AudienceInsightsErrorEnum.AudienceInsightsError</code>
 */
class AudienceInsightsError
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
     * The dimensions cannot be used with topic audience combinations.
     *
     * Generated from protobuf enum <code>DIMENSION_INCOMPATIBLE_WITH_TOPIC_AUDIENCE_COMBINATIONS = 2;</code>
     */
    const DIMENSION_INCOMPATIBLE_WITH_TOPIC_AUDIENCE_COMBINATIONS = 2;

    private static $valueToName = [
        self::UNSPECIFIED => 'UNSPECIFIED',
        self::UNKNOWN => 'UNKNOWN',
        self::DIMENSION_INCOMPATIBLE_WITH_TOPIC_AUDIENCE_COMBINATIONS => 'DIMENSION_INCOMPATIBLE_WITH_TOPIC_AUDIENCE_COMBINATIONS',
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
class_alias(AudienceInsightsError::class, \Google\Ads\GoogleAds\V19\Errors\AudienceInsightsErrorEnum_AudienceInsightsError::class);

