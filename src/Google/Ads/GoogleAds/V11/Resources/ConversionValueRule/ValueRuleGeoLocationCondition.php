<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v11/resources/conversion_value_rule.proto

namespace Google\Ads\GoogleAds\V11\Resources\ConversionValueRule;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Condition on Geo dimension.
 *
 * Generated from protobuf message <code>google.ads.googleads.v11.resources.ConversionValueRule.ValueRuleGeoLocationCondition</code>
 */
class ValueRuleGeoLocationCondition extends \Google\Protobuf\Internal\Message
{
    /**
     * Geo locations that advertisers want to exclude.
     *
     * Generated from protobuf field <code>repeated string excluded_geo_target_constants = 1 [(.google.api.resource_reference) = {</code>
     */
    private $excluded_geo_target_constants;
    /**
     * Excluded Geo location match type.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v11.enums.ValueRuleGeoLocationMatchTypeEnum.ValueRuleGeoLocationMatchType excluded_geo_match_type = 2;</code>
     */
    protected $excluded_geo_match_type = 0;
    /**
     * Geo locations that advertisers want to include.
     *
     * Generated from protobuf field <code>repeated string geo_target_constants = 3 [(.google.api.resource_reference) = {</code>
     */
    private $geo_target_constants;
    /**
     * Included Geo location match type.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v11.enums.ValueRuleGeoLocationMatchTypeEnum.ValueRuleGeoLocationMatchType geo_match_type = 4;</code>
     */
    protected $geo_match_type = 0;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type array<string>|\Google\Protobuf\Internal\RepeatedField $excluded_geo_target_constants
     *           Geo locations that advertisers want to exclude.
     *     @type int $excluded_geo_match_type
     *           Excluded Geo location match type.
     *     @type array<string>|\Google\Protobuf\Internal\RepeatedField $geo_target_constants
     *           Geo locations that advertisers want to include.
     *     @type int $geo_match_type
     *           Included Geo location match type.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V11\Resources\ConversionValueRule::initOnce();
        parent::__construct($data);
    }

    /**
     * Geo locations that advertisers want to exclude.
     *
     * Generated from protobuf field <code>repeated string excluded_geo_target_constants = 1 [(.google.api.resource_reference) = {</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getExcludedGeoTargetConstants()
    {
        return $this->excluded_geo_target_constants;
    }

    /**
     * Geo locations that advertisers want to exclude.
     *
     * Generated from protobuf field <code>repeated string excluded_geo_target_constants = 1 [(.google.api.resource_reference) = {</code>
     * @param array<string>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setExcludedGeoTargetConstants($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::STRING);
        $this->excluded_geo_target_constants = $arr;

        return $this;
    }

    /**
     * Excluded Geo location match type.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v11.enums.ValueRuleGeoLocationMatchTypeEnum.ValueRuleGeoLocationMatchType excluded_geo_match_type = 2;</code>
     * @return int
     */
    public function getExcludedGeoMatchType()
    {
        return $this->excluded_geo_match_type;
    }

    /**
     * Excluded Geo location match type.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v11.enums.ValueRuleGeoLocationMatchTypeEnum.ValueRuleGeoLocationMatchType excluded_geo_match_type = 2;</code>
     * @param int $var
     * @return $this
     */
    public function setExcludedGeoMatchType($var)
    {
        GPBUtil::checkEnum($var, \Google\Ads\GoogleAds\V11\Enums\ValueRuleGeoLocationMatchTypeEnum\ValueRuleGeoLocationMatchType::class);
        $this->excluded_geo_match_type = $var;

        return $this;
    }

    /**
     * Geo locations that advertisers want to include.
     *
     * Generated from protobuf field <code>repeated string geo_target_constants = 3 [(.google.api.resource_reference) = {</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getGeoTargetConstants()
    {
        return $this->geo_target_constants;
    }

    /**
     * Geo locations that advertisers want to include.
     *
     * Generated from protobuf field <code>repeated string geo_target_constants = 3 [(.google.api.resource_reference) = {</code>
     * @param array<string>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setGeoTargetConstants($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::STRING);
        $this->geo_target_constants = $arr;

        return $this;
    }

    /**
     * Included Geo location match type.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v11.enums.ValueRuleGeoLocationMatchTypeEnum.ValueRuleGeoLocationMatchType geo_match_type = 4;</code>
     * @return int
     */
    public function getGeoMatchType()
    {
        return $this->geo_match_type;
    }

    /**
     * Included Geo location match type.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v11.enums.ValueRuleGeoLocationMatchTypeEnum.ValueRuleGeoLocationMatchType geo_match_type = 4;</code>
     * @param int $var
     * @return $this
     */
    public function setGeoMatchType($var)
    {
        GPBUtil::checkEnum($var, \Google\Ads\GoogleAds\V11\Enums\ValueRuleGeoLocationMatchTypeEnum\ValueRuleGeoLocationMatchType::class);
        $this->geo_match_type = $var;

        return $this;
    }

}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ValueRuleGeoLocationCondition::class, \Google\Ads\GoogleAds\V11\Resources\ConversionValueRule_ValueRuleGeoLocationCondition::class);

