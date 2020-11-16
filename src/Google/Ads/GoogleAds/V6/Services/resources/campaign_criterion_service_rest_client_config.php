<?php

return [
    'interfaces' => [
        'google.ads.googleads.v6.services.CampaignCriterionService' => [
            'GetCampaignCriterion' => [
                'method' => 'get',
                'uriTemplate' => '/v6/{resource_name=customers/*/campaignCriteria/*}',
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
                'uriTemplate' => '/v6/customers/{customer_id=*}/campaignCriteria:mutate',
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
