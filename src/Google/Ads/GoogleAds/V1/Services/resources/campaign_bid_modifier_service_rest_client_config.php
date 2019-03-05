<?php

return [
    'interfaces' => [
        'google.ads.googleads.v1.services.CampaignBidModifierService' => [
            'GetCampaignBidModifier' => [
                'method' => 'get',
                'uriTemplate' => '/v1/{resource_name=customers/*/campaignBidModifiers/*}',
                'placeholders' => [
                    'resource_name' => [
                        'getters' => [
                            'getResourceName',
                        ],
                    ],
                ],
            ],
            'MutateCampaignBidModifiers' => [
                'method' => 'post',
                'uriTemplate' => '/v1/customers/{customer_id=*}/campaignBidModifiers:mutate',
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
