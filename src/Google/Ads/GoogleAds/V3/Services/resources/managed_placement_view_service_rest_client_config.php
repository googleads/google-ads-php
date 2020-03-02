<?php

return [
    'interfaces' => [
        'google.ads.googleads.v3.services.ManagedPlacementViewService' => [
            'GetManagedPlacementView' => [
                'method' => 'get',
                'uriTemplate' => '/v3/{resource_name=customers/*/managedPlacementViews/*}',
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
