<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/enums/webpage_condition_operand.proto

namespace Google\Ads\GoogleAds\V19\Enums\WebpageConditionOperandEnum;

use UnexpectedValueException;

/**
 * The webpage condition operand in webpage criterion.
 *
 * Protobuf type <code>google.ads.googleads.v19.enums.WebpageConditionOperandEnum.WebpageConditionOperand</code>
 */
class WebpageConditionOperand
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
     * Operand denoting a webpage URL targeting condition.
     *
     * Generated from protobuf enum <code>URL = 2;</code>
     */
    const URL = 2;
    /**
     * Operand denoting a webpage category targeting condition.
     *
     * Generated from protobuf enum <code>CATEGORY = 3;</code>
     */
    const CATEGORY = 3;
    /**
     * Operand denoting a webpage title targeting condition.
     *
     * Generated from protobuf enum <code>PAGE_TITLE = 4;</code>
     */
    const PAGE_TITLE = 4;
    /**
     * Operand denoting a webpage content targeting condition.
     *
     * Generated from protobuf enum <code>PAGE_CONTENT = 5;</code>
     */
    const PAGE_CONTENT = 5;
    /**
     * Operand denoting a webpage custom label targeting condition.
     *
     * Generated from protobuf enum <code>CUSTOM_LABEL = 6;</code>
     */
    const CUSTOM_LABEL = 6;

    private static $valueToName = [
        self::UNSPECIFIED => 'UNSPECIFIED',
        self::UNKNOWN => 'UNKNOWN',
        self::URL => 'URL',
        self::CATEGORY => 'CATEGORY',
        self::PAGE_TITLE => 'PAGE_TITLE',
        self::PAGE_CONTENT => 'PAGE_CONTENT',
        self::CUSTOM_LABEL => 'CUSTOM_LABEL',
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
class_alias(WebpageConditionOperand::class, \Google\Ads\GoogleAds\V19\Enums\WebpageConditionOperandEnum_WebpageConditionOperand::class);

