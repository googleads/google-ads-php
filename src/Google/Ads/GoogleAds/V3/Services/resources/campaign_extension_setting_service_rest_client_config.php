<?php

return [
    'interfaces' => [
        'google.ads.googleads.v3.services.CampaignExtensionSettingService' => [
            'GetCampaignExtensionSetting' => [
                'method' => 'get',
                'uriTemplate' => '/v3/{resource_name=customers/*/campaignExtensionSettings/*}',
                'placeholders' => [
                    'resource_name' => [
                        'getters' => [
                            'getResourceName',
                        ],
                    ],
                ],
            ],
            'MutateCampaignExtensionSettings' => [
                'method' => 'post',
                'uriTemplate' => '/v3/customers/{customer_id=*}/campaignExtensionSettings:mutate',
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
