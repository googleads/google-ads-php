<?php

return [
    'interfaces' => [
        'google.ads.googleads.v5.services.DetailPlacementViewService' => [
            'GetDetailPlacementView' => [
                'method' => 'get',
                'uriTemplate' => '/v5/{resource_name=customers/*/detailPlacementViews/*}',
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
