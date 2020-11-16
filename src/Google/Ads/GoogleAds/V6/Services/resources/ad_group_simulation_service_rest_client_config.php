<?php

return [
    'interfaces' => [
        'google.ads.googleads.v6.services.AdGroupSimulationService' => [
            'GetAdGroupSimulation' => [
                'method' => 'get',
                'uriTemplate' => '/v6/{resource_name=customers/*/adGroupSimulations/*}',
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
