<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/resources/custom_audience.proto

namespace Google\Ads\GoogleAds\V20\Resources;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * A member of custom audience. A member can be a KEYWORD, URL,
 * PLACE_CATEGORY or APP. It can only be created or removed but not changed.
 *
 * Generated from protobuf message <code>google.ads.googleads.v20.resources.CustomAudienceMember</code>
 */
class CustomAudienceMember extends \Google\Protobuf\Internal\Message
{
    /**
     * The type of custom audience member, KEYWORD, URL, PLACE_CATEGORY or APP.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.enums.CustomAudienceMemberTypeEnum.CustomAudienceMemberType member_type = 1;</code>
     */
    protected $member_type = 0;
    protected $value;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int $member_type
     *           The type of custom audience member, KEYWORD, URL, PLACE_CATEGORY or APP.
     *     @type string $keyword
     *           A keyword or keyword phrase — at most 10 words and 80 characters.
     *           Languages with double-width characters such as Chinese, Japanese,
     *           or Korean, are allowed 40 characters, which describes the user's
     *           interests or actions.
     *     @type string $url
     *           An HTTP URL, protocol-included — at most 2048 characters, which includes
     *           contents users have interests in.
     *     @type int|string $place_category
     *           A place type described by a place category users visit.
     *     @type string $app
     *           A package name of Android apps which users installed such as
     *           com.google.example.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V20\Resources\CustomAudience::initOnce();
        parent::__construct($data);
    }

    /**
     * The type of custom audience member, KEYWORD, URL, PLACE_CATEGORY or APP.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.enums.CustomAudienceMemberTypeEnum.CustomAudienceMemberType member_type = 1;</code>
     * @return int
     */
    public function getMemberType()
    {
        return $this->member_type;
    }

    /**
     * The type of custom audience member, KEYWORD, URL, PLACE_CATEGORY or APP.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.enums.CustomAudienceMemberTypeEnum.CustomAudienceMemberType member_type = 1;</code>
     * @param int $var
     * @return $this
     */
    public function setMemberType($var)
    {
        GPBUtil::checkEnum($var, \Google\Ads\GoogleAds\V20\Enums\CustomAudienceMemberTypeEnum\CustomAudienceMemberType::class);
        $this->member_type = $var;

        return $this;
    }

    /**
     * A keyword or keyword phrase — at most 10 words and 80 characters.
     * Languages with double-width characters such as Chinese, Japanese,
     * or Korean, are allowed 40 characters, which describes the user's
     * interests or actions.
     *
     * Generated from protobuf field <code>string keyword = 2;</code>
     * @return string
     */
    public function getKeyword()
    {
        return $this->readOneof(2);
    }

    public function hasKeyword()
    {
        return $this->hasOneof(2);
    }

    /**
     * A keyword or keyword phrase — at most 10 words and 80 characters.
     * Languages with double-width characters such as Chinese, Japanese,
     * or Korean, are allowed 40 characters, which describes the user's
     * interests or actions.
     *
     * Generated from protobuf field <code>string keyword = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setKeyword($var)
    {
        GPBUtil::checkString($var, True);
        $this->writeOneof(2, $var);

        return $this;
    }

    /**
     * An HTTP URL, protocol-included — at most 2048 characters, which includes
     * contents users have interests in.
     *
     * Generated from protobuf field <code>string url = 3;</code>
     * @return string
     */
    public function getUrl()
    {
        return $this->readOneof(3);
    }

    public function hasUrl()
    {
        return $this->hasOneof(3);
    }

    /**
     * An HTTP URL, protocol-included — at most 2048 characters, which includes
     * contents users have interests in.
     *
     * Generated from protobuf field <code>string url = 3;</code>
     * @param string $var
     * @return $this
     */
    public function setUrl($var)
    {
        GPBUtil::checkString($var, True);
        $this->writeOneof(3, $var);

        return $this;
    }

    /**
     * A place type described by a place category users visit.
     *
     * Generated from protobuf field <code>int64 place_category = 4;</code>
     * @return int|string
     */
    public function getPlaceCategory()
    {
        return $this->readOneof(4);
    }

    public function hasPlaceCategory()
    {
        return $this->hasOneof(4);
    }

    /**
     * A place type described by a place category users visit.
     *
     * Generated from protobuf field <code>int64 place_category = 4;</code>
     * @param int|string $var
     * @return $this
     */
    public function setPlaceCategory($var)
    {
        GPBUtil::checkInt64($var);
        $this->writeOneof(4, $var);

        return $this;
    }

    /**
     * A package name of Android apps which users installed such as
     * com.google.example.
     *
     * Generated from protobuf field <code>string app = 5;</code>
     * @return string
     */
    public function getApp()
    {
        return $this->readOneof(5);
    }

    public function hasApp()
    {
        return $this->hasOneof(5);
    }

    /**
     * A package name of Android apps which users installed such as
     * com.google.example.
     *
     * Generated from protobuf field <code>string app = 5;</code>
     * @param string $var
     * @return $this
     */
    public function setApp($var)
    {
        GPBUtil::checkString($var, True);
        $this->writeOneof(5, $var);

        return $this;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->whichOneof("value");
    }

}

