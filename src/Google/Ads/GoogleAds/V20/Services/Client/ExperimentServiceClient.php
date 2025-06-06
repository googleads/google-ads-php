<?php
/*
 * Copyright 2025 Google LLC
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
 * Generated by gapic-generator-php from the file
 * https://github.com/googleapis/googleapis/blob/master/google/ads/googleads/v20/services/experiment_service.proto
 * Updates to the above are reflected here through a refresh process.
 */

namespace Google\Ads\GoogleAds\V20\Services\Client;

use Google\Ads\GoogleAds\Lib\V20\GoogleAdsGapicClientTrait;
use Google\Ads\GoogleAds\V20\Services\EndExperimentRequest;
use Google\Ads\GoogleAds\V20\Services\GraduateExperimentRequest;
use Google\Ads\GoogleAds\V20\Services\ListExperimentAsyncErrorsRequest;
use Google\Ads\GoogleAds\V20\Services\MutateExperimentsRequest;
use Google\Ads\GoogleAds\V20\Services\MutateExperimentsResponse;
use Google\Ads\GoogleAds\V20\Services\PromoteExperimentRequest;
use Google\Ads\GoogleAds\V20\Services\ScheduleExperimentRequest;
use Google\ApiCore\ApiException;
use Google\ApiCore\CredentialsWrapper;
use Google\ApiCore\GapicClientTrait;
use Google\ApiCore\OperationResponse;
use Google\ApiCore\PagedListResponse;
use Google\ApiCore\ResourceHelperTrait;
use Google\ApiCore\RetrySettings;
use Google\ApiCore\Transport\TransportInterface;
use Google\ApiCore\ValidationException;
use Google\Auth\FetchAuthTokenInterface;
use Google\LongRunning\Client\OperationsClient;
use Google\LongRunning\Operation;
use GuzzleHttp\Promise\PromiseInterface;
use Psr\Log\LoggerInterface;

/**
 * Service Description: Service to manage experiments.
 *
 * This class provides the ability to make remote calls to the backing service through method
 * calls that map to API methods.
 *
 * Many parameters require resource names to be formatted in a particular way. To
 * assist with these names, this class includes a format method for each type of
 * name, and additionally a parseName method to extract the individual identifiers
 * contained within formatted names that are returned by the API.
 *
 * @method PromiseInterface<void> endExperimentAsync(EndExperimentRequest $request, array $optionalArgs = [])
 * @method PromiseInterface<void> graduateExperimentAsync(GraduateExperimentRequest $request, array $optionalArgs = [])
 * @method PromiseInterface<PagedListResponse> listExperimentAsyncErrorsAsync(ListExperimentAsyncErrorsRequest $request, array $optionalArgs = [])
 * @method PromiseInterface<MutateExperimentsResponse> mutateExperimentsAsync(MutateExperimentsRequest $request, array $optionalArgs = [])
 * @method PromiseInterface<OperationResponse> promoteExperimentAsync(PromoteExperimentRequest $request, array $optionalArgs = [])
 * @method PromiseInterface<OperationResponse> scheduleExperimentAsync(ScheduleExperimentRequest $request, array $optionalArgs = [])
 */
class ExperimentServiceClient
{
    use GapicClientTrait, GoogleAdsGapicClientTrait {
        GoogleAdsGapicClientTrait::modifyClientOptions insteadof GapicClientTrait;
        GoogleAdsGapicClientTrait::modifyUnaryCallable insteadof GapicClientTrait;
        GoogleAdsGapicClientTrait::modifyStreamingCallable insteadof GapicClientTrait;
    }
    use ResourceHelperTrait;

    /** The name of the service. */
    private const SERVICE_NAME = 'google.ads.googleads.v20.services.ExperimentService';

    /**
     * The default address of the service.
     *
     * @deprecated SERVICE_ADDRESS_TEMPLATE should be used instead.
     */
    private const SERVICE_ADDRESS = 'googleads.googleapis.com';

    /** The address template of the service. */
    private const SERVICE_ADDRESS_TEMPLATE = 'googleads.UNIVERSE_DOMAIN';

    /** The default port of the service. */
    private const DEFAULT_SERVICE_PORT = 443;

    /** The name of the code generator, to be included in the agent header. */
    private const CODEGEN_NAME = 'gapic';

    /** The default scopes required by the service. */
    public static $serviceScopes = [
        'https://www.googleapis.com/auth/adwords',
    ];

    private $operationsClient;

    private static function getClientDefaults()
    {
        return [
            'serviceName' => self::SERVICE_NAME,
            'apiEndpoint' => self::SERVICE_ADDRESS . ':' . self::DEFAULT_SERVICE_PORT,
            'clientConfig' => __DIR__ . '/../resources/experiment_service_client_config.json',
            'descriptorsConfigPath' => __DIR__ . '/../resources/experiment_service_descriptor_config.php',
            'gcpApiConfigPath' => __DIR__ . '/../resources/experiment_service_grpc_config.json',
            'credentialsConfig' => [
                'defaultScopes' => self::$serviceScopes,
            ],
            'transportConfig' => [
                'rest' => [
                    'restClientConfigPath' => __DIR__ . '/../resources/experiment_service_rest_client_config.php',
                ],
            ],
        ];
    }

    /**
     * Return an OperationsClient object with the same endpoint as $this.
     *
     * @return OperationsClient
     */
    public function getOperationsClient()
    {
        return $this->operationsClient;
    }

    /**
     * Resume an existing long running operation that was previously started by a long
     * running API method. If $methodName is not provided, or does not match a long
     * running API method, then the operation can still be resumed, but the
     * OperationResponse object will not deserialize the final response.
     *
     * @param string $operationName The name of the long running operation
     * @param string $methodName    The name of the method used to start the operation
     *
     * @return OperationResponse
     */
    public function resumeOperation($operationName, $methodName = null)
    {
        $options = isset($this->descriptors[$methodName]['longRunning']) ? $this->descriptors[$methodName]['longRunning'] : [];
        $operation = new OperationResponse($operationName, $this->getOperationsClient(), $options);
        $operation->reload();
        return $operation;
    }

    /**
     * Create the default operation client for the service.
     *
     * @param array $options ClientOptions for the client.
     *
     * @return OperationsClient
     */
    private function createOperationsClient(array $options)
    {
        // Unset client-specific configuration options
        unset($options['serviceName'], $options['clientConfig'], $options['descriptorsConfigPath']);

        if (isset($options['operationsClient'])) {
            return $options['operationsClient'];
        }

        return new OperationsClient($options);
    }

    /**
     * Formats a string containing the fully-qualified path to represent a campaign
     * resource.
     *
     * @param string $customerId
     * @param string $campaignId
     *
     * @return string The formatted campaign resource.
     */
    public static function campaignName(string $customerId, string $campaignId): string
    {
        return self::getPathTemplate('campaign')->render([
            'customer_id' => $customerId,
            'campaign_id' => $campaignId,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent a
     * campaign_budget resource.
     *
     * @param string $customerId
     * @param string $campaignBudgetId
     *
     * @return string The formatted campaign_budget resource.
     */
    public static function campaignBudgetName(string $customerId, string $campaignBudgetId): string
    {
        return self::getPathTemplate('campaignBudget')->render([
            'customer_id' => $customerId,
            'campaign_budget_id' => $campaignBudgetId,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent a experiment
     * resource.
     *
     * @param string $customerId
     * @param string $trialId
     *
     * @return string The formatted experiment resource.
     */
    public static function experimentName(string $customerId, string $trialId): string
    {
        return self::getPathTemplate('experiment')->render([
            'customer_id' => $customerId,
            'trial_id' => $trialId,
        ]);
    }

    /**
     * Parses a formatted name string and returns an associative array of the components in the name.
     * The following name formats are supported:
     * Template: Pattern
     * - campaign: customers/{customer_id}/campaigns/{campaign_id}
     * - campaignBudget: customers/{customer_id}/campaignBudgets/{campaign_budget_id}
     * - experiment: customers/{customer_id}/experiments/{trial_id}
     *
     * The optional $template argument can be supplied to specify a particular pattern,
     * and must match one of the templates listed above. If no $template argument is
     * provided, or if the $template argument does not match one of the templates
     * listed, then parseName will check each of the supported templates, and return
     * the first match.
     *
     * @param string  $formattedName The formatted name string
     * @param ?string $template      Optional name of template to match
     *
     * @return array An associative array from name component IDs to component values.
     *
     * @throws ValidationException If $formattedName could not be matched.
     */
    public static function parseName(string $formattedName, ?string $template = null): array
    {
        return self::parseFormattedName($formattedName, $template);
    }

    /**
     * Constructor.
     *
     * @param array $options {
     *     Optional. Options for configuring the service API wrapper.
     *
     *     @type string $apiEndpoint
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
     *           *Important*: If you accept a credential configuration (credential
     *           JSON/File/Stream) from an external source for authentication to Google Cloud
     *           Platform, you must validate it before providing it to any Google API or library.
     *           Providing an unvalidated credential configuration to Google APIs can compromise
     *           the security of your systems and data. For more information {@see
     *           https://cloud.google.com/docs/authentication/external/externally-sourced-credentials}
     *     @type array $credentialsConfig
     *           Options used to configure credentials, including auth token caching, for the
     *           client. For a full list of supporting configuration options, see
     *           {@see \Google\ApiCore\CredentialsWrapper::build()} .
     *     @type bool $disableRetries
     *           Determines whether or not retries defined by the client configuration should be
     *           disabled. Defaults to `false`.
     *     @type string|array $clientConfig
     *           Client method configuration, including retry settings. This option can be either
     *           a path to a JSON file, or a PHP array containing the decoded JSON data. By
     *           default this settings points to the default client config file, which is
     *           provided in the resources folder.
     *     @type string|TransportInterface $transport
     *           The transport used for executing network requests. May be either the string
     *           `rest` or `grpc`. Defaults to `grpc` if gRPC support is detected on the system.
     *           *Advanced usage*: Additionally, it is possible to pass in an already
     *           instantiated {@see \Google\ApiCore\Transport\TransportInterface} object. Note
     *           that when this object is provided, any settings in $transportConfig, and any
     *           $apiEndpoint setting, will be ignored.
     *     @type array $transportConfig
     *           Configuration options that will be used to construct the transport. Options for
     *           each supported transport type should be passed in a key for that transport. For
     *           example:
     *           $transportConfig = [
     *               'grpc' => [...],
     *               'rest' => [...],
     *           ];
     *           See the {@see \Google\ApiCore\Transport\GrpcTransport::build()} and
     *           {@see \Google\ApiCore\Transport\RestTransport::build()} methods for the
     *           supported options.
     *     @type callable $clientCertSource
     *           A callable which returns the client cert as a string. This can be used to
     *           provide a certificate and private key to the transport layer for mTLS.
     *     @type false|LoggerInterface $logger
     *           A PSR-3 compliant logger. If set to false, logging is disabled, ignoring the
     *           'GOOGLE_SDK_PHP_LOGGING' environment flag
     * }
     *
     * @throws ValidationException
     */
    public function __construct(array $options = [])
    {
        $clientOptions = $this->buildClientOptions($options);
        $this->setClientOptions($clientOptions);
        $this->operationsClient = $this->createOperationsClient($clientOptions);
    }

    /** Handles execution of the async variants for each documented method. */
    public function __call($method, $args)
    {
        if (substr($method, -5) !== 'Async') {
            trigger_error('Call to undefined method ' . __CLASS__ . "::$method()", E_USER_ERROR);
        }

        array_unshift($args, substr($method, 0, -5));
        return call_user_func_array([$this, 'startAsyncCall'], $args);
    }

    /**
     * Immediately ends an experiment, changing the experiment's scheduled
     * end date and without waiting for end of day. End date is updated to be the
     * time of the request.
     *
     * List of thrown errors:
     * [AuthenticationError]()
     * [AuthorizationError]()
     * [ExperimentError]()
     * [HeaderError]()
     * [InternalError]()
     * [QuotaError]()
     * [RequestError]()
     *
     * The async variant is {@see ExperimentServiceClient::endExperimentAsync()} .
     *
     * @param EndExperimentRequest $request     A request to house fields associated with the call.
     * @param array                $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function endExperiment(EndExperimentRequest $request, array $callOptions = []): void
    {
        $this->startApiCall('EndExperiment', $request, $callOptions)->wait();
    }

    /**
     * Graduates an experiment to a full campaign.
     *
     * List of thrown errors:
     * [AuthenticationError]()
     * [AuthorizationError]()
     * [ExperimentError]()
     * [HeaderError]()
     * [InternalError]()
     * [MutateError]()
     * [QuotaError]()
     * [RequestError]()
     *
     * The async variant is {@see ExperimentServiceClient::graduateExperimentAsync()} .
     *
     * @param GraduateExperimentRequest $request     A request to house fields associated with the call.
     * @param array                     $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function graduateExperiment(GraduateExperimentRequest $request, array $callOptions = []): void
    {
        $this->startApiCall('GraduateExperiment', $request, $callOptions)->wait();
    }

    /**
     * Returns all errors that occurred during the last Experiment update (either
     * scheduling or promotion).
     * Supports standard list paging.
     *
     * List of thrown errors:
     * [AuthenticationError]()
     * [AuthorizationError]()
     * [HeaderError]()
     * [InternalError]()
     * [QuotaError]()
     * [RequestError]()
     *
     * The async variant is
     * {@see ExperimentServiceClient::listExperimentAsyncErrorsAsync()} .
     *
     * @param ListExperimentAsyncErrorsRequest $request     A request to house fields associated with the call.
     * @param array                            $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return PagedListResponse
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function listExperimentAsyncErrors(ListExperimentAsyncErrorsRequest $request, array $callOptions = []): PagedListResponse
    {
        return $this->startApiCall('ListExperimentAsyncErrors', $request, $callOptions);
    }

    /**
     * Creates, updates, or removes experiments. Operation statuses are returned.
     *
     * List of thrown errors:
     * [AuthenticationError]()
     * [AuthorizationError]()
     * [ExperimentError]()
     * [HeaderError]()
     * [InternalError]()
     * [QuotaError]()
     * [RequestError]()
     *
     * The async variant is {@see ExperimentServiceClient::mutateExperimentsAsync()} .
     *
     * @param MutateExperimentsRequest $request     A request to house fields associated with the call.
     * @param array                    $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return MutateExperimentsResponse
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function mutateExperiments(MutateExperimentsRequest $request, array $callOptions = []): MutateExperimentsResponse
    {
        return $this->startApiCall('MutateExperiments', $request, $callOptions)->wait();
    }

    /**
     * Promotes the trial campaign thus applying changes in the trial campaign
     * to the base campaign.
     * This method returns a long running operation that tracks the promotion of
     * the experiment campaign. If it fails, a list of errors can be retrieved
     * using the ListExperimentAsyncErrors method. The operation's
     * metadata will be a string containing the resource name of the created
     * experiment.
     *
     * List of thrown errors:
     * [AuthenticationError]()
     * [AuthorizationError]()
     * [ExperimentError]()
     * [HeaderError]()
     * [InternalError]()
     * [QuotaError]()
     * [RequestError]()
     *
     * The async variant is {@see ExperimentServiceClient::promoteExperimentAsync()} .
     *
     * @param PromoteExperimentRequest $request     A request to house fields associated with the call.
     * @param array                    $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return OperationResponse
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function promoteExperiment(PromoteExperimentRequest $request, array $callOptions = []): OperationResponse
    {
        return $this->startApiCall('PromoteExperiment', $request, $callOptions)->wait();
    }

    /**
     * Schedule an experiment. The in design campaign
     * will be converted into a real campaign (called the experiment campaign)
     * that will begin serving ads if successfully created.
     *
     * The experiment is scheduled immediately with status INITIALIZING.
     * This method returns a long running operation that tracks the forking of the
     * in design campaign. If the forking fails, a list of errors can be retrieved
     * using the ListExperimentAsyncErrors method. The operation's
     * metadata will be a string containing the resource name of the created
     * experiment.
     *
     * List of thrown errors:
     * [AuthenticationError]()
     * [AuthorizationError]()
     * [ExperimentError]()
     * [DatabaseError]()
     * [DateError]()
     * [DateRangeError]()
     * [FieldError]()
     * [HeaderError]()
     * [InternalError]()
     * [QuotaError]()
     * [RangeError]()
     * [RequestError]()
     *
     * The async variant is {@see ExperimentServiceClient::scheduleExperimentAsync()} .
     *
     * @param ScheduleExperimentRequest $request     A request to house fields associated with the call.
     * @param array                     $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return OperationResponse
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function scheduleExperiment(ScheduleExperimentRequest $request, array $callOptions = []): OperationResponse
    {
        return $this->startApiCall('ScheduleExperiment', $request, $callOptions)->wait();
    }
}
