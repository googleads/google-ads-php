<?php

return [
    'interfaces' => [
        'google.ads.googleads.v6.services.ChangeStatusService' => [
            'GetChangeStatus' => [
                'method' => 'get',
                'uriTemplate' => '/v6/{resource_name=customers/*/changeStatus/*}',
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
