<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/resources/asset.proto

namespace Google\Ads\GoogleAds\V20\Resources;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Contains policy information for an asset.
 *
 * Generated from protobuf message <code>google.ads.googleads.v20.resources.AssetPolicySummary</code>
 */
class AssetPolicySummary extends \Google\Protobuf\Internal\Message
{
    /**
     * Output only. The list of policy findings for this asset.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v20.common.PolicyTopicEntry policy_topic_entries = 1 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $policy_topic_entries;
    /**
     * Output only. Where in the review process this asset is.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.enums.PolicyReviewStatusEnum.PolicyReviewStatus review_status = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $review_status = 0;
    /**
     * Output only. The overall approval status of this asset, calculated based on
     * the status of its individual policy topic entries.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.enums.PolicyApprovalStatusEnum.PolicyApprovalStatus approval_status = 3 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $approval_status = 0;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type array<\Google\Ads\GoogleAds\V20\Common\PolicyTopicEntry>|\Google\Protobuf\Internal\RepeatedField $policy_topic_entries
     *           Output only. The list of policy findings for this asset.
     *     @type int $review_status
     *           Output only. Where in the review process this asset is.
     *     @type int $approval_status
     *           Output only. The overall approval status of this asset, calculated based on
     *           the status of its individual policy topic entries.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V20\Resources\Asset::initOnce();
        parent::__construct($data);
    }

    /**
     * Output only. The list of policy findings for this asset.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v20.common.PolicyTopicEntry policy_topic_entries = 1 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getPolicyTopicEntries()
    {
        return $this->policy_topic_entries;
    }

    /**
     * Output only. The list of policy findings for this asset.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v20.common.PolicyTopicEntry policy_topic_entries = 1 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param array<\Google\Ads\GoogleAds\V20\Common\PolicyTopicEntry>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setPolicyTopicEntries($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Ads\GoogleAds\V20\Common\PolicyTopicEntry::class);
        $this->policy_topic_entries = $arr;

        return $this;
    }

    /**
     * Output only. Where in the review process this asset is.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.enums.PolicyReviewStatusEnum.PolicyReviewStatus review_status = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return int
     */
    public function getReviewStatus()
    {
        return $this->review_status;
    }

    /**
     * Output only. Where in the review process this asset is.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.enums.PolicyReviewStatusEnum.PolicyReviewStatus review_status = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param int $var
     * @return $this
     */
    public function setReviewStatus($var)
    {
        GPBUtil::checkEnum($var, \Google\Ads\GoogleAds\V20\Enums\PolicyReviewStatusEnum\PolicyReviewStatus::class);
        $this->review_status = $var;

        return $this;
    }

    /**
     * Output only. The overall approval status of this asset, calculated based on
     * the status of its individual policy topic entries.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.enums.PolicyApprovalStatusEnum.PolicyApprovalStatus approval_status = 3 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return int
     */
    public function getApprovalStatus()
    {
        return $this->approval_status;
    }

    /**
     * Output only. The overall approval status of this asset, calculated based on
     * the status of its individual policy topic entries.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.enums.PolicyApprovalStatusEnum.PolicyApprovalStatus approval_status = 3 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param int $var
     * @return $this
     */
    public function setApprovalStatus($var)
    {
        GPBUtil::checkEnum($var, \Google\Ads\GoogleAds\V20\Enums\PolicyApprovalStatusEnum\PolicyApprovalStatus::class);
        $this->approval_status = $var;

        return $this;
    }

}

