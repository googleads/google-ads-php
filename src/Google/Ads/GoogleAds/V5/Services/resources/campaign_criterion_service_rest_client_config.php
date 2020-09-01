<?php

return [
    'interfaces' => [
        'google.ads.googleads.v5.services.CampaignCriterionService' => [
            'GetCampaignCriterion' => [
                'method' => 'get',
                'uriTemplate' => '/v5/{resource_name=customers/*/campaignCriteria/*}',
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
                'uriTemplate' => '/v5/customers/{customer_id=*}/campaignCriteria:mutate',
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
