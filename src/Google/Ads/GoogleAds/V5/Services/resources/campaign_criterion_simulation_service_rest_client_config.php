<?php

return [
    'interfaces' => [
        'google.ads.googleads.v5.services.CampaignCriterionSimulationService' => [
            'GetCampaignCriterionSimulation' => [
                'method' => 'get',
                'uriTemplate' => '/v5/{resource_name=customers/*/campaignCriterionSimulations/*}',
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
