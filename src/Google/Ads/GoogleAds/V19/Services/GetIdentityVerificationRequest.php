<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/services/identity_verification_service.proto

namespace Google\Ads\GoogleAds\V19\Services;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Request message for
 *  [IdentityVerificationService.GetIdentityVerification].
 *
 * Generated from protobuf message <code>google.ads.googleads.v19.services.GetIdentityVerificationRequest</code>
 */
class GetIdentityVerificationRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * Required.  The ID of the customer for whom we are requesting verification
     *  information.
     *
     * Generated from protobuf field <code>string customer_id = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    protected $customer_id = '';

    /**
     * @param string $customerId Required.  The ID of the customer for whom we are requesting verification
     *                           information.
     *
     * @return \Google\Ads\GoogleAds\V19\Services\GetIdentityVerificationRequest
     *
     * @experimental
     */
    public static function build(string $customerId): self
    {
        return (new self())
            ->setCustomerId($customerId);
    }

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $customer_id
     *           Required.  The ID of the customer for whom we are requesting verification
     *            information.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V19\Services\IdentityVerificationService::initOnce();
        parent::__construct($data);
    }

    /**
     * Required.  The ID of the customer for whom we are requesting verification
     *  information.
     *
     * Generated from protobuf field <code>string customer_id = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return string
     */
    public function getCustomerId()
    {
        return $this->customer_id;
    }

    /**
     * Required.  The ID of the customer for whom we are requesting verification
     *  information.
     *
     * Generated from protobuf field <code>string customer_id = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param string $var
     * @return $this
     */
    public function setCustomerId($var)
    {
        GPBUtil::checkString($var, True);
        $this->customer_id = $var;

        return $this;
    }

}

