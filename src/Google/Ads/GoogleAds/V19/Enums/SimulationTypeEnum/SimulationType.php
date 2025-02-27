<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/enums/simulation_type.proto

namespace Google\Ads\GoogleAds\V19\Enums\SimulationTypeEnum;

use UnexpectedValueException;

/**
 * Enum describing the field a simulation modifies.
 *
 * Protobuf type <code>google.ads.googleads.v19.enums.SimulationTypeEnum.SimulationType</code>
 */
class SimulationType
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
     * The simulation is for a CPC bid.
     *
     * Generated from protobuf enum <code>CPC_BID = 2;</code>
     */
    const CPC_BID = 2;
    /**
     * The simulation is for a CPV bid.
     *
     * Generated from protobuf enum <code>CPV_BID = 3;</code>
     */
    const CPV_BID = 3;
    /**
     * The simulation is for a CPA target.
     *
     * Generated from protobuf enum <code>TARGET_CPA = 4;</code>
     */
    const TARGET_CPA = 4;
    /**
     * The simulation is for a bid modifier.
     *
     * Generated from protobuf enum <code>BID_MODIFIER = 5;</code>
     */
    const BID_MODIFIER = 5;
    /**
     * The simulation is for a ROAS target.
     *
     * Generated from protobuf enum <code>TARGET_ROAS = 6;</code>
     */
    const TARGET_ROAS = 6;
    /**
     * The simulation is for a percent CPC bid.
     *
     * Generated from protobuf enum <code>PERCENT_CPC_BID = 7;</code>
     */
    const PERCENT_CPC_BID = 7;
    /**
     * The simulation is for an impression share target.
     *
     * Generated from protobuf enum <code>TARGET_IMPRESSION_SHARE = 8;</code>
     */
    const TARGET_IMPRESSION_SHARE = 8;
    /**
     * The simulation is for a budget.
     *
     * Generated from protobuf enum <code>BUDGET = 9;</code>
     */
    const BUDGET = 9;

    private static $valueToName = [
        self::UNSPECIFIED => 'UNSPECIFIED',
        self::UNKNOWN => 'UNKNOWN',
        self::CPC_BID => 'CPC_BID',
        self::CPV_BID => 'CPV_BID',
        self::TARGET_CPA => 'TARGET_CPA',
        self::BID_MODIFIER => 'BID_MODIFIER',
        self::TARGET_ROAS => 'TARGET_ROAS',
        self::PERCENT_CPC_BID => 'PERCENT_CPC_BID',
        self::TARGET_IMPRESSION_SHARE => 'TARGET_IMPRESSION_SHARE',
        self::BUDGET => 'BUDGET',
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
class_alias(SimulationType::class, \Google\Ads\GoogleAds\V19\Enums\SimulationTypeEnum_SimulationType::class);

