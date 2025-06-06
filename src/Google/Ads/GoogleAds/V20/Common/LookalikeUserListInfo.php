<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/common/user_lists.proto

namespace Google\Ads\GoogleAds\V20\Common;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * LookalikeUserlist, composed of users similar to those
 *   of a configurable seed (set of UserLists)
 *
 * Generated from protobuf message <code>google.ads.googleads.v20.common.LookalikeUserListInfo</code>
 */
class LookalikeUserListInfo extends \Google\Protobuf\Internal\Message
{
    /**
     * Seed UserList ID from which this list is derived, provided by user.
     *
     * Generated from protobuf field <code>repeated int64 seed_user_list_ids = 1;</code>
     */
    private $seed_user_list_ids;
    /**
     * Expansion level, reflecting the size of the lookalike audience
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.enums.LookalikeExpansionLevelEnum.LookalikeExpansionLevel expansion_level = 2;</code>
     */
    protected $expansion_level = 0;
    /**
     * Countries targeted by the Lookalike. Two-letter country code as defined by
     * ISO-3166
     *
     * Generated from protobuf field <code>repeated string country_codes = 3;</code>
     */
    private $country_codes;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type array<int>|array<string>|\Google\Protobuf\Internal\RepeatedField $seed_user_list_ids
     *           Seed UserList ID from which this list is derived, provided by user.
     *     @type int $expansion_level
     *           Expansion level, reflecting the size of the lookalike audience
     *     @type array<string>|\Google\Protobuf\Internal\RepeatedField $country_codes
     *           Countries targeted by the Lookalike. Two-letter country code as defined by
     *           ISO-3166
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V20\Common\UserLists::initOnce();
        parent::__construct($data);
    }

    /**
     * Seed UserList ID from which this list is derived, provided by user.
     *
     * Generated from protobuf field <code>repeated int64 seed_user_list_ids = 1;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getSeedUserListIds()
    {
        return $this->seed_user_list_ids;
    }

    /**
     * Seed UserList ID from which this list is derived, provided by user.
     *
     * Generated from protobuf field <code>repeated int64 seed_user_list_ids = 1;</code>
     * @param array<int>|array<string>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setSeedUserListIds($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::INT64);
        $this->seed_user_list_ids = $arr;

        return $this;
    }

    /**
     * Expansion level, reflecting the size of the lookalike audience
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.enums.LookalikeExpansionLevelEnum.LookalikeExpansionLevel expansion_level = 2;</code>
     * @return int
     */
    public function getExpansionLevel()
    {
        return $this->expansion_level;
    }

    /**
     * Expansion level, reflecting the size of the lookalike audience
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.enums.LookalikeExpansionLevelEnum.LookalikeExpansionLevel expansion_level = 2;</code>
     * @param int $var
     * @return $this
     */
    public function setExpansionLevel($var)
    {
        GPBUtil::checkEnum($var, \Google\Ads\GoogleAds\V20\Enums\LookalikeExpansionLevelEnum\LookalikeExpansionLevel::class);
        $this->expansion_level = $var;

        return $this;
    }

    /**
     * Countries targeted by the Lookalike. Two-letter country code as defined by
     * ISO-3166
     *
     * Generated from protobuf field <code>repeated string country_codes = 3;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getCountryCodes()
    {
        return $this->country_codes;
    }

    /**
     * Countries targeted by the Lookalike. Two-letter country code as defined by
     * ISO-3166
     *
     * Generated from protobuf field <code>repeated string country_codes = 3;</code>
     * @param array<string>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setCountryCodes($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::STRING);
        $this->country_codes = $arr;

        return $this;
    }

}

