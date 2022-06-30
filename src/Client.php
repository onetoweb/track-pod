<?php

namespace Onetoweb\TrackPod;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\RequestOptions;
use DateTimeInterface;
use DateTime;

/**
 * Track-POD Api Client.
 *
 * @author Jonathan van 't Ende <jvantende@onetoweb.nl>
 * @copyright Onetoweb. B.V.
 */
class Client
{
    const BASE_URI = 'https://api.track-pod.com';
    
    /**
     * Methods.
     */
    const METHOD_GET = 'GET';
    const METHOD_POST = 'POST';
    const METHOD_PUT = 'PUT';
    const METHOD_DELETE = 'DELETE';
    
    /**
     * @var string
     */
    private $apiKey;
    
    /**
     * @var callable
     */
    private $rateLimitCallback;
    
    /**
     * @param string $apiKey
     */
    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
    }
    
    /**
     * @param callable $rateLimitCallback
     * 
     * @return void
     */
    public function setRateLimitCallback(callable $rateLimitCallback): void
    {
        $this->rateLimitCallback = $rateLimitCallback;
    }
    
    /**
     * @param string $endpoint
     * @param array $query = []
     * 
     * @return mixed
     */
    public function get(string $endpoint, array $query = [])
    {
        return $this->request(self::METHOD_GET, $endpoint, $query);
    }
    
    /**
     * @param string $endpoint
     * @param array $data = []
     * 
     * @return mixed
     */
    public function post(string $endpoint, array $data = [])
    {
        return $this->request(self::METHOD_POST, $endpoint, [], $data);
    }
    
    /**
     * @param string $endpoint
     * @param array $data = []
     * 
     * @return mixed
     */
    public function put(string $endpoint, array $data = [])
    {
        return $this->request(self::METHOD_PUT, $endpoint, [], $data);
    }
    
    /**
     * @param string $endpoint
     * 
     * @return mixed
     */
    public function delete(string $endpoint)
    {
        return $this->request(self::METHOD_DELETE, $endpoint);
    }
    
    /**
     * @param string $method
     * @param string $endpoint
     * @param array $query = []
     * @param array $data = []
     *
     * @return mixed
     */
    public function request(string $method, string $endpoint, array $query = [], array $data = [])
    {
        // setup client
        $client = new GuzzleClient([
            'base_uri' => self::BASE_URI,
            'http_errors' => false,
        ]);
        
        // build options
        $options = [
            RequestOptions::HEADERS => [
                'X-API-KEY' => $this->apiKey,
                'Accept' => 'application/json'
            ],
            RequestOptions::QUERY => $query
        ];
        
        if (in_array($method, [self::METHOD_POST, self::METHOD_PUT]) and count($data) > 0) {
            $options[RequestOptions::JSON] = $data;
        }
        
        // do request
        $response = $client->request($method, $endpoint, $options);
        
        // rate limit callback
        if ($this->rateLimitCallback) {
            
            $remaining = (int) $response->getHeaderLine('X-Rate-Limit-Remaining');
            
            // get dates
            $dateServer = DateTime::createFromFormat(DateTimeInterface::RFC7231, $response->getHeaderLine('Date'));
            $dateReset = DateTime::createFromFormat('Y-m-d\TH:i:s', current(explode('.', $response->getHeaderLine('X-Rate-Limit-Reset'))));
            
            // calculate seconds
            $seconds = ($dateReset->getTimestamp() - $dateServer->getTimestamp()) + 1;
            
            ($this->rateLimitCallback)($remaining, $seconds);
        }
        
        $contents = $response->getBody()->getContents();
        
        return json_decode($contents, true);
    }
}
