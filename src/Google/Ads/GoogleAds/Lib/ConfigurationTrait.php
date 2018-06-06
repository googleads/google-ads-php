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

use Google\ApiCore\GapicClientTrait;
use Google\ApiCore\Middleware\FixedHeaderMiddleware;
use Google\Auth\FetchAuthTokenInterface;

/**
 * Holds variables and getter methods related to Google Ads configuration.
 */
trait ConfigurationTrait
{
    private $developerToken;
    private $endpoint;
    private $oAuth2Credential;

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
}
