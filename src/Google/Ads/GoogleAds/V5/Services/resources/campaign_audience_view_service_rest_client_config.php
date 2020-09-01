<?php

return [
    'interfaces' => [
        'google.ads.googleads.v5.services.CampaignAudienceViewService' => [
            'GetCampaignAudienceView' => [
                'method' => 'get',
                'uriTemplate' => '/v5/{resource_name=customers/*/campaignAudienceViews/*}',
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
