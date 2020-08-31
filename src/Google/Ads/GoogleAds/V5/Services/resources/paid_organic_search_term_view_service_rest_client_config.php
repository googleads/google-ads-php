<?php

return [
    'interfaces' => [
        'google.ads.googleads.v5.services.PaidOrganicSearchTermViewService' => [
            'GetPaidOrganicSearchTermView' => [
                'method' => 'get',
                'uriTemplate' => '/v5/{resource_name=customers/*/paidOrganicSearchTermViews/*}',
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
