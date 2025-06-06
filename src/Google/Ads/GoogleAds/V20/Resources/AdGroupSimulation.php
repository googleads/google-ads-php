<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/resources/ad_group_simulation.proto

namespace Google\Ads\GoogleAds\V20\Resources;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * An ad group simulation. Supported combinations of advertising
 * channel type, simulation type and simulation modification method is
 * detailed below respectively.
 * 1. SEARCH - CPC_BID - DEFAULT
 * 2. SEARCH - CPC_BID - UNIFORM
 * 3. SEARCH - TARGET_CPA - UNIFORM
 * 4. SEARCH - TARGET_ROAS - UNIFORM
 * 5. DISPLAY - CPC_BID - DEFAULT
 * 6. DISPLAY - CPC_BID - UNIFORM
 * 7. DISPLAY - TARGET_CPA - UNIFORM
 *
 * Generated from protobuf message <code>google.ads.googleads.v20.resources.AdGroupSimulation</code>
 */
class AdGroupSimulation extends \Google\Protobuf\Internal\Message
{
    /**
     * Output only. The resource name of the ad group simulation.
     * Ad group simulation resource names have the form:
     * `customers/{customer_id}/adGroupSimulations/{ad_group_id}~{type}~{modification_method}~{start_date}~{end_date}`
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     */
    protected $resource_name = '';
    /**
     * Output only. Ad group id of the simulation.
     *
     * Generated from protobuf field <code>optional int64 ad_group_id = 12 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $ad_group_id = null;
    /**
     * Output only. The field that the simulation modifies.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.enums.SimulationTypeEnum.SimulationType type = 3 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $type = 0;
    /**
     * Output only. How the simulation modifies the field.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.enums.SimulationModificationMethodEnum.SimulationModificationMethod modification_method = 4 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $modification_method = 0;
    /**
     * Output only. First day on which the simulation is based, in YYYY-MM-DD
     * format.
     *
     * Generated from protobuf field <code>optional string start_date = 13 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $start_date = null;
    /**
     * Output only. Last day on which the simulation is based, in YYYY-MM-DD
     * format
     *
     * Generated from protobuf field <code>optional string end_date = 14 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $end_date = null;
    protected $point_list;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $resource_name
     *           Output only. The resource name of the ad group simulation.
     *           Ad group simulation resource names have the form:
     *           `customers/{customer_id}/adGroupSimulations/{ad_group_id}~{type}~{modification_method}~{start_date}~{end_date}`
     *     @type int|string $ad_group_id
     *           Output only. Ad group id of the simulation.
     *     @type int $type
     *           Output only. The field that the simulation modifies.
     *     @type int $modification_method
     *           Output only. How the simulation modifies the field.
     *     @type string $start_date
     *           Output only. First day on which the simulation is based, in YYYY-MM-DD
     *           format.
     *     @type string $end_date
     *           Output only. Last day on which the simulation is based, in YYYY-MM-DD
     *           format
     *     @type \Google\Ads\GoogleAds\V20\Common\CpcBidSimulationPointList $cpc_bid_point_list
     *           Output only. Simulation points if the simulation type is CPC_BID.
     *     @type \Google\Ads\GoogleAds\V20\Common\CpvBidSimulationPointList $cpv_bid_point_list
     *           Output only. Simulation points if the simulation type is CPV_BID.
     *     @type \Google\Ads\GoogleAds\V20\Common\TargetCpaSimulationPointList $target_cpa_point_list
     *           Output only. Simulation points if the simulation type is TARGET_CPA.
     *     @type \Google\Ads\GoogleAds\V20\Common\TargetRoasSimulationPointList $target_roas_point_list
     *           Output only. Simulation points if the simulation type is TARGET_ROAS.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V20\Resources\AdGroupSimulation::initOnce();
        parent::__construct($data);
    }

    /**
     * Output only. The resource name of the ad group simulation.
     * Ad group simulation resource names have the form:
     * `customers/{customer_id}/adGroupSimulations/{ad_group_id}~{type}~{modification_method}~{start_date}~{end_date}`
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getResourceName()
    {
        return $this->resource_name;
    }

    /**
     * Output only. The resource name of the ad group simulation.
     * Ad group simulation resource names have the form:
     * `customers/{customer_id}/adGroupSimulations/{ad_group_id}~{type}~{modification_method}~{start_date}~{end_date}`
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
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
     * Output only. Ad group id of the simulation.
     *
     * Generated from protobuf field <code>optional int64 ad_group_id = 12 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return int|string
     */
    public function getAdGroupId()
    {
        return isset($this->ad_group_id) ? $this->ad_group_id : 0;
    }

    public function hasAdGroupId()
    {
        return isset($this->ad_group_id);
    }

    public function clearAdGroupId()
    {
        unset($this->ad_group_id);
    }

    /**
     * Output only. Ad group id of the simulation.
     *
     * Generated from protobuf field <code>optional int64 ad_group_id = 12 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param int|string $var
     * @return $this
     */
    public function setAdGroupId($var)
    {
        GPBUtil::checkInt64($var);
        $this->ad_group_id = $var;

        return $this;
    }

    /**
     * Output only. The field that the simulation modifies.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.enums.SimulationTypeEnum.SimulationType type = 3 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return int
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Output only. The field that the simulation modifies.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.enums.SimulationTypeEnum.SimulationType type = 3 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param int $var
     * @return $this
     */
    public function setType($var)
    {
        GPBUtil::checkEnum($var, \Google\Ads\GoogleAds\V20\Enums\SimulationTypeEnum\SimulationType::class);
        $this->type = $var;

        return $this;
    }

    /**
     * Output only. How the simulation modifies the field.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.enums.SimulationModificationMethodEnum.SimulationModificationMethod modification_method = 4 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return int
     */
    public function getModificationMethod()
    {
        return $this->modification_method;
    }

    /**
     * Output only. How the simulation modifies the field.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.enums.SimulationModificationMethodEnum.SimulationModificationMethod modification_method = 4 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param int $var
     * @return $this
     */
    public function setModificationMethod($var)
    {
        GPBUtil::checkEnum($var, \Google\Ads\GoogleAds\V20\Enums\SimulationModificationMethodEnum\SimulationModificationMethod::class);
        $this->modification_method = $var;

        return $this;
    }

    /**
     * Output only. First day on which the simulation is based, in YYYY-MM-DD
     * format.
     *
     * Generated from protobuf field <code>optional string start_date = 13 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return string
     */
    public function getStartDate()
    {
        return isset($this->start_date) ? $this->start_date : '';
    }

    public function hasStartDate()
    {
        return isset($this->start_date);
    }

    public function clearStartDate()
    {
        unset($this->start_date);
    }

    /**
     * Output only. First day on which the simulation is based, in YYYY-MM-DD
     * format.
     *
     * Generated from protobuf field <code>optional string start_date = 13 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param string $var
     * @return $this
     */
    public function setStartDate($var)
    {
        GPBUtil::checkString($var, True);
        $this->start_date = $var;

        return $this;
    }

    /**
     * Output only. Last day on which the simulation is based, in YYYY-MM-DD
     * format
     *
     * Generated from protobuf field <code>optional string end_date = 14 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return string
     */
    public function getEndDate()
    {
        return isset($this->end_date) ? $this->end_date : '';
    }

    public function hasEndDate()
    {
        return isset($this->end_date);
    }

    public function clearEndDate()
    {
        unset($this->end_date);
    }

    /**
     * Output only. Last day on which the simulation is based, in YYYY-MM-DD
     * format
     *
     * Generated from protobuf field <code>optional string end_date = 14 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param string $var
     * @return $this
     */
    public function setEndDate($var)
    {
        GPBUtil::checkString($var, True);
        $this->end_date = $var;

        return $this;
    }

    /**
     * Output only. Simulation points if the simulation type is CPC_BID.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.common.CpcBidSimulationPointList cpc_bid_point_list = 8 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return \Google\Ads\GoogleAds\V20\Common\CpcBidSimulationPointList|null
     */
    public function getCpcBidPointList()
    {
        return $this->readOneof(8);
    }

    public function hasCpcBidPointList()
    {
        return $this->hasOneof(8);
    }

    /**
     * Output only. Simulation points if the simulation type is CPC_BID.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.common.CpcBidSimulationPointList cpc_bid_point_list = 8 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param \Google\Ads\GoogleAds\V20\Common\CpcBidSimulationPointList $var
     * @return $this
     */
    public function setCpcBidPointList($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V20\Common\CpcBidSimulationPointList::class);
        $this->writeOneof(8, $var);

        return $this;
    }

    /**
     * Output only. Simulation points if the simulation type is CPV_BID.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.common.CpvBidSimulationPointList cpv_bid_point_list = 10 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return \Google\Ads\GoogleAds\V20\Common\CpvBidSimulationPointList|null
     */
    public function getCpvBidPointList()
    {
        return $this->readOneof(10);
    }

    public function hasCpvBidPointList()
    {
        return $this->hasOneof(10);
    }

    /**
     * Output only. Simulation points if the simulation type is CPV_BID.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.common.CpvBidSimulationPointList cpv_bid_point_list = 10 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param \Google\Ads\GoogleAds\V20\Common\CpvBidSimulationPointList $var
     * @return $this
     */
    public function setCpvBidPointList($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V20\Common\CpvBidSimulationPointList::class);
        $this->writeOneof(10, $var);

        return $this;
    }

    /**
     * Output only. Simulation points if the simulation type is TARGET_CPA.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.common.TargetCpaSimulationPointList target_cpa_point_list = 9 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return \Google\Ads\GoogleAds\V20\Common\TargetCpaSimulationPointList|null
     */
    public function getTargetCpaPointList()
    {
        return $this->readOneof(9);
    }

    public function hasTargetCpaPointList()
    {
        return $this->hasOneof(9);
    }

    /**
     * Output only. Simulation points if the simulation type is TARGET_CPA.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.common.TargetCpaSimulationPointList target_cpa_point_list = 9 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param \Google\Ads\GoogleAds\V20\Common\TargetCpaSimulationPointList $var
     * @return $this
     */
    public function setTargetCpaPointList($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V20\Common\TargetCpaSimulationPointList::class);
        $this->writeOneof(9, $var);

        return $this;
    }

    /**
     * Output only. Simulation points if the simulation type is TARGET_ROAS.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.common.TargetRoasSimulationPointList target_roas_point_list = 11 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return \Google\Ads\GoogleAds\V20\Common\TargetRoasSimulationPointList|null
     */
    public function getTargetRoasPointList()
    {
        return $this->readOneof(11);
    }

    public function hasTargetRoasPointList()
    {
        return $this->hasOneof(11);
    }

    /**
     * Output only. Simulation points if the simulation type is TARGET_ROAS.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.common.TargetRoasSimulationPointList target_roas_point_list = 11 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param \Google\Ads\GoogleAds\V20\Common\TargetRoasSimulationPointList $var
     * @return $this
     */
    public function setTargetRoasPointList($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V20\Common\TargetRoasSimulationPointList::class);
        $this->writeOneof(11, $var);

        return $this;
    }

    /**
     * @return string
     */
    public function getPointList()
    {
        return $this->whichOneof("point_list");
    }

}

