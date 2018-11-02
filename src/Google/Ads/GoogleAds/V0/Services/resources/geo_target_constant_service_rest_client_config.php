<?php

return [
    'interfaces' => [
        'google.ads.googleads.v0.services.GeoTargetConstantService' => [
            'GetGeoTargetConstant' => [
                'method' => 'get',
                'uriTemplate' => '/v0/{resource_name=geoTargetConstants/*}',
                'placeholders' => [
                    'resource_name' => [
                        'getters' => [
                            'getResourceName',
                        ],
                    ],
                ],
            ],
            'SuggestGeoTargetConstants' => [
                'method' => 'post',
                'uriTemplate' => '/v0/geoTargetConstants:suggest',
                'body' => '*',
            ],
        ],
    ],
];
