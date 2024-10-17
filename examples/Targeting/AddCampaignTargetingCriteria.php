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
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsException;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\Util\V18\ResourceNames;
use Google\Ads\GoogleAds\V18\Common\AddressInfo;
use Google\Ads\GoogleAds\V18\Common\KeywordInfo;
use Google\Ads\GoogleAds\V18\Common\LocationInfo;
use Google\Ads\GoogleAds\V18\Common\ProximityInfo;
use Google\Ads\GoogleAds\V18\Enums\KeywordMatchTypeEnum\KeywordMatchType;
use Google\Ads\GoogleAds\V18\Enums\ProximityRadiusUnitsEnum\ProximityRadiusUnits;
use Google\Ads\GoogleAds\V18\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V18\Resources\CampaignCriterion;
use Google\Ads\GoogleAds\V18\Services\CampaignCriterionOperation;
use Google\Ads\GoogleAds\V18\Services\MutateCampaignCriteriaRequest;
use Google\ApiCore\ApiException;

/**
 * This example adds campaign targeting criteria. To get campaign targeting criteria, run
 * GetCampaignTargetingCriteria.php.
 */
class AddCampaignTargetingCriteria
{
    private const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';
    private const CAMPAIGN_ID = 'INSERT_CAMPAIGN_ID_HERE';
    // Specify the keyword text to be created as a negative campaign criterion.
    private const KEYWORD_TEXT = 'INSERT_KEYWORD_TEXT_HERE';
    // Specify the location ID below.
    // For more information on determining LOCATION_ID value, see:
    // https://developers.google.com/google-ads/api/reference/data/geotargets.
    private const LOCATION_ID = 21167; // New York

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
        $response = $campaignCriterionServiceClient->mutateCampaignCriteria(
            MutateCampaignCriteriaRequest::build($customerId, $operations)
        );

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
                'text' => $keywordText,
                'match_type' => KeywordMatchType::BROAD
            ]),
            // Sets the campaign criterion as a negative criterion.
            'negative' => true,
            'campaign' => $campaignResourceName
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
    // [START add_campaign_targeting_criteria]
    private static function createLocationCampaignCriterionOperation(
        int $locationId,
        string $campaignResourceName
    ) {
        // Constructs a campaign criterion for the specified campaign ID using the specified
        // location ID.
        $campaignCriterion = new CampaignCriterion([
            // Creates a location using the specified location ID.
            'location' => new LocationInfo([
                // Besides using location ID, you can also search by location names using
                // GeoTargetConstantServiceClient::suggestGeoTargetConstants() and directly
                // apply GeoTargetConstant::$resourceName here. An example can be found
                // in GetGeoTargetConstantByNames.php.
                'geo_target_constant' => ResourceNames::forGeoTargetConstant($locationId)
            ]),
            'campaign' => $campaignResourceName
        ]);

        return new CampaignCriterionOperation(['create' => $campaignCriterion]);
    }
    // [END add_campaign_targeting_criteria]

    /**
     * Creates a campaign criterion operation for the area around a specific address (proximity).
     *
     * @param string $campaignResourceName the campaign resource name that the created criterion
     *      belongs to
     * @return CampaignCriterionOperation the created campaign criterion operation
     */
    // [START add_campaign_targeting_criteria_1]
    private static function createProximityCampaignCriterionOperation(string $campaignResourceName)
    {
        // Constructs a campaign criterion as a proximity.
        $campaignCriterion = new CampaignCriterion([
            'proximity' => new ProximityInfo([
                'address' => new AddressInfo([
                    'street_address' => '38 avenue de l\'Opéra',
                    'city_name' => 'Paris',
                    'postal_code' => '75002',
                    'country_code' => 'FR',
                ]),
                'radius' => 10.0,
                // Default is kilometers.
                'radius_units' => ProximityRadiusUnits::MILES
            ]),
            'campaign' => $campaignResourceName
        ]);

        return new CampaignCriterionOperation(['create' => $campaignCriterion]);
    }
    // [END add_campaign_targeting_criteria_1]
}

AddCampaignTargetingCriteria::main();
