<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/resources/accessible_bidding_strategy.proto

namespace Google\Ads\GoogleAds\V20\Resources;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Represents a view of BiddingStrategies owned by and shared with the customer.
 * In contrast to BiddingStrategy, this resource includes strategies owned by
 * managers of the customer and shared with this customer - in addition to
 * strategies owned by this customer. This resource does not provide metrics and
 * only exposes a limited subset of the BiddingStrategy attributes.
 *
 * Generated from protobuf message <code>google.ads.googleads.v20.resources.AccessibleBiddingStrategy</code>
 */
class AccessibleBiddingStrategy extends \Google\Protobuf\Internal\Message
{
    /**
     * Output only. The resource name of the accessible bidding strategy.
     * AccessibleBiddingStrategy resource names have the form:
     * `customers/{customer_id}/accessibleBiddingStrategies/{bidding_strategy_id}`
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     */
    protected $resource_name = '';
    /**
     * Output only. The ID of the bidding strategy.
     *
     * Generated from protobuf field <code>int64 id = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $id = 0;
    /**
     * Output only. The name of the bidding strategy.
     *
     * Generated from protobuf field <code>string name = 3 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $name = '';
    /**
     * Output only. The type of the bidding strategy.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.enums.BiddingStrategyTypeEnum.BiddingStrategyType type = 4 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $type = 0;
    /**
     * Output only. The ID of the Customer which owns the bidding strategy.
     *
     * Generated from protobuf field <code>int64 owner_customer_id = 5 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $owner_customer_id = 0;
    /**
     * Output only. descriptive_name of the Customer which owns the bidding
     * strategy.
     *
     * Generated from protobuf field <code>string owner_descriptive_name = 6 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $owner_descriptive_name = '';
    protected $scheme;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $resource_name
     *           Output only. The resource name of the accessible bidding strategy.
     *           AccessibleBiddingStrategy resource names have the form:
     *           `customers/{customer_id}/accessibleBiddingStrategies/{bidding_strategy_id}`
     *     @type int|string $id
     *           Output only. The ID of the bidding strategy.
     *     @type string $name
     *           Output only. The name of the bidding strategy.
     *     @type int $type
     *           Output only. The type of the bidding strategy.
     *     @type int|string $owner_customer_id
     *           Output only. The ID of the Customer which owns the bidding strategy.
     *     @type string $owner_descriptive_name
     *           Output only. descriptive_name of the Customer which owns the bidding
     *           strategy.
     *     @type \Google\Ads\GoogleAds\V20\Resources\AccessibleBiddingStrategy\MaximizeConversionValue $maximize_conversion_value
     *           Output only. An automated bidding strategy to help get the most
     *           conversion value for your campaigns while spending your budget.
     *     @type \Google\Ads\GoogleAds\V20\Resources\AccessibleBiddingStrategy\MaximizeConversions $maximize_conversions
     *           Output only. An automated bidding strategy to help get the most
     *           conversions for your campaigns while spending your budget.
     *     @type \Google\Ads\GoogleAds\V20\Resources\AccessibleBiddingStrategy\TargetCpa $target_cpa
     *           Output only. A bidding strategy that sets bids to help get as many
     *           conversions as possible at the target cost-per-acquisition (CPA) you set.
     *     @type \Google\Ads\GoogleAds\V20\Resources\AccessibleBiddingStrategy\TargetImpressionShare $target_impression_share
     *           Output only. A bidding strategy that automatically optimizes towards a
     *           chosen percentage of impressions.
     *     @type \Google\Ads\GoogleAds\V20\Resources\AccessibleBiddingStrategy\TargetRoas $target_roas
     *           Output only. A bidding strategy that helps you maximize revenue while
     *           averaging a specific target Return On Ad Spend (ROAS).
     *     @type \Google\Ads\GoogleAds\V20\Resources\AccessibleBiddingStrategy\TargetSpend $target_spend
     *           Output only. A bid strategy that sets your bids to help get as many
     *           clicks as possible within your budget.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V20\Resources\AccessibleBiddingStrategy::initOnce();
        parent::__construct($data);
    }

    /**
     * Output only. The resource name of the accessible bidding strategy.
     * AccessibleBiddingStrategy resource names have the form:
     * `customers/{customer_id}/accessibleBiddingStrategies/{bidding_strategy_id}`
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getResourceName()
    {
        return $this->resource_name;
    }

    /**
     * Output only. The resource name of the accessible bidding strategy.
     * AccessibleBiddingStrategy resource names have the form:
     * `customers/{customer_id}/accessibleBiddingStrategies/{bidding_strategy_id}`
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
     * Output only. The ID of the bidding strategy.
     *
     * Generated from protobuf field <code>int64 id = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return int|string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Output only. The ID of the bidding strategy.
     *
     * Generated from protobuf field <code>int64 id = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
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
     * Output only. The name of the bidding strategy.
     *
     * Generated from protobuf field <code>string name = 3 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Output only. The name of the bidding strategy.
     *
     * Generated from protobuf field <code>string name = 3 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
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
     * Output only. The type of the bidding strategy.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.enums.BiddingStrategyTypeEnum.BiddingStrategyType type = 4 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return int
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Output only. The type of the bidding strategy.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.enums.BiddingStrategyTypeEnum.BiddingStrategyType type = 4 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param int $var
     * @return $this
     */
    public function setType($var)
    {
        GPBUtil::checkEnum($var, \Google\Ads\GoogleAds\V20\Enums\BiddingStrategyTypeEnum\BiddingStrategyType::class);
        $this->type = $var;

        return $this;
    }

    /**
     * Output only. The ID of the Customer which owns the bidding strategy.
     *
     * Generated from protobuf field <code>int64 owner_customer_id = 5 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return int|string
     */
    public function getOwnerCustomerId()
    {
        return $this->owner_customer_id;
    }

    /**
     * Output only. The ID of the Customer which owns the bidding strategy.
     *
     * Generated from protobuf field <code>int64 owner_customer_id = 5 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param int|string $var
     * @return $this
     */
    public function setOwnerCustomerId($var)
    {
        GPBUtil::checkInt64($var);
        $this->owner_customer_id = $var;

        return $this;
    }

    /**
     * Output only. descriptive_name of the Customer which owns the bidding
     * strategy.
     *
     * Generated from protobuf field <code>string owner_descriptive_name = 6 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return string
     */
    public function getOwnerDescriptiveName()
    {
        return $this->owner_descriptive_name;
    }

    /**
     * Output only. descriptive_name of the Customer which owns the bidding
     * strategy.
     *
     * Generated from protobuf field <code>string owner_descriptive_name = 6 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param string $var
     * @return $this
     */
    public function setOwnerDescriptiveName($var)
    {
        GPBUtil::checkString($var, True);
        $this->owner_descriptive_name = $var;

        return $this;
    }

    /**
     * Output only. An automated bidding strategy to help get the most
     * conversion value for your campaigns while spending your budget.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.resources.AccessibleBiddingStrategy.MaximizeConversionValue maximize_conversion_value = 7 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return \Google\Ads\GoogleAds\V20\Resources\AccessibleBiddingStrategy\MaximizeConversionValue|null
     */
    public function getMaximizeConversionValue()
    {
        return $this->readOneof(7);
    }

    public function hasMaximizeConversionValue()
    {
        return $this->hasOneof(7);
    }

    /**
     * Output only. An automated bidding strategy to help get the most
     * conversion value for your campaigns while spending your budget.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.resources.AccessibleBiddingStrategy.MaximizeConversionValue maximize_conversion_value = 7 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param \Google\Ads\GoogleAds\V20\Resources\AccessibleBiddingStrategy\MaximizeConversionValue $var
     * @return $this
     */
    public function setMaximizeConversionValue($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V20\Resources\AccessibleBiddingStrategy\MaximizeConversionValue::class);
        $this->writeOneof(7, $var);

        return $this;
    }

    /**
     * Output only. An automated bidding strategy to help get the most
     * conversions for your campaigns while spending your budget.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.resources.AccessibleBiddingStrategy.MaximizeConversions maximize_conversions = 8 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return \Google\Ads\GoogleAds\V20\Resources\AccessibleBiddingStrategy\MaximizeConversions|null
     */
    public function getMaximizeConversions()
    {
        return $this->readOneof(8);
    }

    public function hasMaximizeConversions()
    {
        return $this->hasOneof(8);
    }

    /**
     * Output only. An automated bidding strategy to help get the most
     * conversions for your campaigns while spending your budget.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.resources.AccessibleBiddingStrategy.MaximizeConversions maximize_conversions = 8 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param \Google\Ads\GoogleAds\V20\Resources\AccessibleBiddingStrategy\MaximizeConversions $var
     * @return $this
     */
    public function setMaximizeConversions($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V20\Resources\AccessibleBiddingStrategy\MaximizeConversions::class);
        $this->writeOneof(8, $var);

        return $this;
    }

    /**
     * Output only. A bidding strategy that sets bids to help get as many
     * conversions as possible at the target cost-per-acquisition (CPA) you set.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.resources.AccessibleBiddingStrategy.TargetCpa target_cpa = 9 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return \Google\Ads\GoogleAds\V20\Resources\AccessibleBiddingStrategy\TargetCpa|null
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
     * Output only. A bidding strategy that sets bids to help get as many
     * conversions as possible at the target cost-per-acquisition (CPA) you set.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.resources.AccessibleBiddingStrategy.TargetCpa target_cpa = 9 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param \Google\Ads\GoogleAds\V20\Resources\AccessibleBiddingStrategy\TargetCpa $var
     * @return $this
     */
    public function setTargetCpa($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V20\Resources\AccessibleBiddingStrategy\TargetCpa::class);
        $this->writeOneof(9, $var);

        return $this;
    }

    /**
     * Output only. A bidding strategy that automatically optimizes towards a
     * chosen percentage of impressions.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.resources.AccessibleBiddingStrategy.TargetImpressionShare target_impression_share = 10 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return \Google\Ads\GoogleAds\V20\Resources\AccessibleBiddingStrategy\TargetImpressionShare|null
     */
    public function getTargetImpressionShare()
    {
        return $this->readOneof(10);
    }

    public function hasTargetImpressionShare()
    {
        return $this->hasOneof(10);
    }

    /**
     * Output only. A bidding strategy that automatically optimizes towards a
     * chosen percentage of impressions.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.resources.AccessibleBiddingStrategy.TargetImpressionShare target_impression_share = 10 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param \Google\Ads\GoogleAds\V20\Resources\AccessibleBiddingStrategy\TargetImpressionShare $var
     * @return $this
     */
    public function setTargetImpressionShare($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V20\Resources\AccessibleBiddingStrategy\TargetImpressionShare::class);
        $this->writeOneof(10, $var);

        return $this;
    }

    /**
     * Output only. A bidding strategy that helps you maximize revenue while
     * averaging a specific target Return On Ad Spend (ROAS).
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.resources.AccessibleBiddingStrategy.TargetRoas target_roas = 11 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return \Google\Ads\GoogleAds\V20\Resources\AccessibleBiddingStrategy\TargetRoas|null
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
     * Output only. A bidding strategy that helps you maximize revenue while
     * averaging a specific target Return On Ad Spend (ROAS).
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.resources.AccessibleBiddingStrategy.TargetRoas target_roas = 11 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param \Google\Ads\GoogleAds\V20\Resources\AccessibleBiddingStrategy\TargetRoas $var
     * @return $this
     */
    public function setTargetRoas($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V20\Resources\AccessibleBiddingStrategy\TargetRoas::class);
        $this->writeOneof(11, $var);

        return $this;
    }

    /**
     * Output only. A bid strategy that sets your bids to help get as many
     * clicks as possible within your budget.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.resources.AccessibleBiddingStrategy.TargetSpend target_spend = 12 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return \Google\Ads\GoogleAds\V20\Resources\AccessibleBiddingStrategy\TargetSpend|null
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
     * Output only. A bid strategy that sets your bids to help get as many
     * clicks as possible within your budget.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.resources.AccessibleBiddingStrategy.TargetSpend target_spend = 12 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param \Google\Ads\GoogleAds\V20\Resources\AccessibleBiddingStrategy\TargetSpend $var
     * @return $this
     */
    public function setTargetSpend($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V20\Resources\AccessibleBiddingStrategy\TargetSpend::class);
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

