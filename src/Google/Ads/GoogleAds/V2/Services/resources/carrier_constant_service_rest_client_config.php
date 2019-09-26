<?php

return [
    'interfaces' => [
        'google.ads.googleads.v2.services.CarrierConstantService' => [
            'GetCarrierConstant' => [
                'method' => 'get',
                'uriTemplate' => '/v2/{resource_name=carrierConstants/*}',
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
