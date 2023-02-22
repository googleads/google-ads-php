<?php

/**
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

namespace Google\Ads\GoogleAds\Lib\V13;

use Google\Ads\GoogleAds\V13\Errors\GoogleAdsFailure;

/**
 * Extracts information from gRPC call's status metadata.
 */
class StatusMetadataExtractor
{
    use GoogleAdsMetadataTrait;

    /**
     * Extract failures from the specified metadata and constructs a Google Ads failure object from
     * them.
     *
     * @param array $statusMetadata the status metadata array
     * @param null|string $headerKey the header key to extract error messages from
     * @return GoogleAdsFailure the Google Ads failure
     */
    public function extractGoogleAdsFailure(
        array $statusMetadata,
        ?string $headerKey = null
    ): GoogleAdsFailure {
        $googleAdsFailure = new GoogleAdsFailure();

        $header = $this->getFirstHeaderValue(
        // Default to gRPC, whose calls have a binary key.
            $headerKey ?: self::$GOOGLE_ADS_FAILURE_BINARY_KEY,
            $statusMetadata
        );
        if (!is_null($header)) {
            $googleAdsFailure->mergeFromString($header);
        }

        return $googleAdsFailure;
    }

    /**
     * Extract failures from the specified metadata and constructs a list of their error messages.
     *
     * @param array $statusMetadata the status metadata array
     * @param null|string $headerKey the header key to extract error messages from
     * @return array the error message list
     */
    public function extractErrorMessageList(
        array $statusMetadata,
        ?string $headerKey = null
    ): array {
        $googleAdsFailure = $this->extractGoogleAdsFailure($statusMetadata, $headerKey);
        $errorMessageList = [];
        foreach ($googleAdsFailure->getErrors() as $error) {
            $errorMessageList[] = $error->getMessage();
        }

        return $errorMessageList;
    }
}
