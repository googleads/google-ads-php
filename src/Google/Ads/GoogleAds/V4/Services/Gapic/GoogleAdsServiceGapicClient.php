<?php
/*
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

/*
 * GENERATED CODE WARNING
 * This file was generated from the file
 * https://github.com/google/googleapis/blob/master/google/ads/googleads/v4/services/google_ads_service.proto
 * and updates to that file get reflected here through a refresh process.
 *
 * @experimental
 */

namespace Google\Ads\GoogleAds\V4\Services\Gapic;

use Google\Ads\GoogleAds\V4\Enums\SummaryRowSettingEnum\SummaryRowSetting;
use Google\Ads\GoogleAds\V4\Services\MutateGoogleAdsRequest;
use Google\Ads\GoogleAds\V4\Services\MutateGoogleAdsResponse;
use Google\Ads\GoogleAds\V4\Services\MutateOperation;
use Google\Ads\GoogleAds\V4\Services\SearchGoogleAdsRequest;
use Google\Ads\GoogleAds\V4\Services\SearchGoogleAdsResponse;
use Google\Ads\GoogleAds\V4\Services\SearchGoogleAdsStreamRequest;
use Google\Ads\GoogleAds\V4\Services\SearchGoogleAdsStreamResponse;
use Google\ApiCore\ApiException;
use Google\ApiCore\Call;
use Google\ApiCore\CredentialsWrapper;
use Google\ApiCore\GapicClientTrait;
use Google\ApiCore\RequestParamsHeaderDescriptor;
use Google\ApiCore\RetrySettings;
use Google\ApiCore\Transport\TransportInterface;
use Google\ApiCore\ValidationException;
use Google\Auth\FetchAuthTokenInterface;

/**
 * Service Description: Service to fetch data and metrics across resources.
 *
 * This class provides the ability to make remote calls to the backing service through method
 * calls that map to API methods. Sample code to get started:
 *
 * ```
 * $googleAdsServiceClient = new GoogleAdsServiceClient();
 * try {
 *     $customerId = '';
 *     $query = '';
 *     // Iterate over pages of elements
 *     $pagedResponse = $googleAdsServiceClient->search($customerId, $query);
 *     foreach ($pagedResponse->iteratePages() as $page) {
 *         foreach ($page as $element) {
 *             // doSomethingWith($element);
 *         }
 *     }
 *
 *
 *     // Alternatively:
 *
 *     // Iterate through all elements
 *     $pagedResponse = $googleAdsServiceClient->search($customerId, $query);
 *     foreach ($pagedResponse->iterateAllElements() as $element) {
 *         // doSomethingWith($element);
 *     }
 * } finally {
 *     $googleAdsServiceClient->close();
 * }
 * ```
 *
 * @experimental
 */
class GoogleAdsServiceGapicClient
{
    use GapicClientTrait;

    /**
     * The name of the service.
     */
    const SERVICE_NAME = 'google.ads.googleads.v4.services.GoogleAdsService';

    /**
     * The default address of the service.
     */
    const SERVICE_ADDRESS = 'googleads.googleapis.com';

    /**
     * The default port of the service.
     */
    const DEFAULT_SERVICE_PORT = 443;

    /**
     * The name of the code generator, to be included in the agent header.
     */
    const CODEGEN_NAME = 'gapic';

    /**
     * The default scopes required by the service.
     */
    public static $serviceScopes = [
    ];

    private static function getClientDefaults()
    {
        return [
            'serviceName' => self::SERVICE_NAME,
            'serviceAddress' => self::SERVICE_ADDRESS.':'.self::DEFAULT_SERVICE_PORT,
            'clientConfig' => __DIR__.'/../resources/google_ads_service_client_config.json',
            'descriptorsConfigPath' => __DIR__.'/../resources/google_ads_service_descriptor_config.php',
            'gcpApiConfigPath' => __DIR__.'/../resources/google_ads_service_grpc_config.json',
            'credentialsConfig' => [
                'scopes' => self::$serviceScopes,
            ],
            'transportConfig' => [
                'rest' => [
                    'restClientConfigPath' => __DIR__.'/../resources/google_ads_service_rest_client_config.php',
                ],
            ],
        ];
    }

    /**
     * Constructor.
     *
     * @param array $options {
     *                       Optional. Options for configuring the service API wrapper.
     *
     *     @type string $serviceAddress
     *           The address of the API remote host. May optionally include the port, formatted
     *           as "<uri>:<port>". Default 'googleads.googleapis.com:443'.
     *     @type string|array|FetchAuthTokenInterface|CredentialsWrapper $credentials
     *           The credentials to be used by the client to authorize API calls. This option
     *           accepts either a path to a credentials file, or a decoded credentials file as a
     *           PHP array.
     *           *Advanced usage*: In addition, this option can also accept a pre-constructed
     *           {@see \Google\Auth\FetchAuthTokenInterface} object or
     *           {@see \Google\ApiCore\CredentialsWrapper} object. Note that when one of these
     *           objects are provided, any settings in $credentialsConfig will be ignored.
     *     @type array $credentialsConfig
     *           Options used to configure credentials, including auth token caching, for the client.
     *           For a full list of supporting configuration options, see
     *           {@see \Google\ApiCore\CredentialsWrapper::build()}.
     *     @type bool $disableRetries
     *           Determines whether or not retries defined by the client configuration should be
     *           disabled. Defaults to `false`.
     *     @type string|array $clientConfig
     *           Client method configuration, including retry settings. This option can be either a
     *           path to a JSON file, or a PHP array containing the decoded JSON data.
     *           By default this settings points to the default client config file, which is provided
     *           in the resources folder.
     *     @type string|TransportInterface $transport
     *           The transport used for executing network requests. May be either the string `rest`
     *           or `grpc`. Defaults to `grpc` if gRPC support is detected on the system.
     *           *Advanced usage*: Additionally, it is possible to pass in an already instantiated
     *           {@see \Google\ApiCore\Transport\TransportInterface} object. Note that when this
     *           object is provided, any settings in $transportConfig, and any $serviceAddress
     *           setting, will be ignored.
     *     @type array $transportConfig
     *           Configuration options that will be used to construct the transport. Options for
     *           each supported transport type should be passed in a key for that transport. For
     *           example:
     *           $transportConfig = [
     *               'grpc' => [...],
     *               'rest' => [...]
     *           ];
     *           See the {@see \Google\ApiCore\Transport\GrpcTransport::build()} and
     *           {@see \Google\ApiCore\Transport\RestTransport::build()} methods for the
     *           supported options.
     * }
     *
     * @throws ValidationException
     * @experimental
     */
    public function __construct(array $options = [])
    {
        $clientOptions = $this->buildClientOptions($options);
        $this->setClientOptions($clientOptions);
    }

    /**
     * Returns all rows that match the search query.
     *
     * Sample code:
     * ```
     * $googleAdsServiceClient = new GoogleAdsServiceClient();
     * try {
     *     $customerId = '';
     *     $query = '';
     *     // Iterate over pages of elements
     *     $pagedResponse = $googleAdsServiceClient->search($customerId, $query);
     *     foreach ($pagedResponse->iteratePages() as $page) {
     *         foreach ($page as $element) {
     *             // doSomethingWith($element);
     *         }
     *     }
     *
     *
     *     // Alternatively:
     *
     *     // Iterate through all elements
     *     $pagedResponse = $googleAdsServiceClient->search($customerId, $query);
     *     foreach ($pagedResponse->iterateAllElements() as $element) {
     *         // doSomethingWith($element);
     *     }
     * } finally {
     *     $googleAdsServiceClient->close();
     * }
     * ```
     *
     * @param string $customerId   Required. The ID of the customer being queried.
     * @param string $query        Required. The query string.
     * @param array  $optionalArgs {
     *                             Optional.
     *
     *     @type string $pageToken
     *          A page token is used to specify a page of values to be returned.
     *          If no page token is specified (the default), the first page
     *          of values will be returned. Any page token used here must have
     *          been generated by a previous call to the API.
     *     @type int $pageSize
     *          The maximum number of resources contained in the underlying API
     *          response. The API may return fewer values in a page, even if
     *          there are additional values to be retrieved.
     *     @type bool $validateOnly
     *          If true, the request is validated but not executed.
     *     @type bool $returnTotalResultsCount
     *          If true, the total number of results that match the query ignoring the
     *          LIMIT clause will be included in the response.
     *          Default is false.
     *     @type int $summaryRowSetting
     *          Determines whether a summary row will be returned. By default, summary row
     *          is not returned. If requested, the summary row will be sent in a response
     *          by itself after all other query results are returned.
     *          For allowed values, use constants defined on {@see \Google\Ads\GoogleAds\V4\Enums\SummaryRowSettingEnum\SummaryRowSetting}
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\ApiCore\PagedListResponse
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function search($customerId, $query, array $optionalArgs = [])
    {
        $request = new SearchGoogleAdsRequest();
        $request->setCustomerId($customerId);
        $request->setQuery($query);
        if (isset($optionalArgs['pageToken'])) {
            $request->setPageToken($optionalArgs['pageToken']);
        }
        if (isset($optionalArgs['pageSize'])) {
            $request->setPageSize($optionalArgs['pageSize']);
        }
        if (isset($optionalArgs['validateOnly'])) {
            $request->setValidateOnly($optionalArgs['validateOnly']);
        }
        if (isset($optionalArgs['returnTotalResultsCount'])) {
            $request->setReturnTotalResultsCount($optionalArgs['returnTotalResultsCount']);
        }
        if (isset($optionalArgs['summaryRowSetting'])) {
            $request->setSummaryRowSetting($optionalArgs['summaryRowSetting']);
        }

        $requestParams = new RequestParamsHeaderDescriptor([
          'customer_id' => $request->getCustomerId(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->getPagedListResponse(
            'Search',
            $optionalArgs,
            SearchGoogleAdsResponse::class,
            $request
        );
    }

    /**
     * Returns all rows that match the search stream query.
     *
     * Sample code:
     * ```
     * $googleAdsServiceClient = new GoogleAdsServiceClient();
     * try {
     *     $customerId = '';
     *     $query = '';
     *     // Read all responses until the stream is complete
     *     $stream = $googleAdsServiceClient->searchStream($customerId, $query);
     *     foreach ($stream->readAll() as $element) {
     *         // doSomethingWith($element);
     *     }
     * } finally {
     *     $googleAdsServiceClient->close();
     * }
     * ```
     *
     * @param string $customerId   Required. The ID of the customer being queried.
     * @param string $query        Required. The query string.
     * @param array  $optionalArgs {
     *                             Optional.
     *
     *     @type int $summaryRowSetting
     *          Determines whether a summary row will be returned. By default, summary row
     *          is not returned. If requested, the summary row will be sent in a response
     *          by itself after all other query results are returned.
     *          For allowed values, use constants defined on {@see \Google\Ads\GoogleAds\V4\Enums\SummaryRowSettingEnum\SummaryRowSetting}
     *     @type int $timeoutMillis
     *          Timeout to use for this call.
     * }
     *
     * @return \Google\ApiCore\ServerStream
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function searchStream($customerId, $query, array $optionalArgs = [])
    {
        $request = new SearchGoogleAdsStreamRequest();
        $request->setCustomerId($customerId);
        $request->setQuery($query);
        if (isset($optionalArgs['summaryRowSetting'])) {
            $request->setSummaryRowSetting($optionalArgs['summaryRowSetting']);
        }

        $requestParams = new RequestParamsHeaderDescriptor([
          'customer_id' => $request->getCustomerId(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->startCall(
            'SearchStream',
            SearchGoogleAdsStreamResponse::class,
            $optionalArgs,
            $request,
            Call::SERVER_STREAMING_CALL
        );
    }

    /**
     * Creates, updates, or removes resources. This method supports atomic
     * transactions with multiple types of resources. For example, you can
     * atomically create a campaign and a campaign budget, or perform up to
     * thousands of mutates atomically.
     *
     * This method is essentially a wrapper around a series of mutate methods. The
     * only features it offers over calling those methods directly are:
     *
     * - Atomic transactions
     * - Temp resource names (described below)
     * - Somewhat reduced latency over making a series of mutate calls
     *
     * Note: Only resources that support atomic transactions are included, so this
     * method can't replace all calls to individual services.
     *
     * ## Atomic Transaction Benefits
     *
     * Atomicity makes error handling much easier. If you're making a series of
     * changes and one fails, it can leave your account in an inconsistent state.
     * With atomicity, you either reach the desired state directly, or the request
     * fails and you can retry.
     *
     * ## Temp Resource Names
     *
     * Temp resource names are a special type of resource name used to create a
     * resource and reference that resource in the same request. For example, if a
     * campaign budget is created with `resource_name` equal to
     * `customers/123/campaignBudgets/-1`, that resource name can be reused in
     * the `Campaign.budget` field in the same request. That way, the two
     * resources are created and linked atomically.
     *
     * To create a temp resource name, put a negative number in the part of the
     * name that the server would normally allocate.
     *
     * Note:
     *
     * - Resources must be created with a temp name before the name can be reused.
     *   For example, the previous CampaignBudget+Campaign example would fail if
     *   the mutate order was reversed.
     * - Temp names are not remembered across requests.
     * - There's no limit to the number of temp names in a request.
     * - Each temp name must use a unique negative number, even if the resource
     *   types differ.
     *
     * ## Latency
     *
     * It's important to group mutates by resource type or the request may time
     * out and fail. Latency is roughly equal to a series of calls to individual
     * mutate methods, where each change in resource type is a new call. For
     * example, mutating 10 campaigns then 10 ad groups is like 2 calls, while
     * mutating 1 campaign, 1 ad group, 1 campaign, 1 ad group is like 4 calls.
     *
     * Sample code:
     * ```
     * $googleAdsServiceClient = new GoogleAdsServiceClient();
     * try {
     *     $customerId = '';
     *     $mutateOperations = [];
     *     $response = $googleAdsServiceClient->mutate($customerId, $mutateOperations);
     * } finally {
     *     $googleAdsServiceClient->close();
     * }
     * ```
     *
     * @param string            $customerId       Required. The ID of the customer whose resources are being modified.
     * @param MutateOperation[] $mutateOperations Required. The list of operations to perform on individual resources.
     * @param array             $optionalArgs     {
     *                                            Optional.
     *
     *     @type bool $partialFailure
     *          If true, successful operations will be carried out and invalid
     *          operations will return errors. If false, all operations will be carried
     *          out in one transaction if and only if they are all valid.
     *          Default is false.
     *     @type bool $validateOnly
     *          If true, the request is validated but not executed. Only errors are
     *          returned, not results.
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Ads\GoogleAds\V4\Services\MutateGoogleAdsResponse
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function mutate($customerId, $mutateOperations, array $optionalArgs = [])
    {
        $request = new MutateGoogleAdsRequest();
        $request->setCustomerId($customerId);
        $request->setMutateOperations($mutateOperations);
        if (isset($optionalArgs['partialFailure'])) {
            $request->setPartialFailure($optionalArgs['partialFailure']);
        }
        if (isset($optionalArgs['validateOnly'])) {
            $request->setValidateOnly($optionalArgs['validateOnly']);
        }

        $requestParams = new RequestParamsHeaderDescriptor([
          'customer_id' => $request->getCustomerId(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->startCall(
            'Mutate',
            MutateGoogleAdsResponse::class,
            $optionalArgs,
            $request
        )->wait();
    }
}
