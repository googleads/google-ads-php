<?php

/**
 * Copyright 2022 Google LLC
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

namespace Google\Ads\GoogleAds\Examples\Misc;

require __DIR__ . '/../../vendor/autoload.php';

use Exception;
use GetOpt\GetOpt;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentNames;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentParser;
use Google\Ads\GoogleAds\Lib\V9\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V9\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V9\GoogleAdsException;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\V9\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V9\Services\GoogleAdsRow;
use Google\Ads\GoogleAds\V9\Services\GoogleAdsServiceClient;
use Google\ApiCore\ApiException;
use PHP_CodeSniffer\Tokenizers\PHP;

/**
 * GoogleAdsService.Search results are paginated but they can only be downloaded in sequence
 * starting by the first page. More details at
 * https://developers.google.com/google-ads/api/docs/reporting/paging.
 *
 * This example search campaigns illustrating how GoogleAdsService.Search result page tokens can
 * be cached and reused to retrieve previous pages. This is useful when you need to request pages
 * that were already requested in the past without starting over from the first page. For example,
 * it can be used to implement an interactive application that displays a page of results at a time
 * without caching all the results first.
 *
 * To add campaigns, run AddCampaigns.php.
 * For a stateful example, see the LaravelSampleApp.
 */
class NavigateSearchResultPagesCachingTokens
{
    private const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';
    // The maximum number of results to retrieve.
    private const RESULTS_LIMIT = 5;
    // The size of the paginated search result pages.
    private const PAGE_SIZE = 2;

    public static function main()
    {
        // Either pass the required parameters for this example on the command line, or insert them
        // into the constants above.
        $options = (new ArgumentParser())->parseCommandArguments([
            ArgumentNames::CUSTOMER_ID => GetOpt::REQUIRED_ARGUMENT
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
        // The page tokens cache. It is stored in-memory and in page number ascendant order.
        // The first page's token is always an empty string.
        $pageTokens = [''];

        // Creates a query that retrieves all campaigns.
        $query = sprintf(
            'SELECT campaign.id, campaign.name FROM campaign ORDER BY campaign.id LIMIT %d',
            self::RESULTS_LIMIT
        );

        // Issues a paginated search request.
        $searchOptions = [
            'pageSize' => self::PAGE_SIZE,
            // Requests to return the total results count. This is necessary to determine how many
            // pages of results exist.
            'returnTotalResultsCount' => true
        ];
        $googleAdsServiceClient = $googleAdsClient->getGoogleAdsServiceClient();
        $response = $googleAdsServiceClient->search(
            $customerId,
            $query,
            $searchOptions
        );

        // Determines the total number of results and prints it.
        // The total results count does not take into consideration the LIMIT clause of the query
        // so we need to find the minimal value between the limit and the total results count.
        $totalNumberOfResults = min(
            self::RESULTS_LIMIT,
            $response->getPage()->getResponseObject()->getTotalResultsCount()
        );
        printf(
            "Total number of campaigns found: %d.%s",
            $totalNumberOfResults,
            PHP_EOL
        );
        // Determines the total number of pages and prints it.
        $totalNumberOfPages = ceil($totalNumberOfResults / self::PAGE_SIZE);
        printf(
            "Total number of pages: %d.%s%s",
            $totalNumberOfPages,
            PHP_EOL,
            PHP_EOL
        );
        if (!$totalNumberOfPages) {
            throw new Exception(
                'Could not find any results.'
            );
        }

        $middlePageNumber = ceil($totalNumberOfPages / 2);
        print '--- 1. Print results of the page #' . $middlePageNumber . ' (in the middle):'. PHP_EOL . PHP_EOL;
        $pageTokens = self::printPageResults(
            $googleAdsServiceClient,
            $customerId,
            $query,
            $searchOptions,
            $middlePageNumber,
            $pageTokens
        );

        print PHP_EOL . '--- 2. Print results iterating from the first page to the last:' . PHP_EOL . PHP_EOL;
        foreach (range(1, $totalNumberOfPages) as $pageNumber) {
            $pageTokens = self::printPageResults(
                $googleAdsServiceClient,
                $customerId,
                $query,
                $searchOptions,
                $pageNumber,
                $pageTokens
            );
        }

        print PHP_EOL . '--- 3. Print results iterating from the last page to the first:' . PHP_EOL . PHP_EOL;
        foreach (range($totalNumberOfPages, 1) as $pageNumber) {
            $pageTokens = self::printPageResults(
                $googleAdsServiceClient,
                $customerId,
                $query,
                $searchOptions,
                $pageNumber,
                $pageTokens
            );
        }
    }

    /**
     * @param GoogleAdsServiceClient $googleAdsServiceClient
     * @param int $customerId
     * @param string $query
     * @param array $searchOptions
     * @param int $pageNumber
     * @param int[] $pageTokens
     * @return int[] The updated list of page tokens
     */
    private static function printPageResults(
        GoogleAdsServiceClient $googleAdsServiceClient,
        int $customerId,
        string $query,
        array $searchOptions,
        int $pageNumber,
        array $pageTokens
    ): array {
        // Fetches next pages in sequence and stores their page tokens until the page token of the
        // requested page is retrieved.
        while (count($pageTokens) < $pageNumber) {
            // Fetches the next unknown page.
            print 'Fetching page #' . $pageNumber . ' because its token is not cached.' . PHP_EOL;
            $response = $googleAdsServiceClient->search(
                $customerId,
                $query,
                $searchOptions + [
                    // There is no need to go over the pages we already know the page tokens for.
                    // Fetches the last page we know the page token for so that we can retrieve the
                    // token of the page that comes after it.
                    'pageToken' => end($pageTokens)
                ]
            );
            if ($response->getPage()->getNextPageToken()) {
                // Stores the page token of the page that comes after the one we just fetched if
                // any so that it can be reused later if necessary.
                $pageTokens[] = $response->getPage()->getNextPageToken();
                print 'Cached token for page #' . $pageNumber . PHP_EOL;
            } else {
                // Otherwise changes the requested page number for the latest page that we have
                // fetched until now, the requested page number was invalid.
                $pageNumber = count($pageTokens);
            }
        }

        // Fetches the actual page that we want to display the results of.
        print 'Fetching page #' . $pageNumber . ' to retrieve the results.' . PHP_EOL;
        $response = $googleAdsServiceClient->search(
            $customerId,
            $query,
            $searchOptions + [
                // The page token of the requested page is in the page token list because of the
                // processing done in the previous loop.
                'pageToken' => $pageTokens[$pageNumber - 1]
            ]
        );
        if ($response->getPage()->getNextPageToken()) {
            // Stores the page token of the page that comes after the one we just fetched if any so
            // that it can be reused later if necessary.
            $pageTokens[] = $response->getPage()->getNextPageToken();
            print 'Cached token for page #' . $pageNumber . PHP_EOL;
        }

        // Prints the results of the requested page.
        print 'Printing results found for the page #' . $pageNumber . PHP_EOL;
        foreach ($response->getPage()->getIterator() as $googleAdsRow) {
            /** @var GoogleAdsRow $googleAdsRow */
            printf(
                " - Campaign with ID %d and name '%s'.%s",
                $googleAdsRow->getCampaign()->getId(),
                $googleAdsRow->getCampaign()->getName(),
                PHP_EOL
            );
        }

        return $pageTokens;
    }
}

NavigateSearchResultPagesCachingTokens::main();
