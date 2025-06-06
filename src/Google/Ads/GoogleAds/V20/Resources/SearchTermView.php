<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/resources/search_term_view.proto

namespace Google\Ads\GoogleAds\V20\Resources;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * A search term view with metrics aggregated by search term at the ad group
 * level.
 *
 * Generated from protobuf message <code>google.ads.googleads.v20.resources.SearchTermView</code>
 */
class SearchTermView extends \Google\Protobuf\Internal\Message
{
    /**
     * Output only. The resource name of the search term view.
     * Search term view resource names have the form:
     * `customers/{customer_id}/searchTermViews/{campaign_id}~{ad_group_id}~{URL-base64_search_term}`
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     */
    protected $resource_name = '';
    /**
     * Output only. The search term.
     *
     * Generated from protobuf field <code>optional string search_term = 5 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $search_term = null;
    /**
     * Output only. The ad group the search term served in.
     *
     * Generated from protobuf field <code>optional string ad_group = 6 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     */
    protected $ad_group = null;
    /**
     * Output only. Indicates whether the search term is currently one of your
     * targeted or excluded keywords.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.enums.SearchTermTargetingStatusEnum.SearchTermTargetingStatus status = 4 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $status = 0;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $resource_name
     *           Output only. The resource name of the search term view.
     *           Search term view resource names have the form:
     *           `customers/{customer_id}/searchTermViews/{campaign_id}~{ad_group_id}~{URL-base64_search_term}`
     *     @type string $search_term
     *           Output only. The search term.
     *     @type string $ad_group
     *           Output only. The ad group the search term served in.
     *     @type int $status
     *           Output only. Indicates whether the search term is currently one of your
     *           targeted or excluded keywords.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V20\Resources\SearchTermView::initOnce();
        parent::__construct($data);
    }

    /**
     * Output only. The resource name of the search term view.
     * Search term view resource names have the form:
     * `customers/{customer_id}/searchTermViews/{campaign_id}~{ad_group_id}~{URL-base64_search_term}`
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getResourceName()
    {
        return $this->resource_name;
    }

    /**
     * Output only. The resource name of the search term view.
     * Search term view resource names have the form:
     * `customers/{customer_id}/searchTermViews/{campaign_id}~{ad_group_id}~{URL-base64_search_term}`
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

    /**
     * Output only. The search term.
     *
     * Generated from protobuf field <code>optional string search_term = 5 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return string
     */
    public function getSearchTerm()
    {
        return isset($this->search_term) ? $this->search_term : '';
    }

    public function hasSearchTerm()
    {
        return isset($this->search_term);
    }

    public function clearSearchTerm()
    {
        unset($this->search_term);
    }

    /**
     * Output only. The search term.
     *
     * Generated from protobuf field <code>optional string search_term = 5 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param string $var
     * @return $this
     */
    public function setSearchTerm($var)
    {
        GPBUtil::checkString($var, True);
        $this->search_term = $var;

        return $this;
    }

    /**
     * Output only. The ad group the search term served in.
     *
     * Generated from protobuf field <code>optional string ad_group = 6 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getAdGroup()
    {
        return isset($this->ad_group) ? $this->ad_group : '';
    }

    public function hasAdGroup()
    {
        return isset($this->ad_group);
    }

    public function clearAdGroup()
    {
        unset($this->ad_group);
    }

    /**
     * Output only. The ad group the search term served in.
     *
     * Generated from protobuf field <code>optional string ad_group = 6 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     * @param string $var
     * @return $this
     */
    public function setAdGroup($var)
    {
        GPBUtil::checkString($var, True);
        $this->ad_group = $var;

        return $this;
    }

    /**
     * Output only. Indicates whether the search term is currently one of your
     * targeted or excluded keywords.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.enums.SearchTermTargetingStatusEnum.SearchTermTargetingStatus status = 4 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Output only. Indicates whether the search term is currently one of your
     * targeted or excluded keywords.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.enums.SearchTermTargetingStatusEnum.SearchTermTargetingStatus status = 4 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param int $var
     * @return $this
     */
    public function setStatus($var)
    {
        GPBUtil::checkEnum($var, \Google\Ads\GoogleAds\V20\Enums\SearchTermTargetingStatusEnum\SearchTermTargetingStatus::class);
        $this->status = $var;

        return $this;
    }

}

