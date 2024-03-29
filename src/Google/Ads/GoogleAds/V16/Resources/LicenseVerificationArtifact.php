<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v16/resources/local_services_verification_artifact.proto

namespace Google\Ads\GoogleAds\V16\Resources;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * A proto holding information specific to a local services license.
 *
 * Generated from protobuf message <code>google.ads.googleads.v16.resources.LicenseVerificationArtifact</code>
 */
class LicenseVerificationArtifact extends \Google\Protobuf\Internal\Message
{
    /**
     * Output only. License type / name.
     *
     * Generated from protobuf field <code>optional string license_type = 1 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $license_type = null;
    /**
     * Output only. License number.
     *
     * Generated from protobuf field <code>optional string license_number = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $license_number = null;
    /**
     * Output only. First name of the licensee.
     *
     * Generated from protobuf field <code>optional string licensee_first_name = 3 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $licensee_first_name = null;
    /**
     * Output only. Last name of the licensee.
     *
     * Generated from protobuf field <code>optional string licensee_last_name = 4 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $licensee_last_name = null;
    /**
     * Output only. License rejection reason.
     *
     * Generated from protobuf field <code>optional .google.ads.googleads.v16.enums.LocalServicesLicenseRejectionReasonEnum.LocalServicesLicenseRejectionReason rejection_reason = 5 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $rejection_reason = null;
    /**
     * Output only. The readonly field containing the information for an uploaded
     * license document.
     *
     * Generated from protobuf field <code>optional .google.ads.googleads.v16.common.LocalServicesDocumentReadOnly license_document_readonly = 6 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $license_document_readonly = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $license_type
     *           Output only. License type / name.
     *     @type string $license_number
     *           Output only. License number.
     *     @type string $licensee_first_name
     *           Output only. First name of the licensee.
     *     @type string $licensee_last_name
     *           Output only. Last name of the licensee.
     *     @type int $rejection_reason
     *           Output only. License rejection reason.
     *     @type \Google\Ads\GoogleAds\V16\Common\LocalServicesDocumentReadOnly $license_document_readonly
     *           Output only. The readonly field containing the information for an uploaded
     *           license document.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V16\Resources\LocalServicesVerificationArtifact::initOnce();
        parent::__construct($data);
    }

    /**
     * Output only. License type / name.
     *
     * Generated from protobuf field <code>optional string license_type = 1 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return string
     */
    public function getLicenseType()
    {
        return isset($this->license_type) ? $this->license_type : '';
    }

    public function hasLicenseType()
    {
        return isset($this->license_type);
    }

    public function clearLicenseType()
    {
        unset($this->license_type);
    }

    /**
     * Output only. License type / name.
     *
     * Generated from protobuf field <code>optional string license_type = 1 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param string $var
     * @return $this
     */
    public function setLicenseType($var)
    {
        GPBUtil::checkString($var, True);
        $this->license_type = $var;

        return $this;
    }

    /**
     * Output only. License number.
     *
     * Generated from protobuf field <code>optional string license_number = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return string
     */
    public function getLicenseNumber()
    {
        return isset($this->license_number) ? $this->license_number : '';
    }

    public function hasLicenseNumber()
    {
        return isset($this->license_number);
    }

    public function clearLicenseNumber()
    {
        unset($this->license_number);
    }

    /**
     * Output only. License number.
     *
     * Generated from protobuf field <code>optional string license_number = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param string $var
     * @return $this
     */
    public function setLicenseNumber($var)
    {
        GPBUtil::checkString($var, True);
        $this->license_number = $var;

        return $this;
    }

    /**
     * Output only. First name of the licensee.
     *
     * Generated from protobuf field <code>optional string licensee_first_name = 3 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return string
     */
    public function getLicenseeFirstName()
    {
        return isset($this->licensee_first_name) ? $this->licensee_first_name : '';
    }

    public function hasLicenseeFirstName()
    {
        return isset($this->licensee_first_name);
    }

    public function clearLicenseeFirstName()
    {
        unset($this->licensee_first_name);
    }

    /**
     * Output only. First name of the licensee.
     *
     * Generated from protobuf field <code>optional string licensee_first_name = 3 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param string $var
     * @return $this
     */
    public function setLicenseeFirstName($var)
    {
        GPBUtil::checkString($var, True);
        $this->licensee_first_name = $var;

        return $this;
    }

    /**
     * Output only. Last name of the licensee.
     *
     * Generated from protobuf field <code>optional string licensee_last_name = 4 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return string
     */
    public function getLicenseeLastName()
    {
        return isset($this->licensee_last_name) ? $this->licensee_last_name : '';
    }

    public function hasLicenseeLastName()
    {
        return isset($this->licensee_last_name);
    }

    public function clearLicenseeLastName()
    {
        unset($this->licensee_last_name);
    }

    /**
     * Output only. Last name of the licensee.
     *
     * Generated from protobuf field <code>optional string licensee_last_name = 4 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param string $var
     * @return $this
     */
    public function setLicenseeLastName($var)
    {
        GPBUtil::checkString($var, True);
        $this->licensee_last_name = $var;

        return $this;
    }

    /**
     * Output only. License rejection reason.
     *
     * Generated from protobuf field <code>optional .google.ads.googleads.v16.enums.LocalServicesLicenseRejectionReasonEnum.LocalServicesLicenseRejectionReason rejection_reason = 5 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return int
     */
    public function getRejectionReason()
    {
        return isset($this->rejection_reason) ? $this->rejection_reason : 0;
    }

    public function hasRejectionReason()
    {
        return isset($this->rejection_reason);
    }

    public function clearRejectionReason()
    {
        unset($this->rejection_reason);
    }

    /**
     * Output only. License rejection reason.
     *
     * Generated from protobuf field <code>optional .google.ads.googleads.v16.enums.LocalServicesLicenseRejectionReasonEnum.LocalServicesLicenseRejectionReason rejection_reason = 5 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param int $var
     * @return $this
     */
    public function setRejectionReason($var)
    {
        GPBUtil::checkEnum($var, \Google\Ads\GoogleAds\V16\Enums\LocalServicesLicenseRejectionReasonEnum\LocalServicesLicenseRejectionReason::class);
        $this->rejection_reason = $var;

        return $this;
    }

    /**
     * Output only. The readonly field containing the information for an uploaded
     * license document.
     *
     * Generated from protobuf field <code>optional .google.ads.googleads.v16.common.LocalServicesDocumentReadOnly license_document_readonly = 6 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return \Google\Ads\GoogleAds\V16\Common\LocalServicesDocumentReadOnly|null
     */
    public function getLicenseDocumentReadonly()
    {
        return $this->license_document_readonly;
    }

    public function hasLicenseDocumentReadonly()
    {
        return isset($this->license_document_readonly);
    }

    public function clearLicenseDocumentReadonly()
    {
        unset($this->license_document_readonly);
    }

    /**
     * Output only. The readonly field containing the information for an uploaded
     * license document.
     *
     * Generated from protobuf field <code>optional .google.ads.googleads.v16.common.LocalServicesDocumentReadOnly license_document_readonly = 6 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param \Google\Ads\GoogleAds\V16\Common\LocalServicesDocumentReadOnly $var
     * @return $this
     */
    public function setLicenseDocumentReadonly($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V16\Common\LocalServicesDocumentReadOnly::class);
        $this->license_document_readonly = $var;

        return $this;
    }

}

