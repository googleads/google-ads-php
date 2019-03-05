<?php

return [
    'interfaces' => [
        'google.ads.googleads.v1.services.CarrierConstantService' => [
            'GetCarrierConstant' => [
                'method' => 'get',
                'uriTemplate' => '/v1/{resource_name=carrierConstants/*}',
                'placeholders' => [
                    'resource_name' => [
                        'getters' => [
                            'getResourceName',
                        ],
                    ],
                ],
            ],
        ],
    ],
];
