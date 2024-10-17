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
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsException;
use Google\Ads\GoogleAds\V18\Enums\DayOfWeekEnum\DayOfWeek;
use Google\Ads\GoogleAds\V18\Enums\DeviceEnum\Device;
use Google\Ads\GoogleAds\V18\Enums\HotelDateSelectionTypeEnum\HotelDateSelectionType;
use Google\Ads\GoogleAds\V18\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V18\Services\GoogleAdsRow;
use Google\Ads\GoogleAds\V18\Services\SearchGoogleAdsRequest;
use Google\ApiCore\ApiException;

/** This example gets ad group bid modifiers. */
class GetAdGroupBidModifiers
{
    private const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';
    // Optional: Specify an ad group ID below to restrict search to only a given ad group.
    private const AD_GROUP_ID = null;

    public static function main()
    {
        // Either pass the required parameters for this example on the command line, or insert them
        // into the constants above.
        $options = (new ArgumentParser())->parseCommandArguments([
            ArgumentNames::CUSTOMER_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::AD_GROUP_ID => GetOpt::OPTIONAL_ARGUMENT
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
     * @param int|null $adGroupId the ad group ID for which ad group bid modifiers will be
     *     retrieved. If `null`, returns from all ad groups
     */
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        ?int $adGroupId
    ) {
        $googleAdsServiceClient = $googleAdsClient->getGoogleAdsServiceClient();
        // Creates a query that retrieves ad group bid modifiers.
        $query =
          'SELECT ad_group.id, ad_group_bid_modifier.criterion_id, campaign.id, '
              . 'ad_group_bid_modifier.bid_modifier, '
              . 'ad_group_bid_modifier.device.type, '
              . 'ad_group_bid_modifier.hotel_date_selection_type.type, '
              . 'ad_group_bid_modifier.hotel_advance_booking_window.min_days, '
              . 'ad_group_bid_modifier.hotel_advance_booking_window.max_days, '
              . 'ad_group_bid_modifier.hotel_length_of_stay.min_nights, '
              . 'ad_group_bid_modifier.hotel_length_of_stay.max_nights, '
              . 'ad_group_bid_modifier.hotel_check_in_day.day_of_week, '
              . 'ad_group_bid_modifier.hotel_check_in_date_range.start_date, '
              . 'ad_group_bid_modifier.hotel_check_in_date_range.end_date '
          . 'FROM ad_group_bid_modifier';
        if ($adGroupId !== null) {
            $query .= " WHERE ad_group.id = $adGroupId";
        }
        $query .= " LIMIT 10000";

        // Issues a search request.
        $response =
            $googleAdsServiceClient->search(SearchGoogleAdsRequest::build($customerId, $query));

        // Iterates over all rows in all pages and prints the requested field values for
        // the ad group bid modifier in each row.
        foreach ($response->iterateAllElements() as $googleAdsRow) {
            /** @var GoogleAdsRow $googleAdsRow */
            $adGroupBidModifier = $googleAdsRow->getAdGroupBidModifier();
            printf(
                "Ad group bid modifier with criterion ID %d in ad group ID %d of campaign ID %d ",
                $adGroupBidModifier->getCriterionId(),
                $googleAdsRow->getAdGroup()->getId(),
                $googleAdsRow->getCampaign()->getId()
            );

            // When working with an 'optional' protocol buffer field such as AdGroup::$bid_modifier,
            // use hasXX() to check if the field is set, and only retrieve the value using getXX()
            // if hasXX() returns true. See the protocol buffer documentation on field presence for
            // more information:
            // https://protobuf.dev/programming-guides/field_presence/#presence-in-proto3-apis

            if ($adGroupBidModifier->hasBidModifier()) {
                // Prints the bid modifier value since it is set.
                printf(
                    "has a bid modifier value of %.2f.%s",
                    $adGroupBidModifier->getBidModifier(),
                    PHP_EOL
                );
            } else {
                // Does not print the bid modifier value since it is not set. Printing the result of
                // $adGroupBidModifier->getBidModifier() in this case would be misleading, since it
                // will be 0.
                print 'does NOT have a bid modifier value.' . PHP_EOL;
            }

            $criterionDetails = ' - Criterion type: ' . $adGroupBidModifier->getCriterion() . ', ';
            switch ($adGroupBidModifier->getCriterion()) {
                case 'device':
                    $criterionDetails .= 'Type: ' .
                        Device::name($adGroupBidModifier->getDevice()->getType());
                    break;
                case 'hotel_advance_booking_window':
                    $criterionDetails .= 'Min Days: ' .
                        $adGroupBidModifier->getHotelAdvanceBookingWindow()->getMinDays() . ', ';
                    $criterionDetails .= 'Max Days: ' .
                        $adGroupBidModifier->getHotelAdvanceBookingWindow()->getMaxDays();
                    break;
                case 'hotel_check_in_day':
                    $criterionDetails .= 'Day of the week: ' .
                        DayOfWeek::name($adGroupBidModifier->getHotelCheckInDay()->getDayOfWeek());
                    break;
                case 'hotel_date_selection_type':
                    $criterionDetails .= 'Date selection type: ' .
                        HotelDateSelectionType::name(
                            $adGroupBidModifier->getHotelDateSelectionType()->getType()
                        );
                    break;
                case 'hotel_length_of_stay':
                    $criterionDetails .= 'Min Nights: ' .
                        $adGroupBidModifier->getHotelLengthOfStay()->getMinNights() . ', ';
                    $criterionDetails .= 'Max Nights: ' .
                        $adGroupBidModifier->getHotelLengthOfStay()->getMaxNights();
                    break;
                case 'hotel_check_in_date_range':
                    $criterionDetails .= 'Start Date: ' .
                        $adGroupBidModifier->getHotelCheckInDateRange()->getStartDate() . ', ';
                    $criterionDetails .= 'End Date: ' .
                        $adGroupBidModifier->getHotelCheckInDateRange()->getEndDate();
                    break;
            }
            print $criterionDetails . PHP_EOL;
        }
    }
}

GetAdGroupBidModifiers::main();
