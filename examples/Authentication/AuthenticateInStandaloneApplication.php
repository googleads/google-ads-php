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

namespace Google\AdsApi\Examples\Authentication;

require __DIR__ . '/../../vendor/autoload.php';

use Google\Auth\CredentialsLoader;
use Google\Auth\OAuth2;

/**
 * This example will create an OAuth2 refresh token for the Google Ads API
 * using the installed application flow. You can then use this refresh token
 * to generate access tokens to authenticate against the Google Ads API you're
 * using.
 *
 * <p>This example is meant to be run from the command line and requires user
 * input.
 */
class AuthenticateInStandaloneApplication
{

    /**
     * @var string the OAuth2 scope for the Google Ads API
     * @see https://developers.google.com/google-ads/api/docs/oauth/internals#scope
     */
    const SCOPE = 'https://www.googleapis.com/auth/adwords';

    /**
     * @var string the Google OAuth2 authorization URI for OAuth2 requests
     * @see https://developers.google.com/identity/protocols/OAuth2InstalledApp#step-2-send-a-request-to-googles-oauth-20-server
     */
    const AUTHORIZATION_URI = 'https://accounts.google.com/o/oauth2/v2/auth';

    /**
     * @var string the redirect URI for OAuth2 installed application flows
     * @see https://developers.google.com/identity/protocols/OAuth2InstalledApp#request-parameter-redirect_uri
     */
    const REDIRECT_URI = 'urn:ietf:wg:oauth:2.0:oob';

    public static function main()
    {
        $stdin = fopen('php://stdin', 'r');

        print 'Enter your OAuth2 client ID here: ';
        $clientId = trim(fgets($stdin));

        print 'Enter your OAuth2 client secret here: ';
        $clientSecret = trim(fgets($stdin));

        print '[OPTIONAL] enter any additional OAuth2 scopes as a space '
            . 'delimited string here (the Google Ads API scope is already included): ';

        $scopes = self::SCOPE . ' ' . trim(fgets($stdin));

        $oauth2 = new OAuth2(
            [
                'authorizationUri' => self::AUTHORIZATION_URI,
                'redirectUri' => self::REDIRECT_URI,
                'tokenCredentialUri' => CredentialsLoader::TOKEN_CREDENTIAL_URI,
                'clientId' => $clientId,
                'clientSecret' => $clientSecret,
                'scope' => $scopes
            ]
        );

        printf(
            'Log into the Google account you use for Google Ads and visit the following URL:'
            . '%1$s%2$s%1$s%1$s',
            PHP_EOL,
            $oauth2->buildFullAuthorizationUri()
        );
        print 'After approving the application, enter the authorization code here: ';
        $code = trim(fgets($stdin));
        fclose($stdin);
        print PHP_EOL;

        $oauth2->setCode($code);
        $authToken = $oauth2->fetchAuthToken();
        print "Your refresh token is: {$authToken['refresh_token']}" . PHP_EOL . PHP_EOL;

        $propertiesToCopy = '[GOOGLE_ADS]' . PHP_EOL;
        $propertiesToCopy .= 'developerToken = "INSERT_DEVELOPER_TOKEN_HERE"' . PHP_EOL;
        $propertiesToCopy .=  <<<EOD
; Required for manager accounts only: Specify the login customer ID used to authenticate API calls.
; This will be the customer ID of the authenticated manager account. You can also specify this later
; in code if your application uses multiple manager account + OAuth pairs.
; loginCustomerId = "INSERT_LOGIN_CUSTOMER_ID_HERE"
EOD;
        $propertiesToCopy .= PHP_EOL . '[OAUTH2]' . PHP_EOL;
        $propertiesToCopy .= "clientId = \"$clientId\"" . PHP_EOL;
        $propertiesToCopy .= "clientSecret = \"$clientSecret\"" . PHP_EOL;
        $propertiesToCopy .= "refreshToken = \"{$authToken['refresh_token']}\"" . PHP_EOL;

        print 'Copy the text below into a file named "google_ads_php.ini" in your home '
            . 'directory, and replace "INSERT_DEVELOPER_TOKEN_HERE" with your developer '
            . 'token:' . PHP_EOL;
        print PHP_EOL . $propertiesToCopy;
    }
}

AuthenticateInStandaloneApplication::main();
