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
use Google\ApiCore\ArrayTrait;
use Google\Protobuf\Internal\Message;

/**
 * Formats information about a single gRPC / REST call for logging.
 */
final class LogMessageFormatter
{
    use ArrayTrait;
    use GoogleAdsMetadataTrait;

    /** @var array the map of header keys to redacted values. */
    private static $HEADER_KEYS_TO_REDACTED_VALUES;
    private static $unusedGoogleAdsFailure;

    private $statusMetadataExtractor;

    public function __construct($statusMetadataExtractor = null)
    {
        $this->statusMetadataExtractor = $statusMetadataExtractor ?: new StatusMetadataExtractor();
    }

    /**
     * Extracts the customer ID, if present, from the provided request.
     *
     * @param Message $request the request to get its customer ID
     * @return string the customer ID if present or the message saying that the customer ID is not
     *     available
     */
    private static function extractCustomerId(Message $request): string
    {
        // Most requests contain customer ID in the request, so we aim to extract that.
        if (method_exists($request, 'getCustomerId')) {
            return $request->getCustomerId();
        } elseif (method_exists($request, 'getResourceName')) {
            // In some cases, customer ID is available in the form of resource name, such as many
            // Get requests.
            $resourceName = $request->getResourceName();
            $segments = explode('/', $resourceName);
            if ($segments[0] === 'customers') {
                return $segments[1];
            }
        }
        return '"No customer ID could be extracted from the request"';
    }

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
            $errorMessageList =
                $this->statusMetadataExtractor->extractErrorMessageList($status->metadata);
        }

        return sprintf(
            'Request made: Host: "%s", Method: "%s", CustomerId: %s, RequestId: "%s", '
            . 'IsFault: %b, FaultMessage: "%s"',
            $endpoint,
            $method,
            self::extractCustomerId($argument),
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
        $call = $this->pluck('call', $responseData);

        $logMessageTokens[] = 'Request';
        $logMessageTokens[] = '-------';
        $logMessageTokens[] = "Method Name: $method";
        $logMessageTokens[] = "Host: $endpoint";
        $logMessageTokens[] = "Headers: " . json_encode(
            self::redactHeaders(self::joinPluckedArrays($metadata)),
            JSON_PRETTY_PRINT
        );
        // ListMutateJobResults can return objects that contain GoogleAdsFailure. We need to
        // initialize an unused GoogleAdsFailure object, as the pool needs to be aware of this
        // class, in order to serialize the response correctly.
        if (
            !isset(self::$unusedGoogleAdsFailure)
            && strpos($method, 'ListMutateJobResults')
        ) {
            self::$unusedGoogleAdsFailure = new GoogleAdsFailure();
        }
        $logMessageTokens[] = "Request: " . $argument->serializeToJsonString();

        $logMessageTokens[] = "\nResponse";
        $logMessageTokens[] = '-------';
        $logMessageTokens[] = "Headers: " . json_encode(
            self::joinPluckedArrays($call->getMetadata()),
            JSON_PRETTY_PRINT
        );

        if ($status->code === 0) {
            // Initialize unused GoogleAdsFailure object when there are partial failures returned.
            // This is necessary, as the pool needs to be aware of this class, in order to serialize
            // the response correctly.
            if (
                !isset(self::$unusedGoogleAdsFailure)
                && method_exists($response, 'getPartialFailureError')
                && !is_null($response->getPartialFailureError())
            ) {
                self::$unusedGoogleAdsFailure = new GoogleAdsFailure();
            }
            $logMessageTokens[] = "Response: " . (is_null($response) ? "None" :
                $response->serializeToJsonString()
             );
        } else {
            $googleAdsFailure =
                $this->statusMetadataExtractor->extractGoogleAdsFailure($status->metadata);

            $logMessageTokens[] = "\nFault";
            $logMessageTokens[] = '-------';
            $logMessageTokens[] = "Status code: {$status->code}";
            $logMessageTokens[] = "Details: {$status->details}";
            $logMessageTokens[] = "Failure: {$googleAdsFailure->serializeToJsonString()}";
        }

        return implode("\n", $logMessageTokens);
    }

    /**
     * @param array $array
     * @return array the joined array after plucking
     */
    private function joinPluckedArrays(array $array)
    {
        $joinedArray = [];
        foreach (array_keys($array) as $key) {
            $joinedArray[$key] = $this->pluck($key, $array)[0];
        }

        return $joinedArray;
    }

    /**
     * @param array $headers the headers to be redacted
     * @param array|null $headerKeysToRedactedValues the mapping from keys to values needing
     *     redaction
     * @return array the headers with values redacted
     */
    private function redactHeaders(
        array $headers,
        array $headerKeysToRedactedValues = null
    ) {
        $headerKeysToRedactedValues =
            $headerKeysToRedactedValues ?: self::getDefaultHeaderKeysToRedactedValues();
        foreach ($headers as $header => $value) {
            if (array_key_exists($header, $headerKeysToRedactedValues)) {
                $headers[$header] = $headerKeysToRedactedValues[$header];
            }
        }
        return $headers;
    }

    /**
     * @return array the mapping of header keys to redacted values
     */
    private static function getDefaultHeaderKeysToRedactedValues()
    {
        if (!isset(self::$HEADER_KEYS_TO_REDACTED_VALUES)) {
            self::$HEADER_KEYS_TO_REDACTED_VALUES = [
                self::$DEVELOPER_TOKEN_HEADER_KEY => 'REDACTED'
            ];
        }

        return self::$HEADER_KEYS_TO_REDACTED_VALUES;
    }
}
