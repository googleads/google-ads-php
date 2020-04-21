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

use Google\Ads\GoogleAds\Lib\V3\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V3\GoogleAdsServerStreamDecorator;
use Google\Ads\GoogleAds\V3\Services\GoogleAdsRow;
use Google\Ads\GoogleAds\V3\Services\SearchGoogleAdsStreamResponse;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\View\View;

class GoogleAdsApiController extends Controller
{
    private static $TYPE_TO_DEFAULT_SELECTED_FIELDS = [
        'campaign' => [
            'campaign.id',
            'campaign.name',
            'campaign.status'
        ],
        'ad_group' => [
            'ad_group.id',
            'ad_group.name',
            'ad_group.status',
            'campaign.id'
        ]
    ];

    /**
     * Controls a POST and GET request that is submitted from the "Show Report" form.
     *
     * @param Request $request
     * @param GoogleAdsClient $googleAdsClient
     * @return View
     */
    public function showReportAction(
        Request $request,
        GoogleAdsClient $googleAdsClient
    ) {
        if ($request->method() === 'POST') {
            $clientCustomerId = $request->input('clientCustomerId');
            $reportType = $request->input('reportType');
            $reportRange = $request->input('reportRange');
            $entriesPerPage = $request->input('entriesPerPage');

            $selectedFields = array_values(
                $request->except(
                    [
                        '_token',
                        'clientCustomerId',
                        'reportType',
                        'reportRange',
                        'entriesPerPage'
                    ]
                )
            );
            $selectedFields = array_merge(
                self::$TYPE_TO_DEFAULT_SELECTED_FIELDS[$reportType],
                $selectedFields
            );

            // Build the query
            $query = sprintf(
                "SELECT %s FROM %s WHERE metrics.impressions > 0 AND segments.date  DURING  %s LIMIT 100",
                join(", ", $selectedFields),
                $reportType,
                $reportRange
            );

            $request->session()->put('clientCustomerId', $clientCustomerId);
            $request->session()->put('reportType', $reportType);
            $request->session()->put('reportRange', $reportRange);
            $request->session()->put('entriesPerPage', $entriesPerPage);
            $request->session()->put('selectedFields', $selectedFields);
            $request->session()->put('query', $query);

            // We fetch all results at once using streaming.
            /** @var GoogleAdsServerStreamDecorator $stream */
            $stream = $googleAdsClient->getGoogleAdsServiceClient()->searchStream(
                $clientCustomerId,
                $query
            );

            $results = [];
            foreach ($stream->readAll() as $response) {
                /** @var SearchGoogleAdsStreamResponse $response */
                foreach ($response->getResults() as $googleAdsRow) {
                    /** @var GoogleAdsRow $googleAdsRow */
                    $results[] = json_decode($googleAdsRow->serializeToJsonString(), true);
                }
            }
            $collection = collect($results);

            $request->session()->put('collection', collect($collection));
        } else {
            $selectedFields = $request->session()->get('selectedFields');
            $entriesPerPage = $request->session()->get('entriesPerPage');
            $collection = $request->session()->get('collection');
        }

        $pageNo = $request->input('page') ?: 1;

        // Create a length aware paginator to supply a page of results for the
        // view, based on the specified number of entries per page.
        $paginatedResults = new LengthAwarePaginator(
            $collection->forPage($pageNo, $entriesPerPage),
            $collection->count(),
            $entriesPerPage,
            $pageNo,
            ['path' => url('get-report')]
        );

        return view(
            'report-results',
            compact('paginatedResults', 'selectedFields')
        );
    }


//        if ($request->method() === 'POST') {
//            // Always select at least the "id" field.
//            $selectedFields = array_values(
//                ['id' => 'id'] + $request->except(
//                    ['_token', 'clientCustomerId', 'entriesPerPage']
//                )
//            );
//            $clientCustomerId = $request->input('clientCustomerId');
//            $entriesPerPage = $request->input('entriesPerPage');
//
//            // Request the API
//            $query = sprintf(
//                "SELECT %s FROM campaign ORDER BY campaign.name",
//                join(
//                    ", ",
//                    collect($selectedFields)->map(function ($fieldName) {
//                        return "campaign." . $fieldName;
//                    })->all()
//                )
//            );
//            $response = $googleAdsClient->getGoogleAdsServiceClient()->search(
//                $clientCustomerId,
//                $query,
//                [
//                    'pageSize' => $entriesPerPage,
//                    'returnTotalResultsCount' => true
//                ]
//            );
//            $currentPage = $response->getPage();
//            $cacheKey = uniqid();
//
//            $request->session()->put('selectedFields', $selectedFields);
//            $request->session()->put('entriesPerPage', $entriesPerPage);
//            $request->session()->put('totalNumEntries', $currentPage->getResponseObject()->getTotalResultsCount());
////            $request->session()->put('currentPage', $currentPage);
//            $request->session()->put('cacheKey', $cacheKey);
//        } else {
//            $selectedFields = $request->session()->get('selectedFields');
//            $entriesPerPage = $request->session()->get('entriesPerPage');
////            $currentPage = $request->session()->get('currentPage');
//            $cacheKey = $request->session()->get('cacheKey');
//        }
//
//        $pageNo = $request->input('page') ?: 1;
//        $cacheKeyFull = md5($cacheKey . $pageNo);
//        $results = Cache::remember($cacheKeyFull, 10, function() use ($currentPage) {
//            $items = [];
//            foreach ($currentPage as $googleAdsRow) {
//                /** GoogleAdsRow $googleAdsRow */
//                $items[] = json_decode($googleAdsRow->getCampaign()->serializeToJsonString(), true);
//            }
////            if($currentPage->hasNextPage()) {
////                $request->session()->put('currentPage', $currentPage->getNextPage());
////            } else {
////                $request->session()->remove('currentPage');
////            }
//            return $items;
//        });
//
//        // Create a length aware paginator to supply campaigns for the view,
//        // based on the specified number of entries per page.
//        $campaigns = new LengthAwarePaginator(
//            collect($results),
//            $request->session()->get('totalNumEntries'),
//            $entriesPerPage,
//            $pageNo,
//            ['path' => url('search-campaigns')]
//        );
//
//        return view('campaigns', compact('campaigns', 'selectedFields'));
}
