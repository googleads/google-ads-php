<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/services/brand_suggestion_service.proto

namespace Google\Ads\GoogleAds\V19\Services;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Request message for
 * [BrandSuggestionService.SuggestBrands][google.ads.googleads.v19.services.BrandSuggestionService.SuggestBrands].
 *
 * Generated from protobuf message <code>google.ads.googleads.v19.services.SuggestBrandsRequest</code>
 */
class SuggestBrandsRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * Required. The ID of the customer onto which to apply the brand suggestion
     * operation.
     *
     * Generated from protobuf field <code>string customer_id = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    protected $customer_id = '';
    /**
     * Required. The prefix of a brand name.
     *
     * Generated from protobuf field <code>optional string brand_prefix = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    protected $brand_prefix = null;
    /**
     * Optional. Ids of the brands already selected by advertisers. They will be
     * excluded in response. These are expected to be brand ids not brand names.
     *
     * Generated from protobuf field <code>repeated string selected_brands = 3 [(.google.api.field_behavior) = OPTIONAL];</code>
     */
    private $selected_brands;

    /**
     * @param string $customerId  Required. The ID of the customer onto which to apply the brand suggestion
     *                            operation.
     * @param string $brandPrefix Required. The prefix of a brand name.
     *
     * @return \Google\Ads\GoogleAds\V19\Services\SuggestBrandsRequest
     *
     * @experimental
     */
    public static function build(string $customerId, string $brandPrefix): self
    {
        return (new self())
            ->setCustomerId($customerId)
            ->setBrandPrefix($brandPrefix);
    }

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $customer_id
     *           Required. The ID of the customer onto which to apply the brand suggestion
     *           operation.
     *     @type string $brand_prefix
     *           Required. The prefix of a brand name.
     *     @type array<string>|\Google\Protobuf\Internal\RepeatedField $selected_brands
     *           Optional. Ids of the brands already selected by advertisers. They will be
     *           excluded in response. These are expected to be brand ids not brand names.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V19\Services\BrandSuggestionService::initOnce();
        parent::__construct($data);
    }

    /**
     * Required. The ID of the customer onto which to apply the brand suggestion
     * operation.
     *
     * Generated from protobuf field <code>string customer_id = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return string
     */
    public function getCustomerId()
    {
        return $this->customer_id;
    }

    /**
     * Required. The ID of the customer onto which to apply the brand suggestion
     * operation.
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
     * Required. The prefix of a brand name.
     *
     * Generated from protobuf field <code>optional string brand_prefix = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return string
     */
    public function getBrandPrefix()
    {
        return isset($this->brand_prefix) ? $this->brand_prefix : '';
    }

    public function hasBrandPrefix()
    {
        return isset($this->brand_prefix);
    }

    public function clearBrandPrefix()
    {
        unset($this->brand_prefix);
    }

    /**
     * Required. The prefix of a brand name.
     *
     * Generated from protobuf field <code>optional string brand_prefix = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param string $var
     * @return $this
     */
    public function setBrandPrefix($var)
    {
        GPBUtil::checkString($var, True);
        $this->brand_prefix = $var;

        return $this;
    }

    /**
     * Optional. Ids of the brands already selected by advertisers. They will be
     * excluded in response. These are expected to be brand ids not brand names.
     *
     * Generated from protobuf field <code>repeated string selected_brands = 3 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getSelectedBrands()
    {
        return $this->selected_brands;
    }

    /**
     * Optional. Ids of the brands already selected by advertisers. They will be
     * excluded in response. These are expected to be brand ids not brand names.
     *
     * Generated from protobuf field <code>repeated string selected_brands = 3 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @param array<string>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setSelectedBrands($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::STRING);
        $this->selected_brands = $arr;

        return $this;
    }

}

