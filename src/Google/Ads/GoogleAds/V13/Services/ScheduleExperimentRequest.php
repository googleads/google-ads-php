<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v13/services/experiment_service.proto

namespace Google\Ads\GoogleAds\V13\Services;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Request message for
 * [ExperimentService.ScheduleExperiment][google.ads.googleads.v13.services.ExperimentService.ScheduleExperiment].
 *
 * Generated from protobuf message <code>google.ads.googleads.v13.services.ScheduleExperimentRequest</code>
 */
class ScheduleExperimentRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * Required. The scheduled experiment.
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     */
    protected $resource_name = '';
    /**
     * If true, the request is validated but not executed. Only errors are
     * returned, not results.
     *
     * Generated from protobuf field <code>bool validate_only = 2;</code>
     */
    protected $validate_only = false;

    /**
     * @param string $resourceName Required. The scheduled experiment.
     *
     * @return \Google\Ads\GoogleAds\V13\Services\ScheduleExperimentRequest
     *
     * @experimental
     */
    public static function build(string $resourceName): self
    {
        return (new self())
            ->setResourceName($resourceName);
    }

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $resource_name
     *           Required. The scheduled experiment.
     *     @type bool $validate_only
     *           If true, the request is validated but not executed. Only errors are
     *           returned, not results.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V13\Services\ExperimentService::initOnce();
        parent::__construct($data);
    }

    /**
     * Required. The scheduled experiment.
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getResourceName()
    {
        return $this->resource_name;
    }

    /**
     * Required. The scheduled experiment.
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
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
     * If true, the request is validated but not executed. Only errors are
     * returned, not results.
     *
     * Generated from protobuf field <code>bool validate_only = 2;</code>
     * @return bool
     */
    public function getValidateOnly()
    {
        return $this->validate_only;
    }

    /**
     * If true, the request is validated but not executed. Only errors are
     * returned, not results.
     *
     * Generated from protobuf field <code>bool validate_only = 2;</code>
     * @param bool $var
     * @return $this
     */
    public function setValidateOnly($var)
    {
        GPBUtil::checkBool($var);
        $this->validate_only = $var;

        return $this;
    }

}

