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
 * https://github.com/google/googleapis/blob/master/google/ads/googleads/v2/services/conversion_upload_service.proto
 * and updates to that file get reflected here through a refresh process.
 *
 * @experimental
 */

namespace Google\Ads\GoogleAds\V2\Services\Gapic;

use Google\Ads\GoogleAds\V2\Services\CallConversion;
use Google\Ads\GoogleAds\V2\Services\ClickConversion;
use Google\Ads\GoogleAds\V2\Services\UploadCallConversionsRequest;
use Google\Ads\GoogleAds\V2\Services\UploadCallConversionsResponse;
use Google\Ads\GoogleAds\V2\Services\UploadClickConversionsRequest;
use Google\Ads\GoogleAds\V2\Services\UploadClickConversionsResponse;
use Google\ApiCore\ApiException;
use Google\ApiCore\CredentialsWrapper;
use Google\ApiCore\GapicClientTrait;
use Google\ApiCore\RequestParamsHeaderDescriptor;
use Google\ApiCore\RetrySettings;
use Google\ApiCore\Transport\TransportInterface;
use Google\ApiCore\ValidationException;
use Google\Auth\FetchAuthTokenInterface;

/**
 * Service Description: Service to upload conversions.
 *
 * This class provides the ability to make remote calls to the backing service through method
 * calls that map to API methods. Sample code to get started:
 *
 * ```
 * $conversionUploadServiceClient = new ConversionUploadServiceClient();
 * try {
 *     $customerId = '';
 *     $conversions = [];
 *     $partialFailure = false;
 *     $response = $conversionUploadServiceClient->uploadClickConversions($customerId, $conversions, $partialFailure);
 * } finally {
 *     $conversionUploadServiceClient->close();
 * }
 * ```
 *
 * @experimental
 */
class ConversionUploadServiceGapicClient
{
    use GapicClientTrait;

    /**
     * The name of the service.
     */
    const SERVICE_NAME = 'google.ads.googleads.v2.services.ConversionUploadService';

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
            'clientConfig' => __DIR__.'/../resources/conversion_upload_service_client_config.json',
            'descriptorsConfigPath' => __DIR__.'/../resources/conversion_upload_service_descriptor_config.php',
            'gcpApiConfigPath' => __DIR__.'/../resources/conversion_upload_service_grpc_config.json',
            'credentialsConfig' => [
                'scopes' => self::$serviceScopes,
            ],
            'transportConfig' => [
                'rest' => [
                    'restClientConfigPath' => __DIR__.'/../resources/conversion_upload_service_rest_client_config.php',
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
     * Processes the given click conversions.
     *
     * Sample code:
     * ```
     * $conversionUploadServiceClient = new ConversionUploadServiceClient();
     * try {
     *     $customerId = '';
     *     $conversions = [];
     *     $partialFailure = false;
     *     $response = $conversionUploadServiceClient->uploadClickConversions($customerId, $conversions, $partialFailure);
     * } finally {
     *     $conversionUploadServiceClient->close();
     * }
     * ```
     *
     * @param string            $customerId     Required. The ID of the customer performing the upload.
     * @param ClickConversion[] $conversions    Required. The conversions that are being uploaded.
     * @param bool              $partialFailure Required. If true, successful operations will be carried out and invalid
     *                                          operations will return errors. If false, all operations will be carried
     *                                          out in one transaction if and only if they are all valid.
     *                                          This should always be set to true.
     * @param array             $optionalArgs   {
     *                                          Optional.
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
     * @return \Google\Ads\GoogleAds\V2\Services\UploadClickConversionsResponse
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function uploadClickConversions($customerId, $conversions, $partialFailure, array $optionalArgs = [])
    {
        $request = new UploadClickConversionsRequest();
        $request->setCustomerId($customerId);
        $request->setConversions($conversions);
        $request->setPartialFailure($partialFailure);
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
            'UploadClickConversions',
            UploadClickConversionsResponse::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Processes the given call conversions.
     *
     * Sample code:
     * ```
     * $conversionUploadServiceClient = new ConversionUploadServiceClient();
     * try {
     *     $customerId = '';
     *     $conversions = [];
     *     $partialFailure = false;
     *     $response = $conversionUploadServiceClient->uploadCallConversions($customerId, $conversions, $partialFailure);
     * } finally {
     *     $conversionUploadServiceClient->close();
     * }
     * ```
     *
     * @param string           $customerId     Required. The ID of the customer performing the upload.
     * @param CallConversion[] $conversions    Required. The conversions that are being uploaded.
     * @param bool             $partialFailure Required. If true, successful operations will be carried out and invalid
     *                                         operations will return errors. If false, all operations will be carried
     *                                         out in one transaction if and only if they are all valid.
     *                                         This should always be set to true.
     * @param array            $optionalArgs   {
     *                                         Optional.
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
     * @return \Google\Ads\GoogleAds\V2\Services\UploadCallConversionsResponse
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function uploadCallConversions($customerId, $conversions, $partialFailure, array $optionalArgs = [])
    {
        $request = new UploadCallConversionsRequest();
        $request->setCustomerId($customerId);
        $request->setConversions($conversions);
        $request->setPartialFailure($partialFailure);
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
            'UploadCallConversions',
            UploadCallConversionsResponse::class,
            $optionalArgs,
            $request
        )->wait();
    }
}
