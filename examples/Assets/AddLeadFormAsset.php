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

namespace Google\Ads\GoogleAds\Examples\Extensions;

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
use Google\Ads\GoogleAds\V18\Common\LeadFormAsset;
use Google\Ads\GoogleAds\V18\Common\LeadFormDeliveryMethod;
use Google\Ads\GoogleAds\V18\Common\LeadFormField;
use Google\Ads\GoogleAds\V18\Common\LeadFormSingleChoiceAnswers;
use Google\Ads\GoogleAds\V18\Common\WebhookDelivery;
use Google\Ads\GoogleAds\V18\Enums\AssetFieldTypeEnum\AssetFieldType;
use Google\Ads\GoogleAds\V18\Enums\LeadFormCallToActionTypeEnum\LeadFormCallToActionType;
use Google\Ads\GoogleAds\V18\Enums\LeadFormFieldUserInputTypeEnum\LeadFormFieldUserInputType;
use Google\Ads\GoogleAds\V18\Enums\LeadFormPostSubmitCallToActionTypeEnum\LeadFormPostSubmitCallToActionType;
use Google\Ads\GoogleAds\V18\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V18\Resources\Asset;
use Google\Ads\GoogleAds\V18\Resources\CampaignAsset;
use Google\Ads\GoogleAds\V18\Services\AssetOperation;
use Google\Ads\GoogleAds\V18\Services\CampaignAssetOperation;
use Google\Ads\GoogleAds\V18\Services\MutateAssetsRequest;
use Google\Ads\GoogleAds\V18\Services\MutateCampaignAssetsRequest;
use Google\ApiCore\ApiException;

/**
 * Creates a lead form and a lead form asset for a campaign. Run AddCampaigns.php to create a
 * campaign.
 */
class AddLeadFormAsset
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
     * @param int $customerId the client customer ID
     * @param int $campaignId the campaign ID
     */
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        int $campaignId
    ) {
        // Creates a lead form asset.
        $leadFormAssetResourceName = self::createLeadFormAsset($googleAdsClient, $customerId);

        // Creates a lead form asset for the campaign.
        self::createLeadFormCampaignAsset(
            $googleAdsClient,
            $customerId,
            $campaignId,
            $leadFormAssetResourceName
        );
    }

    /**
     * Creates the lead form asset.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @return string the resource name of the newly created lead form asset
     */
    // [START add_lead_form_asset]
    private static function createLeadFormAsset(
        GoogleAdsClient $googleAdsClient,
        int $customerId
    ): string {
        // Creates the lead form asset.
        $leadFormAsset = new Asset([
            'name' => 'Interplanetary Cruise #' . Helper::getPrintableDatetime() . ' Lead Form',
            'lead_form_asset' => new LeadFormAsset([
                // Specifies the details of the asset that the users will see.
                'call_to_action_type' => LeadFormCallToActionType::BOOK_NOW,
                'call_to_action_description' => 'Latest trip to Jupiter!',
                // Defines the form details.
                'business_name' => 'Interplanetary Cruise',
                'headline' => 'Trip to Jupiter',
                'description' => 'Our latest trip to Jupiter is now open for booking.',
                'privacy_policy_url' => 'http://example.com/privacy',
                // Defines the fields to be displayed to the user.
                'fields' => [
                    new LeadFormField(['input_type' => LeadFormFieldUserInputType::FULL_NAME]),
                    new LeadFormField(['input_type' => LeadFormFieldUserInputType::EMAIL]),
                    new LeadFormField(['input_type' => LeadFormFieldUserInputType::PHONE_NUMBER]),
                    new LeadFormField([
                        'input_type' => LeadFormFieldUserInputType::PREFERRED_CONTACT_TIME,
                        'single_choice_answers' => new LeadFormSingleChoiceAnswers([
                            'answers' => ['Before 9 AM', 'Any time', 'After 5 PM']
                        ])
                    ]),
                    new LeadFormField(['input_type' => LeadFormFieldUserInputType::TRAVEL_BUDGET])
                ],
                // Optional: You can also specify a background image asset.
                // To upload an asset, see Misc/UploadImageAsset.php.
                // 'background_image_asset' => 'INSERT_IMAGE_ASSET_RESOURCE_NAME_HERE',

                // Optional: Defines the response page after the user signs up on the form.
                'post_submit_headline' => 'Thanks for signing up!',
                'post_submit_description' => 'We will reach out to you shortly. '
                    . 'Visit our website to see past trip details.',
                'post_submit_call_to_action_type' => LeadFormPostSubmitCallToActionType::VISIT_SITE,
                // Optional: Displays a custom disclosure that displays along with Google
                // disclaimer on the form.
                'custom_disclosure' => 'Trip may get cancelled due to meteor shower.',
                // Optional: Defines a delivery method for form response. See
                // https://developers.google.com/google-ads/webhook/docs/overview for more
                // details on how to define a webhook.
                'delivery_methods' => [new LeadFormDeliveryMethod([
                    'webhook' => new WebhookDelivery([
                        'advertiser_webhook_url' => 'http://example.com/webhook',
                        'google_secret' => 'interplanetary google secret',
                        'payload_schema_version' => 3
                    ])
                ])]
            ]),
            'final_urls' => ['http://example.com/jupiter']
        ]);

        // Creates an operation to add the asset.
        $assetOperation = new AssetOperation();
        $assetOperation->setCreate($leadFormAsset);

        // Issues a mutate request to add the asset and prints its information.
        $assetServiceClient = $googleAdsClient->getAssetServiceClient();
        $response = $assetServiceClient->mutateAssets(
            MutateAssetsRequest::build($customerId, [$assetOperation])
        );
        $assetResourceName = $response->getResults()[0]->getResourceName();
        printf("Created an asset with resource name: '%s'.%s", $assetResourceName, PHP_EOL);

        return $assetResourceName;
    }
    // [END add_lead_form_asset]

    /**
     * Creates the lead form campaign asset.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param int $campaignId the campaign ID to add the lead form asset
     * @param string $leadFormAssetResourceName the resource name of the lead form asset to be added
     */
    // [START add_lead_form_asset_1]
    private static function createLeadFormCampaignAsset(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        int $campaignId,
        string $leadFormAssetResourceName
    ) {
        // Creates the campaign asset for the lead form.
        $campaignAsset = new CampaignAsset([
            'asset' => $leadFormAssetResourceName,
            'field_type' => AssetFieldType::LEAD_FORM,
            'campaign' => ResourceNames::forCampaign($customerId, $campaignId)
        ]);

        // Creates an operation to add the campaign asset.
        $campaignAssetOperation = new CampaignAssetOperation();
        $campaignAssetOperation->setCreate($campaignAsset);

        // Issues a mutate request to add the campaign asset and prints its information.
        $campaignAssetServiceClient = $googleAdsClient->getCampaignAssetServiceClient();
        $response = $campaignAssetServiceClient->mutateCampaignAssets(
            MutateCampaignAssetsRequest::build($customerId, [$campaignAssetOperation])
        );
        printf(
            "Created a campaign asset with resource name '%s' for campaign ID %d.%s",
            $response->getResults()[0]->getResourceName(),
            $campaignId,
            PHP_EOL
        );
    }
    // [END add_lead_form_asset_1]
}

AddLeadFormAsset::main();
