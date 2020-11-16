<?php

return [
    'interfaces' => [
        'google.ads.googleads.v6.services.AdGroupAudienceViewService' => [
            'GetAdGroupAudienceView' => [
                'method' => 'get',
                'uriTemplate' => '/v6/{resource_name=customers/*/adGroupAudienceViews/*}',
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
