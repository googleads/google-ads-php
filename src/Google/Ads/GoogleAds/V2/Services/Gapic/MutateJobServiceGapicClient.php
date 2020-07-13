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
 * https://github.com/google/googleapis/blob/master/google/ads/googleads/v2/services/mutate_job_service.proto
 * and updates to that file get reflected here through a refresh process.
 *
 * @experimental
 */

namespace Google\Ads\GoogleAds\V2\Services\Gapic;

use Google\Ads\GoogleAds\V2\Resources\MutateJob;
use Google\Ads\GoogleAds\V2\Resources\MutateJob\MutateJobMetadata;
use Google\Ads\GoogleAds\V2\Services\AddMutateJobOperationsRequest;
use Google\Ads\GoogleAds\V2\Services\AddMutateJobOperationsResponse;
use Google\Ads\GoogleAds\V2\Services\CreateMutateJobRequest;
use Google\Ads\GoogleAds\V2\Services\CreateMutateJobResponse;
use Google\Ads\GoogleAds\V2\Services\GetMutateJobRequest;
use Google\Ads\GoogleAds\V2\Services\ListMutateJobResultsRequest;
use Google\Ads\GoogleAds\V2\Services\ListMutateJobResultsResponse;
use Google\Ads\GoogleAds\V2\Services\MutateOperation;
use Google\Ads\GoogleAds\V2\Services\RunMutateJobRequest;
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

/**
 * Service Description: Service to manage mutate jobs.
 *
 * This class provides the ability to make remote calls to the backing service through method
 * calls that map to API methods. Sample code to get started:
 *
 * ```
 * $mutateJobServiceClient = new MutateJobServiceClient();
 * try {
 *     $customerId = '';
 *     $response = $mutateJobServiceClient->createMutateJob($customerId);
 * } finally {
 *     $mutateJobServiceClient->close();
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
class MutateJobServiceGapicClient
{
    use GapicClientTrait;

    /**
     * The name of the service.
     */
    const SERVICE_NAME = 'google.ads.googleads.v2.services.MutateJobService';

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
    private static $mutateJobNameTemplate;
    private static $pathTemplateMap;

    private $operationsClient;

    private static function getClientDefaults()
    {
        return [
            'serviceName' => self::SERVICE_NAME,
            'serviceAddress' => self::SERVICE_ADDRESS.':'.self::DEFAULT_SERVICE_PORT,
            'clientConfig' => __DIR__.'/../resources/mutate_job_service_client_config.json',
            'descriptorsConfigPath' => __DIR__.'/../resources/mutate_job_service_descriptor_config.php',
            'gcpApiConfigPath' => __DIR__.'/../resources/mutate_job_service_grpc_config.json',
            'credentialsConfig' => [
                'scopes' => self::$serviceScopes,
            ],
            'transportConfig' => [
                'rest' => [
                    'restClientConfigPath' => __DIR__.'/../resources/mutate_job_service_rest_client_config.php',
                ],
            ],
        ];
    }

    private static function getMutateJobNameTemplate()
    {
        if (null == self::$mutateJobNameTemplate) {
            self::$mutateJobNameTemplate = new PathTemplate('customers/{customer}/mutateJobs/{mutate_job}');
        }

        return self::$mutateJobNameTemplate;
    }

    private static function getPathTemplateMap()
    {
        if (null == self::$pathTemplateMap) {
            self::$pathTemplateMap = [
                'mutateJob' => self::getMutateJobNameTemplate(),
            ];
        }

        return self::$pathTemplateMap;
    }

    /**
     * Formats a string containing the fully-qualified path to represent
     * a mutate_job resource.
     *
     * @param string $customer
     * @param string $mutateJob
     *
     * @return string The formatted mutate_job resource.
     * @experimental
     */
    public static function mutateJobName($customer, $mutateJob)
    {
        return self::getMutateJobNameTemplate()->render([
            'customer' => $customer,
            'mutate_job' => $mutateJob,
        ]);
    }

    /**
     * Parses a formatted name string and returns an associative array of the components in the name.
     * The following name formats are supported:
     * Template: Pattern
     * - mutateJob: customers/{customer}/mutateJobs/{mutate_job}.
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
     * Creates a mutate job.
     *
     * Sample code:
     * ```
     * $mutateJobServiceClient = new MutateJobServiceClient();
     * try {
     *     $customerId = '';
     *     $response = $mutateJobServiceClient->createMutateJob($customerId);
     * } finally {
     *     $mutateJobServiceClient->close();
     * }
     * ```
     *
     * @param string $customerId   Required. The ID of the customer for which to create a mutate job.
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
     * @return \Google\Ads\GoogleAds\V2\Services\CreateMutateJobResponse
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function createMutateJob($customerId, array $optionalArgs = [])
    {
        $request = new CreateMutateJobRequest();
        $request->setCustomerId($customerId);

        $requestParams = new RequestParamsHeaderDescriptor([
          'customer_id' => $request->getCustomerId(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->startCall(
            'CreateMutateJob',
            CreateMutateJobResponse::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Returns the mutate job.
     *
     * Sample code:
     * ```
     * $mutateJobServiceClient = new MutateJobServiceClient();
     * try {
     *     $formattedResourceName = $mutateJobServiceClient->mutateJobName('[CUSTOMER]', '[MUTATE_JOB]');
     *     $response = $mutateJobServiceClient->getMutateJob($formattedResourceName);
     * } finally {
     *     $mutateJobServiceClient->close();
     * }
     * ```
     *
     * @param string $resourceName Required. The resource name of the MutateJob to get.
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
     * @return \Google\Ads\GoogleAds\V2\Resources\MutateJob
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function getMutateJob($resourceName, array $optionalArgs = [])
    {
        $request = new GetMutateJobRequest();
        $request->setResourceName($resourceName);

        $requestParams = new RequestParamsHeaderDescriptor([
          'resource_name' => $request->getResourceName(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->startCall(
            'GetMutateJob',
            MutateJob::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Returns the results of the mutate job. The job must be done.
     * Supports standard list paging.
     *
     * Sample code:
     * ```
     * $mutateJobServiceClient = new MutateJobServiceClient();
     * try {
     *     $formattedResourceName = $mutateJobServiceClient->mutateJobName('[CUSTOMER]', '[MUTATE_JOB]');
     *     // Iterate over pages of elements
     *     $pagedResponse = $mutateJobServiceClient->listMutateJobResults($formattedResourceName);
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
     *     $pagedResponse = $mutateJobServiceClient->listMutateJobResults($formattedResourceName);
     *     foreach ($pagedResponse->iterateAllElements() as $element) {
     *         // doSomethingWith($element);
     *     }
     * } finally {
     *     $mutateJobServiceClient->close();
     * }
     * ```
     *
     * @param string $resourceName Required. The resource name of the MutateJob whose results are being listed.
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
    public function listMutateJobResults($resourceName, array $optionalArgs = [])
    {
        $request = new ListMutateJobResultsRequest();
        $request->setResourceName($resourceName);
        if (isset($optionalArgs['pageToken'])) {
            $request->setPageToken($optionalArgs['pageToken']);
        }
        if (isset($optionalArgs['pageSize'])) {
            $request->setPageSize($optionalArgs['pageSize']);
        }

        $requestParams = new RequestParamsHeaderDescriptor([
          'resource_name' => $request->getResourceName(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->getPagedListResponse(
            'ListMutateJobResults',
            $optionalArgs,
            ListMutateJobResultsResponse::class,
            $request
        );
    }

    /**
     * Runs the mutate job.
     *
     * The Operation.metadata field type is MutateJobMetadata. When finished, the
     * long running operation will not contain errors or a response. Instead, use
     * ListMutateJobResults to get the results of the job.
     *
     * Sample code:
     * ```
     * $mutateJobServiceClient = new MutateJobServiceClient();
     * try {
     *     $formattedResourceName = $mutateJobServiceClient->mutateJobName('[CUSTOMER]', '[MUTATE_JOB]');
     *     $operationResponse = $mutateJobServiceClient->runMutateJob($formattedResourceName);
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
     *     $operationResponse = $mutateJobServiceClient->runMutateJob($formattedResourceName);
     *     $operationName = $operationResponse->getName();
     *     // ... do other work
     *     $newOperationResponse = $mutateJobServiceClient->resumeOperation($operationName, 'runMutateJob');
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
     *     $mutateJobServiceClient->close();
     * }
     * ```
     *
     * @param string $resourceName Required. The resource name of the MutateJob to run.
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
    public function runMutateJob($resourceName, array $optionalArgs = [])
    {
        $request = new RunMutateJobRequest();
        $request->setResourceName($resourceName);

        $requestParams = new RequestParamsHeaderDescriptor([
          'resource_name' => $request->getResourceName(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->startOperationsCall(
            'RunMutateJob',
            $optionalArgs,
            $request,
            $this->getOperationsClient()
        )->wait();
    }

    /**
     * Add operations to the mutate job.
     *
     * Sample code:
     * ```
     * $mutateJobServiceClient = new MutateJobServiceClient();
     * try {
     *     $formattedResourceName = $mutateJobServiceClient->mutateJobName('[CUSTOMER]', '[MUTATE_JOB]');
     *     $mutateOperations = [];
     *     $response = $mutateJobServiceClient->addMutateJobOperations($formattedResourceName, $mutateOperations);
     * } finally {
     *     $mutateJobServiceClient->close();
     * }
     * ```
     *
     * @param string            $resourceName     Required. The resource name of the MutateJob.
     * @param MutateOperation[] $mutateOperations Required. The list of mutates being added.
     *
     * Operations can use negative integers as temp ids to signify dependencies
     * between entities created in this MutateJob. For example, a customer with
     * id = 1234 can create a campaign and an ad group in that same campaign by
     * creating a campaign in the first operation with the resource name
     * explicitly set to "customers/1234/campaigns/-1", and creating an ad group
     * in the second operation with the campaign field also set to
     * "customers/1234/campaigns/-1".
     * @param array $optionalArgs {
     *                            Optional.
     *
     *     @type string $sequenceToken
     *          A token used to enforce sequencing.
     *
     *          The first AddMutateJobOperations request for a MutateJob should not set
     *          sequence_token. Subsequent requests must set sequence_token to the value of
     *          next_sequence_token received in the previous AddMutateJobOperations
     *          response.
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Ads\GoogleAds\V2\Services\AddMutateJobOperationsResponse
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function addMutateJobOperations($resourceName, $mutateOperations, array $optionalArgs = [])
    {
        $request = new AddMutateJobOperationsRequest();
        $request->setResourceName($resourceName);
        $request->setMutateOperations($mutateOperations);
        if (isset($optionalArgs['sequenceToken'])) {
            $request->setSequenceToken($optionalArgs['sequenceToken']);
        }

        $requestParams = new RequestParamsHeaderDescriptor([
          'resource_name' => $request->getResourceName(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->startCall(
            'AddMutateJobOperations',
            AddMutateJobOperationsResponse::class,
            $optionalArgs,
            $request
        )->wait();
    }
}
