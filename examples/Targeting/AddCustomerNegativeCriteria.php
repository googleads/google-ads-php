<?php

/**
 * Copyright 2019 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     https://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

namespace Google\Ads\GoogleAds\Examples\Targeting;

require __DIR__ . '/../../vendor/autoload.php';

use GetOpt\GetOpt;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentNames;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentParser;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsException;
use Google\Ads\GoogleAds\V18\Common\PlacementInfo;
use Google\Ads\GoogleAds\V18\Enums\ContentLabelTypeEnum\ContentLabelType;
use Google\Ads\GoogleAds\V18\Common\ContentLabelInfo;
use Google\Ads\GoogleAds\V18\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V18\Resources\CustomerNegativeCriterion;
use Google\Ads\GoogleAds\V18\Services\CustomerNegativeCriterionOperation;
use Google\Ads\GoogleAds\V18\Services\MutateCustomerNegativeCriteriaRequest;
use Google\ApiCore\ApiException;

/**
 * Adds various types of negative criteria as exclusions at the customer level. These
 * criteria will be applied to all campaigns for the customer.
 */
class AddCustomerNegativeCriteria
{
    private const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';

    public static function main()
    {
        // Either pass the required parameters for this example on the command line, or insert them
        // into the constants above.
        $options = (new ArgumentParser())->parseCommandArguments([
            ArgumentNames::CUSTOMER_ID => GetOpt::REQUIRED_ARGUMENT
        ]);

        // Generate a refreshable OAuth2 credential for authentication.
        $oAuth2Credential = (new OAuth2TokenBuilder())->fromFile()->build();

        // Construct a Google Ads client configured from a properties file and the
        // OAuth2 credentials above.
        $googleAdsClient = (new GoogleAdsClientBuilder())->fromFile()
            ->withOAuth2Credential($oAuth2Credential)
            ->build();

        try {
            self::runExample(
                $googleAdsClient,
                $options[ArgumentNames::CUSTOMER_ID] ?: self::CUSTOMER_ID
            );
        } catch (GoogleAdsException $googleAdsException) {
            printf(
                "Request with ID '%s' has failed.%sGoogle Ads failure details:%s",
                $googleAdsException->getRequestId(),
                PHP_EOL,
                PHP_EOL
            );
            foreach ($googleAdsException->getGoogleAdsFailure()->getErrors() as $error) {
                /** @var GoogleAdsError $error */
                printf(
                    "\t%s: %s%s",
                    $error->getErrorCode()->getErrorCode(),
                    $error->getMessage(),
                    PHP_EOL
                );
            }
            exit(1);
        } catch (ApiException $apiException) {
            printf(
                "ApiException was thrown with message '%s'.%s",
                $apiException->getMessage(),
                PHP_EOL
            );
            exit(1);
        }
    }

    /**
     * Runs the example.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the client customer ID
     */
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        int $customerId
    ) {
        // Creates a negative customer criterion excluding the content label type of 'TRAGEDY'.
        $tragedyCriterion = new CustomerNegativeCriterion([
            'content_label' => new ContentLabelInfo([
                'type' => ContentLabelType::TRAGEDY
            ])
        ]);

        // Creates a negative customer criterion excluding the placement with url
        // 'http://www.example.com'.
        $placementCriterion = new CustomerNegativeCriterion([
            'placement' => new PlacementInfo(['url' => 'http://www.example.com'])
        ]);

        // Creates the operations.
        $tragedyCriterionOperation = new CustomerNegativeCriterionOperation();
        $tragedyCriterionOperation->setCreate($tragedyCriterion);
        $placementCriterionOperation = new CustomerNegativeCriterionOperation();
        $placementCriterionOperation->setCreate($placementCriterion);

        // Issues a mutate request to add the negative customer criteria.
        $customerNegativeCriterionServiceClient =
            $googleAdsClient->getCustomerNegativeCriterionServiceClient();
        $response = $customerNegativeCriterionServiceClient->mutateCustomerNegativeCriteria(
            MutateCustomerNegativeCriteriaRequest::build(
                $customerId,
                [$tragedyCriterionOperation, $placementCriterionOperation]
            )
        );

        printf(
            "Added %d negative customer criteria:%s",
            $response->getResults()->count(),
            PHP_EOL
        );

        foreach ($response->getResults() as $addedCustomerNegativeCriterion) {
            /** @var CustomerNegativeCriterion $addedCustomerNegativeCriterion */
            print $addedCustomerNegativeCriterion->getResourceName() . PHP_EOL;
        }
    }
}

AddCustomerNegativeCriteria::main();
