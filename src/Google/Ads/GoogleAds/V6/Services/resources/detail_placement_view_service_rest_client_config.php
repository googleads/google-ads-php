<?php

return [
    'interfaces' => [
        'google.ads.googleads.v6.services.DetailPlacementViewService' => [
            'GetDetailPlacementView' => [
                'method' => 'get',
                'uriTemplate' => '/v6/{resource_name=customers/*/detailPlacementViews/*}',
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
