<?php

return [
    'interfaces' => [
        'google.ads.googleads.v2.services.CampaignSharedSetService' => [
            'GetCampaignSharedSet' => [
                'method' => 'get',
                'uriTemplate' => '/v2/{resource_name=customers/*/campaignSharedSets/*}',
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
                'uriTemplate' => '/v2/customers/{customer_id=*}/campaignSharedSets:mutate',
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
