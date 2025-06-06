<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/services/asset_group_listing_group_filter_service.proto

namespace Google\Ads\GoogleAds\V20\Services;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Request message for
 * [AssetGroupListingGroupFilterService.MutateAssetGroupListingGroupFilters][google.ads.googleads.v20.services.AssetGroupListingGroupFilterService.MutateAssetGroupListingGroupFilters].
 * partial_failure is not supported because the tree needs to be validated
 * together.
 *
 * Generated from protobuf message <code>google.ads.googleads.v20.services.MutateAssetGroupListingGroupFiltersRequest</code>
 */
class MutateAssetGroupListingGroupFiltersRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * Required. The ID of the customer whose asset group listing group filters
     * are being modified.
     *
     * Generated from protobuf field <code>string customer_id = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    protected $customer_id = '';
    /**
     * Required. The list of operations to perform on individual asset group
     * listing group filters.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v20.services.AssetGroupListingGroupFilterOperation operations = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    private $operations;
    /**
     * If true, the request is validated but not executed. Only errors are
     * returned, not results.
     *
     * Generated from protobuf field <code>bool validate_only = 3;</code>
     */
    protected $validate_only = false;
    /**
     * The response content type setting. Determines whether the mutable resource
     * or just the resource name should be returned post mutation.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.enums.ResponseContentTypeEnum.ResponseContentType response_content_type = 4;</code>
     */
    protected $response_content_type = 0;

    /**
     * @param string                                                                     $customerId Required. The ID of the customer whose asset group listing group filters
     *                                                                                               are being modified.
     * @param \Google\Ads\GoogleAds\V20\Services\AssetGroupListingGroupFilterOperation[] $operations Required. The list of operations to perform on individual asset group
     *                                                                                               listing group filters.
     *
     * @return \Google\Ads\GoogleAds\V20\Services\MutateAssetGroupListingGroupFiltersRequest
     *
     * @experimental
     */
    public static function build(string $customerId, array $operations): self
    {
        return (new self())
            ->setCustomerId($customerId)
            ->setOperations($operations);
    }

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $customer_id
     *           Required. The ID of the customer whose asset group listing group filters
     *           are being modified.
     *     @type array<\Google\Ads\GoogleAds\V20\Services\AssetGroupListingGroupFilterOperation>|\Google\Protobuf\Internal\RepeatedField $operations
     *           Required. The list of operations to perform on individual asset group
     *           listing group filters.
     *     @type bool $validate_only
     *           If true, the request is validated but not executed. Only errors are
     *           returned, not results.
     *     @type int $response_content_type
     *           The response content type setting. Determines whether the mutable resource
     *           or just the resource name should be returned post mutation.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V20\Services\AssetGroupListingGroupFilterService::initOnce();
        parent::__construct($data);
    }

    /**
     * Required. The ID of the customer whose asset group listing group filters
     * are being modified.
     *
     * Generated from protobuf field <code>string customer_id = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return string
     */
    public function getCustomerId()
    {
        return $this->customer_id;
    }

    /**
     * Required. The ID of the customer whose asset group listing group filters
     * are being modified.
     *
     * Generated from protobuf field <code>string customer_id = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param string $var
     * @return $this
     */
    public function setCustomerId($var)
    {
        GPBUtil::checkString($var, True);
        $this->customer_id = $var;

        return $this;
    }

    /**
     * Required. The list of operations to perform on individual asset group
     * listing group filters.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v20.services.AssetGroupListingGroupFilterOperation operations = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getOperations()
    {
        return $this->operations;
    }

    /**
     * Required. The list of operations to perform on individual asset group
     * listing group filters.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v20.services.AssetGroupListingGroupFilterOperation operations = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param array<\Google\Ads\GoogleAds\V20\Services\AssetGroupListingGroupFilterOperation>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setOperations($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Ads\GoogleAds\V20\Services\AssetGroupListingGroupFilterOperation::class);
        $this->operations = $arr;

        return $this;
    }

    /**
     * If true, the request is validated but not executed. Only errors are
     * returned, not results.
     *
     * Generated from protobuf field <code>bool validate_only = 3;</code>
     * @return bool
     */
    public function getValidateOnly()
    {
        return $this->validate_only;
    }

    /**
     * If true, the request is validated but not executed. Only errors are
     * returned, not results.
     *
     * Generated from protobuf field <code>bool validate_only = 3;</code>
     * @param bool $var
     * @return $this
     */
    public function setValidateOnly($var)
    {
        GPBUtil::checkBool($var);
        $this->validate_only = $var;

        return $this;
    }

    /**
     * The response content type setting. Determines whether the mutable resource
     * or just the resource name should be returned post mutation.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.enums.ResponseContentTypeEnum.ResponseContentType response_content_type = 4;</code>
     * @return int
     */
    public function getResponseContentType()
    {
        return $this->response_content_type;
    }

    /**
     * The response content type setting. Determines whether the mutable resource
     * or just the resource name should be returned post mutation.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.enums.ResponseContentTypeEnum.ResponseContentType response_content_type = 4;</code>
     * @param int $var
     * @return $this
     */
    public function setResponseContentType($var)
    {
        GPBUtil::checkEnum($var, \Google\Ads\GoogleAds\V20\Enums\ResponseContentTypeEnum\ResponseContentType::class);
        $this->response_content_type = $var;

        return $this;
    }

}

