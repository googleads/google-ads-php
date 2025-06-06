<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/enums/shopping_add_products_to_campaign_recommendation_enum.proto

namespace Google\Ads\GoogleAds\V20\Enums\ShoppingAddProductsToCampaignRecommendationEnum;

use UnexpectedValueException;

/**
 * Issues that results in a shopping campaign targeting zero products.
 *
 * Protobuf type <code>google.ads.googleads.v20.enums.ShoppingAddProductsToCampaignRecommendationEnum.Reason</code>
 */
class Reason
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
     * The Merchant Center account does not have any submitted products.
     *
     * Generated from protobuf enum <code>MERCHANT_CENTER_ACCOUNT_HAS_NO_SUBMITTED_PRODUCTS = 2;</code>
     */
    const MERCHANT_CENTER_ACCOUNT_HAS_NO_SUBMITTED_PRODUCTS = 2;
    /**
     * The Merchant Center account does not have any submitted products in the
     * feed.
     *
     * Generated from protobuf enum <code>MERCHANT_CENTER_ACCOUNT_HAS_NO_SUBMITTED_PRODUCTS_IN_FEED = 3;</code>
     */
    const MERCHANT_CENTER_ACCOUNT_HAS_NO_SUBMITTED_PRODUCTS_IN_FEED = 3;
    /**
     * The Google Ads account has active campaign filters that prevents
     * inclusion of offers in the campaign.
     *
     * Generated from protobuf enum <code>ADS_ACCOUNT_EXCLUDES_OFFERS_FROM_CAMPAIGN = 4;</code>
     */
    const ADS_ACCOUNT_EXCLUDES_OFFERS_FROM_CAMPAIGN = 4;
    /**
     * All products available have been explicitly excluded from
     * being targeted by the campaign.
     *
     * Generated from protobuf enum <code>ALL_PRODUCTS_ARE_EXCLUDED_FROM_CAMPAIGN = 5;</code>
     */
    const ALL_PRODUCTS_ARE_EXCLUDED_FROM_CAMPAIGN = 5;

    private static $valueToName = [
        self::UNSPECIFIED => 'UNSPECIFIED',
        self::UNKNOWN => 'UNKNOWN',
        self::MERCHANT_CENTER_ACCOUNT_HAS_NO_SUBMITTED_PRODUCTS => 'MERCHANT_CENTER_ACCOUNT_HAS_NO_SUBMITTED_PRODUCTS',
        self::MERCHANT_CENTER_ACCOUNT_HAS_NO_SUBMITTED_PRODUCTS_IN_FEED => 'MERCHANT_CENTER_ACCOUNT_HAS_NO_SUBMITTED_PRODUCTS_IN_FEED',
        self::ADS_ACCOUNT_EXCLUDES_OFFERS_FROM_CAMPAIGN => 'ADS_ACCOUNT_EXCLUDES_OFFERS_FROM_CAMPAIGN',
        self::ALL_PRODUCTS_ARE_EXCLUDED_FROM_CAMPAIGN => 'ALL_PRODUCTS_ARE_EXCLUDED_FROM_CAMPAIGN',
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
class_alias(Reason::class, \Google\Ads\GoogleAds\V20\Enums\ShoppingAddProductsToCampaignRecommendationEnum_Reason::class);

