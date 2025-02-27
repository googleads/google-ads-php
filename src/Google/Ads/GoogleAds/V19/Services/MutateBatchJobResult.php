<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/services/batch_job_service.proto

namespace Google\Ads\GoogleAds\V19\Services;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * The result for the batch job mutate.
 *
 * Generated from protobuf message <code>google.ads.googleads.v19.services.MutateBatchJobResult</code>
 */
class MutateBatchJobResult extends \Google\Protobuf\Internal\Message
{
    /**
     * The resource name of the batch job.
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.resource_reference) = {</code>
     */
    protected $resource_name = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $resource_name
     *           The resource name of the batch job.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V19\Services\BatchJobService::initOnce();
        parent::__construct($data);
    }

    /**
     * The resource name of the batch job.
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getResourceName()
    {
        return $this->resource_name;
    }

    /**
     * The resource name of the batch job.
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

}

