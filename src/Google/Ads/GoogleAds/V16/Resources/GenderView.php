<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v16/resources/gender_view.proto

namespace Google\Ads\GoogleAds\V16\Resources;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * A gender view.
 * The gender_view resource reflects the effective serving state, rather than
 * what criteria were added. An ad group without gender criteria by default
 * shows to all genders, so all genders appear in gender_view with stats.
 *
 * Generated from protobuf message <code>google.ads.googleads.v16.resources.GenderView</code>
 */
class GenderView extends \Google\Protobuf\Internal\Message
{
    /**
     * Output only. The resource name of the gender view.
     * Gender view resource names have the form:
     * `customers/{customer_id}/genderViews/{ad_group_id}~{criterion_id}`
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     */
    protected $resource_name = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $resource_name
     *           Output only. The resource name of the gender view.
     *           Gender view resource names have the form:
     *           `customers/{customer_id}/genderViews/{ad_group_id}~{criterion_id}`
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V16\Resources\GenderView::initOnce();
        parent::__construct($data);
    }

    /**
     * Output only. The resource name of the gender view.
     * Gender view resource names have the form:
     * `customers/{customer_id}/genderViews/{ad_group_id}~{criterion_id}`
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getResourceName()
    {
        return $this->resource_name;
    }

    /**
     * Output only. The resource name of the gender view.
     * Gender view resource names have the form:
     * `customers/{customer_id}/genderViews/{ad_group_id}~{criterion_id}`
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

}

