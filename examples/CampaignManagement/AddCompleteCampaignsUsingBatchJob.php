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
use Google\Ads\GoogleAds\Examples\Utils\Helper;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsException;
use Google\Ads\GoogleAds\Util\V18\ResourceNames;
use Google\Ads\GoogleAds\V18\Common\ExpandedTextAdInfo;
use Google\Ads\GoogleAds\V18\Common\KeywordInfo;
use Google\Ads\GoogleAds\V18\Common\ManualCpc;
use Google\Ads\GoogleAds\V18\Enums\AdGroupAdStatusEnum\AdGroupAdStatus;
use Google\Ads\GoogleAds\V18\Enums\AdGroupCriterionStatusEnum\AdGroupCriterionStatus;
use Google\Ads\GoogleAds\V18\Enums\AdGroupTypeEnum\AdGroupType;
use Google\Ads\GoogleAds\V18\Enums\AdvertisingChannelTypeEnum\AdvertisingChannelType;
use Google\Ads\GoogleAds\V18\Enums\BudgetDeliveryMethodEnum\BudgetDeliveryMethod;
use Google\Ads\GoogleAds\V18\Enums\CampaignStatusEnum\CampaignStatus;
use Google\Ads\GoogleAds\V18\Enums\KeywordMatchTypeEnum\KeywordMatchType;
use Google\Ads\GoogleAds\V18\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V18\Resources\Ad;
use Google\Ads\GoogleAds\V18\Resources\AdGroup;
use Google\Ads\GoogleAds\V18\Resources\AdGroupAd;
use Google\Ads\GoogleAds\V18\Resources\AdGroupCriterion;
use Google\Ads\GoogleAds\V18\Resources\BatchJob;
use Google\Ads\GoogleAds\V18\Resources\Campaign;
use Google\Ads\GoogleAds\V18\Resources\CampaignBudget;
use Google\Ads\GoogleAds\V18\Resources\CampaignCriterion;
use Google\Ads\GoogleAds\V18\Services\AddBatchJobOperationsRequest;
use Google\Ads\GoogleAds\V18\Services\AdGroupAdOperation;
use Google\Ads\GoogleAds\V18\Services\AdGroupCriterionOperation;
use Google\Ads\GoogleAds\V18\Services\AdGroupOperation;
use Google\Ads\GoogleAds\V18\Services\BatchJobOperation;
use Google\Ads\GoogleAds\V18\Services\BatchJobResult;
use Google\Ads\GoogleAds\V18\Services\CampaignBudgetOperation;
use Google\Ads\GoogleAds\V18\Services\CampaignCriterionOperation;
use Google\Ads\GoogleAds\V18\Services\CampaignOperation;
use Google\Ads\GoogleAds\V18\Services\Client\BatchJobServiceClient;
use Google\Ads\GoogleAds\V18\Services\ListBatchJobResultsRequest;
use Google\Ads\GoogleAds\V18\Services\MutateBatchJobRequest;
use Google\Ads\GoogleAds\V18\Services\MutateOperation;
use Google\Ads\GoogleAds\V18\Services\RunBatchJobRequest;
use Google\ApiCore\ApiException;
use Google\ApiCore\OperationResponse;

/**
 * This example adds complete campaigns including campaign budgets, campaigns, ad groups and
 * keywords using BatchJobService.
 */
class AddCompleteCampaignsUsingBatchJob
{
    private const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';

    private const NUMBER_OF_CAMPAIGNS_TO_ADD = 2;
    private const NUMBER_OF_AD_GROUPS_TO_ADD = 2;
    private const NUMBER_OF_KEYWORDS_TO_ADD = 4;
    private const POLL_FREQUENCY_SECONDS = 1;
    private const MAX_TOTAL_POLL_INTERVAL_SECONDS = 60;

    private const PAGE_SIZE = 1000;

    /** @var int the negative temporary ID used in batch job operations. */
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
     */
    public static function runExample(GoogleAdsClient $googleAdsClient, int $customerId)
    {
        $batchJobServiceClient = $googleAdsClient->getBatchJobServiceClient();

        $batchJobResourceName = self::createBatchJob($batchJobServiceClient, $customerId);
        self::addAllBatchJobOperations(
            $batchJobServiceClient,
            $customerId,
            $batchJobResourceName
        );
        $operationResponse = self::runBatchJob($batchJobServiceClient, $batchJobResourceName);
        self::pollBatchJob($operationResponse);
        self::fetchAndPrintResults($batchJobServiceClient, $batchJobResourceName);
    }

    /**
     * Creates a new batch job for the specified customer ID.
     *
     * @param BatchJobServiceClient $batchJobServiceClient the batch job service client
     * @param int $customerId the customer ID
     * @return string the resource name of the created batch job
     */
    // [START add_complete_campaigns_using_batch_job]
    private static function createBatchJob(
        BatchJobServiceClient $batchJobServiceClient,
        int $customerId
    ): string {
        // Creates a batch job operation to create a new batch job.
        $batchJobOperation = new BatchJobOperation();
        $batchJobOperation->setCreate(new BatchJob());

        // Issues a request to the API and get the batch job's resource name.
        $batchJobResourceName = $batchJobServiceClient->mutateBatchJob(
            MutateBatchJobRequest::build($customerId, $batchJobOperation)
        )->getResult()->getResourceName();
        printf(
            "Created a batch job with resource name: '%s'.%s",
            $batchJobResourceName,
            PHP_EOL
        );
        return $batchJobResourceName;
    }
    // [END add_complete_campaigns_using_batch_job]

    /**
     * Adds all batch job operations to the batch job. As this is the first time for this
     * batch job, pass null as a sequence token. The response will contain the next sequence token
     * that you can use to upload more operations in the future.
     *
     * @param BatchJobServiceClient $batchJobServiceClient the batch job service client
     * @param int $customerId the customer ID
     * @param string $batchJobResourceName the resource name of batch job to which the batch job
     *     operations will be added
     */
    // [START add_complete_campaigns_using_batch_job_1]
    private static function addAllBatchJobOperations(
        BatchJobServiceClient $batchJobServiceClient,
        int $customerId,
        string $batchJobResourceName
    ): void {
        $response = $batchJobServiceClient->addBatchJobOperations(
            AddBatchJobOperationsRequest::build(
                $batchJobResourceName,
                '',
                self::buildAllOperations($customerId)
            )
        );
        printf(
            "%d mutate operations have been added so far.%s",
            $response->getTotalOperations(),
            PHP_EOL
        );
        // You can use this next sequence token for calling addBatchJobOperations() next time.
        printf(
            "Next sequence token for adding next operations is '%s'.%s",
            $response->getNextSequenceToken(),
            PHP_EOL
        );
    }
    // [END add_complete_campaigns_using_batch_job_1]

    /**
     * Requests the API to run the batch job for executing all uploaded batch job operations.
     *
     * @param BatchJobServiceClient $batchJobServiceClient the batch job service client
     * @param string $batchJobResourceName the resource name of batch job to be run
     * @return OperationResponse the operation response from running batch job
     */
    // [START add_complete_campaigns_using_batch_job_2]
    private static function runBatchJob(
        BatchJobServiceClient $batchJobServiceClient,
        string $batchJobResourceName
    ): OperationResponse {
        $operationResponse =
            $batchJobServiceClient->runBatchJob(RunBatchJobRequest::build($batchJobResourceName));
        printf(
            "Batch job with resource name '%s' has been executed.%s",
            $batchJobResourceName,
            PHP_EOL
        );
        return $operationResponse;
    }
    // [END add_complete_campaigns_using_batch_job_2]

    /**
     * Polls the server until the batch job execution finishes by setting the initial poll
     * delay time and the total time to wait before time-out.
     *
     * @param OperationResponse $operationResponse the operation response used to poll the server
     */
    // [START add_complete_campaigns_using_batch_job_3]
    private static function pollBatchJob(OperationResponse $operationResponse): void
    {
        $operationResponse->pollUntilComplete([
            'initialPollDelayMillis' => self::POLL_FREQUENCY_SECONDS * 1000,
            'totalPollTimeoutMillis' => self::MAX_TOTAL_POLL_INTERVAL_SECONDS * 1000
        ]);
    }
    // [END add_complete_campaigns_using_batch_job_3]

    /**
     * Prints all the results from running the batch job.
     *
     * @param BatchJobServiceClient $batchJobServiceClient the batch job service client
     * @param string $batchJobResourceName the resource name of batch job to get its results
     */
    // [START add_complete_campaigns_using_batch_job_4]
    private static function fetchAndPrintResults(
        BatchJobServiceClient $batchJobServiceClient,
        string $batchJobResourceName
    ): void {
        printf(
            "Batch job with resource name '%s' has finished. Now, printing its results...%s",
            $batchJobResourceName,
            PHP_EOL
        );
        // Gets all the results from running batch job and print their information.
        $batchJobResults = $batchJobServiceClient->listBatchJobResults(
            ListBatchJobResultsRequest::build($batchJobResourceName)->setPageSize(self::PAGE_SIZE)
        );
        foreach ($batchJobResults->iterateAllElements() as $batchJobResult) {
            /** @var BatchJobResult $batchJobResult */
            printf(
                "Batch job #%d has a status '%s' and response of type '%s'.%s",
                $batchJobResult->getOperationIndex(),
                $batchJobResult->getStatus()
                    ? $batchJobResult->getStatus()->getMessage() : 'N/A',
                $batchJobResult->getMutateOperationResponse()
                    ? $batchJobResult->getMutateOperationResponse()->getResponse()
                    : 'N/A',
                PHP_EOL
            );
        }
    }
    // [END add_complete_campaigns_using_batch_job_4]

    /**
     * Builds all operations for creating a complete campaign and return an array of their
     * corresponding mutate operations.
     *
     * @param int $customerId the customer ID
     * @return MutateOperation[] the mutate operations to be added to a batch job
     */
    private static function buildAllOperations(int $customerId): array
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
     * @param int $customerId the customer ID
     * @return CampaignBudgetOperation the campaign budget operation
     */
    private static function buildCampaignBudgetOperation(int $customerId): CampaignBudgetOperation
    {
        // Creates a campaign budget operation.
        return new CampaignBudgetOperation([
            'create' => new CampaignBudget([
                // Creates a resource name using the temporary ID.
                'resource_name' => ResourceNames::forCampaignBudget(
                    $customerId,
                    self::getNextTemporaryId()
                ),
                'name' => 'Interplanetary Cruise Budget #' . Helper::getPrintableDatetime(),
                'delivery_method' => BudgetDeliveryMethod::STANDARD,
                'amount_micros' => 5000000
            ])
        ]);
    }

    /**
     * Builds new campaign operations for the specified customer ID.
     *
     * @param int $customerId the customer ID
     * @param string $campaignBudgetResourceName the resource name of campaign budget to be used
     *     to create campaigns
     * @return CampaignOperation[] the campaign operations
     */
    private static function buildCampaignOperations(
        int $customerId,
        string $campaignBudgetResourceName
    ): array {
        $operations = [];
        for ($i = 0; $i < self::NUMBER_OF_CAMPAIGNS_TO_ADD; $i++) {
            // Creates a campaign.
            $campaignId = self::getNextTemporaryId();
            $campaign = new Campaign([
                // Creates a resource name using the temporary ID.
                'resource_name' => ResourceNames::forCampaign($customerId, $campaignId),
                'name' => sprintf(
                    'Mutate job campaign #%s.%d',
                    Helper::getPrintableDatetime(),
                    $campaignId
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
    private static function buildCampaignCriterionOperations(array $campaignOperations): array
    {
        $operations = [];
        foreach ($campaignOperations as $campaignOperation) {
            // Creates a campaign criterion.
            $campaignCriterion = new CampaignCriterion([
                'keyword' => new KeywordInfo([
                    'text' => 'venus',
                    'match_type' => KeywordMatchType::BROAD
                ]),
                // Sets the campaign criterion as a negative criterion.
                'negative' => true,
                'campaign' => $campaignOperation->getCreate()->getResourceName()
            ]);

            // Creates a campaign criterion operation and add it to the operations list.
            $operations[] = new CampaignCriterionOperation(['create' => $campaignCriterion]);
        }
        return $operations;
    }

    /**
     * Builds new ad group operations for the specified customer ID.
     *
     * @param int $customerId the customer ID
     * @param CampaignOperation[] $campaignOperations the campaign operations to be used to create
     *     ad groups
     * @return AdGroupOperation[] the ad group operations
     */
    private static function buildAdGroupOperations(
        int $customerId,
        array $campaignOperations
    ): array {
        $operations = [];
        foreach ($campaignOperations as $campaignOperation) {
            for ($i = 0; $i < self::NUMBER_OF_AD_GROUPS_TO_ADD; $i++) {
                // Creates an ad group.
                $adGroupId = self::getNextTemporaryId();
                $adGroup = new AdGroup([
                    // Creates a resource name using the temporary ID.
                    'resource_name' => ResourceNames::forAdGroup($customerId, $adGroupId),
                    'name' => sprintf(
                        'Mutate job ad group #%s.%d',
                        Helper::getPrintableDatetime(),
                        $adGroupId
                    ),
                    'campaign' => $campaignOperation->getCreate()->getResourceName(),
                    'type' => AdGroupType::SEARCH_STANDARD,
                    'cpc_bid_micros' => 10000000
                ]);

                // Creates an ad group operation and add it to the operations list.
                $operations[] = new AdGroupOperation(['create' => $adGroup]);
            }
        }
        return $operations;
    }

    /**
     * Builds new ad group criterion operations for creating keywords. 50% of keywords are created
     * with some invalid characters to demonstrate how BatchJobService returns information about
     * such errors.
     *
     * @param AdGroupOperation[] $adGroupOperations the ad group operations to be used to create
     *     ad group criteria
     * @return AdGroupCriterionOperation[] the ad group criterion operations
     */
    private static function buildAdGroupCriterionOperations(array $adGroupOperations): array
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
                        'text' => $keywordText,
                        'match_type' => KeywordMatchType::BROAD
                    ]),
                    'ad_group' => $adGroupOperation->getCreate()->getResourceName(),
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
    private static function buildAdGroupAdOperations(array $adGroupOperations): array
    {
        $operations = [];
        foreach ($adGroupOperations as $adGroupOperation) {
            // Creates an ad group ad.
            $adGroupAd = new AdGroupAd([
                // Creates the expanded text ad info.
                'ad' => new Ad([
                    // Sets the expanded text ad info on an ad.
                    'expanded_text_ad' => new ExpandedTextAdInfo([
                        'headline_part1' => 'Cruise to Mars #' . Helper::getPrintableDatetime(),
                        'headline_part2' => 'Best Space Cruise Line',
                        'description' => 'Buy your tickets now!'
                    ]),
                    'final_urls' => ['http://www.example.com']
                ]),
                'ad_group' => $adGroupOperation->getCreate()->getResourceName(),
                'status' => AdGroupAdStatus::PAUSED,
            ]);

            // Creates an ad group ad operation and add it to the operations list.
            $operations[] = new AdGroupAdOperation(['create' => $adGroupAd]);
        }
        return $operations;
    }

    /**
     * Returns the next temporary ID and decrease it by one.
     *
     * @return int the next temporary ID
     */
    private static function getNextTemporaryId(): int
    {
        return self::$temporaryId--;
    }
}

AddCompleteCampaignsUsingBatchJob::main();
