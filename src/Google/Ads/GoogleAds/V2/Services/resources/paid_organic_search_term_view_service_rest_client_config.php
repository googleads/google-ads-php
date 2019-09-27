<?php

return [
    'interfaces' => [
        'google.ads.googleads.v2.services.PaidOrganicSearchTermViewService' => [
            'GetPaidOrganicSearchTermView' => [
                'method' => 'get',
                'uriTemplate' => '/v2/{resource_name=customers/*/paidOrganicSearchTermViews/*}',
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
