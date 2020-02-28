<?php

/*
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

use Google\ApiCore\ArrayTrait;
use Monolog\Logger;
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
    private static $logLevelList;
    private static $logLevelNamesToNormalizedValues;

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
        if (!isset(self::$logLevelList) || !isset(self::$logLevelNamesToNormalizedValues)) {
            self::$logLevelList = array_keys(Logger::getLevels());
            self::$logLevelNamesToNormalizedValues = array_flip(self::$logLevelList);
        }
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
            $this->logger->log(
                $level,
                $this->logMessageFormatter->formatDetail($requestData, $responseData, $this->endpoint),
                $this->context
            );
        }
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
        return self::$logLevelNamesToNormalizedValues[strtoupper($this->filterLevel)] <=
                self::$logLevelNamesToNormalizedValues[strtoupper($level)];
    }

    /**
     * Returns the next finer PSR-3 log level for the specified log level.
     *
     * @param string $level the current log level
     * @return string the level name
     */
    private static function getNextFinerLogLevel($level)
    {
        $currentLevel = self::$logLevelNamesToNormalizedValues[strtoupper($level)];
        if (!isset($currentLevel)) {
            throw new \InvalidArgumentException("The specified log level '$level' is invalid.");
        }
        if ($currentLevel === 0) {
            // DEBUG is the finest level, so returns itself instead.
            return $level;
        }

        return self::$logLevelList[$currentLevel - 1];
    }
}
