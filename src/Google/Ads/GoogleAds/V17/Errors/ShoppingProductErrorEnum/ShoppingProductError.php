<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v17/errors/shopping_product_error.proto

namespace Google\Ads\GoogleAds\V17\Errors\ShoppingProductErrorEnum;

use UnexpectedValueException;

/**
 * Enum describing possible errors querying shopping product.
 *
 * Protobuf type <code>google.ads.googleads.v17.errors.ShoppingProductErrorEnum.ShoppingProductError</code>
 */
class ShoppingProductError
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
     * A filter on the `campaign` resource name is missing.
     *
     * Generated from protobuf enum <code>MISSING_CAMPAIGN_FILTER = 2;</code>
     */
    const MISSING_CAMPAIGN_FILTER = 2;
    /**
     * A filter on the `ad_group` resource name is missing.
     *
     * Generated from protobuf enum <code>MISSING_AD_GROUP_FILTER = 3;</code>
     */
    const MISSING_AD_GROUP_FILTER = 3;
    /**
     * Date segmentation is not supported.
     *
     * Generated from protobuf enum <code>UNSUPPORTED_DATE_SEGMENTATION = 4;</code>
     */
    const UNSUPPORTED_DATE_SEGMENTATION = 4;

    private static $valueToName = [
        self::UNSPECIFIED => 'UNSPECIFIED',
        self::UNKNOWN => 'UNKNOWN',
        self::MISSING_CAMPAIGN_FILTER => 'MISSING_CAMPAIGN_FILTER',
        self::MISSING_AD_GROUP_FILTER => 'MISSING_AD_GROUP_FILTER',
        self::UNSUPPORTED_DATE_SEGMENTATION => 'UNSUPPORTED_DATE_SEGMENTATION',
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
class_alias(ShoppingProductError::class, \Google\Ads\GoogleAds\V17\Errors\ShoppingProductErrorEnum_ShoppingProductError::class);
