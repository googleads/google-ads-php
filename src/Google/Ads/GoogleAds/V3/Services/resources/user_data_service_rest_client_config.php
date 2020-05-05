<?php

return [
    'interfaces' => [
        'google.ads.googleads.v3.services.UserDataService' => [
            'UploadUserData' => [
                'method' => 'post',
                'uriTemplate' => '/v3/customers/{customer_id=*}:uploadUserData',
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
