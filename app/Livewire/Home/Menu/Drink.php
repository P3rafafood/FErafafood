<?php

namespace App\Livewire\Home\Menu;

use Livewire\Component;
use App\Services\Home\Menu;

class Drink extends Component
{
    public $drinks;

    public function render()
    {
        return view('livewire.home.menu.drink');
    }

    public function mount()
    {
        $menu = new Menu();
        $this->drinks = $menu->getDrinkMenus();
    }

    public function addToCart($id, $name, $price)
    {
        \Cart::add($id, $name, $price, 1);

        session()->flash('success', 'Menu is Added to Order Successfully !');
    }
}
