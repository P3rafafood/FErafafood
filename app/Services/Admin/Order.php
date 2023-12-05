<?php

namespace App\Services\Admin;

use App\Services\Service;

class Order extends Service
{
    public $baseUri;

    public function __construct()
    {
        $this->baseUri = env('BACKEND_URL');
    }

    public function getOrderNotif()
    {
        $headers = [
            'Authorization' => 'Bearer '.session('token')
        ];
        return $this->requestService('GET', '/api/admin/order/notification', headers: $headers);
    }

    public function getOrderToday()
    {
        $headers = [
            'Authorization' => 'Bearer '.session('token')
        ];
        return $this->requestService('GET', '/api/admin/order', headers: $headers);
    }

    public function getOrderHistory()
    {
        $headers = [
            'Authorization' => 'Bearer '.session('token')
        ];
        return $this->requestService('GET', '/api/admin/order/history', headers: $headers);
    }

    public function getOrderDetail($id)
    {
        $headers = [
            'Authorization' => 'Bearer '.session('token')
        ];
        return $this->requestService('GET', "/api/admin/order/$id", headers: $headers);
    }

    public function putOrderStatus($id, $request)
    {
        $headers = [
            'Authorization' => 'Bearer '.session('token')
        ];
        return $this->requestService('PUT', "/api/admin/order/$id", $request, $headers);
    }
}
