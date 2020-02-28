<?php

return [
    'interfaces' => [
        'google.ads.googleads.v3.services.GoogleAdsFieldService' => [
            'GetGoogleAdsField' => [
                'method' => 'get',
                'uriTemplate' => '/v3/{resource_name=googleAdsFields/*}',
                'placeholders' => [
                    'resource_name' => [
                        'getters' => [
                            'getResourceName',
                        ],
                    ],
                ],
            ],
            'SearchGoogleAdsFields' => [
                'method' => 'post',
                'uriTemplate' => '/v3/googleAdsFields:search',
                'body' => '*',
            ],
        ],
    ],
];
