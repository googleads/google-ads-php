<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/common/audiences.proto

namespace Google\Ads\GoogleAds\V19\Common;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Dimension specifying users by their parental status.
 *
 * Generated from protobuf message <code>google.ads.googleads.v19.common.ParentalStatusDimension</code>
 */
class ParentalStatusDimension extends \Google\Protobuf\Internal\Message
{
    /**
     * Included parental status demographic segments.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v19.enums.ParentalStatusTypeEnum.ParentalStatusType parental_statuses = 1;</code>
     */
    private $parental_statuses;
    /**
     * Include users whose parental status is undetermined.
     *
     * Generated from protobuf field <code>optional bool include_undetermined = 2;</code>
     */
    protected $include_undetermined = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type array<int>|\Google\Protobuf\Internal\RepeatedField $parental_statuses
     *           Included parental status demographic segments.
     *     @type bool $include_undetermined
     *           Include users whose parental status is undetermined.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V19\Common\Audiences::initOnce();
        parent::__construct($data);
    }

    /**
     * Included parental status demographic segments.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v19.enums.ParentalStatusTypeEnum.ParentalStatusType parental_statuses = 1;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getParentalStatuses()
    {
        return $this->parental_statuses;
    }

    /**
     * Included parental status demographic segments.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v19.enums.ParentalStatusTypeEnum.ParentalStatusType parental_statuses = 1;</code>
     * @param array<int>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setParentalStatuses($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::ENUM, \Google\Ads\GoogleAds\V19\Enums\ParentalStatusTypeEnum\ParentalStatusType::class);
        $this->parental_statuses = $arr;

        return $this;
    }

    /**
     * Include users whose parental status is undetermined.
     *
     * Generated from protobuf field <code>optional bool include_undetermined = 2;</code>
     * @return bool
     */
    public function getIncludeUndetermined()
    {
        return isset($this->include_undetermined) ? $this->include_undetermined : false;
    }

    public function hasIncludeUndetermined()
    {
        return isset($this->include_undetermined);
    }

    public function clearIncludeUndetermined()
    {
        unset($this->include_undetermined);
    }

    /**
     * Include users whose parental status is undetermined.
     *
     * Generated from protobuf field <code>optional bool include_undetermined = 2;</code>
     * @param bool $var
     * @return $this
     */
    public function setIncludeUndetermined($var)
    {
        GPBUtil::checkBool($var);
        $this->include_undetermined = $var;

        return $this;
    }

}

