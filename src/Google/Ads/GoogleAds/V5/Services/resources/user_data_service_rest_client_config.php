<?php

return [
    'interfaces' => [
        'google.ads.googleads.v5.services.UserDataService' => [
            'UploadUserData' => [
                'method' => 'post',
                'uriTemplate' => '/v5/customers/{customer_id=*}:uploadUserData',
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
