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

use Google\Ads\GoogleAds\Lib\V8\GoogleAdsClient;
use Google\Ads\GoogleAds\Util\FieldMasks;
use Google\Ads\GoogleAds\Util\V8\ResourceNames;
use Google\Ads\GoogleAds\V8\Enums\CampaignStatusEnum\CampaignStatus;
use Google\Ads\GoogleAds\V8\Resources\Campaign;
use Google\Ads\GoogleAds\V8\Services\CampaignOperation;
use Google\Ads\GoogleAds\V8\Services\GoogleAdsRow;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\View\View;

class GoogleAdsApiController extends Controller
{
    private static $REPORT_TYPE_TO_DEFAULT_SELECTED_FIELDS = [
        'campaign' => ['campaign.id', 'campaign.name', 'campaign.status'],
        'customer' => ['customer.id']
    ];

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
                self::$REPORT_TYPE_TO_DEFAULT_SELECTED_FIELDS[$reportType],
                $selectedFields
            );

            // Builds the GAQL query.
            $query = sprintf(
                "SELECT %s FROM %s WHERE metrics.impressions > 0 AND segments.date " .
                "DURING %s LIMIT 100",
                join(", ", $selectedFields),
                $reportType,
                $reportRange
            );

            // Searches the results.
            $response = $googleAdsClient->getGoogleAdsServiceClient()->search(
                $customerId,
                $query
            );

            // Fetches all the results.
            $results = [];
            foreach ($response->iterateAllElements() as $googleAdsRow) {
                /** @var GoogleAdsRow $googleAdsRow */
                // Converts each result as a Plain Old PHP Object (POPO) using JSON.
                $results[] = json_decode($googleAdsRow->serializeToJsonString(), true);
            }
            $collection = collect($results);

            // Updates the session with all the information that is necessary to process any
            // following GET requests (report result pages).
            $request->session()->put('selectedFields', $selectedFields);
            $request->session()->put('entriesPerPage', $entriesPerPage);
            $request->session()->put('collection', $collection);
        } else {
            // Loads from the session all the information that is necessary to process the GET
            // request (report result page).
            $selectedFields = $request->session()->get('selectedFields');
            $entriesPerPage = $request->session()->get('entriesPerPage');
            $collection = $request->session()->get('collection');
        }

        $pageNo = $request->input('page') ?: 1;

        // Creates a length aware paginator to supply a given page of results for the view, based on
        // the collection of results, the page number and the specified number of entries per page.
        $paginatedResults = new LengthAwarePaginator(
            $collection->forPage($pageNo, $entriesPerPage),
            $collection->count(),
            $entriesPerPage,
            $pageNo,
            ['path' => url('show-report')]
        );

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
            $customerId,
            [$campaignOperation]
        );

        // Builds the GAQL query to retrieve more information about the now paused campaign.
        $query = sprintf(
            "SELECT campaign.id, campaign.name, campaign.status FROM campaign " .
            "WHERE campaign.resource_name = '%s' LIMIT 1",
            $campaignResourceName
        );

        // Searches the result.
        $response = $googleAdsClient->getGoogleAdsServiceClient()->search(
            $customerId,
            $query
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
