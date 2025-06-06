<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/common/asset_types.proto

namespace Google\Ads\GoogleAds\V20\Common;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * A Dynamic Education asset.
 *
 * Generated from protobuf message <code>google.ads.googleads.v20.common.DynamicEducationAsset</code>
 */
class DynamicEducationAsset extends \Google\Protobuf\Internal\Message
{
    /**
     * Required. Program ID which can be any sequence of letters and digits, and
     * must be unique and match the values of remarketing tag. Required.
     *
     * Generated from protobuf field <code>string program_id = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    protected $program_id = '';
    /**
     * Location ID which can be any sequence of letters and digits and must be
     * unique.
     *
     * Generated from protobuf field <code>string location_id = 2;</code>
     */
    protected $location_id = '';
    /**
     * Required. Program name, for example, Nursing. Required.
     *
     * Generated from protobuf field <code>string program_name = 3 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    protected $program_name = '';
    /**
     * Subject of study, for example, Health.
     *
     * Generated from protobuf field <code>string subject = 4;</code>
     */
    protected $subject = '';
    /**
     * Program description, for example, Nursing Certification.
     *
     * Generated from protobuf field <code>string program_description = 5;</code>
     */
    protected $program_description = '';
    /**
     * School name, for example, Mountain View School of Nursing.
     *
     * Generated from protobuf field <code>string school_name = 6;</code>
     */
    protected $school_name = '';
    /**
     * School address which can be specified in one of the following formats.
     * (1) City, state, code, country, for example, Mountain View, CA, USA.
     * (2) Full address, for example, 123 Boulevard St, Mountain View, CA 94043.
     * (3) Latitude-longitude in the DDD format, for example, 41.40338, 2.17403
     *
     * Generated from protobuf field <code>string address = 7;</code>
     */
    protected $address = '';
    /**
     * Contextual keywords, for example, Nursing certification, Health, Mountain
     * View.
     *
     * Generated from protobuf field <code>repeated string contextual_keywords = 8;</code>
     */
    private $contextual_keywords;
    /**
     * Android deep link, for example,
     * android-app://com.example.android/http/example.com/gizmos?1234.
     *
     * Generated from protobuf field <code>string android_app_link = 9;</code>
     */
    protected $android_app_link = '';
    /**
     * Similar program IDs.
     *
     * Generated from protobuf field <code>repeated string similar_program_ids = 10;</code>
     */
    private $similar_program_ids;
    /**
     * iOS deep link, for example, exampleApp://content/page.
     *
     * Generated from protobuf field <code>string ios_app_link = 11;</code>
     */
    protected $ios_app_link = '';
    /**
     * iOS app store ID. This is used to check if the user has the app installed
     * on their device before deep linking. If this field is set, then the
     * ios_app_link field must also be present.
     *
     * Generated from protobuf field <code>int64 ios_app_store_id = 12;</code>
     */
    protected $ios_app_store_id = 0;
    /**
     * Thumbnail image url, for example, http://www.example.com/thumbnail.png. The
     * thumbnail image will not be uploaded as image asset.
     *
     * Generated from protobuf field <code>string thumbnail_image_url = 13;</code>
     */
    protected $thumbnail_image_url = '';
    /**
     * Image url, for example, http://www.example.com/image.png. The image will
     * not be uploaded as image asset.
     *
     * Generated from protobuf field <code>string image_url = 14;</code>
     */
    protected $image_url = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $program_id
     *           Required. Program ID which can be any sequence of letters and digits, and
     *           must be unique and match the values of remarketing tag. Required.
     *     @type string $location_id
     *           Location ID which can be any sequence of letters and digits and must be
     *           unique.
     *     @type string $program_name
     *           Required. Program name, for example, Nursing. Required.
     *     @type string $subject
     *           Subject of study, for example, Health.
     *     @type string $program_description
     *           Program description, for example, Nursing Certification.
     *     @type string $school_name
     *           School name, for example, Mountain View School of Nursing.
     *     @type string $address
     *           School address which can be specified in one of the following formats.
     *           (1) City, state, code, country, for example, Mountain View, CA, USA.
     *           (2) Full address, for example, 123 Boulevard St, Mountain View, CA 94043.
     *           (3) Latitude-longitude in the DDD format, for example, 41.40338, 2.17403
     *     @type array<string>|\Google\Protobuf\Internal\RepeatedField $contextual_keywords
     *           Contextual keywords, for example, Nursing certification, Health, Mountain
     *           View.
     *     @type string $android_app_link
     *           Android deep link, for example,
     *           android-app://com.example.android/http/example.com/gizmos?1234.
     *     @type array<string>|\Google\Protobuf\Internal\RepeatedField $similar_program_ids
     *           Similar program IDs.
     *     @type string $ios_app_link
     *           iOS deep link, for example, exampleApp://content/page.
     *     @type int|string $ios_app_store_id
     *           iOS app store ID. This is used to check if the user has the app installed
     *           on their device before deep linking. If this field is set, then the
     *           ios_app_link field must also be present.
     *     @type string $thumbnail_image_url
     *           Thumbnail image url, for example, http://www.example.com/thumbnail.png. The
     *           thumbnail image will not be uploaded as image asset.
     *     @type string $image_url
     *           Image url, for example, http://www.example.com/image.png. The image will
     *           not be uploaded as image asset.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V20\Common\AssetTypes::initOnce();
        parent::__construct($data);
    }

    /**
     * Required. Program ID which can be any sequence of letters and digits, and
     * must be unique and match the values of remarketing tag. Required.
     *
     * Generated from protobuf field <code>string program_id = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return string
     */
    public function getProgramId()
    {
        return $this->program_id;
    }

    /**
     * Required. Program ID which can be any sequence of letters and digits, and
     * must be unique and match the values of remarketing tag. Required.
     *
     * Generated from protobuf field <code>string program_id = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param string $var
     * @return $this
     */
    public function setProgramId($var)
    {
        GPBUtil::checkString($var, True);
        $this->program_id = $var;

        return $this;
    }

    /**
     * Location ID which can be any sequence of letters and digits and must be
     * unique.
     *
     * Generated from protobuf field <code>string location_id = 2;</code>
     * @return string
     */
    public function getLocationId()
    {
        return $this->location_id;
    }

    /**
     * Location ID which can be any sequence of letters and digits and must be
     * unique.
     *
     * Generated from protobuf field <code>string location_id = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setLocationId($var)
    {
        GPBUtil::checkString($var, True);
        $this->location_id = $var;

        return $this;
    }

    /**
     * Required. Program name, for example, Nursing. Required.
     *
     * Generated from protobuf field <code>string program_name = 3 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return string
     */
    public function getProgramName()
    {
        return $this->program_name;
    }

    /**
     * Required. Program name, for example, Nursing. Required.
     *
     * Generated from protobuf field <code>string program_name = 3 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param string $var
     * @return $this
     */
    public function setProgramName($var)
    {
        GPBUtil::checkString($var, True);
        $this->program_name = $var;

        return $this;
    }

    /**
     * Subject of study, for example, Health.
     *
     * Generated from protobuf field <code>string subject = 4;</code>
     * @return string
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * Subject of study, for example, Health.
     *
     * Generated from protobuf field <code>string subject = 4;</code>
     * @param string $var
     * @return $this
     */
    public function setSubject($var)
    {
        GPBUtil::checkString($var, True);
        $this->subject = $var;

        return $this;
    }

    /**
     * Program description, for example, Nursing Certification.
     *
     * Generated from protobuf field <code>string program_description = 5;</code>
     * @return string
     */
    public function getProgramDescription()
    {
        return $this->program_description;
    }

    /**
     * Program description, for example, Nursing Certification.
     *
     * Generated from protobuf field <code>string program_description = 5;</code>
     * @param string $var
     * @return $this
     */
    public function setProgramDescription($var)
    {
        GPBUtil::checkString($var, True);
        $this->program_description = $var;

        return $this;
    }

    /**
     * School name, for example, Mountain View School of Nursing.
     *
     * Generated from protobuf field <code>string school_name = 6;</code>
     * @return string
     */
    public function getSchoolName()
    {
        return $this->school_name;
    }

    /**
     * School name, for example, Mountain View School of Nursing.
     *
     * Generated from protobuf field <code>string school_name = 6;</code>
     * @param string $var
     * @return $this
     */
    public function setSchoolName($var)
    {
        GPBUtil::checkString($var, True);
        $this->school_name = $var;

        return $this;
    }

    /**
     * School address which can be specified in one of the following formats.
     * (1) City, state, code, country, for example, Mountain View, CA, USA.
     * (2) Full address, for example, 123 Boulevard St, Mountain View, CA 94043.
     * (3) Latitude-longitude in the DDD format, for example, 41.40338, 2.17403
     *
     * Generated from protobuf field <code>string address = 7;</code>
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * School address which can be specified in one of the following formats.
     * (1) City, state, code, country, for example, Mountain View, CA, USA.
     * (2) Full address, for example, 123 Boulevard St, Mountain View, CA 94043.
     * (3) Latitude-longitude in the DDD format, for example, 41.40338, 2.17403
     *
     * Generated from protobuf field <code>string address = 7;</code>
     * @param string $var
     * @return $this
     */
    public function setAddress($var)
    {
        GPBUtil::checkString($var, True);
        $this->address = $var;

        return $this;
    }

    /**
     * Contextual keywords, for example, Nursing certification, Health, Mountain
     * View.
     *
     * Generated from protobuf field <code>repeated string contextual_keywords = 8;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getContextualKeywords()
    {
        return $this->contextual_keywords;
    }

    /**
     * Contextual keywords, for example, Nursing certification, Health, Mountain
     * View.
     *
     * Generated from protobuf field <code>repeated string contextual_keywords = 8;</code>
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
     * Generated from protobuf field <code>string android_app_link = 9;</code>
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
     * Generated from protobuf field <code>string android_app_link = 9;</code>
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
     * Similar program IDs.
     *
     * Generated from protobuf field <code>repeated string similar_program_ids = 10;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getSimilarProgramIds()
    {
        return $this->similar_program_ids;
    }

    /**
     * Similar program IDs.
     *
     * Generated from protobuf field <code>repeated string similar_program_ids = 10;</code>
     * @param array<string>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setSimilarProgramIds($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::STRING);
        $this->similar_program_ids = $arr;

        return $this;
    }

    /**
     * iOS deep link, for example, exampleApp://content/page.
     *
     * Generated from protobuf field <code>string ios_app_link = 11;</code>
     * @return string
     */
    public function getIosAppLink()
    {
        return $this->ios_app_link;
    }

    /**
     * iOS deep link, for example, exampleApp://content/page.
     *
     * Generated from protobuf field <code>string ios_app_link = 11;</code>
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
     * Generated from protobuf field <code>int64 ios_app_store_id = 12;</code>
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
     * Generated from protobuf field <code>int64 ios_app_store_id = 12;</code>
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
     * Thumbnail image url, for example, http://www.example.com/thumbnail.png. The
     * thumbnail image will not be uploaded as image asset.
     *
     * Generated from protobuf field <code>string thumbnail_image_url = 13;</code>
     * @return string
     */
    public function getThumbnailImageUrl()
    {
        return $this->thumbnail_image_url;
    }

    /**
     * Thumbnail image url, for example, http://www.example.com/thumbnail.png. The
     * thumbnail image will not be uploaded as image asset.
     *
     * Generated from protobuf field <code>string thumbnail_image_url = 13;</code>
     * @param string $var
     * @return $this
     */
    public function setThumbnailImageUrl($var)
    {
        GPBUtil::checkString($var, True);
        $this->thumbnail_image_url = $var;

        return $this;
    }

    /**
     * Image url, for example, http://www.example.com/image.png. The image will
     * not be uploaded as image asset.
     *
     * Generated from protobuf field <code>string image_url = 14;</code>
     * @return string
     */
    public function getImageUrl()
    {
        return $this->image_url;
    }

    /**
     * Image url, for example, http://www.example.com/image.png. The image will
     * not be uploaded as image asset.
     *
     * Generated from protobuf field <code>string image_url = 14;</code>
     * @param string $var
     * @return $this
     */
    public function setImageUrl($var)
    {
        GPBUtil::checkString($var, True);
        $this->image_url = $var;

        return $this;
    }

}

