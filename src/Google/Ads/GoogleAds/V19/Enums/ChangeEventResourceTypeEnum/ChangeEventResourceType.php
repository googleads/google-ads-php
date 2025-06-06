<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/enums/change_event_resource_type.proto

namespace Google\Ads\GoogleAds\V19\Enums\ChangeEventResourceTypeEnum;

use UnexpectedValueException;

/**
 * Enum listing the resource types support by the ChangeEvent resource.
 *
 * Protobuf type <code>google.ads.googleads.v19.enums.ChangeEventResourceTypeEnum.ChangeEventResourceType</code>
 */
class ChangeEventResourceType
{
    /**
     * No value has been specified.
     *
     * Generated from protobuf enum <code>UNSPECIFIED = 0;</code>
     */
    const UNSPECIFIED = 0;
    /**
     * Used for return value only. Represents an unclassified resource unknown
     * in this version.
     *
     * Generated from protobuf enum <code>UNKNOWN = 1;</code>
     */
    const UNKNOWN = 1;
    /**
     * An Ad resource change.
     *
     * Generated from protobuf enum <code>AD = 2;</code>
     */
    const AD = 2;
    /**
     * An AdGroup resource change.
     *
     * Generated from protobuf enum <code>AD_GROUP = 3;</code>
     */
    const AD_GROUP = 3;
    /**
     * An AdGroupCriterion resource change.
     *
     * Generated from protobuf enum <code>AD_GROUP_CRITERION = 4;</code>
     */
    const AD_GROUP_CRITERION = 4;
    /**
     * A Campaign resource change.
     *
     * Generated from protobuf enum <code>CAMPAIGN = 5;</code>
     */
    const CAMPAIGN = 5;
    /**
     * A CampaignBudget resource change.
     *
     * Generated from protobuf enum <code>CAMPAIGN_BUDGET = 6;</code>
     */
    const CAMPAIGN_BUDGET = 6;
    /**
     * An AdGroupBidModifier resource change.
     *
     * Generated from protobuf enum <code>AD_GROUP_BID_MODIFIER = 7;</code>
     */
    const AD_GROUP_BID_MODIFIER = 7;
    /**
     * A CampaignCriterion resource change.
     *
     * Generated from protobuf enum <code>CAMPAIGN_CRITERION = 8;</code>
     */
    const CAMPAIGN_CRITERION = 8;
    /**
     * A Feed resource change.
     *
     * Generated from protobuf enum <code>FEED = 9;</code>
     */
    const FEED = 9;
    /**
     * A FeedItem resource change.
     *
     * Generated from protobuf enum <code>FEED_ITEM = 10;</code>
     */
    const FEED_ITEM = 10;
    /**
     * A CampaignFeed resource change.
     *
     * Generated from protobuf enum <code>CAMPAIGN_FEED = 11;</code>
     */
    const CAMPAIGN_FEED = 11;
    /**
     * An AdGroupFeed resource change.
     *
     * Generated from protobuf enum <code>AD_GROUP_FEED = 12;</code>
     */
    const AD_GROUP_FEED = 12;
    /**
     * An AdGroupAd resource change.
     *
     * Generated from protobuf enum <code>AD_GROUP_AD = 13;</code>
     */
    const AD_GROUP_AD = 13;
    /**
     * An Asset resource change.
     *
     * Generated from protobuf enum <code>ASSET = 14;</code>
     */
    const ASSET = 14;
    /**
     * A CustomerAsset resource change.
     *
     * Generated from protobuf enum <code>CUSTOMER_ASSET = 15;</code>
     */
    const CUSTOMER_ASSET = 15;
    /**
     * A CampaignAsset resource change.
     *
     * Generated from protobuf enum <code>CAMPAIGN_ASSET = 16;</code>
     */
    const CAMPAIGN_ASSET = 16;
    /**
     * An AdGroupAsset resource change.
     *
     * Generated from protobuf enum <code>AD_GROUP_ASSET = 17;</code>
     */
    const AD_GROUP_ASSET = 17;
    /**
     * An AssetSet resource change.
     *
     * Generated from protobuf enum <code>ASSET_SET = 18;</code>
     */
    const ASSET_SET = 18;
    /**
     * An AssetSetAsset resource change.
     *
     * Generated from protobuf enum <code>ASSET_SET_ASSET = 19;</code>
     */
    const ASSET_SET_ASSET = 19;
    /**
     * A CampaignAssetSet resource change.
     *
     * Generated from protobuf enum <code>CAMPAIGN_ASSET_SET = 20;</code>
     */
    const CAMPAIGN_ASSET_SET = 20;

    private static $valueToName = [
        self::UNSPECIFIED => 'UNSPECIFIED',
        self::UNKNOWN => 'UNKNOWN',
        self::AD => 'AD',
        self::AD_GROUP => 'AD_GROUP',
        self::AD_GROUP_CRITERION => 'AD_GROUP_CRITERION',
        self::CAMPAIGN => 'CAMPAIGN',
        self::CAMPAIGN_BUDGET => 'CAMPAIGN_BUDGET',
        self::AD_GROUP_BID_MODIFIER => 'AD_GROUP_BID_MODIFIER',
        self::CAMPAIGN_CRITERION => 'CAMPAIGN_CRITERION',
        self::FEED => 'FEED',
        self::FEED_ITEM => 'FEED_ITEM',
        self::CAMPAIGN_FEED => 'CAMPAIGN_FEED',
        self::AD_GROUP_FEED => 'AD_GROUP_FEED',
        self::AD_GROUP_AD => 'AD_GROUP_AD',
        self::ASSET => 'ASSET',
        self::CUSTOMER_ASSET => 'CUSTOMER_ASSET',
        self::CAMPAIGN_ASSET => 'CAMPAIGN_ASSET',
        self::AD_GROUP_ASSET => 'AD_GROUP_ASSET',
        self::ASSET_SET => 'ASSET_SET',
        self::ASSET_SET_ASSET => 'ASSET_SET_ASSET',
        self::CAMPAIGN_ASSET_SET => 'CAMPAIGN_ASSET_SET',
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
class_alias(ChangeEventResourceType::class, \Google\Ads\GoogleAds\V19\Enums\ChangeEventResourceTypeEnum_ChangeEventResourceType::class);

