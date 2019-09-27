<?php

return [
    'interfaces' => [
        'google.ads.googleads.v2.services.ExtensionFeedItemService' => [
            'GetExtensionFeedItem' => [
                'method' => 'get',
                'uriTemplate' => '/v2/{resource_name=customers/*/extensionFeedItems/*}',
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
                'uriTemplate' => '/v2/customers/{customer_id=*}/extensionFeedItems:mutate',
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
