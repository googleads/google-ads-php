<?php

return [
    'interfaces' => [
        'google.ads.googleads.v4.services.DetailPlacementViewService' => [
            'GetDetailPlacementView' => [
                'method' => 'get',
                'uriTemplate' => '/v4/{resource_name=customers/*/detailPlacementViews/*}',
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
