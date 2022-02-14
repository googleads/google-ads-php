<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v10/resources/campaign.proto

namespace Google\Ads\GoogleAds\V10\Resources\Campaign;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Settings for the audience targeting.
 *
 * Generated from protobuf message <code>google.ads.googleads.v10.resources.Campaign.AudienceSetting</code>
 */
class AudienceSetting extends \Google\Protobuf\Internal\Message
{
    /**
     * Immutable. If true, this campaign uses an Audience resource for audience targeting.
     * If false, this campaign may use audience segment criteria instead.
     *
     * Generated from protobuf field <code>optional bool use_audience_grouped = 1 [(.google.api.field_behavior) = IMMUTABLE];</code>
     */
    protected $use_audience_grouped = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type bool $use_audience_grouped
     *           Immutable. If true, this campaign uses an Audience resource for audience targeting.
     *           If false, this campaign may use audience segment criteria instead.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V10\Resources\Campaign::initOnce();
        parent::__construct($data);
    }

    /**
     * Immutable. If true, this campaign uses an Audience resource for audience targeting.
     * If false, this campaign may use audience segment criteria instead.
     *
     * Generated from protobuf field <code>optional bool use_audience_grouped = 1 [(.google.api.field_behavior) = IMMUTABLE];</code>
     * @return bool
     */
    public function getUseAudienceGrouped()
    {
        return isset($this->use_audience_grouped) ? $this->use_audience_grouped : false;
    }

    public function hasUseAudienceGrouped()
    {
        return isset($this->use_audience_grouped);
    }

    public function clearUseAudienceGrouped()
    {
        unset($this->use_audience_grouped);
    }

    /**
     * Immutable. If true, this campaign uses an Audience resource for audience targeting.
     * If false, this campaign may use audience segment criteria instead.
     *
     * Generated from protobuf field <code>optional bool use_audience_grouped = 1 [(.google.api.field_behavior) = IMMUTABLE];</code>
     * @param bool $var
     * @return $this
     */
    public function setUseAudienceGrouped($var)
    {
        GPBUtil::checkBool($var);
        $this->use_audience_grouped = $var;

        return $this;
    }

}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AudienceSetting::class, \Google\Ads\GoogleAds\V10\Resources\Campaign_AudienceSetting::class);

