<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/resources/customer.proto

namespace Google\Ads\GoogleAds\V20\Resources;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Remarketing setting for a customer.
 *
 * Generated from protobuf message <code>google.ads.googleads.v20.resources.RemarketingSetting</code>
 */
class RemarketingSetting extends \Google\Protobuf\Internal\Message
{
    /**
     * Output only. The Google tag.
     *
     * Generated from protobuf field <code>optional string google_global_site_tag = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $google_global_site_tag = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $google_global_site_tag
     *           Output only. The Google tag.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V20\Resources\Customer::initOnce();
        parent::__construct($data);
    }

    /**
     * Output only. The Google tag.
     *
     * Generated from protobuf field <code>optional string google_global_site_tag = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return string
     */
    public function getGoogleGlobalSiteTag()
    {
        return isset($this->google_global_site_tag) ? $this->google_global_site_tag : '';
    }

    public function hasGoogleGlobalSiteTag()
    {
        return isset($this->google_global_site_tag);
    }

    public function clearGoogleGlobalSiteTag()
    {
        unset($this->google_global_site_tag);
    }

    /**
     * Output only. The Google tag.
     *
     * Generated from protobuf field <code>optional string google_global_site_tag = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param string $var
     * @return $this
     */
    public function setGoogleGlobalSiteTag($var)
    {
        GPBUtil::checkString($var, True);
        $this->google_global_site_tag = $var;

        return $this;
    }

}

