<?php

namespace Spyrit\Billetel\Client;

use Exception;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use RuntimeException;

abstract class AbstractClient
{
    /**
     * @var string
     */
    protected $baseUrl;

    /**
     * @var array
     */
    protected $headers;

    /**
     * @var ClientInterface
     */
    protected $httpClient;


    /**
     * @param string              $baseUrl
     * @param string              $authorization
     * @param string              $desk
     * @param ClientInterface     $httpClient
     */
    public function __construct($baseUrl, $authorization, $desk, ClientInterface $httpClient)
    {
        $this->baseUrl = $baseUrl;
        $this->headers = [
            'Authorization' => $authorization,
            'X-Billetel-Desk' => $desk,
        ];
        $this->httpClient = $httpClient;
    }

    /**
     * @param array $headers
     *
     * @return $this
     */
    public function setHeaders($headers)
    {
        $this->headers = $headers;

        return $this;
    }

    /**
     * @param string $verb
     * @param string $uri
     * @param array  $extraParams
     * @param array  $customHeaders
     *
     * @return string
     * @throws Exception
     */
    protected function action($method, $uri, $params = [], $headers = [])
    {
        $options = [];
        $options['headers'] = $this->headers;

        foreach ($params as $key => $value) {
            $options[$key] = $value;
        }

        foreach ($headers as $key => $value) {
            $options['headers'][$key] = $value;
            if ($value === null) {
                unset($options['headers'][$key]);
            }
        }

        try {
            return $this->httpClient
                ->request($method, $this->baseUrl.'/'.$uri, $options)
                ->getBody()
                ->getContents();
        } catch (RequestException $e) {
            throw $this->getErrorException($e);
        }
    }

    /**
     * @param RequestException $e
     *
     * @return Exception
     */
    protected function getErrorException(RequestException $e)
    {
        if (!$e->hasResponse()) {
            return new RuntimeException('', 0, $e);
        }

        $content = json_decode($e->getResponse()->getBody()->getContents(), true);
        $message = isset($content['message']) ? $content['message'] : 'Unknown error';
        $code = isset($content['code']) ? $content['code'] : 0;
        $message .= ' ('.$code.')';

        return new Exception($message, $e->getResponse()->getStatusCode());
    }
}
