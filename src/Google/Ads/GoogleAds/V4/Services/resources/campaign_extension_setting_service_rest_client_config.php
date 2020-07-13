<?php

return [
    'interfaces' => [
        'google.ads.googleads.v4.services.CampaignExtensionSettingService' => [
            'GetCampaignExtensionSetting' => [
                'method' => 'get',
                'uriTemplate' => '/v4/{resource_name=customers/*/campaignExtensionSettings/*}',
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
                'uriTemplate' => '/v4/customers/{customer_id=*}/campaignExtensionSettings:mutate',
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
