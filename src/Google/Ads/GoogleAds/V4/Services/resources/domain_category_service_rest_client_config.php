<?php

return [
    'interfaces' => [
        'google.ads.googleads.v4.services.DomainCategoryService' => [
            'GetDomainCategory' => [
                'method' => 'get',
                'uriTemplate' => '/v4/{resource_name=customers/*/domainCategories/*}',
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
