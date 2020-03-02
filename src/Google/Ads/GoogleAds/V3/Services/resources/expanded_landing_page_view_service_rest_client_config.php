<?php

return [
    'interfaces' => [
        'google.ads.googleads.v3.services.ExpandedLandingPageViewService' => [
            'GetExpandedLandingPageView' => [
                'method' => 'get',
                'uriTemplate' => '/v3/{resource_name=customers/*/expandedLandingPageViews/*}',
                'placeholders' => [
                    'resource_name' => [
                        'getters' => [
                            'getResourceName',
                        ],
                    ],
                ],
            ],
        ],
    ],
];
