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
 * https://github.com/google/googleapis/blob/master/google/ads/googleads/v2/services/keyword_plan_idea_service.proto
 * and updates to that file get reflected here through a refresh process.
 *
 * @experimental
 */

namespace Google\Ads\GoogleAds\V2\Services\Gapic;

use Google\Ads\GoogleAds\V2\Enums\KeywordPlanNetworkEnum\KeywordPlanNetwork;
use Google\Ads\GoogleAds\V2\Services\GenerateKeywordIdeaResponse;
use Google\Ads\GoogleAds\V2\Services\GenerateKeywordIdeasRequest;
use Google\Ads\GoogleAds\V2\Services\KeywordAndUrlSeed;
use Google\Ads\GoogleAds\V2\Services\KeywordSeed;
use Google\Ads\GoogleAds\V2\Services\UrlSeed;
use Google\ApiCore\ApiException;
use Google\ApiCore\CredentialsWrapper;
use Google\ApiCore\GapicClientTrait;
use Google\ApiCore\RequestParamsHeaderDescriptor;
use Google\ApiCore\RetrySettings;
use Google\ApiCore\Transport\TransportInterface;
use Google\ApiCore\ValidationException;
use Google\Auth\FetchAuthTokenInterface;
use Google\Protobuf\StringValue;

/**
 * Service Description: Service to generate keyword ideas.
 *
 * This class provides the ability to make remote calls to the backing service through method
 * calls that map to API methods. Sample code to get started:
 *
 * ```
 * $keywordPlanIdeaServiceClient = new KeywordPlanIdeaServiceClient();
 * try {
 *     $language = new StringValue();
 *     $response = $keywordPlanIdeaServiceClient->generateKeywordIdeas($language);
 * } finally {
 *     $keywordPlanIdeaServiceClient->close();
 * }
 * ```
 *
 * @experimental
 */
class KeywordPlanIdeaServiceGapicClient
{
    use GapicClientTrait;

    /**
     * The name of the service.
     */
    const SERVICE_NAME = 'google.ads.googleads.v2.services.KeywordPlanIdeaService';

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
            'clientConfig' => __DIR__.'/../resources/keyword_plan_idea_service_client_config.json',
            'descriptorsConfigPath' => __DIR__.'/../resources/keyword_plan_idea_service_descriptor_config.php',
            'gcpApiConfigPath' => __DIR__.'/../resources/keyword_plan_idea_service_grpc_config.json',
            'credentialsConfig' => [
                'scopes' => self::$serviceScopes,
            ],
            'transportConfig' => [
                'rest' => [
                    'restClientConfigPath' => __DIR__.'/../resources/keyword_plan_idea_service_rest_client_config.php',
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
     * Returns a list of keyword ideas.
     *
     * Sample code:
     * ```
     * $keywordPlanIdeaServiceClient = new KeywordPlanIdeaServiceClient();
     * try {
     *     $language = new StringValue();
     *     $response = $keywordPlanIdeaServiceClient->generateKeywordIdeas($language);
     * } finally {
     *     $keywordPlanIdeaServiceClient->close();
     * }
     * ```
     *
     * @param StringValue $language     Required. The resource name of the language to target.
     *                                  Required
     * @param array       $optionalArgs {
     *                                  Optional.
     *
     *     @type string $customerId
     *          The ID of the customer with the recommendation.
     *     @type StringValue[] $geoTargetConstants
     *          The resource names of the location to target.
     *          Max 10
     *     @type int $keywordPlanNetwork
     *          Targeting network.
     *          For allowed values, use constants defined on {@see \Google\Ads\GoogleAds\V2\Enums\KeywordPlanNetworkEnum\KeywordPlanNetwork}
     *     @type KeywordAndUrlSeed $keywordAndUrlSeed
     *          A Keyword and a specific Url to generate ideas from
     *          e.g. cars, www.example.com/cars.
     *     @type KeywordSeed $keywordSeed
     *          A Keyword or phrase to generate ideas from, e.g. cars.
     *     @type UrlSeed $urlSeed
     *          A specific url to generate ideas from, e.g. www.example.com/cars.
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Ads\GoogleAds\V2\Services\GenerateKeywordIdeaResponse
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function generateKeywordIdeas($language, array $optionalArgs = [])
    {
        $request = new GenerateKeywordIdeasRequest();
        $request->setLanguage($language);
        if (isset($optionalArgs['customerId'])) {
            $request->setCustomerId($optionalArgs['customerId']);
        }
        if (isset($optionalArgs['geoTargetConstants'])) {
            $request->setGeoTargetConstants($optionalArgs['geoTargetConstants']);
        }
        if (isset($optionalArgs['keywordPlanNetwork'])) {
            $request->setKeywordPlanNetwork($optionalArgs['keywordPlanNetwork']);
        }
        if (isset($optionalArgs['keywordAndUrlSeed'])) {
            $request->setKeywordAndUrlSeed($optionalArgs['keywordAndUrlSeed']);
        }
        if (isset($optionalArgs['keywordSeed'])) {
            $request->setKeywordSeed($optionalArgs['keywordSeed']);
        }
        if (isset($optionalArgs['urlSeed'])) {
            $request->setUrlSeed($optionalArgs['urlSeed']);
        }

        $requestParams = new RequestParamsHeaderDescriptor([
          'customer_id' => $request->getCustomerId(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->startCall(
            'GenerateKeywordIdeas',
            GenerateKeywordIdeaResponse::class,
            $optionalArgs,
            $request
        )->wait();
    }
}
