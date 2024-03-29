<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: Google/Ads/GoogleAds/Util/FieldMasks/Proto/tester.proto

namespace Google\Ads\GoogleAds\Util\FieldMasks\Proto;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * The non-optional sub-message field for Resource.
 *
 * Generated from protobuf message <code>google.ads.googleads.util.fieldmasks.proto.DynamicSetting</code>
 */
class DynamicSetting extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>string domain_name = 1;</code>
     */
    protected $domain_name = '';
    /**
     * Generated from protobuf field <code>bool use_supplied_urls_only = 2;</code>
     */
    protected $use_supplied_urls_only = null;
    /**
     * Generated from protobuf field <code>.google.ads.googleads.util.fieldmasks.proto.TrackingSetting tracking_setting = 3;</code>
     */
    protected $tracking_setting = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $domain_name
     *     @type bool $use_supplied_urls_only
     *     @type \Google\Ads\GoogleAds\Util\FieldMasks\Proto\TrackingSetting $tracking_setting
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\Util\FieldMasks\Proto\Tester::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>string domain_name = 1;</code>
     * @return string
     */
    public function getDomainName()
    {
        return $this->domain_name;
    }

    /**
     * Generated from protobuf field <code>string domain_name = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setDomainName($var)
    {
        GPBUtil::checkString($var, True);
        $this->domain_name = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>bool use_supplied_urls_only = 2;</code>
     * @return bool
     */
    public function getUseSuppliedUrlsOnly()
    {
        return isset($this->use_supplied_urls_only) ? $this->use_supplied_urls_only : false;
    }

    public function hasUseSuppliedUrlsOnly()
    {
        return isset($this->use_supplied_urls_only);
    }

    public function clearUseSuppliedUrlsOnly()
    {
        unset($this->use_supplied_urls_only);
    }

    /**
     * Generated from protobuf field <code>bool use_supplied_urls_only = 2;</code>
     * @param bool $var
     * @return $this
     */
    public function setUseSuppliedUrlsOnly($var)
    {
        GPBUtil::checkBool($var);
        $this->use_supplied_urls_only = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>.google.ads.googleads.util.fieldmasks.proto.TrackingSetting tracking_setting = 3;</code>
     * @return \Google\Ads\GoogleAds\Util\FieldMasks\Proto\TrackingSetting
     */
    public function getTrackingSetting()
    {
        return isset($this->tracking_setting) ? $this->tracking_setting : null;
    }

    public function hasTrackingSetting()
    {
        return isset($this->tracking_setting);
    }

    public function clearTrackingSetting()
    {
        unset($this->tracking_setting);
    }

    /**
     * Generated from protobuf field <code>.google.ads.googleads.util.fieldmasks.proto.TrackingSetting tracking_setting = 3;</code>
     * @param \Google\Ads\GoogleAds\Util\FieldMasks\Proto\TrackingSetting $var
     * @return $this
     */
    public function setTrackingSetting($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\Util\FieldMasks\Proto\TrackingSetting::class);
        $this->tracking_setting = $var;

        return $this;
    }

}

