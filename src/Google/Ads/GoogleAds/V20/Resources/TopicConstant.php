<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/resources/topic_constant.proto

namespace Google\Ads\GoogleAds\V20\Resources;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Use topics to target or exclude placements in the Google Display Network
 * based on the category into which the placement falls (for example,
 * "Pets & Animals/Pets/Dogs").
 *
 * Generated from protobuf message <code>google.ads.googleads.v20.resources.TopicConstant</code>
 */
class TopicConstant extends \Google\Protobuf\Internal\Message
{
    /**
     * Output only. The resource name of the topic constant.
     * topic constant resource names have the form:
     * `topicConstants/{topic_id}`
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     */
    protected $resource_name = '';
    /**
     * Output only. The ID of the topic.
     *
     * Generated from protobuf field <code>optional int64 id = 5 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $id = null;
    /**
     * Output only. Resource name of parent of the topic constant.
     *
     * Generated from protobuf field <code>optional string topic_constant_parent = 6 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     */
    protected $topic_constant_parent = null;
    /**
     * Output only. The category to target or exclude. Each subsequent element in
     * the array describes a more specific sub-category. For example,
     * {"Pets & Animals", "Pets", "Dogs"} represents the
     * "Pets & Animals/Pets/Dogs" category. List of available topic categories at
     * https://developers.google.com/google-ads/api/reference/data/verticals
     *
     * Generated from protobuf field <code>repeated string path = 7 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $path;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $resource_name
     *           Output only. The resource name of the topic constant.
     *           topic constant resource names have the form:
     *           `topicConstants/{topic_id}`
     *     @type int|string $id
     *           Output only. The ID of the topic.
     *     @type string $topic_constant_parent
     *           Output only. Resource name of parent of the topic constant.
     *     @type array<string>|\Google\Protobuf\Internal\RepeatedField $path
     *           Output only. The category to target or exclude. Each subsequent element in
     *           the array describes a more specific sub-category. For example,
     *           {"Pets & Animals", "Pets", "Dogs"} represents the
     *           "Pets & Animals/Pets/Dogs" category. List of available topic categories at
     *           https://developers.google.com/google-ads/api/reference/data/verticals
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V20\Resources\TopicConstant::initOnce();
        parent::__construct($data);
    }

    /**
     * Output only. The resource name of the topic constant.
     * topic constant resource names have the form:
     * `topicConstants/{topic_id}`
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getResourceName()
    {
        return $this->resource_name;
    }

    /**
     * Output only. The resource name of the topic constant.
     * topic constant resource names have the form:
     * `topicConstants/{topic_id}`
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
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
     * Output only. The ID of the topic.
     *
     * Generated from protobuf field <code>optional int64 id = 5 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return int|string
     */
    public function getId()
    {
        return isset($this->id) ? $this->id : 0;
    }

    public function hasId()
    {
        return isset($this->id);
    }

    public function clearId()
    {
        unset($this->id);
    }

    /**
     * Output only. The ID of the topic.
     *
     * Generated from protobuf field <code>optional int64 id = 5 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param int|string $var
     * @return $this
     */
    public function setId($var)
    {
        GPBUtil::checkInt64($var);
        $this->id = $var;

        return $this;
    }

    /**
     * Output only. Resource name of parent of the topic constant.
     *
     * Generated from protobuf field <code>optional string topic_constant_parent = 6 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getTopicConstantParent()
    {
        return isset($this->topic_constant_parent) ? $this->topic_constant_parent : '';
    }

    public function hasTopicConstantParent()
    {
        return isset($this->topic_constant_parent);
    }

    public function clearTopicConstantParent()
    {
        unset($this->topic_constant_parent);
    }

    /**
     * Output only. Resource name of parent of the topic constant.
     *
     * Generated from protobuf field <code>optional string topic_constant_parent = 6 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     * @param string $var
     * @return $this
     */
    public function setTopicConstantParent($var)
    {
        GPBUtil::checkString($var, True);
        $this->topic_constant_parent = $var;

        return $this;
    }

    /**
     * Output only. The category to target or exclude. Each subsequent element in
     * the array describes a more specific sub-category. For example,
     * {"Pets & Animals", "Pets", "Dogs"} represents the
     * "Pets & Animals/Pets/Dogs" category. List of available topic categories at
     * https://developers.google.com/google-ads/api/reference/data/verticals
     *
     * Generated from protobuf field <code>repeated string path = 7 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Output only. The category to target or exclude. Each subsequent element in
     * the array describes a more specific sub-category. For example,
     * {"Pets & Animals", "Pets", "Dogs"} represents the
     * "Pets & Animals/Pets/Dogs" category. List of available topic categories at
     * https://developers.google.com/google-ads/api/reference/data/verticals
     *
     * Generated from protobuf field <code>repeated string path = 7 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param array<string>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setPath($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::STRING);
        $this->path = $arr;

        return $this;
    }

}

