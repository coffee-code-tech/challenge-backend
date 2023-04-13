<?php

namespace MyApp\Helpers;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

/**
 * @mixin \WPEmergeAppCore\Application\ApplicationMixin
 */
class External {

    private $base_url = 'https://challenge.homolog.tech';
    private $consumer_key = 'ck_a2bc55a8f39548ef61d9f2dd9cb51b2a0ef8f3eb';
    private $consumer_secret = 'cs_20db47ddaf8ed0f9482e867a9643827da6717323';

    /**
     * @param  string  $method  GET, POST, PUT, DELETE, etc.
     * @param  string  $url  URL do endpoint, desconsiderando a base
     * @param  array  $headers  Array de headers adicionais, desconsiderando autenticação
     * 
     * @return array Array de objetos
     */
    public function request($method, $url, $headers = [])
    {
        $client = new Client();
        $request = new Request($method, $this->base_url . '/' . $url, [
            'Authorization' => 'Basic ' . base64_encode($this->consumer_key . ':' . $this->consumer_secret),
            'Content-Type' => 'application/json',
            ...$headers
        ]);
        $response = $client->sendRequest($request);
        $data = json_decode($response->getBody());

        return $data;
    }
    
}