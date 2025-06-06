<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/resources/product_link_invitation.proto

namespace Google\Ads\GoogleAds\V20\Resources;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Represents an invitation for data sharing connection between a Google Ads
 * account and another account.
 *
 * Generated from protobuf message <code>google.ads.googleads.v20.resources.ProductLinkInvitation</code>
 */
class ProductLinkInvitation extends \Google\Protobuf\Internal\Message
{
    /**
     * Immutable. The resource name of a product link invitation.
     * Product link invitation resource names have the form:
     * `customers/{customer_id}/productLinkInvitations/{product_link_invitation_id}`
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.field_behavior) = IMMUTABLE, (.google.api.resource_reference) = {</code>
     */
    protected $resource_name = '';
    /**
     * Output only. The ID of the product link invitation.
     * This field is read only.
     *
     * Generated from protobuf field <code>int64 product_link_invitation_id = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $product_link_invitation_id = 0;
    /**
     * Output only. The status of the product link invitation.
     * This field is read only.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.enums.ProductLinkInvitationStatusEnum.ProductLinkInvitationStatus status = 3 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $status = 0;
    /**
     * Output only. The type of the invited account.
     * This field is read only and can be used for filtering invitations with
     * {&#64;code GoogleAdsService.SearchGoogleAdsRequest}.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.enums.LinkedProductTypeEnum.LinkedProductType type = 6 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $type = 0;
    protected $invited_account;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $resource_name
     *           Immutable. The resource name of a product link invitation.
     *           Product link invitation resource names have the form:
     *           `customers/{customer_id}/productLinkInvitations/{product_link_invitation_id}`
     *     @type int|string $product_link_invitation_id
     *           Output only. The ID of the product link invitation.
     *           This field is read only.
     *     @type int $status
     *           Output only. The status of the product link invitation.
     *           This field is read only.
     *     @type int $type
     *           Output only. The type of the invited account.
     *           This field is read only and can be used for filtering invitations with
     *           {&#64;code GoogleAdsService.SearchGoogleAdsRequest}.
     *     @type \Google\Ads\GoogleAds\V20\Resources\HotelCenterLinkInvitationIdentifier $hotel_center
     *           Output only. Hotel link invitation.
     *     @type \Google\Ads\GoogleAds\V20\Resources\MerchantCenterLinkInvitationIdentifier $merchant_center
     *           Output only. Merchant Center link invitation.
     *     @type \Google\Ads\GoogleAds\V20\Resources\AdvertisingPartnerLinkInvitationIdentifier $advertising_partner
     *           Output only. Advertising Partner link invitation.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V20\Resources\ProductLinkInvitation::initOnce();
        parent::__construct($data);
    }

    /**
     * Immutable. The resource name of a product link invitation.
     * Product link invitation resource names have the form:
     * `customers/{customer_id}/productLinkInvitations/{product_link_invitation_id}`
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.field_behavior) = IMMUTABLE, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getResourceName()
    {
        return $this->resource_name;
    }

    /**
     * Immutable. The resource name of a product link invitation.
     * Product link invitation resource names have the form:
     * `customers/{customer_id}/productLinkInvitations/{product_link_invitation_id}`
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.field_behavior) = IMMUTABLE, (.google.api.resource_reference) = {</code>
     * @param string $var
     * @return $this
     */
    public function setResourceName($var)
    {
        GPBUtil::checkString($var, True);
        $this->resource_name = $var;

        return $this;
    }

    /**
     * Output only. The ID of the product link invitation.
     * This field is read only.
     *
     * Generated from protobuf field <code>int64 product_link_invitation_id = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return int|string
     */
    public function getProductLinkInvitationId()
    {
        return $this->product_link_invitation_id;
    }

    /**
     * Output only. The ID of the product link invitation.
     * This field is read only.
     *
     * Generated from protobuf field <code>int64 product_link_invitation_id = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param int|string $var
     * @return $this
     */
    public function setProductLinkInvitationId($var)
    {
        GPBUtil::checkInt64($var);
        $this->product_link_invitation_id = $var;

        return $this;
    }

    /**
     * Output only. The status of the product link invitation.
     * This field is read only.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.enums.ProductLinkInvitationStatusEnum.ProductLinkInvitationStatus status = 3 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Output only. The status of the product link invitation.
     * This field is read only.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.enums.ProductLinkInvitationStatusEnum.ProductLinkInvitationStatus status = 3 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param int $var
     * @return $this
     */
    public function setStatus($var)
    {
        GPBUtil::checkEnum($var, \Google\Ads\GoogleAds\V20\Enums\ProductLinkInvitationStatusEnum\ProductLinkInvitationStatus::class);
        $this->status = $var;

        return $this;
    }

    /**
     * Output only. The type of the invited account.
     * This field is read only and can be used for filtering invitations with
     * {&#64;code GoogleAdsService.SearchGoogleAdsRequest}.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.enums.LinkedProductTypeEnum.LinkedProductType type = 6 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return int
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Output only. The type of the invited account.
     * This field is read only and can be used for filtering invitations with
     * {&#64;code GoogleAdsService.SearchGoogleAdsRequest}.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.enums.LinkedProductTypeEnum.LinkedProductType type = 6 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param int $var
     * @return $this
     */
    public function setType($var)
    {
        GPBUtil::checkEnum($var, \Google\Ads\GoogleAds\V20\Enums\LinkedProductTypeEnum\LinkedProductType::class);
        $this->type = $var;

        return $this;
    }

    /**
     * Output only. Hotel link invitation.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.resources.HotelCenterLinkInvitationIdentifier hotel_center = 4 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return \Google\Ads\GoogleAds\V20\Resources\HotelCenterLinkInvitationIdentifier|null
     */
    public function getHotelCenter()
    {
        return $this->readOneof(4);
    }

    public function hasHotelCenter()
    {
        return $this->hasOneof(4);
    }

    /**
     * Output only. Hotel link invitation.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.resources.HotelCenterLinkInvitationIdentifier hotel_center = 4 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param \Google\Ads\GoogleAds\V20\Resources\HotelCenterLinkInvitationIdentifier $var
     * @return $this
     */
    public function setHotelCenter($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V20\Resources\HotelCenterLinkInvitationIdentifier::class);
        $this->writeOneof(4, $var);

        return $this;
    }

    /**
     * Output only. Merchant Center link invitation.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.resources.MerchantCenterLinkInvitationIdentifier merchant_center = 5 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return \Google\Ads\GoogleAds\V20\Resources\MerchantCenterLinkInvitationIdentifier|null
     */
    public function getMerchantCenter()
    {
        return $this->readOneof(5);
    }

    public function hasMerchantCenter()
    {
        return $this->hasOneof(5);
    }

    /**
     * Output only. Merchant Center link invitation.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.resources.MerchantCenterLinkInvitationIdentifier merchant_center = 5 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param \Google\Ads\GoogleAds\V20\Resources\MerchantCenterLinkInvitationIdentifier $var
     * @return $this
     */
    public function setMerchantCenter($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V20\Resources\MerchantCenterLinkInvitationIdentifier::class);
        $this->writeOneof(5, $var);

        return $this;
    }

    /**
     * Output only. Advertising Partner link invitation.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.resources.AdvertisingPartnerLinkInvitationIdentifier advertising_partner = 7 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return \Google\Ads\GoogleAds\V20\Resources\AdvertisingPartnerLinkInvitationIdentifier|null
     */
    public function getAdvertisingPartner()
    {
        return $this->readOneof(7);
    }

    public function hasAdvertisingPartner()
    {
        return $this->hasOneof(7);
    }

    /**
     * Output only. Advertising Partner link invitation.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.resources.AdvertisingPartnerLinkInvitationIdentifier advertising_partner = 7 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param \Google\Ads\GoogleAds\V20\Resources\AdvertisingPartnerLinkInvitationIdentifier $var
     * @return $this
     */
    public function setAdvertisingPartner($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V20\Resources\AdvertisingPartnerLinkInvitationIdentifier::class);
        $this->writeOneof(7, $var);

        return $this;
    }

    /**
     * @return string
     */
    public function getInvitedAccount()
    {
        return $this->whichOneof("invited_account");
    }

}

