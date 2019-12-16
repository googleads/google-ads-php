<?php

return [
    'interfaces' => [
        'google.ads.googleads.v1.services.CampaignLabelService' => [
            'GetCampaignLabel' => [
                'method' => 'get',
                'uriTemplate' => '/v1/{resource_name=customers/*/campaignLabels/*}',
                'placeholders' => [
                    'resource_name' => [
                        'getters' => [
                            'getResourceName',
                        ],
                    ],
                ],
            ],
            'MutateCampaignLabels' => [
                'method' => 'post',
                'uriTemplate' => '/v1/customers/{customer_id=*}/campaignLabels:mutate',
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
