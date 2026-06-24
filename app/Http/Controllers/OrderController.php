<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('customer')->latest()->paginate(10);

        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        $customers = Customer::orderBy('name')->get();
        $products = Product::where('status', true)->orderBy('name')->get();

        return view('orders.create', compact('customers', 'products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'status' => 'required|in:pending,completed,cancelled',
            'product_ids' => 'required|array',
            'product_ids.*' => 'required|exists:products,id',
            'quantities' => 'required|array',
            'quantities.*' => 'required|integer|min:1',
        ]);

        DB::transaction(function () use ($request) {
            $totalAmount = 0;

            $order = Order::create([
                'customer_id' => $request->customer_id,
                'order_number' => 'ORD-' . time(),
                'total_amount' => 0,
                'status' => $request->status,
            ]);

            foreach ($request->product_ids as $index => $productId) {
                $product = Product::findOrFail($productId);
                $quantity = $request->quantities[$index];

                $subtotal = $product->price * $quantity;
                $totalAmount += $subtotal;

                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'quantity' => $quantity,
                    'price' => $product->price,
                    'subtotal' => $subtotal,
                ]);

                if ($request->status === 'completed') {
                    $product->decrement('stock_quantity', $quantity);
                }
            }

            $order->update([
                'total_amount' => $totalAmount,
            ]);
        });

        return redirect()
            ->route('orders.index')
            ->with('success', 'Order created successfully.');
    }

    public function show(Order $order)
    {
        $order->load('customer', 'orderItems.product');

        return view('orders.show', compact('order'));
    }

    public function edit(Order $order)
    {
        $customers = Customer::orderBy('name')->get();

        return view('orders.edit', compact('order', 'customers'));
    }

    public function update(Request $request, Order $order)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'status' => 'required|in:pending,completed,cancelled',
        ]);

        $order->update([
            'customer_id' => $request->customer_id,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('orders.index')
            ->with('success', 'Order updated successfully.');
    }

    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()
            ->route('orders.index')
            ->with('success', 'Order deleted successfully.');
    }
}