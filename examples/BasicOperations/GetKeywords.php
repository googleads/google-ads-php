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

namespace Google\Ads\GoogleAds\Examples\BasicOperations;

require __DIR__ . '/../../vendor/autoload.php';

use GetOpt\GetOpt;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentNames;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentParser;
use Google\Ads\GoogleAds\Lib\V14\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V14\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V14\GoogleAdsException;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\V14\Enums\CriterionTypeEnum\CriterionType;
use Google\Ads\GoogleAds\V14\Enums\KeywordMatchTypeEnum\KeywordMatchType;
use Google\Ads\GoogleAds\V14\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V14\Services\GoogleAdsRow;
use Google\ApiCore\ApiException;

/**
 * This example gets keywords from ad group criteria and demonstrates how to use the
 * omit_unselected_resource_names option in Google Ads Query Language (GAQL) queries to reduce
 * payload size.
 */
class GetKeywords
{
    private const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';
    // Optional: Specify an ad group ID below to restrict search to only a given ad group.
    private const AD_GROUP_ID = null;
    // Optional: Change the below value to true to omit unselected resource names from the returned
    // response of GoogleAdsService.
    private const OMIT_UNSELECTED_RESOURCE_NAMES = false;

    private const PAGE_SIZE = 1000;

    public static function main()
    {
        // Either pass the required parameters for this example on the command line, or insert them
        // into the constants above.
        $options = (new ArgumentParser())->parseCommandArguments([
            ArgumentNames::CUSTOMER_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::AD_GROUP_ID => GetOpt::OPTIONAL_ARGUMENT,
            ArgumentNames::OMIT_UNSELECTED_RESOURCE_NAMES => GetOpt::OPTIONAL_ARGUMENT
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
                $options[ArgumentNames::AD_GROUP_ID] ?: self::AD_GROUP_ID,
                filter_var(
                    $options[ArgumentNames::OMIT_UNSELECTED_RESOURCE_NAMES]
                        ?: self::OMIT_UNSELECTED_RESOURCE_NAMES,
                    FILTER_VALIDATE_BOOLEAN
                )
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
     * @param int|null $adGroupId the ad group ID for which keywords will be retrieved. If `null`,
     *     returns from all ad groups
     * @param bool $omitUnselectedResourceNames whether to omit the resource names of all resources
     *     not explicitly requested in the SELECT clause of the GAQL query
     */
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        ?int $adGroupId,
        bool $omitUnselectedResourceNames
    ) {
        $googleAdsServiceClient = $googleAdsClient->getGoogleAdsServiceClient();
        // Creates a query that retrieves keywords.
        $query =
          'SELECT ad_group.id, '
              . 'ad_group_criterion.type, '
              . 'ad_group_criterion.criterion_id, '
              . 'ad_group_criterion.keyword.text, '
              . 'ad_group_criterion.keyword.match_type '
          . 'FROM ad_group_criterion '
          . 'WHERE ad_group_criterion.type = KEYWORD';
        if ($adGroupId !== null) {
            $query .= " AND ad_group.id = $adGroupId";
        }
        // Adds omit_unselected_resource_names=true to the PARAMETERS clause of the
        // Google Ads Query Language (GAQL) query, which excludes the resource names of
        // all resources that aren't explicitly requested in the SELECT clause.
        // Enabling this option reduces payload size, but if you plan to use a returned
        // object in subsequent mutate operations, make sure you explicitly request its
        // "resource_name" field in the SELECT clause.
        //
        // Read more about PARAMETERS:
        // https://developers.google.com/google-ads/api/docs/query/structure#parameters
        if ($omitUnselectedResourceNames) {
            $query .= ' PARAMETERS omit_unselected_resource_names=true';
        }

        // Issues a search request by specifying page size.
        $response =
            $googleAdsServiceClient->search($customerId, $query, ['pageSize' => self::PAGE_SIZE]);

        // Iterates over all rows in all pages and prints the requested field values for
        // the keyword in each row.
        foreach ($response->iterateAllElements() as $googleAdsRow) {
            /** @var GoogleAdsRow $googleAdsRow */
            $resourceNameString = $omitUnselectedResourceNames ? '' : sprintf(
                " and resource name '%s'",
                $googleAdsRow->getAdGroup()->getResourceName()
            );
            printf(
                "Keyword with text '%s', match type '%s', criterion type '%s', and ID %d "
                . "was found in ad group with ID %d%s.%s",
                $googleAdsRow->getAdGroupCriterion()->getKeyword()->getText(),
                KeywordMatchType::name(
                    $googleAdsRow->getAdGroupCriterion()->getKeyword()->getMatchType()
                ),
                CriterionType::name($googleAdsRow->getAdGroupCriterion()->getType()),
                $googleAdsRow->getAdGroupCriterion()->getCriterionId(),
                $googleAdsRow->getAdGroup()->getId(),
                $resourceNameString,
                PHP_EOL
            );
        }
    }
}

GetKeywords::main();
