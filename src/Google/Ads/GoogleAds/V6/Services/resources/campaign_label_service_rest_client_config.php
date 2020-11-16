<?php

return [
    'interfaces' => [
        'google.ads.googleads.v6.services.CampaignLabelService' => [
            'GetCampaignLabel' => [
                'method' => 'get',
                'uriTemplate' => '/v6/{resource_name=customers/*/campaignLabels/*}',
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
                'uriTemplate' => '/v6/customers/{customer_id=*}/campaignLabels:mutate',
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
