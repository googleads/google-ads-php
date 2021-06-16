<?php

return [
    'interfaces' => [
        'google.ads.googleads.v8.services.GoogleAdsService' => [
            'Search' => [
                'pageStreaming' => [
                    'requestPageTokenGetMethod' => 'getPageToken',
                    'requestPageTokenSetMethod' => 'setPageToken',
                    'requestPageSizeGetMethod' => 'getPageSize',
                    'requestPageSizeSetMethod' => 'setPageSize',
                    'responsePageTokenGetMethod' => 'getNextPageToken',
                    'resourcesGetMethod' => 'getResults',
                ],
            ],
            'SearchStream' => [
                'grpcStreaming' => [
                    'grpcStreamingType' => 'ServerStreaming',
                ],
            ],
        ],
    ],
];
