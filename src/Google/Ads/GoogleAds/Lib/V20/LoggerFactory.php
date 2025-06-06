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

namespace Google\Ads\GoogleAds\Lib\V20;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Psr\Log\LoggerInterface;

/**
 * Creates loggers configured for this library.
 */
final class LoggerFactory
{
    /**
     * Creates a Monolog logger with a stream handler configured for this library.
     *
     * @param string $channel a description of what is being logged
     * @param string|resource|null $stream the stream the logger will log to; if
     *     `null`, will log to STDERR
     * @param string|int|null $level the log level; can be a PSR-3 log level
     *     string, or a Monolog log level int
     * @return LoggerInterface
     * @see Logger
     */
    public function createLogger($channel, $stream = null, $level = null)
    {
        $stream = $stream === null ? fopen('php://stderr', 'w') : $stream;
        // Detailed message will be logged at one level finer than that specified by the user.
        $level = $level !== null ? $level : Logger::DEBUG;
        $handler = new StreamHandler($stream, $level);
        $handler->getFormatter()->ignoreEmptyContextAndExtra();
        $handler->getFormatter()->allowInlineLineBreaks();

        return new Logger($channel, [$handler]);
    }
}
