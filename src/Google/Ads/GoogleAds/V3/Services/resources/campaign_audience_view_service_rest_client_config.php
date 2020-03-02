<?php

return [
    'interfaces' => [
        'google.ads.googleads.v3.services.CampaignAudienceViewService' => [
            'GetCampaignAudienceView' => [
                'method' => 'get',
                'uriTemplate' => '/v3/{resource_name=customers/*/campaignAudienceViews/*}',
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
