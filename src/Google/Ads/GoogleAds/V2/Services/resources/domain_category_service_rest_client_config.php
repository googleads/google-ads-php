<?php

return [
    'interfaces' => [
        'google.ads.googleads.v2.services.DomainCategoryService' => [
            'GetDomainCategory' => [
                'method' => 'get',
                'uriTemplate' => '/v2/{resource_name=customers/*/domainCategories/*}',
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
