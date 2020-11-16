<?php

return [
    'interfaces' => [
        'google.ads.googleads.v6.services.CampaignCriterionSimulationService' => [
            'GetCampaignCriterionSimulation' => [
                'method' => 'get',
                'uriTemplate' => '/v6/{resource_name=customers/*/campaignCriterionSimulations/*}',
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
