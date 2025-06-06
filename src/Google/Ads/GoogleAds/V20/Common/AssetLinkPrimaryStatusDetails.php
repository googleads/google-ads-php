<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/common/asset_policy.proto

namespace Google\Ads\GoogleAds\V20\Common;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Provides the detail of a PrimaryStatus.
 * Each asset link has a PrimaryStatus value (e.g. NOT_ELIGIBLE, meaning not
 * serving), and list of corroborating PrimaryStatusReasons (e.g.
 * [ASSET_DISAPPROVED]). Each reason may have some additional details
 * annotated with it.  For instance, when the reason is ASSET_DISAPPROVED, the
 * details field will contain additional information about the offline
 * evaluation errors which led to the asset being disapproved.
 *
 * Generated from protobuf message <code>google.ads.googleads.v20.common.AssetLinkPrimaryStatusDetails</code>
 */
class AssetLinkPrimaryStatusDetails extends \Google\Protobuf\Internal\Message
{
    /**
     * Provides the reason of this PrimaryStatus.
     *
     * Generated from protobuf field <code>optional .google.ads.googleads.v20.enums.AssetLinkPrimaryStatusReasonEnum.AssetLinkPrimaryStatusReason reason = 1;</code>
     */
    protected $reason = null;
    /**
     * Provides the PrimaryStatus of this status detail.
     *
     * Generated from protobuf field <code>optional .google.ads.googleads.v20.enums.AssetLinkPrimaryStatusEnum.AssetLinkPrimaryStatus status = 2;</code>
     */
    protected $status = null;
    protected $details;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int $reason
     *           Provides the reason of this PrimaryStatus.
     *     @type int $status
     *           Provides the PrimaryStatus of this status detail.
     *     @type \Google\Ads\GoogleAds\V20\Common\AssetDisapproved $asset_disapproved
     *           Provides the details for AssetLinkPrimaryStatusReason.ASSET_DISAPPROVED
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V20\Common\AssetPolicy::initOnce();
        parent::__construct($data);
    }

    /**
     * Provides the reason of this PrimaryStatus.
     *
     * Generated from protobuf field <code>optional .google.ads.googleads.v20.enums.AssetLinkPrimaryStatusReasonEnum.AssetLinkPrimaryStatusReason reason = 1;</code>
     * @return int
     */
    public function getReason()
    {
        return isset($this->reason) ? $this->reason : 0;
    }

    public function hasReason()
    {
        return isset($this->reason);
    }

    public function clearReason()
    {
        unset($this->reason);
    }

    /**
     * Provides the reason of this PrimaryStatus.
     *
     * Generated from protobuf field <code>optional .google.ads.googleads.v20.enums.AssetLinkPrimaryStatusReasonEnum.AssetLinkPrimaryStatusReason reason = 1;</code>
     * @param int $var
     * @return $this
     */
    public function setReason($var)
    {
        GPBUtil::checkEnum($var, \Google\Ads\GoogleAds\V20\Enums\AssetLinkPrimaryStatusReasonEnum\AssetLinkPrimaryStatusReason::class);
        $this->reason = $var;

        return $this;
    }

    /**
     * Provides the PrimaryStatus of this status detail.
     *
     * Generated from protobuf field <code>optional .google.ads.googleads.v20.enums.AssetLinkPrimaryStatusEnum.AssetLinkPrimaryStatus status = 2;</code>
     * @return int
     */
    public function getStatus()
    {
        return isset($this->status) ? $this->status : 0;
    }

    public function hasStatus()
    {
        return isset($this->status);
    }

    public function clearStatus()
    {
        unset($this->status);
    }

    /**
     * Provides the PrimaryStatus of this status detail.
     *
     * Generated from protobuf field <code>optional .google.ads.googleads.v20.enums.AssetLinkPrimaryStatusEnum.AssetLinkPrimaryStatus status = 2;</code>
     * @param int $var
     * @return $this
     */
    public function setStatus($var)
    {
        GPBUtil::checkEnum($var, \Google\Ads\GoogleAds\V20\Enums\AssetLinkPrimaryStatusEnum\AssetLinkPrimaryStatus::class);
        $this->status = $var;

        return $this;
    }

    /**
     * Provides the details for AssetLinkPrimaryStatusReason.ASSET_DISAPPROVED
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.common.AssetDisapproved asset_disapproved = 3;</code>
     * @return \Google\Ads\GoogleAds\V20\Common\AssetDisapproved|null
     */
    public function getAssetDisapproved()
    {
        return $this->readOneof(3);
    }

    public function hasAssetDisapproved()
    {
        return $this->hasOneof(3);
    }

    /**
     * Provides the details for AssetLinkPrimaryStatusReason.ASSET_DISAPPROVED
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.common.AssetDisapproved asset_disapproved = 3;</code>
     * @param \Google\Ads\GoogleAds\V20\Common\AssetDisapproved $var
     * @return $this
     */
    public function setAssetDisapproved($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V20\Common\AssetDisapproved::class);
        $this->writeOneof(3, $var);

        return $this;
    }

    /**
     * @return string
     */
    public function getDetails()
    {
        return $this->whichOneof("details");
    }

}

