<?php

return [
    'interfaces' => [
        'google.ads.googleads.v2.services.DetailPlacementViewService' => [
            'GetDetailPlacementView' => [
                'method' => 'get',
                'uriTemplate' => '/v2/{resource_name=customers/*/detailPlacementViews/*}',
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
