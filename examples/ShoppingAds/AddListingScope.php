<?php

/**
 * Copyright 2020 Google LLC
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

namespace Google\Ads\GoogleAds\Examples\ShoppingAds;

require __DIR__ . '/../../vendor/autoload.php';

use GetOpt\GetOpt;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentNames;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentParser;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsException;
use Google\Ads\GoogleAds\Util\V18\ResourceNames;
use Google\Ads\GoogleAds\V18\Common\ListingDimensionInfo;
use Google\Ads\GoogleAds\V18\Common\ListingScopeInfo;
use Google\Ads\GoogleAds\V18\Common\ProductBrandInfo;
use Google\Ads\GoogleAds\V18\Common\ProductCustomAttributeInfo;
use Google\Ads\GoogleAds\V18\Common\ProductTypeInfo;
use Google\Ads\GoogleAds\V18\Enums\ProductCustomAttributeIndexEnum\ProductCustomAttributeIndex;
use Google\Ads\GoogleAds\V18\Enums\ProductTypeLevelEnum\ProductTypeLevel;
use Google\Ads\GoogleAds\V18\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V18\Resources\CampaignCriterion;
use Google\Ads\GoogleAds\V18\Services\CampaignCriterionOperation;
use Google\Ads\GoogleAds\V18\Services\MutateCampaignCriteriaRequest;
use Google\ApiCore\ApiException;

/**
 * Adds a shopping listing scope to a shopping campaign. The example will construct and add a new
 * listing scope which will act as the inventory filter for the campaign. The campaign will only
 * advertise products that match the following requirements:
 *
 * <ul>
 *   <li>Brand is "google"
 *   <li>Custom label 0 is "top_selling_products"
 *   <li>Product type (level 1) is "electronics"
 *   <li>Product type (level 2) is "smartphones"
 * </ul>
 *
 * Only one listing scope is allowed per campaign. Remove any existing listing scopes before running
 * this example.
 */
class AddListingScope
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
     * @param int $campaignId the campaign ID
     */
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        int $campaignId
    ) {

        // A listing scope allows you to filter the products that will be included in a given
        // campaign. You can specify multiple dimensions with conditions that must be met for a
        // product to be included in a campaign.
        // A typical listing scope might only have a few dimensions. This example demonstrates a
        // range of different dimensions you could use.
        $listingScopeInfo = new ListingScopeInfo([
            'dimensions' => [
                // Creates a product brand info set to "google".
                new ListingDimensionInfo([
                    'product_brand' => new ProductBrandInfo(['value' => 'google'])
                ]),
                // Creates a product custom attribute info for INDEX0 set to "top_selling_products".
                new ListingDimensionInfo([
                    'product_custom_attribute' => new ProductCustomAttributeInfo([
                        'index' => ProductCustomAttributeIndex::INDEX0,
                        'value' => 'top_selling_products'
                    ])
                ]),
                // Creates a product type info for LEVEL1 set to "electronics".
                new ListingDimensionInfo([
                    'product_type' => new ProductTypeInfo([
                        'level' => ProductTypeLevel::LEVEL1,
                        'value' => 'electronics'
                    ])
                ]),
                // Creates a product type info for LEVEL2 set to "smartphones".
                new ListingDimensionInfo([
                    'product_type' => new ProductTypeInfo([
                        'level' => ProductTypeLevel::LEVEL2,
                        'value' => 'smartphones'
                    ])
                ])
            ]
        ]);

        // Creates a campaign criterion to store the listing scope.
        $campaignCriterion = new CampaignCriterion([
            'campaign' => ResourceNames::forCampaign($customerId, $campaignId),
            'listing_scope' => $listingScopeInfo
        ]);
        // Creates a campaign criterion operation.
        $campaignCriterionOperation = new CampaignCriterionOperation();
        $campaignCriterionOperation->setCreate($campaignCriterion);

        // Issues a mutate request to create a campaign criterion on the server and print its info.
        $campaignCriterionServiceClient = $googleAdsClient->getCampaignCriterionServiceClient();
        $response = $campaignCriterionServiceClient->mutateCampaignCriteria(
            MutateCampaignCriteriaRequest::build($customerId, [$campaignCriterionOperation])
        );
        /** @var CampaignCriterion $addedCampaignCriterion */
        $addedCampaignCriterion = $response->getResults()[0];
        printf(
            "Added a campaign criterion with resource name '%s'.%s",
            $addedCampaignCriterion->getResourceName(),
            PHP_EOL
        );
    }
}

AddListingScope::main();
