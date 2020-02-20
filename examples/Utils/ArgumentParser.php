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

namespace Google\Ads\GoogleAds\Examples\Utils;

use GetOpt\ArgumentException;
use GetOpt\GetOpt;
use InvalidArgumentException;

/**
 * Wraps `GetOpt` and normalizes arguments parsed by it.
 *
 * @see GetOpt
 */
class ArgumentParser
{
    /**
     * Parses any arguments specified via the command line. For those in the provided argument
     * names that are not passed, provides null values instead.
     *
     * @param array $argumentNames the associative array of argument names to their types
     * @return array the argument names to their values
     */
    public function parseCommandArguments(array $argumentNames)
    {
        $getOpt = new GetOpt();
        $normalizedOptions = [];
        $numRequiredArguments = 0;
        $getOpt->addOption(['h', 'help', GetOpt::NO_ARGUMENT, 'Show this help and quit']);
        foreach ($argumentNames as $argumentName => $argumentType) {
            $normalizedOptions[$argumentName] = null;
            // Adds an option for an argument using a long option name only.
            $getOpt->addOption(
                [
                    null,
                    $argumentName,
                    $argumentType,
                    ArgumentNames::$ARGUMENTS_TO_DESCRIPTIONS[$argumentName]
                ]
            );

            if ($argumentType === GetOpt::REQUIRED_ARGUMENT) {
                $numRequiredArguments++;
            }
        }

        // Parse arguments and catch exceptions.
        try {
            $getOpt->process();
        } catch (ArgumentException $exception) {
            // When there are any errors regarding arguments, such as invalid argument names, or
            // specifying required arguments but not providing values, 'ArgumentException' will
            // be thrown. Show the help text in these cases.
            echo PHP_EOL . $getOpt->getHelpText();
            throw $exception;
        }
        // Show help text when requested.
        if (!is_null($getOpt->getOption('help'))) {
            $this->printHelpMessageAndExit($getOpt);
            // Help text is printed, so no arguments are passed. The below line is reached only
            // in tests.
            return [];
        }

        $numPassedRequiredArguments = 0;
        foreach ($getOpt->getOptions() as $optionName => $optionValue) {
            if ($argumentNames[$optionName] === GetOpt::REQUIRED_ARGUMENT) {
                $numPassedRequiredArguments++;
            }
            $normalizedOptions[$optionName] = $optionValue;
        }
        // Don't allow the case when optional arguments are passed, but required arguments are not.
        if (
            count($getOpt->getOptions()) > 0
            && $numPassedRequiredArguments !== $numRequiredArguments
        ) {
            echo PHP_EOL . $getOpt->getHelpText();
            throw new InvalidArgumentException(
                'All required arguments must be specified.' . PHP_EOL
            );
        }
        return $normalizedOptions;
    }

    /**
     * Print the help message and exit the program.
     *
     * @param GetOpt $getOpt the GetOpt object to print its help text
     */
    public function printHelpMessageAndExit(GetOpt $getOpt)
    {
        echo PHP_EOL . $getOpt->getHelpText();
        exit;
    }
}
