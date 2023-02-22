<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v13/resources/change_status.proto

namespace Google\Ads\GoogleAds\V13\Resources;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Describes the status of returned resource. ChangeStatus could have up to 3
 * minutes delay to reflect a new change.
 *
 * Generated from protobuf message <code>google.ads.googleads.v13.resources.ChangeStatus</code>
 */
class ChangeStatus extends \Google\Protobuf\Internal\Message
{
    /**
     * Output only. The resource name of the change status.
     * Change status resource names have the form:
     * `customers/{customer_id}/changeStatus/{change_status_id}`
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     */
    protected $resource_name = '';
    /**
     * Output only. Time at which the most recent change has occurred on this
     * resource.
     *
     * Generated from protobuf field <code>optional string last_change_date_time = 24 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $last_change_date_time = null;
    /**
     * Output only. Represents the type of the changed resource. This dictates
     * what fields will be set. For example, for AD_GROUP, campaign and ad_group
     * fields will be set.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v13.enums.ChangeStatusResourceTypeEnum.ChangeStatusResourceType resource_type = 4 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $resource_type = 0;
    /**
     * Output only. The Campaign affected by this change.
     *
     * Generated from protobuf field <code>optional string campaign = 17 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     */
    protected $campaign = null;
    /**
     * Output only. The AdGroup affected by this change.
     *
     * Generated from protobuf field <code>optional string ad_group = 18 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     */
    protected $ad_group = null;
    /**
     * Output only. Represents the status of the changed resource.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v13.enums.ChangeStatusOperationEnum.ChangeStatusOperation resource_status = 8 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $resource_status = 0;
    /**
     * Output only. The AdGroupAd affected by this change.
     *
     * Generated from protobuf field <code>optional string ad_group_ad = 25 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     */
    protected $ad_group_ad = null;
    /**
     * Output only. The AdGroupCriterion affected by this change.
     *
     * Generated from protobuf field <code>optional string ad_group_criterion = 26 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     */
    protected $ad_group_criterion = null;
    /**
     * Output only. The CampaignCriterion affected by this change.
     *
     * Generated from protobuf field <code>optional string campaign_criterion = 27 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     */
    protected $campaign_criterion = null;
    /**
     * Output only. The Feed affected by this change.
     *
     * Generated from protobuf field <code>optional string feed = 28 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     */
    protected $feed = null;
    /**
     * Output only. The FeedItem affected by this change.
     *
     * Generated from protobuf field <code>optional string feed_item = 29 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     */
    protected $feed_item = null;
    /**
     * Output only. The AdGroupFeed affected by this change.
     *
     * Generated from protobuf field <code>optional string ad_group_feed = 30 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     */
    protected $ad_group_feed = null;
    /**
     * Output only. The CampaignFeed affected by this change.
     *
     * Generated from protobuf field <code>optional string campaign_feed = 31 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     */
    protected $campaign_feed = null;
    /**
     * Output only. The AdGroupBidModifier affected by this change.
     *
     * Generated from protobuf field <code>optional string ad_group_bid_modifier = 32 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     */
    protected $ad_group_bid_modifier = null;
    /**
     * Output only. The SharedSet affected by this change.
     *
     * Generated from protobuf field <code>string shared_set = 33 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     */
    protected $shared_set = '';
    /**
     * Output only. The CampaignSharedSet affected by this change.
     *
     * Generated from protobuf field <code>string campaign_shared_set = 34 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     */
    protected $campaign_shared_set = '';
    /**
     * Output only. The Asset affected by this change.
     *
     * Generated from protobuf field <code>string asset = 35 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     */
    protected $asset = '';
    /**
     * Output only. The CustomerAsset affected by this change.
     *
     * Generated from protobuf field <code>string customer_asset = 36 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     */
    protected $customer_asset = '';
    /**
     * Output only. The CampaignAsset affected by this change.
     *
     * Generated from protobuf field <code>string campaign_asset = 37 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     */
    protected $campaign_asset = '';
    /**
     * Output only. The AdGroupAsset affected by this change.
     *
     * Generated from protobuf field <code>string ad_group_asset = 38 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     */
    protected $ad_group_asset = '';
    /**
     * Output only. The CombinedAudience affected by this change.
     *
     * Generated from protobuf field <code>string combined_audience = 40 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     */
    protected $combined_audience = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $resource_name
     *           Output only. The resource name of the change status.
     *           Change status resource names have the form:
     *           `customers/{customer_id}/changeStatus/{change_status_id}`
     *     @type string $last_change_date_time
     *           Output only. Time at which the most recent change has occurred on this
     *           resource.
     *     @type int $resource_type
     *           Output only. Represents the type of the changed resource. This dictates
     *           what fields will be set. For example, for AD_GROUP, campaign and ad_group
     *           fields will be set.
     *     @type string $campaign
     *           Output only. The Campaign affected by this change.
     *     @type string $ad_group
     *           Output only. The AdGroup affected by this change.
     *     @type int $resource_status
     *           Output only. Represents the status of the changed resource.
     *     @type string $ad_group_ad
     *           Output only. The AdGroupAd affected by this change.
     *     @type string $ad_group_criterion
     *           Output only. The AdGroupCriterion affected by this change.
     *     @type string $campaign_criterion
     *           Output only. The CampaignCriterion affected by this change.
     *     @type string $feed
     *           Output only. The Feed affected by this change.
     *     @type string $feed_item
     *           Output only. The FeedItem affected by this change.
     *     @type string $ad_group_feed
     *           Output only. The AdGroupFeed affected by this change.
     *     @type string $campaign_feed
     *           Output only. The CampaignFeed affected by this change.
     *     @type string $ad_group_bid_modifier
     *           Output only. The AdGroupBidModifier affected by this change.
     *     @type string $shared_set
     *           Output only. The SharedSet affected by this change.
     *     @type string $campaign_shared_set
     *           Output only. The CampaignSharedSet affected by this change.
     *     @type string $asset
     *           Output only. The Asset affected by this change.
     *     @type string $customer_asset
     *           Output only. The CustomerAsset affected by this change.
     *     @type string $campaign_asset
     *           Output only. The CampaignAsset affected by this change.
     *     @type string $ad_group_asset
     *           Output only. The AdGroupAsset affected by this change.
     *     @type string $combined_audience
     *           Output only. The CombinedAudience affected by this change.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V13\Resources\ChangeStatus::initOnce();
        parent::__construct($data);
    }

    /**
     * Output only. The resource name of the change status.
     * Change status resource names have the form:
     * `customers/{customer_id}/changeStatus/{change_status_id}`
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getResourceName()
    {
        return $this->resource_name;
    }

    /**
     * Output only. The resource name of the change status.
     * Change status resource names have the form:
     * `customers/{customer_id}/changeStatus/{change_status_id}`
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     * @param string $var
     * @return $this
     */
    public function setResourceName($var)
    {
        GPBUtil::checkString($var, True);
        $this->resource_name = $var;

        return $this;
    }

    /**
     * Output only. Time at which the most recent change has occurred on this
     * resource.
     *
     * Generated from protobuf field <code>optional string last_change_date_time = 24 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return string
     */
    public function getLastChangeDateTime()
    {
        return isset($this->last_change_date_time) ? $this->last_change_date_time : '';
    }

    public function hasLastChangeDateTime()
    {
        return isset($this->last_change_date_time);
    }

    public function clearLastChangeDateTime()
    {
        unset($this->last_change_date_time);
    }

    /**
     * Output only. Time at which the most recent change has occurred on this
     * resource.
     *
     * Generated from protobuf field <code>optional string last_change_date_time = 24 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param string $var
     * @return $this
     */
    public function setLastChangeDateTime($var)
    {
        GPBUtil::checkString($var, True);
        $this->last_change_date_time = $var;

        return $this;
    }

    /**
     * Output only. Represents the type of the changed resource. This dictates
     * what fields will be set. For example, for AD_GROUP, campaign and ad_group
     * fields will be set.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v13.enums.ChangeStatusResourceTypeEnum.ChangeStatusResourceType resource_type = 4 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return int
     */
    public function getResourceType()
    {
        return $this->resource_type;
    }

    /**
     * Output only. Represents the type of the changed resource. This dictates
     * what fields will be set. For example, for AD_GROUP, campaign and ad_group
     * fields will be set.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v13.enums.ChangeStatusResourceTypeEnum.ChangeStatusResourceType resource_type = 4 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param int $var
     * @return $this
     */
    public function setResourceType($var)
    {
        GPBUtil::checkEnum($var, \Google\Ads\GoogleAds\V13\Enums\ChangeStatusResourceTypeEnum\ChangeStatusResourceType::class);
        $this->resource_type = $var;

        return $this;
    }

    /**
     * Output only. The Campaign affected by this change.
     *
     * Generated from protobuf field <code>optional string campaign = 17 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getCampaign()
    {
        return isset($this->campaign) ? $this->campaign : '';
    }

    public function hasCampaign()
    {
        return isset($this->campaign);
    }

    public function clearCampaign()
    {
        unset($this->campaign);
    }

    /**
     * Output only. The Campaign affected by this change.
     *
     * Generated from protobuf field <code>optional string campaign = 17 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     * @param string $var
     * @return $this
     */
    public function setCampaign($var)
    {
        GPBUtil::checkString($var, True);
        $this->campaign = $var;

        return $this;
    }

    /**
     * Output only. The AdGroup affected by this change.
     *
     * Generated from protobuf field <code>optional string ad_group = 18 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getAdGroup()
    {
        return isset($this->ad_group) ? $this->ad_group : '';
    }

    public function hasAdGroup()
    {
        return isset($this->ad_group);
    }

    public function clearAdGroup()
    {
        unset($this->ad_group);
    }

    /**
     * Output only. The AdGroup affected by this change.
     *
     * Generated from protobuf field <code>optional string ad_group = 18 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     * @param string $var
     * @return $this
     */
    public function setAdGroup($var)
    {
        GPBUtil::checkString($var, True);
        $this->ad_group = $var;

        return $this;
    }

    /**
     * Output only. Represents the status of the changed resource.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v13.enums.ChangeStatusOperationEnum.ChangeStatusOperation resource_status = 8 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return int
     */
    public function getResourceStatus()
    {
        return $this->resource_status;
    }

    /**
     * Output only. Represents the status of the changed resource.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v13.enums.ChangeStatusOperationEnum.ChangeStatusOperation resource_status = 8 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param int $var
     * @return $this
     */
    public function setResourceStatus($var)
    {
        GPBUtil::checkEnum($var, \Google\Ads\GoogleAds\V13\Enums\ChangeStatusOperationEnum\ChangeStatusOperation::class);
        $this->resource_status = $var;

        return $this;
    }

    /**
     * Output only. The AdGroupAd affected by this change.
     *
     * Generated from protobuf field <code>optional string ad_group_ad = 25 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getAdGroupAd()
    {
        return isset($this->ad_group_ad) ? $this->ad_group_ad : '';
    }

    public function hasAdGroupAd()
    {
        return isset($this->ad_group_ad);
    }

    public function clearAdGroupAd()
    {
        unset($this->ad_group_ad);
    }

    /**
     * Output only. The AdGroupAd affected by this change.
     *
     * Generated from protobuf field <code>optional string ad_group_ad = 25 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     * @param string $var
     * @return $this
     */
    public function setAdGroupAd($var)
    {
        GPBUtil::checkString($var, True);
        $this->ad_group_ad = $var;

        return $this;
    }

    /**
     * Output only. The AdGroupCriterion affected by this change.
     *
     * Generated from protobuf field <code>optional string ad_group_criterion = 26 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getAdGroupCriterion()
    {
        return isset($this->ad_group_criterion) ? $this->ad_group_criterion : '';
    }

    public function hasAdGroupCriterion()
    {
        return isset($this->ad_group_criterion);
    }

    public function clearAdGroupCriterion()
    {
        unset($this->ad_group_criterion);
    }

    /**
     * Output only. The AdGroupCriterion affected by this change.
     *
     * Generated from protobuf field <code>optional string ad_group_criterion = 26 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     * @param string $var
     * @return $this
     */
    public function setAdGroupCriterion($var)
    {
        GPBUtil::checkString($var, True);
        $this->ad_group_criterion = $var;

        return $this;
    }

    /**
     * Output only. The CampaignCriterion affected by this change.
     *
     * Generated from protobuf field <code>optional string campaign_criterion = 27 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getCampaignCriterion()
    {
        return isset($this->campaign_criterion) ? $this->campaign_criterion : '';
    }

    public function hasCampaignCriterion()
    {
        return isset($this->campaign_criterion);
    }

    public function clearCampaignCriterion()
    {
        unset($this->campaign_criterion);
    }

    /**
     * Output only. The CampaignCriterion affected by this change.
     *
     * Generated from protobuf field <code>optional string campaign_criterion = 27 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     * @param string $var
     * @return $this
     */
    public function setCampaignCriterion($var)
    {
        GPBUtil::checkString($var, True);
        $this->campaign_criterion = $var;

        return $this;
    }

    /**
     * Output only. The Feed affected by this change.
     *
     * Generated from protobuf field <code>optional string feed = 28 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getFeed()
    {
        return isset($this->feed) ? $this->feed : '';
    }

    public function hasFeed()
    {
        return isset($this->feed);
    }

    public function clearFeed()
    {
        unset($this->feed);
    }

    /**
     * Output only. The Feed affected by this change.
     *
     * Generated from protobuf field <code>optional string feed = 28 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     * @param string $var
     * @return $this
     */
    public function setFeed($var)
    {
        GPBUtil::checkString($var, True);
        $this->feed = $var;

        return $this;
    }

    /**
     * Output only. The FeedItem affected by this change.
     *
     * Generated from protobuf field <code>optional string feed_item = 29 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getFeedItem()
    {
        return isset($this->feed_item) ? $this->feed_item : '';
    }

    public function hasFeedItem()
    {
        return isset($this->feed_item);
    }

    public function clearFeedItem()
    {
        unset($this->feed_item);
    }

    /**
     * Output only. The FeedItem affected by this change.
     *
     * Generated from protobuf field <code>optional string feed_item = 29 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     * @param string $var
     * @return $this
     */
    public function setFeedItem($var)
    {
        GPBUtil::checkString($var, True);
        $this->feed_item = $var;

        return $this;
    }

    /**
     * Output only. The AdGroupFeed affected by this change.
     *
     * Generated from protobuf field <code>optional string ad_group_feed = 30 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getAdGroupFeed()
    {
        return isset($this->ad_group_feed) ? $this->ad_group_feed : '';
    }

    public function hasAdGroupFeed()
    {
        return isset($this->ad_group_feed);
    }

    public function clearAdGroupFeed()
    {
        unset($this->ad_group_feed);
    }

    /**
     * Output only. The AdGroupFeed affected by this change.
     *
     * Generated from protobuf field <code>optional string ad_group_feed = 30 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     * @param string $var
     * @return $this
     */
    public function setAdGroupFeed($var)
    {
        GPBUtil::checkString($var, True);
        $this->ad_group_feed = $var;

        return $this;
    }

    /**
     * Output only. The CampaignFeed affected by this change.
     *
     * Generated from protobuf field <code>optional string campaign_feed = 31 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getCampaignFeed()
    {
        return isset($this->campaign_feed) ? $this->campaign_feed : '';
    }

    public function hasCampaignFeed()
    {
        return isset($this->campaign_feed);
    }

    public function clearCampaignFeed()
    {
        unset($this->campaign_feed);
    }

    /**
     * Output only. The CampaignFeed affected by this change.
     *
     * Generated from protobuf field <code>optional string campaign_feed = 31 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     * @param string $var
     * @return $this
     */
    public function setCampaignFeed($var)
    {
        GPBUtil::checkString($var, True);
        $this->campaign_feed = $var;

        return $this;
    }

    /**
     * Output only. The AdGroupBidModifier affected by this change.
     *
     * Generated from protobuf field <code>optional string ad_group_bid_modifier = 32 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getAdGroupBidModifier()
    {
        return isset($this->ad_group_bid_modifier) ? $this->ad_group_bid_modifier : '';
    }

    public function hasAdGroupBidModifier()
    {
        return isset($this->ad_group_bid_modifier);
    }

    public function clearAdGroupBidModifier()
    {
        unset($this->ad_group_bid_modifier);
    }

    /**
     * Output only. The AdGroupBidModifier affected by this change.
     *
     * Generated from protobuf field <code>optional string ad_group_bid_modifier = 32 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     * @param string $var
     * @return $this
     */
    public function setAdGroupBidModifier($var)
    {
        GPBUtil::checkString($var, True);
        $this->ad_group_bid_modifier = $var;

        return $this;
    }

    /**
     * Output only. The SharedSet affected by this change.
     *
     * Generated from protobuf field <code>string shared_set = 33 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getSharedSet()
    {
        return $this->shared_set;
    }

    /**
     * Output only. The SharedSet affected by this change.
     *
     * Generated from protobuf field <code>string shared_set = 33 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     * @param string $var
     * @return $this
     */
    public function setSharedSet($var)
    {
        GPBUtil::checkString($var, True);
        $this->shared_set = $var;

        return $this;
    }

    /**
     * Output only. The CampaignSharedSet affected by this change.
     *
     * Generated from protobuf field <code>string campaign_shared_set = 34 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getCampaignSharedSet()
    {
        return $this->campaign_shared_set;
    }

    /**
     * Output only. The CampaignSharedSet affected by this change.
     *
     * Generated from protobuf field <code>string campaign_shared_set = 34 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     * @param string $var
     * @return $this
     */
    public function setCampaignSharedSet($var)
    {
        GPBUtil::checkString($var, True);
        $this->campaign_shared_set = $var;

        return $this;
    }

    /**
     * Output only. The Asset affected by this change.
     *
     * Generated from protobuf field <code>string asset = 35 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getAsset()
    {
        return $this->asset;
    }

    /**
     * Output only. The Asset affected by this change.
     *
     * Generated from protobuf field <code>string asset = 35 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     * @param string $var
     * @return $this
     */
    public function setAsset($var)
    {
        GPBUtil::checkString($var, True);
        $this->asset = $var;

        return $this;
    }

    /**
     * Output only. The CustomerAsset affected by this change.
     *
     * Generated from protobuf field <code>string customer_asset = 36 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getCustomerAsset()
    {
        return $this->customer_asset;
    }

    /**
     * Output only. The CustomerAsset affected by this change.
     *
     * Generated from protobuf field <code>string customer_asset = 36 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     * @param string $var
     * @return $this
     */
    public function setCustomerAsset($var)
    {
        GPBUtil::checkString($var, True);
        $this->customer_asset = $var;

        return $this;
    }

    /**
     * Output only. The CampaignAsset affected by this change.
     *
     * Generated from protobuf field <code>string campaign_asset = 37 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getCampaignAsset()
    {
        return $this->campaign_asset;
    }

    /**
     * Output only. The CampaignAsset affected by this change.
     *
     * Generated from protobuf field <code>string campaign_asset = 37 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     * @param string $var
     * @return $this
     */
    public function setCampaignAsset($var)
    {
        GPBUtil::checkString($var, True);
        $this->campaign_asset = $var;

        return $this;
    }

    /**
     * Output only. The AdGroupAsset affected by this change.
     *
     * Generated from protobuf field <code>string ad_group_asset = 38 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getAdGroupAsset()
    {
        return $this->ad_group_asset;
    }

    /**
     * Output only. The AdGroupAsset affected by this change.
     *
     * Generated from protobuf field <code>string ad_group_asset = 38 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     * @param string $var
     * @return $this
     */
    public function setAdGroupAsset($var)
    {
        GPBUtil::checkString($var, True);
        $this->ad_group_asset = $var;

        return $this;
    }

    /**
     * Output only. The CombinedAudience affected by this change.
     *
     * Generated from protobuf field <code>string combined_audience = 40 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getCombinedAudience()
    {
        return $this->combined_audience;
    }

    /**
     * Output only. The CombinedAudience affected by this change.
     *
     * Generated from protobuf field <code>string combined_audience = 40 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     * @param string $var
     * @return $this
     */
    public function setCombinedAudience($var)
    {
        GPBUtil::checkString($var, True);
        $this->combined_audience = $var;

        return $this;
    }

}

