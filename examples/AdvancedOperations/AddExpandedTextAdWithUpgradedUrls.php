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

namespace Google\Ads\GoogleAds\Examples\AdvancedOperations;

require __DIR__ . '/../../vendor/autoload.php';

use GetOpt\GetOpt;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentNames;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentParser;
use Google\Ads\GoogleAds\Lib\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\GoogleAdsException;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\V0\Common\Ad;
use Google\Ads\GoogleAds\V0\Common\CustomParameter;
use Google\Ads\GoogleAds\V0\Common\ExpandedTextAdInfo;
use Google\Ads\GoogleAds\V0\Enums\AdGroupAdStatusEnum_AdGroupAdStatus;
use Google\Ads\GoogleAds\V0\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V0\Resources\AdGroupAd;
use Google\Ads\GoogleAds\V0\Services\AdGroupAdOperation;
use Google\Ads\GoogleAds\V0\Services\AdGroupServiceClient;
use Google\ApiCore\ApiException;
use Google\Protobuf\StringValue;

/**
 * This example demonstrates how to add expanded text ads to a given ad group.
 * To get ad groups, run GetAdGroups.php.
 */
class AddExpandedTextAdWithUpgradedUrls
{
    const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';
    const AD_GROUP_ID = 'INSERT_AD_GROUP_ID_HERE';

    public static function main()
    {
        // Either pass the required parameters for this example on the command line, or insert them
        // into the constants above.
        $options = ArgumentParser::parseCommandArguments([
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
     * @param int $adGroupId the ad group ID to add a keyword to
     */
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        $customerId,
        $adGroupId
    ) {
        // Creates the expanded text ad info.
        $expandedTextAdInfo = new ExpandedTextAdInfo();

        $wrappedHeadlinePart1 = new StringValue();
        $wrappedHeadlinePart1->setValue('Luxury Cruise to Mars');
        $expandedTextAdInfo->setHeadlinePart1($wrappedHeadlinePart1);

        $wrappedHeadlinePart2 = new StringValue();
        $wrappedHeadlinePart2->setValue('Visit the Red Planet in style.');
        $expandedTextAdInfo->setHeadlinePart2($wrappedHeadlinePart2);

        $wrappedDescription = new StringValue();
        $wrappedDescription->setValue('Low-gravity fun for everyone!');
        $expandedTextAdInfo->setDescription($wrappedDescription);

        // Sets the expanded text ad info on an Ad.
        $ad = new Ad();
        $ad->setExpandedTextAd($expandedTextAdInfo);

        // Specifies a list of final URLs. This field cannot be set if URL field is set. This may
        // be specified at ad and criterion levels.
        $wrappedFinalUrl1 = new StringValue();
        $wrappedFinalUrl1->setValue('http://www.example.com/cruise/space/');
        $wrappedFinalUrl2 = new StringValue();
        $wrappedFinalUrl2->setValue('http://www.example.com/locations/mars/');
        $ad->setFinalUrls([$wrappedFinalUrl1, $wrappedFinalUrl2]);

        // Specifies a list of final mobile URLs. This field cannot be set if URL field is set, or
        // finalUrls is unset. This may be specified at ad and criterion levels.
        /*
        $wrappedFinalMobileUrl1 = new StringValue();
        $wrappedFinalMobileUrl1->setValue('http://mobile.example.com/cruise/space/');
        $wrappedFinalMobileUrl2 = new StringValue();
        $wrappedFinalMobileUrl2->setValue('http://mobile.example.com/locations/mars/');
        $ad->setFinalMobileUrls([$wrappedFinalMobileUrl1, $wrappedFinalMobileUrl2]);
        */

        // Specifies a tracking URL for 3rd party tracking provider. You may specify one at
        // customer, campaign, ad group, ad or criterion levels.
        $wrappedTrackingUrlTemplate = new StringValue();
        $wrappedTrackingUrlTemplate->setValue(
            'http://tracker.example.com/?season={_season}&promocode={_promocode}&u={lpurl}'
        );
        $ad->setTrackingUrlTemplate($wrappedTrackingUrlTemplate);

        // Since your tracking URL has two custom parameters, provide their values too. This can
        // be provided at campaign, ad group, ad or criterion levels.
        $wrappedCustomParamKey1 = new StringValue();
        $wrappedCustomParamKey1->setValue('season');
        $wrappedCustomParamValue1 = new StringValue();
        $wrappedCustomParamValue1->setValue('christmas');
        $customParam1 = new CustomParameter();
        $customParam1->setKey($wrappedCustomParamKey1);
        $customParam1->setValue($wrappedCustomParamValue1);

        $wrappedCustomParamKey2 = new StringValue();
        $wrappedCustomParamKey2->setValue('promocode');
        $wrappedCustomParamValue2 = new StringValue();
        $wrappedCustomParamValue2->setValue('NY123');
        $customParam2 = new CustomParameter();
        $customParam2->setKey($wrappedCustomParamKey2);
        $customParam2->setValue($wrappedCustomParamValue2);

        $ad->setUrlCustomParameters([$customParam1, $customParam2]);

        // Creates an ad group ad to hold the above ad.
        $adGroupAd = new AdGroupAd();

        $adGroupResourceName = AdGroupServiceClient::adGroupName($customerId, $adGroupId);
        $wrappedAdGroupResourceName = new StringValue();
        $wrappedAdGroupResourceName->setValue($adGroupResourceName);
        $adGroupAd->setAdGroup($wrappedAdGroupResourceName);

        $adGroupAd->setStatus(AdGroupAdStatusEnum_AdGroupAdStatus::PAUSED);
        $adGroupAd->setAd($ad);

        // Creates an ad group ad operation and add it to the operations array.
        $adGroupAdOperation = new AdGroupAdOperation();
        $adGroupAdOperation->setCreate($adGroupAd);

        // Issues a mutate request to add the ad group ads.
        $adGroupAdServiceClient = $googleAdsClient->getAdGroupAdServiceClient();
        $response = $adGroupAdServiceClient->mutateAdGroupAds($customerId, [$adGroupAdOperation]);

        foreach ($response->getResults() as $addedAdGroupAd) {
            /** @var AdGroupAd $addedAdGroupAd */
            printf(
                "Added an expanded text ad with resource name: '%s'%s",
                $addedAdGroupAd->getResourceName(),
                PHP_EOL
            );
        }
    }
}

AddExpandedTextAdWithUpgradedUrls::main();
