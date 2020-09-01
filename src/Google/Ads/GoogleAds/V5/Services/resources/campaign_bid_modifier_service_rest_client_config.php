<?php

return [
    'interfaces' => [
        'google.ads.googleads.v5.services.CampaignBidModifierService' => [
            'GetCampaignBidModifier' => [
                'method' => 'get',
                'uriTemplate' => '/v5/{resource_name=customers/*/campaignBidModifiers/*}',
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
                'uriTemplate' => '/v5/customers/{customer_id=*}/campaignBidModifiers:mutate',
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
