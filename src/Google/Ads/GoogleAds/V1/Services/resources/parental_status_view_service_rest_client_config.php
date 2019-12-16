<?php

return [
    'interfaces' => [
        'google.ads.googleads.v1.services.ParentalStatusViewService' => [
            'GetParentalStatusView' => [
                'method' => 'get',
                'uriTemplate' => '/v1/{resource_name=customers/*/parentalStatusViews/*}',
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
