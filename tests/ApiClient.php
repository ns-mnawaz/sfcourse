<?php


namespace App\Tests;

use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;

class ApiClient
{
    /**
     * @var HttpClientInterface
     */
    private HttpClientInterface $httpClient;

    private const URL = 'https://localhost:8000/';

    public function __construct(HttpClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function get(string $subUrl, array $query, array $headers): ResponseInterface
    {
        return $this->httpClient->request('GET', self::URL.$subUrl, [
            'query'   => $query,
            'headers' => $headers
        ]);
    }
}
