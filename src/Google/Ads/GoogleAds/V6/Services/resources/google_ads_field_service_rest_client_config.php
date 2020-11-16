<?php

return [
    'interfaces' => [
        'google.ads.googleads.v6.services.GoogleAdsFieldService' => [
            'GetGoogleAdsField' => [
                'method' => 'get',
                'uriTemplate' => '/v6/{resource_name=googleAdsFields/*}',
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
                'uriTemplate' => '/v6/googleAdsFields:search',
                'body' => '*',
            ],
        ],
    ],
];
