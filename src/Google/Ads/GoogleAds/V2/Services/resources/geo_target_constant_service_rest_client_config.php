<?php

return [
    'interfaces' => [
        'google.ads.googleads.v2.services.GeoTargetConstantService' => [
            'GetGeoTargetConstant' => [
                'method' => 'get',
                'uriTemplate' => '/v2/{resource_name=geoTargetConstants/*}',
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
                'uriTemplate' => '/v2/geoTargetConstants:suggest',
                'body' => '*',
            ],
        ],
    ],
];
