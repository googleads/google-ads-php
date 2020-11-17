<?php

return [
    'interfaces' => [
        'google.ads.googleads.v6.services.CampaignBidModifierService' => [
            'GetCampaignBidModifier' => [
                'method' => 'get',
                'uriTemplate' => '/v6/{resource_name=customers/*/campaignBidModifiers/*}',
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
                'uriTemplate' => '/v6/customers/{customer_id=*}/campaignBidModifiers:mutate',
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
