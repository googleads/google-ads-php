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
use Google\Ads\GoogleAds\Examples\Utils\Helper;
use Google\Ads\GoogleAds\Lib\V14\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V14\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V14\GoogleAdsException;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\Util\V14\ResourceNames;
use Google\Ads\GoogleAds\V14\Common\KeywordInfo;
use Google\Ads\GoogleAds\V14\Enums\KeywordMatchTypeEnum\KeywordMatchType;
use Google\Ads\GoogleAds\V14\Enums\SharedSetTypeEnum\SharedSetType;
use Google\Ads\GoogleAds\V14\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V14\Resources\CampaignSharedSet;
use Google\Ads\GoogleAds\V14\Resources\SharedCriterion;
use Google\Ads\GoogleAds\V14\Resources\SharedSet;
use Google\Ads\GoogleAds\V14\Services\CampaignSharedSetOperation;
use Google\Ads\GoogleAds\V14\Services\SharedCriterionOperation;
use Google\Ads\GoogleAds\V14\Services\SharedSetOperation;
use Google\ApiCore\ApiException;

/**
 * This example creates a shared list of negative broad match keywords. It then attaches them to a
 * campaign.
 */
class CreateAndAttachSharedKeywordSet
{
    private const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';
    private const CAMPAIGN_ID = 'INSERT_CAMPAIGN_ID_HERE';

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
     * @param int $campaignId the ID of the campaign
     */
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        int $campaignId
    ) {
        // Create shared negative keyword set.
        $sharedSet = new SharedSet([
            'name' => 'API Negative keyword list - ' . Helper::getPrintableDatetime(),
            'type' => SharedSetType::NEGATIVE_KEYWORDS,
        ]);

        $sharedSetOperation = new SharedSetOperation();
        $sharedSetOperation->setCreate($sharedSet);

        $sharedSetServiceClient = $googleAdsClient->getSharedSetServiceClient();
        $response = $sharedSetServiceClient->mutateSharedSets(
            $customerId,
            [$sharedSetOperation]
        );

        $sharedSetResourceName = $response->getResults()[0]->getResourceName();
        print 'Created shared set ' . $sharedSetResourceName . PHP_EOL;

        // Creates shared set criteria.
        $sharedCriterionOperations = [];
        // Keywords to create a shared set of.
        $keywords = ['mars cruise', 'mars hotels'];
        foreach ($keywords as $keyword) {
            $sharedCriterion = new SharedCriterion([
                'keyword' => new KeywordInfo([
                    'text' => $keyword,
                    'match_type' => KeywordMatchType::BROAD
                ]),
                'shared_set' => $sharedSetResourceName
            ]);

            $sharedCriterionOperation = new SharedCriterionOperation();
            $sharedCriterionOperation->setCreate($sharedCriterion);
            $sharedCriterionOperations[] = $sharedCriterionOperation;
        }

        $sharedCriterionServiceClient = $googleAdsClient->getSharedCriterionServiceClient();
        $response = $sharedCriterionServiceClient->mutateSharedCriteria(
            $customerId,
            $sharedCriterionOperations
        );

        printf("Added %d shared criteria:%s", $response->getResults()->count(), PHP_EOL);
        foreach ($response->getResults() as $addedSharedCriterion) {
            /** @var SharedCriterion $addedSharedCriterion */
            print "\t" . $addedSharedCriterion->getResourceName() . PHP_EOL;
        }

        // Creates campaign shared set.
        $campaignSharedSet = new CampaignSharedSet([
            'campaign' => ResourceNames::forCampaign($customerId, $campaignId),
            'shared_set' => $sharedSetResourceName
        ]);

        $campaignSharedSetOperation = new CampaignSharedSetOperation();
        $campaignSharedSetOperation->setCreate($campaignSharedSet);

        $campaignSharedSetServiceClient = $googleAdsClient->getCampaignSharedSetServiceClient();
        $response = $campaignSharedSetServiceClient->mutateCampaignSharedSets(
            $customerId,
            [$campaignSharedSetOperation]
        );

        print 'Created campaign shared set: ' . $response->getResults()[0]->getResourceName()
            . PHP_EOL;
    }
}

CreateAndAttachSharedKeywordSet::main();
