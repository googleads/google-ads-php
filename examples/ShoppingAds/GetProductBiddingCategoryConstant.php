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

namespace Google\Ads\GoogleAds\Examples\ShoppingAds;

require __DIR__ . '/../../vendor/autoload.php';

use GetOpt\GetOpt;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentNames;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentParser;
use Google\Ads\GoogleAds\Lib\V14\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V14\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V14\GoogleAdsException;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\V14\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V14\Resources\ProductBiddingCategoryConstant;
use Google\Ads\GoogleAds\V14\Services\GoogleAdsRow;
use Google\ApiCore\ApiException;

/** Fetches the set of valid ProductBiddingCategories. */
class GetProductBiddingCategoryConstant
{
    private const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';
    private const PAGE_SIZE = 1000;

    public static function main()
    {
        // Either pass the required parameters for this example on the command line, or insert them
        // into the constants above.
        $options = (new ArgumentParser())->parseCommandArguments([
            ArgumentNames::CUSTOMER_ID => GetOpt::REQUIRED_ARGUMENT
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
                $options[ArgumentNames::CUSTOMER_ID] ?: self::CUSTOMER_ID
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
     */
    public static function runExample(GoogleAdsClient $googleAdsClient, int $customerId)
    {
        $googleAdsServiceClient = $googleAdsClient->getGoogleAdsServiceClient();
        // Creates the query.
        $query = "SELECT product_bidding_category_constant.localized_name, "
            . "product_bidding_category_constant.product_bidding_category_constant_parent "
            . "FROM product_bidding_category_constant "
            . "WHERE product_bidding_category_constant.country_code IN ('US') "
            . "ORDER BY product_bidding_category_constant.localized_name ASC";

        // Performs the search request.
        $response = $googleAdsServiceClient->search(
            $customerId,
            $query,
            ['pageSize' => self::PAGE_SIZE]
        );

        // Creates a map of top level categories.
        $rootCategories = [];
        // Creates a map of all categories found in the results.
        // This is a convenience lookup to enable fast retrieval of existing categories.
        $biddingCategories = [];

        // Iterates over all rows in all pages to extract the result.
        foreach ($response->iterateAllElements() as $googleAdsRow) {
            /**
             * @var GoogleAdsRow $googleAdsRow
             * @var ProductBiddingCategoryConstant $productBiddingCategory
             */
            $productBiddingCategory = $googleAdsRow->getProductBiddingCategoryConstant();
            $resourceName = $productBiddingCategory->getResourceName();

            // Adds the category in the map if new.
            if (!array_key_exists($resourceName, $biddingCategories)) {
                $biddingCategories[$resourceName] = [];
            }

            // Sets the localized name attribute if not already set.
            if (!array_key_exists('localizedName', $biddingCategories[$resourceName])) {
                $biddingCategories[$resourceName]['localizedName'] =
                    $productBiddingCategory->getLocalizedName();
            }
            if ($productBiddingCategory->getProductBiddingCategoryConstantParent() === '') {
                // Adds the category as a root category if having no parent.
                $rootCategories[$resourceName] = &$biddingCategories[$resourceName];
            } else {
                // Links the category to the parent category if any.
                $parentResourceName =
                    $productBiddingCategory->getProductBiddingCategoryConstantParent();
                // Adds the parent category in the map if new.
                if (!array_key_exists($parentResourceName, $biddingCategories)) {
                    $biddingCategories[$parentResourceName] = [];
                }
                // Adds the category as a child category of the parent category.
                $biddingCategories[$parentResourceName]['children'][$resourceName] =
                    &$biddingCategories[$resourceName];
            }
        }
        // Prints the result.
        self::displayCategories($rootCategories, '');
    }



    /**
     * Recursively prints out each category and its children.
     *
     * @param array $categories the map of categories to print
     * @param string $prefix the string to print at the beginning of each line of output
     */
    private static function displayCategories(
        array $categories,
        string $prefix
    ) {
        foreach ($categories as $categoryKey => $categoryValue) {
            $localizedName = $categoryValue['localizedName'];
            printf(
                '%s%s [%s]%s',
                $prefix,
                $localizedName,
                $categoryKey,
                PHP_EOL
            );
            if (array_key_exists('children', $categoryValue)) {
                self::displayCategories(
                    $categoryValue['children'],
                    sprintf('%s%s > ', $prefix, $localizedName)
                );
            }
        }
    }
}

GetProductBiddingCategoryConstant::main();
