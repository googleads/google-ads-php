<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/resources/conversion_action.proto

namespace Google\Ads\GoogleAds\V19\Resources;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * A conversion action.
 *
 * Generated from protobuf message <code>google.ads.googleads.v19.resources.ConversionAction</code>
 */
class ConversionAction extends \Google\Protobuf\Internal\Message
{
    /**
     * Immutable. The resource name of the conversion action.
     * Conversion action resource names have the form:
     * `customers/{customer_id}/conversionActions/{conversion_action_id}`
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.field_behavior) = IMMUTABLE, (.google.api.resource_reference) = {</code>
     */
    protected $resource_name = '';
    /**
     * Output only. The ID of the conversion action.
     *
     * Generated from protobuf field <code>optional int64 id = 21 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $id = null;
    /**
     * The name of the conversion action.
     * This field is required and should not be empty when creating new
     * conversion actions.
     *
     * Generated from protobuf field <code>optional string name = 22;</code>
     */
    protected $name = null;
    /**
     * The status of this conversion action for conversion event accrual.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.enums.ConversionActionStatusEnum.ConversionActionStatus status = 4;</code>
     */
    protected $status = 0;
    /**
     * Immutable. The type of this conversion action.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.enums.ConversionActionTypeEnum.ConversionActionType type = 5 [(.google.api.field_behavior) = IMMUTABLE];</code>
     */
    protected $type = 0;
    /**
     * Output only. The conversion origin of this conversion action.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.enums.ConversionOriginEnum.ConversionOrigin origin = 30 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $origin = 0;
    /**
     * If a conversion action's primary_for_goal bit is false, the conversion
     * action is non-biddable for all campaigns regardless of their customer
     * conversion goal or campaign conversion goal.
     * However, custom conversion goals do not respect primary_for_goal, so if
     * a campaign has a custom conversion goal configured with a
     * primary_for_goal = false conversion action, that conversion action is
     * still biddable.
     * By default, primary_for_goal will be true if not set. In V9,
     * primary_for_goal can only be set to false after creation through an
     * 'update' operation because it's not declared as optional.
     *
     * Generated from protobuf field <code>optional bool primary_for_goal = 31;</code>
     */
    protected $primary_for_goal = null;
    /**
     * The category of conversions reported for this conversion action.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.enums.ConversionActionCategoryEnum.ConversionActionCategory category = 6;</code>
     */
    protected $category = 0;
    /**
     * Output only. The resource name of the conversion action owner customer, or
     * null if this is a system-defined conversion action.
     *
     * Generated from protobuf field <code>optional string owner_customer = 23 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     */
    protected $owner_customer = null;
    /**
     * Whether this conversion action should be included in the "conversions"
     * metric.
     *
     * Generated from protobuf field <code>optional bool include_in_conversions_metric = 24;</code>
     */
    protected $include_in_conversions_metric = null;
    /**
     * The maximum number of days that may elapse between an interaction
     * (for example, a click) and a conversion event.
     *
     * Generated from protobuf field <code>optional int64 click_through_lookback_window_days = 25;</code>
     */
    protected $click_through_lookback_window_days = null;
    /**
     * The maximum number of days which may elapse between an impression and a
     * conversion without an interaction.
     *
     * Generated from protobuf field <code>optional int64 view_through_lookback_window_days = 26;</code>
     */
    protected $view_through_lookback_window_days = null;
    /**
     * Settings related to the value for conversion events associated with this
     * conversion action.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.resources.ConversionAction.ValueSettings value_settings = 11;</code>
     */
    protected $value_settings = null;
    /**
     * How to count conversion events for the conversion action.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.enums.ConversionActionCountingTypeEnum.ConversionActionCountingType counting_type = 12;</code>
     */
    protected $counting_type = 0;
    /**
     * Settings related to this conversion action's attribution model.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.resources.ConversionAction.AttributionModelSettings attribution_model_settings = 13;</code>
     */
    protected $attribution_model_settings = null;
    /**
     * Output only. The snippets used for tracking conversions.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v19.common.TagSnippet tag_snippets = 14 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $tag_snippets;
    /**
     * The phone call duration in seconds after which a conversion should be
     * reported for this conversion action.
     * The value must be between 0 and 10000, inclusive.
     *
     * Generated from protobuf field <code>optional int64 phone_call_duration_seconds = 27;</code>
     */
    protected $phone_call_duration_seconds = null;
    /**
     * App ID for an app conversion action.
     *
     * Generated from protobuf field <code>optional string app_id = 28;</code>
     */
    protected $app_id = null;
    /**
     * Output only. Mobile app vendor for an app conversion action.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.enums.MobileAppVendorEnum.MobileAppVendor mobile_app_vendor = 17 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $mobile_app_vendor = 0;
    /**
     * Output only. Firebase settings for Firebase conversion types.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.resources.ConversionAction.FirebaseSettings firebase_settings = 18 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $firebase_settings = null;
    /**
     * Output only. Third Party App Analytics settings for third party conversion
     * types.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.resources.ConversionAction.ThirdPartyAppAnalyticsSettings third_party_app_analytics_settings = 19 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $third_party_app_analytics_settings = null;
    /**
     * Output only. Google Analytics 4 settings for Google Analytics 4 conversion
     * types.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.resources.ConversionAction.GoogleAnalytics4Settings google_analytics_4_settings = 34 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $google_analytics_4_settings = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $resource_name
     *           Immutable. The resource name of the conversion action.
     *           Conversion action resource names have the form:
     *           `customers/{customer_id}/conversionActions/{conversion_action_id}`
     *     @type int|string $id
     *           Output only. The ID of the conversion action.
     *     @type string $name
     *           The name of the conversion action.
     *           This field is required and should not be empty when creating new
     *           conversion actions.
     *     @type int $status
     *           The status of this conversion action for conversion event accrual.
     *     @type int $type
     *           Immutable. The type of this conversion action.
     *     @type int $origin
     *           Output only. The conversion origin of this conversion action.
     *     @type bool $primary_for_goal
     *           If a conversion action's primary_for_goal bit is false, the conversion
     *           action is non-biddable for all campaigns regardless of their customer
     *           conversion goal or campaign conversion goal.
     *           However, custom conversion goals do not respect primary_for_goal, so if
     *           a campaign has a custom conversion goal configured with a
     *           primary_for_goal = false conversion action, that conversion action is
     *           still biddable.
     *           By default, primary_for_goal will be true if not set. In V9,
     *           primary_for_goal can only be set to false after creation through an
     *           'update' operation because it's not declared as optional.
     *     @type int $category
     *           The category of conversions reported for this conversion action.
     *     @type string $owner_customer
     *           Output only. The resource name of the conversion action owner customer, or
     *           null if this is a system-defined conversion action.
     *     @type bool $include_in_conversions_metric
     *           Whether this conversion action should be included in the "conversions"
     *           metric.
     *     @type int|string $click_through_lookback_window_days
     *           The maximum number of days that may elapse between an interaction
     *           (for example, a click) and a conversion event.
     *     @type int|string $view_through_lookback_window_days
     *           The maximum number of days which may elapse between an impression and a
     *           conversion without an interaction.
     *     @type \Google\Ads\GoogleAds\V19\Resources\ConversionAction\ValueSettings $value_settings
     *           Settings related to the value for conversion events associated with this
     *           conversion action.
     *     @type int $counting_type
     *           How to count conversion events for the conversion action.
     *     @type \Google\Ads\GoogleAds\V19\Resources\ConversionAction\AttributionModelSettings $attribution_model_settings
     *           Settings related to this conversion action's attribution model.
     *     @type array<\Google\Ads\GoogleAds\V19\Common\TagSnippet>|\Google\Protobuf\Internal\RepeatedField $tag_snippets
     *           Output only. The snippets used for tracking conversions.
     *     @type int|string $phone_call_duration_seconds
     *           The phone call duration in seconds after which a conversion should be
     *           reported for this conversion action.
     *           The value must be between 0 and 10000, inclusive.
     *     @type string $app_id
     *           App ID for an app conversion action.
     *     @type int $mobile_app_vendor
     *           Output only. Mobile app vendor for an app conversion action.
     *     @type \Google\Ads\GoogleAds\V19\Resources\ConversionAction\FirebaseSettings $firebase_settings
     *           Output only. Firebase settings for Firebase conversion types.
     *     @type \Google\Ads\GoogleAds\V19\Resources\ConversionAction\ThirdPartyAppAnalyticsSettings $third_party_app_analytics_settings
     *           Output only. Third Party App Analytics settings for third party conversion
     *           types.
     *     @type \Google\Ads\GoogleAds\V19\Resources\ConversionAction\GoogleAnalytics4Settings $google_analytics_4_settings
     *           Output only. Google Analytics 4 settings for Google Analytics 4 conversion
     *           types.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V19\Resources\ConversionAction::initOnce();
        parent::__construct($data);
    }

    /**
     * Immutable. The resource name of the conversion action.
     * Conversion action resource names have the form:
     * `customers/{customer_id}/conversionActions/{conversion_action_id}`
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.field_behavior) = IMMUTABLE, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getResourceName()
    {
        return $this->resource_name;
    }

    /**
     * Immutable. The resource name of the conversion action.
     * Conversion action resource names have the form:
     * `customers/{customer_id}/conversionActions/{conversion_action_id}`
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.field_behavior) = IMMUTABLE, (.google.api.resource_reference) = {</code>
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
     * Output only. The ID of the conversion action.
     *
     * Generated from protobuf field <code>optional int64 id = 21 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return int|string
     */
    public function getId()
    {
        return isset($this->id) ? $this->id : 0;
    }

    public function hasId()
    {
        return isset($this->id);
    }

    public function clearId()
    {
        unset($this->id);
    }

    /**
     * Output only. The ID of the conversion action.
     *
     * Generated from protobuf field <code>optional int64 id = 21 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param int|string $var
     * @return $this
     */
    public function setId($var)
    {
        GPBUtil::checkInt64($var);
        $this->id = $var;

        return $this;
    }

    /**
     * The name of the conversion action.
     * This field is required and should not be empty when creating new
     * conversion actions.
     *
     * Generated from protobuf field <code>optional string name = 22;</code>
     * @return string
     */
    public function getName()
    {
        return isset($this->name) ? $this->name : '';
    }

    public function hasName()
    {
        return isset($this->name);
    }

    public function clearName()
    {
        unset($this->name);
    }

    /**
     * The name of the conversion action.
     * This field is required and should not be empty when creating new
     * conversion actions.
     *
     * Generated from protobuf field <code>optional string name = 22;</code>
     * @param string $var
     * @return $this
     */
    public function setName($var)
    {
        GPBUtil::checkString($var, True);
        $this->name = $var;

        return $this;
    }

    /**
     * The status of this conversion action for conversion event accrual.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.enums.ConversionActionStatusEnum.ConversionActionStatus status = 4;</code>
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * The status of this conversion action for conversion event accrual.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.enums.ConversionActionStatusEnum.ConversionActionStatus status = 4;</code>
     * @param int $var
     * @return $this
     */
    public function setStatus($var)
    {
        GPBUtil::checkEnum($var, \Google\Ads\GoogleAds\V19\Enums\ConversionActionStatusEnum\ConversionActionStatus::class);
        $this->status = $var;

        return $this;
    }

    /**
     * Immutable. The type of this conversion action.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.enums.ConversionActionTypeEnum.ConversionActionType type = 5 [(.google.api.field_behavior) = IMMUTABLE];</code>
     * @return int
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Immutable. The type of this conversion action.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.enums.ConversionActionTypeEnum.ConversionActionType type = 5 [(.google.api.field_behavior) = IMMUTABLE];</code>
     * @param int $var
     * @return $this
     */
    public function setType($var)
    {
        GPBUtil::checkEnum($var, \Google\Ads\GoogleAds\V19\Enums\ConversionActionTypeEnum\ConversionActionType::class);
        $this->type = $var;

        return $this;
    }

    /**
     * Output only. The conversion origin of this conversion action.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.enums.ConversionOriginEnum.ConversionOrigin origin = 30 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return int
     */
    public function getOrigin()
    {
        return $this->origin;
    }

    /**
     * Output only. The conversion origin of this conversion action.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.enums.ConversionOriginEnum.ConversionOrigin origin = 30 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param int $var
     * @return $this
     */
    public function setOrigin($var)
    {
        GPBUtil::checkEnum($var, \Google\Ads\GoogleAds\V19\Enums\ConversionOriginEnum\ConversionOrigin::class);
        $this->origin = $var;

        return $this;
    }

    /**
     * If a conversion action's primary_for_goal bit is false, the conversion
     * action is non-biddable for all campaigns regardless of their customer
     * conversion goal or campaign conversion goal.
     * However, custom conversion goals do not respect primary_for_goal, so if
     * a campaign has a custom conversion goal configured with a
     * primary_for_goal = false conversion action, that conversion action is
     * still biddable.
     * By default, primary_for_goal will be true if not set. In V9,
     * primary_for_goal can only be set to false after creation through an
     * 'update' operation because it's not declared as optional.
     *
     * Generated from protobuf field <code>optional bool primary_for_goal = 31;</code>
     * @return bool
     */
    public function getPrimaryForGoal()
    {
        return isset($this->primary_for_goal) ? $this->primary_for_goal : false;
    }

    public function hasPrimaryForGoal()
    {
        return isset($this->primary_for_goal);
    }

    public function clearPrimaryForGoal()
    {
        unset($this->primary_for_goal);
    }

    /**
     * If a conversion action's primary_for_goal bit is false, the conversion
     * action is non-biddable for all campaigns regardless of their customer
     * conversion goal or campaign conversion goal.
     * However, custom conversion goals do not respect primary_for_goal, so if
     * a campaign has a custom conversion goal configured with a
     * primary_for_goal = false conversion action, that conversion action is
     * still biddable.
     * By default, primary_for_goal will be true if not set. In V9,
     * primary_for_goal can only be set to false after creation through an
     * 'update' operation because it's not declared as optional.
     *
     * Generated from protobuf field <code>optional bool primary_for_goal = 31;</code>
     * @param bool $var
     * @return $this
     */
    public function setPrimaryForGoal($var)
    {
        GPBUtil::checkBool($var);
        $this->primary_for_goal = $var;

        return $this;
    }

    /**
     * The category of conversions reported for this conversion action.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.enums.ConversionActionCategoryEnum.ConversionActionCategory category = 6;</code>
     * @return int
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * The category of conversions reported for this conversion action.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.enums.ConversionActionCategoryEnum.ConversionActionCategory category = 6;</code>
     * @param int $var
     * @return $this
     */
    public function setCategory($var)
    {
        GPBUtil::checkEnum($var, \Google\Ads\GoogleAds\V19\Enums\ConversionActionCategoryEnum\ConversionActionCategory::class);
        $this->category = $var;

        return $this;
    }

    /**
     * Output only. The resource name of the conversion action owner customer, or
     * null if this is a system-defined conversion action.
     *
     * Generated from protobuf field <code>optional string owner_customer = 23 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getOwnerCustomer()
    {
        return isset($this->owner_customer) ? $this->owner_customer : '';
    }

    public function hasOwnerCustomer()
    {
        return isset($this->owner_customer);
    }

    public function clearOwnerCustomer()
    {
        unset($this->owner_customer);
    }

    /**
     * Output only. The resource name of the conversion action owner customer, or
     * null if this is a system-defined conversion action.
     *
     * Generated from protobuf field <code>optional string owner_customer = 23 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     * @param string $var
     * @return $this
     */
    public function setOwnerCustomer($var)
    {
        GPBUtil::checkString($var, True);
        $this->owner_customer = $var;

        return $this;
    }

    /**
     * Whether this conversion action should be included in the "conversions"
     * metric.
     *
     * Generated from protobuf field <code>optional bool include_in_conversions_metric = 24;</code>
     * @return bool
     */
    public function getIncludeInConversionsMetric()
    {
        return isset($this->include_in_conversions_metric) ? $this->include_in_conversions_metric : false;
    }

    public function hasIncludeInConversionsMetric()
    {
        return isset($this->include_in_conversions_metric);
    }

    public function clearIncludeInConversionsMetric()
    {
        unset($this->include_in_conversions_metric);
    }

    /**
     * Whether this conversion action should be included in the "conversions"
     * metric.
     *
     * Generated from protobuf field <code>optional bool include_in_conversions_metric = 24;</code>
     * @param bool $var
     * @return $this
     */
    public function setIncludeInConversionsMetric($var)
    {
        GPBUtil::checkBool($var);
        $this->include_in_conversions_metric = $var;

        return $this;
    }

    /**
     * The maximum number of days that may elapse between an interaction
     * (for example, a click) and a conversion event.
     *
     * Generated from protobuf field <code>optional int64 click_through_lookback_window_days = 25;</code>
     * @return int|string
     */
    public function getClickThroughLookbackWindowDays()
    {
        return isset($this->click_through_lookback_window_days) ? $this->click_through_lookback_window_days : 0;
    }

    public function hasClickThroughLookbackWindowDays()
    {
        return isset($this->click_through_lookback_window_days);
    }

    public function clearClickThroughLookbackWindowDays()
    {
        unset($this->click_through_lookback_window_days);
    }

    /**
     * The maximum number of days that may elapse between an interaction
     * (for example, a click) and a conversion event.
     *
     * Generated from protobuf field <code>optional int64 click_through_lookback_window_days = 25;</code>
     * @param int|string $var
     * @return $this
     */
    public function setClickThroughLookbackWindowDays($var)
    {
        GPBUtil::checkInt64($var);
        $this->click_through_lookback_window_days = $var;

        return $this;
    }

    /**
     * The maximum number of days which may elapse between an impression and a
     * conversion without an interaction.
     *
     * Generated from protobuf field <code>optional int64 view_through_lookback_window_days = 26;</code>
     * @return int|string
     */
    public function getViewThroughLookbackWindowDays()
    {
        return isset($this->view_through_lookback_window_days) ? $this->view_through_lookback_window_days : 0;
    }

    public function hasViewThroughLookbackWindowDays()
    {
        return isset($this->view_through_lookback_window_days);
    }

    public function clearViewThroughLookbackWindowDays()
    {
        unset($this->view_through_lookback_window_days);
    }

    /**
     * The maximum number of days which may elapse between an impression and a
     * conversion without an interaction.
     *
     * Generated from protobuf field <code>optional int64 view_through_lookback_window_days = 26;</code>
     * @param int|string $var
     * @return $this
     */
    public function setViewThroughLookbackWindowDays($var)
    {
        GPBUtil::checkInt64($var);
        $this->view_through_lookback_window_days = $var;

        return $this;
    }

    /**
     * Settings related to the value for conversion events associated with this
     * conversion action.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.resources.ConversionAction.ValueSettings value_settings = 11;</code>
     * @return \Google\Ads\GoogleAds\V19\Resources\ConversionAction\ValueSettings|null
     */
    public function getValueSettings()
    {
        return $this->value_settings;
    }

    public function hasValueSettings()
    {
        return isset($this->value_settings);
    }

    public function clearValueSettings()
    {
        unset($this->value_settings);
    }

    /**
     * Settings related to the value for conversion events associated with this
     * conversion action.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.resources.ConversionAction.ValueSettings value_settings = 11;</code>
     * @param \Google\Ads\GoogleAds\V19\Resources\ConversionAction\ValueSettings $var
     * @return $this
     */
    public function setValueSettings($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V19\Resources\ConversionAction\ValueSettings::class);
        $this->value_settings = $var;

        return $this;
    }

    /**
     * How to count conversion events for the conversion action.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.enums.ConversionActionCountingTypeEnum.ConversionActionCountingType counting_type = 12;</code>
     * @return int
     */
    public function getCountingType()
    {
        return $this->counting_type;
    }

    /**
     * How to count conversion events for the conversion action.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.enums.ConversionActionCountingTypeEnum.ConversionActionCountingType counting_type = 12;</code>
     * @param int $var
     * @return $this
     */
    public function setCountingType($var)
    {
        GPBUtil::checkEnum($var, \Google\Ads\GoogleAds\V19\Enums\ConversionActionCountingTypeEnum\ConversionActionCountingType::class);
        $this->counting_type = $var;

        return $this;
    }

    /**
     * Settings related to this conversion action's attribution model.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.resources.ConversionAction.AttributionModelSettings attribution_model_settings = 13;</code>
     * @return \Google\Ads\GoogleAds\V19\Resources\ConversionAction\AttributionModelSettings|null
     */
    public function getAttributionModelSettings()
    {
        return $this->attribution_model_settings;
    }

    public function hasAttributionModelSettings()
    {
        return isset($this->attribution_model_settings);
    }

    public function clearAttributionModelSettings()
    {
        unset($this->attribution_model_settings);
    }

    /**
     * Settings related to this conversion action's attribution model.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.resources.ConversionAction.AttributionModelSettings attribution_model_settings = 13;</code>
     * @param \Google\Ads\GoogleAds\V19\Resources\ConversionAction\AttributionModelSettings $var
     * @return $this
     */
    public function setAttributionModelSettings($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V19\Resources\ConversionAction\AttributionModelSettings::class);
        $this->attribution_model_settings = $var;

        return $this;
    }

    /**
     * Output only. The snippets used for tracking conversions.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v19.common.TagSnippet tag_snippets = 14 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getTagSnippets()
    {
        return $this->tag_snippets;
    }

    /**
     * Output only. The snippets used for tracking conversions.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v19.common.TagSnippet tag_snippets = 14 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param array<\Google\Ads\GoogleAds\V19\Common\TagSnippet>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setTagSnippets($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Ads\GoogleAds\V19\Common\TagSnippet::class);
        $this->tag_snippets = $arr;

        return $this;
    }

    /**
     * The phone call duration in seconds after which a conversion should be
     * reported for this conversion action.
     * The value must be between 0 and 10000, inclusive.
     *
     * Generated from protobuf field <code>optional int64 phone_call_duration_seconds = 27;</code>
     * @return int|string
     */
    public function getPhoneCallDurationSeconds()
    {
        return isset($this->phone_call_duration_seconds) ? $this->phone_call_duration_seconds : 0;
    }

    public function hasPhoneCallDurationSeconds()
    {
        return isset($this->phone_call_duration_seconds);
    }

    public function clearPhoneCallDurationSeconds()
    {
        unset($this->phone_call_duration_seconds);
    }

    /**
     * The phone call duration in seconds after which a conversion should be
     * reported for this conversion action.
     * The value must be between 0 and 10000, inclusive.
     *
     * Generated from protobuf field <code>optional int64 phone_call_duration_seconds = 27;</code>
     * @param int|string $var
     * @return $this
     */
    public function setPhoneCallDurationSeconds($var)
    {
        GPBUtil::checkInt64($var);
        $this->phone_call_duration_seconds = $var;

        return $this;
    }

    /**
     * App ID for an app conversion action.
     *
     * Generated from protobuf field <code>optional string app_id = 28;</code>
     * @return string
     */
    public function getAppId()
    {
        return isset($this->app_id) ? $this->app_id : '';
    }

    public function hasAppId()
    {
        return isset($this->app_id);
    }

    public function clearAppId()
    {
        unset($this->app_id);
    }

    /**
     * App ID for an app conversion action.
     *
     * Generated from protobuf field <code>optional string app_id = 28;</code>
     * @param string $var
     * @return $this
     */
    public function setAppId($var)
    {
        GPBUtil::checkString($var, True);
        $this->app_id = $var;

        return $this;
    }

    /**
     * Output only. Mobile app vendor for an app conversion action.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.enums.MobileAppVendorEnum.MobileAppVendor mobile_app_vendor = 17 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return int
     */
    public function getMobileAppVendor()
    {
        return $this->mobile_app_vendor;
    }

    /**
     * Output only. Mobile app vendor for an app conversion action.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.enums.MobileAppVendorEnum.MobileAppVendor mobile_app_vendor = 17 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param int $var
     * @return $this
     */
    public function setMobileAppVendor($var)
    {
        GPBUtil::checkEnum($var, \Google\Ads\GoogleAds\V19\Enums\MobileAppVendorEnum\MobileAppVendor::class);
        $this->mobile_app_vendor = $var;

        return $this;
    }

    /**
     * Output only. Firebase settings for Firebase conversion types.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.resources.ConversionAction.FirebaseSettings firebase_settings = 18 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return \Google\Ads\GoogleAds\V19\Resources\ConversionAction\FirebaseSettings|null
     */
    public function getFirebaseSettings()
    {
        return $this->firebase_settings;
    }

    public function hasFirebaseSettings()
    {
        return isset($this->firebase_settings);
    }

    public function clearFirebaseSettings()
    {
        unset($this->firebase_settings);
    }

    /**
     * Output only. Firebase settings for Firebase conversion types.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.resources.ConversionAction.FirebaseSettings firebase_settings = 18 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param \Google\Ads\GoogleAds\V19\Resources\ConversionAction\FirebaseSettings $var
     * @return $this
     */
    public function setFirebaseSettings($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V19\Resources\ConversionAction\FirebaseSettings::class);
        $this->firebase_settings = $var;

        return $this;
    }

    /**
     * Output only. Third Party App Analytics settings for third party conversion
     * types.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.resources.ConversionAction.ThirdPartyAppAnalyticsSettings third_party_app_analytics_settings = 19 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return \Google\Ads\GoogleAds\V19\Resources\ConversionAction\ThirdPartyAppAnalyticsSettings|null
     */
    public function getThirdPartyAppAnalyticsSettings()
    {
        return $this->third_party_app_analytics_settings;
    }

    public function hasThirdPartyAppAnalyticsSettings()
    {
        return isset($this->third_party_app_analytics_settings);
    }

    public function clearThirdPartyAppAnalyticsSettings()
    {
        unset($this->third_party_app_analytics_settings);
    }

    /**
     * Output only. Third Party App Analytics settings for third party conversion
     * types.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.resources.ConversionAction.ThirdPartyAppAnalyticsSettings third_party_app_analytics_settings = 19 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param \Google\Ads\GoogleAds\V19\Resources\ConversionAction\ThirdPartyAppAnalyticsSettings $var
     * @return $this
     */
    public function setThirdPartyAppAnalyticsSettings($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V19\Resources\ConversionAction\ThirdPartyAppAnalyticsSettings::class);
        $this->third_party_app_analytics_settings = $var;

        return $this;
    }

    /**
     * Output only. Google Analytics 4 settings for Google Analytics 4 conversion
     * types.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.resources.ConversionAction.GoogleAnalytics4Settings google_analytics_4_settings = 34 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return \Google\Ads\GoogleAds\V19\Resources\ConversionAction\GoogleAnalytics4Settings|null
     */
    public function getGoogleAnalytics4Settings()
    {
        return $this->google_analytics_4_settings;
    }

    public function hasGoogleAnalytics4Settings()
    {
        return isset($this->google_analytics_4_settings);
    }

    public function clearGoogleAnalytics4Settings()
    {
        unset($this->google_analytics_4_settings);
    }

    /**
     * Output only. Google Analytics 4 settings for Google Analytics 4 conversion
     * types.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.resources.ConversionAction.GoogleAnalytics4Settings google_analytics_4_settings = 34 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param \Google\Ads\GoogleAds\V19\Resources\ConversionAction\GoogleAnalytics4Settings $var
     * @return $this
     */
    public function setGoogleAnalytics4Settings($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V19\Resources\ConversionAction\GoogleAnalytics4Settings::class);
        $this->google_analytics_4_settings = $var;

        return $this;
    }

}

