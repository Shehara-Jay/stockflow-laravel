<x-app-layout>
    <x-slot name="header">
        <div>
            <h2 style="font-size: 24px; font-weight: 800; color: #111827;">
                Edit Order
            </h2>
            <p style="color: #6b7280; font-size: 14px; margin-top: 4px;">
                Update order customer and order status.
            </p>
        </div>
    </x-slot>

    <div style="max-width: 760px; margin: 0 auto; padding: 32px 24px;">

        <div style="background: white; border-radius: 16px; box-shadow: 0 8px 24px rgba(15, 23, 42, 0.07); border: 1px solid #e5e7eb; overflow: hidden;">

            <div style="padding: 22px 24px; border-bottom: 1px solid #e5e7eb; background: linear-gradient(135deg, #fffbeb, #ffffff);">
                <h3 style="font-size: 20px; font-weight: 900; color: #111827;">
                    Update Order Information
                </h3>
                <p style="color: #6b7280; font-size: 14px; margin-top: 4px;">
                    Modify customer and status details for this order.
                </p>
            </div>

            <div style="padding: 24px;">

                @if ($errors->any())
                    <div style="margin-bottom: 18px; padding: 14px 16px; background: #fee2e2; color: #991b1b; border-radius: 10px; font-weight: 700;">
                        <ul style="margin-left: 18px;">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div style="margin-bottom: 24px; padding: 16px; background: #f9fafb; border: 1px solid #e5e7eb; border-radius: 12px;">
                    <p style="font-weight: 900; color: #111827;">
                        {{ $order->order_number }}
                    </p>
                    <p style="color: #6b7280; margin-top: 4px;">
                        Total: Rs. {{ number_format($order->total_amount, 2) }}
                    </p>
                </div>

                <form action="{{ route('orders.update', $order) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div style="margin-bottom: 18px;">
                        <label style="display: block; font-weight: 800; color: #374151; margin-bottom: 8px;">
                            Customer
                        </label>
                        <select name="customer_id"
                                style="width: 100%; border: 1px solid #d1d5db; border-radius: 10px; padding: 12px 14px;"
                                required>
                            @foreach ($customers as $customer)
                                <option value="{{ $customer->id }}" {{ old('customer_id', $order->customer_id) == $customer->id ? 'selected' : '' }}>
                                    {{ $customer->name }} - {{ $customer->email }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div style="margin-bottom: 24px;">
                        <label style="display: block; font-weight: 800; color: #374151; margin-bottom: 8px;">
                            Status
                        </label>
                        <select name="status"
                                style="width: 100%; border: 1px solid #d1d5db; border-radius: 10px; padding: 12px 14px;">
                            <option value="pending" {{ old('status', $order->status) == 'pending' ? 'selected' : '' }}>
                                Pending
                            </option>
                            <option value="completed" {{ old('status', $order->status) == 'completed' ? 'selected' : '' }}>
                                Completed
                            </option>
                            <option value="cancelled" {{ old('status', $order->status) == 'cancelled' ? 'selected' : '' }}>
                                Cancelled
                            </option>
                        </select>
                    </div>

                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <a href="{{ route('orders.index') }}"
                           style="background: #6b7280; color: white; padding: 11px 18px; border-radius: 8px; font-weight: 800; text-decoration: none;">
                            Back
                        </a>

                        <button type="submit"
                                style="background: #ca8a04; color: white; padding: 11px 18px; border-radius: 8px; font-weight: 800; border: none; cursor: pointer; box-shadow: 0 4px 12px rgba(202, 138, 4, 0.25);">
                            Update Order
                        </button>
                    </div>
                </form>

            </div>
        </div>

    </div>
</x-app-layout>