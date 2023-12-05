<?php

namespace App\Services\Home;

use App\Services\Service;

class Menu extends Service
{
    public $baseUri;

    public function __construct()
    {
        $this->baseUri = env('BACKEND_URL');
    }

    public function getFoodMenus()
    {
        return $this->requestService('GET','/api/home/menu?type=makanan');
    }

    public function getDrinkMenus()
    {
        return $this->requestService('GET','/api/home/menu?type=minuman');
    }
}
