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

namespace Google\Ads\GoogleAds\Examples\AdvancedOperations;

require __DIR__ . '/../../vendor/autoload.php';

use GetOpt\GetOpt;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentNames;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentParser;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsException;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\Util\V18\ResourceNames;
use Google\Ads\GoogleAds\V18\Common\DeviceInfo;
use Google\Ads\GoogleAds\V18\Enums\DeviceEnum\Device;
use Google\Ads\GoogleAds\V18\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V18\Resources\AdGroupBidModifier;
use Google\Ads\GoogleAds\V18\Services\AdGroupBidModifierOperation;
use Google\Ads\GoogleAds\V18\Services\MutateAdGroupBidModifiersRequest;
use Google\ApiCore\ApiException;

/**
 * This example demonstrates how to add an ad group bid modifier for mobile devices. To get ad
 * group bid modifiers, see AdvancedOperations/GetAdGroupBidModifiers.php
 */
class AddAdGroupBidModifier
{
    private const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';
    private const AD_GROUP_ID = 'INSERT_AD_GROUP_ID_HERE';
    // Specify the bid modifier value here or the default specified below will be used.
    private const BID_MODIFIER_VALUE = 1.5;

    public static function main()
    {
        // Either pass the required parameters for this example on the command line, or insert them
        // into the constants above.
        $options = (new ArgumentParser())->parseCommandArguments([
            ArgumentNames::CUSTOMER_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::AD_GROUP_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::BID_MODIFIER_VALUE => GetOpt::OPTIONAL_ARGUMENT
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
                $options[ArgumentNames::AD_GROUP_ID] ?: self::AD_GROUP_ID,
                $options[ArgumentNames::BID_MODIFIER_VALUE] ?: self::BID_MODIFIER_VALUE
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
     * @param int $adGroupId the ad group ID to add an ad group bid modifier to
     * @param float $bidModifierValue the bid modifier value to set
     */
    // [START add_ad_group_bid_modifier]
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        int $adGroupId,
        float $bidModifierValue
    ) {
        // Creates an ad group bid modifier for mobile devices with the specified ad group ID and
        // bid modifier value.
        $adGroupBidModifier = new AdGroupBidModifier([
            'ad_group' => ResourceNames::forAdGroup($customerId, $adGroupId),
            'bid_modifier' => $bidModifierValue,
            'device' => new DeviceInfo(['type' => Device::MOBILE])
        ]);

        // Creates an ad group bid modifier operation for creating an ad group bid modifier.
        $adGroupBidModifierOperation = new AdGroupBidModifierOperation();
        $adGroupBidModifierOperation->setCreate($adGroupBidModifier);

        // Issues a mutate request to add the ad group bid modifier.
        $adGroupBidModifierServiceClient = $googleAdsClient->getAdGroupBidModifierServiceClient();
        $response = $adGroupBidModifierServiceClient->mutateAdGroupBidModifiers(
            MutateAdGroupBidModifiersRequest::build($customerId, [$adGroupBidModifierOperation])
        );

        printf("Added %d ad group bid modifier:%s", $response->getResults()->count(), PHP_EOL);

        foreach ($response->getResults() as $addedAdGroupBidModifier) {
            /** @var AdGroupBidModifier $addedAdGroupBidModifier */
            print $addedAdGroupBidModifier->getResourceName() . PHP_EOL;
        }
    }
    // [END add_ad_group_bid_modifier]
}

AddAdGroupBidModifier::main();
