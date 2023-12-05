<?php

namespace App\Services\Home;

use App\Services\Service;

class Auth extends Service
{
    public $baseUri;

    public function __construct()
    {
        $this->baseUri = env('BACKEND_URL');
    }

    public function login($request)
    {
        return $this->requestService('POST', '/api/auth/login', $request);
    }
}
