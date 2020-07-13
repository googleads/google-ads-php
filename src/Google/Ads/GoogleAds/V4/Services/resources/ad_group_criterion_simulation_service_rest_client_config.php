<?php

return [
    'interfaces' => [
        'google.ads.googleads.v4.services.AdGroupCriterionSimulationService' => [
            'GetAdGroupCriterionSimulation' => [
                'method' => 'get',
                'uriTemplate' => '/v4/{resource_name=customers/*/adGroupCriterionSimulations/*}',
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
