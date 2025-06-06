<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/enums/keyword_plan_competition_level.proto

namespace Google\Ads\GoogleAds\V20\Enums\KeywordPlanCompetitionLevelEnum;

use UnexpectedValueException;

/**
 * Competition level of a keyword.
 *
 * Protobuf type <code>google.ads.googleads.v20.enums.KeywordPlanCompetitionLevelEnum.KeywordPlanCompetitionLevel</code>
 */
class KeywordPlanCompetitionLevel
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
     * Low competition. The Competition Index range for this is [0, 33].
     *
     * Generated from protobuf enum <code>LOW = 2;</code>
     */
    const LOW = 2;
    /**
     * Medium competition. The Competition Index range for this is [34, 66].
     *
     * Generated from protobuf enum <code>MEDIUM = 3;</code>
     */
    const MEDIUM = 3;
    /**
     * High competition. The Competition Index range for this is [67, 100].
     *
     * Generated from protobuf enum <code>HIGH = 4;</code>
     */
    const HIGH = 4;

    private static $valueToName = [
        self::UNSPECIFIED => 'UNSPECIFIED',
        self::UNKNOWN => 'UNKNOWN',
        self::LOW => 'LOW',
        self::MEDIUM => 'MEDIUM',
        self::HIGH => 'HIGH',
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
class_alias(KeywordPlanCompetitionLevel::class, \Google\Ads\GoogleAds\V20\Enums\KeywordPlanCompetitionLevelEnum_KeywordPlanCompetitionLevel::class);

