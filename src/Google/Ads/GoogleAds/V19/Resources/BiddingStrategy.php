<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/resources/bidding_strategy.proto

namespace Google\Ads\GoogleAds\V19\Resources;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * A bidding strategy.
 *
 * Generated from protobuf message <code>google.ads.googleads.v19.resources.BiddingStrategy</code>
 */
class BiddingStrategy extends \Google\Protobuf\Internal\Message
{
    /**
     * Immutable. The resource name of the bidding strategy.
     * Bidding strategy resource names have the form:
     * `customers/{customer_id}/biddingStrategies/{bidding_strategy_id}`
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.field_behavior) = IMMUTABLE, (.google.api.resource_reference) = {</code>
     */
    protected $resource_name = '';
    /**
     * Output only. The ID of the bidding strategy.
     *
     * Generated from protobuf field <code>optional int64 id = 16 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $id = null;
    /**
     * The name of the bidding strategy.
     * All bidding strategies within an account must be named distinctly.
     * The length of this string should be between 1 and 255, inclusive,
     * in UTF-8 bytes, (trimmed).
     *
     * Generated from protobuf field <code>optional string name = 17;</code>
     */
    protected $name = null;
    /**
     * Output only. The status of the bidding strategy.
     * This field is read-only.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.enums.BiddingStrategyStatusEnum.BiddingStrategyStatus status = 15 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $status = 0;
    /**
     * Output only. The type of the bidding strategy.
     * Create a bidding strategy by setting the bidding scheme.
     * This field is read-only.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.enums.BiddingStrategyTypeEnum.BiddingStrategyType type = 5 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $type = 0;
    /**
     * Immutable. The currency used by the bidding strategy (ISO 4217 three-letter
     * code).
     * For bidding strategies in manager customers, this currency can be set on
     * creation and defaults to the manager customer's currency. For serving
     * customers, this field cannot be set; all strategies in a serving customer
     * implicitly use the serving customer's currency. In all cases the
     * effective_currency_code field returns the currency used by the strategy.
     *
     * Generated from protobuf field <code>string currency_code = 23 [(.google.api.field_behavior) = IMMUTABLE];</code>
     */
    protected $currency_code = '';
    /**
     * Output only. The currency used by the bidding strategy (ISO 4217
     * three-letter code).
     * For bidding strategies in manager customers, this is the currency set by
     * the advertiser when creating the strategy. For serving customers, this is
     * the customer's currency_code.
     * Bidding strategy metrics are reported in this currency.
     * This field is read-only.
     *
     * Generated from protobuf field <code>optional string effective_currency_code = 20 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $effective_currency_code = null;
    /**
     * ID of the campaign budget that this portfolio bidding strategy
     * is aligned with. When a portfolio and a campaign budget are aligned, that
     * means that they are attached to the same set of campaigns. After a bidding
     * strategy is aligned with a campaign budget, campaigns that are added to the
     * bidding strategy must also use the aligned campaign budget.
     *
     * Generated from protobuf field <code>int64 aligned_campaign_budget_id = 25;</code>
     */
    protected $aligned_campaign_budget_id = 0;
    /**
     * Output only. The number of campaigns attached to this bidding strategy.
     * This field is read-only.
     *
     * Generated from protobuf field <code>optional int64 campaign_count = 18 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $campaign_count = null;
    /**
     * Output only. The number of non-removed campaigns attached to this bidding
     * strategy.
     * This field is read-only.
     *
     * Generated from protobuf field <code>optional int64 non_removed_campaign_count = 19 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $non_removed_campaign_count = null;
    protected $scheme;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $resource_name
     *           Immutable. The resource name of the bidding strategy.
     *           Bidding strategy resource names have the form:
     *           `customers/{customer_id}/biddingStrategies/{bidding_strategy_id}`
     *     @type int|string $id
     *           Output only. The ID of the bidding strategy.
     *     @type string $name
     *           The name of the bidding strategy.
     *           All bidding strategies within an account must be named distinctly.
     *           The length of this string should be between 1 and 255, inclusive,
     *           in UTF-8 bytes, (trimmed).
     *     @type int $status
     *           Output only. The status of the bidding strategy.
     *           This field is read-only.
     *     @type int $type
     *           Output only. The type of the bidding strategy.
     *           Create a bidding strategy by setting the bidding scheme.
     *           This field is read-only.
     *     @type string $currency_code
     *           Immutable. The currency used by the bidding strategy (ISO 4217 three-letter
     *           code).
     *           For bidding strategies in manager customers, this currency can be set on
     *           creation and defaults to the manager customer's currency. For serving
     *           customers, this field cannot be set; all strategies in a serving customer
     *           implicitly use the serving customer's currency. In all cases the
     *           effective_currency_code field returns the currency used by the strategy.
     *     @type string $effective_currency_code
     *           Output only. The currency used by the bidding strategy (ISO 4217
     *           three-letter code).
     *           For bidding strategies in manager customers, this is the currency set by
     *           the advertiser when creating the strategy. For serving customers, this is
     *           the customer's currency_code.
     *           Bidding strategy metrics are reported in this currency.
     *           This field is read-only.
     *     @type int|string $aligned_campaign_budget_id
     *           ID of the campaign budget that this portfolio bidding strategy
     *           is aligned with. When a portfolio and a campaign budget are aligned, that
     *           means that they are attached to the same set of campaigns. After a bidding
     *           strategy is aligned with a campaign budget, campaigns that are added to the
     *           bidding strategy must also use the aligned campaign budget.
     *     @type int|string $campaign_count
     *           Output only. The number of campaigns attached to this bidding strategy.
     *           This field is read-only.
     *     @type int|string $non_removed_campaign_count
     *           Output only. The number of non-removed campaigns attached to this bidding
     *           strategy.
     *           This field is read-only.
     *     @type \Google\Ads\GoogleAds\V19\Common\EnhancedCpc $enhanced_cpc
     *           A bidding strategy that raises bids for clicks that seem more likely to
     *           lead to a conversion and lowers them for clicks where they seem less
     *           likely.
     *     @type \Google\Ads\GoogleAds\V19\Common\MaximizeConversionValue $maximize_conversion_value
     *           An automated bidding strategy to help get the most conversion value for
     *           your campaigns while spending your budget.
     *     @type \Google\Ads\GoogleAds\V19\Common\MaximizeConversions $maximize_conversions
     *           An automated bidding strategy to help get the most conversions for your
     *           campaigns while spending your budget.
     *     @type \Google\Ads\GoogleAds\V19\Common\TargetCpa $target_cpa
     *           A bidding strategy that sets bids to help get as many conversions as
     *           possible at the target cost-per-acquisition (CPA) you set.
     *     @type \Google\Ads\GoogleAds\V19\Common\TargetImpressionShare $target_impression_share
     *           A bidding strategy that automatically optimizes towards a chosen
     *           percentage of impressions.
     *     @type \Google\Ads\GoogleAds\V19\Common\TargetRoas $target_roas
     *           A bidding strategy that helps you maximize revenue while averaging a
     *           specific target Return On Ad Spend (ROAS).
     *     @type \Google\Ads\GoogleAds\V19\Common\TargetSpend $target_spend
     *           A bid strategy that sets your bids to help get as many clicks as
     *           possible within your budget.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V19\Resources\BiddingStrategy::initOnce();
        parent::__construct($data);
    }

    /**
     * Immutable. The resource name of the bidding strategy.
     * Bidding strategy resource names have the form:
     * `customers/{customer_id}/biddingStrategies/{bidding_strategy_id}`
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.field_behavior) = IMMUTABLE, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getResourceName()
    {
        return $this->resource_name;
    }

    /**
     * Immutable. The resource name of the bidding strategy.
     * Bidding strategy resource names have the form:
     * `customers/{customer_id}/biddingStrategies/{bidding_strategy_id}`
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
     * Output only. The ID of the bidding strategy.
     *
     * Generated from protobuf field <code>optional int64 id = 16 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
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
     * Output only. The ID of the bidding strategy.
     *
     * Generated from protobuf field <code>optional int64 id = 16 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
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
     * The name of the bidding strategy.
     * All bidding strategies within an account must be named distinctly.
     * The length of this string should be between 1 and 255, inclusive,
     * in UTF-8 bytes, (trimmed).
     *
     * Generated from protobuf field <code>optional string name = 17;</code>
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
     * The name of the bidding strategy.
     * All bidding strategies within an account must be named distinctly.
     * The length of this string should be between 1 and 255, inclusive,
     * in UTF-8 bytes, (trimmed).
     *
     * Generated from protobuf field <code>optional string name = 17;</code>
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
     * Output only. The status of the bidding strategy.
     * This field is read-only.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.enums.BiddingStrategyStatusEnum.BiddingStrategyStatus status = 15 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Output only. The status of the bidding strategy.
     * This field is read-only.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.enums.BiddingStrategyStatusEnum.BiddingStrategyStatus status = 15 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param int $var
     * @return $this
     */
    public function setStatus($var)
    {
        GPBUtil::checkEnum($var, \Google\Ads\GoogleAds\V19\Enums\BiddingStrategyStatusEnum\BiddingStrategyStatus::class);
        $this->status = $var;

        return $this;
    }

    /**
     * Output only. The type of the bidding strategy.
     * Create a bidding strategy by setting the bidding scheme.
     * This field is read-only.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.enums.BiddingStrategyTypeEnum.BiddingStrategyType type = 5 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return int
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Output only. The type of the bidding strategy.
     * Create a bidding strategy by setting the bidding scheme.
     * This field is read-only.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.enums.BiddingStrategyTypeEnum.BiddingStrategyType type = 5 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param int $var
     * @return $this
     */
    public function setType($var)
    {
        GPBUtil::checkEnum($var, \Google\Ads\GoogleAds\V19\Enums\BiddingStrategyTypeEnum\BiddingStrategyType::class);
        $this->type = $var;

        return $this;
    }

    /**
     * Immutable. The currency used by the bidding strategy (ISO 4217 three-letter
     * code).
     * For bidding strategies in manager customers, this currency can be set on
     * creation and defaults to the manager customer's currency. For serving
     * customers, this field cannot be set; all strategies in a serving customer
     * implicitly use the serving customer's currency. In all cases the
     * effective_currency_code field returns the currency used by the strategy.
     *
     * Generated from protobuf field <code>string currency_code = 23 [(.google.api.field_behavior) = IMMUTABLE];</code>
     * @return string
     */
    public function getCurrencyCode()
    {
        return $this->currency_code;
    }

    /**
     * Immutable. The currency used by the bidding strategy (ISO 4217 three-letter
     * code).
     * For bidding strategies in manager customers, this currency can be set on
     * creation and defaults to the manager customer's currency. For serving
     * customers, this field cannot be set; all strategies in a serving customer
     * implicitly use the serving customer's currency. In all cases the
     * effective_currency_code field returns the currency used by the strategy.
     *
     * Generated from protobuf field <code>string currency_code = 23 [(.google.api.field_behavior) = IMMUTABLE];</code>
     * @param string $var
     * @return $this
     */
    public function setCurrencyCode($var)
    {
        GPBUtil::checkString($var, True);
        $this->currency_code = $var;

        return $this;
    }

    /**
     * Output only. The currency used by the bidding strategy (ISO 4217
     * three-letter code).
     * For bidding strategies in manager customers, this is the currency set by
     * the advertiser when creating the strategy. For serving customers, this is
     * the customer's currency_code.
     * Bidding strategy metrics are reported in this currency.
     * This field is read-only.
     *
     * Generated from protobuf field <code>optional string effective_currency_code = 20 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return string
     */
    public function getEffectiveCurrencyCode()
    {
        return isset($this->effective_currency_code) ? $this->effective_currency_code : '';
    }

    public function hasEffectiveCurrencyCode()
    {
        return isset($this->effective_currency_code);
    }

    public function clearEffectiveCurrencyCode()
    {
        unset($this->effective_currency_code);
    }

    /**
     * Output only. The currency used by the bidding strategy (ISO 4217
     * three-letter code).
     * For bidding strategies in manager customers, this is the currency set by
     * the advertiser when creating the strategy. For serving customers, this is
     * the customer's currency_code.
     * Bidding strategy metrics are reported in this currency.
     * This field is read-only.
     *
     * Generated from protobuf field <code>optional string effective_currency_code = 20 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param string $var
     * @return $this
     */
    public function setEffectiveCurrencyCode($var)
    {
        GPBUtil::checkString($var, True);
        $this->effective_currency_code = $var;

        return $this;
    }

    /**
     * ID of the campaign budget that this portfolio bidding strategy
     * is aligned with. When a portfolio and a campaign budget are aligned, that
     * means that they are attached to the same set of campaigns. After a bidding
     * strategy is aligned with a campaign budget, campaigns that are added to the
     * bidding strategy must also use the aligned campaign budget.
     *
     * Generated from protobuf field <code>int64 aligned_campaign_budget_id = 25;</code>
     * @return int|string
     */
    public function getAlignedCampaignBudgetId()
    {
        return $this->aligned_campaign_budget_id;
    }

    /**
     * ID of the campaign budget that this portfolio bidding strategy
     * is aligned with. When a portfolio and a campaign budget are aligned, that
     * means that they are attached to the same set of campaigns. After a bidding
     * strategy is aligned with a campaign budget, campaigns that are added to the
     * bidding strategy must also use the aligned campaign budget.
     *
     * Generated from protobuf field <code>int64 aligned_campaign_budget_id = 25;</code>
     * @param int|string $var
     * @return $this
     */
    public function setAlignedCampaignBudgetId($var)
    {
        GPBUtil::checkInt64($var);
        $this->aligned_campaign_budget_id = $var;

        return $this;
    }

    /**
     * Output only. The number of campaigns attached to this bidding strategy.
     * This field is read-only.
     *
     * Generated from protobuf field <code>optional int64 campaign_count = 18 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return int|string
     */
    public function getCampaignCount()
    {
        return isset($this->campaign_count) ? $this->campaign_count : 0;
    }

    public function hasCampaignCount()
    {
        return isset($this->campaign_count);
    }

    public function clearCampaignCount()
    {
        unset($this->campaign_count);
    }

    /**
     * Output only. The number of campaigns attached to this bidding strategy.
     * This field is read-only.
     *
     * Generated from protobuf field <code>optional int64 campaign_count = 18 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param int|string $var
     * @return $this
     */
    public function setCampaignCount($var)
    {
        GPBUtil::checkInt64($var);
        $this->campaign_count = $var;

        return $this;
    }

    /**
     * Output only. The number of non-removed campaigns attached to this bidding
     * strategy.
     * This field is read-only.
     *
     * Generated from protobuf field <code>optional int64 non_removed_campaign_count = 19 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return int|string
     */
    public function getNonRemovedCampaignCount()
    {
        return isset($this->non_removed_campaign_count) ? $this->non_removed_campaign_count : 0;
    }

    public function hasNonRemovedCampaignCount()
    {
        return isset($this->non_removed_campaign_count);
    }

    public function clearNonRemovedCampaignCount()
    {
        unset($this->non_removed_campaign_count);
    }

    /**
     * Output only. The number of non-removed campaigns attached to this bidding
     * strategy.
     * This field is read-only.
     *
     * Generated from protobuf field <code>optional int64 non_removed_campaign_count = 19 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param int|string $var
     * @return $this
     */
    public function setNonRemovedCampaignCount($var)
    {
        GPBUtil::checkInt64($var);
        $this->non_removed_campaign_count = $var;

        return $this;
    }

    /**
     * A bidding strategy that raises bids for clicks that seem more likely to
     * lead to a conversion and lowers them for clicks where they seem less
     * likely.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.common.EnhancedCpc enhanced_cpc = 7;</code>
     * @return \Google\Ads\GoogleAds\V19\Common\EnhancedCpc|null
     */
    public function getEnhancedCpc()
    {
        return $this->readOneof(7);
    }

    public function hasEnhancedCpc()
    {
        return $this->hasOneof(7);
    }

    /**
     * A bidding strategy that raises bids for clicks that seem more likely to
     * lead to a conversion and lowers them for clicks where they seem less
     * likely.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.common.EnhancedCpc enhanced_cpc = 7;</code>
     * @param \Google\Ads\GoogleAds\V19\Common\EnhancedCpc $var
     * @return $this
     */
    public function setEnhancedCpc($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V19\Common\EnhancedCpc::class);
        $this->writeOneof(7, $var);

        return $this;
    }

    /**
     * An automated bidding strategy to help get the most conversion value for
     * your campaigns while spending your budget.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.common.MaximizeConversionValue maximize_conversion_value = 21;</code>
     * @return \Google\Ads\GoogleAds\V19\Common\MaximizeConversionValue|null
     */
    public function getMaximizeConversionValue()
    {
        return $this->readOneof(21);
    }

    public function hasMaximizeConversionValue()
    {
        return $this->hasOneof(21);
    }

    /**
     * An automated bidding strategy to help get the most conversion value for
     * your campaigns while spending your budget.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.common.MaximizeConversionValue maximize_conversion_value = 21;</code>
     * @param \Google\Ads\GoogleAds\V19\Common\MaximizeConversionValue $var
     * @return $this
     */
    public function setMaximizeConversionValue($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V19\Common\MaximizeConversionValue::class);
        $this->writeOneof(21, $var);

        return $this;
    }

    /**
     * An automated bidding strategy to help get the most conversions for your
     * campaigns while spending your budget.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.common.MaximizeConversions maximize_conversions = 22;</code>
     * @return \Google\Ads\GoogleAds\V19\Common\MaximizeConversions|null
     */
    public function getMaximizeConversions()
    {
        return $this->readOneof(22);
    }

    public function hasMaximizeConversions()
    {
        return $this->hasOneof(22);
    }

    /**
     * An automated bidding strategy to help get the most conversions for your
     * campaigns while spending your budget.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.common.MaximizeConversions maximize_conversions = 22;</code>
     * @param \Google\Ads\GoogleAds\V19\Common\MaximizeConversions $var
     * @return $this
     */
    public function setMaximizeConversions($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V19\Common\MaximizeConversions::class);
        $this->writeOneof(22, $var);

        return $this;
    }

    /**
     * A bidding strategy that sets bids to help get as many conversions as
     * possible at the target cost-per-acquisition (CPA) you set.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.common.TargetCpa target_cpa = 9;</code>
     * @return \Google\Ads\GoogleAds\V19\Common\TargetCpa|null
     */
    public function getTargetCpa()
    {
        return $this->readOneof(9);
    }

    public function hasTargetCpa()
    {
        return $this->hasOneof(9);
    }

    /**
     * A bidding strategy that sets bids to help get as many conversions as
     * possible at the target cost-per-acquisition (CPA) you set.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.common.TargetCpa target_cpa = 9;</code>
     * @param \Google\Ads\GoogleAds\V19\Common\TargetCpa $var
     * @return $this
     */
    public function setTargetCpa($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V19\Common\TargetCpa::class);
        $this->writeOneof(9, $var);

        return $this;
    }

    /**
     * A bidding strategy that automatically optimizes towards a chosen
     * percentage of impressions.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.common.TargetImpressionShare target_impression_share = 48;</code>
     * @return \Google\Ads\GoogleAds\V19\Common\TargetImpressionShare|null
     */
    public function getTargetImpressionShare()
    {
        return $this->readOneof(48);
    }

    public function hasTargetImpressionShare()
    {
        return $this->hasOneof(48);
    }

    /**
     * A bidding strategy that automatically optimizes towards a chosen
     * percentage of impressions.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.common.TargetImpressionShare target_impression_share = 48;</code>
     * @param \Google\Ads\GoogleAds\V19\Common\TargetImpressionShare $var
     * @return $this
     */
    public function setTargetImpressionShare($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V19\Common\TargetImpressionShare::class);
        $this->writeOneof(48, $var);

        return $this;
    }

    /**
     * A bidding strategy that helps you maximize revenue while averaging a
     * specific target Return On Ad Spend (ROAS).
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.common.TargetRoas target_roas = 11;</code>
     * @return \Google\Ads\GoogleAds\V19\Common\TargetRoas|null
     */
    public function getTargetRoas()
    {
        return $this->readOneof(11);
    }

    public function hasTargetRoas()
    {
        return $this->hasOneof(11);
    }

    /**
     * A bidding strategy that helps you maximize revenue while averaging a
     * specific target Return On Ad Spend (ROAS).
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.common.TargetRoas target_roas = 11;</code>
     * @param \Google\Ads\GoogleAds\V19\Common\TargetRoas $var
     * @return $this
     */
    public function setTargetRoas($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V19\Common\TargetRoas::class);
        $this->writeOneof(11, $var);

        return $this;
    }

    /**
     * A bid strategy that sets your bids to help get as many clicks as
     * possible within your budget.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.common.TargetSpend target_spend = 12;</code>
     * @return \Google\Ads\GoogleAds\V19\Common\TargetSpend|null
     */
    public function getTargetSpend()
    {
        return $this->readOneof(12);
    }

    public function hasTargetSpend()
    {
        return $this->hasOneof(12);
    }

    /**
     * A bid strategy that sets your bids to help get as many clicks as
     * possible within your budget.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.common.TargetSpend target_spend = 12;</code>
     * @param \Google\Ads\GoogleAds\V19\Common\TargetSpend $var
     * @return $this
     */
    public function setTargetSpend($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V19\Common\TargetSpend::class);
        $this->writeOneof(12, $var);

        return $this;
    }

    /**
     * @return string
     */
    public function getScheme()
    {
        return $this->whichOneof("scheme");
    }

}

