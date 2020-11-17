<?php

return [
    'interfaces' => [
        'google.ads.googleads.v6.services.CampaignAssetService' => [
            'GetCampaignAsset' => [
                'method' => 'get',
                'uriTemplate' => '/v6/{resource_name=customers/*/campaignAssets/*}',
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
                'uriTemplate' => '/v6/customers/{customer_id=*}/campaignAssets:mutate',
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
