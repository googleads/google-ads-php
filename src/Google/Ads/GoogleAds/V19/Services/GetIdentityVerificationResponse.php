<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/services/identity_verification_service.proto

namespace Google\Ads\GoogleAds\V19\Services;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Response message for
 *  [IdentityVerificationService.GetIdentityVerification].
 *
 * Generated from protobuf message <code>google.ads.googleads.v19.services.GetIdentityVerificationResponse</code>
 */
class GetIdentityVerificationResponse extends \Google\Protobuf\Internal\Message
{
    /**
     * List of identity verifications for the customer.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v19.services.IdentityVerification identity_verification = 1;</code>
     */
    private $identity_verification;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type array<\Google\Ads\GoogleAds\V19\Services\IdentityVerification>|\Google\Protobuf\Internal\RepeatedField $identity_verification
     *           List of identity verifications for the customer.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V19\Services\IdentityVerificationService::initOnce();
        parent::__construct($data);
    }

    /**
     * List of identity verifications for the customer.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v19.services.IdentityVerification identity_verification = 1;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getIdentityVerification()
    {
        return $this->identity_verification;
    }

    /**
     * List of identity verifications for the customer.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v19.services.IdentityVerification identity_verification = 1;</code>
     * @param array<\Google\Ads\GoogleAds\V19\Services\IdentityVerification>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setIdentityVerification($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Ads\GoogleAds\V19\Services\IdentityVerification::class);
        $this->identity_verification = $arr;

        return $this;
    }

}

