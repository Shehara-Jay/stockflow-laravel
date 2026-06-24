<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;

Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard');
    }

    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    $totalCategories = \App\Models\Category::count();
    $totalProducts = \App\Models\Product::count();
    $totalCustomers = \App\Models\Customer::count();
    $totalOrders = \App\Models\Order::count();
    $lowStockProducts = \App\Models\Product::where('stock_quantity', '<=', 5)->count();
    $completedOrders = \App\Models\Order::where('status', 'completed')->count();

    return view('dashboard', compact(
        'totalCategories',
        'totalProducts',
        'totalCustomers',
        'totalOrders',
        'lowStockProducts',
        'completedOrders'
    ));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
    Route::resource('customers', CustomerController::class);
    Route::resource('orders', OrderController::class);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
});

require __DIR__.'/auth.php';