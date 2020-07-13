<?php

return [
    'interfaces' => [
        'google.ads.googleads.v4.services.CampaignBudgetService' => [
            'GetCampaignBudget' => [
                'method' => 'get',
                'uriTemplate' => '/v4/{resource_name=customers/*/campaignBudgets/*}',
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
                'uriTemplate' => '/v4/customers/{customer_id=*}/campaignBudgets:mutate',
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
