<?php

return [
    'interfaces' => [
        'google.ads.googleads.v2.services.ManagedPlacementViewService' => [
            'GetManagedPlacementView' => [
                'method' => 'get',
                'uriTemplate' => '/v2/{resource_name=customers/*/managedPlacementViews/*}',
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
