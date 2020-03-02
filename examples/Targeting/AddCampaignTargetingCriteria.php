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

namespace Google\Ads\GoogleAds\Examples\Targeting;

require __DIR__ . '/../../vendor/autoload.php';

use GetOpt\GetOpt;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentNames;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentParser;
use Google\Ads\GoogleAds\Lib\V3\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V3\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V3\GoogleAdsException;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\Util\V3\ResourceNames;
use Google\Ads\GoogleAds\V3\Common\AddressInfo;
use Google\Ads\GoogleAds\V3\Common\KeywordInfo;
use Google\Ads\GoogleAds\V3\Common\LocationInfo;
use Google\Ads\GoogleAds\V3\Common\ProximityInfo;
use Google\Ads\GoogleAds\V3\Enums\KeywordMatchTypeEnum\KeywordMatchType;
use Google\Ads\GoogleAds\V3\Enums\ProximityRadiusUnitsEnum\ProximityRadiusUnits;
use Google\Ads\GoogleAds\V3\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V3\Resources\CampaignCriterion;
use Google\Ads\GoogleAds\V3\Services\CampaignCriterionOperation;
use Google\ApiCore\ApiException;
use Google\Protobuf\BoolValue;
use Google\Protobuf\DoubleValue;
use Google\Protobuf\StringValue;

/**
 * This example adds campaign targeting criteria. To get campaign targeting criteria, run
 * GetCampaignTargetingCriteria.php.
 */
class AddCampaignTargetingCriteria
{
    const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';
    const CAMPAIGN_ID = 'INSERT_CAMPAIGN_ID_HERE';
    // Specify the keyword text to be created as a negative campaign criterion.
    const KEYWORD_TEXT = 'INSERT_KEYWORD_TEXT_HERE';
    // Specify the location ID below.
    // For more information on determining LOCATION_ID value, see:
    // https://developers.google.com/adwords/api/docs/appendix/geotargeting.
    const LOCATION_ID = 21167; // New York

    public static function main()
    {
        // Either pass the required parameters for this example on the command line, or insert them
        // into the constants above.
        $options = (new ArgumentParser())->parseCommandArguments([
            ArgumentNames::CUSTOMER_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::CAMPAIGN_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::KEYWORD_TEXT => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::LOCATION_ID => GetOpt::OPTIONAL_ARGUMENT
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
                $options[ArgumentNames::CAMPAIGN_ID] ?: self::CAMPAIGN_ID,
                $options[ArgumentNames::KEYWORD_TEXT] ?: self::KEYWORD_TEXT,
                $options[ArgumentNames::LOCATION_ID] ?: self::LOCATION_ID
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
     * @param int $customerId the customer ID
     * @param int $campaignId the campaign ID to add a criterion to
     * @param string $keywordText the keyword text to be added as a negative campaign criterion
     * @param int $locationId the location ID to be targeted
     */
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        int $campaignId,
        string $keywordText,
        $locationId
    ) {
        $campaignResourceName = ResourceNames::forCampaign($customerId, $campaignId);

        $operations = [
            // Creates a campaign criterion operation for the specified keyword text.
            self::createNegativeKeywordCampaignCriterionOperation(
                $keywordText,
                $campaignResourceName
            ),
            // Creates a campaign criterion operation for the specified location ID.
            self::createLocationCampaignCriterionOperation($locationId, $campaignResourceName),
            // Creates a campaign criterion operation for the area around a specific address
            // (proximity).
            self::createProximityCampaignCriterionOperation($campaignResourceName)
        ];

        // Issues a mutate request to add the campaign criterion.
        $campaignCriterionServiceClient = $googleAdsClient->getCampaignCriterionServiceClient();
        $response =
            $campaignCriterionServiceClient->mutateCampaignCriteria($customerId, $operations);

        printf("Added %d campaign criteria:%s", $response->getResults()->count(), PHP_EOL);

        foreach ($response->getResults() as $addedCampaignCriterion) {
            /** @var CampaignCriterion $addedCampaignCriterion */
            print $addedCampaignCriterion->getResourceName() . PHP_EOL;
        }
    }

    /**
     * Creates a campaign criterion operation using the specified keyword text. The keyword text
     * will be used to create a negative campaign criterion.
     *
     * @param string $keywordText the keyword text to be added
     * @param string $campaignResourceName the campaign resource name that the created criterion
     *      belongs to
     * @return CampaignCriterionOperation the created campaign criterion operation
     */
    private static function createNegativeKeywordCampaignCriterionOperation(
        string $keywordText,
        $campaignResourceName
    ) {
        // Constructs a negative campaign criterion for the specified campaign ID using the
        // specified keyword text info.
        $campaignCriterion = new CampaignCriterion([
            // Creates a keyword with BROAD match type.
            'keyword' => new KeywordInfo([
                'text' => new StringValue(['value' => $keywordText]),
                'match_type' => KeywordMatchType::BROAD
            ]),
            // Sets the campaign criterion as a negative criterion.
            'negative' => new BoolValue(['value' => true]),
            'campaign' => new StringValue(['value' => $campaignResourceName])
        ]);

        return new CampaignCriterionOperation(['create' => $campaignCriterion]);
    }

    /**
     * Creates a campaign criterion operation using the specified location ID.
     *
     * @param int $locationId the specified location ID
     * @param string $campaignResourceName the campaign resource name that the created criterion
     *      belongs to
     * @return CampaignCriterionOperation the created campaign criterion operation
     */
    private static function createLocationCampaignCriterionOperation(
        int $locationId,
        string $campaignResourceName
    ) {
        // Constructs a campaign criterion for the specified campaign ID using the specified
        // location ID.
        $campaignCriterion = new CampaignCriterion([
            // Creates a location using the specified location ID.
            'location' => new LocationInfo([
                'geo_target_constant' => new StringValue(
                    // Besides using location ID, you can also search by location names using
                    // GeoTargetConstantServiceClient::suggestGeoTargetConstants() and directly
                    // apply GeoTargetConstant::$resourceName here. An example can be found
                    // in GetGeoTargetConstantByNames.php.
                    ['value' => ResourceNames::forGeoTargetConstant($locationId)]
                )
            ]),
            'campaign' => new StringValue(['value' => $campaignResourceName])
        ]);

        return new CampaignCriterionOperation(['create' => $campaignCriterion]);
    }

    /**
     * Creates a campaign criterion operation for the area around a specific address (proximity).
     *
     * @param string $campaignResourceName the campaign resource name that the created criterion
     *      belongs to
     * @return CampaignCriterionOperation the created campaign criterion operation
     */
    private static function createProximityCampaignCriterionOperation(string $campaignResourceName)
    {
        // Constructs a campaign criterion as a proximity.
        $campaignCriterion = new CampaignCriterion([
            'proximity' => new ProximityInfo([
                'address' => new AddressInfo([
                    'street_address' => new StringValue(['value' => '38 avenue de l\'Opéra']),
                    'city_name' => new StringValue(['value' => 'Paris']),
                    'postal_code' => new StringValue(['value' => '75002']),
                    'country_code' => new StringValue(['value' => 'FR']),
                ]),
                'radius' => new DoubleValue(['value' => 10.0]),
                // Default is kilometers.
                'radius_units' => ProximityRadiusUnits::MILES
            ]),
            'campaign' => new StringValue(['value' => $campaignResourceName])
        ]);

        return new CampaignCriterionOperation(['create' => $campaignCriterion]);
    }
}

AddCampaignTargetingCriteria::main();
