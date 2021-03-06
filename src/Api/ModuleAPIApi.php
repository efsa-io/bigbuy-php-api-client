<?php
/**
 * ModuleAPIApi
 * PHP version 7.3
 *
 * @category Class
 * @package  Efsa\Client\Bigbuy
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * BigBuy API
 *
 * OpenAPI spefication to interact with bigbuy.eu
 *
 * The version of the OpenAPI document: v202102
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 6.0.0-SNAPSHOT
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace Efsa\Client\Bigbuy\Api;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use Efsa\Client\Bigbuy\ApiException;
use Efsa\Client\Bigbuy\Configuration;
use Efsa\Client\Bigbuy\HeaderSelector;
use Efsa\Client\Bigbuy\ObjectSerializer;

/**
 * ModuleAPIApi Class Doc Comment
 *
 * @category Class
 * @package  Efsa\Client\Bigbuy
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class ModuleAPIApi
{
    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var Configuration
     */
    protected $config;

    /**
     * @var HeaderSelector
     */
    protected $headerSelector;

    /**
     * @var int Host index
     */
    protected $hostIndex;

    /**
     * @param ClientInterface $client
     * @param Configuration   $config
     * @param HeaderSelector  $selector
     * @param int             $hostIndex (Optional) host index to select the list of hosts if defined in the OpenAPI spec
     */
    public function __construct(
        ClientInterface $client = null,
        Configuration $config = null,
        HeaderSelector $selector = null,
        $hostIndex = 0
    ) {
        $this->client = $client ?: new Client();
        $this->config = $config ?: new Configuration();
        $this->headerSelector = $selector ?: new HeaderSelector();
        $this->hostIndex = $hostIndex;
    }

    /**
     * Set the host index
     *
     * @param int $hostIndex Host index (required)
     */
    public function setHostIndex($hostIndex): void
    {
        $this->hostIndex = $hostIndex;
    }

    /**
     * Get the host index
     *
     * @return int Host index
     */
    public function getHostIndex()
    {
        return $this->hostIndex;
    }

    /**
     * @return Configuration
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Operation getAllModules
     *
     * Get all Modules
     *
     * @param  string $format format (required)
     * @param  string $name Module name (optional)
     * @param  string $platform Platform name (optional)
     * @param  string $platformVersion Platform version (optional)
     *
     * @throws \Efsa\Client\Bigbuy\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return void
     */
    public function getAllModules($format, $name = null, $platform = null, $platformVersion = null)
    {
        $this->getAllModulesWithHttpInfo($format, $name, $platform, $platformVersion);
    }

    /**
     * Operation getAllModulesWithHttpInfo
     *
     * Get all Modules
     *
     * @param  string $format (required)
     * @param  string $name Module name (optional)
     * @param  string $platform Platform name (optional)
     * @param  string $platformVersion Platform version (optional)
     *
     * @throws \Efsa\Client\Bigbuy\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function getAllModulesWithHttpInfo($format, $name = null, $platform = null, $platformVersion = null)
    {
        $request = $this->getAllModulesRequest($format, $name, $platform, $platformVersion);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            return [null, $statusCode, $response->getHeaders()];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
            }
            throw $e;
        }
    }

    /**
     * Operation getAllModulesAsync
     *
     * Get all Modules
     *
     * @param  string $format (required)
     * @param  string $name Module name (optional)
     * @param  string $platform Platform name (optional)
     * @param  string $platformVersion Platform version (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getAllModulesAsync($format, $name = null, $platform = null, $platformVersion = null)
    {
        return $this->getAllModulesAsyncWithHttpInfo($format, $name, $platform, $platformVersion)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getAllModulesAsyncWithHttpInfo
     *
     * Get all Modules
     *
     * @param  string $format (required)
     * @param  string $name Module name (optional)
     * @param  string $platform Platform name (optional)
     * @param  string $platformVersion Platform version (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getAllModulesAsyncWithHttpInfo($format, $name = null, $platform = null, $platformVersion = null)
    {
        $returnType = '';
        $request = $this->getAllModulesRequest($format, $name, $platform, $platformVersion);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getAllModules'
     *
     * @param  string $format (required)
     * @param  string $name Module name (optional)
     * @param  string $platform Platform name (optional)
     * @param  string $platformVersion Platform version (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getAllModulesRequest($format, $name = null, $platform = null, $platformVersion = null)
    {
        // verify the required parameter 'format' is set
        if ($format === null || (is_array($format) && count($format) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $format when calling getAllModules'
            );
        }

        $resourcePath = '/rest/module/.{_format}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $name,
            'name', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $platform,
            'platform', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $platformVersion,
            'platformVersion', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);


        // path params
        if ($format !== null) {
            $resourcePath = str_replace(
                '{' . '_format' . '}',
                ObjectSerializer::toPathValue($format),
                $resourcePath
            );
        }


        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                []
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                [],
                []
            );
        }

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires Bearer authentication (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getAllModulesPlatforms
     *
     * Get all module platforms
     *
     * @param  string $format format (required)
     * @param  string $name Module name (optional)
     * @param  string $platform Platform name (optional)
     * @param  string $platformVersion Platform version (optional)
     *
     * @throws \Efsa\Client\Bigbuy\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return void
     */
    public function getAllModulesPlatforms($format, $name = null, $platform = null, $platformVersion = null)
    {
        $this->getAllModulesPlatformsWithHttpInfo($format, $name, $platform, $platformVersion);
    }

    /**
     * Operation getAllModulesPlatformsWithHttpInfo
     *
     * Get all module platforms
     *
     * @param  string $format (required)
     * @param  string $name Module name (optional)
     * @param  string $platform Platform name (optional)
     * @param  string $platformVersion Platform version (optional)
     *
     * @throws \Efsa\Client\Bigbuy\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function getAllModulesPlatformsWithHttpInfo($format, $name = null, $platform = null, $platformVersion = null)
    {
        $request = $this->getAllModulesPlatformsRequest($format, $name, $platform, $platformVersion);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            return [null, $statusCode, $response->getHeaders()];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
            }
            throw $e;
        }
    }

    /**
     * Operation getAllModulesPlatformsAsync
     *
     * Get all module platforms
     *
     * @param  string $format (required)
     * @param  string $name Module name (optional)
     * @param  string $platform Platform name (optional)
     * @param  string $platformVersion Platform version (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getAllModulesPlatformsAsync($format, $name = null, $platform = null, $platformVersion = null)
    {
        return $this->getAllModulesPlatformsAsyncWithHttpInfo($format, $name, $platform, $platformVersion)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getAllModulesPlatformsAsyncWithHttpInfo
     *
     * Get all module platforms
     *
     * @param  string $format (required)
     * @param  string $name Module name (optional)
     * @param  string $platform Platform name (optional)
     * @param  string $platformVersion Platform version (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getAllModulesPlatformsAsyncWithHttpInfo($format, $name = null, $platform = null, $platformVersion = null)
    {
        $returnType = '';
        $request = $this->getAllModulesPlatformsRequest($format, $name, $platform, $platformVersion);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getAllModulesPlatforms'
     *
     * @param  string $format (required)
     * @param  string $name Module name (optional)
     * @param  string $platform Platform name (optional)
     * @param  string $platformVersion Platform version (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getAllModulesPlatformsRequest($format, $name = null, $platform = null, $platformVersion = null)
    {
        // verify the required parameter 'format' is set
        if ($format === null || (is_array($format) && count($format) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $format when calling getAllModulesPlatforms'
            );
        }

        $resourcePath = '/rest/module/platforms.{_format}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $name,
            'name', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $platform,
            'platform', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $platformVersion,
            'platformVersion', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);


        // path params
        if ($format !== null) {
            $resourcePath = str_replace(
                '{' . '_format' . '}',
                ObjectSerializer::toPathValue($format),
                $resourcePath
            );
        }


        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                []
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                [],
                []
            );
        }

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires Bearer authentication (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create http client option
     *
     * @throws \RuntimeException on file opening failure
     * @return array of http client options
     */
    protected function createHttpClientOption()
    {
        $options = [];
        if ($this->config->getDebug()) {
            $options[RequestOptions::DEBUG] = fopen($this->config->getDebugFile(), 'a');
            if (!$options[RequestOptions::DEBUG]) {
                throw new \RuntimeException('Failed to open the debug file: ' . $this->config->getDebugFile());
            }
        }

        return $options;
    }
}
