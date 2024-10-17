<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v18/resources/asset_group_signal.proto

namespace Google\Ads\GoogleAds\V18\Resources;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * AssetGroupSignal represents a signal in an asset group. The existence of a
 * signal tells the performance max campaign who's most likely to convert.
 * Performance Max uses the signal to look for new people with similar or
 * stronger intent to find conversions across Search, Display, Video, and more.
 *
 * Generated from protobuf message <code>google.ads.googleads.v18.resources.AssetGroupSignal</code>
 */
class AssetGroupSignal extends \Google\Protobuf\Internal\Message
{
    /**
     * Immutable. The resource name of the asset group signal.
     * Asset group signal resource name have the form:
     * `customers/{customer_id}/assetGroupSignals/{asset_group_id}~{signal_id}`
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.field_behavior) = IMMUTABLE, (.google.api.resource_reference) = {</code>
     */
    protected $resource_name = '';
    /**
     * Immutable. The asset group which this asset group signal belongs to.
     *
     * Generated from protobuf field <code>string asset_group = 2 [(.google.api.field_behavior) = IMMUTABLE, (.google.api.resource_reference) = {</code>
     */
    protected $asset_group = '';
    /**
     * Output only. Approval status is the output value for search theme signal
     * after Google ads policy review. When using Audience signal, this field is
     * not used and will be absent.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v18.enums.AssetGroupSignalApprovalStatusEnum.AssetGroupSignalApprovalStatus approval_status = 6 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $approval_status = 0;
    /**
     * Output only. Computed for SearchTheme signals.
     * When using Audience signal, this field is not used and will be absent.
     *
     * Generated from protobuf field <code>repeated string disapproval_reasons = 7 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $disapproval_reasons;
    protected $signal;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $resource_name
     *           Immutable. The resource name of the asset group signal.
     *           Asset group signal resource name have the form:
     *           `customers/{customer_id}/assetGroupSignals/{asset_group_id}~{signal_id}`
     *     @type string $asset_group
     *           Immutable. The asset group which this asset group signal belongs to.
     *     @type int $approval_status
     *           Output only. Approval status is the output value for search theme signal
     *           after Google ads policy review. When using Audience signal, this field is
     *           not used and will be absent.
     *     @type array<string>|\Google\Protobuf\Internal\RepeatedField $disapproval_reasons
     *           Output only. Computed for SearchTheme signals.
     *           When using Audience signal, this field is not used and will be absent.
     *     @type \Google\Ads\GoogleAds\V18\Common\AudienceInfo $audience
     *           Immutable. The audience signal to be used by the performance max
     *           campaign.
     *     @type \Google\Ads\GoogleAds\V18\Common\SearchThemeInfo $search_theme
     *           Immutable. The search_theme signal to be used by the performance max
     *           campaign.
     *           Mutate errors of search_theme criterion includes
     *           AssetGroupSignalError.UNSPECIFIED
     *           AssetGroupSignalError.UNKNOWN
     *           AssetGroupSignalError.TOO_MANY_WORDS
     *           AssetGroupSignalError.SEARCH_THEME_POLICY_VIOLATION
     *           FieldError.REQUIRED
     *           StringFormatError.ILLEGAL_CHARS
     *           StringLengthError.TOO_LONG
     *           ResourceCountLimitExceededError.RESOURCE_LIMIT
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V18\Resources\AssetGroupSignal::initOnce();
        parent::__construct($data);
    }

    /**
     * Immutable. The resource name of the asset group signal.
     * Asset group signal resource name have the form:
     * `customers/{customer_id}/assetGroupSignals/{asset_group_id}~{signal_id}`
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.field_behavior) = IMMUTABLE, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getResourceName()
    {
        return $this->resource_name;
    }

    /**
     * Immutable. The resource name of the asset group signal.
     * Asset group signal resource name have the form:
     * `customers/{customer_id}/assetGroupSignals/{asset_group_id}~{signal_id}`
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
     * Immutable. The asset group which this asset group signal belongs to.
     *
     * Generated from protobuf field <code>string asset_group = 2 [(.google.api.field_behavior) = IMMUTABLE, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getAssetGroup()
    {
        return $this->asset_group;
    }

    /**
     * Immutable. The asset group which this asset group signal belongs to.
     *
     * Generated from protobuf field <code>string asset_group = 2 [(.google.api.field_behavior) = IMMUTABLE, (.google.api.resource_reference) = {</code>
     * @param string $var
     * @return $this
     */
    public function setAssetGroup($var)
    {
        GPBUtil::checkString($var, True);
        $this->asset_group = $var;

        return $this;
    }

    /**
     * Output only. Approval status is the output value for search theme signal
     * after Google ads policy review. When using Audience signal, this field is
     * not used and will be absent.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v18.enums.AssetGroupSignalApprovalStatusEnum.AssetGroupSignalApprovalStatus approval_status = 6 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return int
     */
    public function getApprovalStatus()
    {
        return $this->approval_status;
    }

    /**
     * Output only. Approval status is the output value for search theme signal
     * after Google ads policy review. When using Audience signal, this field is
     * not used and will be absent.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v18.enums.AssetGroupSignalApprovalStatusEnum.AssetGroupSignalApprovalStatus approval_status = 6 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param int $var
     * @return $this
     */
    public function setApprovalStatus($var)
    {
        GPBUtil::checkEnum($var, \Google\Ads\GoogleAds\V18\Enums\AssetGroupSignalApprovalStatusEnum\AssetGroupSignalApprovalStatus::class);
        $this->approval_status = $var;

        return $this;
    }

    /**
     * Output only. Computed for SearchTheme signals.
     * When using Audience signal, this field is not used and will be absent.
     *
     * Generated from protobuf field <code>repeated string disapproval_reasons = 7 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getDisapprovalReasons()
    {
        return $this->disapproval_reasons;
    }

    /**
     * Output only. Computed for SearchTheme signals.
     * When using Audience signal, this field is not used and will be absent.
     *
     * Generated from protobuf field <code>repeated string disapproval_reasons = 7 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param array<string>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setDisapprovalReasons($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::STRING);
        $this->disapproval_reasons = $arr;

        return $this;
    }

    /**
     * Immutable. The audience signal to be used by the performance max
     * campaign.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v18.common.AudienceInfo audience = 4 [(.google.api.field_behavior) = IMMUTABLE];</code>
     * @return \Google\Ads\GoogleAds\V18\Common\AudienceInfo|null
     */
    public function getAudience()
    {
        return $this->readOneof(4);
    }

    public function hasAudience()
    {
        return $this->hasOneof(4);
    }

    /**
     * Immutable. The audience signal to be used by the performance max
     * campaign.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v18.common.AudienceInfo audience = 4 [(.google.api.field_behavior) = IMMUTABLE];</code>
     * @param \Google\Ads\GoogleAds\V18\Common\AudienceInfo $var
     * @return $this
     */
    public function setAudience($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V18\Common\AudienceInfo::class);
        $this->writeOneof(4, $var);

        return $this;
    }

    /**
     * Immutable. The search_theme signal to be used by the performance max
     * campaign.
     * Mutate errors of search_theme criterion includes
     * AssetGroupSignalError.UNSPECIFIED
     * AssetGroupSignalError.UNKNOWN
     * AssetGroupSignalError.TOO_MANY_WORDS
     * AssetGroupSignalError.SEARCH_THEME_POLICY_VIOLATION
     * FieldError.REQUIRED
     * StringFormatError.ILLEGAL_CHARS
     * StringLengthError.TOO_LONG
     * ResourceCountLimitExceededError.RESOURCE_LIMIT
     *
     * Generated from protobuf field <code>.google.ads.googleads.v18.common.SearchThemeInfo search_theme = 5 [(.google.api.field_behavior) = IMMUTABLE];</code>
     * @return \Google\Ads\GoogleAds\V18\Common\SearchThemeInfo|null
     */
    public function getSearchTheme()
    {
        return $this->readOneof(5);
    }

    public function hasSearchTheme()
    {
        return $this->hasOneof(5);
    }

    /**
     * Immutable. The search_theme signal to be used by the performance max
     * campaign.
     * Mutate errors of search_theme criterion includes
     * AssetGroupSignalError.UNSPECIFIED
     * AssetGroupSignalError.UNKNOWN
     * AssetGroupSignalError.TOO_MANY_WORDS
     * AssetGroupSignalError.SEARCH_THEME_POLICY_VIOLATION
     * FieldError.REQUIRED
     * StringFormatError.ILLEGAL_CHARS
     * StringLengthError.TOO_LONG
     * ResourceCountLimitExceededError.RESOURCE_LIMIT
     *
     * Generated from protobuf field <code>.google.ads.googleads.v18.common.SearchThemeInfo search_theme = 5 [(.google.api.field_behavior) = IMMUTABLE];</code>
     * @param \Google\Ads\GoogleAds\V18\Common\SearchThemeInfo $var
     * @return $this
     */
    public function setSearchTheme($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V18\Common\SearchThemeInfo::class);
        $this->writeOneof(5, $var);

        return $this;
    }

    /**
     * @return string
     */
    public function getSignal()
    {
        return $this->whichOneof("signal");
    }

}

