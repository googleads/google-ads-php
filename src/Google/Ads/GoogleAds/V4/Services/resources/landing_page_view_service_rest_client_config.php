<?php

return [
    'interfaces' => [
        'google.ads.googleads.v4.services.LandingPageViewService' => [
            'GetLandingPageView' => [
                'method' => 'get',
                'uriTemplate' => '/v4/{resource_name=customers/*/landingPageViews/*}',
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
