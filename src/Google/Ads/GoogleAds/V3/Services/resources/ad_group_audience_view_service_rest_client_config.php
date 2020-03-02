<?php

return [
    'interfaces' => [
        'google.ads.googleads.v3.services.AdGroupAudienceViewService' => [
            'GetAdGroupAudienceView' => [
                'method' => 'get',
                'uriTemplate' => '/v3/{resource_name=customers/*/adGroupAudienceViews/*}',
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
