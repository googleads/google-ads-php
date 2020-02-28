<?php

return [
    'interfaces' => [
        'google.ads.googleads.v3.services.ParentalStatusViewService' => [
            'GetParentalStatusView' => [
                'method' => 'get',
                'uriTemplate' => '/v3/{resource_name=customers/*/parentalStatusViews/*}',
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
