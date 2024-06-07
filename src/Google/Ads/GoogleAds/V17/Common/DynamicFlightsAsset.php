<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v17/common/asset_types.proto

namespace Google\Ads\GoogleAds\V17\Common;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * A dynamic flights asset.
 *
 * Generated from protobuf message <code>google.ads.googleads.v17.common.DynamicFlightsAsset</code>
 */
class DynamicFlightsAsset extends \Google\Protobuf\Internal\Message
{
    /**
     * Required. Destination ID which can be any sequence of letters and digits,
     * and must be unique and match the values of remarketing tag. Required.
     *
     * Generated from protobuf field <code>string destination_id = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    protected $destination_id = '';
    /**
     * Origin ID which can be any sequence of letters and digits. The ID sequence
     * (destination ID + origin ID) must be unique.
     *
     * Generated from protobuf field <code>string origin_id = 2;</code>
     */
    protected $origin_id = '';
    /**
     * Required. Flight description, for example, Book your ticket. Required.
     *
     * Generated from protobuf field <code>string flight_description = 3 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    protected $flight_description = '';
    /**
     * Image URL, for example, http://www.example.com/image.png. The image will
     * not be uploaded as image asset.
     *
     * Generated from protobuf field <code>string image_url = 4;</code>
     */
    protected $image_url = '';
    /**
     * Destination name, for example, Paris.
     *
     * Generated from protobuf field <code>string destination_name = 5;</code>
     */
    protected $destination_name = '';
    /**
     * Origin name, for example, London.
     *
     * Generated from protobuf field <code>string origin_name = 6;</code>
     */
    protected $origin_name = '';
    /**
     * Flight price which can be number followed by the alphabetic currency code,
     * ISO 4217 standard. Use '.' as the decimal mark, for example, 100.00 USD.
     *
     * Generated from protobuf field <code>string flight_price = 7;</code>
     */
    protected $flight_price = '';
    /**
     * Flight sale price which can be number followed by the alphabetic currency
     * code, ISO 4217 standard. Use '.' as the decimal mark, for example, 80.00
     * USD. Must be less than the 'flight_price' field.
     *
     * Generated from protobuf field <code>string flight_sale_price = 8;</code>
     */
    protected $flight_sale_price = '';
    /**
     * Formatted price which can be any characters. If set, this attribute will be
     * used instead of 'price', for example, Starting at $100.00.
     *
     * Generated from protobuf field <code>string formatted_price = 9;</code>
     */
    protected $formatted_price = '';
    /**
     * Formatted sale price which can be any characters. If set, this attribute
     * will be used instead of 'sale price', for example, On sale for $80.00.
     *
     * Generated from protobuf field <code>string formatted_sale_price = 10;</code>
     */
    protected $formatted_sale_price = '';
    /**
     * Android deep link, for example,
     * android-app://com.example.android/http/example.com/gizmos?1234.
     *
     * Generated from protobuf field <code>string android_app_link = 11;</code>
     */
    protected $android_app_link = '';
    /**
     * iOS deep link, for example, exampleApp://content/page.
     *
     * Generated from protobuf field <code>string ios_app_link = 12;</code>
     */
    protected $ios_app_link = '';
    /**
     * iOS app store ID. This is used to check if the user has the app installed
     * on their device before deep linking. If this field is set, then the
     * ios_app_link field must also be present.
     *
     * Generated from protobuf field <code>int64 ios_app_store_id = 13;</code>
     */
    protected $ios_app_store_id = 0;
    /**
     * Similar destination IDs, for example, PAR,LON.
     *
     * Generated from protobuf field <code>repeated string similar_destination_ids = 14;</code>
     */
    private $similar_destination_ids;
    /**
     * A custom field which can be multiple key to values mapping separated by
     * delimiters (",", "|" and ":"), in the forms of
     * "<KEY_1>: <VALUE_1>, <VALUE_2>, ... ,<VALUE_N> | <KEY_2>: <VALUE_1>, ...
     * ,<VALUE_N> | ... | <KEY_N>: <VALUE_1>, ... ,<VALUE_N>" for example, wifi:
     * most | aircraft: 320, 77W | flights: 42 | legroom: 32".
     *
     * Generated from protobuf field <code>string custom_mapping = 15;</code>
     */
    protected $custom_mapping = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $destination_id
     *           Required. Destination ID which can be any sequence of letters and digits,
     *           and must be unique and match the values of remarketing tag. Required.
     *     @type string $origin_id
     *           Origin ID which can be any sequence of letters and digits. The ID sequence
     *           (destination ID + origin ID) must be unique.
     *     @type string $flight_description
     *           Required. Flight description, for example, Book your ticket. Required.
     *     @type string $image_url
     *           Image URL, for example, http://www.example.com/image.png. The image will
     *           not be uploaded as image asset.
     *     @type string $destination_name
     *           Destination name, for example, Paris.
     *     @type string $origin_name
     *           Origin name, for example, London.
     *     @type string $flight_price
     *           Flight price which can be number followed by the alphabetic currency code,
     *           ISO 4217 standard. Use '.' as the decimal mark, for example, 100.00 USD.
     *     @type string $flight_sale_price
     *           Flight sale price which can be number followed by the alphabetic currency
     *           code, ISO 4217 standard. Use '.' as the decimal mark, for example, 80.00
     *           USD. Must be less than the 'flight_price' field.
     *     @type string $formatted_price
     *           Formatted price which can be any characters. If set, this attribute will be
     *           used instead of 'price', for example, Starting at $100.00.
     *     @type string $formatted_sale_price
     *           Formatted sale price which can be any characters. If set, this attribute
     *           will be used instead of 'sale price', for example, On sale for $80.00.
     *     @type string $android_app_link
     *           Android deep link, for example,
     *           android-app://com.example.android/http/example.com/gizmos?1234.
     *     @type string $ios_app_link
     *           iOS deep link, for example, exampleApp://content/page.
     *     @type int|string $ios_app_store_id
     *           iOS app store ID. This is used to check if the user has the app installed
     *           on their device before deep linking. If this field is set, then the
     *           ios_app_link field must also be present.
     *     @type array<string>|\Google\Protobuf\Internal\RepeatedField $similar_destination_ids
     *           Similar destination IDs, for example, PAR,LON.
     *     @type string $custom_mapping
     *           A custom field which can be multiple key to values mapping separated by
     *           delimiters (",", "|" and ":"), in the forms of
     *           "<KEY_1>: <VALUE_1>, <VALUE_2>, ... ,<VALUE_N> | <KEY_2>: <VALUE_1>, ...
     *           ,<VALUE_N> | ... | <KEY_N>: <VALUE_1>, ... ,<VALUE_N>" for example, wifi:
     *           most | aircraft: 320, 77W | flights: 42 | legroom: 32".
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V17\Common\AssetTypes::initOnce();
        parent::__construct($data);
    }

    /**
     * Required. Destination ID which can be any sequence of letters and digits,
     * and must be unique and match the values of remarketing tag. Required.
     *
     * Generated from protobuf field <code>string destination_id = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return string
     */
    public function getDestinationId()
    {
        return $this->destination_id;
    }

    /**
     * Required. Destination ID which can be any sequence of letters and digits,
     * and must be unique and match the values of remarketing tag. Required.
     *
     * Generated from protobuf field <code>string destination_id = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param string $var
     * @return $this
     */
    public function setDestinationId($var)
    {
        GPBUtil::checkString($var, True);
        $this->destination_id = $var;

        return $this;
    }

    /**
     * Origin ID which can be any sequence of letters and digits. The ID sequence
     * (destination ID + origin ID) must be unique.
     *
     * Generated from protobuf field <code>string origin_id = 2;</code>
     * @return string
     */
    public function getOriginId()
    {
        return $this->origin_id;
    }

    /**
     * Origin ID which can be any sequence of letters and digits. The ID sequence
     * (destination ID + origin ID) must be unique.
     *
     * Generated from protobuf field <code>string origin_id = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setOriginId($var)
    {
        GPBUtil::checkString($var, True);
        $this->origin_id = $var;

        return $this;
    }

    /**
     * Required. Flight description, for example, Book your ticket. Required.
     *
     * Generated from protobuf field <code>string flight_description = 3 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return string
     */
    public function getFlightDescription()
    {
        return $this->flight_description;
    }

    /**
     * Required. Flight description, for example, Book your ticket. Required.
     *
     * Generated from protobuf field <code>string flight_description = 3 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param string $var
     * @return $this
     */
    public function setFlightDescription($var)
    {
        GPBUtil::checkString($var, True);
        $this->flight_description = $var;

        return $this;
    }

    /**
     * Image URL, for example, http://www.example.com/image.png. The image will
     * not be uploaded as image asset.
     *
     * Generated from protobuf field <code>string image_url = 4;</code>
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
     * Generated from protobuf field <code>string image_url = 4;</code>
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
     * Destination name, for example, Paris.
     *
     * Generated from protobuf field <code>string destination_name = 5;</code>
     * @return string
     */
    public function getDestinationName()
    {
        return $this->destination_name;
    }

    /**
     * Destination name, for example, Paris.
     *
     * Generated from protobuf field <code>string destination_name = 5;</code>
     * @param string $var
     * @return $this
     */
    public function setDestinationName($var)
    {
        GPBUtil::checkString($var, True);
        $this->destination_name = $var;

        return $this;
    }

    /**
     * Origin name, for example, London.
     *
     * Generated from protobuf field <code>string origin_name = 6;</code>
     * @return string
     */
    public function getOriginName()
    {
        return $this->origin_name;
    }

    /**
     * Origin name, for example, London.
     *
     * Generated from protobuf field <code>string origin_name = 6;</code>
     * @param string $var
     * @return $this
     */
    public function setOriginName($var)
    {
        GPBUtil::checkString($var, True);
        $this->origin_name = $var;

        return $this;
    }

    /**
     * Flight price which can be number followed by the alphabetic currency code,
     * ISO 4217 standard. Use '.' as the decimal mark, for example, 100.00 USD.
     *
     * Generated from protobuf field <code>string flight_price = 7;</code>
     * @return string
     */
    public function getFlightPrice()
    {
        return $this->flight_price;
    }

    /**
     * Flight price which can be number followed by the alphabetic currency code,
     * ISO 4217 standard. Use '.' as the decimal mark, for example, 100.00 USD.
     *
     * Generated from protobuf field <code>string flight_price = 7;</code>
     * @param string $var
     * @return $this
     */
    public function setFlightPrice($var)
    {
        GPBUtil::checkString($var, True);
        $this->flight_price = $var;

        return $this;
    }

    /**
     * Flight sale price which can be number followed by the alphabetic currency
     * code, ISO 4217 standard. Use '.' as the decimal mark, for example, 80.00
     * USD. Must be less than the 'flight_price' field.
     *
     * Generated from protobuf field <code>string flight_sale_price = 8;</code>
     * @return string
     */
    public function getFlightSalePrice()
    {
        return $this->flight_sale_price;
    }

    /**
     * Flight sale price which can be number followed by the alphabetic currency
     * code, ISO 4217 standard. Use '.' as the decimal mark, for example, 80.00
     * USD. Must be less than the 'flight_price' field.
     *
     * Generated from protobuf field <code>string flight_sale_price = 8;</code>
     * @param string $var
     * @return $this
     */
    public function setFlightSalePrice($var)
    {
        GPBUtil::checkString($var, True);
        $this->flight_sale_price = $var;

        return $this;
    }

    /**
     * Formatted price which can be any characters. If set, this attribute will be
     * used instead of 'price', for example, Starting at $100.00.
     *
     * Generated from protobuf field <code>string formatted_price = 9;</code>
     * @return string
     */
    public function getFormattedPrice()
    {
        return $this->formatted_price;
    }

    /**
     * Formatted price which can be any characters. If set, this attribute will be
     * used instead of 'price', for example, Starting at $100.00.
     *
     * Generated from protobuf field <code>string formatted_price = 9;</code>
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
     * will be used instead of 'sale price', for example, On sale for $80.00.
     *
     * Generated from protobuf field <code>string formatted_sale_price = 10;</code>
     * @return string
     */
    public function getFormattedSalePrice()
    {
        return $this->formatted_sale_price;
    }

    /**
     * Formatted sale price which can be any characters. If set, this attribute
     * will be used instead of 'sale price', for example, On sale for $80.00.
     *
     * Generated from protobuf field <code>string formatted_sale_price = 10;</code>
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
     * Android deep link, for example,
     * android-app://com.example.android/http/example.com/gizmos?1234.
     *
     * Generated from protobuf field <code>string android_app_link = 11;</code>
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
     * Generated from protobuf field <code>string android_app_link = 11;</code>
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
     * Generated from protobuf field <code>string ios_app_link = 12;</code>
     * @return string
     */
    public function getIosAppLink()
    {
        return $this->ios_app_link;
    }

    /**
     * iOS deep link, for example, exampleApp://content/page.
     *
     * Generated from protobuf field <code>string ios_app_link = 12;</code>
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
     * Generated from protobuf field <code>int64 ios_app_store_id = 13;</code>
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
     * Generated from protobuf field <code>int64 ios_app_store_id = 13;</code>
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
     * Similar destination IDs, for example, PAR,LON.
     *
     * Generated from protobuf field <code>repeated string similar_destination_ids = 14;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getSimilarDestinationIds()
    {
        return $this->similar_destination_ids;
    }

    /**
     * Similar destination IDs, for example, PAR,LON.
     *
     * Generated from protobuf field <code>repeated string similar_destination_ids = 14;</code>
     * @param array<string>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setSimilarDestinationIds($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::STRING);
        $this->similar_destination_ids = $arr;

        return $this;
    }

    /**
     * A custom field which can be multiple key to values mapping separated by
     * delimiters (",", "|" and ":"), in the forms of
     * "<KEY_1>: <VALUE_1>, <VALUE_2>, ... ,<VALUE_N> | <KEY_2>: <VALUE_1>, ...
     * ,<VALUE_N> | ... | <KEY_N>: <VALUE_1>, ... ,<VALUE_N>" for example, wifi:
     * most | aircraft: 320, 77W | flights: 42 | legroom: 32".
     *
     * Generated from protobuf field <code>string custom_mapping = 15;</code>
     * @return string
     */
    public function getCustomMapping()
    {
        return $this->custom_mapping;
    }

    /**
     * A custom field which can be multiple key to values mapping separated by
     * delimiters (",", "|" and ":"), in the forms of
     * "<KEY_1>: <VALUE_1>, <VALUE_2>, ... ,<VALUE_N> | <KEY_2>: <VALUE_1>, ...
     * ,<VALUE_N> | ... | <KEY_N>: <VALUE_1>, ... ,<VALUE_N>" for example, wifi:
     * most | aircraft: 320, 77W | flights: 42 | legroom: 32".
     *
     * Generated from protobuf field <code>string custom_mapping = 15;</code>
     * @param string $var
     * @return $this
     */
    public function setCustomMapping($var)
    {
        GPBUtil::checkString($var, True);
        $this->custom_mapping = $var;

        return $this;
    }

}

