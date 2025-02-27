<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/enums/chain_relationship_type.proto

namespace Google\Ads\GoogleAds\V19\Enums\ChainRelationshipTypeEnum;

use UnexpectedValueException;

/**
 * Possible types of a relationship.
 *
 * Protobuf type <code>google.ads.googleads.v19.enums.ChainRelationshipTypeEnum.ChainRelationshipType</code>
 */
class ChainRelationshipType
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
     * Auto dealer relationship.
     *
     * Generated from protobuf enum <code>AUTO_DEALERS = 2;</code>
     */
    const AUTO_DEALERS = 2;
    /**
     * General retailer relationship.
     *
     * Generated from protobuf enum <code>GENERAL_RETAILERS = 3;</code>
     */
    const GENERAL_RETAILERS = 3;

    private static $valueToName = [
        self::UNSPECIFIED => 'UNSPECIFIED',
        self::UNKNOWN => 'UNKNOWN',
        self::AUTO_DEALERS => 'AUTO_DEALERS',
        self::GENERAL_RETAILERS => 'GENERAL_RETAILERS',
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
class_alias(ChainRelationshipType::class, \Google\Ads\GoogleAds\V19\Enums\ChainRelationshipTypeEnum_ChainRelationshipType::class);

