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

use Google\ApiCore\ArrayTrait;
use Psr\Log\LoggerInterface;
use Psr\Log\LogLevel;

/**
 * Unary call logger for logging Google Ads API requests and responses.
 */
final class GoogleAdsUnaryCallLogger
{
    use ArrayTrait;
    use GoogleAdsLoggerTrait;

    private $logger;
    private $logLevel;
    private $endpoint;
    private $logMessageFormatter;
    private $context;

    /**
     * Constructs the Google Ads unary call logger with the specified PSR-3 logger interface.
     *
     * @param LoggerInterface $logger the PSR-3 logger
     * @param string $logLevel the PSR-3 log level
     * @param string $endpoint the API endpoint for the gRPC call
     * @param null|LogMessageFormatter $logMessageFormatter the log message formatter
     * @param array $context the context for logging
     */
    public function __construct(
        LoggerInterface $logger,
        $logLevel,
        $endpoint,
        LogMessageFormatter $logMessageFormatter = null,
        $context = []
    ) {
        $this->logger = $logger;
        $this->logLevel = $logLevel;
        $this->endpoint = $endpoint;
        $this->logMessageFormatter = $logMessageFormatter ?: new LogMessageFormatter();
        $this->context = $context;
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
        $this->logger->log(
            $this->getAppropriateLogLevel($responseData['status']->code),
            $this->logMessageFormatter->formatSummary($requestData, $responseData, $this->endpoint),
            $this->context
        );
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
        $this->logger->log(
            // Logs details at one finer level than the summary.
            self::getNextFinerLogLevel(
                $this->getAppropriateLogLevel($responseData['status']->code)
            ),
            $this->logMessageFormatter->formatDetail($requestData, $responseData, $this->endpoint),
            $this->context
        );
    }

    /**
     * Sets up the log level in case it's not specified by the user.
     * For successful requests, use INFO. For failed requests, use WARNING.
     */
    private function getAppropriateLogLevel($code)
    {
        $logLevel = $this->logLevel;
        if (is_null($logLevel)) {
            $logLevel = $code === 0 ? LogLevel::INFO : LogLevel::WARNING;
        }
        return $logLevel;
    }
}
