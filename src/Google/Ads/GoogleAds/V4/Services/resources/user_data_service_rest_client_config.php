<?php

return [
    'interfaces' => [
        'google.ads.googleads.v4.services.UserDataService' => [
            'UploadUserData' => [
                'method' => 'post',
                'uriTemplate' => '/v4/customers/{customer_id=*}:uploadUserData',
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
