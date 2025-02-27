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

namespace Google\Ads\GoogleAds\Lib\V19;

/**
 * Holds the response metadata of Google Ads API for a successful request.
 */
class GoogleAdsResponseMetadata
{
    use GoogleAdsMetadataTrait;

    private array $metadata;

    /**
     * Creates a `GoogleAdsResponseMetadata` instance with the specified parameters.
     *
     * @param array $metadata the metadata
     */
    public function __construct(array $metadata)
    {
        $this->metadata = $metadata;
    }

    /**
     * Gets an associative array of metadata keys and values.
     * Keys are strings and values are arrays of string values or binary message data.
     *
     * @return array an associative array of metadata keys and values.
     */
    public function getMetadata()
    {
        return $this->metadata;
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
