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

namespace Google\Ads\GoogleAds\Examples\CampaignManagement;

require __DIR__ . '/../../vendor/autoload.php';

use GetOpt\GetOpt;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentNames;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentParser;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsException;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\Util\V18\ResourceNames;
use Google\Ads\GoogleAds\V18\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V18\Resources\AdParameter;
use Google\Ads\GoogleAds\V18\Services\AdParameterOperation;
use Google\Ads\GoogleAds\V18\Services\MutateAdParametersRequest;
use Google\ApiCore\ApiException;

/** This example sets ad parameters for an ad group criterion. */
class SetAdParameters
{
    private const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';
    private const AD_GROUP_ID = 'INSERT_AD_GROUP_ID_HERE';
    private const CRITERION_ID = 'INSERT_CRITERION_ID_HERE';

    public static function main()
    {
        // Either pass the required parameters for this example on the command line, or insert them
        // into the constants above.
        $options = (new ArgumentParser())->parseCommandArguments([
            ArgumentNames::CUSTOMER_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::AD_GROUP_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::CRITERION_ID => GetOpt::REQUIRED_ARGUMENT
        ]);

        // Generate a refreshable OAuth2 credential for authentication.
        $oAuth2Credential = (new OAuth2TokenBuilder())->fromFile()->build();

        // Construct a Google Ads client configured from a properties file and the
        // OAuth2 credentials above.
        $googleAdsClient = (new GoogleAdsClientBuilder())
            ->fromFile()
            ->withOAuth2Credential($oAuth2Credential)
            ->build();

        try {
            self::runExample(
                $googleAdsClient,
                $options[ArgumentNames::CUSTOMER_ID] ?: self::CUSTOMER_ID,
                $options[ArgumentNames::AD_GROUP_ID] ?: self::AD_GROUP_ID,
                $options[ArgumentNames::CRITERION_ID] ?: self::CRITERION_ID
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
     * @param int $customerId the customer ID
     * @param int $adGroupId the ad group ID
     * @param int $criterionId the criterion ID
     */
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        int $adGroupId,
        int $criterionId
    ) {
        // Gets the resource name of the ad group criterion to be used.
        $adGroupCriterionResourceName =
            ResourceNames::forAdGroupCriterion($customerId, $adGroupId, $criterionId);

        // Creates ad parameters.
        // There can be a maximum of two ad parameters per ad group criterion.
        // (One with parameter_index = 1 and one with parameter_index = 2.)
        $adParameter1 = new AdParameter([
            'ad_group_criterion' => $adGroupCriterionResourceName,
            'parameter_index' => 1,
            // Restrictions apply to the value of the insertion text.
            // For more information, see the field documentation in the AdParameter class.
            'insertion_text' => '100'
        ]);

        $adParameter2 = new AdParameter([
            'ad_group_criterion' => $adGroupCriterionResourceName,
            'parameter_index' => 2,
            'insertion_text' => '$40'
        ]);

        // Creates ad parameter operations.
        $adParameterOperation1 = new AdParameterOperation();
        $adParameterOperation1->setCreate($adParameter1);

        $adParameterOperation2 = new AdParameterOperation();
        $adParameterOperation2->setCreate($adParameter2);

        // Issues a mutate request to set the ad parameters.
        $adParameterServiceClient = $googleAdsClient->getAdParameterServiceClient();
        $response = $adParameterServiceClient->mutateAdParameters(MutateAdParametersRequest::build(
            $customerId,
            [$adParameterOperation1, $adParameterOperation2]
        ));

        printf("Set %d ad parameters:%s", $response->getResults()->count(), PHP_EOL);

        foreach ($response->getResults() as $setParameter) {
            /** @var AdParameter $setParameter */
            printf(
                "Set ad parameter with resource name: '%s'.%s",
                $setParameter->getResourceName(),
                PHP_EOL
            );
        }
    }
}

SetAdParameters::main();
