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

/**
 * Prints whether a given extension is installed or not and its version when it is installed.
 * @param string $extensionName the name of the extension to print information about
 */
function printExtensionInformation(string $extensionName)
{
    $isInstalled =  extension_loaded($extensionName);
    printf(
        'The PHP Extension %s is %sinstalled%s%s',
        $extensionName,
        $isInstalled ? '' : 'not ',
        $isInstalled ? ': ' . phpversion($extensionName) : '',
        PHP_EOL
    );
}

// Prints the general information about PHP.
print '================= PHP GENERAL INFORMATION' . PHP_EOL;
phpinfo(INFO_GENERAL) . PHP_EOL;

// Prints information about the two optional PHP Extensions.
print '================= PHP EXTENSION INFORMATION' . PHP_EOL;
printExtensionInformation('grpc');
printExtensionInformation('protobuf');
