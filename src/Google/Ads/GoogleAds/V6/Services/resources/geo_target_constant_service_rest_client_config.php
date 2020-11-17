<?php

return [
    'interfaces' => [
        'google.ads.googleads.v6.services.GeoTargetConstantService' => [
            'GetGeoTargetConstant' => [
                'method' => 'get',
                'uriTemplate' => '/v6/{resource_name=geoTargetConstants/*}',
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
                'uriTemplate' => '/v6/geoTargetConstants:suggest',
                'body' => '*',
            ],
        ],
    ],
];
