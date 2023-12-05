<?php

namespace App\Livewire\Auth;

use App\Services\Home\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components/layouts/auth')]
class Login extends Component
{
    public $email, $password;

    public function render()
    {
        return view('livewire.auth.login');
    }

    public function store()
    {
        $auth = new Auth();
        $data = [
            'email'     => $this->email,
            'password'  => $this->password
        ];
        $res = $auth->login($data);
        session()->put('user', $res->user);
        session()->put('token', $res->token);

        return redirect()->route('admin.dashboard');
    }
}
