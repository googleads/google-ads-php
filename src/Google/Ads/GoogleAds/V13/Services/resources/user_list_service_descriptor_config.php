<?php

return [
    'interfaces' => [
        'google.ads.googleads.v13.services.UserListService' => [
            'MutateUserLists' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V13\Services\MutateUserListsResponse',
                'headerParams' => [
                    [
                        'keyName' => 'customer_id',
                        'fieldAccessors' => [
                            'getCustomerId',
                        ],
                    ],
                ],
            ],
            'templateMap' => [
                'userList' => 'customers/{customer_id}/userLists/{user_list_id}',
            ],
        ],
    ],
];
