<?php

return [
    'interfaces' => [
        'google.ads.googleads.v1.services.PaidOrganicSearchTermViewService' => [
            'GetPaidOrganicSearchTermView' => [
                'method' => 'get',
                'uriTemplate' => '/v1/{resource_name=customers/*/paidOrganicSearchTermViews/*}',
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
