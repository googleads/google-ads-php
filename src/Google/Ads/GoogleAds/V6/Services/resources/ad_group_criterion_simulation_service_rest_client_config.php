<?php

return [
    'interfaces' => [
        'google.ads.googleads.v6.services.AdGroupCriterionSimulationService' => [
            'GetAdGroupCriterionSimulation' => [
                'method' => 'get',
                'uriTemplate' => '/v6/{resource_name=customers/*/adGroupCriterionSimulations/*}',
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
