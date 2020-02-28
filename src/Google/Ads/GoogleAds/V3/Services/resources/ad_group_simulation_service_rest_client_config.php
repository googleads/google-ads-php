<?php

return [
    'interfaces' => [
        'google.ads.googleads.v3.services.AdGroupSimulationService' => [
            'GetAdGroupSimulation' => [
                'method' => 'get',
                'uriTemplate' => '/v3/{resource_name=customers/*/adGroupSimulations/*}',
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
