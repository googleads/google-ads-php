<?php

return [
    'interfaces' => [
        'google.ads.googleads.v6.services.CarrierConstantService' => [
            'GetCarrierConstant' => [
                'method' => 'get',
                'uriTemplate' => '/v6/{resource_name=carrierConstants/*}',
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
