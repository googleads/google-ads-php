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

namespace Google\Ads\GoogleAds\Examples\Remarketing;

require __DIR__ . '/../../vendor/autoload.php';

use GetOpt\GetOpt;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentNames;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentParser;
use Google\Ads\GoogleAds\Examples\Utils\Helper;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsException;
use Google\Ads\GoogleAds\V18\Enums\CustomAudienceMemberTypeEnum\CustomAudienceMemberType;
use Google\Ads\GoogleAds\V18\Enums\CustomAudienceStatusEnum\CustomAudienceStatus;
use Google\Ads\GoogleAds\V18\Enums\CustomAudienceTypeEnum\CustomAudienceType;
use Google\Ads\GoogleAds\V18\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V18\Resources\CustomAudience;
use Google\Ads\GoogleAds\V18\Resources\CustomAudienceMember;
use Google\Ads\GoogleAds\V18\Services\CustomAudienceOperation;
use Google\Ads\GoogleAds\V18\Services\MutateCustomAudiencesRequest;
use Google\ApiCore\ApiException;

/**
 * Illustrates adding a custom audience. Custom audiences help you reach your ideal audience by
 * entering relevant keywords, URLs and apps. For more information about custom audiences, see:
 * https://support.google.com/google-ads/answer/9805516.
 */
class AddCustomAudience
{
    private const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';

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
        // Creates a CustomAudience object to represent the new audience.
        $customAudience = new CustomAudience([
            'name' => 'Example CustomAudience #' . Helper::getPrintableDatetime(),
            'description' => 'Custom audiences who have searched specific terms on Google Search',
            // Matches customers by what they searched on Google Search.
            // Note: "INTEREST" OR "PURCHASE_INTENT" is not allowed for the type field
            //       of newly created custom audience. Use "AUTO" instead of these 2 options
            //       when creating a new custom audience.
            'type' => CustomAudienceType::SEARCH,
            'status' => CustomAudienceStatus::ENABLED,
            // Lists the members that this custom audience is composed of. Customers that meet any
            // of the membership conditions will be reached.
            'members' => [
                // Adds Keywords or keyword phrases, which describe the customers' interests or
                // search terms.
                self::createCustomAudienceMember(CustomAudienceMemberType::KEYWORD, "mars cruise"),
                self::createCustomAudienceMember(
                    CustomAudienceMemberType::KEYWORD,
                    "jupiter cruise"
                ),
                // Adds website URLs that your customers might visit.
                self::createCustomAudienceMember(
                    CustomAudienceMemberType::URL,
                    "http://www.example.com/locations/mars"
                ),
                self::createCustomAudienceMember(
                    CustomAudienceMemberType::URL,
                    "http://www.example.com/locations/jupiter"
                ),
                // Adds package names of Android apps which customers might install.
                self::createCustomAudienceMember(
                    CustomAudienceMemberType::APP,
                    "com.google.android.apps.adwords"
                )
            ]
        ]);

        // Creates the operation.
        $operation = new CustomAudienceOperation();
        $operation->setCreate($customAudience);

        // Issues a mutate request to add the custom audience and prints some information.
        $customAudienceServiceClient = $googleAdsClient->getCustomAudienceServiceClient();
        $response = $customAudienceServiceClient->mutateCustomAudiences(
            MutateCustomAudiencesRequest::build($customerId, [$operation])
        );
        printf(
            "Created custom audience with resource name '%s'.%s",
            $response->getResults()[0]->getResourceName(),
            PHP_EOL
        );
    }

    /**
     * Constructs a custom audience member object for a given customer audience member type and
     * value.
     *
     * @param int $memberType the custom audience member type
     * @param string $value the custom audience member value
     * @return CustomAudienceMember the newly constructed customer audience member object
     */
    private static function createCustomAudienceMember(
        int $memberType,
        string $value
    ): CustomAudienceMember {
        $customerAudienceMember = new CustomAudienceMember(['member_type' => $memberType]);
        if ($memberType == CustomAudienceMemberType::KEYWORD) {
            $customerAudienceMember->setKeyword($value);
        } elseif ($memberType == CustomAudienceMemberType::URL) {
            $customerAudienceMember->setUrl($value);
        } elseif ($memberType == CustomAudienceMemberType::APP) {
            $customerAudienceMember->setApp($value);
        }
        return $customerAudienceMember;
    }
}

AddCustomAudience::main();
