# Google Ads API Client Library for PHP

[![Minimum PHP Version](https://img.shields.io/badge/php-%3E%3D%208.1-8892BF.svg)](https://www.php.net/supported-versions.php)
[![Latest Stable
Version](https://img.shields.io/packagist/v/googleads/google-ads-php.svg)](https://packagist.org/packages/googleads/google-ads-php)
[![Total Downloads](https://poser.pugx.org/googleads/google-ads-php/downloads.svg)](https://packagist.org/packages/googleads/google-ads-php)
[![License](https://poser.pugx.org/googleads/google-ads-php/license.svg)](https://packagist.org/packages/googleads/google-ads-php)
[![codecov](https://codecov.io/gh/googleads/google-ads-php/branch/master/graph/badge.svg)](https://codecov.io/gh/googleads/google-ads-php)

This project hosts the PHP client library for the [Google Ads
API](https://developers.google.com/google-ads/api/docs/start).
It adheres to the [PHP sunset schedule]([url](https://www.php.net/supported-versions.php)) and updates the composer.json file _four_ to _five_ months after the minimum required PHP version reaches its end-of-life. Based on the existing supported PHP versions, the update occurs about once a year.

**IMPORTANT** The Google Ads API client library for PHP has been updated to require PHP version 8 as the minimum version, as announced in [#880](https://github.com/googleads/google-ads-php/issues/880).
This means that the final version of the library that supports PHP 7 is [v19.2.0](https://github.com/googleads/google-ads-php/releases/tag/v19.2.0), which supports Google Ads API v12 to v14.

Google Ads API v14 is [scheduled to be sunset by the end of May 2024](https://developers.google.com/google-ads/api/docs/sunset-dates#timetable). Therefore, PHP 7 users have about *11 months* to migrate to PHP 8 in order to continue using the library without disruption.

## Features

*   Distributed via [Composer](https://getcomposer.org/) and
    [Packagist](https://packagist.org/packages/googleads/google-ads-php).
*   Easy management of credentials.
*   Easy creation of Google Ads API service clients.

## Requirements

*   Both 32-bit and 64-bit PHP systems are supported but we highly recommend to use 64-bit if you can. This is because many fields of the Google Ads API are typed as 64-bit integers and casting their values to `int` instead of `float` from 32-bit systems can lead to issues. The largest integer value supported in 32-bit PHP systems is usually 2147483647, see the predefined constant [PHP_INT_MAX](https://www.php.net/manual/en/reserved.constants.php) for more details.
*   This library depends on [Composer](https://getcomposer.org/). If you don't
    have it installed on your computer yet, follow the [installation guide for
    Linux/Unix/OS
    X](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-osx) or
    [installation guide for
    Windows](https://getcomposer.org/doc/00-intro.md#installation-windows). For
    the rest of this guide, we're assuming that you're using Linux/Unix/OS X and
    have Composer installed
    [globally](https://getcomposer.org/doc/00-intro.md#globally), thus, your
    installed Composer is available on the command line as `composer`.
*   System requirements and dependencies can be found in
    [composer.json](composer.json) of this library.
    *   **PHP**: You can find the required minimum PHP version in `"php"` under the [**`require`**](https://getcomposer.org/doc/01-basic-usage.md#the-require-key) key of [`composer.json`](composer.json). We usually set it to the minimum PHP version for which the PHP development team still provide security fixes. Whenever such a version is sunset, we'll update the composer file accordingly. Currently, the update frequency is around once a year based on the [official schedule](https://www.php.net/supported-versions.php).
    Visit [this page](https://www.php.net/manual/en/getting-started.php) for introduction to PHP.
    *   **gRPC**: To install the gRPC PHP extension, make sure to meet any additional requirements listed in the project's [**documentation**](https://cloud.google.com/php/grpc#installing_the_grpc_extension). You can learn more about how gRPC is used by this library by reading our [Transport](https://developers.google.com/google-ads/api/docs/client-libs/php/transport) guide. It usually take minutes to install using `PECL`:
        1.  Install the extension using the command `sudo pecl install grpc`.
        1.  Add a line `extension=grpc.so` to the `php.ini` file.
        1.  Run `php -i | grep grpc` in a terminal: it is well installed
            and configured if it returns something
    *   **Protobuf**: To install the Protobuf PHP extension, make sure to meet any additional requirements listed in the project's [**documentation**](https://github.com/protocolbuffers/protobuf/tree/HEAD/php#requirements). If you encounter any error during the installation, you can skip this step and the PHP implementation will be used instead. You can learn more about how Protobuf is used by this library by reading our [Protobuf implementations](https://developers.google.com/google-ads/api/docs/client-libs/php/protobuf) guide. It usually take minutes to install using `PECL`:
        1.  Install the extension using the command `sudo pecl install protobuf`.
        1.  Add a line `extension=protobuf.so` to the `php.ini` file.
        1.  Run `php -i | grep protobuf` in a terminal: it is well installed
            and configured if it returns something
*   You need a [developer
    token](https://developers.google.com/google-ads/api/docs/first-call/dev-token)
    to connect to the Google Ads API.
*   One version of the library typically supports multiple versions of the Google Ads API. You can check the [CHANGELOG.md](https://github.com/googleads/google-ads-php/blob/HEAD/CHANGELOG.md) file to identify what versions of the library added or removed the support for a specific version of the Google Ads API. For example, the version `V7` of the Google Ads API was added in the version `v9.0.0` of the library as described [here](https://github.com/googleads/google-ads-php/blob/HEAD/CHANGELOG.md#900).

## Getting started

### Running code examples

Follow the below steps if you want to try our code examples.

1.  Clone this project in the directory of your choice via:

        git clone https://github.com/googleads/google-ads-php.git

1.  Change into the `google-ads-php` directory.

        cd google-ads-php

    You'll see some files and subdirectories:

    *   `composer.json`: the composer file, which holds the requirements of this
        library.
    *   `src`: source code of the library.
    *   `tests`: tests of the library code.
    *   `examples`: many examples that demonstrate how to use the library to
        execute common use cases via the Google Ads API.
    *   `metadata`: some metadata files used internally by the source code.
        They're automatically generated files, so you shouldn't modify them.

1.  Run `composer install` at the command prompt. This will install all
    dependencies needed for using the library and running examples.

1.  Set up your OAuth2 credentials.

    The Google Ads API uses [OAuth2](http://oauth.net/2/) as the authentication
    mechanism. Choose the appropriate option below based on your use case, and
    read and follow the instructions that the example prints to the console.

    *   Copy the sample [`google_ads_php.ini`](examples/Authentication/google_ads_php.ini)
        to your [home
        directory](https://en.wikipedia.org/wiki/Home_directory#Default_home_directory_per_operating_system).
        This library determines the home directory of your computer by using
        [`EnvironmentalVariables::getHome()`](https://github.com/googleads/google-ads-php/blob/HEAD/src/Google/Ads/GoogleAds/Util/EnvironmentalVariables.php#L36).

    *   Follow the instructions at
        https://developers.google.com/google-ads/api/docs/oauth/cloud-project to
        create an OAuth2 client ID and secret for the **installed application**
        OAuth2 flow.

    *   Run the
        [GenerateUserCredentials](https://github.com/googleads/google-ads-php/blob/HEAD/examples/Authentication/GenerateUserCredentials.php)
        example, which will prompt you for your OAuth2 client ID and secret.

    *   Copy the output from the last step of the example into the
        `google_ads_php.ini` file in your home directory. Don't forget to fill
        in your developer token too.

1.  Run the [GetCampaigns example](examples/BasicOperations/GetCampaigns.php) to
    test if your credentials are valid. You also need to pass your Google Ads
    account's customer ID without dashes as a command-line parameter:

        php examples/BasicOperations/GetCampaigns.php --customerId <YOUR_CUSTOMER_ID>

    **NOTE**: Code examples are meant to be run from command prompt, not via the
    web browsers.

1.  Explore other examples.

    The [examples](examples) directory contains several useful examples. Most of
    the examples require parameters. You can see what are required by running
    code examples with `--help` as a command-line parameter.

    **Note:** You will find comments with the formats `[START...]` and `[END...]`
    in the source code of these examples. These are only used for technical purposes,
    you can completely disregard them.

### Installing the library as your project's dependency

1.  Change into the root directory of your project.
1.  Run `composer require googleads/google-ads-php` at the command prompt. This
    will install this library and all its dependencies in the `vendor/`
    directory of your project's root directory.
1.  **Set up your OAuth2 credentials** like described in the previous section.
1.  You can now use this library by importing its classes like shown in the [code
    examples](examples/).

## Basic usage

### Instantiate a client

To issue requests via the Google Ads API, you first need to create a
[GoogleAdsClient](https://github.com/googleads/google-ads-php/blob/HEAD/src/Google/Ads/GoogleAds/Lib/V18/GoogleAdsClient.php).

For more information on how to configure a client when instantiating it, see the
[configuration guide](https://developers.google.com/google-ads/api/docs/client-libs/php/configuration).

### Get a service client

Once you have an instance of `GoogleAdsClient`, you can obtain a service client
for a particular service using one of the `get...ServiceClient()` methods.

## Client configuration

See the [Configuration guide](https://developers.google.com/google-ads/api/docs/client-libs/php/configuration).

## Transport

There are different types of transport that can be used. See the
[Transport guide](https://developers.google.com/google-ads/api/docs/client-libs/php/transport)
for more information.

## Protobuf

[Protobuf](https://developers.google.com/protocol-buffers/docs/overview) is used regardless of the
transport used to request the Google Ads API.

See the [Protobuf guide](https://developers.google.com/google-ads/api/docs/client-libs/php/protobuf)
for more information.

## Running in a Docker container

See the [Running in a Docker container guide](https://developers.google.com/google-ads/api/docs/client-libs/php/docker).

## Logging

See the [Logging guide](https://developers.google.com/google-ads/api/docs/client-libs/php/logging).

## Proxy configuration

See the [Proxy guide](https://developers.google.com/google-ads/api/docs/client-libs/php/proxy).

## Performance

See the [Performance guide](https://developers.google.com/google-ads/api/docs/client-libs/php/performance).

## Miscellaneous

### Wiki

-   https://github.com/googleads/google-ads-php/wiki

### Issue tracker

-   https://github.com/googleads/google-ads-php/issues

### API Documentation:

-   https://developers.google.com/google-ads/api/docs

### Support forum

-   https://groups.google.com/forum/#!forum/adwords-api

### Authors

*   [Thanet Knack Praneenararat](https://github.com/fiboknacky)
*   [Mattia Tommasone](https://github.com/Raibaz)
