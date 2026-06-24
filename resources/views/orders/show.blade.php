<x-app-layout>
    <x-slot name="header">
        <div>
            <h2 style="font-size: 24px; font-weight: 800; color: #111827;">
                Order Details
            </h2>
            <p style="color: #6b7280; font-size: 14px; margin-top: 4px;">
                View order summary, customer details, and ordered products.
            </p>
        </div>
    </x-slot>

    <div style="max-width: 960px; margin: 0 auto; padding: 32px 24px;">

        <div style="background: white; border-radius: 16px; box-shadow: 0 8px 24px rgba(15, 23, 42, 0.07); border: 1px solid #e5e7eb; overflow: hidden;">

            <div style="padding: 28px 24px; background: linear-gradient(135deg, #111827, #ea580c); color: white;">
                <h3 style="font-size: 26px; font-weight: 900;">
                    {{ $order->order_number }}
                </h3>
                <p style="color: #ffedd5; margin-top: 6px;">
                    Created on {{ $order->created_at->format('Y-m-d H:i') }}
                </p>
            </div>

            <div style="padding: 24px;">

                <div style="display: grid; grid-template-columns: 2fr 1fr 1fr; gap: 16px; margin-bottom: 24px;">
                    <div style="background: #f9fafb; border: 1px solid #e5e7eb; padding: 16px; border-radius: 12px;">
                        <p style="color: #6b7280; font-weight: 700; font-size: 13px;">Customer</p>
                        <p style="color: #111827; font-weight: 900; margin-top: 6px;">
                            {{ $order->customer->name ?? '-' }}
                        </p>
                        <p style="color: #6b7280; margin-top: 3px;">
                            {{ $order->customer->email ?? '-' }}
                        </p>
                    </div>

                    <div style="background: #f9fafb; border: 1px solid #e5e7eb; padding: 16px; border-radius: 12px;">
                        <p style="color: #6b7280; font-weight: 700; font-size: 13px;">Status</p>
                        <p style="margin-top: 8px;">
                            @if ($order->status === 'completed')
                                <span style="background: #dcfce7; color: #166534; padding: 7px 12px; border-radius: 999px; font-size: 13px; font-weight: 900;">
                                    Completed
                                </span>
                            @elseif ($order->status === 'cancelled')
                                <span style="background: #fee2e2; color: #991b1b; padding: 7px 12px; border-radius: 999px; font-size: 13px; font-weight: 900;">
                                    Cancelled
                                </span>
                            @else
                                <span style="background: #fef3c7; color: #92400e; padding: 7px 12px; border-radius: 999px; font-size: 13px; font-weight: 900;">
                                    Pending
                                </span>
                            @endif
                        </p>
                    </div>

                    <div style="background: #f9fafb; border: 1px solid #e5e7eb; padding: 16px; border-radius: 12px;">
                        <p style="color: #6b7280; font-weight: 700; font-size: 13px;">Total Amount</p>
                        <p style="color: #111827; font-weight: 900; font-size: 20px; margin-top: 6px;">
                            Rs. {{ number_format($order->total_amount, 2) }}
                        </p>
                    </div>
                </div>

                <h4 style="font-size: 18px; font-weight: 900; color: #111827; margin-bottom: 14px;">
                    Ordered Products
                </h4>

                <div style="overflow-x: auto; border: 1px solid #e5e7eb; border-radius: 14px; margin-bottom: 24px;">
                    <table style="width: 100%; border-collapse: collapse;">
                        <thead>
                            <tr style="background: #f9fafb;">
                                <th style="padding: 14px 16px; text-align: left; font-size: 13px; font-weight: 900; color: #374151; border-bottom: 1px solid #e5e7eb;">Product</th>
                                <th style="padding: 14px 16px; text-align: left; font-size: 13px; font-weight: 900; color: #374151; border-bottom: 1px solid #e5e7eb;">Quantity</th>
                                <th style="padding: 14px 16px; text-align: left; font-size: 13px; font-weight: 900; color: #374151; border-bottom: 1px solid #e5e7eb;">Price</th>
                                <th style="padding: 14px 16px; text-align: left; font-size: 13px; font-weight: 900; color: #374151; border-bottom: 1px solid #e5e7eb;">Subtotal</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($order->orderItems as $item)
                                <tr>
                                    <td style="padding: 15px 16px; border-bottom: 1px solid #e5e7eb; font-weight: 800; color: #111827;">
                                        {{ $item->product->name ?? '-' }}
                                    </td>
                                    <td style="padding: 15px 16px; border-bottom: 1px solid #e5e7eb;">
                                        {{ $item->quantity }}
                                    </td>
                                    <td style="padding: 15px 16px; border-bottom: 1px solid #e5e7eb;">
                                        Rs. {{ number_format($item->price, 2) }}
                                    </td>
                                    <td style="padding: 15px 16px; border-bottom: 1px solid #e5e7eb; font-weight: 900;">
                                        Rs. {{ number_format($item->subtotal, 2) }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <a href="{{ route('orders.index') }}"
                       style="background: #6b7280; color: white; padding: 11px 18px; border-radius: 8px; font-weight: 800; text-decoration: none;">
                        Back
                    </a>

                    <a href="{{ route('orders.edit', $order) }}"
                       style="background: #ea580c; color: white; padding: 11px 18px; border-radius: 8px; font-weight: 800; text-decoration: none; box-shadow: 0 4px 12px rgba(234, 88, 12, 0.25);">
                        Edit Order
                    </a>
                </div>

            </div>
        </div>

    </div>
</x-app-layout>