<?php

return [
    'interfaces' => [
        'google.ads.googleads.v6.services.GroupPlacementViewService' => [
            'GetGroupPlacementView' => [
                'method' => 'get',
                'uriTemplate' => '/v6/{resource_name=customers/*/groupPlacementViews/*}',
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
