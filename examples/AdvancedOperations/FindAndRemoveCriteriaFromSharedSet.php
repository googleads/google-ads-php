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
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsException;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\V18\Enums\CriterionTypeEnum\CriterionType;
use Google\Ads\GoogleAds\V18\Enums\KeywordMatchTypeEnum\KeywordMatchType;
use Google\Ads\GoogleAds\V18\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V18\Resources\SharedCriterion;
use Google\Ads\GoogleAds\V18\Services\GoogleAdsRow;
use Google\Ads\GoogleAds\V18\Services\MutateSharedCriteriaRequest;
use Google\Ads\GoogleAds\V18\Services\SearchGoogleAdsRequest;
use Google\Ads\GoogleAds\V18\Services\SharedCriterionOperation;
use Google\ApiCore\ApiException;

/**
 * This example demonstrates how to find shared sets, how to find shared set criteria, and how to
 * remove shared set criteria.
 */
class FindAndRemoveCriteriaFromSharedSet
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
        $sharedSetIds = [];
        $criterionResourceNames = [];

        // First, retrieves all shared sets associated with the campaign.
        $googleAdsServiceClient = $googleAdsClient->getGoogleAdsServiceClient();
        $query = "SELECT shared_set.id, shared_set.name FROM campaign_shared_set WHERE "
            . "campaign.id = $campaignId";

        // Issues a search request.
        $response =
            $googleAdsServiceClient->search(SearchGoogleAdsRequest::build($customerId, $query));

        // Iterates over all rows in all pages and prints the requested field values for
        // the shared set in each row.
        foreach ($response->iterateAllElements() as $googleAdsRow) {
            /** @var GoogleAdsRow $googleAdsRow */
            printf(
                "Campaign shared set with ID %d and name '%s' was found.%s",
                $googleAdsRow->getSharedSet()->getId(),
                $googleAdsRow->getSharedSet()->getName(),
                PHP_EOL
            );
            $sharedSetIds[] = $googleAdsRow->getSharedSet()->getId();
        }

        // Next, retrieves shared criteria for all found shared sets.
        $query = sprintf("SELECT shared_criterion.type, shared_criterion.keyword.text, "
              . "shared_criterion.keyword.match_type, shared_set.id "
              . "FROM shared_criterion "
              . "WHERE shared_set.id IN (%s)", implode(',', $sharedSetIds));

        // Issues a search request.
        $response =
            $googleAdsServiceClient->search(SearchGoogleAdsRequest::build($customerId, $query));

        // Iterates over all rows in all pages and prints the requested field values for
        // the shared criterion in each row.
        foreach ($response->iterateAllElements() as $googleAdsRow) {
            /** @var GoogleAdsRow $googleAdsRow */
            $sharedCriterionResourceName = $googleAdsRow->getSharedCriterion()->getResourceName();
            if ($googleAdsRow->getSharedCriterion()->getType() === CriterionType::KEYWORD) {
                printf(
                    "Shared criterion with resource name '%s' for negative keyword with text "
                    . "'%s' and match type '%s' was found.%s",
                    $sharedCriterionResourceName,
                    $googleAdsRow->getSharedCriterion()->getKeyword()->getText(),
                    KeywordMatchType::name(
                        $googleAdsRow->getSharedCriterion()->getKeyword()->getMatchType()
                    ),
                    PHP_EOL
                );
            } else {
                printf(
                    "Shared criterion with resource name '%s' was found.%s",
                    $sharedCriterionResourceName,
                    PHP_EOL
                );
            }
            $criterionResourceNames[] = $sharedCriterionResourceName;
        }

        // Finally, removes the criteria.
        $sharedCriterionOperations = [];
        foreach ($criterionResourceNames as $criterionResourceName) {
            $sharedCriterionOperation = new SharedCriterionOperation();
            $sharedCriterionOperation->setRemove($criterionResourceName);
            $sharedCriterionOperations[] = $sharedCriterionOperation;
        }

        // Sends the operation in a mutate request.
        $sharedCriterionServiceClient = $googleAdsClient->getSharedCriterionServiceClient();
        $response = $sharedCriterionServiceClient->mutateSharedCriteria(
            MutateSharedCriteriaRequest::build($customerId, $sharedCriterionOperations)
        );

        // Prints the resource name of each removed shared criterion.
        foreach ($response->getResults() as $removedSharedCriterion) {
            /** @var SharedCriterion $removedSharedCriterion */
            printf(
                "Removed shared criterion with resource name: '%s'.%s",
                $removedSharedCriterion->getResourceName(),
                PHP_EOL
            );
        }
    }
}

FindAndRemoveCriteriaFromSharedSet::main();
