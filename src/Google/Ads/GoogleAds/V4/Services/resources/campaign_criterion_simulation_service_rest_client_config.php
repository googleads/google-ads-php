<?php

return [
    'interfaces' => [
        'google.ads.googleads.v4.services.CampaignCriterionSimulationService' => [
            'GetCampaignCriterionSimulation' => [
                'method' => 'get',
                'uriTemplate' => '/v4/{resource_name=customers/*/campaignCriterionSimulations/*}',
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
