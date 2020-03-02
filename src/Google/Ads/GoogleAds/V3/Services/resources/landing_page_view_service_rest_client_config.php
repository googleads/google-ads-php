<?php

return [
    'interfaces' => [
        'google.ads.googleads.v3.services.LandingPageViewService' => [
            'GetLandingPageView' => [
                'method' => 'get',
                'uriTemplate' => '/v3/{resource_name=customers/*/landingPageViews/*}',
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
