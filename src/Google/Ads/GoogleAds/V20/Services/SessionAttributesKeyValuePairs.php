<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/services/conversion_upload_service.proto

namespace Google\Ads\GoogleAds\V20\Services;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Contains session attributes of the conversion, represented as key-value
 * pairs.
 *
 * Generated from protobuf message <code>google.ads.googleads.v20.services.SessionAttributesKeyValuePairs</code>
 */
class SessionAttributesKeyValuePairs extends \Google\Protobuf\Internal\Message
{
    /**
     * Required. The session attributes for the conversion.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v20.services.SessionAttributeKeyValuePair key_value_pairs = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    private $key_value_pairs;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type array<\Google\Ads\GoogleAds\V20\Services\SessionAttributeKeyValuePair>|\Google\Protobuf\Internal\RepeatedField $key_value_pairs
     *           Required. The session attributes for the conversion.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V20\Services\ConversionUploadService::initOnce();
        parent::__construct($data);
    }

    /**
     * Required. The session attributes for the conversion.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v20.services.SessionAttributeKeyValuePair key_value_pairs = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getKeyValuePairs()
    {
        return $this->key_value_pairs;
    }

    /**
     * Required. The session attributes for the conversion.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v20.services.SessionAttributeKeyValuePair key_value_pairs = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param array<\Google\Ads\GoogleAds\V20\Services\SessionAttributeKeyValuePair>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setKeyValuePairs($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Ads\GoogleAds\V20\Services\SessionAttributeKeyValuePair::class);
        $this->key_value_pairs = $arr;

        return $this;
    }

}

