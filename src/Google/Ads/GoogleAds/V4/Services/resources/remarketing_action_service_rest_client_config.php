<?php

return [
    'interfaces' => [
        'google.ads.googleads.v4.services.RemarketingActionService' => [
            'GetRemarketingAction' => [
                'method' => 'get',
                'uriTemplate' => '/v4/{resource_name=customers/*/remarketingActions/*}',
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
                'uriTemplate' => '/v4/customers/{customer_id=*}/remarketingActions:mutate',
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
