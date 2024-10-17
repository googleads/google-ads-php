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
use Google\Ads\GoogleAds\Util\V18\ResourceNames;
use Google\Ads\GoogleAds\V18\Common\AgeRangeInfo;
use Google\Ads\GoogleAds\V18\Common\GenderInfo;
use Google\Ads\GoogleAds\V18\Enums\AgeRangeTypeEnum\AgeRangeType;
use Google\Ads\GoogleAds\V18\Enums\GenderTypeEnum\GenderType;
use Google\Ads\GoogleAds\V18\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V18\Resources\AdGroupCriterion;
use Google\Ads\GoogleAds\V18\Services\AdGroupCriterionOperation;
use Google\Ads\GoogleAds\V18\Services\MutateAdGroupCriteriaRequest;
use Google\ApiCore\ApiException;

/**
 * This example adds demographic target criteria to an ad group, one as positive ad group criterion
 * and one as negative ad group criterion. To create ad groups, run AddAdGroups.php.
 */
class AddDemographicTargetingCriteria
{
    private const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';
    private const AD_GROUP_ID = 'INSERT_AD_GROUP_ID_HERE';

    public static function main()
    {
        // Either pass the required parameters for this example on the command line, or insert them
        // into the constants above.
        $options = (new ArgumentParser())->parseCommandArguments([
            ArgumentNames::CUSTOMER_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::AD_GROUP_ID => GetOpt::REQUIRED_ARGUMENT
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
                $options[ArgumentNames::CUSTOMER_ID] ?: self::CUSTOMER_ID,
                $options[ArgumentNames::AD_GROUP_ID] ?: self::AD_GROUP_ID
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
     * @param int $adGroupId the ad group ID to add demographic targeting criteria to
     */
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        int $adGroupId
    ) {
        $adGroupResourceName = ResourceNames::forAdGroup($customerId, $adGroupId);

        // Creates a positive ad group criterion for gender.
        $genderAdGroupCriterion = new AdGroupCriterion([
            'ad_group' => $adGroupResourceName,
            // Targets male.
            'gender' => new GenderInfo(['type' => GenderType::MALE])
        ]);

        // Creates a negative ad group criterion for age range.
        $ageRangeNegativeAdGroupCriterion = new AdGroupCriterion([
            'ad_group' => $adGroupResourceName,
            // Makes this ad group criterion negative.
            'negative' => true,
            // Targets the age range of 18 to 24.
            'age_range' => new AgeRangeInfo(['type' => AgeRangeType::AGE_RANGE_18_24])
        ]);

        // Creates ad group criterion operations for both ad group criteria.
        $operations = [
            new AdGroupCriterionOperation(['create' => $genderAdGroupCriterion]),
            new AdGroupCriterionOperation(['create' => $ageRangeNegativeAdGroupCriterion])
        ];

        // Issues a mutate request to add the ad group criteria and print out some information.
        $adGroupCriterionServiceClient = $googleAdsClient->getAdGroupCriterionServiceClient();
        $response = $adGroupCriterionServiceClient->mutateAdGroupCriteria(
            MutateAdGroupCriteriaRequest::build($customerId, $operations)
        );
        printf(
            "Added %d demographic ad group criteria:%s",
            $response->getResults()->count(),
            PHP_EOL
        );
        foreach ($response->getResults() as $addedAdGroupCriterion) {
            /** @var AdGroupCriterion $addedAdGroupCriterion */
            print $addedAdGroupCriterion->getResourceName() . PHP_EOL;
        }
    }
}

AddDemographicTargetingCriteria::main();
