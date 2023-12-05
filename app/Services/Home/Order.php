<?php

namespace App\Services\Home;

use App\Services\Service;

class Order extends Service
{
    public $baseUri;

    public function __construct()
    {
        $this->baseUri = env('BACKEND_URL');
    }

    public function postOrder($request)
    {
        return $this->requestService('POST', '/api/home/order', $request);
    }
}
