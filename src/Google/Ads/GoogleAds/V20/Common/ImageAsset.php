<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/common/asset_types.proto

namespace Google\Ads\GoogleAds\V20\Common;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * An Image asset.
 *
 * Generated from protobuf message <code>google.ads.googleads.v20.common.ImageAsset</code>
 */
class ImageAsset extends \Google\Protobuf\Internal\Message
{
    /**
     * The raw bytes data of an image. This field is mutate only.
     *
     * Generated from protobuf field <code>optional bytes data = 5;</code>
     */
    protected $data = null;
    /**
     * File size of the image asset in bytes.
     *
     * Generated from protobuf field <code>optional int64 file_size = 6;</code>
     */
    protected $file_size = null;
    /**
     * MIME type of the image asset.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.enums.MimeTypeEnum.MimeType mime_type = 3;</code>
     */
    protected $mime_type = 0;
    /**
     * Metadata for this image at its original size.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.common.ImageDimension full_size = 4;</code>
     */
    protected $full_size = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $data
     *           The raw bytes data of an image. This field is mutate only.
     *     @type int|string $file_size
     *           File size of the image asset in bytes.
     *     @type int $mime_type
     *           MIME type of the image asset.
     *     @type \Google\Ads\GoogleAds\V20\Common\ImageDimension $full_size
     *           Metadata for this image at its original size.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V20\Common\AssetTypes::initOnce();
        parent::__construct($data);
    }

    /**
     * The raw bytes data of an image. This field is mutate only.
     *
     * Generated from protobuf field <code>optional bytes data = 5;</code>
     * @return string
     */
    public function getData()
    {
        return isset($this->data) ? $this->data : '';
    }

    public function hasData()
    {
        return isset($this->data);
    }

    public function clearData()
    {
        unset($this->data);
    }

    /**
     * The raw bytes data of an image. This field is mutate only.
     *
     * Generated from protobuf field <code>optional bytes data = 5;</code>
     * @param string $var
     * @return $this
     */
    public function setData($var)
    {
        GPBUtil::checkString($var, False);
        $this->data = $var;

        return $this;
    }

    /**
     * File size of the image asset in bytes.
     *
     * Generated from protobuf field <code>optional int64 file_size = 6;</code>
     * @return int|string
     */
    public function getFileSize()
    {
        return isset($this->file_size) ? $this->file_size : 0;
    }

    public function hasFileSize()
    {
        return isset($this->file_size);
    }

    public function clearFileSize()
    {
        unset($this->file_size);
    }

    /**
     * File size of the image asset in bytes.
     *
     * Generated from protobuf field <code>optional int64 file_size = 6;</code>
     * @param int|string $var
     * @return $this
     */
    public function setFileSize($var)
    {
        GPBUtil::checkInt64($var);
        $this->file_size = $var;

        return $this;
    }

    /**
     * MIME type of the image asset.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.enums.MimeTypeEnum.MimeType mime_type = 3;</code>
     * @return int
     */
    public function getMimeType()
    {
        return $this->mime_type;
    }

    /**
     * MIME type of the image asset.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.enums.MimeTypeEnum.MimeType mime_type = 3;</code>
     * @param int $var
     * @return $this
     */
    public function setMimeType($var)
    {
        GPBUtil::checkEnum($var, \Google\Ads\GoogleAds\V20\Enums\MimeTypeEnum\MimeType::class);
        $this->mime_type = $var;

        return $this;
    }

    /**
     * Metadata for this image at its original size.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.common.ImageDimension full_size = 4;</code>
     * @return \Google\Ads\GoogleAds\V20\Common\ImageDimension|null
     */
    public function getFullSize()
    {
        return $this->full_size;
    }

    public function hasFullSize()
    {
        return isset($this->full_size);
    }

    public function clearFullSize()
    {
        unset($this->full_size);
    }

    /**
     * Metadata for this image at its original size.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.common.ImageDimension full_size = 4;</code>
     * @param \Google\Ads\GoogleAds\V20\Common\ImageDimension $var
     * @return $this
     */
    public function setFullSize($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V20\Common\ImageDimension::class);
        $this->full_size = $var;

        return $this;
    }

}

