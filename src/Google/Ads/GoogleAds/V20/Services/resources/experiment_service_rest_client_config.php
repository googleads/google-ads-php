<?php
/*
 * Copyright 2025 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     https://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

/*
 * GENERATED CODE WARNING
 * This file was automatically generated - do not edit!
 */

return [
    'interfaces' => [
        'google.ads.googleads.v20.services.ExperimentService' => [
            'EndExperiment' => [
                'method' => 'post',
                'uriTemplate' => '/v20/{experiment=customers/*/experiments/*}:endExperiment',
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
                'uriTemplate' => '/v20/{experiment=customers/*/experiments/*}:graduateExperiment',
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
                'uriTemplate' => '/v20/{resource_name=customers/*/experiments/*}:listExperimentAsyncErrors',
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
                'uriTemplate' => '/v20/customers/{customer_id=*}/experiments:mutate',
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
                'uriTemplate' => '/v20/{resource_name=customers/*/experiments/*}:promoteExperiment',
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
                'uriTemplate' => '/v20/{resource_name=customers/*/experiments/*}:scheduleExperiment',
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
                'uriTemplate' => '/v20/{name=customers/*/operations/*}:cancel',
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
                'uriTemplate' => '/v20/{name=customers/*/operations/*}',
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
                'uriTemplate' => '/v20/{name=customers/*/operations/*}',
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
                'uriTemplate' => '/v20/{name=customers/*/operations}',
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
                'uriTemplate' => '/v20/{name=customers/*/operations/*}:wait',
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
