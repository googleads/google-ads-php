<?php

return [
    'interfaces' => [
        'google.ads.googleads.v6.services.ParentalStatusViewService' => [
            'GetParentalStatusView' => [
                'method' => 'get',
                'uriTemplate' => '/v6/{resource_name=customers/*/parentalStatusViews/*}',
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
