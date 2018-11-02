<?php

return [
    'interfaces' => [
        'google.ads.googleads.v0.services.ManagedPlacementViewService' => [
            'GetManagedPlacementView' => [
                'method' => 'get',
                'uriTemplate' => '/v0/{resource_name=customers/*/managedPlacementViews/*}',
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
