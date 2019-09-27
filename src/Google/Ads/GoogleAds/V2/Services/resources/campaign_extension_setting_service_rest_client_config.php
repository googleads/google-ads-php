<?php

return [
    'interfaces' => [
        'google.ads.googleads.v2.services.CampaignExtensionSettingService' => [
            'GetCampaignExtensionSetting' => [
                'method' => 'get',
                'uriTemplate' => '/v2/{resource_name=customers/*/campaignExtensionSettings/*}',
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
                'uriTemplate' => '/v2/customers/{customer_id=*}/campaignExtensionSettings:mutate',
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
