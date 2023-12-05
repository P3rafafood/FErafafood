<?php

namespace App\Traits;

use GuzzleHttp\Client;

trait HasApiRequest
{
    public function requestService($method, $requestUrl, $formParams = [], $headers = [], $files = [])
    {
        $client = new Client([
            'base_uri' => $this->baseUri
        ]);

        $options = [
            'headers' => $headers,
            'form_params' => $formParams
        ];

        if ($files) {
            $options = [
                'headers' => $headers,
                'multipart' => []
            ];

            foreach ($formParams as $key => $value) {
                $options['multipart'][] = [
                    'name' => $key,
                    'contents' => $value,
                ];
            }

            foreach ($files as $key => $path) {
                $options['multipart'][] = [
                    'name' => $key,
                    'contents' => fopen($path, 'r'),
                ];
            }
        }

        $response = $client->request($method, $requestUrl, $options);
        return json_decode($response->getBody()->getContents());
    }
}
