<?php

return [
    'interfaces' => [
        'google.ads.googleads.v6.services.CampaignFeedService' => [
            'GetCampaignFeed' => [
                'method' => 'get',
                'uriTemplate' => '/v6/{resource_name=customers/*/campaignFeeds/*}',
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
                'uriTemplate' => '/v6/customers/{customer_id=*}/campaignFeeds:mutate',
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
