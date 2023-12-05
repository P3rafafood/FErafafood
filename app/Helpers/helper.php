<?php

if (!function_exists('rupiah')) {
    function rupiah($value) {
        return number_format($value, 0, ',', '.');
    }
}

if (!function_exists('userLogin')) {
    function userLogin() {
        $user = session('user');
        return $user;
    }
}

if (!function_exists('userLoginName')) {
    function userLoginName() {
        $user = userLogin();
        return $user->name;
    }
}

if (!function_exists('getStatusOrder')) {
    function getStatusOrder($status) {
        $result = '';
        switch ($status) {
            case 'proses':
                $result = 'payment';
                break;
            case 'payment':
                $result = 'finish';
                break;

            default:
                $result = 'proses';
                break;
        }
        return $result;
    }
}
