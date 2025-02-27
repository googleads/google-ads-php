<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/services/google_ads_field_service.proto

namespace Google\Ads\GoogleAds\V19\Services;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Request message for
 * [GoogleAdsFieldService.SearchGoogleAdsFields][google.ads.googleads.v19.services.GoogleAdsFieldService.SearchGoogleAdsFields].
 *
 * Generated from protobuf message <code>google.ads.googleads.v19.services.SearchGoogleAdsFieldsRequest</code>
 */
class SearchGoogleAdsFieldsRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * Required. The query string.
     *
     * Generated from protobuf field <code>string query = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    protected $query = '';
    /**
     * Token of the page to retrieve. If not specified, the first page of
     * results will be returned. Use the value obtained from `next_page_token`
     * in the previous response in order to request the next page of results.
     *
     * Generated from protobuf field <code>string page_token = 2;</code>
     */
    protected $page_token = '';
    /**
     * Number of elements to retrieve in a single page.
     * When too large a page is requested, the server may decide to further
     * limit the number of returned resources.
     *
     * Generated from protobuf field <code>int32 page_size = 3;</code>
     */
    protected $page_size = 0;

    /**
     * @param string $query Required. The query string.
     *
     * @return \Google\Ads\GoogleAds\V19\Services\SearchGoogleAdsFieldsRequest
     *
     * @experimental
     */
    public static function build(string $query): self
    {
        return (new self())
            ->setQuery($query);
    }

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $query
     *           Required. The query string.
     *     @type string $page_token
     *           Token of the page to retrieve. If not specified, the first page of
     *           results will be returned. Use the value obtained from `next_page_token`
     *           in the previous response in order to request the next page of results.
     *     @type int $page_size
     *           Number of elements to retrieve in a single page.
     *           When too large a page is requested, the server may decide to further
     *           limit the number of returned resources.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V19\Services\GoogleAdsFieldService::initOnce();
        parent::__construct($data);
    }

    /**
     * Required. The query string.
     *
     * Generated from protobuf field <code>string query = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return string
     */
    public function getQuery()
    {
        return $this->query;
    }

    /**
     * Required. The query string.
     *
     * Generated from protobuf field <code>string query = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param string $var
     * @return $this
     */
    public function setQuery($var)
    {
        GPBUtil::checkString($var, True);
        $this->query = $var;

        return $this;
    }

    /**
     * Token of the page to retrieve. If not specified, the first page of
     * results will be returned. Use the value obtained from `next_page_token`
     * in the previous response in order to request the next page of results.
     *
     * Generated from protobuf field <code>string page_token = 2;</code>
     * @return string
     */
    public function getPageToken()
    {
        return $this->page_token;
    }

    /**
     * Token of the page to retrieve. If not specified, the first page of
     * results will be returned. Use the value obtained from `next_page_token`
     * in the previous response in order to request the next page of results.
     *
     * Generated from protobuf field <code>string page_token = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setPageToken($var)
    {
        GPBUtil::checkString($var, True);
        $this->page_token = $var;

        return $this;
    }

    /**
     * Number of elements to retrieve in a single page.
     * When too large a page is requested, the server may decide to further
     * limit the number of returned resources.
     *
     * Generated from protobuf field <code>int32 page_size = 3;</code>
     * @return int
     */
    public function getPageSize()
    {
        return $this->page_size;
    }

    /**
     * Number of elements to retrieve in a single page.
     * When too large a page is requested, the server may decide to further
     * limit the number of returned resources.
     *
     * Generated from protobuf field <code>int32 page_size = 3;</code>
     * @param int $var
     * @return $this
     */
    public function setPageSize($var)
    {
        GPBUtil::checkInt32($var);
        $this->page_size = $var;

        return $this;
    }

}

