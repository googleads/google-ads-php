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

use Google\Ads\GoogleAds\Lib\V3\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\V3\Services\GoogleAdsServiceClient;
use Google\ApiCore\PagedListResponse;
use Google\Auth\FetchAuthTokenInterface;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class GoogleAdsApiController extends Controller
{

    /**
     * Controls a POST and GET request that is submitted from the "Search All
     * Campaigns" form.
     *
     * @param Request $request
     * @param FetchAuthTokenInterface $oAuth2Credential
     * @param GoogleAdsClientBuilder $googleAdsClientBuilder
     * @return View
     */
    public function searchCampaignsAction(
        Request $request,
        FetchAuthTokenInterface $oAuth2Credential,
        GoogleAdsClientBuilder $googleAdsClientBuilder
    ) {
        if ($request->method() === 'POST') {
            // Always select at least the "id" field.
            $selectedFields = array_values(
                ['id' => 'id'] + $request->except(
                    ['_token', 'clientCustomerId', 'entriesPerPage']
                )
            );
            $clientCustomerId = $request->input('clientCustomerId');
            $entriesPerPage = $request->input('entriesPerPage');

            // Construct a Google Ads client configured from a properties file and the
            // OAuth2 credentials above.
            $googleAdsClient = $googleAdsClientBuilder
                ->fromFile(config('app.google_ads_php_path'))
                ->withOAuth2Credential($oAuth2Credential)
                ->build();

            // Request the API
            $query = sprintf(
                "SELECT %s FROM campaign ORDER BY campaign.name",
                join(
                    ", ",
                    collect($selectedFields)->map(function ($fieldName) {
                        return "campaign." . $fieldName;
                    })->all()
                )
            );
            $response = $googleAdsClient->getGoogleAdsServiceClient()->search(
                $clientCustomerId,
                $query,
                [
                    'pageSize' => $entriesPerPage,
                    'returnTotalResultsCount' => true
                ]
            );
            $currentPage = $response->getPage();
            $cacheKey = uniqid();

            $request->session()->put('selectedFields', $selectedFields);
            $request->session()->put('entriesPerPage', $entriesPerPage);
            $request->session()->put('totalNumEntries', $currentPage->getResponseObject()->getTotalResultsCount());
//            $request->session()->put('currentPage', $currentPage);
            $request->session()->put('cacheKey', $cacheKey);
        } else {
            $selectedFields = $request->session()->get('selectedFields');
            $entriesPerPage = $request->session()->get('entriesPerPage');
//            $currentPage = $request->session()->get('currentPage');
            $cacheKey = $request->session()->get('cacheKey');
        }

        $pageNo = $request->input('page') ?: 1;
        $cacheKeyFull = md5($cacheKey . $pageNo);
        $results = Cache::remember($cacheKeyFull, 10, function() use ($currentPage) {
            $items = [];
            foreach ($currentPage as $googleAdsRow) {
                /** GoogleAdsRow $googleAdsRow */
                $items[] = json_decode($googleAdsRow->getCampaign()->serializeToJsonString(), true);
            }
//            if($currentPage->hasNextPage()) {
//                $request->session()->put('currentPage', $currentPage->getNextPage());
//            } else {
//                $request->session()->remove('currentPage');
//            }
            return $items;
        });

        // Create a length aware paginator to supply campaigns for the view,
        // based on the specified number of entries per page.
        $campaigns = new LengthAwarePaginator(
            collect($results),
            $request->session()->get('totalNumEntries'),
            $entriesPerPage,
            $pageNo,
            ['path' => url('search-campaigns')]
        );

        return view('campaigns', compact('campaigns', 'selectedFields'));
    }
}
