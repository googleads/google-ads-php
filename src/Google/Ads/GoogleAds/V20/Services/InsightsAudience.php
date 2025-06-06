<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/services/audience_insights_service.proto

namespace Google\Ads\GoogleAds\V20\Services;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * A set of users, defined by various characteristics, for which insights can
 * be requested in AudienceInsightsService.
 *
 * Generated from protobuf message <code>google.ads.googleads.v20.services.InsightsAudience</code>
 */
class InsightsAudience extends \Google\Protobuf\Internal\Message
{
    /**
     * Required. The countries for the audience.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v20.common.LocationInfo country_locations = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    private $country_locations;
    /**
     * Sub-country geographic location attributes.  If present, each of these
     * must be contained in one of the countries in this audience.  If absent, the
     * audience is geographically to the country_locations and no further.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v20.common.LocationInfo sub_country_locations = 2;</code>
     */
    private $sub_country_locations;
    /**
     * Gender for the audience.  If absent, the audience does not restrict by
     * gender.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.common.GenderInfo gender = 3;</code>
     */
    protected $gender = null;
    /**
     * Age ranges for the audience.  If absent, the audience represents all people
     * over 18 that match the other attributes.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v20.common.AgeRangeInfo age_ranges = 4;</code>
     */
    private $age_ranges;
    /**
     * Parental status for the audience.  If absent, the audience does not
     * restrict by parental status.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.common.ParentalStatusInfo parental_status = 5;</code>
     */
    protected $parental_status = null;
    /**
     * Household income percentile ranges for the audience.  If absent, the
     * audience does not restrict by household income range.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v20.common.IncomeRangeInfo income_ranges = 6;</code>
     */
    private $income_ranges;
    /**
     * Lineups representing the YouTube content viewed by the audience.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v20.common.AudienceInsightsLineup lineups = 10;</code>
     */
    private $lineups;
    /**
     * A combination of entity, category and user interest attributes defining the
     * audience. The combination has a logical AND-of-ORs structure: Attributes
     * within each InsightsAudienceAttributeGroup are combined with OR, and
     * the combinations themselves are combined together with AND.  For example,
     * the expression (Entity OR Affinity) AND (In-Market OR Category) can be
     * formed using two InsightsAudienceAttributeGroups with two Attributes
     * each.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v20.services.InsightsAudienceAttributeGroup topic_audience_combinations = 8;</code>
     */
    private $topic_audience_combinations;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type array<\Google\Ads\GoogleAds\V20\Common\LocationInfo>|\Google\Protobuf\Internal\RepeatedField $country_locations
     *           Required. The countries for the audience.
     *     @type array<\Google\Ads\GoogleAds\V20\Common\LocationInfo>|\Google\Protobuf\Internal\RepeatedField $sub_country_locations
     *           Sub-country geographic location attributes.  If present, each of these
     *           must be contained in one of the countries in this audience.  If absent, the
     *           audience is geographically to the country_locations and no further.
     *     @type \Google\Ads\GoogleAds\V20\Common\GenderInfo $gender
     *           Gender for the audience.  If absent, the audience does not restrict by
     *           gender.
     *     @type array<\Google\Ads\GoogleAds\V20\Common\AgeRangeInfo>|\Google\Protobuf\Internal\RepeatedField $age_ranges
     *           Age ranges for the audience.  If absent, the audience represents all people
     *           over 18 that match the other attributes.
     *     @type \Google\Ads\GoogleAds\V20\Common\ParentalStatusInfo $parental_status
     *           Parental status for the audience.  If absent, the audience does not
     *           restrict by parental status.
     *     @type array<\Google\Ads\GoogleAds\V20\Common\IncomeRangeInfo>|\Google\Protobuf\Internal\RepeatedField $income_ranges
     *           Household income percentile ranges for the audience.  If absent, the
     *           audience does not restrict by household income range.
     *     @type array<\Google\Ads\GoogleAds\V20\Common\AudienceInsightsLineup>|\Google\Protobuf\Internal\RepeatedField $lineups
     *           Lineups representing the YouTube content viewed by the audience.
     *     @type array<\Google\Ads\GoogleAds\V20\Services\InsightsAudienceAttributeGroup>|\Google\Protobuf\Internal\RepeatedField $topic_audience_combinations
     *           A combination of entity, category and user interest attributes defining the
     *           audience. The combination has a logical AND-of-ORs structure: Attributes
     *           within each InsightsAudienceAttributeGroup are combined with OR, and
     *           the combinations themselves are combined together with AND.  For example,
     *           the expression (Entity OR Affinity) AND (In-Market OR Category) can be
     *           formed using two InsightsAudienceAttributeGroups with two Attributes
     *           each.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V20\Services\AudienceInsightsService::initOnce();
        parent::__construct($data);
    }

    /**
     * Required. The countries for the audience.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v20.common.LocationInfo country_locations = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getCountryLocations()
    {
        return $this->country_locations;
    }

    /**
     * Required. The countries for the audience.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v20.common.LocationInfo country_locations = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param array<\Google\Ads\GoogleAds\V20\Common\LocationInfo>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setCountryLocations($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Ads\GoogleAds\V20\Common\LocationInfo::class);
        $this->country_locations = $arr;

        return $this;
    }

    /**
     * Sub-country geographic location attributes.  If present, each of these
     * must be contained in one of the countries in this audience.  If absent, the
     * audience is geographically to the country_locations and no further.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v20.common.LocationInfo sub_country_locations = 2;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getSubCountryLocations()
    {
        return $this->sub_country_locations;
    }

    /**
     * Sub-country geographic location attributes.  If present, each of these
     * must be contained in one of the countries in this audience.  If absent, the
     * audience is geographically to the country_locations and no further.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v20.common.LocationInfo sub_country_locations = 2;</code>
     * @param array<\Google\Ads\GoogleAds\V20\Common\LocationInfo>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setSubCountryLocations($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Ads\GoogleAds\V20\Common\LocationInfo::class);
        $this->sub_country_locations = $arr;

        return $this;
    }

    /**
     * Gender for the audience.  If absent, the audience does not restrict by
     * gender.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.common.GenderInfo gender = 3;</code>
     * @return \Google\Ads\GoogleAds\V20\Common\GenderInfo|null
     */
    public function getGender()
    {
        return $this->gender;
    }

    public function hasGender()
    {
        return isset($this->gender);
    }

    public function clearGender()
    {
        unset($this->gender);
    }

    /**
     * Gender for the audience.  If absent, the audience does not restrict by
     * gender.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.common.GenderInfo gender = 3;</code>
     * @param \Google\Ads\GoogleAds\V20\Common\GenderInfo $var
     * @return $this
     */
    public function setGender($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V20\Common\GenderInfo::class);
        $this->gender = $var;

        return $this;
    }

    /**
     * Age ranges for the audience.  If absent, the audience represents all people
     * over 18 that match the other attributes.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v20.common.AgeRangeInfo age_ranges = 4;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getAgeRanges()
    {
        return $this->age_ranges;
    }

    /**
     * Age ranges for the audience.  If absent, the audience represents all people
     * over 18 that match the other attributes.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v20.common.AgeRangeInfo age_ranges = 4;</code>
     * @param array<\Google\Ads\GoogleAds\V20\Common\AgeRangeInfo>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setAgeRanges($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Ads\GoogleAds\V20\Common\AgeRangeInfo::class);
        $this->age_ranges = $arr;

        return $this;
    }

    /**
     * Parental status for the audience.  If absent, the audience does not
     * restrict by parental status.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.common.ParentalStatusInfo parental_status = 5;</code>
     * @return \Google\Ads\GoogleAds\V20\Common\ParentalStatusInfo|null
     */
    public function getParentalStatus()
    {
        return $this->parental_status;
    }

    public function hasParentalStatus()
    {
        return isset($this->parental_status);
    }

    public function clearParentalStatus()
    {
        unset($this->parental_status);
    }

    /**
     * Parental status for the audience.  If absent, the audience does not
     * restrict by parental status.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.common.ParentalStatusInfo parental_status = 5;</code>
     * @param \Google\Ads\GoogleAds\V20\Common\ParentalStatusInfo $var
     * @return $this
     */
    public function setParentalStatus($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V20\Common\ParentalStatusInfo::class);
        $this->parental_status = $var;

        return $this;
    }

    /**
     * Household income percentile ranges for the audience.  If absent, the
     * audience does not restrict by household income range.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v20.common.IncomeRangeInfo income_ranges = 6;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getIncomeRanges()
    {
        return $this->income_ranges;
    }

    /**
     * Household income percentile ranges for the audience.  If absent, the
     * audience does not restrict by household income range.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v20.common.IncomeRangeInfo income_ranges = 6;</code>
     * @param array<\Google\Ads\GoogleAds\V20\Common\IncomeRangeInfo>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setIncomeRanges($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Ads\GoogleAds\V20\Common\IncomeRangeInfo::class);
        $this->income_ranges = $arr;

        return $this;
    }

    /**
     * Lineups representing the YouTube content viewed by the audience.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v20.common.AudienceInsightsLineup lineups = 10;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getLineups()
    {
        return $this->lineups;
    }

    /**
     * Lineups representing the YouTube content viewed by the audience.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v20.common.AudienceInsightsLineup lineups = 10;</code>
     * @param array<\Google\Ads\GoogleAds\V20\Common\AudienceInsightsLineup>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setLineups($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Ads\GoogleAds\V20\Common\AudienceInsightsLineup::class);
        $this->lineups = $arr;

        return $this;
    }

    /**
     * A combination of entity, category and user interest attributes defining the
     * audience. The combination has a logical AND-of-ORs structure: Attributes
     * within each InsightsAudienceAttributeGroup are combined with OR, and
     * the combinations themselves are combined together with AND.  For example,
     * the expression (Entity OR Affinity) AND (In-Market OR Category) can be
     * formed using two InsightsAudienceAttributeGroups with two Attributes
     * each.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v20.services.InsightsAudienceAttributeGroup topic_audience_combinations = 8;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getTopicAudienceCombinations()
    {
        return $this->topic_audience_combinations;
    }

    /**
     * A combination of entity, category and user interest attributes defining the
     * audience. The combination has a logical AND-of-ORs structure: Attributes
     * within each InsightsAudienceAttributeGroup are combined with OR, and
     * the combinations themselves are combined together with AND.  For example,
     * the expression (Entity OR Affinity) AND (In-Market OR Category) can be
     * formed using two InsightsAudienceAttributeGroups with two Attributes
     * each.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v20.services.InsightsAudienceAttributeGroup topic_audience_combinations = 8;</code>
     * @param array<\Google\Ads\GoogleAds\V20\Services\InsightsAudienceAttributeGroup>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setTopicAudienceCombinations($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Ads\GoogleAds\V20\Services\InsightsAudienceAttributeGroup::class);
        $this->topic_audience_combinations = $arr;

        return $this;
    }

}

