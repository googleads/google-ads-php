<?php

/**
 * Copyright 2022 Google LLC
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
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsException;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\V18\Enums\GoogleAdsFieldCategoryEnum\GoogleAdsFieldCategory;
use Google\Ads\GoogleAds\V18\Enums\GoogleAdsFieldDataTypeEnum\GoogleAdsFieldDataType;
use Google\Ads\GoogleAds\V18\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V18\Resources\GoogleAdsField;
use Google\Ads\GoogleAds\V18\Services\SearchGoogleAdsFieldsRequest;
use Google\ApiCore\ApiException;

/**
 * Searches for GoogleAdsFields that match a given prefix, retrieving metadata such as
 * whether the field is selectable, filterable, or sortable, along with the data type and the fields
 * that are selectable with the field. Each GoogleAdsField represents either a resource (such as
 * customer, campaign) or a field (such as metrics.impressions, campaign.id).
 */
class SearchForGoogleAdsFields
{
    private const NAME_PREFIX = 'INSERT_NAME_PREFIX_HERE';

    public static function main()
    {
        // Either pass the required parameters for this example on the command line, or insert them
        // into the constants above.
        $options = (new ArgumentParser())->parseCommandArguments([
            ArgumentNames::NAME_PREFIX => GetOpt::REQUIRED_ARGUMENT
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
                $options[ArgumentNames::NAME_PREFIX] ?: self::NAME_PREFIX
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
     * @param string $namePrefix the name prefix to use in the query
     */
    public static function runExample(GoogleAdsClient $googleAdsClient, string $namePrefix)
    {
        $googleAdsFieldServiceClient = $googleAdsClient->getGoogleAdsFieldServiceClient();
        // Searches for all fields whose name begins with the specified namePrefix.
        // A single "%" is the wildcard token in the Google Ads Query language.
        $query = "SELECT name, category, selectable, filterable, sortable, selectable_with, "
            . "data_type, is_repeated WHERE name LIKE '$namePrefix%'";
        $response = $googleAdsFieldServiceClient->searchGoogleAdsFields(
            SearchGoogleAdsFieldsRequest::build($query)
        );

        if (iterator_count($response->getIterator()) === 0) {
            printf(
                "No GoogleAdsFields found with a name that begins with %s.%s",
                $namePrefix,
                PHP_EOL
            );
            return;
        }
        // Iterates over all rows and prints our the metadata of each matching GoogleAdsField.
        foreach ($response->iterateAllElements() as $googleAdsField) {
            /** @var GoogleAdsField $googleAdsField */
            printf("%s:%s", $googleAdsField->getName(), PHP_EOL);
            printf(
                "  %-16s: %s%s",
                "category:",
                GoogleAdsFieldCategory::name($googleAdsField->getCategory()),
                PHP_EOL
            );
            printf(
                "  %-16s: %s%s",
                "data type:",
                GoogleAdsFieldDataType::name($googleAdsField->getDataType()),
                PHP_EOL
            );
            printf(
                "  %-16s: %s%s",
                "selectable:",
                $googleAdsField->getSelectable() ? 'true' : 'false',
                PHP_EOL
            );
            printf(
                "  %-16s: %s%s",
                "filterable:",
                $googleAdsField->getFilterable() ? 'true' : 'false',
                PHP_EOL
            );
            printf(
                "  %-16s: %s%s",
                "sortable:",
                $googleAdsField->getSortable() ? 'true' : 'false',
                PHP_EOL
            );
            printf(
                "  %-16s: %s%s",
                "repeated:",
                $googleAdsField->getIsRepeated() ? 'true' : 'false',
                PHP_EOL
            );

            if ($googleAdsField->getSelectableWith()->count() > 0) {
                // Prints the list of fields that are selectable with the field.
                $selectableWithFields =
                    iterator_to_array($googleAdsField->getSelectableWith()->getIterator());
                // Sorts and then prints the list.
                sort($selectableWithFields);
                print '  selectable with:' . PHP_EOL;
                foreach ($selectableWithFields as $selectableWithField) {
                    /** @var string $selectableWithField */
                    printf("    $selectableWithField%s", PHP_EOL);
                }
            }
        }
    }
}

SearchForGoogleAdsFields::main();
