<?php

/**
 * Copyright 2020 Google LLC
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

namespace App\Http\Controllers;

use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClient;
use Google\Ads\GoogleAds\Util\FieldMasks;
use Google\Ads\GoogleAds\Util\V18\ResourceNames;
use Google\Ads\GoogleAds\V18\Enums\CampaignStatusEnum\CampaignStatus;
use Google\Ads\GoogleAds\V18\Resources\Campaign;
use Google\Ads\GoogleAds\V18\Services\CampaignOperation;
use Google\Ads\GoogleAds\V18\Services\GoogleAdsRow;
use Google\Ads\GoogleAds\V18\Services\MutateCampaignsRequest;
use Google\Ads\GoogleAds\V18\Services\SearchGoogleAdsRequest;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\View\View;

class GoogleAdsApiController extends Controller
{
    private const REPORT_TYPE_TO_DEFAULT_SELECTED_FIELDS = [
        'campaign' => ['campaign.id', 'campaign.name', 'campaign.status'],
        'customer' => ['customer.id']
    ];

    // The limit of the number of the returned results. This is set to prevent you from accidentally
    // fetching a very large number of campaigns and freezing your browser. Change it to a larger
    // number if you're sure that your request doesn't result in too many results.
    private const RESULTS_LIMIT = 1000;
    // Google Ads API default page size.
    private const DEFAULT_PAGE_SIZE = 10000;

    /**
     * Controls a POST or GET request submitted in the context of the "Show Report" form.
     *
     * @param Request $request the HTTP request
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @return View the view to redirect to after processing
     */
    public function showReportAction(
        Request $request,
        GoogleAdsClient $googleAdsClient
    ): View {
        if ($request->method() === 'POST') {
            // Retrieves the form inputs.
            $customerId = $request->input('customerId');
            $reportType = $request->input('reportType');
            $reportRange = $request->input('reportRange');
            $entriesPerPage = $request->input('entriesPerPage');

            // Retrieves the list of metric fields to select filtering out the static ones.
            $selectedFields = array_values(
                $request->except(
                    [
                        '_token',
                        'customerId',
                        'reportType',
                        'reportRange',
                        'entriesPerPage'
                    ]
                )
            );

            // Merges the list of metric fields to the resource ones that are selected by default.
            $selectedFields = array_merge(
                self::REPORT_TYPE_TO_DEFAULT_SELECTED_FIELDS[$reportType],
                $selectedFields
            );

            // Builds the GAQL query.
            $query = sprintf(
                "SELECT %s FROM %s WHERE metrics.impressions > 0 AND segments.date " .
                "DURING %s LIMIT %d",
                join(", ", $selectedFields),
                $reportType,
                $reportRange,
                self::RESULTS_LIMIT
            );

            // Initializes the list of page tokens. Page tokens are used to request specific pages
            // of results from the API. They are especially useful to optimize navigation between
            // pages as there is no need to cache all the results before displaying.
            // More details can be found here:
            // https://developers.google.com/google-ads/api/docs/reporting/paging.
            //
            // The first page's token is always an empty string.
            $pageTokens = [''];

            // Updates the session with all the information that is necessary to process any
            // future requests (report result pages).
            $request->session()->put('customerId', $customerId);
            $request->session()->put('selectedFields', $selectedFields);
            $request->session()->put('entriesPerPage', $entriesPerPage);
            $request->session()->put('query', $query);
            $request->session()->put('pageTokens', $pageTokens);
        } else {
            // Loads from the session all the information that is necessary to process any
            // requests (report result page).
            $customerId = $request->session()->get('customerId');
            $selectedFields = $request->session()->get('selectedFields');
            $entriesPerPage = $request->session()->get('entriesPerPage');
            $query = $request->session()->get('query');
            $pageTokens = $request->session()->get('pageTokens');
        }

        // Determines the number of the page to load (the first one by default).
        $pageNo = $request->input('page') ?: 1;

        // Page number of the Google Ads API result is not the same as the requested UI page number.
        // This is because Google Ads API has a defined default page size and users cannot specify
        // it.
        $resultPageNo = intval($entriesPerPage * $pageNo / self::DEFAULT_PAGE_SIZE);
        // Fetches next pages in sequence and stores their page tokens until the page token of the
        // requested page is retrieved.
        while (count($pageTokens) < $resultPageNo) {
            // Fetches the next unknown page.
            $response = $googleAdsClient->getGoogleAdsServiceClient()->search(
                SearchGoogleAdsRequest::build($customerId, $query)
                    // Requests to return the total results count. This is necessary to
                    // determine how many pages of results exist.
                    ->setReturnTotalResultsCount(true)
                    // There is no need to go over the pages we already know the page tokens for.
                    // Fetches the last page we know the page token for so that we can retrieve the
                    // token of the page that comes after it.
                    ->setPageToken(end($pageTokens))
            );
            if ($response->getPage()->hasNextPage()) {
                // Stores the page token of the page that comes after the one we just fetched if
                // any so that it can be reused later if necessary.
                $pageTokens[] = $response->getPage()->getNextPageToken();
            } else {
                // Otherwise changes the requested page number for the latest page that we have
                // fetched until now, the requested page number was invalid.
                $resultPageNo = count($pageTokens);
            }
        }

        // Fetches the actual page that we want to display the results of.
        $response = $googleAdsClient->getGoogleAdsServiceClient()->search(
            SearchGoogleAdsRequest::build($customerId, $query)
                // Requests to return the total results count. This is necessary to
                // determine how many pages of results exist.
                ->setReturnTotalResultsCount(true)
                // The page token of the requested page is in the page token list because of the
                // processing done in the previous loop.
                ->setPageToken($pageTokens[$resultPageNo])
        );

        // Determines the total number of results to display.
        // The total results count does not take into consideration the LIMIT clause of the query
        // so we need to find the minimal value between the limit and the total results count.
        $totalNumberOfResults = min(
            self::RESULTS_LIMIT,
            $response->getPage()->getResponseObject()->getTotalResultsCount()
        );

        // Extracts the specific subset of the results for the requested page.
        $results = [];
        $startIndex = ($pageNo - 1) * $entriesPerPage;
        foreach ($response->getPage()->getIterator() as $index => $googleAdsRow) {
            if ($index >= $startIndex) {
                /** @var GoogleAdsRow $googleAdsRow */
                // Converts each result as a Plain Old PHP Object (POPO) using JSON.
                $results[] = json_decode($googleAdsRow->serializeToJsonString(), true);
            }
            if (count($results) >= $entriesPerPage) {
                break;
            }
        }

        // Creates a length aware paginator to supply a given page of results for the view.
        $paginatedResults = new LengthAwarePaginator(
            $results,
            $totalNumberOfResults,
            $entriesPerPage,
            $pageNo,
            ['path' => url('show-report')]
        );

        // Updates the session with the known page tokens to avoid unnecessary requests during
        // future page navigation.
        $request->session()->put('pageTokens', $pageTokens);

        // Redirects to the view that displays fields of paginated report results.
        return view(
            'report-result',
            compact('paginatedResults', 'selectedFields')
        );
    }

    /**
     * Controls a POST request submitted in the context of the "Pause Campaign" form.
     *
     * @param Request $request the HTTP request
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @return View the view to redirect to after processing
     */
    public function pauseCampaignAction(
        Request $request,
        GoogleAdsClient $googleAdsClient
    ): View {
        // Retrieves the form inputs.
        $customerId = $request->input('customerId');
        $campaignId = $request->input('campaignId');

        // Deducts the campaign resource name from the given IDs.
        $campaignResourceName = ResourceNames::forCampaign($customerId, $campaignId);

        // Creates a campaign object and sets its status to PAUSED.
        $campaign = new Campaign();
        $campaign->setResourceName($campaignResourceName);
        $campaign->setStatus(CampaignStatus::PAUSED);

        // Constructs an operation that will pause the campaign with the specified resource
        // name, using the FieldMasks utility to derive the update mask. This mask tells the
        // Google Ads API which attributes of the campaign need to change.
        $campaignOperation = new CampaignOperation();
        $campaignOperation->setUpdate($campaign);
        $campaignOperation->setUpdateMask(FieldMasks::allSetFieldsOf($campaign));

        // Issues a mutate request to pause the campaign.
        $googleAdsClient->getCampaignServiceClient()->mutateCampaigns(
            MutateCampaignsRequest::build($customerId, [$campaignOperation])
        );

        // Builds the GAQL query to retrieve more information about the now paused campaign.
        $query = sprintf(
            "SELECT campaign.id, campaign.name, campaign.status FROM campaign " .
            "WHERE campaign.resource_name = '%s' LIMIT 1",
            $campaignResourceName
        );

        // Searches the result.
        $response = $googleAdsClient->getGoogleAdsServiceClient()->search(
            SearchGoogleAdsRequest::build($customerId, $query)
        );

        // Fetches and converts the result as a POPO using JSON.
        $campaign = json_decode(
            $response->iterateAllElements()->current()->getCampaign()->serializeToJsonString(),
            true
        );

        return view(
            'pause-result',
            compact('customerId', 'campaign')
        );
    }
}
