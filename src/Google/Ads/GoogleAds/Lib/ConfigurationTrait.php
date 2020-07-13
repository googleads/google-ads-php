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

use Google\Auth\FetchAuthTokenInterface;
use Psr\Log\LoggerInterface;

/**
 * Holds variables and getter methods related to Google Ads configuration.
 */
trait ConfigurationTrait
{
    private $developerToken;
    private $loginCustomerId;
    private $linkedCustomerId;
    private $endpoint;
    private $oAuth2Credential;
    private $logger;
    private $logLevel;
    private $proxy;
    private $transport;

    /**
     * Gets the developer token.
     *
     * @return string
     */
    public function getDeveloperToken()
    {
        return $this->developerToken;
    }

    /**
     * Gets the login customer ID for this client.
     *
     * @return int
     */
    public function getLoginCustomerId()
    {
        return $this->loginCustomerId;
    }

    /**
     * Gets the linked customer ID for this client.
     *
     * @return int
     */
    public function getLinkedCustomerId()
    {
        return $this->linkedCustomerId;
    }

    /**
     * Gets the endpoint.
     *
     * @return string
     */
    public function getEndpoint()
    {
        return $this->endpoint;
    }

    /**
     * Gets the OAuth2 credential.
     *
     * @return FetchAuthTokenInterface
     */
    public function getOAuth2Credential()
    {
        return $this->oAuth2Credential;
    }

    /**
     * Gets the logger used to log requests and responses.
     *
     * @return LoggerInterface
     */
    public function getLogger()
    {
        return $this->logger;
    }

    /**
     * Gets the PSR-3 log level for Google Ads API requests and responses.
     *
     * @return string the log level
     */
    public function getLogLevel()
    {
        return $this->logLevel;
    }

    /**
     * Gets the proxy URI.
     *
     * @return string the proxy URI
     */
    public function getProxy()
    {
        return $this->proxy;
    }

    /**
     * Gets the transport.
     *
     * @return string the transport
     */
    public function getTransport()
    {
        return $this->transport;
    }
}
