<?php

return [
    'interfaces' => [
        'google.ads.googleads.v5.services.CampaignExtensionSettingService' => [
            'GetCampaignExtensionSetting' => [
                'method' => 'get',
                'uriTemplate' => '/v5/{resource_name=customers/*/campaignExtensionSettings/*}',
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
                'uriTemplate' => '/v5/customers/{customer_id=*}/campaignExtensionSettings:mutate',
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
