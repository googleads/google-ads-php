<?php

return [
    'interfaces' => [
        'google.ads.googleads.v3.services.CampaignSharedSetService' => [
            'GetCampaignSharedSet' => [
                'method' => 'get',
                'uriTemplate' => '/v3/{resource_name=customers/*/campaignSharedSets/*}',
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
                'uriTemplate' => '/v3/customers/{customer_id=*}/campaignSharedSets:mutate',
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
