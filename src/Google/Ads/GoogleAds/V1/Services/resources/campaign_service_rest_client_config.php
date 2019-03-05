<?php

return [
    'interfaces' => [
        'google.ads.googleads.v1.services.CampaignService' => [
            'GetCampaign' => [
                'method' => 'get',
                'uriTemplate' => '/v1/{resource_name=customers/*/campaigns/*}',
                'placeholders' => [
                    'resource_name' => [
                        'getters' => [
                            'getResourceName',
                        ],
                    ],
                ],
            ],
            'MutateCampaigns' => [
                'method' => 'post',
                'uriTemplate' => '/v1/customers/{customer_id=*}/campaigns:mutate',
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
