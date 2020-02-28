<?php

return [
    'interfaces' => [
        'google.ads.googleads.v3.services.DetailPlacementViewService' => [
            'GetDetailPlacementView' => [
                'method' => 'get',
                'uriTemplate' => '/v3/{resource_name=customers/*/detailPlacementViews/*}',
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
