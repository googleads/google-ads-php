<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/enums/policy_topic_evidence_destination_mismatch_url_type.proto

namespace Google\Ads\GoogleAds\V20\Enums\PolicyTopicEvidenceDestinationMismatchUrlTypeEnum;

use UnexpectedValueException;

/**
 * The possible policy topic evidence destination mismatch url types.
 *
 * Protobuf type <code>google.ads.googleads.v20.enums.PolicyTopicEvidenceDestinationMismatchUrlTypeEnum.PolicyTopicEvidenceDestinationMismatchUrlType</code>
 */
class PolicyTopicEvidenceDestinationMismatchUrlType
{
    /**
     * No value has been specified.
     *
     * Generated from protobuf enum <code>UNSPECIFIED = 0;</code>
     */
    const UNSPECIFIED = 0;
    /**
     * The received value is not known in this version.
     * This is a response-only value.
     *
     * Generated from protobuf enum <code>UNKNOWN = 1;</code>
     */
    const UNKNOWN = 1;
    /**
     * The display url.
     *
     * Generated from protobuf enum <code>DISPLAY_URL = 2;</code>
     */
    const DISPLAY_URL = 2;
    /**
     * The final url.
     *
     * Generated from protobuf enum <code>FINAL_URL = 3;</code>
     */
    const FINAL_URL = 3;
    /**
     * The final mobile url.
     *
     * Generated from protobuf enum <code>FINAL_MOBILE_URL = 4;</code>
     */
    const FINAL_MOBILE_URL = 4;
    /**
     * The tracking url template, with substituted desktop url.
     *
     * Generated from protobuf enum <code>TRACKING_URL = 5;</code>
     */
    const TRACKING_URL = 5;
    /**
     * The tracking url template, with substituted mobile url.
     *
     * Generated from protobuf enum <code>MOBILE_TRACKING_URL = 6;</code>
     */
    const MOBILE_TRACKING_URL = 6;

    private static $valueToName = [
        self::UNSPECIFIED => 'UNSPECIFIED',
        self::UNKNOWN => 'UNKNOWN',
        self::DISPLAY_URL => 'DISPLAY_URL',
        self::FINAL_URL => 'FINAL_URL',
        self::FINAL_MOBILE_URL => 'FINAL_MOBILE_URL',
        self::TRACKING_URL => 'TRACKING_URL',
        self::MOBILE_TRACKING_URL => 'MOBILE_TRACKING_URL',
    ];

    public static function name($value)
    {
        if (!isset(self::$valueToName[$value])) {
            throw new UnexpectedValueException(sprintf(
                    'Enum %s has no name defined for value %s', __CLASS__, $value));
        }
        return self::$valueToName[$value];
    }


    public static function value($name)
    {
        $const = __CLASS__ . '::' . strtoupper($name);
        if (!defined($const)) {
            throw new UnexpectedValueException(sprintf(
                    'Enum %s has no value defined for name %s', __CLASS__, $name));
        }
        return constant($const);
    }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PolicyTopicEvidenceDestinationMismatchUrlType::class, \Google\Ads\GoogleAds\V20\Enums\PolicyTopicEvidenceDestinationMismatchUrlTypeEnum_PolicyTopicEvidenceDestinationMismatchUrlType::class);

