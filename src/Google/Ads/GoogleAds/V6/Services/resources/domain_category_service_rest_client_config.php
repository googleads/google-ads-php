<?php

return [
    'interfaces' => [
        'google.ads.googleads.v6.services.DomainCategoryService' => [
            'GetDomainCategory' => [
                'method' => 'get',
                'uriTemplate' => '/v6/{resource_name=customers/*/domainCategories/*}',
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
