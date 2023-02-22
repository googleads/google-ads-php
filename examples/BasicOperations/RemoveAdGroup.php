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

namespace Google\Ads\GoogleAds\Examples\BasicOperations;

require __DIR__ . '/../../vendor/autoload.php';

use GetOpt\GetOpt;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentNames;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentParser;
use Google\Ads\GoogleAds\Lib\V13\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V13\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V13\GoogleAdsException;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\Util\V13\ResourceNames;
use Google\Ads\GoogleAds\V13\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V13\Resources\AdGroup;
use Google\Ads\GoogleAds\V13\Services\AdGroupOperation;
use Google\ApiCore\ApiException;

/**
 * This example deletes an ad group using the `REMOVE` operation. To get ad groups, run
 * GetAdGroups.php.
 */
class RemoveAdGroup
{
    private const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';
    private const AD_GROUP_ID = 'INSERT_AD_GROUP_ID_HERE';

    public static function main()
    {
        // Either pass the required parameters for this example on the command line, or insert them
        // into the constants above.
        $options = (new ArgumentParser())->parseCommandArguments([
            ArgumentNames::CUSTOMER_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::AD_GROUP_ID => GetOpt::REQUIRED_ARGUMENT
        ]);

        // Generate a refreshable OAuth2 credential for authentication.
        $oAuth2Credential = (new OAuth2TokenBuilder())->fromFile()->build();

        // Construct a Google Ads client configured from a properties file and the
        // OAuth2 credentials above.
        $googleAdsClient = (new GoogleAdsClientBuilder())->fromFile()
            ->withOAuth2Credential($oAuth2Credential)
            ->build();

        try {
            self::runExample(
                $googleAdsClient,
                $options[ArgumentNames::CUSTOMER_ID] ?: self::CUSTOMER_ID,
                $options[ArgumentNames::AD_GROUP_ID] ?: self::AD_GROUP_ID
            );
        } catch (GoogleAdsException $googleAdsException) {
            printf(
                "Request with ID '%s' has failed.%sGoogle Ads failure details:%s",
                $googleAdsException->getRequestId(),
                PHP_EOL,
                PHP_EOL
            );
            foreach ($googleAdsException->getGoogleAdsFailure()->getErrors() as $error) {
                /** @var GoogleAdsError $error */
                printf(
                    "\t%s: %s%s",
                    $error->getErrorCode()->getErrorCode(),
                    $error->getMessage(),
                    PHP_EOL
                );
            }
            exit(1);
        } catch (ApiException $apiException) {
            printf(
                "ApiException was thrown with message '%s'.%s",
                $apiException->getMessage(),
                PHP_EOL
            );
            exit(1);
        }
    }

    /**
     * Runs the example.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param int $adGroupId the ID of ad group to remove
     */
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        int $adGroupId
    ) {
        // Creates ad group resource name.
        $adGroupResourceName = ResourceNames::forAdGroup($customerId, $adGroupId);

        // Constructs an operation that will remove the ad group with the specified resource name.
        $adGroupOperation = new AdGroupOperation();
        $adGroupOperation->setRemove($adGroupResourceName);

        // Issues a mutate request to remove the ad group.
        $adGroupServiceClient = $googleAdsClient->getAdGroupServiceClient();
        $response = $adGroupServiceClient->mutateAdGroups(
            $customerId,
            [$adGroupOperation]
        );

        // Prints the resource name of the removed ad group.
        /** @var AdGroup $removedAdGroup */
        $removedAdGroup = $response->getResults()[0];
        printf(
            "Removed ad group with resource name: '%s'%s",
            $removedAdGroup->getResourceName(),
            PHP_EOL
        );
    }
}

RemoveAdGroup::main();
