<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v11/common/feed_item_set_filter_type_infos.proto

namespace Google\Ads\GoogleAds\V11\Common;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Represents a filter on locations in a feed item set.
 * Only applicable if the parent Feed of the FeedItemSet is a LOCATION feed.
 *
 * Generated from protobuf message <code>google.ads.googleads.v11.common.DynamicLocationSetFilter</code>
 */
class DynamicLocationSetFilter extends \Google\Protobuf\Internal\Message
{
    /**
     * If multiple labels are set, then only feeditems marked with all the labels
     * will be added to the FeedItemSet.
     *
     * Generated from protobuf field <code>repeated string labels = 1;</code>
     */
    private $labels;
    /**
     * Business name filter.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v11.common.BusinessNameFilter business_name_filter = 2;</code>
     */
    protected $business_name_filter = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type array<string>|\Google\Protobuf\Internal\RepeatedField $labels
     *           If multiple labels are set, then only feeditems marked with all the labels
     *           will be added to the FeedItemSet.
     *     @type \Google\Ads\GoogleAds\V11\Common\BusinessNameFilter $business_name_filter
     *           Business name filter.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V11\Common\FeedItemSetFilterTypeInfos::initOnce();
        parent::__construct($data);
    }

    /**
     * If multiple labels are set, then only feeditems marked with all the labels
     * will be added to the FeedItemSet.
     *
     * Generated from protobuf field <code>repeated string labels = 1;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getLabels()
    {
        return $this->labels;
    }

    /**
     * If multiple labels are set, then only feeditems marked with all the labels
     * will be added to the FeedItemSet.
     *
     * Generated from protobuf field <code>repeated string labels = 1;</code>
     * @param array<string>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setLabels($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::STRING);
        $this->labels = $arr;

        return $this;
    }

    /**
     * Business name filter.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v11.common.BusinessNameFilter business_name_filter = 2;</code>
     * @return \Google\Ads\GoogleAds\V11\Common\BusinessNameFilter|null
     */
    public function getBusinessNameFilter()
    {
        return $this->business_name_filter;
    }

    public function hasBusinessNameFilter()
    {
        return isset($this->business_name_filter);
    }

    public function clearBusinessNameFilter()
    {
        unset($this->business_name_filter);
    }

    /**
     * Business name filter.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v11.common.BusinessNameFilter business_name_filter = 2;</code>
     * @param \Google\Ads\GoogleAds\V11\Common\BusinessNameFilter $var
     * @return $this
     */
    public function setBusinessNameFilter($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V11\Common\BusinessNameFilter::class);
        $this->business_name_filter = $var;

        return $this;
    }

}

