<?php

return [
    'interfaces' => [
        'google.ads.googleads.v0.services.CampaignCriterionService' => [
            'GetCampaignCriterion' => [
                'method' => 'get',
                'uriTemplate' => '/v0/{resource_name=customers/*/campaignCriteria/*}',
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
                'uriTemplate' => '/v0/customers/{customer_id=*}/campaignCriteria:mutate',
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
