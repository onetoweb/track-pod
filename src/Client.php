<?php

namespace Onetoweb\TrackPod;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\RequestOptions;
use Onetoweb\TrackPod\Config\Method;
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
    /**
     * @var string
     */
    public const BASE_URI = 'https://api.track-pod.com';
    
    /**
     * @var Closure
     */
    private ?Closure $rateLimitCallback = null;
    
    /**
     * @param string $apiKey
     */
    public function __construct(
        
        #[\SensitiveParameter]
        private string $apiKey
    ) {
        
    }
    
    /**
     * @param Closure $rateLimitCallback
     * 
     * @return void
     */
    public function setRateLimitCallback(Closure $rateLimitCallback): void
    {
        $this->rateLimitCallback = $rateLimitCallback;
    }
    
    /**
     * @param string $endpoint
     * @param array $query = []
     * 
     * @return mixed
     */
    public function get(string $endpoint, array $query = []): mixed
    {
        return $this->request(Method::GET, $endpoint, $query);
    }
    
    /**
     * @param string $endpoint
     * @param array $data = []
     * 
     * @return mixed
     */
    public function post(string $endpoint, array $data = []): mixed
    {
        return $this->request(Method::POST, $endpoint, [], $data);
    }
    
    /**
     * @param string $endpoint
     * @param array $data = []
     * 
     * @return mixed
     */
    public function put(string $endpoint, array $data = []): mixed
    {
        return $this->request(Method::PUT, $endpoint, [], $data);
    }
    
    /**
     * @param string $endpoint
     * 
     * @return mixed
     */
    public function delete(string $endpoint): mixed
    {
        return $this->request(Method::DELETE, $endpoint);
    }
    
    /**
     * @param Method $method
     * @param string $endpoint
     * @param array $query = []
     * @param array $data = []
     * 
     * @return mixed
     */
    public function request(Method $method, string $endpoint, array $query = [], array $data = []): mixed
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
        
        if (in_array($method, [Method::POST, Method::PUT]) and count($data) > 0) {
            $options[RequestOptions::JSON] = $data;
        }
        
        // do request
        $response = $client->request($method->value, $endpoint, $options);
        
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
