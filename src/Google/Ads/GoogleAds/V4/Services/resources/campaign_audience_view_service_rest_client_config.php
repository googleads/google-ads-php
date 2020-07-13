<?php

return [
    'interfaces' => [
        'google.ads.googleads.v4.services.CampaignAudienceViewService' => [
            'GetCampaignAudienceView' => [
                'method' => 'get',
                'uriTemplate' => '/v4/{resource_name=customers/*/campaignAudienceViews/*}',
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
