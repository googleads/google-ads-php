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

use GetOpt\GetOpt;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentNames;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentParser;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\Lib\V15\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V15\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V15\GoogleAdsException;
use Google\Ads\GoogleAds\V15\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V15\Services\Client\GoogleAdsServiceClient;
use Google\Ads\GoogleAds\V15\Services\GoogleAdsRow;
use Google\Ads\GoogleAds\V15\Services\SearchGoogleAdsRequest;
use Google\ApiCore\ApiException;
use Google\ApiCore\Page;

/**
 * GoogleAdsService.Search results are paginated but they can only be retrieved in sequence
 * starting by the first page. More details at
 * https://developers.google.com/google-ads/api/docs/reporting/paging.
 *
 * This example searches campaigns illustrating how GoogleAdsService.Search result page tokens can
 * be cached and reused to retrieve previous pages. This is useful when you need to request pages
 * that were already requested in the past without starting over from the first page. For example,
 * it can be used to implement an interactive application that displays a page of results at a time
 * without caching all the results first.
 *
 * To add campaigns, run AddCampaigns.php.
 * For an example in a webapp context, see the code example LaravelSampleApp.
 */
class NavigateSearchResultPagesCachingTokens
{
    private const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';

    // The maximum number of results to retrieve.
    private const RESULTS_LIMIT = 10;
    // The size of the paginated search result pages.
    private const PAGE_SIZE = 3;

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
            // We set this value to true to show how to use GAPIC v2 source code. You can remove the
            // below line if you wish to use the old-style source code. Note that in that case, you
            // probably need to modify some parts of the code below to make it work.
            // For more information, see
            // https://developers.devsite.corp.google.com/google-ads/api/docs/client-libs/php/gapic.
            ->usingGapicV2Source(true)
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
        // The cache of page tokens which is stored in-memory with the page numbers as keys.
        // The first page's token is always an empty string.
        $pageTokens = [1 => ''];

        printf('%s--- 0. Fetch page #1 to get metadata:%1$s%1$s', PHP_EOL);

        // Creates a query that retrieves the campaigns.
        $query = sprintf(
            'SELECT campaign.id, campaign.name FROM campaign ORDER BY campaign.name LIMIT %d',
            self::RESULTS_LIMIT
        );

        // Issues a paginated search request.
        $searchOptions = [
            // Sets the number of results to return per page.
            'page_size' => self::PAGE_SIZE,
            // Requests to return the total results count. This is necessary to determine how many
            // pages of results there are.
            'return_total_results_count' => true
        ];
        $googleAdsServiceClient = $googleAdsClient->getGoogleAdsServiceClient();
        $response = $googleAdsServiceClient->search(
            (new SearchGoogleAdsRequest($searchOptions))
                ->setCustomerId($customerId)
                ->setQuery($query)
        );
        self::cacheNextPageToken($pageTokens, $response->getPage(), 1);

        // Determines the total number of results and prints it.
        // The total results count does not take into consideration the LIMIT clause of the query
        // so we need to find the minimal value between the limit and the total results count.
        $totalNumberOfResults = min(
            self::RESULTS_LIMIT,
            $response->getPage()->getResponseObject()->getTotalResultsCount()
        );
        printf('Total number of campaigns found: %d.%s', $totalNumberOfResults, PHP_EOL);

        // Determines the total number of pages and prints it.
        $totalNumberOfPages = ceil($totalNumberOfResults / self::PAGE_SIZE);
        printf('Total number of pages: %d.%s', $totalNumberOfPages, PHP_EOL);
        if (!$totalNumberOfPages) {
            print 'Could not find any campaigns.' . PHP_EOL;
            exit(1);
        }

        // Demonstrates how the logic works when iterating pages forward. We select a page that is
        // in the middle of the result set so that only a subset of the page tokens will be cached.
        $middlePageNumber = ceil($totalNumberOfPages / 2);
        printf('%s--- 1. Print results of the page #%d:%1$s%1$s', PHP_EOL, $middlePageNumber);
        self::fetchAndPrintPageResults(
            $googleAdsServiceClient,
            $customerId,
            $query,
            $searchOptions,
            $middlePageNumber,
            $pageTokens
        );

        // Demonstrates how the logic works when iterating pages backward with some page tokens that
        // are not already cached.
        printf('%s--- 2. Print results from the last page to the first:%1$s', PHP_EOL);
        foreach (range($totalNumberOfPages, 1) as $pageNumber) {
            printf('%s-- Printing results for page #%d:%1$s', PHP_EOL, $pageNumber);
            self::fetchAndPrintPageResults(
                $googleAdsServiceClient,
                $customerId,
                $query,
                $searchOptions,
                $pageNumber,
                $pageTokens
            );
        }
    }

    // [START navigate_search_result_pages_caching_tokens]
    /**
     * Fetches and prints the results of a page of a search using a cache of page tokens.
     *
     * @param GoogleAdsServiceClient $googleAdsServiceClient the Google Ads API Service client
     * @param int $customerId the customer ID
     * @param string $searchQuery the search query
     * @param array $searchOptions the search options
     * @param int $pageNumber the number of the page to fetch and print results for
     * @param array &$pageTokens the cache of page tokens to use and update
     */
    private static function fetchAndPrintPageResults(
        GoogleAdsServiceClient $googleAdsServiceClient,
        int $customerId,
        string $searchQuery,
        array $searchOptions,
        int $pageNumber,
        array &$pageTokens
    ) {
        // There is no need to fetch the pages we already know the page tokens for.
        if (isset($pageTokens[$pageNumber])) {
            printf(
                'The token of the requested page was cached, we will use it to get the results.%s',
                PHP_EOL
            );
            $currentPageNumber = $pageNumber;
        } else {
            printf(
                'The token of the requested page was never cached, we will use the closest page ' .
                'we know the token for (page #%d) and sequentially get pages from there.%s',
                count($pageTokens),
                PHP_EOL
            );
            $currentPageNumber = count($pageTokens);
        }

        // Fetches next pages in sequence and caches their tokens until the requested page results
        // are returned.
        while ($currentPageNumber <= $pageNumber) {
            // Fetches the next page.
            printf('Fetching page #%d...%s', $currentPageNumber, PHP_EOL);
            $response = $googleAdsServiceClient->search(
                (new SearchGoogleAdsRequest(
                    $searchOptions + [
                        // Uses the page token cached for the current page number.
                        'page_token' => $pageTokens[$currentPageNumber]
                    ]
                ))->setCustomerId($customerId)->setQuery($searchQuery)
            );
            self::cacheNextPageToken($pageTokens, $response->getPage(), $currentPageNumber);
            $currentPageNumber++;
        }

        // Prints the results of the requested page.
        printf('Printing results found for the page #%d:%s', $pageNumber, PHP_EOL);
        foreach ($response->getPage()->getIterator() as $googleAdsRow) {
            /** @var GoogleAdsRow $googleAdsRow */
            printf(
                " - Campaign with ID %d and name '%s'.%s",
                $googleAdsRow->getCampaign()->getId(),
                $googleAdsRow->getCampaign()->getName(),
                PHP_EOL
            );
        }
    }
    // [END navigate_search_result_pages_caching_tokens]

    /**
     * Updates the cache of page tokens based on a page that was retrieved.
     *
     * @param array &$pageTokens the cache of page tokens to update
     * @param Page $page the page that was retrieved
     * @param int $pageNumber the number of the page that was retrieved
     */
    private static function cacheNextPageToken(array &$pageTokens, Page $page, int $pageNumber)
    {
        if ($page->getNextPageToken() && !isset($pageTokens[$pageNumber + 1])) {
            // Updates the cache with the next page token if it is not set yet.
            $pageTokens[$pageNumber + 1] = $page->getNextPageToken();
            // Prints in green color for better console readability.
            printf("\e[0;32mCached token for page #%d.\e[0m%s", $pageNumber + 1, PHP_EOL);
        }
    }
}

NavigateSearchResultPagesCachingTokens::main();
