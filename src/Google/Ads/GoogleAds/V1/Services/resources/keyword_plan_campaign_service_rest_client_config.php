<?php

return [
    'interfaces' => [
        'google.ads.googleads.v1.services.KeywordPlanCampaignService' => [
            'GetKeywordPlanCampaign' => [
                'method' => 'get',
                'uriTemplate' => '/v1/{resource_name=customers/*/keywordPlanCampaigns/*}',
                'placeholders' => [
                    'resource_name' => [
                        'getters' => [
                            'getResourceName',
                        ],
                    ],
                ],
            ],
            'MutateKeywordPlanCampaigns' => [
                'method' => 'post',
                'uriTemplate' => '/v1/customers/{customer_id=*}/keywordPlanCampaigns:mutate',
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
