<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/errors/campaign_draft_error.proto

namespace Google\Ads\GoogleAds\V20\Errors\CampaignDraftErrorEnum;

use UnexpectedValueException;

/**
 * Enum describing possible campaign draft errors.
 *
 * Protobuf type <code>google.ads.googleads.v20.errors.CampaignDraftErrorEnum.CampaignDraftError</code>
 */
class CampaignDraftError
{
    /**
     * Enum unspecified.
     *
     * Generated from protobuf enum <code>UNSPECIFIED = 0;</code>
     */
    const UNSPECIFIED = 0;
    /**
     * The received error code is not known in this version.
     *
     * Generated from protobuf enum <code>UNKNOWN = 1;</code>
     */
    const UNKNOWN = 1;
    /**
     * A draft with this name already exists for this campaign.
     *
     * Generated from protobuf enum <code>DUPLICATE_DRAFT_NAME = 2;</code>
     */
    const DUPLICATE_DRAFT_NAME = 2;
    /**
     * The draft is removed and cannot be transitioned to another status.
     *
     * Generated from protobuf enum <code>INVALID_STATUS_TRANSITION_FROM_REMOVED = 3;</code>
     */
    const INVALID_STATUS_TRANSITION_FROM_REMOVED = 3;
    /**
     * The draft has been promoted and cannot be transitioned to the specified
     * status.
     *
     * Generated from protobuf enum <code>INVALID_STATUS_TRANSITION_FROM_PROMOTED = 4;</code>
     */
    const INVALID_STATUS_TRANSITION_FROM_PROMOTED = 4;
    /**
     * The draft has failed to be promoted and cannot be transitioned to the
     * specified status.
     *
     * Generated from protobuf enum <code>INVALID_STATUS_TRANSITION_FROM_PROMOTE_FAILED = 5;</code>
     */
    const INVALID_STATUS_TRANSITION_FROM_PROMOTE_FAILED = 5;
    /**
     * This customer is not allowed to create drafts.
     *
     * Generated from protobuf enum <code>CUSTOMER_CANNOT_CREATE_DRAFT = 6;</code>
     */
    const CUSTOMER_CANNOT_CREATE_DRAFT = 6;
    /**
     * This campaign is not allowed to create drafts.
     *
     * Generated from protobuf enum <code>CAMPAIGN_CANNOT_CREATE_DRAFT = 7;</code>
     */
    const CAMPAIGN_CANNOT_CREATE_DRAFT = 7;
    /**
     * This modification cannot be made on a draft.
     *
     * Generated from protobuf enum <code>INVALID_DRAFT_CHANGE = 8;</code>
     */
    const INVALID_DRAFT_CHANGE = 8;
    /**
     * The draft cannot be transitioned to the specified status from its
     * current status.
     *
     * Generated from protobuf enum <code>INVALID_STATUS_TRANSITION = 9;</code>
     */
    const INVALID_STATUS_TRANSITION = 9;
    /**
     * The campaign has reached the maximum number of drafts that can be created
     * for a campaign throughout its lifetime. No additional drafts can be
     * created for this campaign. Removed drafts also count towards this limit.
     *
     * Generated from protobuf enum <code>MAX_NUMBER_OF_DRAFTS_PER_CAMPAIGN_REACHED = 10;</code>
     */
    const MAX_NUMBER_OF_DRAFTS_PER_CAMPAIGN_REACHED = 10;
    /**
     * ListAsyncErrors was called without first promoting the draft.
     *
     * Generated from protobuf enum <code>LIST_ERRORS_FOR_PROMOTED_DRAFT_ONLY = 11;</code>
     */
    const LIST_ERRORS_FOR_PROMOTED_DRAFT_ONLY = 11;

    private static $valueToName = [
        self::UNSPECIFIED => 'UNSPECIFIED',
        self::UNKNOWN => 'UNKNOWN',
        self::DUPLICATE_DRAFT_NAME => 'DUPLICATE_DRAFT_NAME',
        self::INVALID_STATUS_TRANSITION_FROM_REMOVED => 'INVALID_STATUS_TRANSITION_FROM_REMOVED',
        self::INVALID_STATUS_TRANSITION_FROM_PROMOTED => 'INVALID_STATUS_TRANSITION_FROM_PROMOTED',
        self::INVALID_STATUS_TRANSITION_FROM_PROMOTE_FAILED => 'INVALID_STATUS_TRANSITION_FROM_PROMOTE_FAILED',
        self::CUSTOMER_CANNOT_CREATE_DRAFT => 'CUSTOMER_CANNOT_CREATE_DRAFT',
        self::CAMPAIGN_CANNOT_CREATE_DRAFT => 'CAMPAIGN_CANNOT_CREATE_DRAFT',
        self::INVALID_DRAFT_CHANGE => 'INVALID_DRAFT_CHANGE',
        self::INVALID_STATUS_TRANSITION => 'INVALID_STATUS_TRANSITION',
        self::MAX_NUMBER_OF_DRAFTS_PER_CAMPAIGN_REACHED => 'MAX_NUMBER_OF_DRAFTS_PER_CAMPAIGN_REACHED',
        self::LIST_ERRORS_FOR_PROMOTED_DRAFT_ONLY => 'LIST_ERRORS_FOR_PROMOTED_DRAFT_ONLY',
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
class_alias(CampaignDraftError::class, \Google\Ads\GoogleAds\V20\Errors\CampaignDraftErrorEnum_CampaignDraftError::class);

