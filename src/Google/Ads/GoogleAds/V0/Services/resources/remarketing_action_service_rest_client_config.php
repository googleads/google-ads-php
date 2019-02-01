<?php

return [
    'interfaces' => [
        'google.ads.googleads.v0.services.RemarketingActionService' => [
            'GetRemarketingAction' => [
                'method' => 'get',
                'uriTemplate' => '/v0/{resource_name=customers/*/remarketingActions/*}',
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
                'uriTemplate' => '/v0/customers/{customer_id=*}/remarketingActions:mutate',
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
