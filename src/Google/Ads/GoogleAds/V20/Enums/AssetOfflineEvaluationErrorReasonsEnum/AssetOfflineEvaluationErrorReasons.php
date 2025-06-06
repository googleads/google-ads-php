<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/enums/asset_offline_evaluation_error_reasons.proto

namespace Google\Ads\GoogleAds\V20\Enums\AssetOfflineEvaluationErrorReasonsEnum;

use UnexpectedValueException;

/**
 * Enum describing the quality evaluation disapproval reason of an asset.
 *
 * Protobuf type <code>google.ads.googleads.v20.enums.AssetOfflineEvaluationErrorReasonsEnum.AssetOfflineEvaluationErrorReasons</code>
 */
class AssetOfflineEvaluationErrorReasons
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
     * One or more descriptions repeats its corresponding row header.
     *
     * Generated from protobuf enum <code>PRICE_ASSET_DESCRIPTION_REPEATS_ROW_HEADER = 2;</code>
     */
    const PRICE_ASSET_DESCRIPTION_REPEATS_ROW_HEADER = 2;
    /**
     * Price asset contains repetitive headers.
     *
     * Generated from protobuf enum <code>PRICE_ASSET_REPETITIVE_HEADERS = 3;</code>
     */
    const PRICE_ASSET_REPETITIVE_HEADERS = 3;
    /**
     * Price item header is not relevant to the price type.
     *
     * Generated from protobuf enum <code>PRICE_ASSET_HEADER_INCOMPATIBLE_WITH_PRICE_TYPE = 4;</code>
     */
    const PRICE_ASSET_HEADER_INCOMPATIBLE_WITH_PRICE_TYPE = 4;
    /**
     * Price item description is not relevant to the item header.
     *
     * Generated from protobuf enum <code>PRICE_ASSET_DESCRIPTION_INCOMPATIBLE_WITH_ITEM_HEADER = 5;</code>
     */
    const PRICE_ASSET_DESCRIPTION_INCOMPATIBLE_WITH_ITEM_HEADER = 5;
    /**
     * Price asset has a price qualifier in a description.
     *
     * Generated from protobuf enum <code>PRICE_ASSET_DESCRIPTION_HAS_PRICE_QUALIFIER = 6;</code>
     */
    const PRICE_ASSET_DESCRIPTION_HAS_PRICE_QUALIFIER = 6;
    /**
     * Unsupported language for price assets
     *
     * Generated from protobuf enum <code>PRICE_ASSET_UNSUPPORTED_LANGUAGE = 7;</code>
     */
    const PRICE_ASSET_UNSUPPORTED_LANGUAGE = 7;
    /**
     * Human raters identified an issue with the price asset that isn't captured
     * by other error reasons. The primary purpose of this value is to represent
     * legacy FeedItem disapprovals that are no longer produced.
     *
     * Generated from protobuf enum <code>PRICE_ASSET_OTHER_ERROR = 8;</code>
     */
    const PRICE_ASSET_OTHER_ERROR = 8;

    private static $valueToName = [
        self::UNSPECIFIED => 'UNSPECIFIED',
        self::UNKNOWN => 'UNKNOWN',
        self::PRICE_ASSET_DESCRIPTION_REPEATS_ROW_HEADER => 'PRICE_ASSET_DESCRIPTION_REPEATS_ROW_HEADER',
        self::PRICE_ASSET_REPETITIVE_HEADERS => 'PRICE_ASSET_REPETITIVE_HEADERS',
        self::PRICE_ASSET_HEADER_INCOMPATIBLE_WITH_PRICE_TYPE => 'PRICE_ASSET_HEADER_INCOMPATIBLE_WITH_PRICE_TYPE',
        self::PRICE_ASSET_DESCRIPTION_INCOMPATIBLE_WITH_ITEM_HEADER => 'PRICE_ASSET_DESCRIPTION_INCOMPATIBLE_WITH_ITEM_HEADER',
        self::PRICE_ASSET_DESCRIPTION_HAS_PRICE_QUALIFIER => 'PRICE_ASSET_DESCRIPTION_HAS_PRICE_QUALIFIER',
        self::PRICE_ASSET_UNSUPPORTED_LANGUAGE => 'PRICE_ASSET_UNSUPPORTED_LANGUAGE',
        self::PRICE_ASSET_OTHER_ERROR => 'PRICE_ASSET_OTHER_ERROR',
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
class_alias(AssetOfflineEvaluationErrorReasons::class, \Google\Ads\GoogleAds\V20\Enums\AssetOfflineEvaluationErrorReasonsEnum_AssetOfflineEvaluationErrorReasons::class);

