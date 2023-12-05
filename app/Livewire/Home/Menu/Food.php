<?php

namespace App\Livewire\Home\Menu;

use Livewire\Component;
use App\Services\Home\Menu;

class Food extends Component
{
    public $foods;

    public function render()
    {
        return view('livewire.home.menu.food');
    }

    public function mount()
    {
        $menu = new Menu();
        $this->foods = $menu->getFoodMenus();
    }

    public function addToCart($id, $name, $price)
    {
        \Cart::add($id, $name, $price, 1);

        session()->flash('success', 'Menu is Added to Order Successfully !');
    }
}
