<?php
/**
 * Copyright 2019 Google LLC
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
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\Lib\V1\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V1\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V1\GoogleAdsException;
use Google\Ads\GoogleAds\Util\V1\ResourceNames;
use Google\Ads\GoogleAds\V1\Common\ExpandedTextAdInfo;
use Google\Ads\GoogleAds\V1\Common\KeywordInfo;
use Google\Ads\GoogleAds\V1\Common\ManualCpc;
use Google\Ads\GoogleAds\V1\Enums\AdGroupAdStatusEnum\AdGroupAdStatus;
use Google\Ads\GoogleAds\V1\Enums\AdGroupCriterionStatusEnum\AdGroupCriterionStatus;
use Google\Ads\GoogleAds\V1\Enums\AdGroupTypeEnum\AdGroupType;
use Google\Ads\GoogleAds\V1\Enums\AdvertisingChannelTypeEnum\AdvertisingChannelType;
use Google\Ads\GoogleAds\V1\Enums\BudgetDeliveryMethodEnum\BudgetDeliveryMethod;
use Google\Ads\GoogleAds\V1\Enums\CampaignStatusEnum\CampaignStatus;
use Google\Ads\GoogleAds\V1\Enums\KeywordMatchTypeEnum\KeywordMatchType;
use Google\Ads\GoogleAds\V1\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V1\Errors\GoogleAdsFailure;
use Google\Ads\GoogleAds\V1\Resources\Ad;
use Google\Ads\GoogleAds\V1\Resources\AdGroup;
use Google\Ads\GoogleAds\V1\Resources\AdGroupAd;
use Google\Ads\GoogleAds\V1\Resources\AdGroupCriterion;
use Google\Ads\GoogleAds\V1\Resources\Campaign;
use Google\Ads\GoogleAds\V1\Resources\CampaignBudget;
use Google\Ads\GoogleAds\V1\Resources\CampaignCriterion;
use Google\Ads\GoogleAds\V1\Services\AdGroupAdOperation;
use Google\Ads\GoogleAds\V1\Services\AdGroupCriterionOperation;
use Google\Ads\GoogleAds\V1\Services\AdGroupOperation;
use Google\Ads\GoogleAds\V1\Services\CampaignBudgetOperation;
use Google\Ads\GoogleAds\V1\Services\CampaignCriterionOperation;
use Google\Ads\GoogleAds\V1\Services\CampaignOperation;
use Google\Ads\GoogleAds\V1\Services\CampaignServiceClient;
use Google\Ads\GoogleAds\V1\Services\MutateJobResult;
use Google\Ads\GoogleAds\V1\Services\MutateOperation;
use Google\ApiCore\ApiException;
use Google\Protobuf\BoolValue;
use Google\Protobuf\Int64Value;
use Google\Protobuf\StringValue;

/**
 * This example adds complete campaigns including campaign budgets, campaigns, ad groups and
 * keywords using MutateJobService.
 */
class AddCompleteCampaignsUsingMutateJob
{
    const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';

    const NUMBER_OF_CAMPAIGNS_TO_ADD = 2;
    const NUMBER_OF_ADGROUPS_TO_ADD = 2;
    const NUMBER_OF_KEYWORDS_TO_ADD = 5;
    const POLL_FREQUENCY_SECONDS = 1;
    const MAX_TOTAL_POLL_INTERVAL_SECONDS = 60;

    const PAGE_SIZE = 1000;

    /** @var int the negative temporary ID used in mutate job operations. */
    private static $temporaryId = -1;

    public static function main()
    {
        // Either pass the required parameters for this example on the command line, or insert them
        // into the constants above.
        $options = (new ArgumentParser())->parseCommandArguments([
            ArgumentNames::CUSTOMER_ID => GetOpt::REQUIRED_ARGUMENT,
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
                $options[ArgumentNames::CUSTOMER_ID] ?: self::CUSTOMER_ID
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
     */
    public static function runExample(GoogleAdsClient $googleAdsClient, $customerId)
    {
        $mutateJobServiceClient = $googleAdsClient->getMutateJobServiceClient();

        // Creates a new mutate job.
        $mutateJobResourceName =
            $mutateJobServiceClient->createMutateJob($customerId)->getResourceName();
        printf(
            "Created a mutate job with resource name: '%s'.%s",
            $mutateJobResourceName,
            PHP_EOL
        );

        // Adds all mutate job operations to the mutate job. As this is the first time for this
        // mutate job, pass null as a sequence token.
        $response = $mutateJobServiceClient->addMutateJobOperations(
            $mutateJobResourceName,
            null,
            self::buildAllOperations($customerId)
        );
        printf(
            "%d mutate operations have been added so far.%s",
            $response->getTotalOperations(),
            PHP_EOL
        );
        // You can use this next sequence token for calling addMutateJobOperations() next time.
        printf(
            "Next sequence token for adding next operations is '%s'.%s",
            $response->getNextSequenceToken(),
            PHP_EOL
        );

        // Runs the mutate job for executing the added operations.
        $operationResponse = $mutateJobServiceClient->runMutateJob($mutateJobResourceName);
        printf(
            "Mutate job with resource name '%s' has been executed.%s",
            $mutateJobResourceName,
            PHP_EOL
        );

        // Polls the server until the mutate job execution finishes by setting the initial poll
        // delay time and the total time to wait before time-out.
        $operationResponse->pollUntilComplete([
            'initialPollDelayMillis' => self::POLL_FREQUENCY_SECONDS * 1000,
            'totalPollTimeoutMillis' => self::MAX_TOTAL_POLL_INTERVAL_SECONDS * 1000
        ]);

        printf(
            "Mutate job with resource name '%s' has finished. Now, printing its results...%s",
            $mutateJobResourceName,
            PHP_EOL
        );
        // Gets all the results from running mutate job and print their information.
        $mutateJobResults = $mutateJobServiceClient->listMutateJobResults(
            $mutateJobResourceName,
            ['pageSize' => self::PAGE_SIZE]
        );
        foreach ($mutateJobResults->iterateAllElements() as $mutateJobResult) {
            /** @var MutateJobResult $mutateJobResult */
            printf(
                "Mutate job #%d has a status '%s' and response '%s'.%s",
                $mutateJobResult->getOperationIndex(),
                $mutateJobResult->getStatus()
                    ? $mutateJobResult->getStatus()->getMessage() : 'N/A',
                $mutateJobResult->getMutateOperationResponse()
                    ? $mutateJobResult->getMutateOperationResponse()->getResponse()
                    : 'N/A',
                PHP_EOL
            );
        }
    }

    /**
     * Builds all operations for creating a complete campaign and return an array of their
     * corresponding mutate operations.
     *
     * @param int $customerId the client customer ID
     * @return MutateOperation[] the mutate operations to be added to a mutate job
     */
    private static function buildAllOperations(int $customerId)
    {
        $mutateOperations = [];

        // Creates a new campaign budget operation and add it to the array of mutate operations.
        $campaignBudgetOperation = self::buildCampaignBudgetOperation($customerId);
        $mutateOperations[] =
            new MutateOperation(['campaign_budget_operation' => $campaignBudgetOperation]);

        // Creates new campaign operations and adds them to the array of mutate operations.
        $campaignOperations = self::buildCampaignOperations(
            $customerId,
            $campaignBudgetOperation->getCreate()->getResourceName()
        );
        $mutateOperations = array_merge($mutateOperations, array_map(
            function (CampaignOperation $campaignOperation) {
                return new MutateOperation(['campaign_operation' => $campaignOperation]);
            },
            $campaignOperations
        ));

        // Creates new campaign criterion operations and adds them to the array of mutate
        // operations.
        $mutateOperations = array_merge($mutateOperations, array_map(
            function (CampaignCriterionOperation $campaignCriterionOperation) {
                return new MutateOperation(
                    ['campaign_criterion_operation' => $campaignCriterionOperation]
                );
            },
            self::buildCampaignCriterionOperations($campaignOperations)
        ));

        // Creates new ad group operations and adds them to the array of mutate operations.
        $adGroupOperations = self::buildAdGroupOperations($customerId, $campaignOperations);
        $mutateOperations = array_merge($mutateOperations, array_map(
            function (AdGroupOperation $adGroupOperation) {
                return new MutateOperation(['ad_group_operation' => $adGroupOperation]);
            },
            $adGroupOperations
        ));

        // Creates new ad group criterion operations and adds them to the array of mutate
        // operations.
        $mutateOperations = array_merge($mutateOperations, array_map(
            function (AdGroupCriterionOperation $adGroupCriterionOperation) {
                return new MutateOperation(
                    ['ad_group_criterion_operation' => $adGroupCriterionOperation]
                );
            },
            self::buildAdGroupCriterionOperations($adGroupOperations)
        ));

        // Creates new ad group ad operations and adds them to the array of mutate operations.
        $mutateOperations = array_merge($mutateOperations, array_map(
            function (AdGroupAdOperation $adGroupAdOperation) {
                return new MutateOperation(['ad_group_ad_operation' => $adGroupAdOperation]);
            },
            self::buildAdGroupAdOperations($adGroupOperations)
        ));

        return $mutateOperations;
    }

    /**
     * Builds a new campaign budget operation for the specified customer ID.
     *
     * @param int $customerId the client customer ID
     * @return CampaignBudgetOperation the campaign budget operation
     */
    private static function buildCampaignBudgetOperation(int $customerId)
    {
        // Creates a campaign budget operation.
        return new CampaignBudgetOperation([
            'create' => new CampaignBudget([
                // Creates a resource name using the temporary ID.
                'resource_name' => ResourceNames::forCampaignBudget(
                    $customerId,
                    self::$temporaryId--
                ),
                'name' => new StringValue(['value' => 'Interplanetary Cruise Budget #' . uniqid()]),
                'delivery_method' => BudgetDeliveryMethod::STANDARD,
                'amount_micros' => new Int64Value(['value' => 5000000])
            ])
        ]);
    }

    /**
     * Builds new campaign operations for the specified customer ID.
     *
     * @param int $customerId the client customer ID
     * @param string $campaignBudgetResourceName the resource name of campaign budget to be used
     *     to create campaigns
     * @return CampaignOperation[] the campaign operations
     */
    private static function buildCampaignOperations(
        int $customerId,
        string $campaignBudgetResourceName
    ) {
        $operations = [];
        for ($i = 0; $i < self::NUMBER_OF_CAMPAIGNS_TO_ADD; $i++) {
            // Creates a campaign.
            $campaignId = self::$temporaryId--;
            $campaign = new Campaign([
                // Creates a resource name using the temporary ID.
                'resource_name' => ResourceNames::forCampaign($customerId, $campaignId),
                'name' => new StringValue(
                    ['value' => sprintf('Mutate job campaign #%s.%d', uniqid(), $campaignId)]
                ),
                'advertising_channel_type' => AdvertisingChannelType::SEARCH,
                // Recommendation: Set the campaign to PAUSED when creating it to prevent
                // the ads from immediately serving. Set to ENABLED once you've added
                // targeting and the ads are ready to serve.
                'status' => CampaignStatus::PAUSED,
                // Sets the bidding strategy and budget.
                'manual_cpc' => new ManualCpc(),
                'campaign_budget' => $campaignBudgetResourceName,
            ]);

            // Creates a campaign operation and add it to the operations list.
            $operations[] = new CampaignOperation(['create' => $campaign]);
        }

        return $operations;
    }

    /**
     * Builds new campaign criterion operations for creating negative campaign criteria
     * (as keywords).
     *
     * @param CampaignOperation[] $campaignOperations the campaign operations to be used to create
     *     campaign criteria
     * @return CampaignCriterionOperation[] the campaign criterion operations
     */
    private static function buildCampaignCriterionOperations(array $campaignOperations)
    {
        $operations = [];
        foreach ($campaignOperations as $campaignOperation) {
            // Creates a campaign criterion.
            $campaignCriterion = new CampaignCriterion([
                'keyword' => new KeywordInfo([
                    'text' => new StringValue(['value' => 'venus']),
                    'match_type' => KeywordMatchType::BROAD
                ]),
                // Sets the campaign criterion as a negative criterion.
                'negative' => new BoolValue(['value' => true]),
                'campaign' => new StringValue(
                    ['value' => $campaignOperation->getCreate()->getResourceName()]
                )
            ]);

            // Creates a campaign criterion operation and add it to the operations list.
            $operations[] = new CampaignCriterionOperation(['create' => $campaignCriterion]);
        }
        return $operations;
    }

    /**
     * Builds new ad group operations for the specified customer ID.
     *
     * @param int $customerId the client customer ID
     * @param CampaignOperation[] $campaignOperations the campaign operations to be used to create
     *     ad groups
     * @return AdGroupOperation[] the ad group operations
     */
    private static function buildAdGroupOperations(int $customerId, array $campaignOperations)
    {
        $operations = [];
        foreach ($campaignOperations as $campaignOperation) {
            for ($i = 0; $i < self::NUMBER_OF_ADGROUPS_TO_ADD; $i++) {
                // Creates an ad group.
                $adGroupId = self::$temporaryId--;
                $adGroup = new AdGroup([
                    // Creates a resource name using the temporary ID.
                    'resource_name' => ResourceNames::forAdGroup($customerId, $adGroupId),
                    'name' => new StringValue(
                        ['value' => sprintf('Mutate job ad group #%s.%d', uniqid(), $adGroupId)]
                    ),
                    'campaign' => new StringValue(
                        ['value' => $campaignOperation->getCreate()->getResourceName()]
                    ),
                    'type' => AdGroupType::SEARCH_STANDARD,
                    'cpc_bid_micros' => new Int64Value(['value' => 10000000])
                ]);

                // Creates an ad group operation and add it to the operations list.
                $operations[] = new AdGroupOperation(['create' => $adGroup]);
            }
        }
        return $operations;
    }

    /**
     * Builds new ad group criterion operations for creating keywords. 50% of keywords are created
     * with some invalid characters to demonstrate how MutateJobService returns information about
     * such errors.
     *
     * @param AdGroupOperation[] $adGroupOperations the ad group operations to be used to create
     *     ad group criteria
     * @return AdGroupCriterionOperation[] the ad group criterion operations
     */
    private static function buildAdGroupCriterionOperations(array $adGroupOperations)
    {
        $operations = [];
        foreach ($adGroupOperations as $adGroupOperation) {
            for ($i = 0; $i < self::NUMBER_OF_KEYWORDS_TO_ADD; $i++) {
                // Create a keyword text by making 50% of keywords invalid to demonstrate error
                // handling.
                $keywordText = sprintf('mars%d', $i);
                if ($i % 2 == 0) {
                    $keywordText = $keywordText . '!!!';
                }
                // Creates an ad group criterion using the created keyword text.
                $adGroupCriterion = new AdGroupCriterion([
                    'keyword' => new KeywordInfo([
                        'text' => new StringValue(['value' => $keywordText]),
                        'match_type' => KeywordMatchType::BROAD
                    ]),
                    'ad_group' => new StringValue(
                        ['value' => $adGroupOperation->getCreate()->getResourceName()]
                    ),
                    'status' => AdGroupCriterionStatus::ENABLED,
                ]);

                // Creates an ad group criterion operation and add it to the operations list.
                $operations[] = new AdGroupCriterionOperation(['create' => $adGroupCriterion]);
            }
        }
        return $operations;
    }

    /**
     * Builds new ad group ad operations.
     *
     * @param AdGroupOperation[] $adGroupOperations the ad group operations to be used to create
     *     ad group ads
     * @return AdGroupAdOperation[] the ad group ad operations
     */
    private static function buildAdGroupAdOperations(array $adGroupOperations)
    {
        $operations = [];
        foreach ($adGroupOperations as $adGroupOperation) {
            // Creates an ad group ad.
            $adGroupAd = new AdGroupAd([
                // Creates the expanded text ad info.
                'ad' => new Ad([
                    // Sets the expanded text ad info on an ad.
                    'expanded_text_ad' => new ExpandedTextAdInfo([
                        'headline_part1' => new StringValue(
                            ['value' => 'Cruise to Mars #' . uniqid()]
                        ),
                        'headline_part2' => new StringValue(['value' => 'Best Space Cruise Line']),
                        'description' => new StringValue(['value' => 'Buy your tickets now!'])
                    ]),
                    'final_urls' => [new StringValue(['value' => 'http://www.example.com'])]
                ]),
                'ad_group' => new StringValue(
                    ['value' => $adGroupOperation->getCreate()->getResourceName()]
                ),
                'status' => AdGroupAdStatus::PAUSED,
            ]);

            // Creates an ad group ad operation and add it to the operations list.
            $operations[] = new AdGroupAdOperation(['create' => $adGroupAd]);
        }
        return $operations;
    }
}

AddCompleteCampaignsUsingMutateJob::main();
