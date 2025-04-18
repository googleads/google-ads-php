<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v18/enums/feed_item_quality_disapproval_reason.proto

namespace Google\Ads\GoogleAds\V18\Enums\FeedItemQualityDisapprovalReasonEnum;

use UnexpectedValueException;

/**
 * The possible quality evaluation disapproval reasons of a feed item.
 *
 * Protobuf type <code>google.ads.googleads.v18.enums.FeedItemQualityDisapprovalReasonEnum.FeedItemQualityDisapprovalReason</code>
 */
class FeedItemQualityDisapprovalReason
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
     * Price contains repetitive headers.
     *
     * Generated from protobuf enum <code>PRICE_TABLE_REPETITIVE_HEADERS = 2;</code>
     */
    const PRICE_TABLE_REPETITIVE_HEADERS = 2;
    /**
     * Price contains repetitive description.
     *
     * Generated from protobuf enum <code>PRICE_TABLE_REPETITIVE_DESCRIPTION = 3;</code>
     */
    const PRICE_TABLE_REPETITIVE_DESCRIPTION = 3;
    /**
     * Price contains inconsistent items.
     *
     * Generated from protobuf enum <code>PRICE_TABLE_INCONSISTENT_ROWS = 4;</code>
     */
    const PRICE_TABLE_INCONSISTENT_ROWS = 4;
    /**
     * Price contains qualifiers in description.
     *
     * Generated from protobuf enum <code>PRICE_DESCRIPTION_HAS_PRICE_QUALIFIERS = 5;</code>
     */
    const PRICE_DESCRIPTION_HAS_PRICE_QUALIFIERS = 5;
    /**
     * Price contains an unsupported language.
     *
     * Generated from protobuf enum <code>PRICE_UNSUPPORTED_LANGUAGE = 6;</code>
     */
    const PRICE_UNSUPPORTED_LANGUAGE = 6;
    /**
     * Price item header is not relevant to the price type.
     *
     * Generated from protobuf enum <code>PRICE_TABLE_ROW_HEADER_TABLE_TYPE_MISMATCH = 7;</code>
     */
    const PRICE_TABLE_ROW_HEADER_TABLE_TYPE_MISMATCH = 7;
    /**
     * Price item header has promotional text.
     *
     * Generated from protobuf enum <code>PRICE_TABLE_ROW_HEADER_HAS_PROMOTIONAL_TEXT = 8;</code>
     */
    const PRICE_TABLE_ROW_HEADER_HAS_PROMOTIONAL_TEXT = 8;
    /**
     * Price item description is not relevant to the item header.
     *
     * Generated from protobuf enum <code>PRICE_TABLE_ROW_DESCRIPTION_NOT_RELEVANT = 9;</code>
     */
    const PRICE_TABLE_ROW_DESCRIPTION_NOT_RELEVANT = 9;
    /**
     * Price item description contains promotional text.
     *
     * Generated from protobuf enum <code>PRICE_TABLE_ROW_DESCRIPTION_HAS_PROMOTIONAL_TEXT = 10;</code>
     */
    const PRICE_TABLE_ROW_DESCRIPTION_HAS_PROMOTIONAL_TEXT = 10;
    /**
     * Price item header and description are repetitive.
     *
     * Generated from protobuf enum <code>PRICE_TABLE_ROW_HEADER_DESCRIPTION_REPETITIVE = 11;</code>
     */
    const PRICE_TABLE_ROW_HEADER_DESCRIPTION_REPETITIVE = 11;
    /**
     * Price item is in a foreign language, nonsense, or can't be rated.
     *
     * Generated from protobuf enum <code>PRICE_TABLE_ROW_UNRATEABLE = 12;</code>
     */
    const PRICE_TABLE_ROW_UNRATEABLE = 12;
    /**
     * Price item price is invalid or inaccurate.
     *
     * Generated from protobuf enum <code>PRICE_TABLE_ROW_PRICE_INVALID = 13;</code>
     */
    const PRICE_TABLE_ROW_PRICE_INVALID = 13;
    /**
     * Price item URL is invalid or irrelevant.
     *
     * Generated from protobuf enum <code>PRICE_TABLE_ROW_URL_INVALID = 14;</code>
     */
    const PRICE_TABLE_ROW_URL_INVALID = 14;
    /**
     * Price item header or description has price.
     *
     * Generated from protobuf enum <code>PRICE_HEADER_OR_DESCRIPTION_HAS_PRICE = 15;</code>
     */
    const PRICE_HEADER_OR_DESCRIPTION_HAS_PRICE = 15;
    /**
     * Structured snippet values do not match the header.
     *
     * Generated from protobuf enum <code>STRUCTURED_SNIPPETS_HEADER_POLICY_VIOLATED = 16;</code>
     */
    const STRUCTURED_SNIPPETS_HEADER_POLICY_VIOLATED = 16;
    /**
     * Structured snippet values are repeated.
     *
     * Generated from protobuf enum <code>STRUCTURED_SNIPPETS_REPEATED_VALUES = 17;</code>
     */
    const STRUCTURED_SNIPPETS_REPEATED_VALUES = 17;
    /**
     * Structured snippet values violate editorial guidelines like punctuation.
     *
     * Generated from protobuf enum <code>STRUCTURED_SNIPPETS_EDITORIAL_GUIDELINES = 18;</code>
     */
    const STRUCTURED_SNIPPETS_EDITORIAL_GUIDELINES = 18;
    /**
     * Structured snippet contain promotional text.
     *
     * Generated from protobuf enum <code>STRUCTURED_SNIPPETS_HAS_PROMOTIONAL_TEXT = 19;</code>
     */
    const STRUCTURED_SNIPPETS_HAS_PROMOTIONAL_TEXT = 19;

    private static $valueToName = [
        self::UNSPECIFIED => 'UNSPECIFIED',
        self::UNKNOWN => 'UNKNOWN',
        self::PRICE_TABLE_REPETITIVE_HEADERS => 'PRICE_TABLE_REPETITIVE_HEADERS',
        self::PRICE_TABLE_REPETITIVE_DESCRIPTION => 'PRICE_TABLE_REPETITIVE_DESCRIPTION',
        self::PRICE_TABLE_INCONSISTENT_ROWS => 'PRICE_TABLE_INCONSISTENT_ROWS',
        self::PRICE_DESCRIPTION_HAS_PRICE_QUALIFIERS => 'PRICE_DESCRIPTION_HAS_PRICE_QUALIFIERS',
        self::PRICE_UNSUPPORTED_LANGUAGE => 'PRICE_UNSUPPORTED_LANGUAGE',
        self::PRICE_TABLE_ROW_HEADER_TABLE_TYPE_MISMATCH => 'PRICE_TABLE_ROW_HEADER_TABLE_TYPE_MISMATCH',
        self::PRICE_TABLE_ROW_HEADER_HAS_PROMOTIONAL_TEXT => 'PRICE_TABLE_ROW_HEADER_HAS_PROMOTIONAL_TEXT',
        self::PRICE_TABLE_ROW_DESCRIPTION_NOT_RELEVANT => 'PRICE_TABLE_ROW_DESCRIPTION_NOT_RELEVANT',
        self::PRICE_TABLE_ROW_DESCRIPTION_HAS_PROMOTIONAL_TEXT => 'PRICE_TABLE_ROW_DESCRIPTION_HAS_PROMOTIONAL_TEXT',
        self::PRICE_TABLE_ROW_HEADER_DESCRIPTION_REPETITIVE => 'PRICE_TABLE_ROW_HEADER_DESCRIPTION_REPETITIVE',
        self::PRICE_TABLE_ROW_UNRATEABLE => 'PRICE_TABLE_ROW_UNRATEABLE',
        self::PRICE_TABLE_ROW_PRICE_INVALID => 'PRICE_TABLE_ROW_PRICE_INVALID',
        self::PRICE_TABLE_ROW_URL_INVALID => 'PRICE_TABLE_ROW_URL_INVALID',
        self::PRICE_HEADER_OR_DESCRIPTION_HAS_PRICE => 'PRICE_HEADER_OR_DESCRIPTION_HAS_PRICE',
        self::STRUCTURED_SNIPPETS_HEADER_POLICY_VIOLATED => 'STRUCTURED_SNIPPETS_HEADER_POLICY_VIOLATED',
        self::STRUCTURED_SNIPPETS_REPEATED_VALUES => 'STRUCTURED_SNIPPETS_REPEATED_VALUES',
        self::STRUCTURED_SNIPPETS_EDITORIAL_GUIDELINES => 'STRUCTURED_SNIPPETS_EDITORIAL_GUIDELINES',
        self::STRUCTURED_SNIPPETS_HAS_PROMOTIONAL_TEXT => 'STRUCTURED_SNIPPETS_HAS_PROMOTIONAL_TEXT',
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
class_alias(FeedItemQualityDisapprovalReason::class, \Google\Ads\GoogleAds\V18\Enums\FeedItemQualityDisapprovalReasonEnum_FeedItemQualityDisapprovalReason::class);

