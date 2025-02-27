<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/resources/asset_group_listing_group_filter.proto

namespace Google\Ads\GoogleAds\V19\Resources\ListingGroupFilterDimension;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Matching condition for URL filtering.
 *
 * Generated from protobuf message <code>google.ads.googleads.v19.resources.ListingGroupFilterDimension.WebpageCondition</code>
 */
class WebpageCondition extends \Google\Protobuf\Internal\Message
{
    protected $condition;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $custom_label
     *           Filters the URLs in a page feed that have this custom label. A custom
     *           label can be added to a campaign by creating an AssetSet of type
     *           PAGE_FEED and linking it to the campaign using CampaignAssetSet.
     *     @type string $url_contains
     *           Filters the URLs in a page feed and the URLs from the advertiser web
     *           domain that contain this string.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V19\Resources\AssetGroupListingGroupFilter::initOnce();
        parent::__construct($data);
    }

    /**
     * Filters the URLs in a page feed that have this custom label. A custom
     * label can be added to a campaign by creating an AssetSet of type
     * PAGE_FEED and linking it to the campaign using CampaignAssetSet.
     *
     * Generated from protobuf field <code>string custom_label = 1;</code>
     * @return string
     */
    public function getCustomLabel()
    {
        return $this->readOneof(1);
    }

    public function hasCustomLabel()
    {
        return $this->hasOneof(1);
    }

    /**
     * Filters the URLs in a page feed that have this custom label. A custom
     * label can be added to a campaign by creating an AssetSet of type
     * PAGE_FEED and linking it to the campaign using CampaignAssetSet.
     *
     * Generated from protobuf field <code>string custom_label = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setCustomLabel($var)
    {
        GPBUtil::checkString($var, True);
        $this->writeOneof(1, $var);

        return $this;
    }

    /**
     * Filters the URLs in a page feed and the URLs from the advertiser web
     * domain that contain this string.
     *
     * Generated from protobuf field <code>string url_contains = 2;</code>
     * @return string
     */
    public function getUrlContains()
    {
        return $this->readOneof(2);
    }

    public function hasUrlContains()
    {
        return $this->hasOneof(2);
    }

    /**
     * Filters the URLs in a page feed and the URLs from the advertiser web
     * domain that contain this string.
     *
     * Generated from protobuf field <code>string url_contains = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setUrlContains($var)
    {
        GPBUtil::checkString($var, True);
        $this->writeOneof(2, $var);

        return $this;
    }

    /**
     * @return string
     */
    public function getCondition()
    {
        return $this->whichOneof("condition");
    }

}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(WebpageCondition::class, \Google\Ads\GoogleAds\V19\Resources\ListingGroupFilterDimension_WebpageCondition::class);

