<?php

return [
    'interfaces' => [
        'google.ads.googleads.v3.services.GroupPlacementViewService' => [
            'GetGroupPlacementView' => [
                'method' => 'get',
                'uriTemplate' => '/v3/{resource_name=customers/*/groupPlacementViews/*}',
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
