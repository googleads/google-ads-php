<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/resources/paid_organic_search_term_view.proto

namespace Google\Ads\GoogleAds\V20\Resources;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * A paid organic search term view providing a view of search stats across
 * ads and organic listings aggregated by search term at the ad group level.
 *
 * Generated from protobuf message <code>google.ads.googleads.v20.resources.PaidOrganicSearchTermView</code>
 */
class PaidOrganicSearchTermView extends \Google\Protobuf\Internal\Message
{
    /**
     * Output only. The resource name of the search term view.
     * Search term view resource names have the form:
     * `customers/{customer_id}/paidOrganicSearchTermViews/{campaign_id}~
     * {ad_group_id}~{URL-base64 search term}`
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     */
    protected $resource_name = '';
    /**
     * Output only. The search term.
     *
     * Generated from protobuf field <code>optional string search_term = 3 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $search_term = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $resource_name
     *           Output only. The resource name of the search term view.
     *           Search term view resource names have the form:
     *           `customers/{customer_id}/paidOrganicSearchTermViews/{campaign_id}~
     *           {ad_group_id}~{URL-base64 search term}`
     *     @type string $search_term
     *           Output only. The search term.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V20\Resources\PaidOrganicSearchTermView::initOnce();
        parent::__construct($data);
    }

    /**
     * Output only. The resource name of the search term view.
     * Search term view resource names have the form:
     * `customers/{customer_id}/paidOrganicSearchTermViews/{campaign_id}~
     * {ad_group_id}~{URL-base64 search term}`
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
     * `customers/{customer_id}/paidOrganicSearchTermViews/{campaign_id}~
     * {ad_group_id}~{URL-base64 search term}`
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
     * Generated from protobuf field <code>optional string search_term = 3 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
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
     * Generated from protobuf field <code>optional string search_term = 3 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param string $var
     * @return $this
     */
    public function setSearchTerm($var)
    {
        GPBUtil::checkString($var, True);
        $this->search_term = $var;

        return $this;
    }

}

