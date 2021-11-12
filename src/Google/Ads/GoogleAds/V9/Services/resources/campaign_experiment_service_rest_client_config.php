<?php

return [
    'interfaces' => [
        'google.ads.googleads.v9.services.CampaignExperimentService' => [
            'CreateCampaignExperiment' => [
                'method' => 'post',
                'uriTemplate' => '/v9/customers/{customer_id=*}/campaignExperiments:create',
                'body' => '*',
                'placeholders' => [
                    'customer_id' => [
                        'getters' => [
                            'getCustomerId',
                        ],
                    ],
                ],
            ],
            'EndCampaignExperiment' => [
                'method' => 'post',
                'uriTemplate' => '/v9/{campaign_experiment=customers/*/campaignExperiments/*}:end',
                'body' => '*',
                'placeholders' => [
                    'campaign_experiment' => [
                        'getters' => [
                            'getCampaignExperiment',
                        ],
                    ],
                ],
            ],
            'GetCampaignExperiment' => [
                'method' => 'get',
                'uriTemplate' => '/v9/{resource_name=customers/*/campaignExperiments/*}',
                'placeholders' => [
                    'resource_name' => [
                        'getters' => [
                            'getResourceName',
                        ],
                    ],
                ],
            ],
            'GraduateCampaignExperiment' => [
                'method' => 'post',
                'uriTemplate' => '/v9/{campaign_experiment=customers/*/campaignExperiments/*}:graduate',
                'body' => '*',
                'placeholders' => [
                    'campaign_experiment' => [
                        'getters' => [
                            'getCampaignExperiment',
                        ],
                    ],
                ],
            ],
            'ListCampaignExperimentAsyncErrors' => [
                'method' => 'get',
                'uriTemplate' => '/v9/{resource_name=customers/*/campaignExperiments/*}:listAsyncErrors',
                'placeholders' => [
                    'resource_name' => [
                        'getters' => [
                            'getResourceName',
                        ],
                    ],
                ],
            ],
            'MutateCampaignExperiments' => [
                'method' => 'post',
                'uriTemplate' => '/v9/customers/{customer_id=*}/campaignExperiments:mutate',
                'body' => '*',
                'placeholders' => [
                    'customer_id' => [
                        'getters' => [
                            'getCustomerId',
                        ],
                    ],
                ],
            ],
            'PromoteCampaignExperiment' => [
                'method' => 'post',
                'uriTemplate' => '/v9/{campaign_experiment=customers/*/campaignExperiments/*}:promote',
                'body' => '*',
                'placeholders' => [
                    'campaign_experiment' => [
                        'getters' => [
                            'getCampaignExperiment',
                        ],
                    ],
                ],
            ],
        ],
        'google.longrunning.Operations' => [
            'CancelOperation' => [
                'method' => 'post',
                'uriTemplate' => '/v9/{name=customers/*/operations/*}:cancel',
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
                'uriTemplate' => '/v9/{name=customers/*/operations/*}',
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
                'uriTemplate' => '/v9/{name=customers/*/operations/*}',
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
                'uriTemplate' => '/v9/{name=customers/*/operations}',
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
                'uriTemplate' => '/v9/{name=customers/*/operations/*}:wait',
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
