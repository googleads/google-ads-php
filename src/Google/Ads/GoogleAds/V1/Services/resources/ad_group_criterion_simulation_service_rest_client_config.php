<?php

return [
    'interfaces' => [
        'google.ads.googleads.v1.services.AdGroupCriterionSimulationService' => [
            'GetAdGroupCriterionSimulation' => [
                'method' => 'get',
                'uriTemplate' => '/v1/{resource_name=customers/*/adGroupCriterionSimulations/*}',
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
