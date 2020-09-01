<?php

return [
    'interfaces' => [
        'google.ads.googleads.v5.services.ChangeStatusService' => [
            'GetChangeStatus' => [
                'method' => 'get',
                'uriTemplate' => '/v5/{resource_name=customers/*/changeStatus/*}',
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
