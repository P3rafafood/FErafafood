<?php

namespace App\Livewire\Home;

use App\Http\Requests\Home\OrderRequest;
use App\Services\Home\Order as HomeOrder;
use Livewire\Component;
use Livewire\Attributes\On;

class Order extends Component
{
    public $cartItems = [];
    public $order_name, $table_number, $payment;

    public function render()
    {
        return view('livewire.home.order');
    }

    public function mount()
    {
        $this->cartItems = \Cart::getContent()->toArray();
    }

    public function rules()
    {
        return (new OrderRequest())->rules();
    }

    #[On('reload')]
    public function refreshPage()
    {
        $this->cartItems = \Cart::getContent()->toArray();
    }

    public function removeCart($id)
    {
        \Cart::remove($id);

        $this->dispatch('reload');
        session()->flash('success', 'Item has removed !');
    }

    public function store()
    {
        $this->validate();

        $orders = collect($this->cartItems)->map(function($item) {
            return [
                'menu_id'   => $item['id'],
                'qty'       => $item['quantity']
            ];
        })->values()->toArray();

        $data = [
            "table_number"  => $this->table_number,
            "order_name"    => $this->order_name,
            "payment"       => $this->payment,
            "orders"        => $orders
        ];

        $order = new HomeOrder();
        $order->postOrder($data);

        \Cart::clear();
        $this->dispatch('reload');
        $this->dispatch('close-modal');
        session()->flash('success', 'Order Has Send To Resto');
    }
}
