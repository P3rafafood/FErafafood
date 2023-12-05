<?php

namespace App\Livewire\Admin\Order;

use App\Services\Admin\Order;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components/layouts/admin')]
class Detail extends Component
{
    public $order,$from;

    public function render()
    {
        return view('livewire.admin.order.detail');
    }

    public function mount($id, $from)
    {
        $detail = new Order();
        $this->order = $detail->getOrderDetail($id);
        $this->from = $from;
    }
}
