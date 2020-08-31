<?php

return [
    'interfaces' => [
        'google.ads.googleads.v5.services.ExpandedLandingPageViewService' => [
            'GetExpandedLandingPageView' => [
                'method' => 'get',
                'uriTemplate' => '/v5/{resource_name=customers/*/expandedLandingPageViews/*}',
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
