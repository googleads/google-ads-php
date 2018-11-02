<?php
/*
 * Copyright 2018 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     https://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

namespace Google\Ads\GoogleAds\Lib;

use Google\Ads\GoogleAds\V0\Services\AccountBudgetProposalServiceClient;
use Google\Ads\GoogleAds\V0\Services\AccountBudgetServiceClient;
use Google\Ads\GoogleAds\V0\Services\AdGroupAdServiceClient;
use Google\Ads\GoogleAds\V0\Services\AdGroupAudienceViewServiceClient;
use Google\Ads\GoogleAds\V0\Services\AdGroupBidModifierServiceClient;
use Google\Ads\GoogleAds\V0\Services\AdGroupCriterionServiceClient;
use Google\Ads\GoogleAds\V0\Services\AdGroupServiceClient;
use Google\Ads\GoogleAds\V0\Services\AgeRangeViewServiceClient;
use Google\Ads\GoogleAds\V0\Services\BiddingStrategyServiceClient;
use Google\Ads\GoogleAds\V0\Services\BillingSetupServiceClient;
use Google\Ads\GoogleAds\V0\Services\CampaignBidModifierServiceClient;
use Google\Ads\GoogleAds\V0\Services\CampaignBudgetServiceClient;
use Google\Ads\GoogleAds\V0\Services\CampaignCriterionServiceClient;
use Google\Ads\GoogleAds\V0\Services\CampaignGroupServiceClient;
use Google\Ads\GoogleAds\V0\Services\CampaignServiceClient;
use Google\Ads\GoogleAds\V0\Services\CampaignSharedSetServiceClient;
use Google\Ads\GoogleAds\V0\Services\ChangeStatusServiceClient;
use Google\Ads\GoogleAds\V0\Services\ConversionActionServiceClient;
use Google\Ads\GoogleAds\V0\Services\CustomerClientLinkServiceClient;
use Google\Ads\GoogleAds\V0\Services\CustomerManagerLinkServiceClient;
use Google\Ads\GoogleAds\V0\Services\CustomerServiceClient;
use Google\Ads\GoogleAds\V0\Services\DisplayKeywordViewServiceClient;
use Google\Ads\GoogleAds\V0\Services\GenderViewServiceClient;
use Google\Ads\GoogleAds\V0\Services\GeoTargetConstantServiceClient;
use Google\Ads\GoogleAds\V0\Services\GoogleAdsFieldServiceClient;
use Google\Ads\GoogleAds\V0\Services\GoogleAdsServiceClient;
use Google\Ads\GoogleAds\V0\Services\HotelGroupViewServiceClient;
use Google\Ads\GoogleAds\V0\Services\KeywordViewServiceClient;
use Google\Ads\GoogleAds\V0\Services\ManagedPlacementViewServiceClient;
use Google\Ads\GoogleAds\V0\Services\MediaFileServiceClient;
use Google\Ads\GoogleAds\V0\Services\ParentalStatusViewServiceClient;
use Google\Ads\GoogleAds\V0\Services\ProductGroupViewServiceClient;
use Google\Ads\GoogleAds\V0\Services\RecommendationServiceClient;
use Google\Ads\GoogleAds\V0\Services\SharedCriterionServiceClient;
use Google\Ads\GoogleAds\V0\Services\SharedSetServiceClient;
use Google\Ads\GoogleAds\V0\Services\TopicViewServiceClient;
use Google\Ads\GoogleAds\V0\Services\VerticalConstantServiceClient;
use Google\Ads\GoogleAds\V0\Services\VideoServiceClient;

/**
 * Contains service client factory methods.
 */
trait ServiceClientFactoryTrait
{
    use ConfigurationTrait;

    private static $CREDENTIALS_LOADER_KEY = 'credentials';
    private static $DEVELOPER_TOKEN_KEY = 'developer-token';
    private static $SERVICE_ADDRESS_KEY = 'serviceAddress';
    private static $DEFAULT_SERVICE_ADDRESS = 'googleads.googleapis.com';

    private function getGoogleAdsClientOptions()
    {
        $clientOptions = [
            self::$CREDENTIALS_LOADER_KEY => $this->getOAuth2Credential(),
            self::$DEVELOPER_TOKEN_KEY => $this->getDeveloperToken()
        ];
        if (!empty($this->getEndpoint())) {
            $clientOptions += [self::$SERVICE_ADDRESS_KEY => $this->getEndpoint()];
        }
        if (!empty($this->getLogger())) {
            $googleAdsLoggingInterceptor = new GoogleAdsLoggingInterceptor(
                new GoogleAdsUnaryCallLogger(
                    $this->getLogger(),
                    $this->getLogLevel(),
                    $this->getEndpoint() ?: self::$DEFAULT_SERVICE_ADDRESS
                )
            );
            $clientOptions['transportConfig'] = [
                'grpc' => [
                    'interceptors' => [$googleAdsLoggingInterceptor]
                ]
            ];
        }

        return $clientOptions;
    }

    /**
     * @return AccountBudgetServiceClient
     */
    public function getAccountBudgetServiceClient()
    {
        return new AccountBudgetServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return AdGroupAdServiceClient
     */
    public function getAdGroupAdServiceClient()
    {
        return new AdGroupAdServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return AdGroupAudienceViewServiceClient
     */
    public function getAdGroupAudienceViewServiceClient()
    {
        return new AdGroupAudienceViewServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return AdGroupBidModifierServiceClient
     */
    public function getAdGroupBidModifierServiceClient()
    {
        return new AdGroupBidModifierServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return AccountBudgetProposalServiceClient
     */
    public function getAccountBudgetProposalServiceClient()
    {
        return new AccountBudgetProposalServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return AdGroupCriterionServiceClient
     */
    public function getAdGroupCriterionServiceClient()
    {
        return new AdGroupCriterionServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return AdGroupServiceClient
     */
    public function getAdGroupServiceClient()
    {
        return new AdGroupServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return AgeRangeViewServiceClient
     */
    public function getAgeRangeViewServiceClient()
    {
        return new AgeRangeViewServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return BiddingStrategyServiceClient
     */
    public function getBiddingStrategyServiceClient()
    {
        return new BiddingStrategyServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return BillingSetupServiceClient
     */
    public function getBillingSetupServiceClient()
    {
        return new BillingSetupServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return CampaignBidModifierServiceClient
     */
    public function getCampaignBidModifierServiceClient()
    {
        return new CampaignBidModifierServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return CampaignBudgetServiceClient
     */
    public function getCampaignBudgetServiceClient()
    {
        return new CampaignBudgetServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return CampaignCriterionServiceClient
     */
    public function getCampaignCriterionServiceClient()
    {
        return new CampaignCriterionServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return CampaignGroupServiceClient
     */
    public function getCampaignGroupService()
    {
        return new CampaignGroupServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return CampaignServiceClient
     */
    public function getCampaignServiceClient()
    {
        return new CampaignServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return CampaignSharedSetServiceClient
     */
    public function getCampaignSharedSetServiceClient()
    {
        return new CampaignSharedSetServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return ChangeStatusServiceClient
     */
    public function getChangeStatusServiceClient()
    {
        return new ChangeStatusServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return ConversionActionServiceClient
     */
    public function getConversionActionServiceClient()
    {
        return new ConversionActionServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return CustomerClientLinkServiceClient
     */
    public function getCustomerClientLinkServiceClient()
    {
        return new CustomerClientLinkServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return CustomerManagerLinkServiceClient
     */
    public function getCustomerManagerLinkServiceClient()
    {
        return new CustomerManagerLinkServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return CustomerServiceClient
     */
    public function getCustomerServiceClient()
    {
        return new CustomerServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return DisplayKeywordViewServiceClient
     */
    public function getDisplayKeywordViewServiceClient()
    {
        return new DisplayKeywordViewServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return GenderViewServiceClient
     */
    public function getGenderViewServiceClient()
    {
        return new GenderViewServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return GeoTargetConstantServiceClient
     */
    public function getGeoTargetConstantServiceClient()
    {
        return new GeoTargetConstantServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return GoogleAdsFieldServiceClient
     */
    public function getGoogleAdsFieldServiceClient()
    {
        return new GoogleAdsFieldServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return GoogleAdsServiceClient
     */
    public function getGoogleAdsServiceClient()
    {
        return new GoogleAdsServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return HotelGroupViewServiceClient
     */
    public function getHotelGroupViewServiceClient()
    {
        return new HotelGroupViewServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return KeywordViewServiceClient
     */
    public function getKeywordViewServiceClient()
    {
        return new KeywordViewServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return ManagedPlacementViewServiceClient
     */
    public function getManagedPlacementViewServiceClient()
    {
        return new ManagedPlacementViewServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return MediaFileServiceClient
     */
    public function getMediaFileServiceClient()
    {
        return new MediaFileServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return ParentalStatusViewServiceClient
     */
    public function getParentalStatusViewServiceClient()
    {
        return new ParentalStatusViewServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return ProductGroupViewServiceClient
     */
    public function getProductGroupViewServiceClient()
    {
        return new ProductGroupViewServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return RecommendationServiceClient
     */
    public function getRecommendationServiceClient()
    {
        return new RecommendationServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return SharedCriterionServiceClient
     */
    public function getSharedCriterionServiceClient()
    {
        return new SharedCriterionServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return SharedSetServiceClient
     */
    public function getSharedSetServiceClient()
    {
        return new SharedSetServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return TopicViewServiceClient
     */
    public function getTopicViewServiceClient()
    {
        return new TopicViewServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return VerticalConstantServiceClient
     */
    public function getVerticalConstantServiceClient()
    {
        return new VerticalConstantServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return VideoServiceClient
     */
    public function getVideoServiceClient()
    {
        return new VideoServiceClient($this->getGoogleAdsClientOptions());
    }
}
