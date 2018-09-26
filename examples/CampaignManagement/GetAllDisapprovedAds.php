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
use Google\Ads\GoogleAds\Lib\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\GoogleAdsException;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\V0\Common\PolicyTopicEntry;
use Google\Ads\GoogleAds\V0\Common\PolicyTopicEvidence;
use Google\Ads\GoogleAds\V0\Enums\PolicyApprovalStatusEnum\PolicyApprovalStatus;
use Google\Ads\GoogleAds\V0\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V0\Services\GoogleAdsRow;
use Google\ApiCore\ApiException;

/** This example retrieves all the disapproved ads in a given campaign. */
class GetAllDisapprovedAds
{
    const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';
    const CAMPAIGN_ID = 'INSERT_CAMPAIGN_ID_HERE';

    const PAGE_SIZE = 1000;

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
     * @param int $campaignId the campaign ID for which campaign ads will be retrieved
     */
    public static function runExample(GoogleAdsClient $googleAdsClient, $customerId, $campaignId)
    {
        $googleAdsServiceClient = $googleAdsClient->getGoogleAdsServiceClient();
        // Creates a query that retrieves all ads of the specified campaign ID.
        $query = 'SELECT ad_group_ad.ad.id, '
                  . 'ad_group_ad.ad.type, '
                  . 'ad_group_ad.policy_summary '
                  . 'FROM ad_group_ad '
                  . 'WHERE campaign.id = ' . $campaignId;

        // Issues a search request by specifying page size.
        $response =
            $googleAdsServiceClient->search($customerId, $query, ['pageSize' => self::PAGE_SIZE]);

        $disapprovedAdsCount = 0;

        // Iterates over all rows in all pages and counts disapproved ads.
        foreach ($response->iterateAllElements() as $googleAdsRow) {
            /** @var GoogleAdsRow $googleAdsRow */
            $adGroupAd = $googleAdsRow->getAdGroupAd();
            $policySummary = $adGroupAd->getPolicySummary();
            $ad = $adGroupAd->getAd();

            if ($policySummary->getApprovalStatus() !== PolicyApprovalStatus::DISAPPROVED) {
                continue;
            }

            $disapprovedAdsCount++;

            // Note that the ad type printed below is an enum value.
            // For example, a value of 3 will be returned when the keyword match type is
            // 'EXPANDED_TEXT_AD'.
            // A mapping of enum names to values can be found in AdType.php.
            printf(
                "Ad with ID %d and type '%d' was disapproved with the following policy "
                . "topic entries:%s",
                $ad->getId()->getValue(),
                $ad->getType(),
                PHP_EOL
            );
            foreach ($policySummary->getPolicyTopicEntries() as $policyTopicEntry) {
                /** @var PolicyTopicEntry $policyTopicEntry */
                // Note that the policy topic entry type printed below is an enum value.
                // For example, a value of 2 will be returned when the policy topic entry type is
                // 'PROHIBITED'.
                // A mapping of enum names to values can be found in PolicyTopicEntryType.php.
                printf(
                    "  topic: '%s', type: '%d'%s",
                    $policyTopicEntry->getTopic()->getValue(),
                    $policyTopicEntry->getType(),
                    PHP_EOL
                );
                foreach ($policyTopicEntry->getEvidences() as $evidence) {
                    /** @var PolicyTopicEvidence $evidence */
                    $textList = $evidence->getTextList();
                    for ($i = 0; $i < $textList->getTexts()->count(); $i++) {
                        printf(
                            "    evidence text[%d]: '%s'%s",
                            $i,
                            $textList->getTexts()[$i]->getValue(),
                            PHP_EOL
                        );
                    }
                }
            }
        }
        printf("Number of disapproved ads found: %d%s", $disapprovedAdsCount, PHP_EOL);
    }
}

GetAllDisapprovedAds::main();
