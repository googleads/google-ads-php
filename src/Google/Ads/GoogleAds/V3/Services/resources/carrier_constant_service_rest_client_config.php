<?php

return [
    'interfaces' => [
        'google.ads.googleads.v3.services.CarrierConstantService' => [
            'GetCarrierConstant' => [
                'method' => 'get',
                'uriTemplate' => '/v3/{resource_name=carrierConstants/*}',
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
