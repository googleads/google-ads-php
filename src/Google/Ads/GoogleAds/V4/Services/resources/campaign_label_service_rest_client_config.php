<?php

return [
    'interfaces' => [
        'google.ads.googleads.v4.services.CampaignLabelService' => [
            'GetCampaignLabel' => [
                'method' => 'get',
                'uriTemplate' => '/v4/{resource_name=customers/*/campaignLabels/*}',
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
                'uriTemplate' => '/v4/customers/{customer_id=*}/campaignLabels:mutate',
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
