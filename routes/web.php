<?php

use App\Livewire\Auth\Login;
use App\Livewire\Home\Index;
use App\Livewire\Home\Order;
use App\Livewire\Home\Menu\Food;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\Menu\Edit;
use App\Livewire\Home\Menu\Drink;
use App\Livewire\Admin\Menu\Create;
use App\Livewire\Admin\Order\Today;
use App\Livewire\Admin\Order\Detail;
use App\Livewire\Admin\Order\History;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Livewire\Admin\Menu\Index as MenuIndex;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', Index::class)->name('home');
Route::prefix('/menu')->name('menu.')->group(function(){
    Route::get('/makanan', Food::class)->name('food');
    Route::get('/minuman', Drink::class)->name('drink');
});
Route::get('/order', Order::class)->name('order');
Route::get('/login', Login::class)->name('login');

Route::middleware('paseto.auth')->prefix('/admin')->name('admin.')->group(function(){
    Route::get('/logout', AuthController::class)->name('logout');
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::prefix('/menu')->name('menu.')->group(function(){
        Route::get('/', MenuIndex::class)->name('index');
        Route::get('/create', Create::class)->name('create');
        Route::get('/{id}/edit', Edit::class)->name('edit');
    });
    Route::prefix('/order')->name('order.')->group(function(){
        Route::get('/today', Today::class)->name('today');
        Route::get('/history', History::class)->name('history');
        Route::get('/{id}/{from}', Detail::class)->name('detail');
    });
});
