<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/enums/keyword_plan_aggregate_metric_type.proto

namespace Google\Ads\GoogleAds\V20\Enums\KeywordPlanAggregateMetricTypeEnum;

use UnexpectedValueException;

/**
 * Aggregate fields.
 *
 * Protobuf type <code>google.ads.googleads.v20.enums.KeywordPlanAggregateMetricTypeEnum.KeywordPlanAggregateMetricType</code>
 */
class KeywordPlanAggregateMetricType
{
    /**
     * Not specified.
     *
     * Generated from protobuf enum <code>UNSPECIFIED = 0;</code>
     */
    const UNSPECIFIED = 0;
    /**
     * The value is unknown in this version.
     *
     * Generated from protobuf enum <code>UNKNOWN = 1;</code>
     */
    const UNKNOWN = 1;
    /**
     * The device breakdown of aggregate search volume.
     *
     * Generated from protobuf enum <code>DEVICE = 2;</code>
     */
    const DEVICE = 2;

    private static $valueToName = [
        self::UNSPECIFIED => 'UNSPECIFIED',
        self::UNKNOWN => 'UNKNOWN',
        self::DEVICE => 'DEVICE',
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
class_alias(KeywordPlanAggregateMetricType::class, \Google\Ads\GoogleAds\V20\Enums\KeywordPlanAggregateMetricTypeEnum_KeywordPlanAggregateMetricType::class);

