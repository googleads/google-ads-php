<?php

/**
 * Copyright 2018 Google LLC
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

namespace Google\Ads\GoogleAds\Examples\BasicOperations;

require __DIR__ . '/../../vendor/autoload.php';

use GetOpt\GetOpt;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentNames;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentParser;
use Google\Ads\GoogleAds\Lib\V13\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V13\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V13\GoogleAdsException;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\V13\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V13\Services\GoogleAdsRow;
use Google\ApiCore\ApiException;

/** This example retrieves ad groups. */
class GetAdGroups
{
    private const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';
    // Optional: Specify a campaign ID below to restrict search to only a given campaign.
    private const CAMPAIGN_ID = null;

    private const PAGE_SIZE = 1000;

    public static function main()
    {
        // Either pass the required parameters for this example on the command line, or insert them
        // into the constants above.
        $options = (new ArgumentParser())->parseCommandArguments([
            ArgumentNames::CUSTOMER_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::CAMPAIGN_ID => GetOpt::OPTIONAL_ARGUMENT
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
     * @param int|null $campaignId the campaign ID for which ad groups will be retrieved. If `null`,
     *     returns from all campaigns
     */
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        ?int $campaignId
    ) {
        $googleAdsServiceClient = $googleAdsClient->getGoogleAdsServiceClient();
        // Creates a query that retrieves all ad groups.
        $query = 'SELECT campaign.id, ad_group.id, ad_group.name FROM ad_group';
        if ($campaignId !== null) {
            $query .= " WHERE campaign.id = $campaignId";
        }

        // Issues a search request by specifying page size.
        $response =
            $googleAdsServiceClient->search($customerId, $query, ['pageSize' => self::PAGE_SIZE]);

        // Iterates over all rows in all pages and prints the requested field values for
        // the ad group in each row.
        foreach ($response->iterateAllElements() as $googleAdsRow) {
            /** @var GoogleAdsRow $googleAdsRow */
            printf(
                "Ad group with ID %d and name '%s' was found in campaign with ID %d.%s",
                $googleAdsRow->getAdGroup()->getId(),
                $googleAdsRow->getAdGroup()->getName(),
                $googleAdsRow->getCampaign()->getId(),
                PHP_EOL
            );
        }
    }
}

GetAdGroups::main();
