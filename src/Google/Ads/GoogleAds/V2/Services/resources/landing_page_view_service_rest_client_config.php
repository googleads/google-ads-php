<?php

return [
    'interfaces' => [
        'google.ads.googleads.v2.services.LandingPageViewService' => [
            'GetLandingPageView' => [
                'method' => 'get',
                'uriTemplate' => '/v2/{resource_name=customers/*/landingPageViews/*}',
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
