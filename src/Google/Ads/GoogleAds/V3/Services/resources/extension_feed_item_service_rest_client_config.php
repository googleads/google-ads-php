<?php

return [
    'interfaces' => [
        'google.ads.googleads.v3.services.ExtensionFeedItemService' => [
            'GetExtensionFeedItem' => [
                'method' => 'get',
                'uriTemplate' => '/v3/{resource_name=customers/*/extensionFeedItems/*}',
                'placeholders' => [
                    'resource_name' => [
                        'getters' => [
                            'getResourceName',
                        ],
                    ],
                ],
            ],
            'MutateExtensionFeedItems' => [
                'method' => 'post',
                'uriTemplate' => '/v3/customers/{customer_id=*}/extensionFeedItems:mutate',
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
