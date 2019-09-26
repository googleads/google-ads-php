<?php

return [
    'interfaces' => [
        'google.ads.googleads.v2.services.CampaignService' => [
            'GetCampaign' => [
                'method' => 'get',
                'uriTemplate' => '/v2/{resource_name=customers/*/campaigns/*}',
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
                'uriTemplate' => '/v2/customers/{customer_id=*}/campaigns:mutate',
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
