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
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsException;
use Google\Ads\GoogleAds\Util\V18\ResourceNames;
use Google\Ads\GoogleAds\V18\Common\KeywordInfo;
use Google\Ads\GoogleAds\V18\Common\PolicyViolationKey;
use Google\Ads\GoogleAds\V18\Enums\AdGroupCriterionStatusEnum\AdGroupCriterionStatus;
use Google\Ads\GoogleAds\V18\Enums\KeywordMatchTypeEnum\KeywordMatchType;
use Google\Ads\GoogleAds\V18\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V18\Resources\AdGroupCriterion;
use Google\Ads\GoogleAds\V18\Services\AdGroupCriterionOperation;
use Google\Ads\GoogleAds\V18\Services\Client\AdGroupCriterionServiceClient;
use Google\Ads\GoogleAds\V18\Services\MutateAdGroupCriteriaRequest;
use Google\ApiCore\ApiException;

/**
 * This example demonstrates how to request an exemption for policy violations of a keyword.
 * Note that the example uses an exemptible policy-violating keyword by default. If you use a
 * keyword that contains non-exemptible policy violations, they will not be sent for exemption
 * request and you will still fail to create a keyword.
 * If you specify a keyword that doesn't violate any policies, this example will just add the
 * keyword as usual, similar to what the AddKeywords example does.
 *
 * Note that once you've requested policy exemption for a keyword, when you send a request for
 * adding it again, the request will pass like when you add a non-violating keyword.
 */
class HandleKeywordPolicyViolations
{
    private const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';
    private const AD_GROUP_ID = 'INSERT_AD_GROUP_ID_HERE';
    // Specify the keyword text here or the default specified below will be used.
    private const KEYWORD_TEXT = 'medication';

    public static function main()
    {
        // Either pass the required parameters for this example on the command line, or insert them
        // into the constants above.
        $options = (new ArgumentParser())->parseCommandArguments([
            ArgumentNames::CUSTOMER_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::AD_GROUP_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::KEYWORD_TEXT => GetOpt::OPTIONAL_ARGUMENT
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
                $options[ArgumentNames::AD_GROUP_ID] ?: self::AD_GROUP_ID,
                $options[ArgumentNames::KEYWORD_TEXT] ?: self::KEYWORD_TEXT
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
     * @param int $adGroupId the ad group ID to add a keyword to
     * @param string $keywordText the keyword text to add
     */
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        int $adGroupId,
        string $keywordText
    ) {
        // Configures the keyword text and match type settings.
        $keywordInfo = new KeywordInfo([
            'text' => $keywordText,
            'match_type' => KeywordMatchType::EXACT
        ]);

        // Constructs an ad group criterion using the keyword text info above.
        $adGroupCriterion = new AdGroupCriterion([
            'ad_group' => ResourceNames::forAdGroup($customerId, $adGroupId),
            'status' => AdGroupCriterionStatus::ENABLED,
            'keyword' => $keywordInfo
        ]);

        $adGroupCriterionOperation = new AdGroupCriterionOperation();
        $adGroupCriterionOperation->setCreate($adGroupCriterion);
        $adGroupCriterionServiceClient = $googleAdsClient->getAdGroupCriterionServiceClient();

        try {
            // Try sending a mutate request to add the keyword.
            $response = $adGroupCriterionServiceClient->mutateAdGroupCriteria(
                MutateAdGroupCriteriaRequest::build($customerId, [$adGroupCriterionOperation])
            );
            printf(
                "Added a keyword with resource name '%s'.%s",
                $response->getResults()[0]->getResourceName(),
                PHP_EOL
            );
        } catch (GoogleAdsException $googleAdsException) {
            // Try sending exemption requests for creating a keyword. However, if your keyword
            // contains many policy violations, but not all of them are exemptible, the request
            // will not be sent.
            $exemptPolicyViolationKeys = self::fetchExemptPolicyViolationKeys($googleAdsException);
            self::requestExemption(
                $customerId,
                $adGroupCriterionServiceClient,
                $adGroupCriterionOperation,
                $exemptPolicyViolationKeys
            );
        }
    }

    /**
     * Collects all policy violation keys that can be exempted for sending a exemption request
     * later.
     *
     * @param GoogleAdsException $googleAdsException the Google Ads exception
     * @return PolicyViolationKey[] the exemptible policy violation keys
     */
    // [START handle_keyword_policy_violations]
    private static function fetchExemptPolicyViolationKeys(GoogleAdsException $googleAdsException)
    {
        $exemptPolicyViolationKeys = [];

        printf("Google Ads failure details:%s", PHP_EOL);
        foreach ($googleAdsException->getGoogleAdsFailure()->getErrors() as $error) {
            /** @var GoogleAdsError $error */
            printf(
                "\t%s: %s%s",
                $error->getErrorCode()->getErrorCode(),
                $error->getMessage(),
                PHP_EOL
            );
            if (
                !is_null($error->getDetails())
                && !is_null($error->getDetails()->getPolicyViolationDetails())
            ) {
                $policyViolationDetails = $error->getDetails()->getPolicyViolationDetails();
                printf("\tPolicy violation details:%s", PHP_EOL);
                printf(
                    "\t\tExternal policy name: '%s'%s",
                    $policyViolationDetails->getExternalPolicyName(),
                    PHP_EOL
                );
                printf(
                    "\t\tExternal policy description: '%s'%s",
                    $policyViolationDetails->getExternalPolicyDescription(),
                    PHP_EOL
                );
                printf(
                    "\t\tIs exemptible? '%s'%s",
                    $policyViolationDetails->getIsExemptible() ? 'yes' : 'no',
                    PHP_EOL
                );

                if (
                    $policyViolationDetails->getIsExemptible() &&
                    !is_null($policyViolationDetails->getKey())
                ) {
                    $policyViolationDetailsKey = $policyViolationDetails->getKey();
                    $exemptPolicyViolationKeys[] = $policyViolationDetailsKey;
                    printf("\t\tPolicy violation key:%s", PHP_EOL);
                    printf(
                        "\t\t\tName: '%s'%s",
                        $policyViolationDetailsKey->getPolicyName(),
                        PHP_EOL
                    );
                    printf(
                        "\t\t\tViolating text: '%s'%s",
                        $policyViolationDetailsKey->getViolatingText(),
                        PHP_EOL
                    );
                } else {
                    print "No exemption request is sent because your keyword contained some "
                        . "non-exemptible policy violations." . PHP_EOL;
                    throw $googleAdsException;
                }
            } else {
                print "No exemption request is sent because there are other non-policy related "
                    . "errors thrown." . PHP_EOL;
                throw $googleAdsException;
            }
        }
        return $exemptPolicyViolationKeys;
    }
    // [END handle_keyword_policy_violations]

    /**
     * Sends exemption requests for creating a keyword.
     *
     * @param int $customerId the customer ID
     * @param AdGroupCriterionServiceClient $adGroupCriterionServiceClient the ad group criterion
     *      service API client
     * @param AdGroupCriterionOperation $adGroupCriterionOperation the ad group criterion operation
     *      to request exemption for
     * @param PolicyViolationKey[] $exemptPolicyViolationKeys the exemptible policy violation keys
     */
    // [START handle_keyword_policy_violations_1]
    private static function requestExemption(
        int $customerId,
        AdGroupCriterionServiceClient $adGroupCriterionServiceClient,
        AdGroupCriterionOperation $adGroupCriterionOperation,
        array $exemptPolicyViolationKeys
    ) {
        print "Try adding a keyword again by requesting exemption for its policy"
            . " violations." . PHP_EOL;
        $adGroupCriterionOperation->setExemptPolicyViolationKeys($exemptPolicyViolationKeys);
        $response = $adGroupCriterionServiceClient->mutateAdGroupCriteria(
            MutateAdGroupCriteriaRequest::build($customerId, [$adGroupCriterionOperation])
        );
        printf(
            "Successfully added a keyword with resource name '%s' by requesting for"
            . " policy violation exemption.%s",
            $response->getResults()[0]->getResourceName(),
            PHP_EOL
        );
    }
    // [END handle_keyword_policy_violations_1]
}

HandleKeywordPolicyViolations::main();
