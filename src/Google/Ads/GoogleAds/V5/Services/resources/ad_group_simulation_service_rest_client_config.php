<?php

return [
    'interfaces' => [
        'google.ads.googleads.v5.services.AdGroupSimulationService' => [
            'GetAdGroupSimulation' => [
                'method' => 'get',
                'uriTemplate' => '/v5/{resource_name=customers/*/adGroupSimulations/*}',
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
