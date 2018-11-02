<?php

return [
    'interfaces' => [
        'google.ads.googleads.v0.services.AdGroupAudienceViewService' => [
            'GetAdGroupAudienceView' => [
                'method' => 'get',
                'uriTemplate' => '/v0/{resource_name=customers/*/adGroupAudienceViews/*}',
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
