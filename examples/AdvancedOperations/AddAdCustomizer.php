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

namespace Google\Ads\GoogleAds\Examples\AdvancedOperations;

require __DIR__ . '/../../vendor/autoload.php';

use GetOpt\GetOpt;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentNames;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentParser;
use Google\Ads\GoogleAds\Examples\Utils\Helper;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsException;
use Google\Ads\GoogleAds\Util\V18\ResourceNames;
use Google\Ads\GoogleAds\V18\Common\AdTextAsset;
use Google\Ads\GoogleAds\V18\Common\CustomizerValue;
use Google\Ads\GoogleAds\V18\Common\ResponsiveSearchAdInfo;
use Google\Ads\GoogleAds\V18\Enums\CustomizerAttributeTypeEnum\CustomizerAttributeType;
use Google\Ads\GoogleAds\V18\Enums\ServedAssetFieldTypeEnum\ServedAssetFieldType;
use Google\Ads\GoogleAds\V18\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V18\Resources\Ad;
use Google\Ads\GoogleAds\V18\Resources\AdGroupAd;
use Google\Ads\GoogleAds\V18\Resources\AdGroupCustomizer;
use Google\Ads\GoogleAds\V18\Resources\CustomizerAttribute;
use Google\Ads\GoogleAds\V18\Services\AdGroupAdOperation;
use Google\Ads\GoogleAds\V18\Services\AdGroupCustomizerOperation;
use Google\Ads\GoogleAds\V18\Services\CustomizerAttributeOperation;
use Google\Ads\GoogleAds\V18\Services\MutateAdGroupAdsRequest;
use Google\Ads\GoogleAds\V18\Services\MutateAdGroupCustomizersRequest;
use Google\Ads\GoogleAds\V18\Services\MutateCustomizerAttributesRequest;
use Google\ApiCore\ApiException;

/**
 * Adds ad customizer attributes and associates them with the ad group. Then it adds an ad that
 * uses the customizer attributes to populate dynamic data.
 */
class AddAdCustomizer
{
    private const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';
    private const AD_GROUP_ID = 'INSERT_AD_GROUP_ID_HERE';

    public static function main()
    {
        // Either pass the required parameters for this example on the command line, or insert them
        // into the constants above.
        $options = (new ArgumentParser())->parseCommandArguments([
            ArgumentNames::CUSTOMER_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::AD_GROUP_ID => GetOpt::REQUIRED_ARGUMENT
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
                $options[ArgumentNames::AD_GROUP_ID] ?: self::AD_GROUP_ID
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
     * @param int $adGroupId the ad group ID
     */
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        int $adGroupId
    ) {
        $stringCustomizerName = 'Planet_' . Helper::getShortPrintableDatetime();
        $priceCustomizerName = 'Price_' . Helper::getShortPrintableDatetime();

        // Creates ad customizer attributes.
        $textCustomizerAttributeResourceName = self::createTextCustomizerAttribute(
            $googleAdsClient,
            $customerId,
            $stringCustomizerName
        );
        $priceCustomizerAttributeResourceName = self::createPriceCustomizerAttribute(
            $googleAdsClient,
            $customerId,
            $priceCustomizerName
        );

        // Link the customer attributes to the ad group.
        self::linkCustomizerAttributes(
            $googleAdsClient,
            $customerId,
            $adGroupId,
            $textCustomizerAttributeResourceName,
            $priceCustomizerAttributeResourceName
        );

        // Creates an ad with the customizations provided by the ad customizer attributes.
        self::createAdsWithCustomizations(
            $googleAdsClient,
            $customerId,
            $adGroupId,
            $stringCustomizerName,
            $priceCustomizerName
        );
    }

   /**
    * Creates a text customizer attribute and returns its resource name.
    *
    * @param GoogleAdsClient $googleAdsClient the Google Ads API client
    * @param int $customerId the customer ID
    * @param string $customizerName the name of the customizer to create
    * @return string the resource name of the newly created text customizer attribute
    */
    // [START add_ad_customizer]
    private static function createTextCustomizerAttribute(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        string $customizerName
    ) {
        // Creates a text customizer attribute. The customizer attribute name is
        // arbitrary and will be used as a placeholder in the ad text fields.
        $textAttribute = new CustomizerAttribute([
            'name' => $customizerName,
            'type' => CustomizerAttributeType::TEXT
        ]);

        // Creates a customizer attribute operation for creating a customizer attribute.
        $customizerAttributeOperation = new CustomizerAttributeOperation();
        $customizerAttributeOperation->setCreate($textAttribute);

        // Issues a mutate request to add the customizer attribute.
        $customizerAttributeServiceClient = $googleAdsClient->getCustomizerAttributeServiceClient();
        $response = $customizerAttributeServiceClient->mutateCustomizerAttributes(
            MutateCustomizerAttributesRequest::build($customerId, [$customizerAttributeOperation])
        );

        $customizerAttributeResourceName = $response->getResults()[0]->getResourceName();
        printf(
            "Added text customizer attribute with resource name '%s'.%s",
            $customizerAttributeResourceName,
            PHP_EOL
        );

        return $customizerAttributeResourceName;
    }
    // [END add_ad_customizer]

    /**
     * Creates a price customizer attribute and returns its resource name.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param string $customizerName the name of the customizer to create
     * @return string the resource name of the newly created price customizer attribute
     */
    // [START add_ad_customizer_1]
    private static function createPriceCustomizerAttribute(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        string $customizerName
    ) {
        // Creates a price customizer attribute. The customizer attribute name is
        // arbitrary and will be used as a placeholder in the ad text fields.
        $priceAttribute = new CustomizerAttribute([
            'name' => $customizerName,
            'type' => CustomizerAttributeType::PRICE
        ]);

        // Creates a customizer attribute operation for creating a customizer attribute.
        $customizerAttributeOperation = new CustomizerAttributeOperation();
        $customizerAttributeOperation->setCreate($priceAttribute);

        // Issues a mutate request to add the customizer attribute.
        $customizerAttributeServiceClient = $googleAdsClient->getCustomizerAttributeServiceClient();
        $response = $customizerAttributeServiceClient->mutateCustomizerAttributes(
            MutateCustomizerAttributesRequest::build($customerId, [$customizerAttributeOperation])
        );

        $customizerAttributeResourceName = $response->getResults()[0]->getResourceName();
        printf(
            "Added price customizer attribute with resource name '%s'.%s",
            $customizerAttributeResourceName,
            PHP_EOL
        );

        return $customizerAttributeResourceName;
    }
    // [END add_ad_customizer_1]

    /**
     * Restricts the ad customizer attributes to work only with a specific ad group; this prevents
     * the customizer attributes from being used elsewhere and makes sure they are used only for
     * customizing a specific ad group.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param int $adGroupId the ad group ID to bind the customizer attribute to
     * @param string $textCustomizerAttributeResourceName the resource name of the text customizer
     *     attribute
     * @param string $priceCustomizerAttributeResourceName the resource name of the price
     *     customizer attribute
     */
    // [START add_ad_customizer_2]
    private static function linkCustomizerAttributes(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        int $adGroupId,
        string $textCustomizerAttributeResourceName,
        string $priceCustomizerAttributeResourceName
    ) {
        $operations = [];

        // Binds the text attribute customizer to a specific ad group to
        // make sure it will only be used to customize ads inside that ad
        // group.
        $textAdGroupCustomizer = new AdGroupCustomizer([
            'customizer_attribute' => $textCustomizerAttributeResourceName,
            'value' => new CustomizerValue([
                'type' => CustomizerAttributeType::TEXT,
                'string_value' => 'Mars'
            ]),
            'ad_group' => ResourceNames::forAdGroup($customerId, $adGroupId)
        ]);

        // Creates an operation for the text attribute ad group customizer.
        $textAdGroupCustomizerOperation = new AdGroupCustomizerOperation();
        $textAdGroupCustomizerOperation->setCreate($textAdGroupCustomizer);
        $operations[] = $textAdGroupCustomizerOperation;

        // Binds the price attribute customizer to a specific ad group to
        // make sure it will only be used to customize ads inside that ad
        // group.
        $priceAdGroupCustomizer = new AdGroupCustomizer([
            'customizer_attribute' => $priceCustomizerAttributeResourceName,
            'value' => new CustomizerValue([
                'type' => CustomizerAttributeType::PRICE,
                'string_value' => '100.0€'
            ]),
            'ad_group' => ResourceNames::forAdGroup($customerId, $adGroupId)
        ]);

        // Creates an operation for the price attribute ad group customizer.
        $priceAdGroupCustomizerOperation = new AdGroupCustomizerOperation();
        $priceAdGroupCustomizerOperation->setCreate($priceAdGroupCustomizer);
        $operations[] = $priceAdGroupCustomizerOperation;

        // Issues a mutate request to add ad group customizers.
        $adGroupCustomizerServiceClient = $googleAdsClient->getAdGroupCustomizerServiceClient();
        $response = $adGroupCustomizerServiceClient->mutateAdGroupCustomizers(
            MutateAdGroupCustomizersRequest::build($customerId, $operations)
        );

        // Displays the results.
        foreach ($response->getResults() as $result) {
            printf(
                "Added an ad group customizer with resource name '%s'.%s",
                $result->getResourceName(),
                PHP_EOL
            );
        }
    }
    // [END add_ad_customizer_2]

    /**
     * Creates a responsive search ad that uses the ad customizer attributes to populate the
     * placeholders.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param int $adGroupId the ad group ID in which to create the ad
     * @param string $stringCustomizerName the name of the string customizer
     * @param string $priceCustomizerName the name of the price customizer
     */
    // [START add_ad_customizer_3]
    private static function createAdsWithCustomizations(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        int $adGroupId,
        string $stringCustomizerName,
        string $priceCustomizerName
    ) {
        // Creates a responsive search ad using the attribute customizer names as
        // placeholders and default values to be used in case there are no attribute
        // customizer values.
        $responsiveSearchAdInfo = new ResponsiveSearchAdInfo([
            'headlines' => [
                new AdTextAsset([
                    'text' => "Luxury cruise to {CUSTOMIZER.$stringCustomizerName:Venus}",
                    'pinned_field' => ServedAssetFieldType::HEADLINE_1
                ]),
                new AdTextAsset(['text' => "Only {CUSTOMIZER.$priceCustomizerName:10.0€}"]),
                new AdTextAsset([
                    'text' => "Cruise to {CUSTOMIZER.$stringCustomizerName:Venus} for "
                        . "{CUSTOMIZER.$priceCustomizerName:10.0€}"
                ])
            ],
            'descriptions' => [
                new AdTextAsset([
                    'text' => "Tickets are only {CUSTOMIZER.$priceCustomizerName:10.0€}!"]),
                new AdTextAsset([
                    'text' => "Buy your tickets to {CUSTOMIZER.$stringCustomizerName:Venus} now!"])
            ]
        ]);

        // Creates an ad group ad and its operation.
        $adGroupAd = new AdGroupAd([
            'ad' => new Ad([
                'responsive_search_ad' => $responsiveSearchAdInfo,
                'final_urls' => ['https://www.example.com']
            ]),
            'ad_group' => ResourceNames::forAdGroup($customerId, $adGroupId)
        ]);
        $adGroupAdOperation = new AdGroupAdOperation();
        $adGroupAdOperation->setCreate($adGroupAd);

        // Issues a mutate request to add the ad.
        $adGroupAdServiceClient = $googleAdsClient->getAdGroupAdServiceClient();
        $adGroupAdResponse = $adGroupAdServiceClient->mutateAdGroupAds(
            MutateAdGroupAdsRequest::build($customerId, [$adGroupAdOperation])
        );

        $adGroupAdResourceName = $adGroupAdResponse->getResults()[0]->getResourceName();
        printf("Added an ad with resource name '%s'.%s", $adGroupAdResourceName, PHP_EOL);
    }
    // [END add_ad_customizer_3]
}

AddAdCustomizer::main();
