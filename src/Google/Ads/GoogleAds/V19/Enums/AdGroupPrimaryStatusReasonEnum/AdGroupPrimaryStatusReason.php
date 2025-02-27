<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/enums/ad_group_primary_status_reason.proto

namespace Google\Ads\GoogleAds\V19\Enums\AdGroupPrimaryStatusReasonEnum;

use UnexpectedValueException;

/**
 * Possible ad group status reasons.
 *
 * Protobuf type <code>google.ads.googleads.v19.enums.AdGroupPrimaryStatusReasonEnum.AdGroupPrimaryStatusReason</code>
 */
class AdGroupPrimaryStatusReason
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
     * The user-specified campaign status is removed. Contributes to
     * AdGroupPrimaryStatus.NOT_ELIGIBLE.
     *
     * Generated from protobuf enum <code>CAMPAIGN_REMOVED = 2;</code>
     */
    const CAMPAIGN_REMOVED = 2;
    /**
     * The user-specified campaign status is paused. Contributes to
     * AdGroupPrimaryStatus.NOT_ELIGIBLE.
     *
     * Generated from protobuf enum <code>CAMPAIGN_PAUSED = 3;</code>
     */
    const CAMPAIGN_PAUSED = 3;
    /**
     * The user-specified time for this campaign to start is in the future.
     * Contributes to AdGroupPrimaryStatus.NOT_ELIGIBLE
     *
     * Generated from protobuf enum <code>CAMPAIGN_PENDING = 4;</code>
     */
    const CAMPAIGN_PENDING = 4;
    /**
     * The user-specified time for this campaign to end has passed. Contributes
     * to AdGroupPrimaryStatus.NOT_ELIGIBLE.
     *
     * Generated from protobuf enum <code>CAMPAIGN_ENDED = 5;</code>
     */
    const CAMPAIGN_ENDED = 5;
    /**
     * The user-specified ad group status is paused. Contributes to
     * AdGroupPrimaryStatus.PAUSED.
     *
     * Generated from protobuf enum <code>AD_GROUP_PAUSED = 6;</code>
     */
    const AD_GROUP_PAUSED = 6;
    /**
     * The user-specified ad group status is removed. Contributes to
     * AdGroupPrimaryStatus.REMOVED.
     *
     * Generated from protobuf enum <code>AD_GROUP_REMOVED = 7;</code>
     */
    const AD_GROUP_REMOVED = 7;
    /**
     * The construction of this ad group is not yet complete. Contributes to
     * AdGroupPrimaryStatus.NOT_ELIGIBLE.
     *
     * Generated from protobuf enum <code>AD_GROUP_INCOMPLETE = 8;</code>
     */
    const AD_GROUP_INCOMPLETE = 8;
    /**
     * The user-specified keyword statuses in this ad group are all paused.
     * Contributes to AdGroupPrimaryStatus.NOT_ELIGIBLE.
     *
     * Generated from protobuf enum <code>KEYWORDS_PAUSED = 9;</code>
     */
    const KEYWORDS_PAUSED = 9;
    /**
     * No eligible keywords exist in this ad group. Contributes to
     * AdGroupPrimaryStatus.NOT_ELIGIBLE.
     *
     * Generated from protobuf enum <code>NO_KEYWORDS = 10;</code>
     */
    const NO_KEYWORDS = 10;
    /**
     * The user-specified ad group ads statuses in this ad group are all paused.
     * Contributes to AdGroupPrimaryStatus.NOT_ELIGIBLE.
     *
     * Generated from protobuf enum <code>AD_GROUP_ADS_PAUSED = 11;</code>
     */
    const AD_GROUP_ADS_PAUSED = 11;
    /**
     * No eligible ad group ads exist in this ad group. Contributes to
     * AdGroupPrimaryStatus.NOT_ELIGIBLE.
     *
     * Generated from protobuf enum <code>NO_AD_GROUP_ADS = 12;</code>
     */
    const NO_AD_GROUP_ADS = 12;
    /**
     * Policy status reason when at least one ad is disapproved. Contributes to
     * multiple AdGroupPrimaryStatus.
     *
     * Generated from protobuf enum <code>HAS_ADS_DISAPPROVED = 13;</code>
     */
    const HAS_ADS_DISAPPROVED = 13;
    /**
     * Policy status reason when at least one ad is limited by policy.
     * Contributes to multiple AdGroupPrimaryStatus.
     *
     * Generated from protobuf enum <code>HAS_ADS_LIMITED_BY_POLICY = 14;</code>
     */
    const HAS_ADS_LIMITED_BY_POLICY = 14;
    /**
     * Policy status reason when most ads are pending review. Contributes to
     * AdGroupPrimaryStatus.PENDING.
     *
     * Generated from protobuf enum <code>MOST_ADS_UNDER_REVIEW = 15;</code>
     */
    const MOST_ADS_UNDER_REVIEW = 15;
    /**
     * The AdGroup belongs to a Draft campaign. Contributes to
     * AdGroupPrimaryStatus.NOT_ELIGIBLE.
     *
     * Generated from protobuf enum <code>CAMPAIGN_DRAFT = 16;</code>
     */
    const CAMPAIGN_DRAFT = 16;
    /**
     * Ad group has been paused due to prolonged low activity in serving.
     * Contributes to AdGroupPrimaryStatus.PAUSED.
     *
     * Generated from protobuf enum <code>AD_GROUP_PAUSED_DUE_TO_LOW_ACTIVITY = 19;</code>
     */
    const AD_GROUP_PAUSED_DUE_TO_LOW_ACTIVITY = 19;

    private static $valueToName = [
        self::UNSPECIFIED => 'UNSPECIFIED',
        self::UNKNOWN => 'UNKNOWN',
        self::CAMPAIGN_REMOVED => 'CAMPAIGN_REMOVED',
        self::CAMPAIGN_PAUSED => 'CAMPAIGN_PAUSED',
        self::CAMPAIGN_PENDING => 'CAMPAIGN_PENDING',
        self::CAMPAIGN_ENDED => 'CAMPAIGN_ENDED',
        self::AD_GROUP_PAUSED => 'AD_GROUP_PAUSED',
        self::AD_GROUP_REMOVED => 'AD_GROUP_REMOVED',
        self::AD_GROUP_INCOMPLETE => 'AD_GROUP_INCOMPLETE',
        self::KEYWORDS_PAUSED => 'KEYWORDS_PAUSED',
        self::NO_KEYWORDS => 'NO_KEYWORDS',
        self::AD_GROUP_ADS_PAUSED => 'AD_GROUP_ADS_PAUSED',
        self::NO_AD_GROUP_ADS => 'NO_AD_GROUP_ADS',
        self::HAS_ADS_DISAPPROVED => 'HAS_ADS_DISAPPROVED',
        self::HAS_ADS_LIMITED_BY_POLICY => 'HAS_ADS_LIMITED_BY_POLICY',
        self::MOST_ADS_UNDER_REVIEW => 'MOST_ADS_UNDER_REVIEW',
        self::CAMPAIGN_DRAFT => 'CAMPAIGN_DRAFT',
        self::AD_GROUP_PAUSED_DUE_TO_LOW_ACTIVITY => 'AD_GROUP_PAUSED_DUE_TO_LOW_ACTIVITY',
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
class_alias(AdGroupPrimaryStatusReason::class, \Google\Ads\GoogleAds\V19\Enums\AdGroupPrimaryStatusReasonEnum_AdGroupPrimaryStatusReason::class);

