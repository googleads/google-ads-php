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

use Google\Ads\GoogleAds\V0\Errors\GoogleAdsFailure;
use Google\ApiCore\ArrayTrait;

/**
 * Formats information about a single gRPC / REST call for logging.
 */
final class LogMessageFormatter
{
    use ArrayTrait;
    use GoogleAdsMetadataTrait;

    /**
     * Formats the request and response data for summary logging.
     *
     * @param array $requestData the request data
     * @param array $responseData the response data
     * @param string $endpoint the API endpoint that the request has been sent to
     * @return string the formatted logging message
     */
    public function formatSummary(
        array $requestData,
        array $responseData,
        $endpoint
    ) {
        $method = $this->pluck('method', $requestData);
        $argument = $this->pluck('argument', $requestData);

        $status = $this->pluck('status', $responseData);

        if ($status->code !== 0) {
            // gRPC calls will have a binary key.
            $binaryHeader = $this->getFirstHeaderValue(
                self::$GOOGLE_ADS_FAILURE_BINARY_KEY,
                $status->metadata
            );
            $googleAdsFailure = new GoogleAdsFailure();
            $googleAdsFailure->mergeFromString($binaryHeader);

            $errorMessageList = [];
            foreach ($googleAdsFailure->getErrors() as $error) {
                $errorMessageList[] = $error->getMessage();
            }
        }

        return sprintf(
            'Request made: Host: "%s", Method: "%s", ClientCustomerId: %d, RequestId: "%s", '
            . 'IsFault: %b, FaultMessage: "%s"',
            $endpoint,
            $method,
            $argument->getCustomerId() ?: '"No client customer ID used"',
            $this->getFirstHeaderValue(self::$REQUEST_ID_HEADER_KEY, $status->metadata),
            $status->code !== 0,
            !empty($errorMessageList) ? json_encode($errorMessageList) : 'None'
        );
    }

    /**
     * Formats the request and response data for detailed logging.
     *
     * @param array $requestData the request data
     * @param array $responseData the response data
     * @param string $endpoint the API endpoint that the request has been sent to
     * @return string the formatted logging message
     */
    public function formatDetail(
        array $requestData,
        array $responseData,
        $endpoint
    ) {
        $logMessageTokens = [];

        $method = $this->pluck('method', $requestData);
        $argument = $this->pluck('argument', $requestData);
        $metadata = $this->pluck('metadata', $requestData) ?: [];

        $response = $this->pluck('response', $responseData);
        $status = $this->pluck('status', $responseData);
        $unaryCall = $this->pluck('unaryCall', $responseData);

        $logMessageTokens[] = 'Request';
        $logMessageTokens[] = '-------';
        $logMessageTokens[] = "Method Name: $method";
        $logMessageTokens[] = "Host: $endpoint";
        $logMessageTokens[] =
            "Headers: " . json_encode(self::joinPluckedArrays($metadata), JSON_PRETTY_PRINT);
        $logMessageTokens[] = "Request: " . $argument->serializeToJsonString();

        $logMessageTokens[] = "\nResponse";
        $logMessageTokens[] = '-------';
        // TODO: REDACT developer token.
        $logMessageTokens[] = "Headers: " . json_encode(
            self::joinPluckedArrays($unaryCall->getMetadata()),
            JSON_PRETTY_PRINT
        );

        if ($status->code === 0) {
            $logMessageTokens[] = "Response: {$response->serializeToJsonString()}";
        } else {
            // gRPC calls will have a binary key.
            $binaryHeader = $this->getFirstHeaderValue(
                self::$GOOGLE_ADS_FAILURE_BINARY_KEY,
                $status->metadata
            );
            $googleAdsFailure = new GoogleAdsFailure();
            $googleAdsFailure->mergeFromString($binaryHeader);

            $errorMessageList = [];
            foreach ($googleAdsFailure->getErrors() as $error) {
                $errorMessageList[] = $error->getMessage();
            }

            $logMessageTokens[] = "\nFault";
            $logMessageTokens[] = '-------';
            $logMessageTokens[] = "Status code: {$status->code}";
            $logMessageTokens[] = "Details: {$status->details}";
            $logMessageTokens[] = "Failure: {$googleAdsFailure->serializeToJsonString()}";
        }

        return implode("\n", $logMessageTokens);
    }

    private function joinPluckedArrays(array $array)
    {
        $joinedArray = [];
        foreach (array_keys($array) as $key) {
            $joinedArray[$key] = $this->pluck($key, $array)[0];
        }

        return $joinedArray;
    }
}
