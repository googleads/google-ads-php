<?php

return [
    'interfaces' => [
        'google.ads.googleads.v0.services.GoogleAdsFieldService' => [
            'GetGoogleAdsField' => [
                'method' => 'get',
                'uriTemplate' => '/v0/{resource_name=googleAdsFields/*}',
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
                'uriTemplate' => '/v0/googleAdsFields:search',
                'body' => '*',
            ],
        ],
    ],
];
