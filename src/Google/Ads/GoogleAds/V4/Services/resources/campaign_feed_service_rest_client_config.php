<?php

return [
    'interfaces' => [
        'google.ads.googleads.v4.services.CampaignFeedService' => [
            'GetCampaignFeed' => [
                'method' => 'get',
                'uriTemplate' => '/v4/{resource_name=customers/*/campaignFeeds/*}',
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
                'uriTemplate' => '/v4/customers/{customer_id=*}/campaignFeeds:mutate',
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
