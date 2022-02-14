<?php

return [
    'interfaces' => [
        'google.ads.googleads.v10.services.ExperimentService' => [
            'EndExperiment' => [
                'method' => 'post',
                'uriTemplate' => '/v10/{experiment=customers/*/experiments/*}:endExperiment',
                'body' => '*',
                'placeholders' => [
                    'experiment' => [
                        'getters' => [
                            'getExperiment',
                        ],
                    ],
                ],
            ],
            'GraduateExperiment' => [
                'method' => 'post',
                'uriTemplate' => '/v10/{experiment=customers/*/experiments/*}:graduateExperiment',
                'body' => '*',
                'placeholders' => [
                    'experiment' => [
                        'getters' => [
                            'getExperiment',
                        ],
                    ],
                ],
            ],
            'ListExperimentAsyncErrors' => [
                'method' => 'get',
                'uriTemplate' => '/v10/{resource_name=customers/*/experiments/*}:listExperimentAsyncErrors',
                'placeholders' => [
                    'resource_name' => [
                        'getters' => [
                            'getResourceName',
                        ],
                    ],
                ],
            ],
            'MutateExperiments' => [
                'method' => 'post',
                'uriTemplate' => '/v10/customers/{customer_id=*}/experiments:mutate',
                'body' => '*',
                'placeholders' => [
                    'customer_id' => [
                        'getters' => [
                            'getCustomerId',
                        ],
                    ],
                ],
            ],
            'PromoteExperiment' => [
                'method' => 'post',
                'uriTemplate' => '/v10/{resource_name=customers/*/experiments/*}:promoteExperiment',
                'body' => '*',
                'placeholders' => [
                    'resource_name' => [
                        'getters' => [
                            'getResourceName',
                        ],
                    ],
                ],
            ],
            'ScheduleExperiment' => [
                'method' => 'post',
                'uriTemplate' => '/v10/{resource_name=customers/*/experiments/*}:scheduleExperiment',
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
                'uriTemplate' => '/v10/{name=customers/*/operations/*}:cancel',
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
                'uriTemplate' => '/v10/{name=customers/*/operations/*}',
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
                'uriTemplate' => '/v10/{name=customers/*/operations/*}',
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
                'uriTemplate' => '/v10/{name=customers/*/operations}',
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
                'uriTemplate' => '/v10/{name=customers/*/operations/*}:wait',
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
