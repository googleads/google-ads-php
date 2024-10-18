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

namespace Google\Ads\GoogleAds\Examples\ErrorHandling;

require __DIR__ . '/../../vendor/autoload.php';

use GetOpt\GetOpt;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentNames;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentParser;
use Google\Ads\GoogleAds\Examples\Utils\Helper;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsException;
use Google\Ads\GoogleAds\Util\V18\ResourceNames;
use Google\Ads\GoogleAds\V18\Common\AdTextAsset;
use Google\Ads\GoogleAds\V18\Common\PolicyTopicEntry;
use Google\Ads\GoogleAds\V18\Common\PolicyValidationParameter;
use Google\Ads\GoogleAds\V18\Common\ResponsiveSearchAdInfo;
use Google\Ads\GoogleAds\V18\Enums\AdGroupAdStatusEnum\AdGroupAdStatus;
use Google\Ads\GoogleAds\V18\Enums\PolicyTopicEntryTypeEnum\PolicyTopicEntryType;
use Google\Ads\GoogleAds\V18\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V18\Resources\Ad;
use Google\Ads\GoogleAds\V18\Resources\AdGroupAd;
use Google\Ads\GoogleAds\V18\Services\AdGroupAdOperation;
use Google\Ads\GoogleAds\V18\Services\Client\AdGroupAdServiceClient;
use Google\Ads\GoogleAds\V18\Services\MutateAdGroupAdsRequest;
use Google\ApiCore\ApiException;

/**
 * This example demonstrates how to request an exemption for policy violations of a responsive
 * search ad. If the request somehow fails with exceptions that are not policy finding errors, the
 * example will stop instead of trying sending an exemption request.
 */
class HandleResponsiveSearchAdPolicyViolations
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
     * @param int $customerId the customer ID
     * @param int $adGroupId the ad group ID to add a responsive search ad to
     */
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        int $adGroupId
    ) {
        // Creates a responsive search ad info object.
        $responsiveSearchAdInfo = new ResponsiveSearchAdInfo([
            'headlines' => [
                new AdTextAsset([
                    'text' => 'Cruise to Mars #' . Helper::getShortPrintableDatetime()
                ]),
                new AdTextAsset(['text' => 'Best Space Cruise Line']),
                new AdTextAsset(['text' => 'Experience the Stars'])
            ],
            // Intentionally use an ad text that violates policy -- having too many exclamation
            // marks.
            'descriptions' => [
                new AdTextAsset(['text' => 'Buy your tickets now!!!!!!!']),
                new AdTextAsset(['text' => 'Visit the Red Planet'])
            ]
        ]);

        // Creates an ad group ad to hold the above ad.
        $adGroupAd = new AdGroupAd([
            'ad_group' => ResourceNames::forAdGroup($customerId, $adGroupId),
            // Set the ad group ad to PAUSED to prevent it from immediately serving.
            // Set to ENABLED once you've added targeting and the ad are ready to serve.
            'status' => AdGroupAdStatus::PAUSED,
            // Sets the responsive search ad info on an Ad.
            'ad' => new Ad([
                'responsive_search_ad' => $responsiveSearchAdInfo,
                'final_urls' => ['https://www.example.com']
            ])
        ]);

        // Creates an ad group ad operation.
        $adGroupAdOperation = new AdGroupAdOperation();
        $adGroupAdOperation->setCreate($adGroupAd);
        $adGroupAdServiceClient = $googleAdsClient->getAdGroupAdServiceClient();

        $ignorablePolicyTopics = [];
        try {
            // Try sending a mutate request to add the ad group ad.
            $adGroupAdServiceClient->mutateAdGroupAds(
                MutateAdGroupAdsRequest::build($customerId, [$adGroupAdOperation])
            );
        } catch (GoogleAdsException $googleAdsException) {
            // The request will always fail because of the policy violation in the description of
            // the ad.
            $ignorablePolicyTopics = self::fetchIgnorablePolicyTopics($googleAdsException);
        }

        // Try sending exemption requests for creating a responsive search ad.
        self::requestExemption(
            $customerId,
            $adGroupAdServiceClient,
            $adGroupAdOperation,
            $ignorablePolicyTopics
        );
    }

    /**
     * Collects all ignorable policy topics that will be sent for exemption request later.
     *
     * @param GoogleAdsException $googleAdsException the Google Ads exception
     * @return string[] the ignorable policy topics
     */
    // [START handle_responsive_search_ad_policy_violations]
    private static function fetchIgnorablePolicyTopics(GoogleAdsException $googleAdsException)
    {
        $ignorablePolicyTopics = [];

        printf("Google Ads failure details:%s", PHP_EOL);
        foreach ($googleAdsException->getGoogleAdsFailure()->getErrors() as $error) {
            /** @var GoogleAdsError $error */
            if ($error->getErrorCode()->getErrorCode() !== 'policy_finding_error') {
                // This example supports sending exemption request for the policy finding error
                // only.
                throw $googleAdsException;
            }

            printf(
                "\t%s: %s%s",
                $error->getErrorCode()->getErrorCode(),
                $error->getMessage(),
                PHP_EOL
            );
            if (
                !is_null($error->getDetails())
                && !is_null($error->getDetails()->getPolicyFindingDetails())
            ) {
                $policyFindingDetails = $error->getDetails()->getPolicyFindingDetails();
                printf("\tPolicy finding details:%s", PHP_EOL);

                foreach ($policyFindingDetails->getPolicyTopicEntries() as $policyTopicEntry) {
                    /** @var PolicyTopicEntry $policyTopicEntry */
                    $ignorablePolicyTopics[] = $policyTopicEntry->getTopic();
                    printf(
                        "\t\tPolicy topic name: '%s'%s",
                        $policyTopicEntry->getTopic(),
                        PHP_EOL
                    );
                    printf(
                        "\t\tPolicy topic entry type: '%s'%s",
                        PolicyTopicEntryType::name($policyTopicEntry->getType()),
                        PHP_EOL
                    );
                    // For the sake of brevity, we exclude printing "policy topic evidences" and
                    // "policy topic constraints" here. You can fetch those data by calling:
                    // - $policyTopicEntry->getEvidences()
                    // - $policyTopicEntry->getConstraints()
                }
            }
        }
        return $ignorablePolicyTopics;
    }
    // [END handle_responsive_search_ad_policy_violations]

    /**
     * Sends exemption requests for creating a responsive search ad.
     *
     * @param int $customerId
     * @param AdGroupAdServiceClient $adGroupAdServiceClient
     * @param AdGroupAdOperation $adGroupAdOperation
     * @param string[] $ignorablePolicyTopics
     */
    // [START handle_responsive_search_ad_policy_violations_1]
    private static function requestExemption(
        int $customerId,
        AdGroupAdServiceClient $adGroupAdServiceClient,
        AdGroupAdOperation $adGroupAdOperation,
        array $ignorablePolicyTopics
    ) {
        print "Try adding a responsive search ad again by requesting exemption for its policy"
            . " violations." . PHP_EOL;
        $adGroupAdOperation->setPolicyValidationParameter(
            new PolicyValidationParameter(['ignorable_policy_topics' => $ignorablePolicyTopics])
        );
        $response = $adGroupAdServiceClient->mutateAdGroupAds(MutateAdGroupAdsRequest::build(
            $customerId,
            [$adGroupAdOperation]
        ));
        printf(
            "Successfully added a responsive search ad with resource name '%s' by requesting"
            . " for policy violation exemption.%s",
            $response->getResults()[0]->getResourceName(),
            PHP_EOL
        );
    }
    // [END handle_responsive_search_ad_policy_violations_1]
}

HandleResponsiveSearchAdPolicyViolations::main();
