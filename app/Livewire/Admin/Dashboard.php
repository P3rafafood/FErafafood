<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Services\Admin\Dashboard as AdminDashboard;

#[Layout('components/layouts/admin')]
class Dashboard extends Component
{
    public $menu, $today_order, $all_orders;

    public function render()
    {
        return view('livewire.admin.dashboard');
    }

    public function mount()
    {
        $service  = new AdminDashboard();
        $dashboard = $service->getDashboard();
        $this->menu = $dashboard->menu;
        $this->today_order = $dashboard->today_order;
        $this->all_orders = $dashboard->all_order;
    }
}
