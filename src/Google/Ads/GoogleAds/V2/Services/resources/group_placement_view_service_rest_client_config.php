<?php

return [
    'interfaces' => [
        'google.ads.googleads.v2.services.GroupPlacementViewService' => [
            'GetGroupPlacementView' => [
                'method' => 'get',
                'uriTemplate' => '/v2/{resource_name=customers/*/groupPlacementViews/*}',
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
