<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/resources/product_link_invitation.proto

namespace Google\Ads\GoogleAds\V20\Resources;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * The identifier for the Advertising Partner Google Ads account.
 *
 * Generated from protobuf message <code>google.ads.googleads.v20.resources.AdvertisingPartnerLinkInvitationIdentifier</code>
 */
class AdvertisingPartnerLinkInvitationIdentifier extends \Google\Protobuf\Internal\Message
{
    /**
     * Immutable. The resource name of the advertising partner Google Ads account.
     * This field is read only.
     *
     * Generated from protobuf field <code>optional string customer = 1 [(.google.api.field_behavior) = IMMUTABLE, (.google.api.resource_reference) = {</code>
     */
    protected $customer = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $customer
     *           Immutable. The resource name of the advertising partner Google Ads account.
     *           This field is read only.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V20\Resources\ProductLinkInvitation::initOnce();
        parent::__construct($data);
    }

    /**
     * Immutable. The resource name of the advertising partner Google Ads account.
     * This field is read only.
     *
     * Generated from protobuf field <code>optional string customer = 1 [(.google.api.field_behavior) = IMMUTABLE, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getCustomer()
    {
        return isset($this->customer) ? $this->customer : '';
    }

    public function hasCustomer()
    {
        return isset($this->customer);
    }

    public function clearCustomer()
    {
        unset($this->customer);
    }

    /**
     * Immutable. The resource name of the advertising partner Google Ads account.
     * This field is read only.
     *
     * Generated from protobuf field <code>optional string customer = 1 [(.google.api.field_behavior) = IMMUTABLE, (.google.api.resource_reference) = {</code>
     * @param string $var
     * @return $this
     */
    public function setCustomer($var)
    {
        GPBUtil::checkString($var, True);
        $this->customer = $var;

        return $this;
    }

}

