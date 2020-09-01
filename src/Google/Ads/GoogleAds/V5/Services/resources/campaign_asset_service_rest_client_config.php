<?php

return [
    'interfaces' => [
        'google.ads.googleads.v5.services.CampaignAssetService' => [
            'GetCampaignAsset' => [
                'method' => 'get',
                'uriTemplate' => '/v5/{resource_name=customers/*/campaignAssets/*}',
                'placeholders' => [
                    'resource_name' => [
                        'getters' => [
                            'getResourceName',
                        ],
                    ],
                ],
            ],
            'MutateCampaignAssets' => [
                'method' => 'post',
                'uriTemplate' => '/v5/customers/{customer_id=*}/campaignAssets:mutate',
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
