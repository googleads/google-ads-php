<?php

return [
    'interfaces' => [
        'google.ads.googleads.v5.services.AdGroupCriterionSimulationService' => [
            'GetAdGroupCriterionSimulation' => [
                'method' => 'get',
                'uriTemplate' => '/v5/{resource_name=customers/*/adGroupCriterionSimulations/*}',
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
