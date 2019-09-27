<?php

return [
    'interfaces' => [
        'google.ads.googleads.v2.services.ParentalStatusViewService' => [
            'GetParentalStatusView' => [
                'method' => 'get',
                'uriTemplate' => '/v2/{resource_name=customers/*/parentalStatusViews/*}',
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
