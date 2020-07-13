<?php

return [
    'interfaces' => [
        'google.ads.googleads.v4.services.AdGroupAudienceViewService' => [
            'GetAdGroupAudienceView' => [
                'method' => 'get',
                'uriTemplate' => '/v4/{resource_name=customers/*/adGroupAudienceViews/*}',
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
