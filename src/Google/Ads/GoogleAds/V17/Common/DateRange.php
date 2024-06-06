<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v17/common/dates.proto

namespace Google\Ads\GoogleAds\V17\Common;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * A date range.
 *
 * Generated from protobuf message <code>google.ads.googleads.v17.common.DateRange</code>
 */
class DateRange extends \Google\Protobuf\Internal\Message
{
    /**
     * The start date, in yyyy-mm-dd format. This date is inclusive.
     *
     * Generated from protobuf field <code>optional string start_date = 3;</code>
     */
    protected $start_date = null;
    /**
     * The end date, in yyyy-mm-dd format. This date is inclusive.
     *
     * Generated from protobuf field <code>optional string end_date = 4;</code>
     */
    protected $end_date = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $start_date
     *           The start date, in yyyy-mm-dd format. This date is inclusive.
     *     @type string $end_date
     *           The end date, in yyyy-mm-dd format. This date is inclusive.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V17\Common\Dates::initOnce();
        parent::__construct($data);
    }

    /**
     * The start date, in yyyy-mm-dd format. This date is inclusive.
     *
     * Generated from protobuf field <code>optional string start_date = 3;</code>
     * @return string
     */
    public function getStartDate()
    {
        return isset($this->start_date) ? $this->start_date : '';
    }

    public function hasStartDate()
    {
        return isset($this->start_date);
    }

    public function clearStartDate()
    {
        unset($this->start_date);
    }

    /**
     * The start date, in yyyy-mm-dd format. This date is inclusive.
     *
     * Generated from protobuf field <code>optional string start_date = 3;</code>
     * @param string $var
     * @return $this
     */
    public function setStartDate($var)
    {
        GPBUtil::checkString($var, True);
        $this->start_date = $var;

        return $this;
    }

    /**
     * The end date, in yyyy-mm-dd format. This date is inclusive.
     *
     * Generated from protobuf field <code>optional string end_date = 4;</code>
     * @return string
     */
    public function getEndDate()
    {
        return isset($this->end_date) ? $this->end_date : '';
    }

    public function hasEndDate()
    {
        return isset($this->end_date);
    }

    public function clearEndDate()
    {
        unset($this->end_date);
    }

    /**
     * The end date, in yyyy-mm-dd format. This date is inclusive.
     *
     * Generated from protobuf field <code>optional string end_date = 4;</code>
     * @param string $var
     * @return $this
     */
    public function setEndDate($var)
    {
        GPBUtil::checkString($var, True);
        $this->end_date = $var;

        return $this;
    }

}

