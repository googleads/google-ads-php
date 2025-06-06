<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/common/audiences.proto

namespace Google\Ads\GoogleAds\V20\Common;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Positive audience segment.
 *
 * Generated from protobuf message <code>google.ads.googleads.v20.common.AudienceSegment</code>
 */
class AudienceSegment extends \Google\Protobuf\Internal\Message
{
    protected $segment;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Google\Ads\GoogleAds\V20\Common\UserListSegment $user_list
     *           User list segment.
     *     @type \Google\Ads\GoogleAds\V20\Common\UserInterestSegment $user_interest
     *           Affinity or In-market segment.
     *     @type \Google\Ads\GoogleAds\V20\Common\LifeEventSegment $life_event
     *           Live-event audience segment.
     *     @type \Google\Ads\GoogleAds\V20\Common\DetailedDemographicSegment $detailed_demographic
     *           Detailed demographic segment.
     *     @type \Google\Ads\GoogleAds\V20\Common\CustomAudienceSegment $custom_audience
     *           Custom audience segment.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V20\Common\Audiences::initOnce();
        parent::__construct($data);
    }

    /**
     * User list segment.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.common.UserListSegment user_list = 1;</code>
     * @return \Google\Ads\GoogleAds\V20\Common\UserListSegment|null
     */
    public function getUserList()
    {
        return $this->readOneof(1);
    }

    public function hasUserList()
    {
        return $this->hasOneof(1);
    }

    /**
     * User list segment.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.common.UserListSegment user_list = 1;</code>
     * @param \Google\Ads\GoogleAds\V20\Common\UserListSegment $var
     * @return $this
     */
    public function setUserList($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V20\Common\UserListSegment::class);
        $this->writeOneof(1, $var);

        return $this;
    }

    /**
     * Affinity or In-market segment.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.common.UserInterestSegment user_interest = 2;</code>
     * @return \Google\Ads\GoogleAds\V20\Common\UserInterestSegment|null
     */
    public function getUserInterest()
    {
        return $this->readOneof(2);
    }

    public function hasUserInterest()
    {
        return $this->hasOneof(2);
    }

    /**
     * Affinity or In-market segment.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.common.UserInterestSegment user_interest = 2;</code>
     * @param \Google\Ads\GoogleAds\V20\Common\UserInterestSegment $var
     * @return $this
     */
    public function setUserInterest($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V20\Common\UserInterestSegment::class);
        $this->writeOneof(2, $var);

        return $this;
    }

    /**
     * Live-event audience segment.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.common.LifeEventSegment life_event = 3;</code>
     * @return \Google\Ads\GoogleAds\V20\Common\LifeEventSegment|null
     */
    public function getLifeEvent()
    {
        return $this->readOneof(3);
    }

    public function hasLifeEvent()
    {
        return $this->hasOneof(3);
    }

    /**
     * Live-event audience segment.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.common.LifeEventSegment life_event = 3;</code>
     * @param \Google\Ads\GoogleAds\V20\Common\LifeEventSegment $var
     * @return $this
     */
    public function setLifeEvent($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V20\Common\LifeEventSegment::class);
        $this->writeOneof(3, $var);

        return $this;
    }

    /**
     * Detailed demographic segment.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.common.DetailedDemographicSegment detailed_demographic = 4;</code>
     * @return \Google\Ads\GoogleAds\V20\Common\DetailedDemographicSegment|null
     */
    public function getDetailedDemographic()
    {
        return $this->readOneof(4);
    }

    public function hasDetailedDemographic()
    {
        return $this->hasOneof(4);
    }

    /**
     * Detailed demographic segment.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.common.DetailedDemographicSegment detailed_demographic = 4;</code>
     * @param \Google\Ads\GoogleAds\V20\Common\DetailedDemographicSegment $var
     * @return $this
     */
    public function setDetailedDemographic($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V20\Common\DetailedDemographicSegment::class);
        $this->writeOneof(4, $var);

        return $this;
    }

    /**
     * Custom audience segment.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.common.CustomAudienceSegment custom_audience = 5;</code>
     * @return \Google\Ads\GoogleAds\V20\Common\CustomAudienceSegment|null
     */
    public function getCustomAudience()
    {
        return $this->readOneof(5);
    }

    public function hasCustomAudience()
    {
        return $this->hasOneof(5);
    }

    /**
     * Custom audience segment.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.common.CustomAudienceSegment custom_audience = 5;</code>
     * @param \Google\Ads\GoogleAds\V20\Common\CustomAudienceSegment $var
     * @return $this
     */
    public function setCustomAudience($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V20\Common\CustomAudienceSegment::class);
        $this->writeOneof(5, $var);

        return $this;
    }

    /**
     * @return string
     */
    public function getSegment()
    {
        return $this->whichOneof("segment");
    }

}

