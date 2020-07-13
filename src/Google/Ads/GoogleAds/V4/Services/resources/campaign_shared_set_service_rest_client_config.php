<?php

return [
    'interfaces' => [
        'google.ads.googleads.v4.services.CampaignSharedSetService' => [
            'GetCampaignSharedSet' => [
                'method' => 'get',
                'uriTemplate' => '/v4/{resource_name=customers/*/campaignSharedSets/*}',
                'placeholders' => [
                    'resource_name' => [
                        'getters' => [
                            'getResourceName',
                        ],
                    ],
                ],
            ],
            'MutateCampaignSharedSets' => [
                'method' => 'post',
                'uriTemplate' => '/v4/customers/{customer_id=*}/campaignSharedSets:mutate',
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
