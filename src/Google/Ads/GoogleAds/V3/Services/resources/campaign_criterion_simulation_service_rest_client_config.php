<?php

return [
    'interfaces' => [
        'google.ads.googleads.v3.services.CampaignCriterionSimulationService' => [
            'GetCampaignCriterionSimulation' => [
                'method' => 'get',
                'uriTemplate' => '/v3/{resource_name=customers/*/campaignCriterionSimulations/*}',
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
