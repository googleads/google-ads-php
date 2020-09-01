<?php

return [
    'interfaces' => [
        'google.ads.googleads.v5.services.IncomeRangeViewService' => [
            'GetIncomeRangeView' => [
                'method' => 'get',
                'uriTemplate' => '/v5/{resource_name=customers/*/incomeRangeViews/*}',
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
