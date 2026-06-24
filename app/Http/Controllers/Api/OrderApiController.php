<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderApiController extends Controller
{
    public function index()
    {
        $orders = Order::with('customer', 'orderItems.product')->latest()->get();

        return response()->json([
            'success' => true,
            'data' => $orders,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'status' => 'required|in:pending,completed,cancelled',
            'items' => 'required|array',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.quantity' => 'required|integer|min:1',
        ]);

        $order = DB::transaction(function () use ($request) {
            $totalAmount = 0;

            $order = Order::create([
                'customer_id' => $request->customer_id,
                'order_number' => 'ORD-' . time(),
                'total_amount' => 0,
                'status' => $request->status,
            ]);

            foreach ($request->items as $item) {
                $product = Product::findOrFail($item['product_id']);
                $quantity = $item['quantity'];

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

            return $order;
        });

        return response()->json([
            'success' => true,
            'message' => 'Order created successfully.',
            'data' => $order->load('customer', 'orderItems.product'),
        ], 201);
    }

    public function show(Order $order)
    {
        return response()->json([
            'success' => true,
            'data' => $order->load('customer', 'orderItems.product'),
        ]);
    }

    public function update(Request $request, Order $order)
    {
        $validated = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'status' => 'required|in:pending,completed,cancelled',
        ]);

        $order->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Order updated successfully.',
            'data' => $order->load('customer', 'orderItems.product'),
        ]);
    }

    public function destroy(Order $order)
    {
        $order->delete();

        return response()->json([
            'success' => true,
            'message' => 'Order deleted successfully.',
        ]);
    }
}