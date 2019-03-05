<?php

return [
    'interfaces' => [
        'google.ads.googleads.v1.services.ManagedPlacementViewService' => [
            'GetManagedPlacementView' => [
                'method' => 'get',
                'uriTemplate' => '/v1/{resource_name=customers/*/managedPlacementViews/*}',
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
