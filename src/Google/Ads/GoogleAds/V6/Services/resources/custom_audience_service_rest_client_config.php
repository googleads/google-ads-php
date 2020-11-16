<?php

return [
    'interfaces' => [
        'google.ads.googleads.v6.services.CustomAudienceService' => [
            'GetCustomAudience' => [
                'method' => 'get',
                'uriTemplate' => '/v6/{resource_name=customers/*/customAudiences/*}',
                'placeholders' => [
                    'resource_name' => [
                        'getters' => [
                            'getResourceName',
                        ],
                    ],
                ],
            ],
            'MutateCustomAudiences' => [
                'method' => 'post',
                'uriTemplate' => '/v6/customers/{customer_id=*}/customAudiences:mutate',
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
