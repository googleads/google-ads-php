<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/enums/audience_insights_marketing_objective.proto

namespace Google\Ads\GoogleAds\V20\Enums\AudienceInsightsMarketingObjectiveEnum;

use UnexpectedValueException;

/**
 * Describes the overall objective for defining an audience for insights.
 *
 * Protobuf type <code>google.ads.googleads.v20.enums.AudienceInsightsMarketingObjectiveEnum.AudienceInsightsMarketingObjective</code>
 */
class AudienceInsightsMarketingObjective
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
     * The objective is to increase awareness of a brand or product among
     * relevant audiences.
     *
     * Generated from protobuf enum <code>AWARENESS = 2;</code>
     */
    const AWARENESS = 2;
    /**
     * The objective is to encourage potential customers to consider your brand
     * or products when they're researching or shopping for product.
     *
     * Generated from protobuf enum <code>CONSIDERATION = 3;</code>
     */
    const CONSIDERATION = 3;

    private static $valueToName = [
        self::UNSPECIFIED => 'UNSPECIFIED',
        self::UNKNOWN => 'UNKNOWN',
        self::AWARENESS => 'AWARENESS',
        self::CONSIDERATION => 'CONSIDERATION',
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
class_alias(AudienceInsightsMarketingObjective::class, \Google\Ads\GoogleAds\V20\Enums\AudienceInsightsMarketingObjectiveEnum_AudienceInsightsMarketingObjective::class);

