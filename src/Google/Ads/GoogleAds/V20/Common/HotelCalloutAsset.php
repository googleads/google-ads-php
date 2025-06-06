<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/common/asset_types.proto

namespace Google\Ads\GoogleAds\V20\Common;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * An asset representing a hotel callout.
 *
 * Generated from protobuf message <code>google.ads.googleads.v20.common.HotelCalloutAsset</code>
 */
class HotelCalloutAsset extends \Google\Protobuf\Internal\Message
{
    /**
     * Required. The text of the hotel callout asset.
     * The length of this string should be between 1 and 25, inclusive.
     *
     * Generated from protobuf field <code>string text = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    protected $text = '';
    /**
     * Required. The language of the hotel callout.
     * Represented as BCP 47 language tag.
     *
     * Generated from protobuf field <code>string language_code = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    protected $language_code = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $text
     *           Required. The text of the hotel callout asset.
     *           The length of this string should be between 1 and 25, inclusive.
     *     @type string $language_code
     *           Required. The language of the hotel callout.
     *           Represented as BCP 47 language tag.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V20\Common\AssetTypes::initOnce();
        parent::__construct($data);
    }

    /**
     * Required. The text of the hotel callout asset.
     * The length of this string should be between 1 and 25, inclusive.
     *
     * Generated from protobuf field <code>string text = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Required. The text of the hotel callout asset.
     * The length of this string should be between 1 and 25, inclusive.
     *
     * Generated from protobuf field <code>string text = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param string $var
     * @return $this
     */
    public function setText($var)
    {
        GPBUtil::checkString($var, True);
        $this->text = $var;

        return $this;
    }

    /**
     * Required. The language of the hotel callout.
     * Represented as BCP 47 language tag.
     *
     * Generated from protobuf field <code>string language_code = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return string
     */
    public function getLanguageCode()
    {
        return $this->language_code;
    }

    /**
     * Required. The language of the hotel callout.
     * Represented as BCP 47 language tag.
     *
     * Generated from protobuf field <code>string language_code = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param string $var
     * @return $this
     */
    public function setLanguageCode($var)
    {
        GPBUtil::checkString($var, True);
        $this->language_code = $var;

        return $this;
    }

}

