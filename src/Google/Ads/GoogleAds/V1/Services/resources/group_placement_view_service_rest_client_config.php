<?php

return [
    'interfaces' => [
        'google.ads.googleads.v1.services.GroupPlacementViewService' => [
            'GetGroupPlacementView' => [
                'method' => 'get',
                'uriTemplate' => '/v1/{resource_name=customers/*/groupPlacementViews/*}',
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
