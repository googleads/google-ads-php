<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/services/batch_job_service.proto

namespace Google\Ads\GoogleAds\V19\Services;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Response message for
 * [BatchJobService.AddBatchJobOperations][google.ads.googleads.v19.services.BatchJobService.AddBatchJobOperations].
 *
 * Generated from protobuf message <code>google.ads.googleads.v19.services.AddBatchJobOperationsResponse</code>
 */
class AddBatchJobOperationsResponse extends \Google\Protobuf\Internal\Message
{
    /**
     * The total number of operations added so far for this batch job.
     *
     * Generated from protobuf field <code>int64 total_operations = 1;</code>
     */
    protected $total_operations = 0;
    /**
     * The sequence token to be used when calling AddBatchJobOperations again if
     * more operations need to be added. The next AddBatchJobOperations request
     * must set the sequence_token field to the value of this field.
     *
     * Generated from protobuf field <code>string next_sequence_token = 2;</code>
     */
    protected $next_sequence_token = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int|string $total_operations
     *           The total number of operations added so far for this batch job.
     *     @type string $next_sequence_token
     *           The sequence token to be used when calling AddBatchJobOperations again if
     *           more operations need to be added. The next AddBatchJobOperations request
     *           must set the sequence_token field to the value of this field.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V19\Services\BatchJobService::initOnce();
        parent::__construct($data);
    }

    /**
     * The total number of operations added so far for this batch job.
     *
     * Generated from protobuf field <code>int64 total_operations = 1;</code>
     * @return int|string
     */
    public function getTotalOperations()
    {
        return $this->total_operations;
    }

    /**
     * The total number of operations added so far for this batch job.
     *
     * Generated from protobuf field <code>int64 total_operations = 1;</code>
     * @param int|string $var
     * @return $this
     */
    public function setTotalOperations($var)
    {
        GPBUtil::checkInt64($var);
        $this->total_operations = $var;

        return $this;
    }

    /**
     * The sequence token to be used when calling AddBatchJobOperations again if
     * more operations need to be added. The next AddBatchJobOperations request
     * must set the sequence_token field to the value of this field.
     *
     * Generated from protobuf field <code>string next_sequence_token = 2;</code>
     * @return string
     */
    public function getNextSequenceToken()
    {
        return $this->next_sequence_token;
    }

    /**
     * The sequence token to be used when calling AddBatchJobOperations again if
     * more operations need to be added. The next AddBatchJobOperations request
     * must set the sequence_token field to the value of this field.
     *
     * Generated from protobuf field <code>string next_sequence_token = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setNextSequenceToken($var)
    {
        GPBUtil::checkString($var, True);
        $this->next_sequence_token = $var;

        return $this;
    }

}

