<?php

return [
    'interfaces' => [
        'google.ads.googleads.v6.services.CampaignService' => [
            'GetCampaign' => [
                'method' => 'get',
                'uriTemplate' => '/v6/{resource_name=customers/*/campaigns/*}',
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
                'uriTemplate' => '/v6/customers/{customer_id=*}/campaigns:mutate',
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
