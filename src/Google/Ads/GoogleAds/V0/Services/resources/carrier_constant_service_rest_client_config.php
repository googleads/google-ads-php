<?php

return [
    'interfaces' => [
        'google.ads.googleads.v0.services.CarrierConstantService' => [
            'GetCarrierConstant' => [
                'method' => 'get',
                'uriTemplate' => '/v0/{resource_name=carrierConstants/*}',
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
