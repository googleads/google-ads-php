<?php

return [
    'interfaces' => [
        'google.ads.googleads.v2.services.RemarketingActionService' => [
            'GetRemarketingAction' => [
                'method' => 'get',
                'uriTemplate' => '/v2/{resource_name=customers/*/remarketingActions/*}',
                'placeholders' => [
                    'resource_name' => [
                        'getters' => [
                            'getResourceName',
                        ],
                    ],
                ],
            ],
            'MutateRemarketingActions' => [
                'method' => 'post',
                'uriTemplate' => '/v2/customers/{customer_id=*}/remarketingActions:mutate',
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
