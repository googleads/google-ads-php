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
 * https://github.com/google/googleapis/blob/master/google/ads/googleads/v2/services/campaign_experiment_service.proto
 * and updates to that file get reflected here through a refresh process.
 *
 * @experimental
 */

namespace Google\Ads\GoogleAds\V2\Services\Gapic;

use Google\Ads\GoogleAds\V2\Resources\CampaignExperiment;
use Google\Ads\GoogleAds\V2\Services\CampaignExperimentOperation;
use Google\Ads\GoogleAds\V2\Services\CreateCampaignExperimentRequest;
use Google\Ads\GoogleAds\V2\Services\EndCampaignExperimentRequest;
use Google\Ads\GoogleAds\V2\Services\GetCampaignExperimentRequest;
use Google\Ads\GoogleAds\V2\Services\GraduateCampaignExperimentRequest;
use Google\Ads\GoogleAds\V2\Services\GraduateCampaignExperimentResponse;
use Google\Ads\GoogleAds\V2\Services\ListCampaignExperimentAsyncErrorsRequest;
use Google\Ads\GoogleAds\V2\Services\ListCampaignExperimentAsyncErrorsResponse;
use Google\Ads\GoogleAds\V2\Services\MutateCampaignExperimentsRequest;
use Google\Ads\GoogleAds\V2\Services\MutateCampaignExperimentsResponse;
use Google\Ads\GoogleAds\V2\Services\PromoteCampaignExperimentRequest;
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
use Google\Protobuf\GPBEmpty;

/**
 * Service Description: CampaignExperimentService manages the life cycle of campaign experiments.
 * It is used to create new experiments from drafts, modify experiment
 * properties, promote changes in an experiment back to its base campaign,
 * graduate experiments into new stand-alone campaigns, and to remove an
 * experiment.
 *
 * An experiment consists of two variants or arms - the base campaign and the
 * experiment campaign, directing a fixed share of traffic to each arm.
 * A campaign experiment is created from a draft of changes to the base campaign
 * and will be a snapshot of changes in the draft at the time of creation.
 *
 * This class provides the ability to make remote calls to the backing service through method
 * calls that map to API methods. Sample code to get started:
 *
 * ```
 * $campaignExperimentServiceClient = new CampaignExperimentServiceClient();
 * try {
 *     $formattedResourceName = $campaignExperimentServiceClient->campaignExperimentName('[CUSTOMER]', '[CAMPAIGN_EXPERIMENT]');
 *     $response = $campaignExperimentServiceClient->getCampaignExperiment($formattedResourceName);
 * } finally {
 *     $campaignExperimentServiceClient->close();
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
class CampaignExperimentServiceGapicClient
{
    use GapicClientTrait;

    /**
     * The name of the service.
     */
    const SERVICE_NAME = 'google.ads.googleads.v2.services.CampaignExperimentService';

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
    private static $campaignNameTemplate;
    private static $campaignDraftNameTemplate;
    private static $campaignExperimentNameTemplate;
    private static $pathTemplateMap;

    private $operationsClient;

    private static function getClientDefaults()
    {
        return [
            'serviceName' => self::SERVICE_NAME,
            'serviceAddress' => self::SERVICE_ADDRESS.':'.self::DEFAULT_SERVICE_PORT,
            'clientConfig' => __DIR__.'/../resources/campaign_experiment_service_client_config.json',
            'descriptorsConfigPath' => __DIR__.'/../resources/campaign_experiment_service_descriptor_config.php',
            'gcpApiConfigPath' => __DIR__.'/../resources/campaign_experiment_service_grpc_config.json',
            'credentialsConfig' => [
                'scopes' => self::$serviceScopes,
            ],
            'transportConfig' => [
                'rest' => [
                    'restClientConfigPath' => __DIR__.'/../resources/campaign_experiment_service_rest_client_config.php',
                ],
            ],
        ];
    }

    private static function getCampaignNameTemplate()
    {
        if (null == self::$campaignNameTemplate) {
            self::$campaignNameTemplate = new PathTemplate('customers/{customer}/campaigns/{campaign}');
        }

        return self::$campaignNameTemplate;
    }

    private static function getCampaignDraftNameTemplate()
    {
        if (null == self::$campaignDraftNameTemplate) {
            self::$campaignDraftNameTemplate = new PathTemplate('customers/{customer}/campaignDrafts/{campaign_draft}');
        }

        return self::$campaignDraftNameTemplate;
    }

    private static function getCampaignExperimentNameTemplate()
    {
        if (null == self::$campaignExperimentNameTemplate) {
            self::$campaignExperimentNameTemplate = new PathTemplate('customers/{customer}/campaignExperiments/{campaign_experiment}');
        }

        return self::$campaignExperimentNameTemplate;
    }

    private static function getPathTemplateMap()
    {
        if (null == self::$pathTemplateMap) {
            self::$pathTemplateMap = [
                'campaign' => self::getCampaignNameTemplate(),
                'campaignDraft' => self::getCampaignDraftNameTemplate(),
                'campaignExperiment' => self::getCampaignExperimentNameTemplate(),
            ];
        }

        return self::$pathTemplateMap;
    }

    /**
     * Formats a string containing the fully-qualified path to represent
     * a campaign resource.
     *
     * @param string $customer
     * @param string $campaign
     *
     * @return string The formatted campaign resource.
     * @experimental
     */
    public static function campaignName($customer, $campaign)
    {
        return self::getCampaignNameTemplate()->render([
            'customer' => $customer,
            'campaign' => $campaign,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent
     * a campaign_draft resource.
     *
     * @param string $customer
     * @param string $campaignDraft
     *
     * @return string The formatted campaign_draft resource.
     * @experimental
     */
    public static function campaignDraftName($customer, $campaignDraft)
    {
        return self::getCampaignDraftNameTemplate()->render([
            'customer' => $customer,
            'campaign_draft' => $campaignDraft,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent
     * a campaign_experiment resource.
     *
     * @param string $customer
     * @param string $campaignExperiment
     *
     * @return string The formatted campaign_experiment resource.
     * @experimental
     */
    public static function campaignExperimentName($customer, $campaignExperiment)
    {
        return self::getCampaignExperimentNameTemplate()->render([
            'customer' => $customer,
            'campaign_experiment' => $campaignExperiment,
        ]);
    }

    /**
     * Parses a formatted name string and returns an associative array of the components in the name.
     * The following name formats are supported:
     * Template: Pattern
     * - campaign: customers/{customer}/campaigns/{campaign}
     * - campaignDraft: customers/{customer}/campaignDrafts/{campaign_draft}
     * - campaignExperiment: customers/{customer}/campaignExperiments/{campaign_experiment}.
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
     * Returns the requested campaign experiment in full detail.
     *
     * Sample code:
     * ```
     * $campaignExperimentServiceClient = new CampaignExperimentServiceClient();
     * try {
     *     $formattedResourceName = $campaignExperimentServiceClient->campaignExperimentName('[CUSTOMER]', '[CAMPAIGN_EXPERIMENT]');
     *     $response = $campaignExperimentServiceClient->getCampaignExperiment($formattedResourceName);
     * } finally {
     *     $campaignExperimentServiceClient->close();
     * }
     * ```
     *
     * @param string $resourceName Required. The resource name of the campaign experiment to fetch.
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
     * @return \Google\Ads\GoogleAds\V2\Resources\CampaignExperiment
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function getCampaignExperiment($resourceName, array $optionalArgs = [])
    {
        $request = new GetCampaignExperimentRequest();
        $request->setResourceName($resourceName);

        $requestParams = new RequestParamsHeaderDescriptor([
          'resource_name' => $request->getResourceName(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->startCall(
            'GetCampaignExperiment',
            CampaignExperiment::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Creates a campaign experiment based on a campaign draft. The draft campaign
     * will be forked into a real campaign (called the experiment campaign) that
     * will begin serving ads if successfully created.
     *
     * The campaign experiment is created immediately with status INITIALIZING.
     * This method return a long running operation that tracks the forking of the
     * draft campaign. If the forking fails, a list of errors can be retrieved
     * using the ListCampaignExperimentAsyncErrors method. The operation's
     * metadata will be a StringValue containing the resource name of the created
     * campaign experiment.
     *
     * Sample code:
     * ```
     * $campaignExperimentServiceClient = new CampaignExperimentServiceClient();
     * try {
     *     $customerId = '';
     *     $campaignExperiment = new CampaignExperiment();
     *     $operationResponse = $campaignExperimentServiceClient->createCampaignExperiment($customerId, $campaignExperiment);
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
     *     $operationResponse = $campaignExperimentServiceClient->createCampaignExperiment($customerId, $campaignExperiment);
     *     $operationName = $operationResponse->getName();
     *     // ... do other work
     *     $newOperationResponse = $campaignExperimentServiceClient->resumeOperation($operationName, 'createCampaignExperiment');
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
     *     $campaignExperimentServiceClient->close();
     * }
     * ```
     *
     * @param string             $customerId         Required. The ID of the customer whose campaign experiment is being created.
     * @param CampaignExperiment $campaignExperiment Required. The campaign experiment to be created.
     * @param array              $optionalArgs       {
     *                                               Optional.
     *
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
     * @return \Google\ApiCore\OperationResponse
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function createCampaignExperiment($customerId, $campaignExperiment, array $optionalArgs = [])
    {
        $request = new CreateCampaignExperimentRequest();
        $request->setCustomerId($customerId);
        $request->setCampaignExperiment($campaignExperiment);
        if (isset($optionalArgs['validateOnly'])) {
            $request->setValidateOnly($optionalArgs['validateOnly']);
        }

        $requestParams = new RequestParamsHeaderDescriptor([
          'customer_id' => $request->getCustomerId(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->startOperationsCall(
            'CreateCampaignExperiment',
            $optionalArgs,
            $request,
            $this->getOperationsClient()
        )->wait();
    }

    /**
     * Updates campaign experiments. Operation statuses are returned.
     *
     * Sample code:
     * ```
     * $campaignExperimentServiceClient = new CampaignExperimentServiceClient();
     * try {
     *     $customerId = '';
     *     $operations = [];
     *     $response = $campaignExperimentServiceClient->mutateCampaignExperiments($customerId, $operations);
     * } finally {
     *     $campaignExperimentServiceClient->close();
     * }
     * ```
     *
     * @param string                        $customerId   Required. The ID of the customer whose campaign experiments are being modified.
     * @param CampaignExperimentOperation[] $operations   Required. The list of operations to perform on individual campaign experiments.
     * @param array                         $optionalArgs {
     *                                                    Optional.
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
     * @return \Google\Ads\GoogleAds\V2\Services\MutateCampaignExperimentsResponse
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function mutateCampaignExperiments($customerId, $operations, array $optionalArgs = [])
    {
        $request = new MutateCampaignExperimentsRequest();
        $request->setCustomerId($customerId);
        $request->setOperations($operations);
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
            'MutateCampaignExperiments',
            MutateCampaignExperimentsResponse::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Graduates a campaign experiment to a full campaign. The base and experiment
     * campaigns will start running independently with their own budgets.
     *
     * Sample code:
     * ```
     * $campaignExperimentServiceClient = new CampaignExperimentServiceClient();
     * try {
     *     $campaignExperiment = '';
     *     $campaignBudget = '';
     *     $response = $campaignExperimentServiceClient->graduateCampaignExperiment($campaignExperiment, $campaignBudget);
     * } finally {
     *     $campaignExperimentServiceClient->close();
     * }
     * ```
     *
     * @param string $campaignExperiment Required. The resource name of the campaign experiment to graduate.
     * @param string $campaignBudget     Required. Resource name of the budget to attach to the campaign graduated from the
     *                                   experiment.
     * @param array  $optionalArgs       {
     *                                   Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Ads\GoogleAds\V2\Services\GraduateCampaignExperimentResponse
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function graduateCampaignExperiment($campaignExperiment, $campaignBudget, array $optionalArgs = [])
    {
        $request = new GraduateCampaignExperimentRequest();
        $request->setCampaignExperiment($campaignExperiment);
        $request->setCampaignBudget($campaignBudget);

        $requestParams = new RequestParamsHeaderDescriptor([
          'campaign_experiment' => $request->getCampaignExperiment(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->startCall(
            'GraduateCampaignExperiment',
            GraduateCampaignExperimentResponse::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Promotes the changes in a experiment campaign back to the base campaign.
     *
     * The campaign experiment is updated immediately with status PROMOTING.
     * This method return a long running operation that tracks the promoting of
     * the experiment campaign. If the promoting fails, a list of errors can be
     * retrieved using the ListCampaignExperimentAsyncErrors method.
     *
     * Sample code:
     * ```
     * $campaignExperimentServiceClient = new CampaignExperimentServiceClient();
     * try {
     *     $campaignExperiment = '';
     *     $operationResponse = $campaignExperimentServiceClient->promoteCampaignExperiment($campaignExperiment);
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
     *     $operationResponse = $campaignExperimentServiceClient->promoteCampaignExperiment($campaignExperiment);
     *     $operationName = $operationResponse->getName();
     *     // ... do other work
     *     $newOperationResponse = $campaignExperimentServiceClient->resumeOperation($operationName, 'promoteCampaignExperiment');
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
     *     $campaignExperimentServiceClient->close();
     * }
     * ```
     *
     * @param string $campaignExperiment Required. The resource name of the campaign experiment to promote.
     * @param array  $optionalArgs       {
     *                                   Optional.
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
    public function promoteCampaignExperiment($campaignExperiment, array $optionalArgs = [])
    {
        $request = new PromoteCampaignExperimentRequest();
        $request->setCampaignExperiment($campaignExperiment);

        $requestParams = new RequestParamsHeaderDescriptor([
          'campaign_experiment' => $request->getCampaignExperiment(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->startOperationsCall(
            'PromoteCampaignExperiment',
            $optionalArgs,
            $request,
            $this->getOperationsClient()
        )->wait();
    }

    /**
     * Immediately ends a campaign experiment, changing the experiment's scheduled
     * end date and without waiting for end of day. End date is updated to be the
     * time of the request.
     *
     * Sample code:
     * ```
     * $campaignExperimentServiceClient = new CampaignExperimentServiceClient();
     * try {
     *     $campaignExperiment = '';
     *     $campaignExperimentServiceClient->endCampaignExperiment($campaignExperiment);
     * } finally {
     *     $campaignExperimentServiceClient->close();
     * }
     * ```
     *
     * @param string $campaignExperiment Required. The resource name of the campaign experiment to end.
     * @param array  $optionalArgs       {
     *                                   Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function endCampaignExperiment($campaignExperiment, array $optionalArgs = [])
    {
        $request = new EndCampaignExperimentRequest();
        $request->setCampaignExperiment($campaignExperiment);

        $requestParams = new RequestParamsHeaderDescriptor([
          'campaign_experiment' => $request->getCampaignExperiment(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->startCall(
            'EndCampaignExperiment',
            GPBEmpty::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Returns all errors that occurred during CampaignExperiment create or
     * promote (whichever occurred last).
     * Supports standard list paging.
     *
     * Sample code:
     * ```
     * $campaignExperimentServiceClient = new CampaignExperimentServiceClient();
     * try {
     *     $formattedResourceName = $campaignExperimentServiceClient->campaignExperimentName('[CUSTOMER]', '[CAMPAIGN_EXPERIMENT]');
     *     // Iterate over pages of elements
     *     $pagedResponse = $campaignExperimentServiceClient->listCampaignExperimentAsyncErrors($formattedResourceName);
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
     *     $pagedResponse = $campaignExperimentServiceClient->listCampaignExperimentAsyncErrors($formattedResourceName);
     *     foreach ($pagedResponse->iterateAllElements() as $element) {
     *         // doSomethingWith($element);
     *     }
     * } finally {
     *     $campaignExperimentServiceClient->close();
     * }
     * ```
     *
     * @param string $resourceName Required. The name of the campaign experiment from which to retrieve the async
     *                             errors.
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
    public function listCampaignExperimentAsyncErrors($resourceName, array $optionalArgs = [])
    {
        $request = new ListCampaignExperimentAsyncErrorsRequest();
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
            'ListCampaignExperimentAsyncErrors',
            $optionalArgs,
            ListCampaignExperimentAsyncErrorsResponse::class,
            $request
        );
    }
}
