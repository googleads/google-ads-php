<?php

return [
    'interfaces' => [
        'google.ads.googleads.v6.services.KeywordPlanCampaignService' => [
            'GetKeywordPlanCampaign' => [
                'method' => 'get',
                'uriTemplate' => '/v6/{resource_name=customers/*/keywordPlanCampaigns/*}',
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
                'uriTemplate' => '/v6/customers/{customer_id=*}/keywordPlanCampaigns:mutate',
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
