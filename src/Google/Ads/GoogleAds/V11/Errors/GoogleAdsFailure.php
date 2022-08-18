<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v11/errors/errors.proto

namespace Google\Ads\GoogleAds\V11\Errors;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Describes how a GoogleAds API call failed. It's returned inside
 * google.rpc.Status.details when a call fails.
 *
 * Generated from protobuf message <code>google.ads.googleads.v11.errors.GoogleAdsFailure</code>
 */
class GoogleAdsFailure extends \Google\Protobuf\Internal\Message
{
    /**
     * The list of errors that occurred.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v11.errors.GoogleAdsError errors = 1;</code>
     */
    private $errors;
    /**
     * The unique ID of the request that is used for debugging purposes.
     *
     * Generated from protobuf field <code>string request_id = 2;</code>
     */
    protected $request_id = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type array<\Google\Ads\GoogleAds\V11\Errors\GoogleAdsError>|\Google\Protobuf\Internal\RepeatedField $errors
     *           The list of errors that occurred.
     *     @type string $request_id
     *           The unique ID of the request that is used for debugging purposes.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V11\Errors\Errors::initOnce();
        parent::__construct($data);
    }

    /**
     * The list of errors that occurred.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v11.errors.GoogleAdsError errors = 1;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * The list of errors that occurred.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v11.errors.GoogleAdsError errors = 1;</code>
     * @param array<\Google\Ads\GoogleAds\V11\Errors\GoogleAdsError>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setErrors($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Ads\GoogleAds\V11\Errors\GoogleAdsError::class);
        $this->errors = $arr;

        return $this;
    }

    /**
     * The unique ID of the request that is used for debugging purposes.
     *
     * Generated from protobuf field <code>string request_id = 2;</code>
     * @return string
     */
    public function getRequestId()
    {
        return $this->request_id;
    }

    /**
     * The unique ID of the request that is used for debugging purposes.
     *
     * Generated from protobuf field <code>string request_id = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setRequestId($var)
    {
        GPBUtil::checkString($var, True);
        $this->request_id = $var;

        return $this;
    }

}

