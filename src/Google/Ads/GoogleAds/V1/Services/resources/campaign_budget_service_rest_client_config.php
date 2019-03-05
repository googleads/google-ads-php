<?php

return [
    'interfaces' => [
        'google.ads.googleads.v1.services.CampaignBudgetService' => [
            'GetCampaignBudget' => [
                'method' => 'get',
                'uriTemplate' => '/v1/{resource_name=customers/*/campaignBudgets/*}',
                'placeholders' => [
                    'resource_name' => [
                        'getters' => [
                            'getResourceName',
                        ],
                    ],
                ],
            ],
            'MutateCampaignBudgets' => [
                'method' => 'post',
                'uriTemplate' => '/v1/customers/{customer_id=*}/campaignBudgets:mutate',
                'body' => '*',
                'placeholders' => [
                    'customer_id' => [
                        'getters' => [
                            'getCustomerId',
                        ],
                    ],
                ],
            ],
        ],
    ],
];
