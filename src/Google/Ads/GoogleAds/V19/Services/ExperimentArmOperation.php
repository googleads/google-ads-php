<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/services/experiment_arm_service.proto

namespace Google\Ads\GoogleAds\V19\Services;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * A single operation on an experiment arm.
 *
 * Generated from protobuf message <code>google.ads.googleads.v19.services.ExperimentArmOperation</code>
 */
class ExperimentArmOperation extends \Google\Protobuf\Internal\Message
{
    /**
     * FieldMask that determines which resource fields are modified in an update.
     *
     * Generated from protobuf field <code>.google.protobuf.FieldMask update_mask = 4;</code>
     */
    protected $update_mask = null;
    protected $operation;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Google\Protobuf\FieldMask $update_mask
     *           FieldMask that determines which resource fields are modified in an update.
     *     @type \Google\Ads\GoogleAds\V19\Resources\ExperimentArm $create
     *           Create operation
     *     @type \Google\Ads\GoogleAds\V19\Resources\ExperimentArm $update
     *           Update operation: The experiment arm is expected to have a valid
     *           resource name.
     *     @type string $remove
     *           Remove operation: The experiment arm is expected to have a valid
     *           resource name, in this format:
     *           `customers/{customer_id}/experiments/{campaign_experiment_id}`
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V19\Services\ExperimentArmService::initOnce();
        parent::__construct($data);
    }

    /**
     * FieldMask that determines which resource fields are modified in an update.
     *
     * Generated from protobuf field <code>.google.protobuf.FieldMask update_mask = 4;</code>
     * @return \Google\Protobuf\FieldMask|null
     */
    public function getUpdateMask()
    {
        return $this->update_mask;
    }

    public function hasUpdateMask()
    {
        return isset($this->update_mask);
    }

    public function clearUpdateMask()
    {
        unset($this->update_mask);
    }

    /**
     * FieldMask that determines which resource fields are modified in an update.
     *
     * Generated from protobuf field <code>.google.protobuf.FieldMask update_mask = 4;</code>
     * @param \Google\Protobuf\FieldMask $var
     * @return $this
     */
    public function setUpdateMask($var)
    {
        GPBUtil::checkMessage($var, \Google\Protobuf\FieldMask::class);
        $this->update_mask = $var;

        return $this;
    }

    /**
     * Create operation
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.resources.ExperimentArm create = 1;</code>
     * @return \Google\Ads\GoogleAds\V19\Resources\ExperimentArm|null
     */
    public function getCreate()
    {
        return $this->readOneof(1);
    }

    public function hasCreate()
    {
        return $this->hasOneof(1);
    }

    /**
     * Create operation
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.resources.ExperimentArm create = 1;</code>
     * @param \Google\Ads\GoogleAds\V19\Resources\ExperimentArm $var
     * @return $this
     */
    public function setCreate($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V19\Resources\ExperimentArm::class);
        $this->writeOneof(1, $var);

        return $this;
    }

    /**
     * Update operation: The experiment arm is expected to have a valid
     * resource name.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.resources.ExperimentArm update = 2;</code>
     * @return \Google\Ads\GoogleAds\V19\Resources\ExperimentArm|null
     */
    public function getUpdate()
    {
        return $this->readOneof(2);
    }

    public function hasUpdate()
    {
        return $this->hasOneof(2);
    }

    /**
     * Update operation: The experiment arm is expected to have a valid
     * resource name.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.resources.ExperimentArm update = 2;</code>
     * @param \Google\Ads\GoogleAds\V19\Resources\ExperimentArm $var
     * @return $this
     */
    public function setUpdate($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V19\Resources\ExperimentArm::class);
        $this->writeOneof(2, $var);

        return $this;
    }

    /**
     * Remove operation: The experiment arm is expected to have a valid
     * resource name, in this format:
     * `customers/{customer_id}/experiments/{campaign_experiment_id}`
     *
     * Generated from protobuf field <code>string remove = 3 [(.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getRemove()
    {
        return $this->readOneof(3);
    }

    public function hasRemove()
    {
        return $this->hasOneof(3);
    }

    /**
     * Remove operation: The experiment arm is expected to have a valid
     * resource name, in this format:
     * `customers/{customer_id}/experiments/{campaign_experiment_id}`
     *
     * Generated from protobuf field <code>string remove = 3 [(.google.api.resource_reference) = {</code>
     * @param string $var
     * @return $this
     */
    public function setRemove($var)
    {
        GPBUtil::checkString($var, True);
        $this->writeOneof(3, $var);

        return $this;
    }

    /**
     * @return string
     */
    public function getOperation()
    {
        return $this->whichOneof("operation");
    }

}

