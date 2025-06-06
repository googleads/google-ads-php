<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/common/ad_type_infos.proto

namespace Google\Ads\GoogleAds\V20\Common;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * A legacy responsive display ad. Ads of this type are labeled 'Responsive ads'
 * in the Google Ads UI.
 *
 * Generated from protobuf message <code>google.ads.googleads.v20.common.LegacyResponsiveDisplayAdInfo</code>
 */
class LegacyResponsiveDisplayAdInfo extends \Google\Protobuf\Internal\Message
{
    /**
     * The short version of the ad's headline.
     *
     * Generated from protobuf field <code>optional string short_headline = 16;</code>
     */
    protected $short_headline = null;
    /**
     * The long version of the ad's headline.
     *
     * Generated from protobuf field <code>optional string long_headline = 17;</code>
     */
    protected $long_headline = null;
    /**
     * The description of the ad.
     *
     * Generated from protobuf field <code>optional string description = 18;</code>
     */
    protected $description = null;
    /**
     * The business name in the ad.
     *
     * Generated from protobuf field <code>optional string business_name = 19;</code>
     */
    protected $business_name = null;
    /**
     * Advertiser's consent to allow flexible color. When true, the ad may be
     * served with different color if necessary. When false, the ad will be served
     * with the specified colors or a neutral color.
     * The default value is `true`.
     * Must be true if `main_color` and `accent_color` are not set.
     *
     * Generated from protobuf field <code>optional bool allow_flexible_color = 20;</code>
     */
    protected $allow_flexible_color = null;
    /**
     * The accent color of the ad in hexadecimal, for example, #ffffff for white.
     * If one of `main_color` and `accent_color` is set, the other is required as
     * well.
     *
     * Generated from protobuf field <code>optional string accent_color = 21;</code>
     */
    protected $accent_color = null;
    /**
     * The main color of the ad in hexadecimal, for example, #ffffff for white.
     * If one of `main_color` and `accent_color` is set, the other is required as
     * well.
     *
     * Generated from protobuf field <code>optional string main_color = 22;</code>
     */
    protected $main_color = null;
    /**
     * The call-to-action text for the ad.
     *
     * Generated from protobuf field <code>optional string call_to_action_text = 23;</code>
     */
    protected $call_to_action_text = null;
    /**
     * The MediaFile resource name of the logo image used in the ad.
     *
     * Generated from protobuf field <code>optional string logo_image = 24;</code>
     */
    protected $logo_image = null;
    /**
     * The MediaFile resource name of the square logo image used in the ad.
     *
     * Generated from protobuf field <code>optional string square_logo_image = 25;</code>
     */
    protected $square_logo_image = null;
    /**
     * The MediaFile resource name of the marketing image used in the ad.
     *
     * Generated from protobuf field <code>optional string marketing_image = 26;</code>
     */
    protected $marketing_image = null;
    /**
     * The MediaFile resource name of the square marketing image used in the ad.
     *
     * Generated from protobuf field <code>optional string square_marketing_image = 27;</code>
     */
    protected $square_marketing_image = null;
    /**
     * Specifies which format the ad will be served in. Default is ALL_FORMATS.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.enums.DisplayAdFormatSettingEnum.DisplayAdFormatSetting format_setting = 13;</code>
     */
    protected $format_setting = 0;
    /**
     * Prefix before price. For example, 'as low as'.
     *
     * Generated from protobuf field <code>optional string price_prefix = 28;</code>
     */
    protected $price_prefix = null;
    /**
     * Promotion text used for dynamic formats of responsive ads. For example
     * 'Free two-day shipping'.
     *
     * Generated from protobuf field <code>optional string promo_text = 29;</code>
     */
    protected $promo_text = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $short_headline
     *           The short version of the ad's headline.
     *     @type string $long_headline
     *           The long version of the ad's headline.
     *     @type string $description
     *           The description of the ad.
     *     @type string $business_name
     *           The business name in the ad.
     *     @type bool $allow_flexible_color
     *           Advertiser's consent to allow flexible color. When true, the ad may be
     *           served with different color if necessary. When false, the ad will be served
     *           with the specified colors or a neutral color.
     *           The default value is `true`.
     *           Must be true if `main_color` and `accent_color` are not set.
     *     @type string $accent_color
     *           The accent color of the ad in hexadecimal, for example, #ffffff for white.
     *           If one of `main_color` and `accent_color` is set, the other is required as
     *           well.
     *     @type string $main_color
     *           The main color of the ad in hexadecimal, for example, #ffffff for white.
     *           If one of `main_color` and `accent_color` is set, the other is required as
     *           well.
     *     @type string $call_to_action_text
     *           The call-to-action text for the ad.
     *     @type string $logo_image
     *           The MediaFile resource name of the logo image used in the ad.
     *     @type string $square_logo_image
     *           The MediaFile resource name of the square logo image used in the ad.
     *     @type string $marketing_image
     *           The MediaFile resource name of the marketing image used in the ad.
     *     @type string $square_marketing_image
     *           The MediaFile resource name of the square marketing image used in the ad.
     *     @type int $format_setting
     *           Specifies which format the ad will be served in. Default is ALL_FORMATS.
     *     @type string $price_prefix
     *           Prefix before price. For example, 'as low as'.
     *     @type string $promo_text
     *           Promotion text used for dynamic formats of responsive ads. For example
     *           'Free two-day shipping'.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V20\Common\AdTypeInfos::initOnce();
        parent::__construct($data);
    }

    /**
     * The short version of the ad's headline.
     *
     * Generated from protobuf field <code>optional string short_headline = 16;</code>
     * @return string
     */
    public function getShortHeadline()
    {
        return isset($this->short_headline) ? $this->short_headline : '';
    }

    public function hasShortHeadline()
    {
        return isset($this->short_headline);
    }

    public function clearShortHeadline()
    {
        unset($this->short_headline);
    }

    /**
     * The short version of the ad's headline.
     *
     * Generated from protobuf field <code>optional string short_headline = 16;</code>
     * @param string $var
     * @return $this
     */
    public function setShortHeadline($var)
    {
        GPBUtil::checkString($var, True);
        $this->short_headline = $var;

        return $this;
    }

    /**
     * The long version of the ad's headline.
     *
     * Generated from protobuf field <code>optional string long_headline = 17;</code>
     * @return string
     */
    public function getLongHeadline()
    {
        return isset($this->long_headline) ? $this->long_headline : '';
    }

    public function hasLongHeadline()
    {
        return isset($this->long_headline);
    }

    public function clearLongHeadline()
    {
        unset($this->long_headline);
    }

    /**
     * The long version of the ad's headline.
     *
     * Generated from protobuf field <code>optional string long_headline = 17;</code>
     * @param string $var
     * @return $this
     */
    public function setLongHeadline($var)
    {
        GPBUtil::checkString($var, True);
        $this->long_headline = $var;

        return $this;
    }

    /**
     * The description of the ad.
     *
     * Generated from protobuf field <code>optional string description = 18;</code>
     * @return string
     */
    public function getDescription()
    {
        return isset($this->description) ? $this->description : '';
    }

    public function hasDescription()
    {
        return isset($this->description);
    }

    public function clearDescription()
    {
        unset($this->description);
    }

    /**
     * The description of the ad.
     *
     * Generated from protobuf field <code>optional string description = 18;</code>
     * @param string $var
     * @return $this
     */
    public function setDescription($var)
    {
        GPBUtil::checkString($var, True);
        $this->description = $var;

        return $this;
    }

    /**
     * The business name in the ad.
     *
     * Generated from protobuf field <code>optional string business_name = 19;</code>
     * @return string
     */
    public function getBusinessName()
    {
        return isset($this->business_name) ? $this->business_name : '';
    }

    public function hasBusinessName()
    {
        return isset($this->business_name);
    }

    public function clearBusinessName()
    {
        unset($this->business_name);
    }

    /**
     * The business name in the ad.
     *
     * Generated from protobuf field <code>optional string business_name = 19;</code>
     * @param string $var
     * @return $this
     */
    public function setBusinessName($var)
    {
        GPBUtil::checkString($var, True);
        $this->business_name = $var;

        return $this;
    }

    /**
     * Advertiser's consent to allow flexible color. When true, the ad may be
     * served with different color if necessary. When false, the ad will be served
     * with the specified colors or a neutral color.
     * The default value is `true`.
     * Must be true if `main_color` and `accent_color` are not set.
     *
     * Generated from protobuf field <code>optional bool allow_flexible_color = 20;</code>
     * @return bool
     */
    public function getAllowFlexibleColor()
    {
        return isset($this->allow_flexible_color) ? $this->allow_flexible_color : false;
    }

    public function hasAllowFlexibleColor()
    {
        return isset($this->allow_flexible_color);
    }

    public function clearAllowFlexibleColor()
    {
        unset($this->allow_flexible_color);
    }

    /**
     * Advertiser's consent to allow flexible color. When true, the ad may be
     * served with different color if necessary. When false, the ad will be served
     * with the specified colors or a neutral color.
     * The default value is `true`.
     * Must be true if `main_color` and `accent_color` are not set.
     *
     * Generated from protobuf field <code>optional bool allow_flexible_color = 20;</code>
     * @param bool $var
     * @return $this
     */
    public function setAllowFlexibleColor($var)
    {
        GPBUtil::checkBool($var);
        $this->allow_flexible_color = $var;

        return $this;
    }

    /**
     * The accent color of the ad in hexadecimal, for example, #ffffff for white.
     * If one of `main_color` and `accent_color` is set, the other is required as
     * well.
     *
     * Generated from protobuf field <code>optional string accent_color = 21;</code>
     * @return string
     */
    public function getAccentColor()
    {
        return isset($this->accent_color) ? $this->accent_color : '';
    }

    public function hasAccentColor()
    {
        return isset($this->accent_color);
    }

    public function clearAccentColor()
    {
        unset($this->accent_color);
    }

    /**
     * The accent color of the ad in hexadecimal, for example, #ffffff for white.
     * If one of `main_color` and `accent_color` is set, the other is required as
     * well.
     *
     * Generated from protobuf field <code>optional string accent_color = 21;</code>
     * @param string $var
     * @return $this
     */
    public function setAccentColor($var)
    {
        GPBUtil::checkString($var, True);
        $this->accent_color = $var;

        return $this;
    }

    /**
     * The main color of the ad in hexadecimal, for example, #ffffff for white.
     * If one of `main_color` and `accent_color` is set, the other is required as
     * well.
     *
     * Generated from protobuf field <code>optional string main_color = 22;</code>
     * @return string
     */
    public function getMainColor()
    {
        return isset($this->main_color) ? $this->main_color : '';
    }

    public function hasMainColor()
    {
        return isset($this->main_color);
    }

    public function clearMainColor()
    {
        unset($this->main_color);
    }

    /**
     * The main color of the ad in hexadecimal, for example, #ffffff for white.
     * If one of `main_color` and `accent_color` is set, the other is required as
     * well.
     *
     * Generated from protobuf field <code>optional string main_color = 22;</code>
     * @param string $var
     * @return $this
     */
    public function setMainColor($var)
    {
        GPBUtil::checkString($var, True);
        $this->main_color = $var;

        return $this;
    }

    /**
     * The call-to-action text for the ad.
     *
     * Generated from protobuf field <code>optional string call_to_action_text = 23;</code>
     * @return string
     */
    public function getCallToActionText()
    {
        return isset($this->call_to_action_text) ? $this->call_to_action_text : '';
    }

    public function hasCallToActionText()
    {
        return isset($this->call_to_action_text);
    }

    public function clearCallToActionText()
    {
        unset($this->call_to_action_text);
    }

    /**
     * The call-to-action text for the ad.
     *
     * Generated from protobuf field <code>optional string call_to_action_text = 23;</code>
     * @param string $var
     * @return $this
     */
    public function setCallToActionText($var)
    {
        GPBUtil::checkString($var, True);
        $this->call_to_action_text = $var;

        return $this;
    }

    /**
     * The MediaFile resource name of the logo image used in the ad.
     *
     * Generated from protobuf field <code>optional string logo_image = 24;</code>
     * @return string
     */
    public function getLogoImage()
    {
        return isset($this->logo_image) ? $this->logo_image : '';
    }

    public function hasLogoImage()
    {
        return isset($this->logo_image);
    }

    public function clearLogoImage()
    {
        unset($this->logo_image);
    }

    /**
     * The MediaFile resource name of the logo image used in the ad.
     *
     * Generated from protobuf field <code>optional string logo_image = 24;</code>
     * @param string $var
     * @return $this
     */
    public function setLogoImage($var)
    {
        GPBUtil::checkString($var, True);
        $this->logo_image = $var;

        return $this;
    }

    /**
     * The MediaFile resource name of the square logo image used in the ad.
     *
     * Generated from protobuf field <code>optional string square_logo_image = 25;</code>
     * @return string
     */
    public function getSquareLogoImage()
    {
        return isset($this->square_logo_image) ? $this->square_logo_image : '';
    }

    public function hasSquareLogoImage()
    {
        return isset($this->square_logo_image);
    }

    public function clearSquareLogoImage()
    {
        unset($this->square_logo_image);
    }

    /**
     * The MediaFile resource name of the square logo image used in the ad.
     *
     * Generated from protobuf field <code>optional string square_logo_image = 25;</code>
     * @param string $var
     * @return $this
     */
    public function setSquareLogoImage($var)
    {
        GPBUtil::checkString($var, True);
        $this->square_logo_image = $var;

        return $this;
    }

    /**
     * The MediaFile resource name of the marketing image used in the ad.
     *
     * Generated from protobuf field <code>optional string marketing_image = 26;</code>
     * @return string
     */
    public function getMarketingImage()
    {
        return isset($this->marketing_image) ? $this->marketing_image : '';
    }

    public function hasMarketingImage()
    {
        return isset($this->marketing_image);
    }

    public function clearMarketingImage()
    {
        unset($this->marketing_image);
    }

    /**
     * The MediaFile resource name of the marketing image used in the ad.
     *
     * Generated from protobuf field <code>optional string marketing_image = 26;</code>
     * @param string $var
     * @return $this
     */
    public function setMarketingImage($var)
    {
        GPBUtil::checkString($var, True);
        $this->marketing_image = $var;

        return $this;
    }

    /**
     * The MediaFile resource name of the square marketing image used in the ad.
     *
     * Generated from protobuf field <code>optional string square_marketing_image = 27;</code>
     * @return string
     */
    public function getSquareMarketingImage()
    {
        return isset($this->square_marketing_image) ? $this->square_marketing_image : '';
    }

    public function hasSquareMarketingImage()
    {
        return isset($this->square_marketing_image);
    }

    public function clearSquareMarketingImage()
    {
        unset($this->square_marketing_image);
    }

    /**
     * The MediaFile resource name of the square marketing image used in the ad.
     *
     * Generated from protobuf field <code>optional string square_marketing_image = 27;</code>
     * @param string $var
     * @return $this
     */
    public function setSquareMarketingImage($var)
    {
        GPBUtil::checkString($var, True);
        $this->square_marketing_image = $var;

        return $this;
    }

    /**
     * Specifies which format the ad will be served in. Default is ALL_FORMATS.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.enums.DisplayAdFormatSettingEnum.DisplayAdFormatSetting format_setting = 13;</code>
     * @return int
     */
    public function getFormatSetting()
    {
        return $this->format_setting;
    }

    /**
     * Specifies which format the ad will be served in. Default is ALL_FORMATS.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.enums.DisplayAdFormatSettingEnum.DisplayAdFormatSetting format_setting = 13;</code>
     * @param int $var
     * @return $this
     */
    public function setFormatSetting($var)
    {
        GPBUtil::checkEnum($var, \Google\Ads\GoogleAds\V20\Enums\DisplayAdFormatSettingEnum\DisplayAdFormatSetting::class);
        $this->format_setting = $var;

        return $this;
    }

    /**
     * Prefix before price. For example, 'as low as'.
     *
     * Generated from protobuf field <code>optional string price_prefix = 28;</code>
     * @return string
     */
    public function getPricePrefix()
    {
        return isset($this->price_prefix) ? $this->price_prefix : '';
    }

    public function hasPricePrefix()
    {
        return isset($this->price_prefix);
    }

    public function clearPricePrefix()
    {
        unset($this->price_prefix);
    }

    /**
     * Prefix before price. For example, 'as low as'.
     *
     * Generated from protobuf field <code>optional string price_prefix = 28;</code>
     * @param string $var
     * @return $this
     */
    public function setPricePrefix($var)
    {
        GPBUtil::checkString($var, True);
        $this->price_prefix = $var;

        return $this;
    }

    /**
     * Promotion text used for dynamic formats of responsive ads. For example
     * 'Free two-day shipping'.
     *
     * Generated from protobuf field <code>optional string promo_text = 29;</code>
     * @return string
     */
    public function getPromoText()
    {
        return isset($this->promo_text) ? $this->promo_text : '';
    }

    public function hasPromoText()
    {
        return isset($this->promo_text);
    }

    public function clearPromoText()
    {
        unset($this->promo_text);
    }

    /**
     * Promotion text used for dynamic formats of responsive ads. For example
     * 'Free two-day shipping'.
     *
     * Generated from protobuf field <code>optional string promo_text = 29;</code>
     * @param string $var
     * @return $this
     */
    public function setPromoText($var)
    {
        GPBUtil::checkString($var, True);
        $this->promo_text = $var;

        return $this;
    }

}

