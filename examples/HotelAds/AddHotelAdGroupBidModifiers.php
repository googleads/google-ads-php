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

namespace Google\Ads\GoogleAds\Examples\HotelAds;

require __DIR__ . '/../../vendor/autoload.php';

use GetOpt\GetOpt;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentNames;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentParser;
use Google\Ads\GoogleAds\Lib\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\GoogleAdsException;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\Util\ResourceNames;
use Google\Ads\GoogleAds\V0\Common\HotelCheckInDayInfo;
use Google\Ads\GoogleAds\V0\Common\HotelLengthOfStayInfo;
use Google\Ads\GoogleAds\V0\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V0\Resources\AdGroupBidModifier;
use Google\Ads\GoogleAds\V0\Services\AdGroupBidModifierOperation;
use Google\ApiCore\ApiException;
use Google\Protobuf\DoubleValue;
use Google\Protobuf\Int64Value;
use Google\Protobuf\StringValue;

/**
 * This example shows how to add ad group bid modifiers to a hotel ad group.
 *
 * Ad group bid modifiers based on hotel check-in day and hotel length of stay will be added.
 *
 * For hotel check-in day, you need to specify the resource name, which includes the fixed criterion
 * ID of the check-in day you want to set. In addition, you don't call
 * `AdGroupBidModifier::setAdGroup()` to set an ad group for this bid modifier type.
 *
 * For hotel length of stay, you don't need to specify the resource name, but need to call
 * `AdGroupBidModifier::setAdGroup()` to set an ad group instead.
 */
class AddHotelAdGroupBidModifiers
{
    const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';
    const AD_GROUP_ID = 'INSERT_AD_GROUP_ID_HERE';

    // Specify the check-in day criterion ID here (in this example, 60, which represents Monday,
    // is used). See the table of check-in days and criterion IDs at:
    // https://developers.google.com/google-ads/api/docs/hotel-ads/create-ad-group-bid-modifier#hotelcheckindayinfo.
    const CHECK_IN_DAY_CRITERION_ID = 60;

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
                $options[ArgumentNames::AD_GROUP_ID] ?: self::AD_GROUP_ID,
                $options[ArgumentNames::CHECK_IN_DAY_CRITERION_ID]
                    ?: self::CHECK_IN_DAY_CRITERION_ID
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
        } catch (ApiException $apiException) {
            printf(
                "ApiException was thrown with message '%s'.%s",
                $apiException->getMessage(),
                PHP_EOL
            );
        }
    }

    /**
     * Runs the example.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the client customer ID without hyphens
     * @param int $adGroupId the ad group ID
     * @param int $checkInDayCriterionId the criterion ID of the hotel check-in day to set
     *     a bid modifier for
     */
    // [START addHotelAdGroupBidModifiers]
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        $customerId,
        $adGroupId,
        $checkInDayCriterionId
    ) {
        $operations = [];

        // 1) Creates an ad group bid modifier based on the hotel check-in day.
        $checkInDayAdGroupBidModifier = new AdGroupBidModifier();

        // Sets the resource name for the criterion ID whose value corresponds to the desired
        // check-in day.
        $checkInDayResourceName = ResourceNames::forAdGroupBidModifier(
            $customerId,
            $adGroupId,
            $checkInDayCriterionId
        );
        $checkInDayAdGroupBidModifier->setResourceName($checkInDayResourceName);

        // Sets the bid modifier value to 150%.
        $wrappedBidModifierValue = new DoubleValue();
        $wrappedBidModifierValue->setValue(1.5);
        $checkInDayAdGroupBidModifier->setBidModifier($wrappedBidModifierValue);
        $checkInDayAdGroupBidModifier->setHotelCheckInDay(new HotelCheckInDayInfo());

        // Creates an ad group bid modifier operation.
        $checkInDayAdGroupBidModifierOperation = new AdGroupBidModifierOperation();
        $checkInDayAdGroupBidModifierOperation->setCreate($checkInDayAdGroupBidModifier);
        $operations[] = $checkInDayAdGroupBidModifierOperation;

        // 2) Creates an ad group bid modifier based on the hotel length of stay.
        $lengthOfStayAdGroupBidModifier = new AdGroupBidModifier();

        // Sets the ad group.
        $wrappedAdGroupResourceName = new StringValue();
        $wrappedAdGroupResourceName->setValue(ResourceNames::forAdGroup($customerId, $adGroupId));
        $lengthOfStayAdGroupBidModifier->setAdGroup($wrappedAdGroupResourceName);

        // Creates the hotel length of stay info.
        $lengthOfStayInfo = new HotelLengthOfStayInfo();
        $wrappedMinNights = new Int64Value();
        $wrappedMinNights->setValue(3);
        $lengthOfStayInfo->setMinNights($wrappedMinNights);
        $wrappedMaxNights = new Int64Value();
        $wrappedMaxNights->setValue(7);
        $lengthOfStayInfo->setMaxNights($wrappedMaxNights);
        $lengthOfStayAdGroupBidModifier->setHotelLengthOfStay($lengthOfStayInfo);

        // Sets the bid modifier value to 170%.
        $wrappedBidModifierValue = new DoubleValue();
        $wrappedBidModifierValue->setValue(1.7);
        $lengthOfStayAdGroupBidModifier->setBidModifier($wrappedBidModifierValue);

        // Creates an ad group bid modifier operation.
        $lengthOfStayAdGroupBidModifierOperation = new AdGroupBidModifierOperation();
        $lengthOfStayAdGroupBidModifierOperation->setCreate(
            $lengthOfStayAdGroupBidModifier
        );
        $operations[] = $lengthOfStayAdGroupBidModifierOperation;

        // Issues a mutate request to add an ad group bid modifiers.
        $adGroupBidModifierServiceClient = $googleAdsClient->getAdGroupBidModifierServiceClient();
        $response = $adGroupBidModifierServiceClient->mutateAdGroupBidModifiers(
            $customerId,
            $operations
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
    // [END addHotelAdGroupBidModifiers]
}

AddHotelAdGroupBidModifiers::main();
