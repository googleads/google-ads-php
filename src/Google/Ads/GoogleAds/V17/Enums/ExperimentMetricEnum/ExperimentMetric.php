<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v17/enums/experiment_metric.proto

namespace Google\Ads\GoogleAds\V17\Enums\ExperimentMetricEnum;

use UnexpectedValueException;

/**
 * The type of experiment metric.
 *
 * Protobuf type <code>google.ads.googleads.v17.enums.ExperimentMetricEnum.ExperimentMetric</code>
 */
class ExperimentMetric
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
     * The goal of the experiment is clicks.
     *
     * Generated from protobuf enum <code>CLICKS = 2;</code>
     */
    const CLICKS = 2;
    /**
     * The goal of the experiment is impressions.
     *
     * Generated from protobuf enum <code>IMPRESSIONS = 3;</code>
     */
    const IMPRESSIONS = 3;
    /**
     * The goal of the experiment is cost.
     *
     * Generated from protobuf enum <code>COST = 4;</code>
     */
    const COST = 4;
    /**
     * The goal of the experiment is conversion rate.
     *
     * Generated from protobuf enum <code>CONVERSIONS_PER_INTERACTION_RATE = 5;</code>
     */
    const CONVERSIONS_PER_INTERACTION_RATE = 5;
    /**
     * The goal of the experiment is cost per conversion.
     *
     * Generated from protobuf enum <code>COST_PER_CONVERSION = 6;</code>
     */
    const COST_PER_CONVERSION = 6;
    /**
     * The goal of the experiment is conversion value per cost.
     *
     * Generated from protobuf enum <code>CONVERSIONS_VALUE_PER_COST = 7;</code>
     */
    const CONVERSIONS_VALUE_PER_COST = 7;
    /**
     * The goal of the experiment is avg cpc.
     *
     * Generated from protobuf enum <code>AVERAGE_CPC = 8;</code>
     */
    const AVERAGE_CPC = 8;
    /**
     * The goal of the experiment is ctr.
     *
     * Generated from protobuf enum <code>CTR = 9;</code>
     */
    const CTR = 9;
    /**
     * The goal of the experiment is incremental conversions.
     *
     * Generated from protobuf enum <code>INCREMENTAL_CONVERSIONS = 10;</code>
     */
    const INCREMENTAL_CONVERSIONS = 10;
    /**
     * The goal of the experiment is completed video views.
     *
     * Generated from protobuf enum <code>COMPLETED_VIDEO_VIEWS = 11;</code>
     */
    const COMPLETED_VIDEO_VIEWS = 11;
    /**
     * The goal of the experiment is custom algorithms.
     *
     * Generated from protobuf enum <code>CUSTOM_ALGORITHMS = 12;</code>
     */
    const CUSTOM_ALGORITHMS = 12;
    /**
     * The goal of the experiment is conversions.
     *
     * Generated from protobuf enum <code>CONVERSIONS = 13;</code>
     */
    const CONVERSIONS = 13;
    /**
     * The goal of the experiment is conversion value.
     *
     * Generated from protobuf enum <code>CONVERSION_VALUE = 14;</code>
     */
    const CONVERSION_VALUE = 14;

    private static $valueToName = [
        self::UNSPECIFIED => 'UNSPECIFIED',
        self::UNKNOWN => 'UNKNOWN',
        self::CLICKS => 'CLICKS',
        self::IMPRESSIONS => 'IMPRESSIONS',
        self::COST => 'COST',
        self::CONVERSIONS_PER_INTERACTION_RATE => 'CONVERSIONS_PER_INTERACTION_RATE',
        self::COST_PER_CONVERSION => 'COST_PER_CONVERSION',
        self::CONVERSIONS_VALUE_PER_COST => 'CONVERSIONS_VALUE_PER_COST',
        self::AVERAGE_CPC => 'AVERAGE_CPC',
        self::CTR => 'CTR',
        self::INCREMENTAL_CONVERSIONS => 'INCREMENTAL_CONVERSIONS',
        self::COMPLETED_VIDEO_VIEWS => 'COMPLETED_VIDEO_VIEWS',
        self::CUSTOM_ALGORITHMS => 'CUSTOM_ALGORITHMS',
        self::CONVERSIONS => 'CONVERSIONS',
        self::CONVERSION_VALUE => 'CONVERSION_VALUE',
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
class_alias(ExperimentMetric::class, \Google\Ads\GoogleAds\V17\Enums\ExperimentMetricEnum_ExperimentMetric::class);

