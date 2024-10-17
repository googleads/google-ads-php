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

namespace Google\Ads\GoogleAds\Examples\AdvancedOperations;

require __DIR__ . '/../../vendor/autoload.php';

use GetOpt\GetOpt;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentNames;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentParser;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsException;
use Google\Ads\GoogleAds\Util\V18\ResourceNames;
use Google\Ads\GoogleAds\V18\Common\AdTextAsset;
use Google\Ads\GoogleAds\V18\Common\CustomizerValue;
use Google\Ads\GoogleAds\V18\Common\ResponsiveSearchAdInfo;
use Google\Ads\GoogleAds\V18\Enums\AdGroupAdStatusEnum\AdGroupAdStatus;
use Google\Ads\GoogleAds\V18\Enums\CustomizerAttributeTypeEnum\CustomizerAttributeType;
use Google\Ads\GoogleAds\V18\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V18\Resources\Ad;
use Google\Ads\GoogleAds\V18\Resources\AdGroupAd;
use Google\Ads\GoogleAds\V18\Resources\CustomerCustomizer;
use Google\Ads\GoogleAds\V18\Resources\CustomizerAttribute;
use Google\Ads\GoogleAds\V18\Services\AdGroupAdOperation;
use Google\Ads\GoogleAds\V18\Services\CustomerCustomizerOperation;
use Google\Ads\GoogleAds\V18\Services\CustomizerAttributeOperation;
use Google\Ads\GoogleAds\V18\Services\MutateAdGroupAdsRequest;
use Google\Ads\GoogleAds\V18\Services\MutateCustomerCustomizersRequest;
use Google\Ads\GoogleAds\V18\Services\MutateCustomizerAttributesRequest;
use Google\ApiCore\ApiException;

/**
 * Adds a customizer attribute, links the customizer attribute to a customer, and then adds
 * a responsive search ad with a description using the ad customizer to the specified ad group.
 */
class AddResponsiveSearchAdWithAdCustomizer
{
    private const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';
    private const AD_GROUP_ID = 'INSERT_AD_GROUP_ID_HERE';

    // The name of the customizer attribute to be used in the ad customizer, which must be unique.
    // To run this example multiple times, change this value or specify its corresponding argument.
    // Note that there is a limit for the number of enabled customizer attributes in one account,
    // so you shouldn't run this example more than necessary.
    // Visit https://developers.google.com/google-ads/api/docs/ads/customize-responsive-search-ads#rules_and_limitations
    // for details.
    private const CUSTOMIZER_ATTRIBUTE_NAME = 'Price';

    public static function main()
    {
        // Either pass the required parameters for this example on the command line, or insert them
        // into the constants above.
        $options = (new ArgumentParser())->parseCommandArguments([
            ArgumentNames::CUSTOMER_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::AD_GROUP_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::CUSTOMIZER_ATTRIBUTE_NAME => GetOpt::OPTIONAL_ARGUMENT
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
                $options[ArgumentNames::AD_GROUP_ID] ?: self::AD_GROUP_ID,
                $options[ArgumentNames::CUSTOMIZER_ATTRIBUTE_NAME]
                    ?: self::CUSTOMIZER_ATTRIBUTE_NAME
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
     * @param string $customizerAttributeName the customizer attribute name
     */
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        int $adGroupId,
        string $customizerAttributeName
    ) {
        $customizerAttributeResourceName = self::createCustomizerAttribute(
            $googleAdsClient,
            $customerId,
            $customizerAttributeName
        );
        self::linkCustomizerAttributeToCustomer(
            $googleAdsClient,
            $customerId,
            $customizerAttributeResourceName
        );
        self::createResponsiveSearchAdWithCustomization(
            $googleAdsClient,
            $customerId,
            $adGroupId,
            $customizerAttributeName
        );
    }

    /**
     * Creates a customizer attribute with the specified customizer attribute name.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param string $customizerAttributeName the name of the customizer attribute
     * @return string the created customizer attribute resource name
     */
    // [START add_responsive_search_ad_with_ad_customizer_1]
    private static function createCustomizerAttribute(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        string $customizerAttributeName
    ) {
        // Creates a customizer attribute with the specified name.
        $customizerAttribute = new CustomizerAttribute([
            'name' => $customizerAttributeName,
            // Specifies the type to be 'PRICE' so that we can dynamically customize the part of
            // the ad's description that is a price of a product/service we advertise.
            'type' => CustomizerAttributeType::PRICE
        ]);

        // Creates a customizer attribute operation for creating a customizer attribute.
        $operation = new CustomizerAttributeOperation();
        $operation->setCreate($customizerAttribute);

        // Issues a mutate request to add the customizer attribute and prints its information.
        $customizerAttributeServiceClient = $googleAdsClient->getCustomizerAttributeServiceClient();
        $response = $customizerAttributeServiceClient->mutateCustomizerAttributes(
            MutateCustomizerAttributesRequest::build($customerId, [$operation])
        );
        $customizerAttributeResourceName = $response->getResults()[0]->getResourceName();
        printf(
            "Added a customizer attribute with resource name '%s'.%s",
            $customizerAttributeResourceName,
            PHP_EOL
        );

        return $customizerAttributeResourceName;
    }
    // [END add_responsive_search_ad_with_ad_customizer_1]

    /**
     * Links the customizer attribute to the customer by providing a value to be used in a
     * responsive search ad that will be created in a later step.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param string $customizerAttributeResourceName the customizer attribute resource name
     */
    // [START add_responsive_search_ad_with_ad_customizer_2]
    private static function linkCustomizerAttributeToCustomer(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        string $customizerAttributeResourceName
    ) {
        // Creates a customer customizer with the value to be used in the responsive search ad.
        $customerCustomizer = new CustomerCustomizer([
            'customizer_attribute' => $customizerAttributeResourceName,
            // Specify '100USD' as a text value. The ad customizer will dynamically replace the
            // placeholder with this value when the ad serves.
            'value' => new CustomizerValue([
                'type' => CustomizerAttributeType::PRICE,
                'string_value' => '100USD'
            ])
        ]);

        // Creates a customer customizer operation.
        $operation = new CustomerCustomizerOperation();
        $operation->setCreate($customerCustomizer);

        // Issues a mutate request to add the customer customizer and prints its information.
        $customerCustomizerServiceClient = $googleAdsClient->getCustomerCustomizerServiceClient();
        $response = $customerCustomizerServiceClient->mutateCustomerCustomizers(
            MutateCustomerCustomizersRequest::build($customerId, [$operation])
        );
        printf(
            "Added a customer customizer with resource name '%s'.%s",
            $response->getResults()[0]->getResourceName(),
            PHP_EOL
        );
    }
    // [END add_responsive_search_ad_with_ad_customizer_2]

    /**
     * Creates a responsive search ad that uses the specified customizer attribute.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the client customer ID
     * @param int $adGroupId the ad group ID in which to create the ad
     * @param string $customizerAttributeName the name of the customizer attribute
     */
    // [START add_responsive_search_ad_with_ad_customizer_3]
    private static function createResponsiveSearchAdWithCustomization(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        int $adGroupId,
        string $customizerAttributeName
    ) {
        // Creates an ad and sets responsive search ad info.
        $ad = new Ad([
            'responsive_search_ad' => new ResponsiveSearchAdInfo([
                'headlines' => [
                    new AdTextAsset(['text' => 'Cruise to Mars']),
                    new AdTextAsset(['text' => 'Best Space Cruise Line']),
                    new AdTextAsset(['text' => 'Experience the Stars'])
                ],
                'descriptions' => [
                    new AdTextAsset(['text' => 'Buy your tickets now']),
                    // Creates this particular description using the ad customizer.
                    // Visit https://developers.google.com/google-ads/api/docs/ads/customize-responsive-search-ads#ad_customizers_in_responsive_search_ads
                    // for details about the placeholder format.
                    // The ad customizer replaces the placeholder with the value we previously
                    // created and linked to the customer using `CustomerCustomizer`.
                    new AdTextAsset(['text' => "Just {CUSTOMIZER.$customizerAttributeName:10USD}"])
                ],
                'path1' => 'all-inclusive',
                'path2' => 'deals'
            ]),
            'final_urls' => ['http://www.example.com']
        ]);

        // Creates an ad group ad to hold the above ad.
        $adGroupAd = new AdGroupAd([
            'ad_group' => ResourceNames::forAdGroup($customerId, $adGroupId),
            'status' => AdGroupAdStatus::PAUSED,
            'ad' => $ad
        ]);

        // Creates an ad group ad operation.
        $adGroupAdOperation = new AdGroupAdOperation();
        $adGroupAdOperation->setCreate($adGroupAd);

        // Issues a mutate request to add the ad group ad and prints its information.
        $adGroupAdServiceClient = $googleAdsClient->getAdGroupAdServiceClient();
        $response = $adGroupAdServiceClient->mutateAdGroupAds(
            MutateAdGroupAdsRequest::build($customerId, [$adGroupAdOperation])
        );
        printf(
            "Created responsive search ad with resource name '%s'.%s",
            $response->getResults()[0]->getResourceName(),
            PHP_EOL
        );
    }
    // [END add_responsive_search_ad_with_ad_customizer_3]
}

AddResponsiveSearchAdWithAdCustomizer::main();
