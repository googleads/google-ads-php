<?php

return [
    'interfaces' => [
        'google.ads.googleads.v5.services.DomainCategoryService' => [
            'GetDomainCategory' => [
                'method' => 'get',
                'uriTemplate' => '/v5/{resource_name=customers/*/domainCategories/*}',
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
