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

namespace Google\Ads\GoogleAds\Examples\Remarketing;

require __DIR__ . '/../../vendor/autoload.php';

use GetOpt\GetOpt;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentNames;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentParser;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsException;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\Util\FieldMasks;
use Google\Ads\GoogleAds\Util\V18\ResourceNames;
use Google\Ads\GoogleAds\V18\Common\TargetingSetting;
use Google\Ads\GoogleAds\V18\Common\TargetRestriction;
use Google\Ads\GoogleAds\V18\Enums\TargetingDimensionEnum\TargetingDimension;
use Google\Ads\GoogleAds\V18\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V18\Resources\AdGroup;
use Google\Ads\GoogleAds\V18\Services\AdGroupOperation;
use Google\Ads\GoogleAds\V18\Services\GoogleAdsRow;
use Google\Ads\GoogleAds\V18\Services\MutateAdGroupsRequest;
use Google\Ads\GoogleAds\V18\Services\SearchGoogleAdsRequest;
use Google\ApiCore\ApiException;

/**
 * This example demonstrates how to update the AUDIENCE target restriction of a given ad group to
 * bid only.
 */
class UpdateAudienceTargetRestriction
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
     * @param int $adGroupId the ID of the ad group to update
     */
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        int $adGroupId
    ) {
        $googleAdsServiceClient = $googleAdsClient->getGoogleAdsServiceClient();
        // Creates a query that retrieves the targeting settings from a given ad group.
        // [START update_audience_target_restriction]
        $query = "SELECT ad_group.id, ad_group.name, " .
            "ad_group.targeting_setting.target_restrictions " .
            "FROM ad_group " .
            "WHERE ad_group.id = $adGroupId";
        // [END update_audience_target_restriction]

        // Issues a search request.
        $response =
            $googleAdsServiceClient->search(SearchGoogleAdsRequest::build($customerId, $query));

        // Iterates over all rows in all pages and prints the requested field values for
        // the ad group in each row.
        // Creates a flag that specifies whether or not we should update the targeting setting. We
        // should only do this if we find an AUDIENCE target restriction with bid_only set to false.
        $shouldUpdateTargetingSetting = false;
        $targetRestrictions = [];
        foreach ($response->iterateAllElements() as $googleAdsRow) {
            /** @var GoogleAdsRow $googleAdsRow */
            $adGroup = $googleAdsRow->getAdGroup();
            // Prints the results.
            printf(
                "Ad group with ID %d and name '%s' was found with the following targeting " .
                "restrictions.%s",
                $adGroup->getId(),
                $adGroup->getName(),
                PHP_EOL
            );

            // Loops through and prints each of the target restrictions.
            // Builds the updated audience target restriction based on the current because Google
            // will overwrite the entire targeting_setting field of the ad group when the field
            // mask includes targeting_setting in an update operation.
            // [START update_audience_target_restriction_1]
            foreach (
                $adGroup->getTargetingSetting()->getTargetRestrictions() as $targetRestriction
            ) {
                // Prints the results.
                $targetingDimension = $targetRestriction->getTargetingDimension();
                $bidOnly = $targetRestriction->getBidOnly();
                printf(
                    "- Targeting restriction with targeting dimension '%s' and bid only set to " .
                    "'%s'.%s",
                    TargetingDimension::name($targetingDimension),
                    $bidOnly ? 'true' : 'false',
                    PHP_EOL
                );

                // Adds the target restriction to the TargetingSetting object as is if the targeting
                // dimension has a value other than AUDIENCE because those should not change.
                if ($targetingDimension !== TargetingDimension::AUDIENCE) {
                    $targetRestrictions[] = $targetRestriction;
                } elseif (!$bidOnly) {
                    $shouldUpdateTargetingSetting = true;

                    // Adds an AUDIENCE target restriction with bid_only set to true to the
                    // targeting setting object. This has the effect of setting the AUDIENCE
                    // target restriction to "Observation".
                    // For more details about the targeting setting, visit
                    // https://support.google.com/google-ads/answer/7365594.
                    $targetRestrictions[] = new TargetRestriction([
                        'targeting_dimension' => TargetingDimension::AUDIENCE,
                        'bid_only' => true
                    ]);
                }
            }
            // [END update_audience_target_restriction_1]
        }

        // Only updates the TargetingSetting on the ad group if there is an AUDIENCE
        // TargetRestriction with bid_only set to false.
        if ($shouldUpdateTargetingSetting) {
            self::updateTargetingSetting(
                $googleAdsClient,
                $customerId,
                $adGroupId,
                new TargetingSetting([
                    'target_restrictions' => $targetRestrictions
                ])
            );
        } else {
            print "No target restrictions to update." . PHP_EOL;
        }
    }

    /**
     * Updates the TargetingSetting of an ad group.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param int $adGroupId the ID of the ad group to update
     * @param TargetingSetting $targetingSetting the updated targeting setting
     */
    // [START update_audience_target_restriction_2]
    private static function updateTargetingSetting(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        int $adGroupId,
        TargetingSetting $targetingSetting
    ) {
        // Creates an ad group object with the proper resource name and updated targeting setting.
        $adGroup = new AdGroup([
            'resource_name' => ResourceNames::forAdGroup($customerId, $adGroupId),
            'targeting_setting' => $targetingSetting
        ]);

        // Constructs an operation that will update the ad group with the specified resource name,
        // using the FieldMasks utility to derive the update mask. This mask tells the Google Ads
        // API which attributes of the ad group you want to change.
        $adGroupOperation = new AdGroupOperation();
        $adGroupOperation->setUpdate($adGroup);
        $adGroupOperation->setUpdateMask(FieldMasks::allSetFieldsOf($adGroup));

        // Issues a mutate request to update the ad group.
        $adGroupServiceClient = $googleAdsClient->getAdGroupServiceClient();
        $response = $adGroupServiceClient->mutateAdGroups(
            MutateAdGroupsRequest::build($customerId, [$adGroupOperation])
        );

        // Prints the resource name of the updated ad group.
        printf(
            "Updated targeting setting of ad group with resource name '%s'; set the AUDIENCE " .
            "target restriction to 'Observation'.%s",
            $response->getResults()[0]->getResourceName(),
            PHP_EOL
        );
    }
    // [END update_audience_target_restriction_2]
}

UpdateAudienceTargetRestriction::main();
