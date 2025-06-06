<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/common/user_lists.proto

namespace Google\Ads\GoogleAds\V20\Common;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * User list targeting as a collection of conversions or remarketing actions.
 *
 * Generated from protobuf message <code>google.ads.googleads.v20.common.BasicUserListInfo</code>
 */
class BasicUserListInfo extends \Google\Protobuf\Internal\Message
{
    /**
     * Actions associated with this user list.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v20.common.UserListActionInfo actions = 1;</code>
     */
    private $actions;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type array<\Google\Ads\GoogleAds\V20\Common\UserListActionInfo>|\Google\Protobuf\Internal\RepeatedField $actions
     *           Actions associated with this user list.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V20\Common\UserLists::initOnce();
        parent::__construct($data);
    }

    /**
     * Actions associated with this user list.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v20.common.UserListActionInfo actions = 1;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getActions()
    {
        return $this->actions;
    }

    /**
     * Actions associated with this user list.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v20.common.UserListActionInfo actions = 1;</code>
     * @param array<\Google\Ads\GoogleAds\V20\Common\UserListActionInfo>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setActions($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Ads\GoogleAds\V20\Common\UserListActionInfo::class);
        $this->actions = $arr;

        return $this;
    }

}

