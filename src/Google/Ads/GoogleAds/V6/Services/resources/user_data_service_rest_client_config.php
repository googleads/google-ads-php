<?php

return [
    'interfaces' => [
        'google.ads.googleads.v6.services.UserDataService' => [
            'UploadUserData' => [
                'method' => 'post',
                'uriTemplate' => '/v6/customers/{customer_id=*}:uploadUserData',
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
