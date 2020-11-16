<?php

return [
    'interfaces' => [
        'google.ads.googleads.v6.services.IncomeRangeViewService' => [
            'GetIncomeRangeView' => [
                'method' => 'get',
                'uriTemplate' => '/v6/{resource_name=customers/*/incomeRangeViews/*}',
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
