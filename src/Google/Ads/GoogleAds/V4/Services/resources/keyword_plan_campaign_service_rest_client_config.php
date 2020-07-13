<?php

return [
    'interfaces' => [
        'google.ads.googleads.v4.services.KeywordPlanCampaignService' => [
            'GetKeywordPlanCampaign' => [
                'method' => 'get',
                'uriTemplate' => '/v4/{resource_name=customers/*/keywordPlanCampaigns/*}',
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
                'uriTemplate' => '/v4/customers/{customer_id=*}/keywordPlanCampaigns:mutate',
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
