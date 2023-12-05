<?php

namespace App\Livewire\Admin\Order;

use App\Services\Admin\Order;
use Livewire\Component;

class Notif extends Component
{
    public $count, $notifications;

    public function render()
    {
        return view('livewire.admin.order.notif');
    }

    public function mount()
    {
        $order = new Order();
        $this->count = $order->getOrderNotif()->count;
        $this->notifications = $order->getOrderNotif()->data;
    }
}
