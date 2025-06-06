<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/services/batch_job_service.proto

namespace Google\Ads\GoogleAds\V20\Services;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Response message for
 * [BatchJobService.ListBatchJobResults][google.ads.googleads.v20.services.BatchJobService.ListBatchJobResults].
 *
 * Generated from protobuf message <code>google.ads.googleads.v20.services.ListBatchJobResultsResponse</code>
 */
class ListBatchJobResultsResponse extends \Google\Protobuf\Internal\Message
{
    /**
     * The list of rows that matched the query.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v20.services.BatchJobResult results = 1;</code>
     */
    private $results;
    /**
     * Pagination token used to retrieve the next page of results.
     * Pass the content of this string as the `page_token` attribute of
     * the next request. `next_page_token` is not returned for the last
     * page.
     *
     * Generated from protobuf field <code>string next_page_token = 2;</code>
     */
    protected $next_page_token = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type array<\Google\Ads\GoogleAds\V20\Services\BatchJobResult>|\Google\Protobuf\Internal\RepeatedField $results
     *           The list of rows that matched the query.
     *     @type string $next_page_token
     *           Pagination token used to retrieve the next page of results.
     *           Pass the content of this string as the `page_token` attribute of
     *           the next request. `next_page_token` is not returned for the last
     *           page.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V20\Services\BatchJobService::initOnce();
        parent::__construct($data);
    }

    /**
     * The list of rows that matched the query.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v20.services.BatchJobResult results = 1;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getResults()
    {
        return $this->results;
    }

    /**
     * The list of rows that matched the query.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v20.services.BatchJobResult results = 1;</code>
     * @param array<\Google\Ads\GoogleAds\V20\Services\BatchJobResult>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setResults($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Ads\GoogleAds\V20\Services\BatchJobResult::class);
        $this->results = $arr;

        return $this;
    }

    /**
     * Pagination token used to retrieve the next page of results.
     * Pass the content of this string as the `page_token` attribute of
     * the next request. `next_page_token` is not returned for the last
     * page.
     *
     * Generated from protobuf field <code>string next_page_token = 2;</code>
     * @return string
     */
    public function getNextPageToken()
    {
        return $this->next_page_token;
    }

    /**
     * Pagination token used to retrieve the next page of results.
     * Pass the content of this string as the `page_token` attribute of
     * the next request. `next_page_token` is not returned for the last
     * page.
     *
     * Generated from protobuf field <code>string next_page_token = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setNextPageToken($var)
    {
        GPBUtil::checkString($var, True);
        $this->next_page_token = $var;

        return $this;
    }

}

