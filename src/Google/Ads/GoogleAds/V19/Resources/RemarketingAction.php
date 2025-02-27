<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/resources/remarketing_action.proto

namespace Google\Ads\GoogleAds\V19\Resources;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * A remarketing action. A snippet of JavaScript code that will collect the
 * product id and the type of page people visited (product page, shopping cart
 * page, purchase page, general site visit) on an advertiser's website.
 *
 * Generated from protobuf message <code>google.ads.googleads.v19.resources.RemarketingAction</code>
 */
class RemarketingAction extends \Google\Protobuf\Internal\Message
{
    /**
     * Immutable. The resource name of the remarketing action.
     * Remarketing action resource names have the form:
     * `customers/{customer_id}/remarketingActions/{remarketing_action_id}`
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.field_behavior) = IMMUTABLE, (.google.api.resource_reference) = {</code>
     */
    protected $resource_name = '';
    /**
     * Output only. Id of the remarketing action.
     *
     * Generated from protobuf field <code>optional int64 id = 5 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $id = null;
    /**
     * The name of the remarketing action.
     * This field is required and should not be empty when creating new
     * remarketing actions.
     *
     * Generated from protobuf field <code>optional string name = 6;</code>
     */
    protected $name = null;
    /**
     * Output only. The snippets used for tracking remarketing actions.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v19.common.TagSnippet tag_snippets = 4 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $tag_snippets;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $resource_name
     *           Immutable. The resource name of the remarketing action.
     *           Remarketing action resource names have the form:
     *           `customers/{customer_id}/remarketingActions/{remarketing_action_id}`
     *     @type int|string $id
     *           Output only. Id of the remarketing action.
     *     @type string $name
     *           The name of the remarketing action.
     *           This field is required and should not be empty when creating new
     *           remarketing actions.
     *     @type array<\Google\Ads\GoogleAds\V19\Common\TagSnippet>|\Google\Protobuf\Internal\RepeatedField $tag_snippets
     *           Output only. The snippets used for tracking remarketing actions.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V19\Resources\RemarketingAction::initOnce();
        parent::__construct($data);
    }

    /**
     * Immutable. The resource name of the remarketing action.
     * Remarketing action resource names have the form:
     * `customers/{customer_id}/remarketingActions/{remarketing_action_id}`
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.field_behavior) = IMMUTABLE, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getResourceName()
    {
        return $this->resource_name;
    }

    /**
     * Immutable. The resource name of the remarketing action.
     * Remarketing action resource names have the form:
     * `customers/{customer_id}/remarketingActions/{remarketing_action_id}`
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
     * Output only. Id of the remarketing action.
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
     * Output only. Id of the remarketing action.
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
     * The name of the remarketing action.
     * This field is required and should not be empty when creating new
     * remarketing actions.
     *
     * Generated from protobuf field <code>optional string name = 6;</code>
     * @return string
     */
    public function getName()
    {
        return isset($this->name) ? $this->name : '';
    }

    public function hasName()
    {
        return isset($this->name);
    }

    public function clearName()
    {
        unset($this->name);
    }

    /**
     * The name of the remarketing action.
     * This field is required and should not be empty when creating new
     * remarketing actions.
     *
     * Generated from protobuf field <code>optional string name = 6;</code>
     * @param string $var
     * @return $this
     */
    public function setName($var)
    {
        GPBUtil::checkString($var, True);
        $this->name = $var;

        return $this;
    }

    /**
     * Output only. The snippets used for tracking remarketing actions.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v19.common.TagSnippet tag_snippets = 4 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getTagSnippets()
    {
        return $this->tag_snippets;
    }

    /**
     * Output only. The snippets used for tracking remarketing actions.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v19.common.TagSnippet tag_snippets = 4 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param array<\Google\Ads\GoogleAds\V19\Common\TagSnippet>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setTagSnippets($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Ads\GoogleAds\V19\Common\TagSnippet::class);
        $this->tag_snippets = $arr;

        return $this;
    }

}

