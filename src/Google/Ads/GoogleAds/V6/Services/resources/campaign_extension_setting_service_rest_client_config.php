<?php

return [
    'interfaces' => [
        'google.ads.googleads.v6.services.CampaignExtensionSettingService' => [
            'GetCampaignExtensionSetting' => [
                'method' => 'get',
                'uriTemplate' => '/v6/{resource_name=customers/*/campaignExtensionSettings/*}',
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
                'uriTemplate' => '/v6/customers/{customer_id=*}/campaignExtensionSettings:mutate',
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
