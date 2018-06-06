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

use Google\Ads\GoogleAds\V0\Services\AdGroupAdServiceClient;
use Google\Ads\GoogleAds\V0\Services\AdGroupCriterionServiceClient;
use Google\Ads\GoogleAds\V0\Services\AdGroupServiceClient;
use Google\Ads\GoogleAds\V0\Services\BiddingStrategyServiceClient;
use Google\Ads\GoogleAds\V0\Services\CampaignBudgetServiceClient;
use Google\Ads\GoogleAds\V0\Services\CampaignCriterionServiceClient;
use Google\Ads\GoogleAds\V0\Services\CampaignServiceClient;
use Google\Ads\GoogleAds\V0\Services\CustomerServiceClient;
use Google\Ads\GoogleAds\V0\Services\GoogleAdsFieldServiceClient;
use Google\Ads\GoogleAds\V0\Services\GoogleAdsServiceClient;

/**
 * A factory for creating a new service client for Google Ads.
 */
interface ServiceClientFactory
{
    /**
     * @return AdGroupAdServiceClient
     */
    public function getAdGroupAdServiceClient();

    /**
     * @return AdGroupCriterionServiceClient
     */
    public function getAdGroupCriterionServiceClient();

    /**
     * @return AdGroupServiceClient
     */
    public function getAdGroupServiceClient();

    /**
     * @return BiddingStrategyServiceClient
     */
    public function getBiddingStrategyServiceClient();

    /**
     * @return CampaignBudgetServiceClient
     */
    public function getCampaignBudgetServiceClient();

    /**
     * @return CampaignCriterionServiceClient
     */
    public function getCampaignCriterionServiceClient();

    /**
     * @return CampaignServiceClient
     */
    public function getCampaignServiceClient();

    /**
     * @return CustomerServiceClient
     */
    public function getCustomerServiceClient();

    /**
     * @return GoogleAdsServiceClient
     */
    public function getGoogleAdsServiceClient();

    /**
     * @return GoogleAdsFieldServiceClient
     */
    public function getGoogleAdsFieldServiceClient();
}
