<?php

return [
    'interfaces' => [
        'google.ads.googleads.v3.services.GeoTargetConstantService' => [
            'GetGeoTargetConstant' => [
                'method' => 'get',
                'uriTemplate' => '/v3/{resource_name=geoTargetConstants/*}',
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
                'uriTemplate' => '/v3/geoTargetConstants:suggest',
                'body' => '*',
            ],
        ],
    ],
];
