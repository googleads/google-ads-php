<?php

return [
    'interfaces' => [
        'google.ads.googleads.v0.services.CampaignGroupService' => [
            'GetCampaignGroup' => [
                'method' => 'get',
                'uriTemplate' => '/v0/{resource_name=customers/*/campaignGroups/*}',
                'placeholders' => [
                    'resource_name' => [
                        'getters' => [
                            'getResourceName',
                        ],
                    ],
                ],
            ],
            'MutateCampaignGroups' => [
                'method' => 'post',
                'uriTemplate' => '/v0/customers/{customer_id=*}/campaignGroups:mutate',
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
