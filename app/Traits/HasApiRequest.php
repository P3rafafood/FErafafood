<?php

namespace App\Traits;

use GuzzleHttp\Client;

trait HasApiRequest
{
    public function requestService($method, $requestUrl, $formParams = [], $headers = [])
    {
        $client = new Client([
            'base_uri' => $this->baseUri
        ]);

        $options = [
            'headers' => $headers,
            'form_params' => $formParams
        ];

        $response = $client->request($method, $requestUrl, $options);
        return json_decode($response->getBody()->getContents());
    }
}
