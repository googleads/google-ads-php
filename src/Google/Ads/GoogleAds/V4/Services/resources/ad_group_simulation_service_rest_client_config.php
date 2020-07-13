<?php

return [
    'interfaces' => [
        'google.ads.googleads.v4.services.AdGroupSimulationService' => [
            'GetAdGroupSimulation' => [
                'method' => 'get',
                'uriTemplate' => '/v4/{resource_name=customers/*/adGroupSimulations/*}',
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
