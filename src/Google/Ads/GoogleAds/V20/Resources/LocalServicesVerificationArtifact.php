<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/resources/local_services_verification_artifact.proto

namespace Google\Ads\GoogleAds\V20\Resources;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * A local services verification resource.
 *
 * Generated from protobuf message <code>google.ads.googleads.v20.resources.LocalServicesVerificationArtifact</code>
 */
class LocalServicesVerificationArtifact extends \Google\Protobuf\Internal\Message
{
    /**
     * Immutable. The resource name of the Local Services Verification.
     * Local Services Verification resource names have the form:
     * `customers/{customer_id}/localServicesVerificationArtifacts/{verification_artifact_id}`
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.field_behavior) = IMMUTABLE, (.google.api.resource_reference) = {</code>
     */
    protected $resource_name = '';
    /**
     * Output only. The ID of the verification artifact.
     *
     * Generated from protobuf field <code>optional int64 id = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $id = null;
    /**
     * Output only. The timestamp when this verification artifact was created.
     * The format is "YYYY-MM-DD HH:MM:SS" in the Google Ads account's timezone.
     * Examples: "2018-03-05 09:15:00" or "2018-02-01 14:34:30"
     *
     * Generated from protobuf field <code>string creation_date_time = 3 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $creation_date_time = '';
    /**
     * Output only. The status of the verification artifact.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.enums.LocalServicesVerificationArtifactStatusEnum.LocalServicesVerificationArtifactStatus status = 4 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $status = 0;
    /**
     * Output only. The type of the verification artifact.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.enums.LocalServicesVerificationArtifactTypeEnum.LocalServicesVerificationArtifactType artifact_type = 5 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $artifact_type = 0;
    protected $artifact_data;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $resource_name
     *           Immutable. The resource name of the Local Services Verification.
     *           Local Services Verification resource names have the form:
     *           `customers/{customer_id}/localServicesVerificationArtifacts/{verification_artifact_id}`
     *     @type int|string $id
     *           Output only. The ID of the verification artifact.
     *     @type string $creation_date_time
     *           Output only. The timestamp when this verification artifact was created.
     *           The format is "YYYY-MM-DD HH:MM:SS" in the Google Ads account's timezone.
     *           Examples: "2018-03-05 09:15:00" or "2018-02-01 14:34:30"
     *     @type int $status
     *           Output only. The status of the verification artifact.
     *     @type int $artifact_type
     *           Output only. The type of the verification artifact.
     *     @type \Google\Ads\GoogleAds\V20\Resources\BackgroundCheckVerificationArtifact $background_check_verification_artifact
     *           Output only. A background check verification artifact.
     *     @type \Google\Ads\GoogleAds\V20\Resources\InsuranceVerificationArtifact $insurance_verification_artifact
     *           Output only. An insurance verification artifact.
     *     @type \Google\Ads\GoogleAds\V20\Resources\LicenseVerificationArtifact $license_verification_artifact
     *           Output only. A license verification artifact.
     *     @type \Google\Ads\GoogleAds\V20\Resources\BusinessRegistrationCheckVerificationArtifact $business_registration_check_verification_artifact
     *           Output only. A business registration check verification artifact.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V20\Resources\LocalServicesVerificationArtifact::initOnce();
        parent::__construct($data);
    }

    /**
     * Immutable. The resource name of the Local Services Verification.
     * Local Services Verification resource names have the form:
     * `customers/{customer_id}/localServicesVerificationArtifacts/{verification_artifact_id}`
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.field_behavior) = IMMUTABLE, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getResourceName()
    {
        return $this->resource_name;
    }

    /**
     * Immutable. The resource name of the Local Services Verification.
     * Local Services Verification resource names have the form:
     * `customers/{customer_id}/localServicesVerificationArtifacts/{verification_artifact_id}`
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
     * Output only. The ID of the verification artifact.
     *
     * Generated from protobuf field <code>optional int64 id = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return int|string
     */
    public function getId()
    {
        return isset($this->id) ? $this->id : 0;
    }

    public function hasId()
    {
        return isset($this->id);
    }

    public function clearId()
    {
        unset($this->id);
    }

    /**
     * Output only. The ID of the verification artifact.
     *
     * Generated from protobuf field <code>optional int64 id = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param int|string $var
     * @return $this
     */
    public function setId($var)
    {
        GPBUtil::checkInt64($var);
        $this->id = $var;

        return $this;
    }

    /**
     * Output only. The timestamp when this verification artifact was created.
     * The format is "YYYY-MM-DD HH:MM:SS" in the Google Ads account's timezone.
     * Examples: "2018-03-05 09:15:00" or "2018-02-01 14:34:30"
     *
     * Generated from protobuf field <code>string creation_date_time = 3 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return string
     */
    public function getCreationDateTime()
    {
        return $this->creation_date_time;
    }

    /**
     * Output only. The timestamp when this verification artifact was created.
     * The format is "YYYY-MM-DD HH:MM:SS" in the Google Ads account's timezone.
     * Examples: "2018-03-05 09:15:00" or "2018-02-01 14:34:30"
     *
     * Generated from protobuf field <code>string creation_date_time = 3 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param string $var
     * @return $this
     */
    public function setCreationDateTime($var)
    {
        GPBUtil::checkString($var, True);
        $this->creation_date_time = $var;

        return $this;
    }

    /**
     * Output only. The status of the verification artifact.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.enums.LocalServicesVerificationArtifactStatusEnum.LocalServicesVerificationArtifactStatus status = 4 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Output only. The status of the verification artifact.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.enums.LocalServicesVerificationArtifactStatusEnum.LocalServicesVerificationArtifactStatus status = 4 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param int $var
     * @return $this
     */
    public function setStatus($var)
    {
        GPBUtil::checkEnum($var, \Google\Ads\GoogleAds\V20\Enums\LocalServicesVerificationArtifactStatusEnum\LocalServicesVerificationArtifactStatus::class);
        $this->status = $var;

        return $this;
    }

    /**
     * Output only. The type of the verification artifact.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.enums.LocalServicesVerificationArtifactTypeEnum.LocalServicesVerificationArtifactType artifact_type = 5 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return int
     */
    public function getArtifactType()
    {
        return $this->artifact_type;
    }

    /**
     * Output only. The type of the verification artifact.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.enums.LocalServicesVerificationArtifactTypeEnum.LocalServicesVerificationArtifactType artifact_type = 5 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param int $var
     * @return $this
     */
    public function setArtifactType($var)
    {
        GPBUtil::checkEnum($var, \Google\Ads\GoogleAds\V20\Enums\LocalServicesVerificationArtifactTypeEnum\LocalServicesVerificationArtifactType::class);
        $this->artifact_type = $var;

        return $this;
    }

    /**
     * Output only. A background check verification artifact.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.resources.BackgroundCheckVerificationArtifact background_check_verification_artifact = 6 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return \Google\Ads\GoogleAds\V20\Resources\BackgroundCheckVerificationArtifact|null
     */
    public function getBackgroundCheckVerificationArtifact()
    {
        return $this->readOneof(6);
    }

    public function hasBackgroundCheckVerificationArtifact()
    {
        return $this->hasOneof(6);
    }

    /**
     * Output only. A background check verification artifact.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.resources.BackgroundCheckVerificationArtifact background_check_verification_artifact = 6 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param \Google\Ads\GoogleAds\V20\Resources\BackgroundCheckVerificationArtifact $var
     * @return $this
     */
    public function setBackgroundCheckVerificationArtifact($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V20\Resources\BackgroundCheckVerificationArtifact::class);
        $this->writeOneof(6, $var);

        return $this;
    }

    /**
     * Output only. An insurance verification artifact.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.resources.InsuranceVerificationArtifact insurance_verification_artifact = 7 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return \Google\Ads\GoogleAds\V20\Resources\InsuranceVerificationArtifact|null
     */
    public function getInsuranceVerificationArtifact()
    {
        return $this->readOneof(7);
    }

    public function hasInsuranceVerificationArtifact()
    {
        return $this->hasOneof(7);
    }

    /**
     * Output only. An insurance verification artifact.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.resources.InsuranceVerificationArtifact insurance_verification_artifact = 7 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param \Google\Ads\GoogleAds\V20\Resources\InsuranceVerificationArtifact $var
     * @return $this
     */
    public function setInsuranceVerificationArtifact($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V20\Resources\InsuranceVerificationArtifact::class);
        $this->writeOneof(7, $var);

        return $this;
    }

    /**
     * Output only. A license verification artifact.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.resources.LicenseVerificationArtifact license_verification_artifact = 8 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return \Google\Ads\GoogleAds\V20\Resources\LicenseVerificationArtifact|null
     */
    public function getLicenseVerificationArtifact()
    {
        return $this->readOneof(8);
    }

    public function hasLicenseVerificationArtifact()
    {
        return $this->hasOneof(8);
    }

    /**
     * Output only. A license verification artifact.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.resources.LicenseVerificationArtifact license_verification_artifact = 8 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param \Google\Ads\GoogleAds\V20\Resources\LicenseVerificationArtifact $var
     * @return $this
     */
    public function setLicenseVerificationArtifact($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V20\Resources\LicenseVerificationArtifact::class);
        $this->writeOneof(8, $var);

        return $this;
    }

    /**
     * Output only. A business registration check verification artifact.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.resources.BusinessRegistrationCheckVerificationArtifact business_registration_check_verification_artifact = 9 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return \Google\Ads\GoogleAds\V20\Resources\BusinessRegistrationCheckVerificationArtifact|null
     */
    public function getBusinessRegistrationCheckVerificationArtifact()
    {
        return $this->readOneof(9);
    }

    public function hasBusinessRegistrationCheckVerificationArtifact()
    {
        return $this->hasOneof(9);
    }

    /**
     * Output only. A business registration check verification artifact.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.resources.BusinessRegistrationCheckVerificationArtifact business_registration_check_verification_artifact = 9 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param \Google\Ads\GoogleAds\V20\Resources\BusinessRegistrationCheckVerificationArtifact $var
     * @return $this
     */
    public function setBusinessRegistrationCheckVerificationArtifact($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V20\Resources\BusinessRegistrationCheckVerificationArtifact::class);
        $this->writeOneof(9, $var);

        return $this;
    }

    /**
     * @return string
     */
    public function getArtifactData()
    {
        return $this->whichOneof("artifact_data");
    }

}

