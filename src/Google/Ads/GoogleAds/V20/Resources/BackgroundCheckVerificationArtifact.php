<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/resources/local_services_verification_artifact.proto

namespace Google\Ads\GoogleAds\V20\Resources;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * A proto holding information specific to local services background check.
 *
 * Generated from protobuf message <code>google.ads.googleads.v20.resources.BackgroundCheckVerificationArtifact</code>
 */
class BackgroundCheckVerificationArtifact extends \Google\Protobuf\Internal\Message
{
    /**
     * Output only. URL to access background case.
     *
     * Generated from protobuf field <code>optional string case_url = 1 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $case_url = null;
    /**
     * Output only. The timestamp when this background check case result was
     * adjudicated. The format is "YYYY-MM-DD HH:MM:SS" in the Google Ads
     * account's timezone. Examples: "2018-03-05 09:15:00" or "2018-02-01
     * 14:34:30"
     *
     * Generated from protobuf field <code>optional string final_adjudication_date_time = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $final_adjudication_date_time = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $case_url
     *           Output only. URL to access background case.
     *     @type string $final_adjudication_date_time
     *           Output only. The timestamp when this background check case result was
     *           adjudicated. The format is "YYYY-MM-DD HH:MM:SS" in the Google Ads
     *           account's timezone. Examples: "2018-03-05 09:15:00" or "2018-02-01
     *           14:34:30"
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V20\Resources\LocalServicesVerificationArtifact::initOnce();
        parent::__construct($data);
    }

    /**
     * Output only. URL to access background case.
     *
     * Generated from protobuf field <code>optional string case_url = 1 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return string
     */
    public function getCaseUrl()
    {
        return isset($this->case_url) ? $this->case_url : '';
    }

    public function hasCaseUrl()
    {
        return isset($this->case_url);
    }

    public function clearCaseUrl()
    {
        unset($this->case_url);
    }

    /**
     * Output only. URL to access background case.
     *
     * Generated from protobuf field <code>optional string case_url = 1 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param string $var
     * @return $this
     */
    public function setCaseUrl($var)
    {
        GPBUtil::checkString($var, True);
        $this->case_url = $var;

        return $this;
    }

    /**
     * Output only. The timestamp when this background check case result was
     * adjudicated. The format is "YYYY-MM-DD HH:MM:SS" in the Google Ads
     * account's timezone. Examples: "2018-03-05 09:15:00" or "2018-02-01
     * 14:34:30"
     *
     * Generated from protobuf field <code>optional string final_adjudication_date_time = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return string
     */
    public function getFinalAdjudicationDateTime()
    {
        return isset($this->final_adjudication_date_time) ? $this->final_adjudication_date_time : '';
    }

    public function hasFinalAdjudicationDateTime()
    {
        return isset($this->final_adjudication_date_time);
    }

    public function clearFinalAdjudicationDateTime()
    {
        unset($this->final_adjudication_date_time);
    }

    /**
     * Output only. The timestamp when this background check case result was
     * adjudicated. The format is "YYYY-MM-DD HH:MM:SS" in the Google Ads
     * account's timezone. Examples: "2018-03-05 09:15:00" or "2018-02-01
     * 14:34:30"
     *
     * Generated from protobuf field <code>optional string final_adjudication_date_time = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param string $var
     * @return $this
     */
    public function setFinalAdjudicationDateTime($var)
    {
        GPBUtil::checkString($var, True);
        $this->final_adjudication_date_time = $var;

        return $this;
    }

}

