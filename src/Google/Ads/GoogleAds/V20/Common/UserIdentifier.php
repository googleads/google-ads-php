<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/common/offline_user_data.proto

namespace Google\Ads\GoogleAds\V20\Common;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * User identifying information.
 *
 * Generated from protobuf message <code>google.ads.googleads.v20.common.UserIdentifier</code>
 */
class UserIdentifier extends \Google\Protobuf\Internal\Message
{
    /**
     * Source of the user identifier when the upload is from Store Sales,
     * ConversionUploadService, or ConversionAdjustmentUploadService.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.enums.UserIdentifierSourceEnum.UserIdentifierSource user_identifier_source = 6;</code>
     */
    protected $user_identifier_source = 0;
    protected $identifier;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int $user_identifier_source
     *           Source of the user identifier when the upload is from Store Sales,
     *           ConversionUploadService, or ConversionAdjustmentUploadService.
     *     @type string $hashed_email
     *           Hashed email address using SHA-256 hash function after normalization.
     *           Accepted for Customer Match, Store Sales, ConversionUploadService, and
     *           ConversionAdjustmentUploadService.
     *     @type string $hashed_phone_number
     *           Hashed phone number using SHA-256 hash function after normalization
     *           (E164 standard). Accepted for Customer Match, Store Sales,
     *           ConversionUploadService, and ConversionAdjustmentUploadService.
     *     @type string $mobile_id
     *           Mobile device ID (advertising ID/IDFA). Accepted only for Customer Match.
     *     @type string $third_party_user_id
     *           Advertiser-assigned user ID for Customer Match upload, or
     *           third-party-assigned user ID for Store Sales. Accepted only for Customer
     *           Match and Store Sales.
     *     @type \Google\Ads\GoogleAds\V20\Common\OfflineUserAddressInfo $address_info
     *           Address information. Accepted only for Customer Match, Store Sales, and
     *           ConversionAdjustmentUploadService.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V20\Common\OfflineUserData::initOnce();
        parent::__construct($data);
    }

    /**
     * Source of the user identifier when the upload is from Store Sales,
     * ConversionUploadService, or ConversionAdjustmentUploadService.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.enums.UserIdentifierSourceEnum.UserIdentifierSource user_identifier_source = 6;</code>
     * @return int
     */
    public function getUserIdentifierSource()
    {
        return $this->user_identifier_source;
    }

    /**
     * Source of the user identifier when the upload is from Store Sales,
     * ConversionUploadService, or ConversionAdjustmentUploadService.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.enums.UserIdentifierSourceEnum.UserIdentifierSource user_identifier_source = 6;</code>
     * @param int $var
     * @return $this
     */
    public function setUserIdentifierSource($var)
    {
        GPBUtil::checkEnum($var, \Google\Ads\GoogleAds\V20\Enums\UserIdentifierSourceEnum\UserIdentifierSource::class);
        $this->user_identifier_source = $var;

        return $this;
    }

    /**
     * Hashed email address using SHA-256 hash function after normalization.
     * Accepted for Customer Match, Store Sales, ConversionUploadService, and
     * ConversionAdjustmentUploadService.
     *
     * Generated from protobuf field <code>string hashed_email = 7;</code>
     * @return string
     */
    public function getHashedEmail()
    {
        return $this->readOneof(7);
    }

    public function hasHashedEmail()
    {
        return $this->hasOneof(7);
    }

    /**
     * Hashed email address using SHA-256 hash function after normalization.
     * Accepted for Customer Match, Store Sales, ConversionUploadService, and
     * ConversionAdjustmentUploadService.
     *
     * Generated from protobuf field <code>string hashed_email = 7;</code>
     * @param string $var
     * @return $this
     */
    public function setHashedEmail($var)
    {
        GPBUtil::checkString($var, True);
        $this->writeOneof(7, $var);

        return $this;
    }

    /**
     * Hashed phone number using SHA-256 hash function after normalization
     * (E164 standard). Accepted for Customer Match, Store Sales,
     * ConversionUploadService, and ConversionAdjustmentUploadService.
     *
     * Generated from protobuf field <code>string hashed_phone_number = 8;</code>
     * @return string
     */
    public function getHashedPhoneNumber()
    {
        return $this->readOneof(8);
    }

    public function hasHashedPhoneNumber()
    {
        return $this->hasOneof(8);
    }

    /**
     * Hashed phone number using SHA-256 hash function after normalization
     * (E164 standard). Accepted for Customer Match, Store Sales,
     * ConversionUploadService, and ConversionAdjustmentUploadService.
     *
     * Generated from protobuf field <code>string hashed_phone_number = 8;</code>
     * @param string $var
     * @return $this
     */
    public function setHashedPhoneNumber($var)
    {
        GPBUtil::checkString($var, True);
        $this->writeOneof(8, $var);

        return $this;
    }

    /**
     * Mobile device ID (advertising ID/IDFA). Accepted only for Customer Match.
     *
     * Generated from protobuf field <code>string mobile_id = 9;</code>
     * @return string
     */
    public function getMobileId()
    {
        return $this->readOneof(9);
    }

    public function hasMobileId()
    {
        return $this->hasOneof(9);
    }

    /**
     * Mobile device ID (advertising ID/IDFA). Accepted only for Customer Match.
     *
     * Generated from protobuf field <code>string mobile_id = 9;</code>
     * @param string $var
     * @return $this
     */
    public function setMobileId($var)
    {
        GPBUtil::checkString($var, True);
        $this->writeOneof(9, $var);

        return $this;
    }

    /**
     * Advertiser-assigned user ID for Customer Match upload, or
     * third-party-assigned user ID for Store Sales. Accepted only for Customer
     * Match and Store Sales.
     *
     * Generated from protobuf field <code>string third_party_user_id = 10;</code>
     * @return string
     */
    public function getThirdPartyUserId()
    {
        return $this->readOneof(10);
    }

    public function hasThirdPartyUserId()
    {
        return $this->hasOneof(10);
    }

    /**
     * Advertiser-assigned user ID for Customer Match upload, or
     * third-party-assigned user ID for Store Sales. Accepted only for Customer
     * Match and Store Sales.
     *
     * Generated from protobuf field <code>string third_party_user_id = 10;</code>
     * @param string $var
     * @return $this
     */
    public function setThirdPartyUserId($var)
    {
        GPBUtil::checkString($var, True);
        $this->writeOneof(10, $var);

        return $this;
    }

    /**
     * Address information. Accepted only for Customer Match, Store Sales, and
     * ConversionAdjustmentUploadService.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.common.OfflineUserAddressInfo address_info = 5;</code>
     * @return \Google\Ads\GoogleAds\V20\Common\OfflineUserAddressInfo|null
     */
    public function getAddressInfo()
    {
        return $this->readOneof(5);
    }

    public function hasAddressInfo()
    {
        return $this->hasOneof(5);
    }

    /**
     * Address information. Accepted only for Customer Match, Store Sales, and
     * ConversionAdjustmentUploadService.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.common.OfflineUserAddressInfo address_info = 5;</code>
     * @param \Google\Ads\GoogleAds\V20\Common\OfflineUserAddressInfo $var
     * @return $this
     */
    public function setAddressInfo($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V20\Common\OfflineUserAddressInfo::class);
        $this->writeOneof(5, $var);

        return $this;
    }

    /**
     * @return string
     */
    public function getIdentifier()
    {
        return $this->whichOneof("identifier");
    }

}

