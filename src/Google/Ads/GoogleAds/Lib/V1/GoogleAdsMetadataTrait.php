<?php
/**
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

namespace Google\Ads\GoogleAds\Lib\V1;

/**
 * Contains methods and constants related to the metadata of Google Ads API response.
 */
trait GoogleAdsMetadataTrait
{
    private static $REQUEST_ID_HEADER_KEY = "request-id";
    private static $DEVELOPER_TOKEN_HEADER_KEY = "developer-token";
    private static $GOOGLE_ADS_FAILURE_BINARY_KEY =
        "google.ads.googleads.v1.errors.googleadsfailure-bin";
    private static $GOOGLE_ADS_FAILURE_JSON_KEY =
        "google.ads.googleads.v1.errors.googleadsfailure";

    /**
     * Returns the first value of the provided key of the provided metadata.
     *
     * @param string $key the key to get its value
     * @param array $metadata the metadata to get the value
     * @return string|null the value of the provided key if exists.
     */
    private function getFirstHeaderValue($key, $metadata)
    {
        if (isset($metadata[$key])) {
            $valueArray = $metadata[$key];
            if (count($valueArray) > 0) {
                return $valueArray[0];
            }
        }
        return null;
    }
}
