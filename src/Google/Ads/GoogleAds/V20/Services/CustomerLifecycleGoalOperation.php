<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/services/customer_lifecycle_goal_service.proto

namespace Google\Ads\GoogleAds\V20\Services;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * A single operation on a customer lifecycle goal.
 *
 * Generated from protobuf message <code>google.ads.googleads.v20.services.CustomerLifecycleGoalOperation</code>
 */
class CustomerLifecycleGoalOperation extends \Google\Protobuf\Internal\Message
{
    /**
     * Optional. FieldMask that determines which resource fields are modified in
     * an update.
     *
     * Generated from protobuf field <code>.google.protobuf.FieldMask update_mask = 2 [(.google.api.field_behavior) = OPTIONAL];</code>
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
     *           Optional. FieldMask that determines which resource fields are modified in
     *           an update.
     *     @type \Google\Ads\GoogleAds\V20\Resources\CustomerLifecycleGoal $create
     *           Create operation: Create a new customer lifecycle goal.
     *     @type \Google\Ads\GoogleAds\V20\Resources\CustomerLifecycleGoal $update
     *           Update operation: Update an existing customer lifecycle goal.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V20\Services\CustomerLifecycleGoalService::initOnce();
        parent::__construct($data);
    }

    /**
     * Optional. FieldMask that determines which resource fields are modified in
     * an update.
     *
     * Generated from protobuf field <code>.google.protobuf.FieldMask update_mask = 2 [(.google.api.field_behavior) = OPTIONAL];</code>
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
     * Optional. FieldMask that determines which resource fields are modified in
     * an update.
     *
     * Generated from protobuf field <code>.google.protobuf.FieldMask update_mask = 2 [(.google.api.field_behavior) = OPTIONAL];</code>
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
     * Create operation: Create a new customer lifecycle goal.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.resources.CustomerLifecycleGoal create = 1;</code>
     * @return \Google\Ads\GoogleAds\V20\Resources\CustomerLifecycleGoal|null
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
     * Create operation: Create a new customer lifecycle goal.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.resources.CustomerLifecycleGoal create = 1;</code>
     * @param \Google\Ads\GoogleAds\V20\Resources\CustomerLifecycleGoal $var
     * @return $this
     */
    public function setCreate($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V20\Resources\CustomerLifecycleGoal::class);
        $this->writeOneof(1, $var);

        return $this;
    }

    /**
     * Update operation: Update an existing customer lifecycle goal.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.resources.CustomerLifecycleGoal update = 3;</code>
     * @return \Google\Ads\GoogleAds\V20\Resources\CustomerLifecycleGoal|null
     */
    public function getUpdate()
    {
        return $this->readOneof(3);
    }

    public function hasUpdate()
    {
        return $this->hasOneof(3);
    }

    /**
     * Update operation: Update an existing customer lifecycle goal.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.resources.CustomerLifecycleGoal update = 3;</code>
     * @param \Google\Ads\GoogleAds\V20\Resources\CustomerLifecycleGoal $var
     * @return $this
     */
    public function setUpdate($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V20\Resources\CustomerLifecycleGoal::class);
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

