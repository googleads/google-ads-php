<?php

return [
    'interfaces' => [
        'google.ads.googleads.v2.services.ChangeStatusService' => [
            'GetChangeStatus' => [
                'method' => 'get',
                'uriTemplate' => '/v2/{resource_name=customers/*/changeStatus/*}',
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
