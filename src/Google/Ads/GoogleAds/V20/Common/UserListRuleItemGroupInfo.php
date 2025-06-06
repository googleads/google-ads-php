<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/common/user_lists.proto

namespace Google\Ads\GoogleAds\V20\Common;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * A group of rule items.
 *
 * Generated from protobuf message <code>google.ads.googleads.v20.common.UserListRuleItemGroupInfo</code>
 */
class UserListRuleItemGroupInfo extends \Google\Protobuf\Internal\Message
{
    /**
     * Rule items that will be grouped together based on rule_type.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v20.common.UserListRuleItemInfo rule_items = 1;</code>
     */
    private $rule_items;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type array<\Google\Ads\GoogleAds\V20\Common\UserListRuleItemInfo>|\Google\Protobuf\Internal\RepeatedField $rule_items
     *           Rule items that will be grouped together based on rule_type.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V20\Common\UserLists::initOnce();
        parent::__construct($data);
    }

    /**
     * Rule items that will be grouped together based on rule_type.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v20.common.UserListRuleItemInfo rule_items = 1;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getRuleItems()
    {
        return $this->rule_items;
    }

    /**
     * Rule items that will be grouped together based on rule_type.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v20.common.UserListRuleItemInfo rule_items = 1;</code>
     * @param array<\Google\Ads\GoogleAds\V20\Common\UserListRuleItemInfo>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setRuleItems($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Ads\GoogleAds\V20\Common\UserListRuleItemInfo::class);
        $this->rule_items = $arr;

        return $this;
    }

}

