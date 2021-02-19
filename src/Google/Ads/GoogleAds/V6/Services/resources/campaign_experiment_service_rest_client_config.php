<?php

return [
    'interfaces' => [
        'google.ads.googleads.v6.services.CampaignExperimentService' => [
            'GetCampaignExperiment' => [
                'method' => 'get',
                'uriTemplate' => '/v6/{resource_name=customers/*/campaignExperiments/*}',
                'placeholders' => [
                    'resource_name' => [
                        'getters' => [
                            'getResourceName',
                        ],
                    ],
                ],
            ],
            'CreateCampaignExperiment' => [
                'method' => 'post',
                'uriTemplate' => '/v6/customers/{customer_id=*}/campaignExperiments:create',
                'body' => '*',
                'placeholders' => [
                    'customer_id' => [
                        'getters' => [
                            'getCustomerId',
                        ],
                    ],
                ],
            ],
            'MutateCampaignExperiments' => [
                'method' => 'post',
                'uriTemplate' => '/v6/customers/{customer_id=*}/campaignExperiments:mutate',
                'body' => '*',
                'placeholders' => [
                    'customer_id' => [
                        'getters' => [
                            'getCustomerId',
                        ],
                    ],
                ],
            ],
            'GraduateCampaignExperiment' => [
                'method' => 'post',
                'uriTemplate' => '/v6/{campaign_experiment=customers/*/campaignExperiments/*}:graduate',
                'body' => '*',
                'placeholders' => [
                    'campaign_experiment' => [
                        'getters' => [
                            'getCampaignExperiment',
                        ],
                    ],
                ],
            ],
            'PromoteCampaignExperiment' => [
                'method' => 'post',
                'uriTemplate' => '/v6/{campaign_experiment=customers/*/campaignExperiments/*}:promote',
                'body' => '*',
                'placeholders' => [
                    'campaign_experiment' => [
                        'getters' => [
                            'getCampaignExperiment',
                        ],
                    ],
                ],
            ],
            'EndCampaignExperiment' => [
                'method' => 'post',
                'uriTemplate' => '/v6/{campaign_experiment=customers/*/campaignExperiments/*}:end',
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
                'uriTemplate' => '/v6/{resource_name=customers/*/campaignExperiments/*}:listAsyncErrors',
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
                'uriTemplate' => '/v6/{name=customers/*/operations/*}:cancel',
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
                'uriTemplate' => '/v6/{name=customers/*/operations/*}',
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
                'uriTemplate' => '/v6/{name=customers/*/operations/*}',
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
                'uriTemplate' => '/v6/{name=customers/*/operations}',
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
                'uriTemplate' => '/v6/{name=customers/*/operations/*}:wait',
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
