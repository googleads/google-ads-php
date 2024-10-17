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

namespace Google\Ads\GoogleAds\Examples\Travel;

require __DIR__ . '/../../vendor/autoload.php';

use GetOpt\GetOpt;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentNames;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentParser;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsException;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\Util\V18\ResourceNames;
use Google\Ads\GoogleAds\V18\Common\HotelCheckInDayInfo;
use Google\Ads\GoogleAds\V18\Common\HotelLengthOfStayInfo;
use Google\Ads\GoogleAds\V18\Enums\DayOfWeekEnum\DayOfWeek;
use Google\Ads\GoogleAds\V18\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V18\Resources\AdGroupBidModifier;
use Google\Ads\GoogleAds\V18\Services\AdGroupBidModifierOperation;
use Google\Ads\GoogleAds\V18\Services\MutateAdGroupBidModifiersRequest;
use Google\ApiCore\ApiException;

/**
 * This example shows how to add ad group bid modifiers to a hotel ad group based on hotel check-in
 * day and hotel length of stay.
 */
class AddHotelAdGroupBidModifiers
{
    private const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';
    private const AD_GROUP_ID = 'INSERT_AD_GROUP_ID_HERE';

    public static function main()
    {
        // Either pass the required parameters for this example on the command line, or insert them
        // into the constants above.
        $options = (new ArgumentParser())->parseCommandArguments([
            ArgumentNames::CUSTOMER_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::AD_GROUP_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::CHECK_IN_DAY_CRITERION_ID => GetOpt::OPTIONAL_ARGUMENT
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
     * @param int $adGroupId the ad group ID
     */
    // [START add_hotel_ad_group_bid_modifiers]
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        int $adGroupId
    ) {
        $operations = [];

        // 1) Creates an ad group bid modifier based on the hotel check-in day.
        $checkInDayAdGroupBidModifier = new AdGroupBidModifier([
            // Sets the ad group.
            'ad_group' => ResourceNames::forAdGroup($customerId, $adGroupId),
            'hotel_check_in_day' => new HotelCheckInDayInfo([
                'day_of_week' => DayOfWeek::MONDAY
            ]),
            // Sets the bid modifier value to 150%.
            'bid_modifier' => 1.5
        ]);

        // Creates an ad group bid modifier operation.
        $checkInDayAdGroupBidModifierOperation = new AdGroupBidModifierOperation();
        $checkInDayAdGroupBidModifierOperation->setCreate($checkInDayAdGroupBidModifier);
        $operations[] = $checkInDayAdGroupBidModifierOperation;

        // 2) Creates an ad group bid modifier based on the hotel length of stay.
        $lengthOfStayAdGroupBidModifier = new AdGroupBidModifier([
            // Sets the ad group.
            'ad_group' => ResourceNames::forAdGroup($customerId, $adGroupId),
            // Creates the hotel length of stay info.
            'hotel_length_of_stay' => new HotelLengthOfStayInfo([
                'min_nights' => 3,
                'max_nights' => 7,
            ]),
            // Sets the bid modifier value to 170%.
            'bid_modifier' => 1.7
        ]);

        // Creates an ad group bid modifier operation.
        $lengthOfStayAdGroupBidModifierOperation = new AdGroupBidModifierOperation();
        $lengthOfStayAdGroupBidModifierOperation->setCreate(
            $lengthOfStayAdGroupBidModifier
        );
        $operations[] = $lengthOfStayAdGroupBidModifierOperation;

        // Issues a mutate request to add an ad group bid modifiers.
        $adGroupBidModifierServiceClient = $googleAdsClient->getAdGroupBidModifierServiceClient();
        $response = $adGroupBidModifierServiceClient->mutateAdGroupBidModifiers(
            MutateAdGroupBidModifiersRequest::build($customerId, $operations)
        );

        // Print out resource names of the added ad group bid modifiers.
        printf(
            "Added %d hotel ad group bid modifiers:%s",
            $response->getResults()->count(),
            PHP_EOL
        );
        foreach ($response->getResults() as $addedAdGroupBidModifier) {
            /** @var AdGroupBidModifier $addedAdGroupBidModifier */
            print $addedAdGroupBidModifier->getResourceName() . PHP_EOL;
        }
    }
    // [END add_hotel_ad_group_bid_modifiers]
}

AddHotelAdGroupBidModifiers::main();
