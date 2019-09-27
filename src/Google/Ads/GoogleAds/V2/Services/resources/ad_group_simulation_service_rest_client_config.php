<?php

return [
    'interfaces' => [
        'google.ads.googleads.v2.services.AdGroupSimulationService' => [
            'GetAdGroupSimulation' => [
                'method' => 'get',
                'uriTemplate' => '/v2/{resource_name=customers/*/adGroupSimulations/*}',
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
