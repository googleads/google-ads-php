<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v17/services/shared_criterion_service.proto

namespace Google\Ads\GoogleAds\V17\Services;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * The result for the shared criterion mutate.
 *
 * Generated from protobuf message <code>google.ads.googleads.v17.services.MutateSharedCriterionResult</code>
 */
class MutateSharedCriterionResult extends \Google\Protobuf\Internal\Message
{
    /**
     * Returned for successful operations.
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.resource_reference) = {</code>
     */
    protected $resource_name = '';
    /**
     * The mutated shared criterion with only mutable fields after mutate. The
     * field will only be returned when response_content_type is set to
     * "MUTABLE_RESOURCE".
     *
     * Generated from protobuf field <code>.google.ads.googleads.v17.resources.SharedCriterion shared_criterion = 2;</code>
     */
    protected $shared_criterion = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $resource_name
     *           Returned for successful operations.
     *     @type \Google\Ads\GoogleAds\V17\Resources\SharedCriterion $shared_criterion
     *           The mutated shared criterion with only mutable fields after mutate. The
     *           field will only be returned when response_content_type is set to
     *           "MUTABLE_RESOURCE".
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V17\Services\SharedCriterionService::initOnce();
        parent::__construct($data);
    }

    /**
     * Returned for successful operations.
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getResourceName()
    {
        return $this->resource_name;
    }

    /**
     * Returned for successful operations.
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

    /**
     * The mutated shared criterion with only mutable fields after mutate. The
     * field will only be returned when response_content_type is set to
     * "MUTABLE_RESOURCE".
     *
     * Generated from protobuf field <code>.google.ads.googleads.v17.resources.SharedCriterion shared_criterion = 2;</code>
     * @return \Google\Ads\GoogleAds\V17\Resources\SharedCriterion|null
     */
    public function getSharedCriterion()
    {
        return $this->shared_criterion;
    }

    public function hasSharedCriterion()
    {
        return isset($this->shared_criterion);
    }

    public function clearSharedCriterion()
    {
        unset($this->shared_criterion);
    }

    /**
     * The mutated shared criterion with only mutable fields after mutate. The
     * field will only be returned when response_content_type is set to
     * "MUTABLE_RESOURCE".
     *
     * Generated from protobuf field <code>.google.ads.googleads.v17.resources.SharedCriterion shared_criterion = 2;</code>
     * @param \Google\Ads\GoogleAds\V17\Resources\SharedCriterion $var
     * @return $this
     */
    public function setSharedCriterion($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V17\Resources\SharedCriterion::class);
        $this->shared_criterion = $var;

        return $this;
    }

}

