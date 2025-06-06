<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/resources/customer.proto

namespace Google\Ads\GoogleAds\V20\Resources;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Settings for Local Services customer.
 *
 * Generated from protobuf message <code>google.ads.googleads.v20.resources.LocalServicesSettings</code>
 */
class LocalServicesSettings extends \Google\Protobuf\Internal\Message
{
    /**
     * Output only. A read-only list of geo vertical level license statuses.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v20.resources.GranularLicenseStatus granular_license_statuses = 1 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $granular_license_statuses;
    /**
     * Output only. A read-only list of geo vertical level insurance statuses.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v20.resources.GranularInsuranceStatus granular_insurance_statuses = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $granular_insurance_statuses;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type array<\Google\Ads\GoogleAds\V20\Resources\GranularLicenseStatus>|\Google\Protobuf\Internal\RepeatedField $granular_license_statuses
     *           Output only. A read-only list of geo vertical level license statuses.
     *     @type array<\Google\Ads\GoogleAds\V20\Resources\GranularInsuranceStatus>|\Google\Protobuf\Internal\RepeatedField $granular_insurance_statuses
     *           Output only. A read-only list of geo vertical level insurance statuses.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V20\Resources\Customer::initOnce();
        parent::__construct($data);
    }

    /**
     * Output only. A read-only list of geo vertical level license statuses.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v20.resources.GranularLicenseStatus granular_license_statuses = 1 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getGranularLicenseStatuses()
    {
        return $this->granular_license_statuses;
    }

    /**
     * Output only. A read-only list of geo vertical level license statuses.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v20.resources.GranularLicenseStatus granular_license_statuses = 1 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param array<\Google\Ads\GoogleAds\V20\Resources\GranularLicenseStatus>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setGranularLicenseStatuses($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Ads\GoogleAds\V20\Resources\GranularLicenseStatus::class);
        $this->granular_license_statuses = $arr;

        return $this;
    }

    /**
     * Output only. A read-only list of geo vertical level insurance statuses.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v20.resources.GranularInsuranceStatus granular_insurance_statuses = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getGranularInsuranceStatuses()
    {
        return $this->granular_insurance_statuses;
    }

    /**
     * Output only. A read-only list of geo vertical level insurance statuses.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v20.resources.GranularInsuranceStatus granular_insurance_statuses = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param array<\Google\Ads\GoogleAds\V20\Resources\GranularInsuranceStatus>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setGranularInsuranceStatuses($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Ads\GoogleAds\V20\Resources\GranularInsuranceStatus::class);
        $this->granular_insurance_statuses = $arr;

        return $this;
    }

}

