<?php

return [
    'interfaces' => [
        'google.ads.googleads.v13.services.MediaFileService' => [
            'MutateMediaFiles' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V13\Services\MutateMediaFilesResponse',
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
                'mediaFile' => 'customers/{customer_id}/mediaFiles/{media_file_id}',
            ],
        ],
    ],
];
