<?php

/*
 * Copyright 2020 Google LLC
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

namespace Google\Ads\GoogleAds\Lib\V6;

use Google\Ads\GoogleAds\Util\V6\GoogleAdsFailures;
use Google\ApiCore\GrpcSupportTrait;

/**
 * A Google Ads API client for handling common configuration and OAuth2 settings.
 */
final class GoogleAdsClient
{
    use ServiceClientFactoryTrait;
    use GrpcSupportTrait;

    /**
     * Creates a Google Ads API client from the specified builder.
     *
     * Do not use this constructor; Instances should be created by using the
     * `GoogleAdsClientBuilder` instead.
     *
     * @param GoogleAdsClientBuilder $builder the builder to create an instance
     *     of this client from
     */
    public function __construct(GoogleAdsClientBuilder $builder)
    {
        $this->developerToken = $builder->getDeveloperToken();
        $this->loginCustomerId = $builder->getLoginCustomerId();
        $this->linkedCustomerId = $builder->getLinkedCustomerId();
        $this->endpoint = $builder->getEndpoint();
        $this->oAuth2Credential = $builder->getOAuth2Credential();
        $this->logger = $builder->getLogger();
        $this->logLevel = $builder->getLogLevel();
        $this->proxy = $builder->getProxy();
        $this->transport = $builder->getTransport();

        // Initializes preemptively the GoogleAdsFailures type when
        // gRPC is not available.
        if (!self::getGrpcDependencyStatus()) {
            GoogleAdsFailures::init();
        }
    }
}
