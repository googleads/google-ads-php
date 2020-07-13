<?php

return [
    'interfaces' => [
        'google.ads.googleads.v4.services.ChangeStatusService' => [
            'GetChangeStatus' => [
                'method' => 'get',
                'uriTemplate' => '/v4/{resource_name=customers/*/changeStatus/*}',
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
