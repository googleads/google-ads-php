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
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsException;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\Util\V18\GoogleAdsErrors;
use Google\Ads\GoogleAds\Util\V18\PartialFailures;
use Google\Ads\GoogleAds\Util\V18\ResourceNames;
use Google\Ads\GoogleAds\V18\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V18\Resources\AdGroup;
use Google\Ads\GoogleAds\V18\Services\AdGroupOperation;
use Google\Ads\GoogleAds\V18\Services\MutateAdGroupsRequest;
use Google\Ads\GoogleAds\V18\Services\MutateAdGroupsResponse;
use Google\ApiCore\ApiException;

/**
 * Shows how to handle partial failures. There are several ways of detecting partial failures. This
 * highlights the top main detection options: empty results and error instances.
 *
 * <p>Access to the detailed error (<code>GoogleAdsFailure</code>) for each error is via a Any
 * proto. Deserializing these to retrieve the error details is may not be immediately obvious at
 * first, this example shows how to convert Any into <code>GoogleAdsFailure</code>.
 *
 * <p>Additionally, this example shows how to produce an error message for a specific failed
 * operation by looking up the failure details in the <code>GoogleAdsFailure</code> object.
 */
class HandlePartialFailure
{
    private const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';
    private const CAMPAIGN_ID = 'INSERT_CAMPAIGN_ID_HERE';

    public static function main()
    {
        // Either pass the required parameters for this example on the command line, or insert them
        // into the constants above.
        $options = (new ArgumentParser())->parseCommandArguments([
            ArgumentNames::CUSTOMER_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::CAMPAIGN_ID => GetOpt::REQUIRED_ARGUMENT
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
                $options[ArgumentNames::CAMPAIGN_ID] ?: self::CAMPAIGN_ID
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
     * @param int $campaignId a campaign ID
     */
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        int $campaignId
    ) {
        $response = self::createAdGroups($googleAdsClient, $customerId, $campaignId);
        self::checkIfPartialFailureErrorExists($response);
        self::printResults($response);
    }

    /**
     * Create ad groups by enabling partial failure mode.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param int $campaignId a campaign ID
     * @return MutateAdGroupsResponse
     */
    // [START handle_partial_failure]
    private static function createAdGroups(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        int $campaignId
    ) {
        $campaignResourceName = ResourceNames::forCampaign($customerId, $campaignId);

        // This ad group should be created successfully - assuming the campaign in the params
        // exists.
        $adGroup1 = new AdGroup([
            'name' => 'Valid AdGroup #' . Helper::getPrintableDatetime(),
            'campaign' => $campaignResourceName
        ]);

        // This ad group will always fail - campaign ID 0 in the resource name is never valid.
        $adGroup2 = new AdGroup([
            'name' => 'Broken AdGroup #' . Helper::getPrintableDatetime(),
            'campaign' => ResourceNames::forCampaign($customerId, 0)
        ]);

        // This ad group will always fail - duplicate ad group names are not allowed.
        $adGroup3 = new AdGroup([
            'name' => $adGroup1->getName(),
            'campaign' => $campaignResourceName
        ]);

        $operations = [];

        $adGroupOperation1 = new AdGroupOperation();
        $adGroupOperation1->setCreate($adGroup1);
        $operations[] = $adGroupOperation1;

        $adGroupOperation2 = new AdGroupOperation();
        $adGroupOperation2->setCreate($adGroup2);
        $operations[] = $adGroupOperation2;

        $adGroupOperation3 = new AdGroupOperation();
        $adGroupOperation3->setCreate($adGroup3);
        $operations[] = $adGroupOperation3;

        // Issues the mutate request, enabling partial failure mode.
        $adGroupServiceClient = $googleAdsClient->getAdGroupServiceClient();
        return $adGroupServiceClient->mutateAdGroups(
            MutateAdGroupsRequest::build($customerId, $operations)->setPartialFailure(true)
        );
    }
    // [END handle_partial_failure]

    /**
     * Check if there exists partial failure error in the given mutate ad group response.
     *
     * @param MutateAdGroupsResponse $response the mutate ad group response
     */
    // [START handle_partial_failure_1]
    private static function checkIfPartialFailureErrorExists(MutateAdGroupsResponse $response)
    {
        if ($response->hasPartialFailureError()) {
            printf("Partial failures occurred. Details will be shown below.%s", PHP_EOL);
        } else {
            printf(
                "All operations completed successfully. No partial failures to show.%s",
                PHP_EOL
            );
        }
    }
    // [END handle_partial_failure_1]

    /**
     * Print results of the given mutate ad group response. For those that are partial failure,
     * print all their errors with corresponding operation indices. For those that succeeded, print
     * the resource names of created ad groups.
     *
     * @param MutateAdGroupsResponse $response the mutate ad group response
     */
    // [START handle_partial_failure_2]
    private static function printResults(MutateAdGroupsResponse $response)
    {
        // Finds the failed operations by looping through the results.
        $operationIndex = 0;
        foreach ($response->getResults() as $result) {
            /** @var AdGroup $result */
            if (PartialFailures::isPartialFailure($result)) {
                $errors = GoogleAdsErrors::fromStatus(
                    $operationIndex,
                    $response->getPartialFailureError()
                );
                foreach ($errors as $error) {
                    printf(
                        "Operation %d failed with error: %s%s",
                        $operationIndex,
                        $error->getMessage(),
                        PHP_EOL
                    );
                }
            } else {
                printf(
                    "Operation %d succeeded: ad group with resource name '%s'.%s",
                    $operationIndex,
                    $result->getResourceName(),
                    PHP_EOL
                );
            }
            $operationIndex++;
        }
    }
    // [END handle_partial_failure_2]
}

HandlePartialFailure::main();
