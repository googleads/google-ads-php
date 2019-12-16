<?php

return [
    'interfaces' => [
        'google.ads.googleads.v1.services.CampaignExperimentService' => [
            'GetCampaignExperiment' => [
                'method' => 'get',
                'uriTemplate' => '/v1/{resource_name=customers/*/campaignExperiments/*}',
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
                'uriTemplate' => '/v1/customers/{customer_id=*}/campaignExperiments:create',
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
                'uriTemplate' => '/v1/customers/{customer_id=*}/campaignExperiments:mutate',
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
                'uriTemplate' => '/v1/{campaign_experiment=customers/*/campaignExperiments/*}:graduate',
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
                'uriTemplate' => '/v1/{campaign_experiment=customers/*/campaignExperiments/*}:promote',
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
                'uriTemplate' => '/v1/{campaign_experiment=customers/*/campaignExperiments/*}:end',
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
                'uriTemplate' => '/v1/{resource_name=customers/*/campaignExperiments/*}:listAsyncErrors',
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
