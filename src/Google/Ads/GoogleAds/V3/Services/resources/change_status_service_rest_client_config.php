<?php

return [
    'interfaces' => [
        'google.ads.googleads.v3.services.ChangeStatusService' => [
            'GetChangeStatus' => [
                'method' => 'get',
                'uriTemplate' => '/v3/{resource_name=customers/*/changeStatus/*}',
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
