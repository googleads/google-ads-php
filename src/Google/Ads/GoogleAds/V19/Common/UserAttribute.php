<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/common/offline_user_data.proto

namespace Google\Ads\GoogleAds\V19\Common;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * User attribute, can only be used with CUSTOMER_MATCH_WITH_ATTRIBUTES job
 * type.
 *
 * Generated from protobuf message <code>google.ads.googleads.v19.common.UserAttribute</code>
 */
class UserAttribute extends \Google\Protobuf\Internal\Message
{
    /**
     * Advertiser defined lifetime value for the user.
     *
     * Generated from protobuf field <code>optional int64 lifetime_value_micros = 1;</code>
     */
    protected $lifetime_value_micros = null;
    /**
     * Advertiser defined lifetime value bucket for the user. The valid range for
     * a lifetime value bucket is from 1 (low) to 10 (high), except for remove
     * operation where 0 will also be accepted.
     *
     * Generated from protobuf field <code>optional int32 lifetime_value_bucket = 2;</code>
     */
    protected $lifetime_value_bucket = null;
    /**
     * Timestamp of the last purchase made by the user.
     * The format is YYYY-MM-DD HH:MM:SS[+/-HH:MM], where [+/-HH:MM] is an
     * optional timezone offset from UTC. If the offset is absent, the API will
     * use the account's timezone as default.
     *
     * Generated from protobuf field <code>string last_purchase_date_time = 3;</code>
     */
    protected $last_purchase_date_time = '';
    /**
     * Advertiser defined average number of purchases that are made by the user in
     * a 30 day period.
     *
     * Generated from protobuf field <code>int32 average_purchase_count = 4;</code>
     */
    protected $average_purchase_count = 0;
    /**
     * Advertiser defined average purchase value in micros for the user.
     *
     * Generated from protobuf field <code>int64 average_purchase_value_micros = 5;</code>
     */
    protected $average_purchase_value_micros = 0;
    /**
     * Timestamp when the user was acquired.
     * The format is YYYY-MM-DD HH:MM:SS[+/-HH:MM], where [+/-HH:MM] is an
     * optional timezone offset from UTC. If the offset is absent, the API will
     * use the account's timezone as default.
     *
     * Generated from protobuf field <code>string acquisition_date_time = 6;</code>
     */
    protected $acquisition_date_time = '';
    /**
     * The shopping loyalty related data. Shopping utilizes this data to provide
     * users with a better experience. Accessible only to merchants on the
     * allow-list with the user's consent.
     *
     * Generated from protobuf field <code>optional .google.ads.googleads.v19.common.ShoppingLoyalty shopping_loyalty = 7;</code>
     */
    protected $shopping_loyalty = null;
    /**
     * Optional. Advertiser defined lifecycle stage for the user. The accepted
     * values are "Lead", "Active" and "Churned".
     *
     * Generated from protobuf field <code>string lifecycle_stage = 8 [(.google.api.field_behavior) = OPTIONAL];</code>
     */
    protected $lifecycle_stage = '';
    /**
     * Optional. Timestamp of the first purchase made by the user.
     * The format is YYYY-MM-DD HH:MM:SS[+/-HH:MM], where [+/-HH:MM] is an
     * optional timezone offset from UTC. If the offset is absent, the API will
     * use the account's timezone as default.
     *
     * Generated from protobuf field <code>string first_purchase_date_time = 9 [(.google.api.field_behavior) = OPTIONAL];</code>
     */
    protected $first_purchase_date_time = '';
    /**
     * Optional. Advertiser defined events and their attributes. All the values in
     * the nested fields are required. Currently this field is in beta.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v19.common.EventAttribute event_attribute = 10 [(.google.api.field_behavior) = OPTIONAL];</code>
     */
    private $event_attribute;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int|string $lifetime_value_micros
     *           Advertiser defined lifetime value for the user.
     *     @type int $lifetime_value_bucket
     *           Advertiser defined lifetime value bucket for the user. The valid range for
     *           a lifetime value bucket is from 1 (low) to 10 (high), except for remove
     *           operation where 0 will also be accepted.
     *     @type string $last_purchase_date_time
     *           Timestamp of the last purchase made by the user.
     *           The format is YYYY-MM-DD HH:MM:SS[+/-HH:MM], where [+/-HH:MM] is an
     *           optional timezone offset from UTC. If the offset is absent, the API will
     *           use the account's timezone as default.
     *     @type int $average_purchase_count
     *           Advertiser defined average number of purchases that are made by the user in
     *           a 30 day period.
     *     @type int|string $average_purchase_value_micros
     *           Advertiser defined average purchase value in micros for the user.
     *     @type string $acquisition_date_time
     *           Timestamp when the user was acquired.
     *           The format is YYYY-MM-DD HH:MM:SS[+/-HH:MM], where [+/-HH:MM] is an
     *           optional timezone offset from UTC. If the offset is absent, the API will
     *           use the account's timezone as default.
     *     @type \Google\Ads\GoogleAds\V19\Common\ShoppingLoyalty $shopping_loyalty
     *           The shopping loyalty related data. Shopping utilizes this data to provide
     *           users with a better experience. Accessible only to merchants on the
     *           allow-list with the user's consent.
     *     @type string $lifecycle_stage
     *           Optional. Advertiser defined lifecycle stage for the user. The accepted
     *           values are "Lead", "Active" and "Churned".
     *     @type string $first_purchase_date_time
     *           Optional. Timestamp of the first purchase made by the user.
     *           The format is YYYY-MM-DD HH:MM:SS[+/-HH:MM], where [+/-HH:MM] is an
     *           optional timezone offset from UTC. If the offset is absent, the API will
     *           use the account's timezone as default.
     *     @type array<\Google\Ads\GoogleAds\V19\Common\EventAttribute>|\Google\Protobuf\Internal\RepeatedField $event_attribute
     *           Optional. Advertiser defined events and their attributes. All the values in
     *           the nested fields are required. Currently this field is in beta.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V19\Common\OfflineUserData::initOnce();
        parent::__construct($data);
    }

    /**
     * Advertiser defined lifetime value for the user.
     *
     * Generated from protobuf field <code>optional int64 lifetime_value_micros = 1;</code>
     * @return int|string
     */
    public function getLifetimeValueMicros()
    {
        return isset($this->lifetime_value_micros) ? $this->lifetime_value_micros : 0;
    }

    public function hasLifetimeValueMicros()
    {
        return isset($this->lifetime_value_micros);
    }

    public function clearLifetimeValueMicros()
    {
        unset($this->lifetime_value_micros);
    }

    /**
     * Advertiser defined lifetime value for the user.
     *
     * Generated from protobuf field <code>optional int64 lifetime_value_micros = 1;</code>
     * @param int|string $var
     * @return $this
     */
    public function setLifetimeValueMicros($var)
    {
        GPBUtil::checkInt64($var);
        $this->lifetime_value_micros = $var;

        return $this;
    }

    /**
     * Advertiser defined lifetime value bucket for the user. The valid range for
     * a lifetime value bucket is from 1 (low) to 10 (high), except for remove
     * operation where 0 will also be accepted.
     *
     * Generated from protobuf field <code>optional int32 lifetime_value_bucket = 2;</code>
     * @return int
     */
    public function getLifetimeValueBucket()
    {
        return isset($this->lifetime_value_bucket) ? $this->lifetime_value_bucket : 0;
    }

    public function hasLifetimeValueBucket()
    {
        return isset($this->lifetime_value_bucket);
    }

    public function clearLifetimeValueBucket()
    {
        unset($this->lifetime_value_bucket);
    }

    /**
     * Advertiser defined lifetime value bucket for the user. The valid range for
     * a lifetime value bucket is from 1 (low) to 10 (high), except for remove
     * operation where 0 will also be accepted.
     *
     * Generated from protobuf field <code>optional int32 lifetime_value_bucket = 2;</code>
     * @param int $var
     * @return $this
     */
    public function setLifetimeValueBucket($var)
    {
        GPBUtil::checkInt32($var);
        $this->lifetime_value_bucket = $var;

        return $this;
    }

    /**
     * Timestamp of the last purchase made by the user.
     * The format is YYYY-MM-DD HH:MM:SS[+/-HH:MM], where [+/-HH:MM] is an
     * optional timezone offset from UTC. If the offset is absent, the API will
     * use the account's timezone as default.
     *
     * Generated from protobuf field <code>string last_purchase_date_time = 3;</code>
     * @return string
     */
    public function getLastPurchaseDateTime()
    {
        return $this->last_purchase_date_time;
    }

    /**
     * Timestamp of the last purchase made by the user.
     * The format is YYYY-MM-DD HH:MM:SS[+/-HH:MM], where [+/-HH:MM] is an
     * optional timezone offset from UTC. If the offset is absent, the API will
     * use the account's timezone as default.
     *
     * Generated from protobuf field <code>string last_purchase_date_time = 3;</code>
     * @param string $var
     * @return $this
     */
    public function setLastPurchaseDateTime($var)
    {
        GPBUtil::checkString($var, True);
        $this->last_purchase_date_time = $var;

        return $this;
    }

    /**
     * Advertiser defined average number of purchases that are made by the user in
     * a 30 day period.
     *
     * Generated from protobuf field <code>int32 average_purchase_count = 4;</code>
     * @return int
     */
    public function getAveragePurchaseCount()
    {
        return $this->average_purchase_count;
    }

    /**
     * Advertiser defined average number of purchases that are made by the user in
     * a 30 day period.
     *
     * Generated from protobuf field <code>int32 average_purchase_count = 4;</code>
     * @param int $var
     * @return $this
     */
    public function setAveragePurchaseCount($var)
    {
        GPBUtil::checkInt32($var);
        $this->average_purchase_count = $var;

        return $this;
    }

    /**
     * Advertiser defined average purchase value in micros for the user.
     *
     * Generated from protobuf field <code>int64 average_purchase_value_micros = 5;</code>
     * @return int|string
     */
    public function getAveragePurchaseValueMicros()
    {
        return $this->average_purchase_value_micros;
    }

    /**
     * Advertiser defined average purchase value in micros for the user.
     *
     * Generated from protobuf field <code>int64 average_purchase_value_micros = 5;</code>
     * @param int|string $var
     * @return $this
     */
    public function setAveragePurchaseValueMicros($var)
    {
        GPBUtil::checkInt64($var);
        $this->average_purchase_value_micros = $var;

        return $this;
    }

    /**
     * Timestamp when the user was acquired.
     * The format is YYYY-MM-DD HH:MM:SS[+/-HH:MM], where [+/-HH:MM] is an
     * optional timezone offset from UTC. If the offset is absent, the API will
     * use the account's timezone as default.
     *
     * Generated from protobuf field <code>string acquisition_date_time = 6;</code>
     * @return string
     */
    public function getAcquisitionDateTime()
    {
        return $this->acquisition_date_time;
    }

    /**
     * Timestamp when the user was acquired.
     * The format is YYYY-MM-DD HH:MM:SS[+/-HH:MM], where [+/-HH:MM] is an
     * optional timezone offset from UTC. If the offset is absent, the API will
     * use the account's timezone as default.
     *
     * Generated from protobuf field <code>string acquisition_date_time = 6;</code>
     * @param string $var
     * @return $this
     */
    public function setAcquisitionDateTime($var)
    {
        GPBUtil::checkString($var, True);
        $this->acquisition_date_time = $var;

        return $this;
    }

    /**
     * The shopping loyalty related data. Shopping utilizes this data to provide
     * users with a better experience. Accessible only to merchants on the
     * allow-list with the user's consent.
     *
     * Generated from protobuf field <code>optional .google.ads.googleads.v19.common.ShoppingLoyalty shopping_loyalty = 7;</code>
     * @return \Google\Ads\GoogleAds\V19\Common\ShoppingLoyalty|null
     */
    public function getShoppingLoyalty()
    {
        return $this->shopping_loyalty;
    }

    public function hasShoppingLoyalty()
    {
        return isset($this->shopping_loyalty);
    }

    public function clearShoppingLoyalty()
    {
        unset($this->shopping_loyalty);
    }

    /**
     * The shopping loyalty related data. Shopping utilizes this data to provide
     * users with a better experience. Accessible only to merchants on the
     * allow-list with the user's consent.
     *
     * Generated from protobuf field <code>optional .google.ads.googleads.v19.common.ShoppingLoyalty shopping_loyalty = 7;</code>
     * @param \Google\Ads\GoogleAds\V19\Common\ShoppingLoyalty $var
     * @return $this
     */
    public function setShoppingLoyalty($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V19\Common\ShoppingLoyalty::class);
        $this->shopping_loyalty = $var;

        return $this;
    }

    /**
     * Optional. Advertiser defined lifecycle stage for the user. The accepted
     * values are "Lead", "Active" and "Churned".
     *
     * Generated from protobuf field <code>string lifecycle_stage = 8 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @return string
     */
    public function getLifecycleStage()
    {
        return $this->lifecycle_stage;
    }

    /**
     * Optional. Advertiser defined lifecycle stage for the user. The accepted
     * values are "Lead", "Active" and "Churned".
     *
     * Generated from protobuf field <code>string lifecycle_stage = 8 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @param string $var
     * @return $this
     */
    public function setLifecycleStage($var)
    {
        GPBUtil::checkString($var, True);
        $this->lifecycle_stage = $var;

        return $this;
    }

    /**
     * Optional. Timestamp of the first purchase made by the user.
     * The format is YYYY-MM-DD HH:MM:SS[+/-HH:MM], where [+/-HH:MM] is an
     * optional timezone offset from UTC. If the offset is absent, the API will
     * use the account's timezone as default.
     *
     * Generated from protobuf field <code>string first_purchase_date_time = 9 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @return string
     */
    public function getFirstPurchaseDateTime()
    {
        return $this->first_purchase_date_time;
    }

    /**
     * Optional. Timestamp of the first purchase made by the user.
     * The format is YYYY-MM-DD HH:MM:SS[+/-HH:MM], where [+/-HH:MM] is an
     * optional timezone offset from UTC. If the offset is absent, the API will
     * use the account's timezone as default.
     *
     * Generated from protobuf field <code>string first_purchase_date_time = 9 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @param string $var
     * @return $this
     */
    public function setFirstPurchaseDateTime($var)
    {
        GPBUtil::checkString($var, True);
        $this->first_purchase_date_time = $var;

        return $this;
    }

    /**
     * Optional. Advertiser defined events and their attributes. All the values in
     * the nested fields are required. Currently this field is in beta.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v19.common.EventAttribute event_attribute = 10 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getEventAttribute()
    {
        return $this->event_attribute;
    }

    /**
     * Optional. Advertiser defined events and their attributes. All the values in
     * the nested fields are required. Currently this field is in beta.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v19.common.EventAttribute event_attribute = 10 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @param array<\Google\Ads\GoogleAds\V19\Common\EventAttribute>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setEventAttribute($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Ads\GoogleAds\V19\Common\EventAttribute::class);
        $this->event_attribute = $arr;

        return $this;
    }

}

