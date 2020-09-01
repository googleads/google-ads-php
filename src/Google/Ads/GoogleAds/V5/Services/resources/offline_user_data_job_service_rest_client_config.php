<?php

return [
    'interfaces' => [
        'google.ads.googleads.v5.services.OfflineUserDataJobService' => [
            'RunOfflineUserDataJob' => [
                'method' => 'post',
                'uriTemplate' => '/v5/{resource_name=customers/*/offlineUserDataJobs/*}:run',
                'body' => '*',
                'placeholders' => [
                    'resource_name' => [
                        'getters' => [
                            'getResourceName',
                        ],
                    ],
                ],
            ],
            'CreateOfflineUserDataJob' => [
                'method' => 'post',
                'uriTemplate' => '/v5/customers/{customer_id=*}/offlineUserDataJobs:create',
                'body' => '*',
                'placeholders' => [
                    'customer_id' => [
                        'getters' => [
                            'getCustomerId',
                        ],
                    ],
                ],
            ],
            'GetOfflineUserDataJob' => [
                'method' => 'get',
                'uriTemplate' => '/v5/{resource_name=customers/*/offlineUserDataJobs/*}',
                'placeholders' => [
                    'resource_name' => [
                        'getters' => [
                            'getResourceName',
                        ],
                    ],
                ],
            ],
            'AddOfflineUserDataJobOperations' => [
                'method' => 'post',
                'uriTemplate' => '/v5/{resource_name=customers/*/offlineUserDataJobs/*}:addOperations',
                'body' => '*',
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
