<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/services/campaign_service.proto

namespace Google\Ads\GoogleAds\V19\Services;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Assets linked at the campaign level.
 * A business_name and at least one logo_asset are required.
 *
 * Generated from protobuf message <code>google.ads.googleads.v19.services.BrandCampaignAssets</code>
 */
class BrandCampaignAssets extends \Google\Protobuf\Internal\Message
{
    /**
     * Required. The resource name of the business name text asset.
     *
     * Generated from protobuf field <code>string business_name_asset = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    protected $business_name_asset = '';
    /**
     * Required. The resource name of square logo assets.
     *
     * Generated from protobuf field <code>repeated string logo_asset = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    private $logo_asset;
    /**
     * Optional. The resource name of landscape logo assets.
     *
     * Generated from protobuf field <code>repeated string landscape_logo_asset = 3 [(.google.api.field_behavior) = OPTIONAL];</code>
     */
    private $landscape_logo_asset;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $business_name_asset
     *           Required. The resource name of the business name text asset.
     *     @type array<string>|\Google\Protobuf\Internal\RepeatedField $logo_asset
     *           Required. The resource name of square logo assets.
     *     @type array<string>|\Google\Protobuf\Internal\RepeatedField $landscape_logo_asset
     *           Optional. The resource name of landscape logo assets.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V19\Services\CampaignService::initOnce();
        parent::__construct($data);
    }

    /**
     * Required. The resource name of the business name text asset.
     *
     * Generated from protobuf field <code>string business_name_asset = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return string
     */
    public function getBusinessNameAsset()
    {
        return $this->business_name_asset;
    }

    /**
     * Required. The resource name of the business name text asset.
     *
     * Generated from protobuf field <code>string business_name_asset = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param string $var
     * @return $this
     */
    public function setBusinessNameAsset($var)
    {
        GPBUtil::checkString($var, True);
        $this->business_name_asset = $var;

        return $this;
    }

    /**
     * Required. The resource name of square logo assets.
     *
     * Generated from protobuf field <code>repeated string logo_asset = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getLogoAsset()
    {
        return $this->logo_asset;
    }

    /**
     * Required. The resource name of square logo assets.
     *
     * Generated from protobuf field <code>repeated string logo_asset = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param array<string>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setLogoAsset($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::STRING);
        $this->logo_asset = $arr;

        return $this;
    }

    /**
     * Optional. The resource name of landscape logo assets.
     *
     * Generated from protobuf field <code>repeated string landscape_logo_asset = 3 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getLandscapeLogoAsset()
    {
        return $this->landscape_logo_asset;
    }

    /**
     * Optional. The resource name of landscape logo assets.
     *
     * Generated from protobuf field <code>repeated string landscape_logo_asset = 3 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @param array<string>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setLandscapeLogoAsset($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::STRING);
        $this->landscape_logo_asset = $arr;

        return $this;
    }

}

