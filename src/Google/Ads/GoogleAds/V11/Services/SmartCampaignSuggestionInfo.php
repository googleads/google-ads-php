<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v11/services/smart_campaign_suggest_service.proto

namespace Google\Ads\GoogleAds\V11\Services;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Information needed to get suggestion for Smart Campaign. More information
 * provided will help the system to derive better suggestions.
 *
 * Generated from protobuf message <code>google.ads.googleads.v11.services.SmartCampaignSuggestionInfo</code>
 */
class SmartCampaignSuggestionInfo extends \Google\Protobuf\Internal\Message
{
    /**
     * Optional. Landing page URL of the campaign.
     *
     * Generated from protobuf field <code>string final_url = 1 [(.google.api.field_behavior) = OPTIONAL];</code>
     */
    protected $final_url = '';
    /**
     * Optional. The two letter advertising language for the Smart campaign to be
     * constructed, default to 'en' if not set.
     *
     * Generated from protobuf field <code>string language_code = 3 [(.google.api.field_behavior) = OPTIONAL];</code>
     */
    protected $language_code = '';
    /**
     * Optional. The business ad schedule.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v11.common.AdScheduleInfo ad_schedules = 6 [(.google.api.field_behavior) = OPTIONAL];</code>
     */
    private $ad_schedules;
    /**
     * Optional. Smart campaign keyword themes. This field may greatly improve suggestion
     * accuracy and we recommend always setting it if possible.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v11.common.KeywordThemeInfo keyword_themes = 7 [(.google.api.field_behavior) = OPTIONAL];</code>
     */
    private $keyword_themes;
    protected $business_setting;
    protected $geo_target;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $final_url
     *           Optional. Landing page URL of the campaign.
     *     @type string $language_code
     *           Optional. The two letter advertising language for the Smart campaign to be
     *           constructed, default to 'en' if not set.
     *     @type array<\Google\Ads\GoogleAds\V11\Common\AdScheduleInfo>|\Google\Protobuf\Internal\RepeatedField $ad_schedules
     *           Optional. The business ad schedule.
     *     @type array<\Google\Ads\GoogleAds\V11\Common\KeywordThemeInfo>|\Google\Protobuf\Internal\RepeatedField $keyword_themes
     *           Optional. Smart campaign keyword themes. This field may greatly improve suggestion
     *           accuracy and we recommend always setting it if possible.
     *     @type \Google\Ads\GoogleAds\V11\Services\SmartCampaignSuggestionInfo\BusinessContext $business_context
     *           Optional. Context describing the business to advertise.
     *     @type string $business_profile_location
     *           Optional. The resource name of a Business Profile location.
     *           Business Profile location resource names can be fetched through the
     *           Business Profile API and adhere to the following format:
     *           `locations/{locationId}`.
     *           See the [Business Profile API]
     *           (https://developers.google.com/my-business/reference/businessinformation/rest/v1/accounts.locations)
     *           for additional details.
     *     @type \Google\Ads\GoogleAds\V11\Services\SmartCampaignSuggestionInfo\LocationList $location_list
     *           Optional. The targeting geo location by locations.
     *     @type \Google\Ads\GoogleAds\V11\Common\ProximityInfo $proximity
     *           Optional. The targeting geo location by proximity.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V11\Services\SmartCampaignSuggestService::initOnce();
        parent::__construct($data);
    }

    /**
     * Optional. Landing page URL of the campaign.
     *
     * Generated from protobuf field <code>string final_url = 1 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @return string
     */
    public function getFinalUrl()
    {
        return $this->final_url;
    }

    /**
     * Optional. Landing page URL of the campaign.
     *
     * Generated from protobuf field <code>string final_url = 1 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @param string $var
     * @return $this
     */
    public function setFinalUrl($var)
    {
        GPBUtil::checkString($var, True);
        $this->final_url = $var;

        return $this;
    }

    /**
     * Optional. The two letter advertising language for the Smart campaign to be
     * constructed, default to 'en' if not set.
     *
     * Generated from protobuf field <code>string language_code = 3 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @return string
     */
    public function getLanguageCode()
    {
        return $this->language_code;
    }

    /**
     * Optional. The two letter advertising language for the Smart campaign to be
     * constructed, default to 'en' if not set.
     *
     * Generated from protobuf field <code>string language_code = 3 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @param string $var
     * @return $this
     */
    public function setLanguageCode($var)
    {
        GPBUtil::checkString($var, True);
        $this->language_code = $var;

        return $this;
    }

    /**
     * Optional. The business ad schedule.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v11.common.AdScheduleInfo ad_schedules = 6 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getAdSchedules()
    {
        return $this->ad_schedules;
    }

    /**
     * Optional. The business ad schedule.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v11.common.AdScheduleInfo ad_schedules = 6 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @param array<\Google\Ads\GoogleAds\V11\Common\AdScheduleInfo>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setAdSchedules($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Ads\GoogleAds\V11\Common\AdScheduleInfo::class);
        $this->ad_schedules = $arr;

        return $this;
    }

    /**
     * Optional. Smart campaign keyword themes. This field may greatly improve suggestion
     * accuracy and we recommend always setting it if possible.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v11.common.KeywordThemeInfo keyword_themes = 7 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getKeywordThemes()
    {
        return $this->keyword_themes;
    }

    /**
     * Optional. Smart campaign keyword themes. This field may greatly improve suggestion
     * accuracy and we recommend always setting it if possible.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v11.common.KeywordThemeInfo keyword_themes = 7 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @param array<\Google\Ads\GoogleAds\V11\Common\KeywordThemeInfo>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setKeywordThemes($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Ads\GoogleAds\V11\Common\KeywordThemeInfo::class);
        $this->keyword_themes = $arr;

        return $this;
    }

    /**
     * Optional. Context describing the business to advertise.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v11.services.SmartCampaignSuggestionInfo.BusinessContext business_context = 8 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @return \Google\Ads\GoogleAds\V11\Services\SmartCampaignSuggestionInfo\BusinessContext|null
     */
    public function getBusinessContext()
    {
        return $this->readOneof(8);
    }

    public function hasBusinessContext()
    {
        return $this->hasOneof(8);
    }

    /**
     * Optional. Context describing the business to advertise.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v11.services.SmartCampaignSuggestionInfo.BusinessContext business_context = 8 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @param \Google\Ads\GoogleAds\V11\Services\SmartCampaignSuggestionInfo\BusinessContext $var
     * @return $this
     */
    public function setBusinessContext($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V11\Services\SmartCampaignSuggestionInfo\BusinessContext::class);
        $this->writeOneof(8, $var);

        return $this;
    }

    /**
     * Optional. The resource name of a Business Profile location.
     * Business Profile location resource names can be fetched through the
     * Business Profile API and adhere to the following format:
     * `locations/{locationId}`.
     * See the [Business Profile API]
     * (https://developers.google.com/my-business/reference/businessinformation/rest/v1/accounts.locations)
     * for additional details.
     *
     * Generated from protobuf field <code>string business_profile_location = 9 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @return string
     */
    public function getBusinessProfileLocation()
    {
        return $this->readOneof(9);
    }

    public function hasBusinessProfileLocation()
    {
        return $this->hasOneof(9);
    }

    /**
     * Optional. The resource name of a Business Profile location.
     * Business Profile location resource names can be fetched through the
     * Business Profile API and adhere to the following format:
     * `locations/{locationId}`.
     * See the [Business Profile API]
     * (https://developers.google.com/my-business/reference/businessinformation/rest/v1/accounts.locations)
     * for additional details.
     *
     * Generated from protobuf field <code>string business_profile_location = 9 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @param string $var
     * @return $this
     */
    public function setBusinessProfileLocation($var)
    {
        GPBUtil::checkString($var, True);
        $this->writeOneof(9, $var);

        return $this;
    }

    /**
     * Optional. The targeting geo location by locations.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v11.services.SmartCampaignSuggestionInfo.LocationList location_list = 4 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @return \Google\Ads\GoogleAds\V11\Services\SmartCampaignSuggestionInfo\LocationList|null
     */
    public function getLocationList()
    {
        return $this->readOneof(4);
    }

    public function hasLocationList()
    {
        return $this->hasOneof(4);
    }

    /**
     * Optional. The targeting geo location by locations.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v11.services.SmartCampaignSuggestionInfo.LocationList location_list = 4 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @param \Google\Ads\GoogleAds\V11\Services\SmartCampaignSuggestionInfo\LocationList $var
     * @return $this
     */
    public function setLocationList($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V11\Services\SmartCampaignSuggestionInfo\LocationList::class);
        $this->writeOneof(4, $var);

        return $this;
    }

    /**
     * Optional. The targeting geo location by proximity.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v11.common.ProximityInfo proximity = 5 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @return \Google\Ads\GoogleAds\V11\Common\ProximityInfo|null
     */
    public function getProximity()
    {
        return $this->readOneof(5);
    }

    public function hasProximity()
    {
        return $this->hasOneof(5);
    }

    /**
     * Optional. The targeting geo location by proximity.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v11.common.ProximityInfo proximity = 5 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @param \Google\Ads\GoogleAds\V11\Common\ProximityInfo $var
     * @return $this
     */
    public function setProximity($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V11\Common\ProximityInfo::class);
        $this->writeOneof(5, $var);

        return $this;
    }

    /**
     * @return string
     */
    public function getBusinessSetting()
    {
        return $this->whichOneof("business_setting");
    }

    /**
     * @return string
     */
    public function getGeoTarget()
    {
        return $this->whichOneof("geo_target");
    }

}

