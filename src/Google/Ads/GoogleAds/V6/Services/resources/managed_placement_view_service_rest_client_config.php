<?php

return [
    'interfaces' => [
        'google.ads.googleads.v6.services.ManagedPlacementViewService' => [
            'GetManagedPlacementView' => [
                'method' => 'get',
                'uriTemplate' => '/v6/{resource_name=customers/*/managedPlacementViews/*}',
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
