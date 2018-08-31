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
use Google\Ads\GoogleAds\Lib\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\GoogleAdsException;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\Util\ResourceNames;
use Google\Ads\GoogleAds\V0\Common\KeywordInfo;
use Google\Ads\GoogleAds\V0\Enums\KeywordMatchTypeEnum\KeywordMatchType;
use Google\Ads\GoogleAds\V0\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V0\Resources\CampaignCriterion;
use Google\Ads\GoogleAds\V0\Services\CampaignCriterionOperation;
use Google\ApiCore\ApiException;
use Google\Protobuf\BoolValue;
use Google\Protobuf\StringValue;

/**
 * This example adds campaign targeting criteria. To get campaign targeting criteria, run
 * GetCampaignTargetingCriteria.php.
 */
class AddCampaignTargetingCriteria
{
    const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';
    const CAMPAIGN_ID = 'INSERT_CAMPAIGN_ID_HERE';

    public static function main()
    {
        // Either pass the required parameters for this example on the command line, or insert them
        // into the constants above.
        $options = (new ArgumentParser())->parseCommandArguments([
            ArgumentNames::CUSTOMER_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::CAMPAIGN_ID => GetOpt::REQUIRED_ARGUMENT
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
                $options[ArgumentNames::CAMPAIGN_ID] ?: self::CAMPAIGN_ID
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
     * @param int $campaignId the campaign ID to add a criterion to
     */
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        $customerId,
        $campaignId
    ) {
        $campaignResourceName = ResourceNames::forCampaign($customerId, $campaignId);

        // Constructs a campaign criterion for the specified campaign ID using the specified keyword
        // text info.
        $campaignCriterion1 = new CampaignCriterion([
            // Creates a keyword with BROAD match type.
            'keyword' => new KeywordInfo([
                'text' => new StringValue(['value' => 'jupiter cruise']),
                'match_type' => KeywordMatchType::BROAD
            ]),
            'campaign' => new StringValue(['value' => $campaignResourceName]),
            // Sets the campaign criterion as a negative criterion.
            'negative' => new BoolValue(['value' => true])
        ]);
        // Creates a campaign criterion operation for the created campaign criterion.
        $campaignCriterionOperation1 = new CampaignCriterionOperation();
        $campaignCriterionOperation1->setCreate($campaignCriterion1);

        // Constructs another campaign criterion for the specified campaign ID using the specified
        // keyword text info.
        $campaignCriterion2 = new CampaignCriterion([
            // Creates another keyword with PHRASE type.
            'keyword' => new KeywordInfo([
                'text' => new StringValue(['value' => 'mars cruise']),
                'match_type' => KeywordMatchType::PHRASE
            ]),
            'campaign' => new StringValue(['value' => $campaignResourceName]),
            // Sets the campaign criterion as a negative criterion.
            'negative' => new BoolValue(['value' => true])
        ]);
        // Creates a campaign criterion operation for the created campaign criterion.
        $campaignCriterionOperation2 = new CampaignCriterionOperation();
        $campaignCriterionOperation2->setCreate($campaignCriterion2);

        // Issues a mutate request to add the campaign criterion.
        $campaignCriterionServiceClient = $googleAdsClient->getCampaignCriterionServiceClient();
        $response = $campaignCriterionServiceClient->mutateCampaignCriteria(
            $customerId,
            [$campaignCriterionOperation1, $campaignCriterionOperation2]
        );

        printf("Added %d campaign criteria:%s", $response->getResults()->count(), PHP_EOL);

        foreach ($response->getResults() as $addedCampaignCriterion) {
            /** @var CampaignCriterion $addedCampaignCriterion */
            print $addedCampaignCriterion->getResourceName() . PHP_EOL;
        }
    }
}

AddCampaignTargetingCriteria::main();
