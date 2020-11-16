<?php

return [
    'interfaces' => [
        'google.ads.googleads.v6.services.ExpandedLandingPageViewService' => [
            'GetExpandedLandingPageView' => [
                'method' => 'get',
                'uriTemplate' => '/v6/{resource_name=customers/*/expandedLandingPageViews/*}',
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
