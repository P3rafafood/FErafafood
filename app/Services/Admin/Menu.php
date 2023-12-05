<?php

namespace App\Services\Admin;

use App\Services\Service;

class Menu extends Service
{
    public $baseUri;

    public function __construct()
    {
        $this->baseUri = env('BACKEND_URL');
    }

    public function getMenus()
    {
        $headers = [
            'Authorization' => 'Bearer '.session('token')
        ];
        return $this->requestService('GET', '/api/admin/menu', headers: $headers);
    }

    public function getMenu($id)
    {
        $headers = [
            'Authorization' => 'Bearer '.session('token')
        ];
        return $this->requestService('GET', "/api/admin/menu/$id", headers: $headers);
    }

    public function storeMenu($request)
    {
        $headers = [
            'Authorization' => 'Bearer '.session('token')
        ];

        $files = [
            'image' => storage_path('app/public/' . $request['image'])
        ];
        return $this->requestService('POST', '/api/admin/menu', $request, $headers, $files);
    }

    public function updateMenu($id, $request)
    {
        $headers = [
            'Authorization' => 'Bearer '.session('token')
        ];

        if (isset($request['image'])) {
            $files = [
                'image' => storage_path('app/public/' . $request['image'])
            ];
            return $this->requestService('PUT', "/api/admin/menu/$id", $request, $headers, $files);
        }

        return $this->requestService('PUT', "/api/admin/menu/$id", $request, $headers);
    }

    public function deleteMenu($id)
    {
        $headers = [
            'Authorization' => 'Bearer '.session('token')
        ];
        return $this->requestService('DELETE', "/api/admin/menu/$id", headers: $headers);
    }
}
