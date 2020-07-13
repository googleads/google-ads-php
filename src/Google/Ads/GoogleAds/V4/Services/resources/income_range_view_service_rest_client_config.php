<?php

return [
    'interfaces' => [
        'google.ads.googleads.v4.services.IncomeRangeViewService' => [
            'GetIncomeRangeView' => [
                'method' => 'get',
                'uriTemplate' => '/v4/{resource_name=customers/*/incomeRangeViews/*}',
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
