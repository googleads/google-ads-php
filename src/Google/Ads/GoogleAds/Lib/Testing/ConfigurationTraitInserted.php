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

namespace Google\Ads\GoogleAds\Lib\Testing;

use Google\Ads\GoogleAds\Lib\ConfigurationTrait;
use Google\Auth\FetchAuthTokenInterface;
use Psr\Log\LoggerInterface;

/**
 * A testing class that is inserted with `ConfigurationTrait`.
 *
 * @see \Google\Ads\GoogleAds\Lib\ConfigurationTraitTest
 */
class ConfigurationTraitInserted
{
    use ConfigurationTrait;

    /**
     * Constructs the class with the provided parameters.
     *
     * In general, we should use the builder pattern when there are many parameters provided. As
     * this is for testing purpose only, we use the constructor's parameters directly, for the sake
     * of brevity.
     *
     * @param string $developerToken
     * @param int $loginCustomerId
     * @param int $linkedCustomerId
     * @param string $endpoint
     * @param FetchAuthTokenInterface $oAuth2Credential
     * @param LoggerInterface $logger
     * @param string $logLevel
     * @param string $proxy
     * @param string $transport
     */
    public function __construct(
        string $developerToken,
        int $loginCustomerId,
        int $linkedCustomerId,
        string $endpoint,
        FetchAuthTokenInterface $oAuth2Credential,
        LoggerInterface $logger,
        string $logLevel,
        string $proxy,
        string $transport
    ) {
        $this->developerToken = $developerToken;
        $this->loginCustomerId = $loginCustomerId;
        $this->linkedCustomerId = $linkedCustomerId;
        $this->endpoint = $endpoint;
        $this->oAuth2Credential = $oAuth2Credential;
        $this->logger = $logger;
        $this->logLevel = $logLevel;
        $this->proxy = $proxy;
        $this->transport = $transport;
    }
}
