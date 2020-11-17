<?php

return [
    'interfaces' => [
        'google.ads.googleads.v6.services.OfflineUserDataJobService' => [
            'RunOfflineUserDataJob' => [
                'method' => 'post',
                'uriTemplate' => '/v6/{resource_name=customers/*/offlineUserDataJobs/*}:run',
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
                'uriTemplate' => '/v6/customers/{customer_id=*}/offlineUserDataJobs:create',
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
                'uriTemplate' => '/v6/{resource_name=customers/*/offlineUserDataJobs/*}',
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
                'uriTemplate' => '/v6/{resource_name=customers/*/offlineUserDataJobs/*}:addOperations',
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
