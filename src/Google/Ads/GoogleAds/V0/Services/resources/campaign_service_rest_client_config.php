<?php

return [
    'interfaces' => [
        'google.ads.googleads.v0.services.CampaignService' => [
            'GetCampaign' => [
                'method' => 'get',
                'uriTemplate' => '/v0/{resource_name=customers/*/campaigns/*}',
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
                'uriTemplate' => '/v0/customers/{customer_id=*}/campaigns:mutate',
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
