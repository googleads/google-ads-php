<?php

return [
    'interfaces' => [
        'google.ads.googleads.v0.services.CampaignFeedService' => [
            'GetCampaignFeed' => [
                'method' => 'get',
                'uriTemplate' => '/v0/{resource_name=customers/*/campaignFeeds/*}',
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
                'uriTemplate' => '/v0/customers/{customer_id=*}/campaignFeeds:mutate',
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
