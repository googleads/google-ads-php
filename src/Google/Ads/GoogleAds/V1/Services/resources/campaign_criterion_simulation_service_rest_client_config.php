<?php

return [
    'interfaces' => [
        'google.ads.googleads.v1.services.CampaignCriterionSimulationService' => [
            'GetCampaignCriterionSimulation' => [
                'method' => 'get',
                'uriTemplate' => '/v1/{resource_name=customers/*/campaignCriterionSimulations/*}',
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
