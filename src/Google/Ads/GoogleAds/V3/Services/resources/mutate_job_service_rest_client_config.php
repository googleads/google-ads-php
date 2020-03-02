<?php

return [
    'interfaces' => [
        'google.ads.googleads.v3.services.MutateJobService' => [
            'CreateMutateJob' => [
                'method' => 'post',
                'uriTemplate' => '/v3/customers/{customer_id=*}/mutateJobs:create',
                'body' => '*',
                'placeholders' => [
                    'customer_id' => [
                        'getters' => [
                            'getCustomerId',
                        ],
                    ],
                ],
            ],
            'GetMutateJob' => [
                'method' => 'get',
                'uriTemplate' => '/v3/{resource_name=customers/*/mutateJobs/*}',
                'placeholders' => [
                    'resource_name' => [
                        'getters' => [
                            'getResourceName',
                        ],
                    ],
                ],
            ],
            'ListMutateJobResults' => [
                'method' => 'get',
                'uriTemplate' => '/v3/{resource_name=customers/*/mutateJobs/*}:listResults',
                'placeholders' => [
                    'resource_name' => [
                        'getters' => [
                            'getResourceName',
                        ],
                    ],
                ],
            ],
            'RunMutateJob' => [
                'method' => 'post',
                'uriTemplate' => '/v3/{resource_name=customers/*/mutateJobs/*}:run',
                'body' => '*',
                'placeholders' => [
                    'resource_name' => [
                        'getters' => [
                            'getResourceName',
                        ],
                    ],
                ],
            ],
            'AddMutateJobOperations' => [
                'method' => 'post',
                'uriTemplate' => '/v3/{resource_name=customers/*/mutateJobs/*}:addOperations',
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
