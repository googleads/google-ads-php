<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/services/conversion_upload_service.proto

namespace Google\Ads\GoogleAds\V20\Services;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Contains one session attribute of the conversion.
 *
 * Generated from protobuf message <code>google.ads.googleads.v20.services.SessionAttributeKeyValuePair</code>
 */
class SessionAttributeKeyValuePair extends \Google\Protobuf\Internal\Message
{
    /**
     * Required. The name of the session attribute.
     *
     * Generated from protobuf field <code>string session_attribute_key = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    protected $session_attribute_key = '';
    /**
     * Required. The value of the session attribute.
     *
     * Generated from protobuf field <code>string session_attribute_value = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    protected $session_attribute_value = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $session_attribute_key
     *           Required. The name of the session attribute.
     *     @type string $session_attribute_value
     *           Required. The value of the session attribute.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V20\Services\ConversionUploadService::initOnce();
        parent::__construct($data);
    }

    /**
     * Required. The name of the session attribute.
     *
     * Generated from protobuf field <code>string session_attribute_key = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return string
     */
    public function getSessionAttributeKey()
    {
        return $this->session_attribute_key;
    }

    /**
     * Required. The name of the session attribute.
     *
     * Generated from protobuf field <code>string session_attribute_key = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param string $var
     * @return $this
     */
    public function setSessionAttributeKey($var)
    {
        GPBUtil::checkString($var, True);
        $this->session_attribute_key = $var;

        return $this;
    }

    /**
     * Required. The value of the session attribute.
     *
     * Generated from protobuf field <code>string session_attribute_value = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return string
     */
    public function getSessionAttributeValue()
    {
        return $this->session_attribute_value;
    }

    /**
     * Required. The value of the session attribute.
     *
     * Generated from protobuf field <code>string session_attribute_value = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param string $var
     * @return $this
     */
    public function setSessionAttributeValue($var)
    {
        GPBUtil::checkString($var, True);
        $this->session_attribute_value = $var;

        return $this;
    }

}

