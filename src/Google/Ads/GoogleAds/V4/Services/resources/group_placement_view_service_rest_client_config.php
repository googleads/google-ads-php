<?php

return [
    'interfaces' => [
        'google.ads.googleads.v4.services.GroupPlacementViewService' => [
            'GetGroupPlacementView' => [
                'method' => 'get',
                'uriTemplate' => '/v4/{resource_name=customers/*/groupPlacementViews/*}',
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
