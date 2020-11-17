<?php

return [
    'interfaces' => [
        'google.ads.googleads.v6.services.PaidOrganicSearchTermViewService' => [
            'GetPaidOrganicSearchTermView' => [
                'method' => 'get',
                'uriTemplate' => '/v6/{resource_name=customers/*/paidOrganicSearchTermViews/*}',
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
