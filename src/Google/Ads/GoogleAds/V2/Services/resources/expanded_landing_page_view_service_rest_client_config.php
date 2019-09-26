<?php

return [
    'interfaces' => [
        'google.ads.googleads.v2.services.ExpandedLandingPageViewService' => [
            'GetExpandedLandingPageView' => [
                'method' => 'get',
                'uriTemplate' => '/v2/{resource_name=customers/*/expandedLandingPageViews/*}',
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
