<?php

/**
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

namespace Google\Ads\GoogleAds\Lib\V3;

use Google\Ads\GoogleAds\V3\Errors\GoogleAdsFailure;
use Google\ApiCore\ApiException;

/**
 * Contains methods related to the exception handling of Google Ads API response.
 */
trait GoogleAdsExceptionTrait
{
    use GoogleAdsMetadataTrait;

    /**
     * Throws a `GoogleAdsException` based on the content of the given `ApiException`.
     *
     * @param ApiException $exception
     * @param StatusMetadataExtractor $statusMetadataExtractor
     * @throws GoogleAdsException
     */
    public function throwGoogleAdsException(
        ApiException $exception,
        $statusMetadataExtractor = null
    ): void {
        $statusMetadataExtractor = $statusMetadataExtractor ?: new StatusMetadataExtractor();
        $metadata = $exception->getMetadata();

        if (isset($metadata[self::$GOOGLE_ADS_FAILURE_BINARY_KEY])) {
            throw $this->createGoogleAdsException(
                $exception,
                $statusMetadataExtractor->extractGoogleAdsFailure(
                    $metadata,
                    self::$GOOGLE_ADS_FAILURE_BINARY_KEY
                )
            );
        }

        if (isset($metadata[self::$GOOGLE_ADS_FAILURE_JSON_KEY])) {
            throw $this->createGoogleAdsException(
                $exception,
                $statusMetadataExtractor->extractGoogleAdsFailure(
                    $metadata,
                    self::$GOOGLE_ADS_FAILURE_JSON_KEY
                )
            );
        }
    }

    private function createGoogleAdsException(
        ApiException $exception,
        GoogleAdsFailure $googleAdsFailure
    ) {
        $optionalArgs = [
            'previous' => $exception->getPrevious(),
            'metadata' => $exception->getMetadata(),
            'basicMessage' => $exception->getBasicMessage()
        ];
        return new GoogleAdsException($exception, $googleAdsFailure, $optionalArgs);
    }
}
