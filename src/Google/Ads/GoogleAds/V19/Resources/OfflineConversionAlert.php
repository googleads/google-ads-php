<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/resources/offline_conversion_upload_client_summary.proto

namespace Google\Ads\GoogleAds\V19\Resources;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Alert for offline conversion client summary.
 *
 * Generated from protobuf message <code>google.ads.googleads.v19.resources.OfflineConversionAlert</code>
 */
class OfflineConversionAlert extends \Google\Protobuf\Internal\Message
{
    /**
     * Output only. Error for offline conversion client alert.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.resources.OfflineConversionError error = 1 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $error = null;
    /**
     * Output only. Percentage of the error, the range of this field should be
     * [0, 1.0].
     *
     * Generated from protobuf field <code>double error_percentage = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $error_percentage = 0.0;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Google\Ads\GoogleAds\V19\Resources\OfflineConversionError $error
     *           Output only. Error for offline conversion client alert.
     *     @type float $error_percentage
     *           Output only. Percentage of the error, the range of this field should be
     *           [0, 1.0].
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V19\Resources\OfflineConversionUploadClientSummary::initOnce();
        parent::__construct($data);
    }

    /**
     * Output only. Error for offline conversion client alert.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.resources.OfflineConversionError error = 1 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return \Google\Ads\GoogleAds\V19\Resources\OfflineConversionError|null
     */
    public function getError()
    {
        return $this->error;
    }

    public function hasError()
    {
        return isset($this->error);
    }

    public function clearError()
    {
        unset($this->error);
    }

    /**
     * Output only. Error for offline conversion client alert.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.resources.OfflineConversionError error = 1 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param \Google\Ads\GoogleAds\V19\Resources\OfflineConversionError $var
     * @return $this
     */
    public function setError($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V19\Resources\OfflineConversionError::class);
        $this->error = $var;

        return $this;
    }

    /**
     * Output only. Percentage of the error, the range of this field should be
     * [0, 1.0].
     *
     * Generated from protobuf field <code>double error_percentage = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return float
     */
    public function getErrorPercentage()
    {
        return $this->error_percentage;
    }

    /**
     * Output only. Percentage of the error, the range of this field should be
     * [0, 1.0].
     *
     * Generated from protobuf field <code>double error_percentage = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param float $var
     * @return $this
     */
    public function setErrorPercentage($var)
    {
        GPBUtil::checkDouble($var);
        $this->error_percentage = $var;

        return $this;
    }

}

