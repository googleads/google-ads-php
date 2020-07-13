<?php

return [
    'interfaces' => [
        'google.ads.googleads.v4.services.ParentalStatusViewService' => [
            'GetParentalStatusView' => [
                'method' => 'get',
                'uriTemplate' => '/v4/{resource_name=customers/*/parentalStatusViews/*}',
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
