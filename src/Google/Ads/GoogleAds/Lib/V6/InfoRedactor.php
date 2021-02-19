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

namespace Google\Ads\GoogleAds\Lib\V6;

use Google\Ads\GoogleAds\V6\Resources\ChangeEvent;
use Google\Ads\GoogleAds\V6\Resources\CustomerUserAccess;
use Google\Ads\GoogleAds\V6\Resources\CustomerUserAccessInvitation;
use Google\Ads\GoogleAds\V6\Resources\Feed;
use Google\Ads\GoogleAds\V6\Services\CreateCustomerClientRequest;
use Google\Ads\GoogleAds\V6\Services\FeedOperation;
use Google\Ads\GoogleAds\V6\Services\GoogleAdsRow;
use Google\Ads\GoogleAds\V6\Services\MutateCustomerUserAccessInvitationRequest;
use Google\Ads\GoogleAds\V6\Services\MutateCustomerUserAccessRequest;
use Google\Ads\GoogleAds\V6\Services\MutateFeedsRequest;
use Google\Ads\GoogleAds\V6\Services\SearchGoogleAdsRequest;
use Google\Ads\GoogleAds\V6\Services\SearchGoogleAdsResponse;
use Google\Ads\GoogleAds\V6\Services\SearchGoogleAdsStreamRequest;
use Google\Ads\GoogleAds\V6\Services\SearchGoogleAdsStreamResponse;
use Google\Protobuf\Internal\Message;

/**
 * Redacts sensitive information of API requests and responses.
 */
class InfoRedactor
{
    use GoogleAdsMetadataTrait;

    private const REDACTED_STRING = 'REDACTED';
    // A preg_match format which searches for a WHERE clause of a specified field. "%s" is replaced
    // by the field using sprintf().
    private const SENSITIVE_TEXT_SEARCH_FORMAT = '/(SELECT.+WHERE.+%s.+?[\'"])\S+?([\'"])/i';
    private const SENSITIVE_TEXT_REPLACEMENT_FORMAT = '$1%s$2';

    /** @var array the list of customer user access' fields containing email addresses. */
    private static $CUSTOMER_USER_ACCESS_EMAIL_FIELDS;
    /**
     * @var array the list of customer user access invitation' fields containing email addresses.
     */
    private static $CUSTOMER_USER_ACCESS_INVITATION_EMAIL_FIELDS;
    /** @var array the list of change event's fields containing email addresses. */
    private static $CHANGE_EVENT_EMAIL_FIELDS;
    /** @var array the list of feed placeholder's fields containing email addresses. */
    private static $FEED_EMAIL_FIELDS;
    /** @var array the map of header keys to redacted values. */
    private static $HEADER_KEYS_TO_REDACTED_VALUES;

    public function __construct()
    {
        // Initializes the private constants, as PHP doesn't support constants of an array type.
        self::$CUSTOMER_USER_ACCESS_EMAIL_FIELDS = [
            'customer_user_access.inviter_user_email_address',
            'customer_user_access.email_address'
        ];
        self::$CUSTOMER_USER_ACCESS_INVITATION_EMAIL_FIELDS =
            ['customer_user_access_invitation.email_address'];
        self::$CHANGE_EVENT_EMAIL_FIELDS = ['change_event.user_email'];
        self::$FEED_EMAIL_FIELDS = ['feed.places_location_feed_data.email_address'];
    }

    /**
     * Redacts the specified headers with the provided redacted values.
     *
     * @param array $headers the headers to be redacted
     * @param array|null $headerKeysToRedactedValues the mapping from keys to values needing
     *     redaction
     * @return array the headers with values redacted
     */
    public function redactHeaders(
        array $headers,
        array $headerKeysToRedactedValues = null
    ) {
        $headerKeysToRedactedValues =
            $headerKeysToRedactedValues ?: self::getDefaultHeaderKeysToRedactedValues();
        foreach ($headers as $header => $value) {
            if (array_key_exists($header, $headerKeysToRedactedValues)) {
                $headers[$header] = $headerKeysToRedactedValues[$header];
            }
        }
        return $headers;
    }

    /**
     * @return array the mapping of header keys to redacted values
     */
    private static function getDefaultHeaderKeysToRedactedValues()
    {
        if (!isset(self::$HEADER_KEYS_TO_REDACTED_VALUES)) {
            self::$HEADER_KEYS_TO_REDACTED_VALUES = [
                self::$DEVELOPER_TOKEN_HEADER_KEY => self::REDACTED_STRING
            ];
        }

        return self::$HEADER_KEYS_TO_REDACTED_VALUES;
    }

    /**
     * Redacts sensitive information of the provided request or response body.
     *
     * @param Message $body a request or response body
     * @return Message the body whose relevant fields are redacted
     */
    public function redactBody(Message $body)
    {
        return $this->maskEmails($body);
    }

    /**
     * Masks email addresses existing in relevant fields of a request or response body.
     *
     * @param Message $body a request or response body
     * @return Message the body that have emails in their relevant fields masked
     */
    private function maskEmails(Message $body)
    {
        // Note: It is important to clone the object first, or we will rewrite the response
        // returned to the user.
        if (
            $body instanceof SearchGoogleAdsRequest
            || $body instanceof SearchGoogleAdsStreamRequest
        ) {
            $clone = self::cloneBody($body);
            self::redactSearchRequest($clone);
            return $clone;
        } elseif (
            $body instanceof SearchGoogleAdsResponse
            || $body instanceof SearchGoogleAdsStreamResponse
        ) {
            $clone = self::cloneBody($body);
            self::redactSearchResponse($clone);
            return $clone;
        } elseif ($body instanceof CustomerUserAccess) {
            // Handle masking for `CustomerUserAccessService::getCustomerUserAccess`.
            $clone = self::cloneBody($body);
            self::redactCustomerUserAccess($clone);
            return $clone;
        } elseif ($body instanceof MutateCustomerUserAccessRequest) {
            // Handle masking for `CustomerUserAccessService::mutateCustomerUserAccess`.
            $clone = self::cloneBody($body);
            if (!is_null($clone->getOperation()) && !is_null($clone->getOperation()->getUpdate())) {
                self::redactCustomerUserAccess($clone->getOperation()->getUpdate());
                return $clone;
            }
        } elseif ($body instanceof CustomerUserAccessInvitation) {
            // Handle masking for
            // `CustomerUserAccessInvitationService::getCustomerUserAccessInvitation`.
            $clone = self::cloneBody($body);
            self::redactCustomerUserAccessInvitation($clone);
            return $clone;
        } elseif ($body instanceof MutateCustomerUserAccessInvitationRequest) {
            // Handle masking for
            // `CustomerUserAccessInvitationService::mutateCustomerUserAccessInvitation`.
            $clone = self::cloneBody($body);
            if (!is_null($clone->getOperation()) && !is_null($clone->getOperation()->getCreate())) {
                self::redactCustomerUserAccessInvitation($clone->getOperation()->getCreate());
                return $clone;
            }
        } elseif ($body instanceof CreateCustomerClientRequest) {
            // Handle masking for `CreateCustomerClientRequest`.
            $clone = self::cloneBody($body);
            self::redactCreateCustomerClientRequest($clone);
            return $clone;
        } elseif ($body instanceof Feed) {
            // Handle masking for `FeedService::getFeed`.
            $clone = self::cloneBody($body);
            self::redactFeed($clone);
            return $clone;
        } elseif ($body instanceof MutateFeedsRequest) {
            // Handle masking for `FeedService::mutateFeeds`.
            if (!empty($body->getOperations())) {
                $clone = self::cloneBody($body);
                foreach ($clone->getOperations() as $operation) {
                    /** @var FeedOperation $operation  */
                    if (!is_null($operation->getUpdate())) {
                        self::redactFeed($operation->getUpdate());
                    } elseif (!is_null($operation->getCreate())) {
                        self::redactFeed($operation->getCreate());
                    }
                }
                return $clone;
            }
        }
        return $body;
    }

    /**
     * @param Message $body a body to be cloned
     * @return mixed the cloned body
     */
    private static function cloneBody(Message $body)
    {
        $className = get_class($body);
        $clone = new $className();
        $clone->mergeFrom($body);
        return $clone;
    }

    /**
     * Redacts sensitive information from the GAQL query of the provided `SearchGoogleAdsRequest`
     * or `SearchGoogleAdsStreamRequest`.
     *
     * @param SearchGoogleAdsRequest|SearchGoogleAdsStreamRequest $request the request whose GAQL
     *     query will be redacted
     */
    private static function redactSearchRequest($request)
    {
        $redactedQuery = $request->getQuery();
        // Mask any emails in the WHERE clause of the GAQL query of the request.
        foreach (
            array_merge(
                self::$CUSTOMER_USER_ACCESS_EMAIL_FIELDS,
                self::$CUSTOMER_USER_ACCESS_INVITATION_EMAIL_FIELDS,
                self::$CHANGE_EVENT_EMAIL_FIELDS,
                self::$FEED_EMAIL_FIELDS
            ) as $field
        ) {
            $redactedQuery = preg_replace(
                sprintf(self::SENSITIVE_TEXT_SEARCH_FORMAT, str_replace('.', '\.', $field)),
                sprintf(self::SENSITIVE_TEXT_REPLACEMENT_FORMAT, self::REDACTED_STRING),
                $redactedQuery
            );
        }
        $request->setQuery($redactedQuery);
    }

    /**
     * Redacts sensitive information from the provided `SearchGoogleAdsResponse` or
     * `SearchGoogleAdsStreamResponse`.
     *
     * @param SearchGoogleAdsResponse|SearchGoogleAdsStreamResponse $response the response to be
     *     redacted
     */
    private static function redactSearchResponse($response)
    {
        // Handle masking for `GoogleAdsService::Search` and `GoogleAdsService::SearchStream`.
        // Note: We are taking advantage of the fact that when using the above methods,
        // the response contains the read field masks. We can examine them and skip
        // masking if the fields of interest aren't present in the list.
        if (is_null($response->getFieldMask())) {
            return;
        }
        foreach ($response->getFieldMask()->getPaths() as $path) {
            foreach ($response->getResults() as $result) {
                /** @var GoogleAdsRow $result */
                if (in_array($path, self::$CUSTOMER_USER_ACCESS_EMAIL_FIELDS)) {
                    self::redactCustomerUserAccess($result->getCustomerUserAccess());
                } elseif (in_array($path, self::$CUSTOMER_USER_ACCESS_INVITATION_EMAIL_FIELDS)) {
                    self::redactCustomerUserAccessInvitation(
                        $result->getCustomerUserAccessInvitation()
                    );
                } elseif (in_array($path, self::$CHANGE_EVENT_EMAIL_FIELDS)) {
                    self::redactChangeEvent($result->getChangeEvent());
                } elseif (in_array($path, self::$FEED_EMAIL_FIELDS)) {
                    self::redactFeed($result->getFeed());
                }
            }
        }
    }

    /**
     * Redacts sensitive information of the provided customer user access.
     *
     * @param CustomerUserAccess $customerUserAccess
     * @return CustomerUserAccess the customer user access with sensitive information redacted
     */
    private static function redactCustomerUserAccess(CustomerUserAccess $customerUserAccess)
    {
        if ($customerUserAccess->hasInviterUserEmailAddress()) {
            $customerUserAccess->setInviterUserEmailAddress(self::REDACTED_STRING);
        }
        if ($customerUserAccess->hasEmailAddress()) {
            $customerUserAccess->setEmailAddress(self::REDACTED_STRING);
        }
        return $customerUserAccess;
    }

    /**
     * Redacts sensitive information of the provided customer user access invitation.
     *
     * @param CustomerUserAccessInvitation $customerUserAccessInvitation
     * @return CustomerUserAccessInvitation the customer user access invitation with sensitive
     *     information redacted
     */
    private static function redactCustomerUserAccessInvitation(
        CustomerUserAccessInvitation $customerUserAccessInvitation
    ) {
        if (!empty($customerUserAccessInvitation->getEmailAddress())) {
            $customerUserAccessInvitation->setEmailAddress(self::REDACTED_STRING);
        }
        return $customerUserAccessInvitation;
    }

    /**
     * Redacts sensitive information of the provided `CreateCustomerClientRequest`.
     *
     * @param CreateCustomerClientRequest $createCustomerClientRequest
     * @return CreateCustomerClientRequest the `CreateCustomerClientRequest` object with sensitive
     *     information redacted
     */
    private static function redactCreateCustomerClientRequest(
        CreateCustomerClientRequest $createCustomerClientRequest
    ) {
        if ($createCustomerClientRequest->hasEmailAddress()) {
            $createCustomerClientRequest->setEmailAddress(self::REDACTED_STRING);
        }
        return $createCustomerClientRequest;
    }

    /**
     * Redacts sensitive information of the provided change event.
     *
     * @param ChangeEvent $changeEvent
     */
    private static function redactChangeEvent(ChangeEvent $changeEvent)
    {
        $changeEvent->setUserEmail(self::REDACTED_STRING);
    }

    /**
     * Redacts sensitive information of the provided feed.
     *
     * @param Feed $feed
     */
    private static function redactFeed(Feed $feed)
    {
        if (
            !is_null($feed->getPlacesLocationFeedData())
            && $feed->getPlacesLocationFeedData()->hasEmailAddress()
        ) {
            $feed->getPlacesLocationFeedData()->setEmailAddress(self::REDACTED_STRING);
        }
    }
}
