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
use Google\Ads\GoogleAds\Lib\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\GoogleAdsException;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\Util\ResourceNames;
use Google\Ads\GoogleAds\V0\Enums\AdGroupStatusEnum_AdGroupStatus;
use Google\Ads\GoogleAds\V0\Enums\AdGroupTypeEnum_AdGroupType;
use Google\Ads\GoogleAds\V0\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V0\Resources\AdGroup;
use Google\Ads\GoogleAds\V0\Services\AdGroupOperation;
use Google\ApiCore\ApiException;
use Google\Protobuf\Int64Value;
use Google\Protobuf\StringValue;

/** This example adds ad groups to a campaign. */
class AddAdGroups
{
    const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';
    const CAMPAIGN_ID = 'INSERT_CAMPAIGN_ID_HERE';

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
     * @param int $customerId the client customer ID without hyphens
     * @param int $campaignId the campaign ID to add ad groups to
     */
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        $customerId,
        $campaignId
    ) {
        $wrappedCampaignResourceName = new StringValue();
        $wrappedCampaignResourceName->setValue(
            ResourceNames::forCampaign($customerId, $campaignId)
        );

        $operations = [];

        // Constructs an ad group and sets an optional CPC value.
        $adGroup1 = new AdGroup();
        $wrappedName1 = new StringValue();
        $wrappedName1->setValue('Earth to Mars Cruises #' . uniqid());
        $adGroup1->setName($wrappedName1);
        $adGroup1->setCampaign($wrappedCampaignResourceName);
        $adGroup1->setStatus(AdGroupStatusEnum_AdGroupStatus::ENABLED);
        $adGroup1->setType(AdGroupTypeEnum_AdGroupType::SEARCH_STANDARD);
        $wrappedCpcBidMicros1 = new Int64Value();
        $wrappedCpcBidMicros1->setValue(10000000);
        $adGroup1->setCpcBidMicros($wrappedCpcBidMicros1);

        $adGroupOperation1 = new AdGroupOperation();
        $adGroupOperation1->setCreate($adGroup1);
        $operations[] = $adGroupOperation1;

        // Constructs another ad group.
        $adGroup2 = new AdGroup();
        $wrappedName2 = new StringValue();
        $wrappedName2->setValue('Earth to Venus Cruises #' . uniqid());
        $adGroup2->setName($wrappedName2);
        $adGroup2->setCampaign($wrappedCampaignResourceName);
        $adGroup2->setStatus(AdGroupStatusEnum_AdGroupStatus::ENABLED);
        $adGroup2->setType(AdGroupTypeEnum_AdGroupType::SEARCH_STANDARD);
        $wrappedCpcBidMicros2 = new Int64Value();
        $wrappedCpcBidMicros2->setValue(20000000);
        $adGroup2->setCpcBidMicros($wrappedCpcBidMicros2);

        $adGroupOperation2 = new AdGroupOperation();
        $adGroupOperation2->setCreate($adGroup2);
        $operations[] = $adGroupOperation2;

        // Issues a mutate request to add the ad groups.
        $adGroupServiceClient = $googleAdsClient->getAdGroupServiceClient();
        $response = $adGroupServiceClient->mutateAdGroups(
            $customerId,
            $operations
        );

        printf("Added %d ad groups:%s", $response->getResults()->count(), PHP_EOL);

        foreach ($response->getResults() as $addedAdGroup) {
            /** @var AdGroup $addedAdGroup */
            print $addedAdGroup->getResourceName() . PHP_EOL;
        }
    }
}

AddAdGroups::main();
