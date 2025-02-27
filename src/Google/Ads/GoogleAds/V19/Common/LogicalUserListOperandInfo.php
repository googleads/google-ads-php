<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/common/user_lists.proto

namespace Google\Ads\GoogleAds\V19\Common;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Operand of logical user list that consists of a user list.
 *
 * Generated from protobuf message <code>google.ads.googleads.v19.common.LogicalUserListOperandInfo</code>
 */
class LogicalUserListOperandInfo extends \Google\Protobuf\Internal\Message
{
    /**
     * Resource name of a user list as an operand.
     *
     * Generated from protobuf field <code>optional string user_list = 2;</code>
     */
    protected $user_list = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $user_list
     *           Resource name of a user list as an operand.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V19\Common\UserLists::initOnce();
        parent::__construct($data);
    }

    /**
     * Resource name of a user list as an operand.
     *
     * Generated from protobuf field <code>optional string user_list = 2;</code>
     * @return string
     */
    public function getUserList()
    {
        return isset($this->user_list) ? $this->user_list : '';
    }

    public function hasUserList()
    {
        return isset($this->user_list);
    }

    public function clearUserList()
    {
        unset($this->user_list);
    }

    /**
     * Resource name of a user list as an operand.
     *
     * Generated from protobuf field <code>optional string user_list = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setUserList($var)
    {
        GPBUtil::checkString($var, True);
        $this->user_list = $var;

        return $this;
    }

}

