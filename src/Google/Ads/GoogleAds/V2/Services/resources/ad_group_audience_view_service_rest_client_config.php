<?php

return [
    'interfaces' => [
        'google.ads.googleads.v2.services.AdGroupAudienceViewService' => [
            'GetAdGroupAudienceView' => [
                'method' => 'get',
                'uriTemplate' => '/v2/{resource_name=customers/*/adGroupAudienceViews/*}',
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
