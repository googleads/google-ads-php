<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/services/reach_plan_service.proto

namespace Google\Ads\GoogleAds\V20\Services;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * A response with all available user lists with their plannable status.
 *
 * Generated from protobuf message <code>google.ads.googleads.v20.services.ListPlannableUserListsResponse</code>
 */
class ListPlannableUserListsResponse extends \Google\Protobuf\Internal\Message
{
    /**
     * The list of user lists available for planning and related targeting
     * metadata.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v20.services.PlannableUserList plannable_user_lists = 1;</code>
     */
    private $plannable_user_lists;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type array<\Google\Ads\GoogleAds\V20\Services\PlannableUserList>|\Google\Protobuf\Internal\RepeatedField $plannable_user_lists
     *           The list of user lists available for planning and related targeting
     *           metadata.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V20\Services\ReachPlanService::initOnce();
        parent::__construct($data);
    }

    /**
     * The list of user lists available for planning and related targeting
     * metadata.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v20.services.PlannableUserList plannable_user_lists = 1;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getPlannableUserLists()
    {
        return $this->plannable_user_lists;
    }

    /**
     * The list of user lists available for planning and related targeting
     * metadata.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v20.services.PlannableUserList plannable_user_lists = 1;</code>
     * @param array<\Google\Ads\GoogleAds\V20\Services\PlannableUserList>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setPlannableUserLists($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Ads\GoogleAds\V20\Services\PlannableUserList::class);
        $this->plannable_user_lists = $arr;

        return $this;
    }

}

