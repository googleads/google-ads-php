<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/errors/keyword_plan_campaign_error.proto

namespace Google\Ads\GoogleAds\V20\Errors\KeywordPlanCampaignErrorEnum;

use UnexpectedValueException;

/**
 * Enum describing possible errors from applying a keyword plan campaign.
 *
 * Protobuf type <code>google.ads.googleads.v20.errors.KeywordPlanCampaignErrorEnum.KeywordPlanCampaignError</code>
 */
class KeywordPlanCampaignError
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
     * A keyword plan campaign name is missing, empty, longer than allowed limit
     * or contains invalid chars.
     *
     * Generated from protobuf enum <code>INVALID_NAME = 2;</code>
     */
    const INVALID_NAME = 2;
    /**
     * A keyword plan campaign contains one or more untargetable languages.
     *
     * Generated from protobuf enum <code>INVALID_LANGUAGES = 3;</code>
     */
    const INVALID_LANGUAGES = 3;
    /**
     * A keyword plan campaign contains one or more invalid geo targets.
     *
     * Generated from protobuf enum <code>INVALID_GEOS = 4;</code>
     */
    const INVALID_GEOS = 4;
    /**
     * The keyword plan campaign name is duplicate to an existing keyword plan
     * campaign name or other keyword plan campaign name in the request.
     *
     * Generated from protobuf enum <code>DUPLICATE_NAME = 5;</code>
     */
    const DUPLICATE_NAME = 5;
    /**
     * The number of geo targets in the keyword plan campaign exceeds limits.
     *
     * Generated from protobuf enum <code>MAX_GEOS_EXCEEDED = 6;</code>
     */
    const MAX_GEOS_EXCEEDED = 6;
    /**
     * The number of languages in the keyword plan campaign exceeds limits.
     *
     * Generated from protobuf enum <code>MAX_LANGUAGES_EXCEEDED = 7;</code>
     */
    const MAX_LANGUAGES_EXCEEDED = 7;

    private static $valueToName = [
        self::UNSPECIFIED => 'UNSPECIFIED',
        self::UNKNOWN => 'UNKNOWN',
        self::INVALID_NAME => 'INVALID_NAME',
        self::INVALID_LANGUAGES => 'INVALID_LANGUAGES',
        self::INVALID_GEOS => 'INVALID_GEOS',
        self::DUPLICATE_NAME => 'DUPLICATE_NAME',
        self::MAX_GEOS_EXCEEDED => 'MAX_GEOS_EXCEEDED',
        self::MAX_LANGUAGES_EXCEEDED => 'MAX_LANGUAGES_EXCEEDED',
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
class_alias(KeywordPlanCampaignError::class, \Google\Ads\GoogleAds\V20\Errors\KeywordPlanCampaignErrorEnum_KeywordPlanCampaignError::class);

