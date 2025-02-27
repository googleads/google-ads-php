<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/common/asset_set_types.proto

namespace Google\Ads\GoogleAds\V19\Common;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Data used to configure a location set populated with the specified chains.
 *
 * Generated from protobuf message <code>google.ads.googleads.v19.common.ChainSet</code>
 */
class ChainSet extends \Google\Protobuf\Internal\Message
{
    /**
     * Required. Immutable. Relationship type the specified chains have with this
     * advertiser.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.enums.ChainRelationshipTypeEnum.ChainRelationshipType relationship_type = 1 [(.google.api.field_behavior) = REQUIRED, (.google.api.field_behavior) = IMMUTABLE];</code>
     */
    protected $relationship_type = 0;
    /**
     * Required. A list of chain level filters, all filters are OR'ed together.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v19.common.ChainFilter chains = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    private $chains;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int $relationship_type
     *           Required. Immutable. Relationship type the specified chains have with this
     *           advertiser.
     *     @type array<\Google\Ads\GoogleAds\V19\Common\ChainFilter>|\Google\Protobuf\Internal\RepeatedField $chains
     *           Required. A list of chain level filters, all filters are OR'ed together.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V19\Common\AssetSetTypes::initOnce();
        parent::__construct($data);
    }

    /**
     * Required. Immutable. Relationship type the specified chains have with this
     * advertiser.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.enums.ChainRelationshipTypeEnum.ChainRelationshipType relationship_type = 1 [(.google.api.field_behavior) = REQUIRED, (.google.api.field_behavior) = IMMUTABLE];</code>
     * @return int
     */
    public function getRelationshipType()
    {
        return $this->relationship_type;
    }

    /**
     * Required. Immutable. Relationship type the specified chains have with this
     * advertiser.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.enums.ChainRelationshipTypeEnum.ChainRelationshipType relationship_type = 1 [(.google.api.field_behavior) = REQUIRED, (.google.api.field_behavior) = IMMUTABLE];</code>
     * @param int $var
     * @return $this
     */
    public function setRelationshipType($var)
    {
        GPBUtil::checkEnum($var, \Google\Ads\GoogleAds\V19\Enums\ChainRelationshipTypeEnum\ChainRelationshipType::class);
        $this->relationship_type = $var;

        return $this;
    }

    /**
     * Required. A list of chain level filters, all filters are OR'ed together.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v19.common.ChainFilter chains = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getChains()
    {
        return $this->chains;
    }

    /**
     * Required. A list of chain level filters, all filters are OR'ed together.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v19.common.ChainFilter chains = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param array<\Google\Ads\GoogleAds\V19\Common\ChainFilter>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setChains($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Ads\GoogleAds\V19\Common\ChainFilter::class);
        $this->chains = $arr;

        return $this;
    }

}

