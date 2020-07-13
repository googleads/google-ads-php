<?php

return [
    'interfaces' => [
        'google.ads.googleads.v4.services.PaidOrganicSearchTermViewService' => [
            'GetPaidOrganicSearchTermView' => [
                'method' => 'get',
                'uriTemplate' => '/v4/{resource_name=customers/*/paidOrganicSearchTermViews/*}',
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
