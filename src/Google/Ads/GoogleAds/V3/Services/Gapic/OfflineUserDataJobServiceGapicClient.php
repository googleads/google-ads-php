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
 * https://github.com/google/googleapis/blob/master/google/ads/googleads/v3/services/offline_user_data_job_service.proto
 * and updates to that file get reflected here through a refresh process.
 *
 * @experimental
 */

namespace Google\Ads\GoogleAds\V3\Services\Gapic;

use Google\Ads\GoogleAds\V3\Resources\OfflineUserDataJob;
use Google\Ads\GoogleAds\V3\Services\AddOfflineUserDataJobOperationsRequest;
use Google\Ads\GoogleAds\V3\Services\AddOfflineUserDataJobOperationsResponse;
use Google\Ads\GoogleAds\V3\Services\CreateOfflineUserDataJobRequest;
use Google\Ads\GoogleAds\V3\Services\CreateOfflineUserDataJobResponse;
use Google\Ads\GoogleAds\V3\Services\GetOfflineUserDataJobRequest;
use Google\Ads\GoogleAds\V3\Services\OfflineUserDataJobOperation;
use Google\Ads\GoogleAds\V3\Services\RunOfflineUserDataJobRequest;
use Google\ApiCore\ApiException;
use Google\ApiCore\CredentialsWrapper;
use Google\ApiCore\GapicClientTrait;
use Google\ApiCore\LongRunning\OperationsClient;
use Google\ApiCore\OperationResponse;
use Google\ApiCore\PathTemplate;
use Google\ApiCore\RequestParamsHeaderDescriptor;
use Google\ApiCore\RetrySettings;
use Google\ApiCore\Transport\TransportInterface;
use Google\ApiCore\ValidationException;
use Google\Auth\FetchAuthTokenInterface;
use Google\LongRunning\Operation;
use Google\Protobuf\BoolValue;

/**
 * Service Description: Service to manage offline user data jobs.
 *
 * This class provides the ability to make remote calls to the backing service through method
 * calls that map to API methods. Sample code to get started:
 *
 * ```
 * $offlineUserDataJobServiceClient = new OfflineUserDataJobServiceClient();
 * try {
 *     $formattedResourceName = $offlineUserDataJobServiceClient->offlineUserDataJobName('[CUSTOMER]', '[OFFLINE_USER_DATA_JOB]');
 *     $operationResponse = $offlineUserDataJobServiceClient->runOfflineUserDataJob($formattedResourceName);
 *     $operationResponse->pollUntilComplete();
 *     if ($operationResponse->operationSucceeded()) {
 *         // operation succeeded and returns no value
 *     } else {
 *         $error = $operationResponse->getError();
 *         // handleError($error)
 *     }
 *
 *
 *     // Alternatively:
 *
 *     // start the operation, keep the operation name, and resume later
 *     $operationResponse = $offlineUserDataJobServiceClient->runOfflineUserDataJob($formattedResourceName);
 *     $operationName = $operationResponse->getName();
 *     // ... do other work
 *     $newOperationResponse = $offlineUserDataJobServiceClient->resumeOperation($operationName, 'runOfflineUserDataJob');
 *     while (!$newOperationResponse->isDone()) {
 *         // ... do other work
 *         $newOperationResponse->reload();
 *     }
 *     if ($newOperationResponse->operationSucceeded()) {
 *       // operation succeeded and returns no value
 *     } else {
 *       $error = $newOperationResponse->getError();
 *       // handleError($error)
 *     }
 * } finally {
 *     $offlineUserDataJobServiceClient->close();
 * }
 * ```
 *
 * Many parameters require resource names to be formatted in a particular way. To assist
 * with these names, this class includes a format method for each type of name, and additionally
 * a parseName method to extract the individual identifiers contained within formatted names
 * that are returned by the API.
 *
 * @experimental
 */
class OfflineUserDataJobServiceGapicClient
{
    use GapicClientTrait;

    /**
     * The name of the service.
     */
    const SERVICE_NAME = 'google.ads.googleads.v3.services.OfflineUserDataJobService';

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
    private static $offlineUserDataJobNameTemplate;
    private static $pathTemplateMap;

    private $operationsClient;

    private static function getClientDefaults()
    {
        return [
            'serviceName' => self::SERVICE_NAME,
            'serviceAddress' => self::SERVICE_ADDRESS.':'.self::DEFAULT_SERVICE_PORT,
            'clientConfig' => __DIR__.'/../resources/offline_user_data_job_service_client_config.json',
            'descriptorsConfigPath' => __DIR__.'/../resources/offline_user_data_job_service_descriptor_config.php',
            'gcpApiConfigPath' => __DIR__.'/../resources/offline_user_data_job_service_grpc_config.json',
            'credentialsConfig' => [
                'scopes' => self::$serviceScopes,
            ],
            'transportConfig' => [
                'rest' => [
                    'restClientConfigPath' => __DIR__.'/../resources/offline_user_data_job_service_rest_client_config.php',
                ],
            ],
        ];
    }

    private static function getOfflineUserDataJobNameTemplate()
    {
        if (null == self::$offlineUserDataJobNameTemplate) {
            self::$offlineUserDataJobNameTemplate = new PathTemplate('customers/{customer}/offlineUserDataJobs/{offline_user_data_job}');
        }

        return self::$offlineUserDataJobNameTemplate;
    }

    private static function getPathTemplateMap()
    {
        if (null == self::$pathTemplateMap) {
            self::$pathTemplateMap = [
                'offlineUserDataJob' => self::getOfflineUserDataJobNameTemplate(),
            ];
        }

        return self::$pathTemplateMap;
    }

    /**
     * Formats a string containing the fully-qualified path to represent
     * a offline_user_data_job resource.
     *
     * @param string $customer
     * @param string $offlineUserDataJob
     *
     * @return string The formatted offline_user_data_job resource.
     * @experimental
     */
    public static function offlineUserDataJobName($customer, $offlineUserDataJob)
    {
        return self::getOfflineUserDataJobNameTemplate()->render([
            'customer' => $customer,
            'offline_user_data_job' => $offlineUserDataJob,
        ]);
    }

    /**
     * Parses a formatted name string and returns an associative array of the components in the name.
     * The following name formats are supported:
     * Template: Pattern
     * - offlineUserDataJob: customers/{customer}/offlineUserDataJobs/{offline_user_data_job}.
     *
     * The optional $template argument can be supplied to specify a particular pattern, and must
     * match one of the templates listed above. If no $template argument is provided, or if the
     * $template argument does not match one of the templates listed, then parseName will check
     * each of the supported templates, and return the first match.
     *
     * @param string $formattedName The formatted name string
     * @param string $template      Optional name of template to match
     *
     * @return array An associative array from name component IDs to component values.
     *
     * @throws ValidationException If $formattedName could not be matched.
     * @experimental
     */
    public static function parseName($formattedName, $template = null)
    {
        $templateMap = self::getPathTemplateMap();

        if ($template) {
            if (!isset($templateMap[$template])) {
                throw new ValidationException("Template name $template does not exist");
            }

            return $templateMap[$template]->match($formattedName);
        }

        foreach ($templateMap as $templateName => $pathTemplate) {
            try {
                return $pathTemplate->match($formattedName);
            } catch (ValidationException $ex) {
                // Swallow the exception to continue trying other path templates
            }
        }
        throw new ValidationException("Input did not match any known format. Input: $formattedName");
    }

    /**
     * Return an OperationsClient object with the same endpoint as $this.
     *
     * @return OperationsClient
     * @experimental
     */
    public function getOperationsClient()
    {
        return $this->operationsClient;
    }

    /**
     * Resume an existing long running operation that was previously started
     * by a long running API method. If $methodName is not provided, or does
     * not match a long running API method, then the operation can still be
     * resumed, but the OperationResponse object will not deserialize the
     * final response.
     *
     * @param string $operationName The name of the long running operation
     * @param string $methodName    The name of the method used to start the operation
     *
     * @return OperationResponse
     * @experimental
     */
    public function resumeOperation($operationName, $methodName = null)
    {
        $options = isset($this->descriptors[$methodName]['longRunning'])
            ? $this->descriptors[$methodName]['longRunning']
            : [];
        $operation = new OperationResponse($operationName, $this->getOperationsClient(), $options);
        $operation->reload();

        return $operation;
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
        $this->operationsClient = $this->createOperationsClient($clientOptions);
    }

    /**
     * Runs the offline user data job.
     *
     * When finished, the long running operation will contain the processing
     * result or failure information, if any.
     *
     * Sample code:
     * ```
     * $offlineUserDataJobServiceClient = new OfflineUserDataJobServiceClient();
     * try {
     *     $formattedResourceName = $offlineUserDataJobServiceClient->offlineUserDataJobName('[CUSTOMER]', '[OFFLINE_USER_DATA_JOB]');
     *     $operationResponse = $offlineUserDataJobServiceClient->runOfflineUserDataJob($formattedResourceName);
     *     $operationResponse->pollUntilComplete();
     *     if ($operationResponse->operationSucceeded()) {
     *         // operation succeeded and returns no value
     *     } else {
     *         $error = $operationResponse->getError();
     *         // handleError($error)
     *     }
     *
     *
     *     // Alternatively:
     *
     *     // start the operation, keep the operation name, and resume later
     *     $operationResponse = $offlineUserDataJobServiceClient->runOfflineUserDataJob($formattedResourceName);
     *     $operationName = $operationResponse->getName();
     *     // ... do other work
     *     $newOperationResponse = $offlineUserDataJobServiceClient->resumeOperation($operationName, 'runOfflineUserDataJob');
     *     while (!$newOperationResponse->isDone()) {
     *         // ... do other work
     *         $newOperationResponse->reload();
     *     }
     *     if ($newOperationResponse->operationSucceeded()) {
     *       // operation succeeded and returns no value
     *     } else {
     *       $error = $newOperationResponse->getError();
     *       // handleError($error)
     *     }
     * } finally {
     *     $offlineUserDataJobServiceClient->close();
     * }
     * ```
     *
     * @param string $resourceName Required. The resource name of the OfflineUserDataJob to run.
     * @param array  $optionalArgs {
     *                             Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\ApiCore\OperationResponse
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function runOfflineUserDataJob($resourceName, array $optionalArgs = [])
    {
        $request = new RunOfflineUserDataJobRequest();
        $request->setResourceName($resourceName);

        $requestParams = new RequestParamsHeaderDescriptor([
          'resource_name' => $request->getResourceName(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->startOperationsCall(
            'RunOfflineUserDataJob',
            $optionalArgs,
            $request,
            $this->getOperationsClient()
        )->wait();
    }

    /**
     * Creates an offline user data job.
     *
     * Sample code:
     * ```
     * $offlineUserDataJobServiceClient = new OfflineUserDataJobServiceClient();
     * try {
     *     $customerId = '';
     *     $job = new OfflineUserDataJob();
     *     $response = $offlineUserDataJobServiceClient->createOfflineUserDataJob($customerId, $job);
     * } finally {
     *     $offlineUserDataJobServiceClient->close();
     * }
     * ```
     *
     * @param string             $customerId   Required. The ID of the customer for which to create an offline user data job.
     * @param OfflineUserDataJob $job          Required. The offline user data job to be created.
     * @param array              $optionalArgs {
     *                                         Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Ads\GoogleAds\V3\Services\CreateOfflineUserDataJobResponse
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function createOfflineUserDataJob($customerId, $job, array $optionalArgs = [])
    {
        $request = new CreateOfflineUserDataJobRequest();
        $request->setCustomerId($customerId);
        $request->setJob($job);

        $requestParams = new RequestParamsHeaderDescriptor([
          'customer_id' => $request->getCustomerId(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->startCall(
            'CreateOfflineUserDataJob',
            CreateOfflineUserDataJobResponse::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Returns the offline user data job.
     *
     * Sample code:
     * ```
     * $offlineUserDataJobServiceClient = new OfflineUserDataJobServiceClient();
     * try {
     *     $formattedResourceName = $offlineUserDataJobServiceClient->offlineUserDataJobName('[CUSTOMER]', '[OFFLINE_USER_DATA_JOB]');
     *     $response = $offlineUserDataJobServiceClient->getOfflineUserDataJob($formattedResourceName);
     * } finally {
     *     $offlineUserDataJobServiceClient->close();
     * }
     * ```
     *
     * @param string $resourceName Required. The resource name of the OfflineUserDataJob to get.
     * @param array  $optionalArgs {
     *                             Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Ads\GoogleAds\V3\Resources\OfflineUserDataJob
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function getOfflineUserDataJob($resourceName, array $optionalArgs = [])
    {
        $request = new GetOfflineUserDataJobRequest();
        $request->setResourceName($resourceName);

        $requestParams = new RequestParamsHeaderDescriptor([
          'resource_name' => $request->getResourceName(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->startCall(
            'GetOfflineUserDataJob',
            OfflineUserDataJob::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Adds operations to the offline user data job.
     *
     * Sample code:
     * ```
     * $offlineUserDataJobServiceClient = new OfflineUserDataJobServiceClient();
     * try {
     *     $formattedResourceName = $offlineUserDataJobServiceClient->offlineUserDataJobName('[CUSTOMER]', '[OFFLINE_USER_DATA_JOB]');
     *     $operations = [];
     *     $response = $offlineUserDataJobServiceClient->addOfflineUserDataJobOperations($formattedResourceName, $operations);
     * } finally {
     *     $offlineUserDataJobServiceClient->close();
     * }
     * ```
     *
     * @param string                        $resourceName Required. The resource name of the OfflineUserDataJob.
     * @param OfflineUserDataJobOperation[] $operations   Required. The list of operations to be done.
     * @param array                         $optionalArgs {
     *                                                    Optional.
     *
     *     @type BoolValue $enablePartialFailure
     *          True to enable partial failure for the offline user data job.
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Ads\GoogleAds\V3\Services\AddOfflineUserDataJobOperationsResponse
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function addOfflineUserDataJobOperations($resourceName, $operations, array $optionalArgs = [])
    {
        $request = new AddOfflineUserDataJobOperationsRequest();
        $request->setResourceName($resourceName);
        $request->setOperations($operations);
        if (isset($optionalArgs['enablePartialFailure'])) {
            $request->setEnablePartialFailure($optionalArgs['enablePartialFailure']);
        }

        $requestParams = new RequestParamsHeaderDescriptor([
          'resource_name' => $request->getResourceName(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->startCall(
            'AddOfflineUserDataJobOperations',
            AddOfflineUserDataJobOperationsResponse::class,
            $optionalArgs,
            $request
        )->wait();
    }
}
