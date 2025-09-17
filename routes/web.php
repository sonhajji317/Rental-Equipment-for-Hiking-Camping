<?php


use App\Livewire\Front\Main;
use App\Livewire\Product\Edit;
use App\Livewire\Rent\RentNow;
use App\Livewire\Cart\CartList;
use App\Livewire\Rent\RentList;
use App\Livewire\Product\Create;
use App\Livewire\Product\Details;
use App\Livewire\Rent\RentPayment;
use App\Livewire\Product\ProductAll;
use App\Livewire\Product\ProductList;
use Illuminate\Support\Facades\Route;
use App\Livewire\Admin\AdminDashboard;
use App\Livewire\Category\CategoryEdit;
use App\Livewire\Category\CategoryList;
use App\Livewire\Category\CategoryCreate;

Route::get('/', Main::class)->name('home');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', AdminDashboard::class)->name('adminDashboard');
    Route::get('/productCreate', Create::class)->name('productCreate');
    Route::get('/product/{id}/edit', Edit::class)->name('productEdit');
    Route::get('/productList', ProductList::class)->name('productList');
    Route::get('/categoryList', CategoryList::class)->name('categoryList');
    Route::get('/categoryCreate', CategoryCreate::class)->name('categoryCreate');
    Route::get('/category/{id}/edit', CategoryEdit::class)->name('categoryEdit');
});

Route::middleware([])->group(function () {
    Route::get('/cartList', CartList::class)->name('cartList');
    Route::get('/productAll', ProductAll::class)->name('productAll');
    Route::get('/product/{id}/details', Details::class)->name('productDetails');
    Route::get('/rent/{id}/now', RentNow::class)->name('rentNow');
    Route::get('/rent/{id}/payment', RentPayment::class)->name('rentPayment');
});

Route::get('/rentList', RentList::class)->name('rentList');

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('livewire.main');
//     })->name('dashboard');
// });
