<?php

return [
    'interfaces' => [
        'google.ads.googleads.v15.services.ExperimentArmService' => [
            'MutateExperimentArms' => [
                'callType' => \Google\ApiCore\Call::UNARY_CALL,
                'responseType' => 'Google\Ads\GoogleAds\V15\Services\MutateExperimentArmsResponse',
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
                'campaign' => 'customers/{customer_id}/campaigns/{campaign_id}',
                'experiment' => 'customers/{customer_id}/experiments/{trial_id}',
                'experimentArm' => 'customers/{customer_id}/experimentArms/{trial_id}~{trial_arm_id}',
            ],
        ],
    ],
];
