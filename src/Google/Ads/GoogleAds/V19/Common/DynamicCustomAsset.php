<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/common/asset_types.proto

namespace Google\Ads\GoogleAds\V19\Common;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * A dynamic custom asset.
 *
 * Generated from protobuf message <code>google.ads.googleads.v19.common.DynamicCustomAsset</code>
 */
class DynamicCustomAsset extends \Google\Protobuf\Internal\Message
{
    /**
     * Required. ID which can be any sequence of letters and digits, and must be
     * unique and match the values of remarketing tag, for example, sedan.
     * Required.
     *
     * Generated from protobuf field <code>string id = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    protected $id = '';
    /**
     * ID2 which can be any sequence of letters and digits, for example, red. ID
     * sequence (ID + ID2) must be unique.
     *
     * Generated from protobuf field <code>string id2 = 2;</code>
     */
    protected $id2 = '';
    /**
     * Required. Item title, for example, Mid-size sedan. Required.
     *
     * Generated from protobuf field <code>string item_title = 3 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    protected $item_title = '';
    /**
     * Item subtitle, for example, At your Mountain View dealership.
     *
     * Generated from protobuf field <code>string item_subtitle = 4;</code>
     */
    protected $item_subtitle = '';
    /**
     * Item description, for example, Best selling mid-size car.
     *
     * Generated from protobuf field <code>string item_description = 5;</code>
     */
    protected $item_description = '';
    /**
     * Item address which can be specified in one of the following formats.
     * (1) City, state, code, country, for example, Mountain View, CA, USA.
     * (2) Full address, for example, 123 Boulevard St, Mountain View, CA 94043.
     * (3) Latitude-longitude in the DDD format, for example, 41.40338, 2.17403
     *
     * Generated from protobuf field <code>string item_address = 6;</code>
     */
    protected $item_address = '';
    /**
     * Item category, for example, Sedans.
     *
     * Generated from protobuf field <code>string item_category = 7;</code>
     */
    protected $item_category = '';
    /**
     * Price which can be number followed by the alphabetic currency code,
     * ISO 4217 standard. Use '.' as the decimal mark, for example, 20,000.00 USD.
     *
     * Generated from protobuf field <code>string price = 8;</code>
     */
    protected $price = '';
    /**
     * Sale price which can be number followed by the alphabetic currency code,
     * ISO 4217 standard. Use '.' as the decimal mark, for example, 15,000.00 USD.
     * Must be less than the 'price' field.
     *
     * Generated from protobuf field <code>string sale_price = 9;</code>
     */
    protected $sale_price = '';
    /**
     * Formatted price which can be any characters. If set, this attribute will be
     * used instead of 'price', for example, Starting at $20,000.00.
     *
     * Generated from protobuf field <code>string formatted_price = 10;</code>
     */
    protected $formatted_price = '';
    /**
     * Formatted sale price which can be any characters. If set, this attribute
     * will be used instead of 'sale price', for example, On sale for $15,000.00.
     *
     * Generated from protobuf field <code>string formatted_sale_price = 11;</code>
     */
    protected $formatted_sale_price = '';
    /**
     * Image URL, for example, http://www.example.com/image.png. The image will
     * not be uploaded as image asset.
     *
     * Generated from protobuf field <code>string image_url = 12;</code>
     */
    protected $image_url = '';
    /**
     * Contextual keywords, for example, Sedans, 4 door sedans.
     *
     * Generated from protobuf field <code>repeated string contextual_keywords = 13;</code>
     */
    private $contextual_keywords;
    /**
     * Android deep link, for example,
     * android-app://com.example.android/http/example.com/gizmos?1234.
     *
     * Generated from protobuf field <code>string android_app_link = 14;</code>
     */
    protected $android_app_link = '';
    /**
     * iOS deep link, for example, exampleApp://content/page.
     *
     * Generated from protobuf field <code>string ios_app_link = 16;</code>
     */
    protected $ios_app_link = '';
    /**
     * iOS app store ID. This is used to check if the user has the app installed
     * on their device before deep linking. If this field is set, then the
     * ios_app_link field must also be present.
     *
     * Generated from protobuf field <code>int64 ios_app_store_id = 17;</code>
     */
    protected $ios_app_store_id = 0;
    /**
     * Similar IDs.
     *
     * Generated from protobuf field <code>repeated string similar_ids = 15;</code>
     */
    private $similar_ids;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $id
     *           Required. ID which can be any sequence of letters and digits, and must be
     *           unique and match the values of remarketing tag, for example, sedan.
     *           Required.
     *     @type string $id2
     *           ID2 which can be any sequence of letters and digits, for example, red. ID
     *           sequence (ID + ID2) must be unique.
     *     @type string $item_title
     *           Required. Item title, for example, Mid-size sedan. Required.
     *     @type string $item_subtitle
     *           Item subtitle, for example, At your Mountain View dealership.
     *     @type string $item_description
     *           Item description, for example, Best selling mid-size car.
     *     @type string $item_address
     *           Item address which can be specified in one of the following formats.
     *           (1) City, state, code, country, for example, Mountain View, CA, USA.
     *           (2) Full address, for example, 123 Boulevard St, Mountain View, CA 94043.
     *           (3) Latitude-longitude in the DDD format, for example, 41.40338, 2.17403
     *     @type string $item_category
     *           Item category, for example, Sedans.
     *     @type string $price
     *           Price which can be number followed by the alphabetic currency code,
     *           ISO 4217 standard. Use '.' as the decimal mark, for example, 20,000.00 USD.
     *     @type string $sale_price
     *           Sale price which can be number followed by the alphabetic currency code,
     *           ISO 4217 standard. Use '.' as the decimal mark, for example, 15,000.00 USD.
     *           Must be less than the 'price' field.
     *     @type string $formatted_price
     *           Formatted price which can be any characters. If set, this attribute will be
     *           used instead of 'price', for example, Starting at $20,000.00.
     *     @type string $formatted_sale_price
     *           Formatted sale price which can be any characters. If set, this attribute
     *           will be used instead of 'sale price', for example, On sale for $15,000.00.
     *     @type string $image_url
     *           Image URL, for example, http://www.example.com/image.png. The image will
     *           not be uploaded as image asset.
     *     @type array<string>|\Google\Protobuf\Internal\RepeatedField $contextual_keywords
     *           Contextual keywords, for example, Sedans, 4 door sedans.
     *     @type string $android_app_link
     *           Android deep link, for example,
     *           android-app://com.example.android/http/example.com/gizmos?1234.
     *     @type string $ios_app_link
     *           iOS deep link, for example, exampleApp://content/page.
     *     @type int|string $ios_app_store_id
     *           iOS app store ID. This is used to check if the user has the app installed
     *           on their device before deep linking. If this field is set, then the
     *           ios_app_link field must also be present.
     *     @type array<string>|\Google\Protobuf\Internal\RepeatedField $similar_ids
     *           Similar IDs.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V19\Common\AssetTypes::initOnce();
        parent::__construct($data);
    }

    /**
     * Required. ID which can be any sequence of letters and digits, and must be
     * unique and match the values of remarketing tag, for example, sedan.
     * Required.
     *
     * Generated from protobuf field <code>string id = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Required. ID which can be any sequence of letters and digits, and must be
     * unique and match the values of remarketing tag, for example, sedan.
     * Required.
     *
     * Generated from protobuf field <code>string id = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param string $var
     * @return $this
     */
    public function setId($var)
    {
        GPBUtil::checkString($var, True);
        $this->id = $var;

        return $this;
    }

    /**
     * ID2 which can be any sequence of letters and digits, for example, red. ID
     * sequence (ID + ID2) must be unique.
     *
     * Generated from protobuf field <code>string id2 = 2;</code>
     * @return string
     */
    public function getId2()
    {
        return $this->id2;
    }

    /**
     * ID2 which can be any sequence of letters and digits, for example, red. ID
     * sequence (ID + ID2) must be unique.
     *
     * Generated from protobuf field <code>string id2 = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setId2($var)
    {
        GPBUtil::checkString($var, True);
        $this->id2 = $var;

        return $this;
    }

    /**
     * Required. Item title, for example, Mid-size sedan. Required.
     *
     * Generated from protobuf field <code>string item_title = 3 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return string
     */
    public function getItemTitle()
    {
        return $this->item_title;
    }

    /**
     * Required. Item title, for example, Mid-size sedan. Required.
     *
     * Generated from protobuf field <code>string item_title = 3 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param string $var
     * @return $this
     */
    public function setItemTitle($var)
    {
        GPBUtil::checkString($var, True);
        $this->item_title = $var;

        return $this;
    }

    /**
     * Item subtitle, for example, At your Mountain View dealership.
     *
     * Generated from protobuf field <code>string item_subtitle = 4;</code>
     * @return string
     */
    public function getItemSubtitle()
    {
        return $this->item_subtitle;
    }

    /**
     * Item subtitle, for example, At your Mountain View dealership.
     *
     * Generated from protobuf field <code>string item_subtitle = 4;</code>
     * @param string $var
     * @return $this
     */
    public function setItemSubtitle($var)
    {
        GPBUtil::checkString($var, True);
        $this->item_subtitle = $var;

        return $this;
    }

    /**
     * Item description, for example, Best selling mid-size car.
     *
     * Generated from protobuf field <code>string item_description = 5;</code>
     * @return string
     */
    public function getItemDescription()
    {
        return $this->item_description;
    }

    /**
     * Item description, for example, Best selling mid-size car.
     *
     * Generated from protobuf field <code>string item_description = 5;</code>
     * @param string $var
     * @return $this
     */
    public function setItemDescription($var)
    {
        GPBUtil::checkString($var, True);
        $this->item_description = $var;

        return $this;
    }

    /**
     * Item address which can be specified in one of the following formats.
     * (1) City, state, code, country, for example, Mountain View, CA, USA.
     * (2) Full address, for example, 123 Boulevard St, Mountain View, CA 94043.
     * (3) Latitude-longitude in the DDD format, for example, 41.40338, 2.17403
     *
     * Generated from protobuf field <code>string item_address = 6;</code>
     * @return string
     */
    public function getItemAddress()
    {
        return $this->item_address;
    }

    /**
     * Item address which can be specified in one of the following formats.
     * (1) City, state, code, country, for example, Mountain View, CA, USA.
     * (2) Full address, for example, 123 Boulevard St, Mountain View, CA 94043.
     * (3) Latitude-longitude in the DDD format, for example, 41.40338, 2.17403
     *
     * Generated from protobuf field <code>string item_address = 6;</code>
     * @param string $var
     * @return $this
     */
    public function setItemAddress($var)
    {
        GPBUtil::checkString($var, True);
        $this->item_address = $var;

        return $this;
    }

    /**
     * Item category, for example, Sedans.
     *
     * Generated from protobuf field <code>string item_category = 7;</code>
     * @return string
     */
    public function getItemCategory()
    {
        return $this->item_category;
    }

    /**
     * Item category, for example, Sedans.
     *
     * Generated from protobuf field <code>string item_category = 7;</code>
     * @param string $var
     * @return $this
     */
    public function setItemCategory($var)
    {
        GPBUtil::checkString($var, True);
        $this->item_category = $var;

        return $this;
    }

    /**
     * Price which can be number followed by the alphabetic currency code,
     * ISO 4217 standard. Use '.' as the decimal mark, for example, 20,000.00 USD.
     *
     * Generated from protobuf field <code>string price = 8;</code>
     * @return string
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Price which can be number followed by the alphabetic currency code,
     * ISO 4217 standard. Use '.' as the decimal mark, for example, 20,000.00 USD.
     *
     * Generated from protobuf field <code>string price = 8;</code>
     * @param string $var
     * @return $this
     */
    public function setPrice($var)
    {
        GPBUtil::checkString($var, True);
        $this->price = $var;

        return $this;
    }

    /**
     * Sale price which can be number followed by the alphabetic currency code,
     * ISO 4217 standard. Use '.' as the decimal mark, for example, 15,000.00 USD.
     * Must be less than the 'price' field.
     *
     * Generated from protobuf field <code>string sale_price = 9;</code>
     * @return string
     */
    public function getSalePrice()
    {
        return $this->sale_price;
    }

    /**
     * Sale price which can be number followed by the alphabetic currency code,
     * ISO 4217 standard. Use '.' as the decimal mark, for example, 15,000.00 USD.
     * Must be less than the 'price' field.
     *
     * Generated from protobuf field <code>string sale_price = 9;</code>
     * @param string $var
     * @return $this
     */
    public function setSalePrice($var)
    {
        GPBUtil::checkString($var, True);
        $this->sale_price = $var;

        return $this;
    }

    /**
     * Formatted price which can be any characters. If set, this attribute will be
     * used instead of 'price', for example, Starting at $20,000.00.
     *
     * Generated from protobuf field <code>string formatted_price = 10;</code>
     * @return string
     */
    public function getFormattedPrice()
    {
        return $this->formatted_price;
    }

    /**
     * Formatted price which can be any characters. If set, this attribute will be
     * used instead of 'price', for example, Starting at $20,000.00.
     *
     * Generated from protobuf field <code>string formatted_price = 10;</code>
     * @param string $var
     * @return $this
     */
    public function setFormattedPrice($var)
    {
        GPBUtil::checkString($var, True);
        $this->formatted_price = $var;

        return $this;
    }

    /**
     * Formatted sale price which can be any characters. If set, this attribute
     * will be used instead of 'sale price', for example, On sale for $15,000.00.
     *
     * Generated from protobuf field <code>string formatted_sale_price = 11;</code>
     * @return string
     */
    public function getFormattedSalePrice()
    {
        return $this->formatted_sale_price;
    }

    /**
     * Formatted sale price which can be any characters. If set, this attribute
     * will be used instead of 'sale price', for example, On sale for $15,000.00.
     *
     * Generated from protobuf field <code>string formatted_sale_price = 11;</code>
     * @param string $var
     * @return $this
     */
    public function setFormattedSalePrice($var)
    {
        GPBUtil::checkString($var, True);
        $this->formatted_sale_price = $var;

        return $this;
    }

    /**
     * Image URL, for example, http://www.example.com/image.png. The image will
     * not be uploaded as image asset.
     *
     * Generated from protobuf field <code>string image_url = 12;</code>
     * @return string
     */
    public function getImageUrl()
    {
        return $this->image_url;
    }

    /**
     * Image URL, for example, http://www.example.com/image.png. The image will
     * not be uploaded as image asset.
     *
     * Generated from protobuf field <code>string image_url = 12;</code>
     * @param string $var
     * @return $this
     */
    public function setImageUrl($var)
    {
        GPBUtil::checkString($var, True);
        $this->image_url = $var;

        return $this;
    }

    /**
     * Contextual keywords, for example, Sedans, 4 door sedans.
     *
     * Generated from protobuf field <code>repeated string contextual_keywords = 13;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getContextualKeywords()
    {
        return $this->contextual_keywords;
    }

    /**
     * Contextual keywords, for example, Sedans, 4 door sedans.
     *
     * Generated from protobuf field <code>repeated string contextual_keywords = 13;</code>
     * @param array<string>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setContextualKeywords($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::STRING);
        $this->contextual_keywords = $arr;

        return $this;
    }

    /**
     * Android deep link, for example,
     * android-app://com.example.android/http/example.com/gizmos?1234.
     *
     * Generated from protobuf field <code>string android_app_link = 14;</code>
     * @return string
     */
    public function getAndroidAppLink()
    {
        return $this->android_app_link;
    }

    /**
     * Android deep link, for example,
     * android-app://com.example.android/http/example.com/gizmos?1234.
     *
     * Generated from protobuf field <code>string android_app_link = 14;</code>
     * @param string $var
     * @return $this
     */
    public function setAndroidAppLink($var)
    {
        GPBUtil::checkString($var, True);
        $this->android_app_link = $var;

        return $this;
    }

    /**
     * iOS deep link, for example, exampleApp://content/page.
     *
     * Generated from protobuf field <code>string ios_app_link = 16;</code>
     * @return string
     */
    public function getIosAppLink()
    {
        return $this->ios_app_link;
    }

    /**
     * iOS deep link, for example, exampleApp://content/page.
     *
     * Generated from protobuf field <code>string ios_app_link = 16;</code>
     * @param string $var
     * @return $this
     */
    public function setIosAppLink($var)
    {
        GPBUtil::checkString($var, True);
        $this->ios_app_link = $var;

        return $this;
    }

    /**
     * iOS app store ID. This is used to check if the user has the app installed
     * on their device before deep linking. If this field is set, then the
     * ios_app_link field must also be present.
     *
     * Generated from protobuf field <code>int64 ios_app_store_id = 17;</code>
     * @return int|string
     */
    public function getIosAppStoreId()
    {
        return $this->ios_app_store_id;
    }

    /**
     * iOS app store ID. This is used to check if the user has the app installed
     * on their device before deep linking. If this field is set, then the
     * ios_app_link field must also be present.
     *
     * Generated from protobuf field <code>int64 ios_app_store_id = 17;</code>
     * @param int|string $var
     * @return $this
     */
    public function setIosAppStoreId($var)
    {
        GPBUtil::checkInt64($var);
        $this->ios_app_store_id = $var;

        return $this;
    }

    /**
     * Similar IDs.
     *
     * Generated from protobuf field <code>repeated string similar_ids = 15;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getSimilarIds()
    {
        return $this->similar_ids;
    }

    /**
     * Similar IDs.
     *
     * Generated from protobuf field <code>repeated string similar_ids = 15;</code>
     * @param array<string>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setSimilarIds($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::STRING);
        $this->similar_ids = $arr;

        return $this;
    }

}

