<?php

return [
    'interfaces' => [
        'google.ads.googleads.v4.services.BatchJobService' => [
            'MutateBatchJob' => [
                'method' => 'post',
                'uriTemplate' => '/v4/customers/{customer_id=*}/batchJobs:mutate',
                'body' => '*',
                'placeholders' => [
                    'customer_id' => [
                        'getters' => [
                            'getCustomerId',
                        ],
                    ],
                ],
            ],
            'GetBatchJob' => [
                'method' => 'get',
                'uriTemplate' => '/v4/{resource_name=customers/*/batchJobs/*}',
                'placeholders' => [
                    'resource_name' => [
                        'getters' => [
                            'getResourceName',
                        ],
                    ],
                ],
            ],
            'ListBatchJobResults' => [
                'method' => 'get',
                'uriTemplate' => '/v4/{resource_name=customers/*/batchJobs/*}:listResults',
                'placeholders' => [
                    'resource_name' => [
                        'getters' => [
                            'getResourceName',
                        ],
                    ],
                ],
            ],
            'RunBatchJob' => [
                'method' => 'post',
                'uriTemplate' => '/v4/{resource_name=customers/*/batchJobs/*}:run',
                'body' => '*',
                'placeholders' => [
                    'resource_name' => [
                        'getters' => [
                            'getResourceName',
                        ],
                    ],
                ],
            ],
            'AddBatchJobOperations' => [
                'method' => 'post',
                'uriTemplate' => '/v4/{resource_name=customers/*/batchJobs/*}:addOperations',
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
