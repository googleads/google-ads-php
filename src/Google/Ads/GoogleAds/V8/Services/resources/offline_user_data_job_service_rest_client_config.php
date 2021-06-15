<?php

return [
    'interfaces' => [
        'google.ads.googleads.v8.services.OfflineUserDataJobService' => [
            'AddOfflineUserDataJobOperations' => [
                'method' => 'post',
                'uriTemplate' => '/v8/{resource_name=customers/*/offlineUserDataJobs/*}:addOperations',
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
                'uriTemplate' => '/v8/customers/{customer_id=*}/offlineUserDataJobs:create',
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
                'uriTemplate' => '/v8/{resource_name=customers/*/offlineUserDataJobs/*}',
                'placeholders' => [
                    'resource_name' => [
                        'getters' => [
                            'getResourceName',
                        ],
                    ],
                ],
            ],
            'RunOfflineUserDataJob' => [
                'method' => 'post',
                'uriTemplate' => '/v8/{resource_name=customers/*/offlineUserDataJobs/*}:run',
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
        'google.longrunning.Operations' => [
            'CancelOperation' => [
                'method' => 'post',
                'uriTemplate' => '/v8/{name=customers/*/operations/*}:cancel',
                'body' => '*',
                'placeholders' => [
                    'name' => [
                        'getters' => [
                            'getName',
                        ],
                    ],
                ],
            ],
            'DeleteOperation' => [
                'method' => 'delete',
                'uriTemplate' => '/v8/{name=customers/*/operations/*}',
                'placeholders' => [
                    'name' => [
                        'getters' => [
                            'getName',
                        ],
                    ],
                ],
            ],
            'GetOperation' => [
                'method' => 'get',
                'uriTemplate' => '/v8/{name=customers/*/operations/*}',
                'placeholders' => [
                    'name' => [
                        'getters' => [
                            'getName',
                        ],
                    ],
                ],
            ],
            'ListOperations' => [
                'method' => 'get',
                'uriTemplate' => '/v8/{name=customers/*/operations}',
                'placeholders' => [
                    'name' => [
                        'getters' => [
                            'getName',
                        ],
                    ],
                ],
            ],
            'WaitOperation' => [
                'method' => 'post',
                'uriTemplate' => '/v8/{name=customers/*/operations/*}:wait',
                'body' => '*',
                'placeholders' => [
                    'name' => [
                        'getters' => [
                            'getName',
                        ],
                    ],
                ],
            ],
        ],
    ],
];
