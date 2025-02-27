<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/services/recommendation_service.proto

namespace Google\Ads\GoogleAds\V19\Services;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Response message for
 * [RecommendationService.GenerateRecommendations][google.ads.googleads.v19.services.RecommendationService.GenerateRecommendations].
 *
 * Generated from protobuf message <code>google.ads.googleads.v19.services.GenerateRecommendationsResponse</code>
 */
class GenerateRecommendationsResponse extends \Google\Protobuf\Internal\Message
{
    /**
     * List of generated recommendations from the passed in set of requested
     * recommendation_types. If there isn't sufficient data to generate a
     * recommendation for the requested recommendation_types, the result set won't
     * contain a recommendation for that type.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v19.resources.Recommendation recommendations = 1;</code>
     */
    private $recommendations;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type array<\Google\Ads\GoogleAds\V19\Resources\Recommendation>|\Google\Protobuf\Internal\RepeatedField $recommendations
     *           List of generated recommendations from the passed in set of requested
     *           recommendation_types. If there isn't sufficient data to generate a
     *           recommendation for the requested recommendation_types, the result set won't
     *           contain a recommendation for that type.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V19\Services\RecommendationService::initOnce();
        parent::__construct($data);
    }

    /**
     * List of generated recommendations from the passed in set of requested
     * recommendation_types. If there isn't sufficient data to generate a
     * recommendation for the requested recommendation_types, the result set won't
     * contain a recommendation for that type.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v19.resources.Recommendation recommendations = 1;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getRecommendations()
    {
        return $this->recommendations;
    }

    /**
     * List of generated recommendations from the passed in set of requested
     * recommendation_types. If there isn't sufficient data to generate a
     * recommendation for the requested recommendation_types, the result set won't
     * contain a recommendation for that type.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v19.resources.Recommendation recommendations = 1;</code>
     * @param array<\Google\Ads\GoogleAds\V19\Resources\Recommendation>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setRecommendations($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Ads\GoogleAds\V19\Resources\Recommendation::class);
        $this->recommendations = $arr;

        return $this;
    }

}

