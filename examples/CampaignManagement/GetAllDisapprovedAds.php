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

namespace Google\Ads\GoogleAds\Examples\CampaignManagement;

require __DIR__ . '/../../vendor/autoload.php';

use GetOpt\GetOpt;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentNames;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentParser;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsException;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\V18\Common\PolicyTopicEntry;
use Google\Ads\GoogleAds\V18\Common\PolicyTopicEvidence;
use Google\Ads\GoogleAds\V18\Enums\AdTypeEnum\AdType;
use Google\Ads\GoogleAds\V18\Enums\PolicyTopicEntryTypeEnum\PolicyTopicEntryType;
use Google\Ads\GoogleAds\V18\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V18\Services\GoogleAdsRow;
use Google\Ads\GoogleAds\V18\Services\SearchGoogleAdsRequest;
use Google\Ads\GoogleAds\V18\Services\SearchSettings;
use Google\ApiCore\ApiException;

/** This example retrieves all the disapproved ads in a given campaign. */
class GetAllDisapprovedAds
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
        $googleAdsClient = (new GoogleAdsClientBuilder())
            ->fromFile()
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
     * @param int $campaignId the campaign ID for which campaign ads will be retrieved
     */
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        int $campaignId
    ) {
        $googleAdsServiceClient = $googleAdsClient->getGoogleAdsServiceClient();
        // Creates a query that retrieves all the disapproved ads of the specified campaign ID.
        $query = 'SELECT ad_group_ad.ad.id, '
                  . 'ad_group_ad.ad.type, '
                  . 'ad_group_ad.policy_summary.approval_status, '
                  . 'ad_group_ad.policy_summary.policy_topic_entries '
                  . 'FROM ad_group_ad '
                  . 'WHERE campaign.id = ' . $campaignId . ' '
                  . 'AND ad_group_ad.policy_summary.approval_status = DISAPPROVED';

        // Issues a search request.
        $response = $googleAdsServiceClient->search(
            SearchGoogleAdsRequest::build($customerId, $query)->setSearchSettings(
                new SearchSettings(['return_total_results_count' => true])
            )
        );

        // Iterates over all rows in all pages and counts disapproved ads.
        foreach ($response->iterateAllElements() as $googleAdsRow) {
            /** @var GoogleAdsRow $googleAdsRow */
            $adGroupAd = $googleAdsRow->getAdGroupAd();
            $policySummary = $adGroupAd->getPolicySummary();
            $ad = $adGroupAd->getAd();

            printf(
                "Ad with ID %d and type '%s' was disapproved with the following policy "
                . "topic entries:%s",
                $ad->getId(),
                AdType::name($ad->getType()),
                PHP_EOL
            );
            foreach ($policySummary->getPolicyTopicEntries() as $policyTopicEntry) {
                /** @var PolicyTopicEntry $policyTopicEntry */
                printf(
                    "  topic: '%s', type: '%s'%s",
                    $policyTopicEntry->getTopic(),
                    PolicyTopicEntryType::name($policyTopicEntry->getType()),
                    PHP_EOL
                );
                foreach ($policyTopicEntry->getEvidences() as $evidence) {
                    /** @var PolicyTopicEvidence $evidence */
                    $textList = $evidence->getTextList();
                    if (!empty($textList)) {
                        for ($i = 0; $i < $textList->getTexts()->count(); $i++) {
                            printf(
                                "    evidence text[%d]: '%s'%s",
                                $i,
                                $textList->getTexts()[$i],
                                PHP_EOL
                            );
                        }
                    }
                }
            }
        }
        printf(
            "Number of disapproved ads found: %d.%s",
            $response->getPage()->getResponseObject()->getTotalResultsCount(),
            PHP_EOL
        );
    }
}

GetAllDisapprovedAds::main();
