<?php

return [
    'interfaces' => [
        'google.ads.googleads.v3.services.DomainCategoryService' => [
            'GetDomainCategory' => [
                'method' => 'get',
                'uriTemplate' => '/v3/{resource_name=customers/*/domainCategories/*}',
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
