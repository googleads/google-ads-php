<?php
/*
 * Copyright 2025 Google LLC
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

/*
 * GENERATED CODE WARNING
 * This file was automatically generated - do not edit!
 */

return [
    'interfaces' => [
        'google.ads.googleads.v19.services.AudienceService' => [
            'MutateAudiences' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V19\Services\MutateAudiencesResponse',
                'headerParams' => [
                    [
                        'keyName' => 'customer_id',
                        'fieldAccessors' => [
                            'getCustomerId',
                        ],
                    ],
                ],
            ],
            'templateMap' => [
                'assetGroup' => 'customers/{customer_id}/assetGroups/{asset_group_id}',
                'audience' => 'customers/{customer_id}/audiences/{audience_id}',
                'detailedDemographic' => 'customers/{customer_id}/detailedDemographics/{detailed_demographic_id}',
                'lifeEvent' => 'customers/{customer_id}/lifeEvents/{life_event_id}',
            ],
        ],
    ],
];
