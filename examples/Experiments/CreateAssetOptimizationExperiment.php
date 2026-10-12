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
 */

namespace Google\Ads\GoogleAds\Examples\Experiments;

require __DIR__ . '/../../vendor/autoload.php';

use GetOpt\GetOpt;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentNames;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentParser;
use Google\Ads\GoogleAds\Examples\Utils\Helper;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\Lib\V25\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V25\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V25\GoogleAdsException;
use Google\Ads\GoogleAds\Util\V25\ResourceNames;
use Google\Ads\GoogleAds\V25\Common\ImageAsset;
use Google\Ads\GoogleAds\V25\Common\OptimizeAssetsExperimentInfo;
use Google\Ads\GoogleAds\V25\Common\TextAsset;
use Google\Ads\GoogleAds\V25\Enums\AssetFieldTypeEnum\AssetFieldType;
use Google\Ads\GoogleAds\V25\Enums\AssetTypeEnum\AssetType;
use Google\Ads\GoogleAds\V25\Enums\ExperimentTypeEnum\ExperimentType;
use Google\Ads\GoogleAds\V25\Enums\OptimizeAssetsExperimentSubtypeEnum\OptimizeAssetsExperimentSubtype;
use Google\Ads\GoogleAds\V25\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V25\Resources\Asset;
use Google\Ads\GoogleAds\V25\Resources\AssetGroupAsset;
use Google\Ads\GoogleAds\V25\Resources\Experiment;
use Google\Ads\GoogleAds\V25\Resources\ExperimentArm;
use Google\Ads\GoogleAds\V25\Resources\ExperimentArm\AssetGroupAssetInfo;
use Google\Ads\GoogleAds\V25\Resources\ExperimentArm\AssetGroupInfo;
use Google\Ads\GoogleAds\V25\Services\AssetGroupAssetOperation;
use Google\Ads\GoogleAds\V25\Services\AssetOperation;
use Google\Ads\GoogleAds\V25\Services\ExperimentArmOperation;
use Google\Ads\GoogleAds\V25\Services\ExperimentOperation;
use Google\Ads\GoogleAds\V25\Services\GoogleAdsRow;
use Google\Ads\GoogleAds\V25\Services\MutateGoogleAdsRequest;
use Google\Ads\GoogleAds\V25\Services\MutateOperation;
use Google\Ads\GoogleAds\V25\Services\SearchGoogleAdsRequest;
use Google\ApiCore\ApiException;

/**
 * Creates an OPTIMIZE_ASSETS experiment.
 *
 * Asset optimization experiments are used to test different asset combinations
 * within Performance Max campaigns.
 */
class CreateAssetOptimizationExperiment
{
    private const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';
    private const ASSET_GROUP_ID = 'INSERT_ASSET_GROUP_ID_HERE';

    // Temp IDs
    private const ASSET_1_TEMP_ID = -1;
    private const EXPERIMENT_TEMP_ID = -2;
    private const ASSET_2_TEMP_ID = -3;

    public static function main()
    {
        // Either pass the required parameters for this example on the command line, or insert them
        // into the constants above.
        $options = (new ArgumentParser())->parseCommandArguments([
            ArgumentNames::CUSTOMER_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::ASSET_GROUP_ID => GetOpt::REQUIRED_ARGUMENT
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
                $options[ArgumentNames::ASSET_GROUP_ID] ?: self::ASSET_GROUP_ID
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
     * @param int $assetGroupId the base asset group ID to run the experiment on
     */
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        int $assetGroupId
    ) {
        $googleAdsServiceClient = $googleAdsClient->getGoogleAdsServiceClient();

        // Query the asset group to find the associated campaign resource name.
        $query = sprintf(
            'SELECT asset_group.campaign FROM asset_group WHERE asset_group.id = %d',
            $assetGroupId
        );
        $searchResponse = $googleAdsServiceClient->search(
            SearchGoogleAdsRequest::build($customerId, $query)
        );

        $campaignResourceName = null;
        foreach ($searchResponse->iterateAllElements() as $googleAdsRow) {
            /** @var GoogleAdsRow $googleAdsRow */
            $campaignResourceName = $googleAdsRow->getAssetGroup()->getCampaign();
            break;
        }

        if (is_null($campaignResourceName)) {
            printf("Asset group with ID %d not found.%s", $assetGroupId, PHP_EOL);
            exit(1);
        }

        // [START create_asset_optimization_experiment_1]
        // 1. Create Assets with temporary resource names.
        // We create a text asset and an image asset to showcase different types.
        $assetOperation1 = self::createTextAssetOperation(
            $customerId,
            self::ASSET_1_TEMP_ID,
            'Fly to Mars!'
        );
        $assetOperation2 = self::createImageAssetOperation(
            $customerId,
            self::ASSET_2_TEMP_ID,
            'https://gaagl.page.link/Eit5',
            'Mars Landscape View'
        );

        // 2. Create an Experiment with a temporary resource name.
        $experimentOperation = new MutateOperation([
            'experiment_operation' => new ExperimentOperation([
                'create' => new Experiment([
                    'resource_name' => ResourceNames::forExperiment(
                        $customerId,
                        self::EXPERIMENT_TEMP_ID
                    ),
                    'name' => 'Interstellar Asset Experiment #' . Helper::getPrintableDatetime(),
                    'type' => ExperimentType::OPTIMIZE_ASSETS,
                    // Set the optimize assets experiment subtype to COMPARE_ASSETS.
                    'optimize_assets_experiment' => new OptimizeAssetsExperimentInfo([
                        'optimize_assets_experiment_subtype' =>
                            OptimizeAssetsExperimentSubtype::COMPARE_ASSETS
                    ])
                ])
            ])
        ]);

        // 3. Create two ExperimentArm resources.
        $treatmentAssets = [
            [self::ASSET_1_TEMP_ID, AssetFieldType::HEADLINE],
            [self::ASSET_2_TEMP_ID, AssetFieldType::MARKETING_IMAGE],
        ];
        $armOperations = self::createArmsOperations(
            $customerId,
            self::EXPERIMENT_TEMP_ID,
            $campaignResourceName,
            $assetGroupId,
            $treatmentAssets
        );

        // 4. Create AssetGroupAssets linking the assets to the asset group.
        $assetGroupAssetOperation1 = self::createAssetGroupAssetOperation(
            $customerId,
            $assetGroupId,
            self::ASSET_1_TEMP_ID,
            AssetFieldType::HEADLINE
        );
        $assetGroupAssetOperation2 = self::createAssetGroupAssetOperation(
            $customerId,
            $assetGroupId,
            self::ASSET_2_TEMP_ID,
            AssetFieldType::MARKETING_IMAGE
        );

        // Send all operations in a single Mutate request.
        // The operations must be in this specific order.
        $mutateOperations = array_merge(
            [
                $assetOperation1,
                $assetOperation2,
                $experimentOperation,
            ],
            $armOperations,
            [
                $assetGroupAssetOperation1,
                $assetGroupAssetOperation2,
            ]
        );

        $response = $googleAdsServiceClient->mutate(
            MutateGoogleAdsRequest::build($customerId, $mutateOperations)
        );
        // [END create_asset_optimization_experiment_1]

        // Print the results.
        $mutateOperationResponses = $response->getMutateOperationResponses();
        printf(
            "Created headline asset: %s%s",
            $mutateOperationResponses[0]->getAssetResult()->getResourceName(),
            PHP_EOL
        );
        printf(
            "Created image asset: %s%s",
            $mutateOperationResponses[1]->getAssetResult()->getResourceName(),
            PHP_EOL
        );
        printf(
            "Created experiment: %s%s",
            $mutateOperationResponses[2]->getExperimentResult()->getResourceName(),
            PHP_EOL
        );
        printf(
            "Created control arm: %s%s",
            $mutateOperationResponses[3]->getExperimentArmResult()->getResourceName(),
            PHP_EOL
        );
        printf(
            "Created treatment arm: %s%s",
            $mutateOperationResponses[4]->getExperimentArmResult()->getResourceName(),
            PHP_EOL
        );
        printf(
            "Created asset group asset for headline: %s%s",
            $mutateOperationResponses[5]->getAssetGroupAssetResult()->getResourceName(),
            PHP_EOL
        );
        printf(
            "Created asset group asset for image: %s%s",
            $mutateOperationResponses[6]->getAssetGroupAssetResult()->getResourceName(),
            PHP_EOL
        );
    }

    /**
     * Creates a mutate operation for a text asset.
     *
     * @param int $customerId the customer ID
     * @param int $tempId the temporary ID for the asset
     * @param string $text the text of the asset
     * @return MutateOperation the mutate operation that creates a text asset
     */
    private static function createTextAssetOperation(
        int $customerId,
        int $tempId,
        string $text
    ): MutateOperation {
        return new MutateOperation([
            'asset_operation' => new AssetOperation([
                'create' => new Asset([
                    'resource_name' => ResourceNames::forAsset($customerId, $tempId),
                    'text_asset' => new TextAsset(['text' => $text])
                ])
            ])
        ]);
    }

    /**
     * Creates a mutate operation for an image asset.
     *
     * @param int $customerId the customer ID
     * @param int $tempId the temporary ID for the asset
     * @param string $url the URL of the image
     * @param string $name the name of the asset
     * @return MutateOperation the mutate operation that creates an image asset
     */
    private static function createImageAssetOperation(
        int $customerId,
        int $tempId,
        string $url,
        string $name
    ): MutateOperation {
        return new MutateOperation([
            'asset_operation' => new AssetOperation([
                'create' => new Asset([
                    'resource_name' => ResourceNames::forAsset($customerId, $tempId),
                    'name' => $name,
                    'type' => AssetType::IMAGE,
                    'image_asset' => new ImageAsset(['data' => file_get_contents($url)])
                ])
            ])
        ]);
    }

    /**
     * Creates mutate operations for control and treatment arms.
     *
     * @param int $customerId the customer ID
     * @param int $experimentTempId the temporary ID for the experiment
     * @param string $campaignResourceName the campaign resource name
     * @param int $assetGroupId the asset group ID
     * @param array[] $treatmentAssets a list of [assetTempId, fieldType] pairs for the treatment
     *     arm
     * @return MutateOperation[] the mutate operations that create control and treatment arms
     */
    private static function createArmsOperations(
        int $customerId,
        int $experimentTempId,
        string $campaignResourceName,
        int $assetGroupId,
        array $treatmentAssets
    ): array {
        $operations = [];

        // Control arm
        $controlOperation = new MutateOperation([
            'experiment_arm_operation' => new ExperimentArmOperation([
                'create' => new ExperimentArm([
                    'experiment' => ResourceNames::forExperiment($customerId, $experimentTempId),
                    'name' => 'Base Assets (Control)',
                    'control' => true,
                    'traffic_split' => 50,
                    'campaigns' => [$campaignResourceName],
                    'asset_groups' => [
                        new AssetGroupInfo([
                            'asset_group' => ResourceNames::forAssetGroup(
                                $customerId,
                                $assetGroupId
                            )
                        ])
                    ]
                ])
            ])
        ]);
        $operations[] = $controlOperation;

        // Treatment arm
        $assetGroupAssets = [];
        foreach ($treatmentAssets as [$assetTempId, $fieldType]) {
            $assetGroupAssets[] = new AssetGroupAssetInfo([
                'asset' => ResourceNames::forAsset($customerId, $assetTempId),
                'field_type' => $fieldType
            ]);
        }

        $treatmentOperation = new MutateOperation([
            'experiment_arm_operation' => new ExperimentArmOperation([
                'create' => new ExperimentArm([
                    'experiment' => ResourceNames::forExperiment($customerId, $experimentTempId),
                    'name' => 'New Assets (Treatment)',
                    'control' => false,
                    'traffic_split' => 50,
                    'campaigns' => [$campaignResourceName],
                    'asset_groups' => [
                        new AssetGroupInfo([
                            'asset_group' => ResourceNames::forAssetGroup(
                                $customerId,
                                $assetGroupId
                            ),
                            'asset_group_assets' => $assetGroupAssets
                        ])
                    ]
                ])
            ])
        ]);
        $operations[] = $treatmentOperation;

        return $operations;
    }

    /**
     * Creates a mutate operation for an asset group asset.
     *
     * @param int $customerId the customer ID
     * @param int $assetGroupId the asset group ID
     * @param int $assetTempId the temporary ID for the asset
     * @param int $fieldType the field type of the asset
     * @return MutateOperation the mutate operation that creates an asset group asset
     */
    private static function createAssetGroupAssetOperation(
        int $customerId,
        int $assetGroupId,
        int $assetTempId,
        int $fieldType
    ): MutateOperation {
        return new MutateOperation([
            'asset_group_asset_operation' => new AssetGroupAssetOperation([
                'create' => new AssetGroupAsset([
                    'asset_group' => ResourceNames::forAssetGroup($customerId, $assetGroupId),
                    'asset' => ResourceNames::forAsset($customerId, $assetTempId),
                    'field_type' => $fieldType
                ])
            ])
        ]);
    }
}

CreateAssetOptimizationExperiment::main();
