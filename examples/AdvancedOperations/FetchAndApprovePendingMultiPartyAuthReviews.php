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

namespace Google\Ads\GoogleAds\Examples\AdvancedOperations;

require __DIR__ . '/../../vendor/autoload.php';

use GetOpt\GetOpt;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentNames;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentParser;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\Lib\V24\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V24\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V24\GoogleAdsException;
use Google\Ads\GoogleAds\Util\V24\GoogleAdsFailures;
use Google\Ads\GoogleAds\V24\Enums\MultiPartyAuthOperationTypeEnum\MultiPartyAuthOperationType;
use Google\Ads\GoogleAds\V24\Enums\MultiPartyAuthReviewStatusEnum\MultiPartyAuthReviewStatus;
use Google\Ads\GoogleAds\V24\Enums\MultiPartyAuthReviewTargetResourceEnum\MultiPartyAuthReviewTargetResource;
use Google\Ads\GoogleAds\V24\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V24\Services\ResolveMultiPartyAuthReviewOperation;
use Google\Ads\GoogleAds\V24\Services\ResolveMultiPartyAuthReviewRequest;
use Google\Ads\GoogleAds\V24\Services\SearchGoogleAdsStreamRequest;
use Google\ApiCore\ApiException;

/**
 * This example fetches pending multi-party approvals and approves the first one.
 *
 * Multi-party authorization (MPA) reviews can only be resolved one at a time.
 * In this code example, we illustrate approving the first pending review request.
 */
class FetchAndApprovePendingMultiPartyAuthReviews
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
        // Retrieve the list of pending MPA reviews.
        $pendingReviews = self::fetchPendingMpaReviews($googleAdsClient, $customerId);

        if (!empty($pendingReviews)) {
            // Multi-party auth reviews can only be resolved one at a time. In this
            // code example, we illustrate approving the first pending review request.
            self::approveMpaReview($googleAdsClient, $customerId, $pendingReviews[0]);
        }
    }

    // [START fetch_mpa_review]
    /**
     * Fetches the pending MPA reviews.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @return string[] a list of resource names for the pending multi-party auth reviews
     */
    private static function fetchPendingMpaReviews(
        GoogleAdsClient $googleAdsClient,
        int $customerId
    ): array {
        $pendingReviews = [];
        $googleAdsServiceClient = $googleAdsClient->getGoogleAdsServiceClient();

        // Create a query that will retrieve all the pending MPA reviews.
        $query = "SELECT
            multi_party_auth_review.resource_name,
            multi_party_auth_review.multi_party_auth_review_id,
            multi_party_auth_review.creation_date_time,
            multi_party_auth_review.request_user_email,
            multi_party_auth_review.operation_type,
            multi_party_auth_review.justification,
            multi_party_auth_review.target_resource,
            multi_party_auth_review.customer_user_access_review.old_customer_user_access,
            multi_party_auth_review.customer_user_access_review.new_customer_user_access,
            multi_party_auth_review.customer_user_access_invitation_review.new_customer_user_access_invitation
            FROM multi_party_auth_review
            WHERE multi_party_auth_review.review_status = 'PENDING'";

        $stream = $googleAdsServiceClient->searchStream(
            SearchGoogleAdsStreamRequest::build($customerId, $query)
        );

        foreach ($stream->readAll() as $serverStreamResponse) {
            foreach ($serverStreamResponse->getResults() as $row) {
                $mpaReview = $row->getMultiPartyAuthReview();
                printf(
                    "%s created a pending multi-party auth review with ID %d at %s. " .
                    "This request is for target resource type = %s and operation type = %s. " .
                    "The justification is \"%s\".%s",
                    $mpaReview->getRequestUserEmail(),
                    $mpaReview->getMultiPartyAuthReviewId(),
                    $mpaReview->getCreationDateTime(),
                    MultiPartyAuthReviewTargetResource::name($mpaReview->getTargetResource()),
                    MultiPartyAuthOperationType::name($mpaReview->getOperationType()),
                    $mpaReview->getJustification(),
                    PHP_EOL
                );

                if (
                    $mpaReview->getTargetResource()
                    === MultiPartyAuthReviewTargetResource::CUSTOMER_USER_ACCESS
                ) {
                    $accessReview = $mpaReview->getCustomerUserAccessReview();
                    if ($mpaReview->getOperationType() === MultiPartyAuthOperationType::UPDATE) {
                        // When updating a customer user access, only the new access level
                        // is populated.
                        printf(
                            "Old resource name: %s, new access role: %s.%s",
                            $accessReview->getOldCustomerUserAccess(),
                            AccessRole::name($accessReview->getNewCustomerUserAccess()->getAccessRole()),
                            PHP_EOL
                        );
                    } elseif ($mpaReview->getOperationType() === MultiPartyAuthOperationType::REMOVE) {
                        printf(
                            "Old resource name: %s.%s",
                            $accessReview->getOldCustomerUserAccess(),
                            PHP_EOL
                        );
                    }
                } elseif (
                    $mpaReview->getTargetResource()
                    === MultiPartyAuthReviewTargetResource::CUSTOMER_USER_ACCESS_INVITATION
                ) {
                    $newInvite = $mpaReview->getCustomerUserAccessInvitationReview()
                        ->getNewCustomerUserAccessInvitation();
                    printf(
                        "Invitation email address: %s, Role: %s.%s",
                        $newInvite->getEmailAddress(),
                        AccessRole::name($newInvite->getAccessRole()),
                        PHP_EOL
                    );
                }

                $pendingReviews[] = $mpaReview->getResourceName();
            }
        }

        return $pendingReviews;
    }
    // [END fetch_mpa_review]

    // [START approve_mpa_review]
    /**
     * Approves the MPA auth review.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param string $pendingReview the resource name of the pending review
     */
    private static function approveMpaReview(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        string $pendingReview
    ) {
        $mpaReviewServiceClient = $googleAdsClient->getMultiPartyAuthReviewServiceClient();

        // Currently, you can only approve one request at a time. In addition, the approvals
        // can only be done by a second administrator.
        $operation = new ResolveMultiPartyAuthReviewOperation([
            'multi_party_auth_review' => $pendingReview,
            'new_status' => MultiPartyAuthReviewStatus::APPROVED
        ]);

        $request = ResolveMultiPartyAuthReviewRequest::build($customerId, [$operation]);
        $response = $mpaReviewServiceClient->resolveMultiPartyAuthReview($request);

        /** @var \Google\Ads\GoogleAds\V24\Services\ResolveMultiPartyAuthReviewResultOrError $resultOrError */
        $resultOrError = $response->getResultOrError()[0];

        if ($resultOrError->hasResult()) {
            $result = $resultOrError->getResult();
            printf("Approved multi-party auth review: %s.%s", $result->getMultiPartyAuthReview(), PHP_EOL);

            if (!empty($result->getCustomerUserAccessInvitation())) {
                printf(
                    "New user invitation created: %s%s",
                    $result->getCustomerUserAccessInvitation(),
                    PHP_EOL
                );
            } elseif (!empty($result->getCustomerUserAccess())) {
                printf(
                    "Affected customer user access resource: %s%s",
                    $result->getCustomerUserAccess(),
                    PHP_EOL
                );
            }
        } elseif ($resultOrError->hasPartialFailureError()) {
            // Unpack the Rpc\Status into GoogleAdsFailure using the helper.
            $errorsCount = 0;
            $status = $resultOrError->getPartialFailureError();
            $googleAdsFailure = GoogleAdsFailures::fromStatus($status);

            foreach ($googleAdsFailure->getErrors() as $error) {
                printf("\tError with message '%s'.%s", $error->getMessage(), PHP_EOL);
                $errorsCount++;
            }
            printf("%d partial failure error(s) occurred%s", $errorsCount, PHP_EOL);
        }
    }
    // [END approve_mpa_review]
}

FetchAndApprovePendingMultiPartyAuthReviews::main();
