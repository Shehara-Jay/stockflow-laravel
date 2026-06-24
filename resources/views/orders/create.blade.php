<x-app-layout>
    <x-slot name="header">
        <div>
            <h2 style="font-size: 24px; font-weight: 800; color: #111827;">
                Create Order
            </h2>
            <p style="color: #6b7280; font-size: 14px; margin-top: 4px;">
                Create a customer order by selecting products and quantities.
            </p>
        </div>
    </x-slot>

    <div style="max-width: 960px; margin: 0 auto; padding: 32px 24px;">

        <div style="background: white; border-radius: 16px; box-shadow: 0 8px 24px rgba(15, 23, 42, 0.07); border: 1px solid #e5e7eb; overflow: hidden;">

            <div style="padding: 22px 24px; border-bottom: 1px solid #e5e7eb; background: linear-gradient(135deg, #fff7ed, #ffffff);">
                <h3 style="font-size: 20px; font-weight: 900; color: #111827;">
                    Order Information
                </h3>
                <p style="color: #6b7280; font-size: 14px; margin-top: 4px;">
                    Select a customer, order status, and one or more products.
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

                <form action="{{ route('orders.store') }}" method="POST">
                    @csrf

                    <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 18px; margin-bottom: 24px;">
                        <div>
                            <label style="display: block; font-weight: 800; color: #374151; margin-bottom: 8px;">
                                Customer
                            </label>
                            <select name="customer_id"
                                    style="width: 100%; border: 1px solid #d1d5db; border-radius: 10px; padding: 12px 14px;"
                                    required>
                                <option value="">Select Customer</option>
                                @foreach ($customers as $customer)
                                    <option value="{{ $customer->id }}" {{ old('customer_id') == $customer->id ? 'selected' : '' }}>
                                        {{ $customer->name }} - {{ $customer->email }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label style="display: block; font-weight: 800; color: #374151; margin-bottom: 8px;">
                                Order Status
                            </label>
                            <select name="status"
                                    style="width: 100%; border: 1px solid #d1d5db; border-radius: 10px; padding: 12px 14px;">
                                <option value="pending">Pending</option>
                                <option value="completed">Completed</option>
                                <option value="cancelled">Cancelled</option>
                            </select>
                        </div>
                    </div>

                    <div style="background: #f9fafb; border: 1px solid #e5e7eb; border-radius: 14px; padding: 20px; margin-bottom: 24px;">
                        <h3 style="font-size: 18px; font-weight: 900; color: #111827; margin-bottom: 14px;">
                            Order Items
                        </h3>

                        <div id="order-items">
                            <div class="order-item-row" style="display: grid; grid-template-columns: 2fr 1fr auto; gap: 12px; margin-bottom: 12px; align-items: end;">
                                <div>
                                    <label style="display: block; font-weight: 800; color: #374151; margin-bottom: 8px;">
                                        Product
                                    </label>
                                    <select name="product_ids[]"
                                            style="width: 100%; border: 1px solid #d1d5db; border-radius: 10px; padding: 12px 14px;"
                                            required>
                                        <option value="">Select Product</option>
                                        @foreach ($products as $product)
                                            <option value="{{ $product->id }}">
                                                {{ $product->name }} | Rs. {{ number_format($product->price, 2) }} | Stock: {{ $product->stock_quantity }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div>
                                    <label style="display: block; font-weight: 800; color: #374151; margin-bottom: 8px;">
                                        Quantity
                                    </label>
                                    <input type="number"
                                           name="quantities[]"
                                           value="1"
                                           min="1"
                                           style="width: 100%; border: 1px solid #d1d5db; border-radius: 10px; padding: 12px 14px;"
                                           required>
                                </div>

                                <button type="button"
                                        onclick="removeOrderItem(this)"
                                        style="background: #dc2626; color: white; padding: 12px 14px; border-radius: 8px; font-weight: 800; border: none; cursor: pointer;">
                                    Remove
                                </button>
                            </div>
                        </div>

                        <button type="button"
                                onclick="addOrderItem()"
                                style="background: #16a34a; color: white; padding: 10px 16px; border-radius: 8px; font-weight: 800; border: none; cursor: pointer; margin-top: 8px;">
                            + Add Another Product
                        </button>
                    </div>

                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <a href="{{ route('orders.index') }}"
                           style="background: #6b7280; color: white; padding: 11px 18px; border-radius: 8px; font-weight: 800; text-decoration: none;">
                            Back
                        </a>

                        <button type="submit"
                                style="background: #ea580c; color: white; padding: 11px 18px; border-radius: 8px; font-weight: 800; border: none; cursor: pointer; box-shadow: 0 4px 12px rgba(234, 88, 12, 0.25);">
                            Save Order
                        </button>
                    </div>
                </form>

            </div>
        </div>

    </div>

    <script>
        function addOrderItem() {
            const container = document.getElementById('order-items');
            const firstRow = container.querySelector('.order-item-row');
            const newRow = firstRow.cloneNode(true);

            newRow.querySelectorAll('select').forEach(select => select.value = '');
            newRow.querySelectorAll('input').forEach(input => input.value = 1);

            container.appendChild(newRow);
        }

        function removeOrderItem(button) {
            const rows = document.querySelectorAll('.order-item-row');

            if (rows.length > 1) {
                button.closest('.order-item-row').remove();
            }
        }
    </script>
</x-app-layout>