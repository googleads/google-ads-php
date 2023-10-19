<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v15/resources/customer_sk_ad_network_conversion_value_schema.proto

namespace Google\Ads\GoogleAds\V15\Resources\CustomerSkAdNetworkConversionValueSchema\SkAdNetworkConversionValueSchema;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Mappings for fine grained conversion value.
 *
 * Generated from protobuf message <code>google.ads.googleads.v15.resources.CustomerSkAdNetworkConversionValueSchema.SkAdNetworkConversionValueSchema.FineGrainedConversionValueMappings</code>
 */
class FineGrainedConversionValueMappings extends \Google\Protobuf\Internal\Message
{
    /**
     * Output only. Fine grained conversion value. Valid values are in the
     * inclusive range [0,63].
     *
     * Generated from protobuf field <code>int32 fine_grained_conversion_value = 1 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $fine_grained_conversion_value = 0;
    /**
     * Output only. Conversion events the fine grained conversion value maps
     * to.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v15.resources.CustomerSkAdNetworkConversionValueSchema.SkAdNetworkConversionValueSchema.ConversionValueMapping conversion_value_mapping = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $conversion_value_mapping = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int $fine_grained_conversion_value
     *           Output only. Fine grained conversion value. Valid values are in the
     *           inclusive range [0,63].
     *     @type \Google\Ads\GoogleAds\V15\Resources\CustomerSkAdNetworkConversionValueSchema\SkAdNetworkConversionValueSchema\ConversionValueMapping $conversion_value_mapping
     *           Output only. Conversion events the fine grained conversion value maps
     *           to.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V15\Resources\CustomerSkAdNetworkConversionValueSchema::initOnce();
        parent::__construct($data);
    }

    /**
     * Output only. Fine grained conversion value. Valid values are in the
     * inclusive range [0,63].
     *
     * Generated from protobuf field <code>int32 fine_grained_conversion_value = 1 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return int
     */
    public function getFineGrainedConversionValue()
    {
        return $this->fine_grained_conversion_value;
    }

    /**
     * Output only. Fine grained conversion value. Valid values are in the
     * inclusive range [0,63].
     *
     * Generated from protobuf field <code>int32 fine_grained_conversion_value = 1 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param int $var
     * @return $this
     */
    public function setFineGrainedConversionValue($var)
    {
        GPBUtil::checkInt32($var);
        $this->fine_grained_conversion_value = $var;

        return $this;
    }

    /**
     * Output only. Conversion events the fine grained conversion value maps
     * to.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v15.resources.CustomerSkAdNetworkConversionValueSchema.SkAdNetworkConversionValueSchema.ConversionValueMapping conversion_value_mapping = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return \Google\Ads\GoogleAds\V15\Resources\CustomerSkAdNetworkConversionValueSchema\SkAdNetworkConversionValueSchema\ConversionValueMapping|null
     */
    public function getConversionValueMapping()
    {
        return $this->conversion_value_mapping;
    }

    public function hasConversionValueMapping()
    {
        return isset($this->conversion_value_mapping);
    }

    public function clearConversionValueMapping()
    {
        unset($this->conversion_value_mapping);
    }

    /**
     * Output only. Conversion events the fine grained conversion value maps
     * to.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v15.resources.CustomerSkAdNetworkConversionValueSchema.SkAdNetworkConversionValueSchema.ConversionValueMapping conversion_value_mapping = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param \Google\Ads\GoogleAds\V15\Resources\CustomerSkAdNetworkConversionValueSchema\SkAdNetworkConversionValueSchema\ConversionValueMapping $var
     * @return $this
     */
    public function setConversionValueMapping($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V15\Resources\CustomerSkAdNetworkConversionValueSchema\SkAdNetworkConversionValueSchema\ConversionValueMapping::class);
        $this->conversion_value_mapping = $var;

        return $this;
    }

}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(FineGrainedConversionValueMappings::class, \Google\Ads\GoogleAds\V15\Resources\CustomerSkAdNetworkConversionValueSchema_SkAdNetworkConversionValueSchema_FineGrainedConversionValueMappings::class);

