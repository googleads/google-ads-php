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

namespace Google\Ads\GoogleAds\Lib;

use Google\ApiCore\CredentialsWrapper;
use Google\ApiCore\ValidationException;
use Google\Auth\FetchAuthTokenInterface;

/**
 * Extends the credentials wrapper so that it can be used in an insecure context.
 */
class InsecureCredentialsWrapper extends CredentialsWrapper
{
    /**
     * See CredentialsWrapper::__construct()
     *
     * @param FetchAuthTokenInterface $credentialsFetcher
     * @param callable $authHttpHandler
     * @throws ValidationException
     */
    public function __construct(
        FetchAuthTokenInterface $credentialsFetcher,
        callable $authHttpHandler = null
    ) {
        parent::__construct($credentialsFetcher, $authHttpHandler);
    }

    /**
     * See CredentialsWrapper::getAuthorizationHeaderCallback()
     *
     * The callback returned by CredentialsWrapper requires secure level to be equal or higher than
     * GRPC_PRIVACY_AND_INTEGRITY which is not the case on an insecure channel starting with gRPC
     * 1.45.0 so it leads to UNAUTHENTICATED errors.
     *
     * Insecure credentials do not need to support the generation of authorization headers so null
     * can be returned instead to avoid any errors.
     *
     * @param $audience
     * @return callable
     */
    public function getAuthorizationHeaderCallback($audience = null): ?callable
    {
        return null;
    }
}
