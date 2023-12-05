<?php

namespace App\Services\Admin;

use App\Services\Service;

class Dashboard extends Service
{
    public $baseUri;

    public function __construct()
    {
        $this->baseUri = env('BACKEND_URL');
    }

    public function getDashboard()
    {
        $headers = [
            'Authorization' => 'Bearer '.session('token')
        ];
        return $this->requestService('GET', '/api/admin/dashboard', headers: $headers);
    }
}
