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

namespace Google\Ads\GoogleAds\Lib\V18;

use Google\ApiCore\ArrayTrait;
use Google\ApiCore\Transport\Grpc\ForwardingCall;
use Psr\Log\LoggerInterface;
use Psr\Log\LogLevel;

/**
 * Call logger for logging Google Ads API requests and responses.
 */
final class GoogleAdsCallLogger
{
    use ArrayTrait;

    private $logger;
    private $filterLevel;
    private $endpoint;
    private $logMessageFormatter;
    private $context;
    // An associative array of all the log levels (based on the PSR-3 standard) to sequence numbers.
    // Sequence numbers are used to determine if a given log level is higher or lower than another,
    // which can help determine, e.g., if this library should log the requests/responses, depending
    // on the set filter level.
    private const LOG_LEVELS  = [
        'DEBUG' => 0,
        'INFO' => 1,
        'NOTICE' => 2,
        'WARNING' => 3,
        'ERROR' => 4,
        'CRITICAL' => 5,
        'ALERT' => 6,
        'EMERGENCY' => 7
    ];

    /**
     * Constructs the Google Ads call logger with the specified PSR-3 logger interface.
     *
     * @param LoggerInterface $logger the PSR-3 logger
     * @param string $filterLevel the PSR-3 minimum log level to log
     * @param string $endpoint the API endpoint for the gRPC call
     * @param null|LogMessageFormatter $logMessageFormatter the log message formatter
     * @param array $context the context for logging
     */
    public function __construct(
        LoggerInterface $logger,
        $filterLevel,
        $endpoint,
        LogMessageFormatter $logMessageFormatter = null,
        $context = []
    ) {
        $this->logger = $logger;
        $this->filterLevel = $filterLevel;
        $this->endpoint = $endpoint;
        $this->logMessageFormatter = $logMessageFormatter ?: new LogMessageFormatter();
        $this->context = $context;
    }

    /**
     * Logs summary and the details of the given status, request data and response.
     *
     * @param ForwardingCall $call the forwarding call whose details will be logged
     * @param object $status the status to be logged
     * @param array $requestData the request data
     * @param object|null $response the response to be logged
     */
    public function log(
        ForwardingCall $forwardingCall,
        object $status,
        array $requestData,
        ?object $response = null
    ) {
        $this->logSummary(
            $requestData,
            compact('response', 'status') + ['call' => $forwardingCall]
        );
        $this->logDetails(
            $requestData,
            compact('response', 'status') + ['call' => $forwardingCall]
        );
    }

    /**
     * Logs the summary of the request and response.
     *
     * @param array $requestData the request data to log
     * @param array $responseData the response data to log
     */
    public function logSummary(
        array $requestData,
        array $responseData
    ) {
        $level = $this->getAppropriateLogLevel($responseData['status']->code);
        // Logs only if the appropriate log level is enabled: this is to avoid unnecessary message
        // formatting as it could take a significant time depending on the request and response
        // payloads.
        if ($this->isEnabled($level)) {
            $this->logger->log(
                $level,
                $this->logMessageFormatter->formatSummary(
                    $requestData,
                    $responseData,
                    $this->endpoint
                ),
                $this->context
            );
        }
    }

    /**
     * Logs the details of the request, response, and errors if there are any.
     *
     * @param array $requestData the request data to log
     * @param array $responseData the response data to log
     */
    public function logDetails(
        array $requestData,
        array $responseData
    ) {
        // Logs details at one finer level than the summary.
        $level = self::getNextFinerLogLevel(
            $this->getAppropriateLogLevel($responseData['status']->code)
        );

        if ($this->isEnabled($level)) {
            // Logs only if the appropriate log level is enabled: this is to avoid unnecessary
            // message formatting as it could take a significant time depending on the request and
            // response payloads.
            $this->logger->log(
                $level,
                $this->logMessageFormatter->formatDetail($requestData, $responseData, $this->endpoint),
                $this->context
            );
        }
    }

    /**
     * Returns true if logging responses in detail is enabled for this logger. Responses are logged
     * at the DEBUG level.
     *
     * @return bool true if logging responses in detail is enabled for this logger
     */
    public function isLoggingResponsesEnabled(): bool
    {
        return $this->isEnabled(self::getNextFinerLogLevel($this->getAppropriateLogLevel(0)));
    }

    /**
     * Returns the appropriate log level depending on the response code.
     * For successful requests, use INFO. For failed requests, use WARNING.
     * @return string the log level to use
     */
    private function getAppropriateLogLevel($code): string
    {
        return $code === 0 ? LogLevel::INFO : LogLevel::WARNING;
    }

    /**
     * Returns true if $level is enabled, i.e. if the log level that this logger supports is
     * less than or equal to $level.
     * @return bool true if $level is enabled, false otherwise
     */
    private function isEnabled(string $level): bool
    {
        return self::LOG_LEVELS[strtoupper($this->filterLevel)] <=
                self::LOG_LEVELS[strtoupper($level)];
    }

    /**
     * Returns the next finer PSR-3 log level for the specified log level.
     *
     * @param string $level the current log level
     * @return string the level name
     */
    private static function getNextFinerLogLevel($level)
    {
        $currentLevel = self::LOG_LEVELS[strtoupper($level)];
        if (!isset($currentLevel)) {
            throw new \InvalidArgumentException("The specified log level '$level' is invalid.");
        }
        if ($currentLevel === 0) {
            // DEBUG is the finest level, so returns itself instead.
            return $level;
        }

        return strtolower(array_flip(self::LOG_LEVELS)[$currentLevel - 1]);
    }
}
