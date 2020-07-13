<?php

return [
    'interfaces' => [
        'google.ads.googleads.v4.services.ExpandedLandingPageViewService' => [
            'GetExpandedLandingPageView' => [
                'method' => 'get',
                'uriTemplate' => '/v4/{resource_name=customers/*/expandedLandingPageViews/*}',
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
