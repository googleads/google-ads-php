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

namespace Google\Ads\GoogleAds\Lib\V11;

use Google\Ads\GoogleAds\V11\Errors\GoogleAdsFailure;
use Google\ApiCore\ApiException;

/**
 * Describes what went wrong when sending a request to Google Ads API.
 */
class GoogleAdsException extends ApiException
{
    use GoogleAdsMetadataTrait;

    private $googleAdsFailure;

    /**
     * Creates a `GoogleAdsException` instance with the specified parameters.
     *
     * @param ApiException $original the original exception
     * @param GoogleAdsFailure $googleAdsFailure the reason of failure
     * @param array $optionalArgs optional arguments
     */
    public function __construct(
        ApiException $original,
        GoogleAdsFailure $googleAdsFailure,
        array $optionalArgs = []
    ) {
        parent::__construct(
            $original->getMessage(),
            $original->getCode(),
            $original->getStatus(),
            $optionalArgs
        );
        $this->googleAdsFailure = $googleAdsFailure;
    }

    /**
     * @return GoogleAdsFailure the stored Google Ads failure
     */
    public function getGoogleAdsFailure()
    {
        return $this->googleAdsFailure;
    }

    /**
     * Gets the request ID returned in the RPC trailers.
     * Returns null if no request ID has been received.
     *
     * @return string|null the request ID
     */
    public function getRequestId()
    {
        return $this->getFirstHeaderValue(
            self::$REQUEST_ID_HEADER_KEY,
            $this->getMetadata() ?: []
        );
    }
}
