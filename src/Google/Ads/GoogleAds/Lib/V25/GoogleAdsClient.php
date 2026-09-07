<?php

/*
 * Copyright 2022 Google LLC
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

namespace Google\Ads\GoogleAds\Lib\V25;

use Google\Ads\GoogleAds\Util\V25\GoogleAdsFailures;
use Google\Ads\GoogleAds\V25\Services\Client\YouTubeVideoUploadServiceClient;
use Google\Ads\GoogleAds\V25\Services\CreateYouTubeVideoUploadRequest;
use Google\ApiCore\ResumableUpload\ResumableUpload;

// Define a custom client that handles injection
// phpcs:disable
class CustomYouTubeVideoUploadServiceClient extends YouTubeVideoUploadServiceClient
{
    private $googleAdsClient;

    public function __construct($googleAdsClient, array $options = [])
    {
        parent::__construct($options);
        $this->googleAdsClient = $googleAdsClient;
    }

    public function createYouTubeVideoUpload(CreateYouTubeVideoUploadRequest $request, array $callOptions = []): ResumableUpload
    {
        $headers = [];
        if ($this->googleAdsClient->getDeveloperToken()) {
            $headers['developer-token'] = $this->googleAdsClient->getDeveloperToken();
        }
        if ($this->googleAdsClient->getLoginCustomerId()) {
            $headers['login-customer-id'] = strval($this->googleAdsClient->getLoginCustomerId());
        }
        if ($this->googleAdsClient->getLinkedCustomerId()) {
            $headers['linked-customer-id'] = strval($this->googleAdsClient->getLinkedCustomerId());
        } 
        $callOptions['headers'] = array_merge($headers, $callOptions['headers'] ?? []);

        return parent::createYouTubeVideoUpload($request, $callOptions);
    }
}
// phpcs:enable

/**
 * A Google Ads API client for handling common configuration and OAuth2 settings.
 */
class GoogleAdsClient
{
    use ServiceClientFactoryTrait;

    /**
     * Creates a Google Ads API client from the specified builder.
     *
     * Do not use this constructor; Instances should be created by using the
     * `GoogleAdsClientBuilder` instead.
     *
     * @param GoogleAdsClientBuilder $builder the builder to create an instance
     *     of this client from
     */
    private $adsAssistant;

    public function __construct(GoogleAdsClientBuilder $builder)
    {
        $this->developerToken = $builder->getDeveloperToken();
        $this->useCloudOrgForApiAccess = $builder->useCloudOrgForApiAccess();
        $this->loginCustomerId = $builder->getLoginCustomerId();
        $this->linkedCustomerId = $builder->getLinkedCustomerId();
        $this->adsAssistant = $builder->getAdsAssistant();
        $this->endpoint = $builder->getEndpoint();
        $this->oAuth2Credential = $builder->getOAuth2Credential();
        $this->logger = $builder->getLogger();
        $this->logLevel = $builder->getLogLevel();
        $this->proxy = $builder->getProxy();
        $this->transport = $builder->getTransport();
        $this->grpcChannelIsSecure = $builder->getGrpcChannelIsSecure();
        $this->grpcChannelCredential = $builder->getGrpcChannelCredential();
        $this->unaryMiddlewares = $builder->getUnaryMiddlewares();
        $this->streamingMiddlewares = $builder->getStreamingMiddlewares();
        $this->grpcInterceptors = $builder->getGrpcInterceptors();
        $this->httpHandler = $builder->getHttpHandler();

        // Initializes preemptively the GoogleAdsFailures type when
        // gRPC is not available.
        if (!self::getGrpcDependencyStatus()) {
            GoogleAdsFailures::init();
        }
    }

    /**
     * Gets the Google Ads API assistant metadata.
     *
     * @return string|null
     */
    public function getAdsAssistant()
    {
        return $this->adsAssistant;
    }

    public function getYouTubeVideoUploadServiceClient(): YouTubeVideoUploadServiceClient
    {
        return new CustomYouTubeVideoUploadServiceClient($this, $this->getGoogleAdsClientOptions());
    }
}
