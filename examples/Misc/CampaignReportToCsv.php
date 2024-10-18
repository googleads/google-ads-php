<?php

/**
 * Copyright 2021 Google LLC
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

namespace Google\Ads\GoogleAds\Examples\Misc;

require __DIR__ . '/../../vendor/autoload.php';

use GetOpt\GetOpt;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentNames;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentParser;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsException;
use Google\Ads\GoogleAds\V18\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V18\Services\GoogleAdsRow;
use Google\Ads\GoogleAds\V18\Services\SearchGoogleAdsRequest;
use Google\ApiCore\ApiException;

/**
 * This code example illustrates how to get metrics about a campaign and serialize the result as a
 * CSV file.
 */
class CampaignReportToCsv
{
    private const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';
    // Optional: You may pass the output file path on the command line or specify it here. If
    // neither are set a null value will be passed to the runExample() method and the default
    // path will be used: `CampaignReportToCsv.csv` file in the folder where the script is located.
    private const OUTPUT_FILE_PATH = null;

    public static function main()
    {
        // Either pass the required parameters for this example on the command line, or insert them
        // into the constants above.
        $options = (new ArgumentParser())->parseCommandArguments([
            ArgumentNames::CUSTOMER_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::OUTPUT_FILE_PATH => GetOpt::OPTIONAL_ARGUMENT
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
                $options[ArgumentNames::OUTPUT_FILE_PATH] ?: self::OUTPUT_FILE_PATH
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
     * @param string|null $outputFilePath the path of the file to write the CSV content to
     */
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        ?string $outputFilePath
    ) {
        $googleAdsServiceClient = $googleAdsClient->getGoogleAdsServiceClient();
        // Creates a query that retrieves campaigns.
        $query =
            "SELECT campaign.id, "
                . "campaign.name, "
                . "segments.date, "
                . "metrics.impressions, "
                . "metrics.clicks, "
                . "metrics.cost_micros "
            . "FROM campaign "
            . "WHERE segments.date DURING LAST_7_DAYS "
                . "AND campaign.status = 'ENABLED' "
            . "ORDER BY segments.date DESC";

        // Issues a search request.
        $response =
            $googleAdsServiceClient->search(SearchGoogleAdsRequest::build($customerId, $query));

        // Iterates over all rows in all pages and extracts the information.
        $csvRows = [];
        foreach ($response->iterateAllElements() as $googleAdsRow) {
            /** @var GoogleAdsRow $googleAdsRow */
            $csvRows[] = [
                'campaign.id' => $googleAdsRow->getCampaign()->getId(),
                'campaign.name' => $googleAdsRow->getCampaign()->getName(),
                'segments.date' => $googleAdsRow->getSegments()->getDate(),
                'metrics.impressions' => $googleAdsRow->getMetrics()->getImpressions(),
                'metrics.clicks' => $googleAdsRow->getMetrics()->getClicks(),
                'metrics.cost_micros' => $googleAdsRow->getMetrics()->getCostMicros()
            ];
        }

        if (empty($csvRows)) {
            print "No results found.";
            return;
        }

        // Uses default output file path when not set.
        if (is_null($outputFilePath)) {
            $outputFilePath = str_replace('.php', '.csv', __FILE__);
        }

        // Writes the results to the CSV file.
        $outputFile = fopen($outputFilePath, 'w');
        // Uses the keys of the first result row as a header row.
        fputcsv($outputFile, array_keys($csvRows[0]));
        foreach ($csvRows as $csvRow) {
            fputcsv($outputFile, array_values($csvRow));
        }
        fclose($outputFile);

        printf('Successfully created %s with %d entries', $outputFilePath, count($csvRows));
    }
}

CampaignReportToCsv::main();
