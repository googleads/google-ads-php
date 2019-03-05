<?php

return [
    'interfaces' => [
        'google.ads.googleads.v1.services.ExtensionFeedItemService' => [
            'GetExtensionFeedItem' => [
                'method' => 'get',
                'uriTemplate' => '/v1/{resource_name=customers/*/extensionFeedItems/*}',
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
                'uriTemplate' => '/v1/customers/{customer_id=*}/extensionFeedItems:mutate',
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
