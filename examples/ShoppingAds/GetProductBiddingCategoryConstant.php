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
use Google\Ads\GoogleAds\Lib\V2\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V2\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V2\GoogleAdsException;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\V2\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V2\Resources\ProductBiddingCategoryConstant;
use Google\Ads\GoogleAds\V2\Services\GoogleAdsRow;
use Google\ApiCore\ApiException;

/** Fetches the set of valid ProductBiddingCategories.*/
class GetProductBiddingCategoryConstant
{
    const CUSTOMER_ID = '7556834180';
    const PAGE_SIZE = 1000;

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
     * @param int $customerId the customer ID
     */
    public static function runExample(GoogleAdsClient $googleAdsClient, int $customerId)
    {
        $googleAdsServiceClient = $googleAdsClient->getGoogleAdsServiceClient();
        // Creates the query.
        $query = 'SELECT product_bidding_category_constant.localized_name,
            product_bidding_category_constant.product_bidding_category_constant_parent
            FROM product_bidding_category_constant
            WHERE product_bidding_category_constant.country_code IN (\'US\')
            ORDER BY product_bidding_category_constant.localized_name ASC';

        // Creates a list of top level category nodes.
        $rootCategories = [];
        // Creates a map of category ID to category node for all categories found in the results.
        // This Map is a convenience lookup to enable fast retrieval of existing nodes.
        $biddingCategories = [];

        // Performs the search request.
        $response =
            $googleAdsServiceClient->search($customerId, $query, ['pageSize' => self::PAGE_SIZE]);

        // Iterates over all rows in all pages to extract the result.
        foreach ($response->iterateAllElements() as $googleAdsRow) {
            /**
             * @var GoogleAdsRow $googleAdsRow
             * @var ProductBiddingCategoryConstant $productBiddingCategory
             */
            $productBiddingCategory = $googleAdsRow->getProductBiddingCategoryConstant();
            $localizedName = $productBiddingCategory->getLocalizedNameUnwrapped();
            $resourceName = $productBiddingCategory->getResourceName();
            if (!array_key_exists($resourceName, $biddingCategories)) {
                $biddingCategories[$resourceName] = [];
            }

            // Ensures that the name attribute for the node is set. Name will be null for nodes added
            // to biddingCategories as a result of being a parentNode below.
            $biddingCategories[$resourceName]['localizedName'] = $localizedName;

            if ($productBiddingCategory->getProductBiddingCategoryConstantParent() != null) {
                $parentResourceName =
                    $productBiddingCategory->getProductBiddingCategoryConstantParentUnwrapped();
                if (!array_key_exists($parentResourceName, $biddingCategories)) {
                    $biddingCategories[$parentResourceName] = [];
                }
                $biddingCategories[$parentResourceName]['children'][$resourceName] = $biddingCategories[$resourceName];
            } else {
                $rootCategories[$resourceName] = $biddingCategories[$resourceName];
            }
        }

        // Prints the extracted results.
        self::displayCategories($rootCategories, "");
    }

    /**
     * Recursively prints out each category node and its children.
     *
     * @param CategoryNode[] $categories the categories to print
     * @param string $prefix the string to print at the beginning of each line of output
     */
    private static function displayCategories(
        array $categories,
        string $prefix
    ) {
        foreach ($categories as $categoryKey => $category) {
            printf(
                "%s%s [%s]%s",
                $prefix,
                $category['localizedName'],
                $categoryKey,
                PHP_EOL
            );
            if (array_key_exists('children', $category)) {
                self::displayCategories(
                    $category['children'],
                    sprintf(
                        "%s%s > ",
                        $prefix,
                        $category['localizedName']
                    )
                );
            }
        }
    }
}

GetProductBiddingCategoryConstant::main();
