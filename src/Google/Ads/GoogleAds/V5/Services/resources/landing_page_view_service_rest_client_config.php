<?php

return [
    'interfaces' => [
        'google.ads.googleads.v5.services.LandingPageViewService' => [
            'GetLandingPageView' => [
                'method' => 'get',
                'uriTemplate' => '/v5/{resource_name=customers/*/landingPageViews/*}',
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
