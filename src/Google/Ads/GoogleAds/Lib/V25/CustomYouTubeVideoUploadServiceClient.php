<?php

/*
 * Copyright 2026 Google LLC
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

use Google\Ads\GoogleAds\V25\Services\Client\YouTubeVideoUploadServiceClient;
use Google\Ads\GoogleAds\V25\Services\CreateYouTubeVideoUploadRequest;
use Google\ApiCore\ResumableUpload\ResumableUpload;

/**
 * A custom YouTube video upload service client that injects Google Ads API-related headers.
 */
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
