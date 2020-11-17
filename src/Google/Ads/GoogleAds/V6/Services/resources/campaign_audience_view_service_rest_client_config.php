<?php

return [
    'interfaces' => [
        'google.ads.googleads.v6.services.CampaignAudienceViewService' => [
            'GetCampaignAudienceView' => [
                'method' => 'get',
                'uriTemplate' => '/v6/{resource_name=customers/*/campaignAudienceViews/*}',
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
