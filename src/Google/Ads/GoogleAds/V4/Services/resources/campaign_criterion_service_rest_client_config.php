<?php

return [
    'interfaces' => [
        'google.ads.googleads.v4.services.CampaignCriterionService' => [
            'GetCampaignCriterion' => [
                'method' => 'get',
                'uriTemplate' => '/v4/{resource_name=customers/*/campaignCriteria/*}',
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
                'uriTemplate' => '/v4/customers/{customer_id=*}/campaignCriteria:mutate',
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
