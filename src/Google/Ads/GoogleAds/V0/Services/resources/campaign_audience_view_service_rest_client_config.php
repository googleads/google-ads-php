<?php

return [
    'interfaces' => [
        'google.ads.googleads.v0.services.CampaignAudienceViewService' => [
            'GetCampaignAudienceView' => [
                'method' => 'get',
                'uriTemplate' => '/v0/{resource_name=customers/*/campaignAudienceViews/*}',
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
