<?php

return [
    'interfaces' => [
        'google.ads.googleads.v6.services.LandingPageViewService' => [
            'GetLandingPageView' => [
                'method' => 'get',
                'uriTemplate' => '/v6/{resource_name=customers/*/landingPageViews/*}',
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
