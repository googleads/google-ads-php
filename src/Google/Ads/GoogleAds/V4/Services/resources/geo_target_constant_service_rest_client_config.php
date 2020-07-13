<?php

return [
    'interfaces' => [
        'google.ads.googleads.v4.services.GeoTargetConstantService' => [
            'GetGeoTargetConstant' => [
                'method' => 'get',
                'uriTemplate' => '/v4/{resource_name=geoTargetConstants/*}',
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
                'uriTemplate' => '/v4/geoTargetConstants:suggest',
                'body' => '*',
            ],
        ],
    ],
];
