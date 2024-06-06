<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v17/services/ad_group_extension_setting_service.proto

namespace Google\Ads\GoogleAds\V17\Services;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * The result for the ad group extension setting mutate.
 *
 * Generated from protobuf message <code>google.ads.googleads.v17.services.MutateAdGroupExtensionSettingResult</code>
 */
class MutateAdGroupExtensionSettingResult extends \Google\Protobuf\Internal\Message
{
    /**
     * Returned for successful operations.
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.resource_reference) = {</code>
     */
    protected $resource_name = '';
    /**
     * The mutated AdGroupExtensionSetting with only mutable fields after mutate.
     * The field will only be returned when response_content_type is set to
     * "MUTABLE_RESOURCE".
     *
     * Generated from protobuf field <code>.google.ads.googleads.v17.resources.AdGroupExtensionSetting ad_group_extension_setting = 2;</code>
     */
    protected $ad_group_extension_setting = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $resource_name
     *           Returned for successful operations.
     *     @type \Google\Ads\GoogleAds\V17\Resources\AdGroupExtensionSetting $ad_group_extension_setting
     *           The mutated AdGroupExtensionSetting with only mutable fields after mutate.
     *           The field will only be returned when response_content_type is set to
     *           "MUTABLE_RESOURCE".
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V17\Services\AdGroupExtensionSettingService::initOnce();
        parent::__construct($data);
    }

    /**
     * Returned for successful operations.
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getResourceName()
    {
        return $this->resource_name;
    }

    /**
     * Returned for successful operations.
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.resource_reference) = {</code>
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
     * The mutated AdGroupExtensionSetting with only mutable fields after mutate.
     * The field will only be returned when response_content_type is set to
     * "MUTABLE_RESOURCE".
     *
     * Generated from protobuf field <code>.google.ads.googleads.v17.resources.AdGroupExtensionSetting ad_group_extension_setting = 2;</code>
     * @return \Google\Ads\GoogleAds\V17\Resources\AdGroupExtensionSetting|null
     */
    public function getAdGroupExtensionSetting()
    {
        return $this->ad_group_extension_setting;
    }

    public function hasAdGroupExtensionSetting()
    {
        return isset($this->ad_group_extension_setting);
    }

    public function clearAdGroupExtensionSetting()
    {
        unset($this->ad_group_extension_setting);
    }

    /**
     * The mutated AdGroupExtensionSetting with only mutable fields after mutate.
     * The field will only be returned when response_content_type is set to
     * "MUTABLE_RESOURCE".
     *
     * Generated from protobuf field <code>.google.ads.googleads.v17.resources.AdGroupExtensionSetting ad_group_extension_setting = 2;</code>
     * @param \Google\Ads\GoogleAds\V17\Resources\AdGroupExtensionSetting $var
     * @return $this
     */
    public function setAdGroupExtensionSetting($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V17\Resources\AdGroupExtensionSetting::class);
        $this->ad_group_extension_setting = $var;

        return $this;
    }

}

