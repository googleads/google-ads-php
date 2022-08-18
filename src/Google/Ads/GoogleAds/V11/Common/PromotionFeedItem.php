<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v11/common/extensions.proto

namespace Google\Ads\GoogleAds\V11\Common;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Represents a Promotion extension.
 *
 * Generated from protobuf message <code>google.ads.googleads.v11.common.PromotionFeedItem</code>
 */
class PromotionFeedItem extends \Google\Protobuf\Internal\Message
{
    /**
     * A freeform description of what the promotion is targeting.
     * This field is required.
     *
     * Generated from protobuf field <code>optional string promotion_target = 16;</code>
     */
    protected $promotion_target = null;
    /**
     * Enum that modifies the qualification of the discount.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v11.enums.PromotionExtensionDiscountModifierEnum.PromotionExtensionDiscountModifier discount_modifier = 2;</code>
     */
    protected $discount_modifier = 0;
    /**
     * Start date of when the promotion is eligible to be redeemed.
     *
     * Generated from protobuf field <code>optional string promotion_start_date = 19;</code>
     */
    protected $promotion_start_date = null;
    /**
     * Last date when the promotion is eligible to be redeemed.
     *
     * Generated from protobuf field <code>optional string promotion_end_date = 20;</code>
     */
    protected $promotion_end_date = null;
    /**
     * The occasion the promotion was intended for.
     * If an occasion is set, the redemption window will need to fall within
     * the date range associated with the occasion.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v11.enums.PromotionExtensionOccasionEnum.PromotionExtensionOccasion occasion = 9;</code>
     */
    protected $occasion = 0;
    /**
     * A list of possible final URLs after all cross domain redirects.
     * This field is required.
     *
     * Generated from protobuf field <code>repeated string final_urls = 21;</code>
     */
    private $final_urls;
    /**
     * A list of possible final mobile URLs after all cross domain redirects.
     *
     * Generated from protobuf field <code>repeated string final_mobile_urls = 22;</code>
     */
    private $final_mobile_urls;
    /**
     * URL template for constructing a tracking URL.
     *
     * Generated from protobuf field <code>optional string tracking_url_template = 23;</code>
     */
    protected $tracking_url_template = null;
    /**
     * A list of mappings to be used for substituting URL custom parameter tags in
     * the tracking_url_template, final_urls, and/or final_mobile_urls.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v11.common.CustomParameter url_custom_parameters = 13;</code>
     */
    private $url_custom_parameters;
    /**
     * URL template for appending params to landing page URLs served with parallel
     * tracking.
     *
     * Generated from protobuf field <code>optional string final_url_suffix = 24;</code>
     */
    protected $final_url_suffix = null;
    /**
     * The language of the promotion.
     * Represented as BCP 47 language tag.
     *
     * Generated from protobuf field <code>optional string language_code = 25;</code>
     */
    protected $language_code = null;
    protected $discount_type;
    protected $promotion_trigger;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $promotion_target
     *           A freeform description of what the promotion is targeting.
     *           This field is required.
     *     @type int $discount_modifier
     *           Enum that modifies the qualification of the discount.
     *     @type string $promotion_start_date
     *           Start date of when the promotion is eligible to be redeemed.
     *     @type string $promotion_end_date
     *           Last date when the promotion is eligible to be redeemed.
     *     @type int $occasion
     *           The occasion the promotion was intended for.
     *           If an occasion is set, the redemption window will need to fall within
     *           the date range associated with the occasion.
     *     @type array<string>|\Google\Protobuf\Internal\RepeatedField $final_urls
     *           A list of possible final URLs after all cross domain redirects.
     *           This field is required.
     *     @type array<string>|\Google\Protobuf\Internal\RepeatedField $final_mobile_urls
     *           A list of possible final mobile URLs after all cross domain redirects.
     *     @type string $tracking_url_template
     *           URL template for constructing a tracking URL.
     *     @type array<\Google\Ads\GoogleAds\V11\Common\CustomParameter>|\Google\Protobuf\Internal\RepeatedField $url_custom_parameters
     *           A list of mappings to be used for substituting URL custom parameter tags in
     *           the tracking_url_template, final_urls, and/or final_mobile_urls.
     *     @type string $final_url_suffix
     *           URL template for appending params to landing page URLs served with parallel
     *           tracking.
     *     @type string $language_code
     *           The language of the promotion.
     *           Represented as BCP 47 language tag.
     *     @type int|string $percent_off
     *           Percentage off discount in the promotion in micros.
     *           One million is equivalent to one percent.
     *           Either this or money_off_amount is required.
     *     @type \Google\Ads\GoogleAds\V11\Common\Money $money_amount_off
     *           Money amount off for discount in the promotion.
     *           Either this or percent_off is required.
     *     @type string $promotion_code
     *           A code the user should use in order to be eligible for the promotion.
     *     @type \Google\Ads\GoogleAds\V11\Common\Money $orders_over_amount
     *           The amount the total order needs to be for the user to be eligible for
     *           the promotion.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V11\Common\Extensions::initOnce();
        parent::__construct($data);
    }

    /**
     * A freeform description of what the promotion is targeting.
     * This field is required.
     *
     * Generated from protobuf field <code>optional string promotion_target = 16;</code>
     * @return string
     */
    public function getPromotionTarget()
    {
        return isset($this->promotion_target) ? $this->promotion_target : '';
    }

    public function hasPromotionTarget()
    {
        return isset($this->promotion_target);
    }

    public function clearPromotionTarget()
    {
        unset($this->promotion_target);
    }

    /**
     * A freeform description of what the promotion is targeting.
     * This field is required.
     *
     * Generated from protobuf field <code>optional string promotion_target = 16;</code>
     * @param string $var
     * @return $this
     */
    public function setPromotionTarget($var)
    {
        GPBUtil::checkString($var, True);
        $this->promotion_target = $var;

        return $this;
    }

    /**
     * Enum that modifies the qualification of the discount.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v11.enums.PromotionExtensionDiscountModifierEnum.PromotionExtensionDiscountModifier discount_modifier = 2;</code>
     * @return int
     */
    public function getDiscountModifier()
    {
        return $this->discount_modifier;
    }

    /**
     * Enum that modifies the qualification of the discount.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v11.enums.PromotionExtensionDiscountModifierEnum.PromotionExtensionDiscountModifier discount_modifier = 2;</code>
     * @param int $var
     * @return $this
     */
    public function setDiscountModifier($var)
    {
        GPBUtil::checkEnum($var, \Google\Ads\GoogleAds\V11\Enums\PromotionExtensionDiscountModifierEnum\PromotionExtensionDiscountModifier::class);
        $this->discount_modifier = $var;

        return $this;
    }

    /**
     * Start date of when the promotion is eligible to be redeemed.
     *
     * Generated from protobuf field <code>optional string promotion_start_date = 19;</code>
     * @return string
     */
    public function getPromotionStartDate()
    {
        return isset($this->promotion_start_date) ? $this->promotion_start_date : '';
    }

    public function hasPromotionStartDate()
    {
        return isset($this->promotion_start_date);
    }

    public function clearPromotionStartDate()
    {
        unset($this->promotion_start_date);
    }

    /**
     * Start date of when the promotion is eligible to be redeemed.
     *
     * Generated from protobuf field <code>optional string promotion_start_date = 19;</code>
     * @param string $var
     * @return $this
     */
    public function setPromotionStartDate($var)
    {
        GPBUtil::checkString($var, True);
        $this->promotion_start_date = $var;

        return $this;
    }

    /**
     * Last date when the promotion is eligible to be redeemed.
     *
     * Generated from protobuf field <code>optional string promotion_end_date = 20;</code>
     * @return string
     */
    public function getPromotionEndDate()
    {
        return isset($this->promotion_end_date) ? $this->promotion_end_date : '';
    }

    public function hasPromotionEndDate()
    {
        return isset($this->promotion_end_date);
    }

    public function clearPromotionEndDate()
    {
        unset($this->promotion_end_date);
    }

    /**
     * Last date when the promotion is eligible to be redeemed.
     *
     * Generated from protobuf field <code>optional string promotion_end_date = 20;</code>
     * @param string $var
     * @return $this
     */
    public function setPromotionEndDate($var)
    {
        GPBUtil::checkString($var, True);
        $this->promotion_end_date = $var;

        return $this;
    }

    /**
     * The occasion the promotion was intended for.
     * If an occasion is set, the redemption window will need to fall within
     * the date range associated with the occasion.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v11.enums.PromotionExtensionOccasionEnum.PromotionExtensionOccasion occasion = 9;</code>
     * @return int
     */
    public function getOccasion()
    {
        return $this->occasion;
    }

    /**
     * The occasion the promotion was intended for.
     * If an occasion is set, the redemption window will need to fall within
     * the date range associated with the occasion.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v11.enums.PromotionExtensionOccasionEnum.PromotionExtensionOccasion occasion = 9;</code>
     * @param int $var
     * @return $this
     */
    public function setOccasion($var)
    {
        GPBUtil::checkEnum($var, \Google\Ads\GoogleAds\V11\Enums\PromotionExtensionOccasionEnum\PromotionExtensionOccasion::class);
        $this->occasion = $var;

        return $this;
    }

    /**
     * A list of possible final URLs after all cross domain redirects.
     * This field is required.
     *
     * Generated from protobuf field <code>repeated string final_urls = 21;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getFinalUrls()
    {
        return $this->final_urls;
    }

    /**
     * A list of possible final URLs after all cross domain redirects.
     * This field is required.
     *
     * Generated from protobuf field <code>repeated string final_urls = 21;</code>
     * @param array<string>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setFinalUrls($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::STRING);
        $this->final_urls = $arr;

        return $this;
    }

    /**
     * A list of possible final mobile URLs after all cross domain redirects.
     *
     * Generated from protobuf field <code>repeated string final_mobile_urls = 22;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getFinalMobileUrls()
    {
        return $this->final_mobile_urls;
    }

    /**
     * A list of possible final mobile URLs after all cross domain redirects.
     *
     * Generated from protobuf field <code>repeated string final_mobile_urls = 22;</code>
     * @param array<string>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setFinalMobileUrls($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::STRING);
        $this->final_mobile_urls = $arr;

        return $this;
    }

    /**
     * URL template for constructing a tracking URL.
     *
     * Generated from protobuf field <code>optional string tracking_url_template = 23;</code>
     * @return string
     */
    public function getTrackingUrlTemplate()
    {
        return isset($this->tracking_url_template) ? $this->tracking_url_template : '';
    }

    public function hasTrackingUrlTemplate()
    {
        return isset($this->tracking_url_template);
    }

    public function clearTrackingUrlTemplate()
    {
        unset($this->tracking_url_template);
    }

    /**
     * URL template for constructing a tracking URL.
     *
     * Generated from protobuf field <code>optional string tracking_url_template = 23;</code>
     * @param string $var
     * @return $this
     */
    public function setTrackingUrlTemplate($var)
    {
        GPBUtil::checkString($var, True);
        $this->tracking_url_template = $var;

        return $this;
    }

    /**
     * A list of mappings to be used for substituting URL custom parameter tags in
     * the tracking_url_template, final_urls, and/or final_mobile_urls.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v11.common.CustomParameter url_custom_parameters = 13;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getUrlCustomParameters()
    {
        return $this->url_custom_parameters;
    }

    /**
     * A list of mappings to be used for substituting URL custom parameter tags in
     * the tracking_url_template, final_urls, and/or final_mobile_urls.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v11.common.CustomParameter url_custom_parameters = 13;</code>
     * @param array<\Google\Ads\GoogleAds\V11\Common\CustomParameter>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setUrlCustomParameters($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Ads\GoogleAds\V11\Common\CustomParameter::class);
        $this->url_custom_parameters = $arr;

        return $this;
    }

    /**
     * URL template for appending params to landing page URLs served with parallel
     * tracking.
     *
     * Generated from protobuf field <code>optional string final_url_suffix = 24;</code>
     * @return string
     */
    public function getFinalUrlSuffix()
    {
        return isset($this->final_url_suffix) ? $this->final_url_suffix : '';
    }

    public function hasFinalUrlSuffix()
    {
        return isset($this->final_url_suffix);
    }

    public function clearFinalUrlSuffix()
    {
        unset($this->final_url_suffix);
    }

    /**
     * URL template for appending params to landing page URLs served with parallel
     * tracking.
     *
     * Generated from protobuf field <code>optional string final_url_suffix = 24;</code>
     * @param string $var
     * @return $this
     */
    public function setFinalUrlSuffix($var)
    {
        GPBUtil::checkString($var, True);
        $this->final_url_suffix = $var;

        return $this;
    }

    /**
     * The language of the promotion.
     * Represented as BCP 47 language tag.
     *
     * Generated from protobuf field <code>optional string language_code = 25;</code>
     * @return string
     */
    public function getLanguageCode()
    {
        return isset($this->language_code) ? $this->language_code : '';
    }

    public function hasLanguageCode()
    {
        return isset($this->language_code);
    }

    public function clearLanguageCode()
    {
        unset($this->language_code);
    }

    /**
     * The language of the promotion.
     * Represented as BCP 47 language tag.
     *
     * Generated from protobuf field <code>optional string language_code = 25;</code>
     * @param string $var
     * @return $this
     */
    public function setLanguageCode($var)
    {
        GPBUtil::checkString($var, True);
        $this->language_code = $var;

        return $this;
    }

    /**
     * Percentage off discount in the promotion in micros.
     * One million is equivalent to one percent.
     * Either this or money_off_amount is required.
     *
     * Generated from protobuf field <code>int64 percent_off = 17;</code>
     * @return int|string
     */
    public function getPercentOff()
    {
        return $this->readOneof(17);
    }

    public function hasPercentOff()
    {
        return $this->hasOneof(17);
    }

    /**
     * Percentage off discount in the promotion in micros.
     * One million is equivalent to one percent.
     * Either this or money_off_amount is required.
     *
     * Generated from protobuf field <code>int64 percent_off = 17;</code>
     * @param int|string $var
     * @return $this
     */
    public function setPercentOff($var)
    {
        GPBUtil::checkInt64($var);
        $this->writeOneof(17, $var);

        return $this;
    }

    /**
     * Money amount off for discount in the promotion.
     * Either this or percent_off is required.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v11.common.Money money_amount_off = 4;</code>
     * @return \Google\Ads\GoogleAds\V11\Common\Money|null
     */
    public function getMoneyAmountOff()
    {
        return $this->readOneof(4);
    }

    public function hasMoneyAmountOff()
    {
        return $this->hasOneof(4);
    }

    /**
     * Money amount off for discount in the promotion.
     * Either this or percent_off is required.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v11.common.Money money_amount_off = 4;</code>
     * @param \Google\Ads\GoogleAds\V11\Common\Money $var
     * @return $this
     */
    public function setMoneyAmountOff($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V11\Common\Money::class);
        $this->writeOneof(4, $var);

        return $this;
    }

    /**
     * A code the user should use in order to be eligible for the promotion.
     *
     * Generated from protobuf field <code>string promotion_code = 18;</code>
     * @return string
     */
    public function getPromotionCode()
    {
        return $this->readOneof(18);
    }

    public function hasPromotionCode()
    {
        return $this->hasOneof(18);
    }

    /**
     * A code the user should use in order to be eligible for the promotion.
     *
     * Generated from protobuf field <code>string promotion_code = 18;</code>
     * @param string $var
     * @return $this
     */
    public function setPromotionCode($var)
    {
        GPBUtil::checkString($var, True);
        $this->writeOneof(18, $var);

        return $this;
    }

    /**
     * The amount the total order needs to be for the user to be eligible for
     * the promotion.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v11.common.Money orders_over_amount = 6;</code>
     * @return \Google\Ads\GoogleAds\V11\Common\Money|null
     */
    public function getOrdersOverAmount()
    {
        return $this->readOneof(6);
    }

    public function hasOrdersOverAmount()
    {
        return $this->hasOneof(6);
    }

    /**
     * The amount the total order needs to be for the user to be eligible for
     * the promotion.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v11.common.Money orders_over_amount = 6;</code>
     * @param \Google\Ads\GoogleAds\V11\Common\Money $var
     * @return $this
     */
    public function setOrdersOverAmount($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V11\Common\Money::class);
        $this->writeOneof(6, $var);

        return $this;
    }

    /**
     * @return string
     */
    public function getDiscountType()
    {
        return $this->whichOneof("discount_type");
    }

    /**
     * @return string
     */
    public function getPromotionTrigger()
    {
        return $this->whichOneof("promotion_trigger");
    }

}

