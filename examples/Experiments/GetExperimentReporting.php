<?php

/**
 * Copyright 2026 Google LLC
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
 *
 * @category GoogleAds
 * @package  Google\Ads\GoogleAds\Examples\Experiments
 * @author   Google Ads API Team <googleads-api@googlegroups.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache License, Version 2.0
 * @link     https://github.com/googleads/google-ads-php
 */

namespace Google\Ads\GoogleAds\Examples\Experiments;

require __DIR__ . '/../../vendor/autoload.php';

use GetOpt\GetOpt;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentNames;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentParser;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\Lib\V24\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V24\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V24\GoogleAdsException;
use Google\Ads\GoogleAds\V24\Services\SearchGoogleAdsRequest;
use Google\ApiCore\ApiException;

/**
 * This example retrieves performance metrics for experiments and experiment arms.
 *
 * @category GoogleAds
 * @package  Google\Ads\GoogleAds\Examples\Experiments
 * @author   Google Ads API Team <googleads-api@googlegroups.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache License, Version 2.0
 * @link     https://github.com/googleads/google-ads-php
 */
class GetExperimentReporting
{
    private const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';
    private const EXPERIMENT_ID = 'INSERT_EXPERIMENT_ID_OPTIONAL_HERE';

    /**
     * Main entry point for running this example from the CLI or browser.
     *
     * @return void
     */
    public static function main()
    {
        $options = (new ArgumentParser())->parseCommandArguments(
            [
                ArgumentNames::CUSTOMER_ID => GetOpt::REQUIRED_ARGUMENT,
                'experimentId' => GetOpt::OPTIONAL_ARGUMENT
            ]
        );

        $customerId = $options[ArgumentNames::CUSTOMER_ID]
            ?: self::CUSTOMER_ID;
        
        $experimentId = isset($options['experimentId'])
            ? $options['experimentId']
            : self::EXPERIMENT_ID;

        $googleAdsClient = (new GoogleAdsClientBuilder())
            ->fromFile()
            ->withOAuth2Credential(
                (new OAuth2TokenBuilder())->fromFile()->build()
            )
            ->build();

        try {
            self::runExample(
                $googleAdsClient,
                (int)$customerId,
                $experimentId !== 'INSERT_EXPERIMENT_ID_OPTIONAL_HERE'
                    ? (int)$experimentId
                    : null
            );
        } catch (GoogleAdsException $googleAdsException) {
            printf(
                "Request with ID '%s' failed with status '%s' and includes "
                . "errors:%s",
                $googleAdsException->getRequestId(),
                $googleAdsException->getStatus(),
                PHP_EOL
            );
            foreach (
                $googleAdsException->getGoogleAdsFailure()->getErrors()
                as $error
            ) {
                printf(
                    "\tError with message \"%s\".%s",
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
     * @param int             $customerId      the customer ID
     * @param int|null        $experimentId    optional experiment ID filter
     *
     * @return void
     */
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        ?int $experimentId
    ) {
        $googleAdsServiceClient
            = $googleAdsClient->getGoogleAdsServiceClient();

        $query = 'SELECT '
            . 'experiment.id, '
            . 'experiment.name, '
            . 'experiment.type, '
            . 'experiment.status, '
            . 'experiment_arm.name, '
            . 'experiment_arm.control, '
            . 'metrics.clicks, '
            . 'metrics.impressions, '
            . 'metrics.cost_micros, '
            . 'metrics.conversions, '
            . 'metrics.ctr '
            . 'FROM experiment_arm ';

        if ($experimentId !== null) {
            $query .= sprintf('WHERE experiment.id = %d ', $experimentId);
        }

        $query .= 'ORDER BY experiment.id ASC';

        $request = SearchGoogleAdsRequest::build($customerId, $query);
        $stream = $googleAdsServiceClient->search($request);

        foreach ($stream->iterateAllElements() as $googleAdsRow) {
            $experiment = $googleAdsRow->getExperiment();
            $arm = $googleAdsRow->getExperimentArm();
            $metrics = $googleAdsRow->getMetrics();

            printf(
                "Experiment ID %d ('%s', Status: '%s', Type: '%s') | "
                . "Arm '%s' (Control: %s):%s"
                . "  Clicks: %d | Impressions: %d | Cost (micros): %d | "
                . "Conversions: %.2f | CTR: %.2f%%%s",
                $experiment->getId(),
                $experiment->getName(),
                $experiment->getStatus(),
                $experiment->getType(),
                $arm->getName(),
                $arm->getControl() ? 'true' : 'false',
                PHP_EOL,
                $metrics->getClicks(),
                $metrics->getImpressions(),
                $metrics->getCostMicros(),
                $metrics->getConversions(),
                $metrics->getCtr() * 100,
                PHP_EOL
            );
        }
    }
}

GetExperimentReporting::main();