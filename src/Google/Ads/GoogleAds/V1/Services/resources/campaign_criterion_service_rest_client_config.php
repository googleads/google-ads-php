<?php

return [
    'interfaces' => [
        'google.ads.googleads.v1.services.CampaignCriterionService' => [
            'GetCampaignCriterion' => [
                'method' => 'get',
                'uriTemplate' => '/v1/{resource_name=customers/*/campaignCriteria/*}',
                'placeholders' => [
                    'resource_name' => [
                        'getters' => [
                            'getResourceName',
                        ],
                    ],
                ],
            ],
            'MutateCampaignCriteria' => [
                'method' => 'post',
                'uriTemplate' => '/v1/customers/{customer_id=*}/campaignCriteria:mutate',
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
