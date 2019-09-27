<?php

return [
    'interfaces' => [
        'google.ads.googleads.v2.services.CampaignFeedService' => [
            'GetCampaignFeed' => [
                'method' => 'get',
                'uriTemplate' => '/v2/{resource_name=customers/*/campaignFeeds/*}',
                'placeholders' => [
                    'resource_name' => [
                        'getters' => [
                            'getResourceName',
                        ],
                    ],
                ],
            ],
            'MutateCampaignFeeds' => [
                'method' => 'post',
                'uriTemplate' => '/v2/customers/{customer_id=*}/campaignFeeds:mutate',
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
