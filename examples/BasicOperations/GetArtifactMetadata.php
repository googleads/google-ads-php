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
use Google\Ads\GoogleAds\Lib\V3\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V3\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V3\GoogleAdsException;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\V3\Enums\GoogleAdsFieldCategoryEnum\GoogleAdsFieldCategory;
use Google\Ads\GoogleAds\V3\Enums\GoogleAdsFieldDataTypeEnum\GoogleAdsFieldDataType;
use Google\Ads\GoogleAds\V3\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V3\Resources\GoogleAdsField;
use Google\ApiCore\ApiException;
use Google\Protobuf\BoolValue;
use Google\Protobuf\StringValue;

/**
 * This example gets the metadata, such as whether the artifact is selectable, filterable and
 * sortable, of an artifact. The artifact can be either a resource (such as customer, campaign) or a
 * field (such as metrics.impressions, campaign.id). It'll also show the data type and artifacts
 * that are selectable with the artifact.
 */
class GetArtifactMetadata
{
    const ARTIFACT_NAME = 'INSERT_ARTIFACT_NAME_HERE';
    const PAGE_SIZE = 1000;

    public static function main()
    {
        // Either pass the required parameters for this example on the command line, or insert them
        // into the constants above.
        $options = (new ArgumentParser())->parseCommandArguments([
            ArgumentNames::ARTIFACT_NAME => GetOpt::REQUIRED_ARGUMENT
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
                $options[ArgumentNames::ARTIFACT_NAME] ?: self::ARTIFACT_NAME
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
        } catch (ApiException $apiException) {
            printf(
                "ApiException was thrown with message '%s'.%s",
                $apiException->getMessage(),
                PHP_EOL
            );
        }
    }

    /**
     * Runs the example.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $artifactName the name of artifact to get its metadata
     */
    public static function runExample(GoogleAdsClient $googleAdsClient, string $artifactName)
    {
        $googleAdsFieldServiceClient = $googleAdsClient->getGoogleAdsFieldServiceClient();
        // Searches for an artifact whose name is the same as the specified artifactName.
        $query = "SELECT name, category, selectable, filterable, sortable, selectable_with, "
            . "data_type, is_repeated WHERE name = '$artifactName'";
        $response = $googleAdsFieldServiceClient->searchGoogleAdsFields($query);

        // Iterates over all rows and prints our the metadata of the returned artifacts
        foreach ($response->iterateAllElements() as $googleAdsField) {
            /** @var GoogleAdsField $googleAdsField */
            printf(
                "An artifact named '%s' with category '%s' and data type '%s' %s selectable, %s "
                . "filterable, %s sortable and %s repeated.%s",
                $googleAdsField->getNameUnwrapped(),
                GoogleAdsFieldCategory::name($googleAdsField->getCategory()),
                GoogleAdsFieldDataType::name($googleAdsField->getDataType()),
                self::getIsOrIsNot($googleAdsField->getSelectable()),
                self::getIsOrIsNot($googleAdsField->getFilterable()),
                self::getIsOrIsNot($googleAdsField->getSortable()),
                self::getIsOrIsNot($googleAdsField->getIsRepeated()),
                PHP_EOL
            );
            if ($googleAdsField->getSelectableWith()->count() > 0) {
                $selectableArtifacts = [];
                foreach ($googleAdsField->getSelectableWith() as $wrappedSelectableArtifact) {
                    /** @var StringValue $wrappedSelectableArtifact */
                    $selectableArtifacts[] = $wrappedSelectableArtifact->getValue();
                }
                printf(
                    '%1$sThe artifact can be selected with the following artifacts:%1$s',
                    PHP_EOL
                );
                foreach ($selectableArtifacts as $selectableArtifact) {
                    print $selectableArtifact . PHP_EOL;
                }
            }
        }
    }

    /**
     * Returns 'is' when the provided boolean value is true or 'is not' when it's false.
     *
     * @param BoolValue $boolValue the boolean value
     */
    private static function getIsOrIsNot(BoolValue $boolValue)
    {
        return $boolValue->getValue() ? 'is' : 'is not';
    }
}

GetArtifactMetadata::main();
