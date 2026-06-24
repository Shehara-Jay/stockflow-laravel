<x-app-layout>
    <x-slot name="header">
        <div>
            <h2 style="font-size: 24px; font-weight: 800; color: #111827;">
                StockFlow Dashboard
            </h2>
            <p style="color: #6b7280; font-size: 14px; margin-top: 4px;">
                Manage inventory, customers, orders, and stock performance from one place.
            </p>
        </div>
    </x-slot>

    <div style="max-width: 1180px; margin: 0 auto; padding: 32px 24px;">

        <div style="background: linear-gradient(135deg, #111827, #1d4ed8); color: white; padding: 34px; border-radius: 18px; margin-bottom: 28px; box-shadow: 0 12px 30px rgba(15, 23, 42, 0.18);">
            <h1 style="font-size: 30px; font-weight: 900; margin-bottom: 8px;">
                Welcome to StockFlow
            </h1>

            <div style="display: flex; gap: 12px; flex-wrap: wrap; margin-top: 22px;">
                <a href="{{ route('products.index') }}"
                   style="background: white; color: #1d4ed8; padding: 11px 18px; border-radius: 8px; font-weight: 800; text-decoration: none;">
                    Manage Products
                </a>

                <a href="{{ route('orders.create') }}"
                   style="background: #22c55e; color: white; padding: 11px 18px; border-radius: 8px; font-weight: 800; text-decoration: none;">
                    Create Order
                </a>
            </div>
        </div>

        <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; margin-bottom: 28px;">

            <div style="background: white; padding: 24px; border-radius: 16px; border-left: 5px solid #2563eb; box-shadow: 0 8px 24px rgba(15, 23, 42, 0.07);">
                <p style="color: #6b7280; font-weight: 700; font-size: 14px;">Total Categories</p>
                <h3 style="font-size: 36px; font-weight: 900; color: #2563eb; margin-top: 10px;">
                    {{ $totalCategories }}
                </h3>
            </div>

            <div style="background: white; padding: 24px; border-radius: 16px; border-left: 5px solid #16a34a; box-shadow: 0 8px 24px rgba(15, 23, 42, 0.07);">
                <p style="color: #6b7280; font-weight: 700; font-size: 14px;">Total Products</p>
                <h3 style="font-size: 36px; font-weight: 900; color: #16a34a; margin-top: 10px;">
                    {{ $totalProducts }}
                </h3>
            </div>

            <div style="background: white; padding: 24px; border-radius: 16px; border-left: 5px solid #7c3aed; box-shadow: 0 8px 24px rgba(15, 23, 42, 0.07);">
                <p style="color: #6b7280; font-weight: 700; font-size: 14px;">Total Customers</p>
                <h3 style="font-size: 36px; font-weight: 900; color: #7c3aed; margin-top: 10px;">
                    {{ $totalCustomers }}
                </h3>
            </div>

            <div style="background: white; padding: 24px; border-radius: 16px; border-left: 5px solid #ea580c; box-shadow: 0 8px 24px rgba(15, 23, 42, 0.07);">
                <p style="color: #6b7280; font-weight: 700; font-size: 14px;">Total Orders</p>
                <h3 style="font-size: 36px; font-weight: 900; color: #ea580c; margin-top: 10px;">
                    {{ $totalOrders }}
                </h3>
            </div>

            <div style="background: white; padding: 24px; border-radius: 16px; border-left: 5px solid #dc2626; box-shadow: 0 8px 24px rgba(15, 23, 42, 0.07);">
                <p style="color: #6b7280; font-weight: 700; font-size: 14px;">Low Stock Products</p>
                <h3 style="font-size: 36px; font-weight: 900; color: #dc2626; margin-top: 10px;">
                    {{ $lowStockProducts }}
                </h3>
            </div>

            <div style="background: white; padding: 24px; border-radius: 16px; border-left: 5px solid #0891b2; box-shadow: 0 8px 24px rgba(15, 23, 42, 0.07);">
                <p style="color: #6b7280; font-weight: 700; font-size: 14px;">Completed Orders</p>
                <h3 style="font-size: 36px; font-weight: 900; color: #0891b2; margin-top: 10px;">
                    {{ $completedOrders }}
                </h3>
            </div>

        </div>

        <div style="background: white; padding: 26px; border-radius: 16px; box-shadow: 0 8px 24px rgba(15, 23, 42, 0.07);">
            <h3 style="font-size: 20px; font-weight: 900; color: #111827; margin-bottom: 6px;">
                Quick Management
            </h3>
            <p style="color: #6b7280; margin-bottom: 20px;">
                Access the main inventory modules quickly.
            </p>

            <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 14px;">
                <a href="{{ route('categories.index') }}"
                   style="background: #eff6ff; color: #1d4ed8; padding: 18px; border-radius: 12px; font-weight: 800; text-decoration: none; border: 1px solid #bfdbfe;">
                    Categories
                </a>

                <a href="{{ route('products.index') }}"
                   style="background: #f0fdf4; color: #15803d; padding: 18px; border-radius: 12px; font-weight: 800; text-decoration: none; border: 1px solid #bbf7d0;">
                    Products
                </a>

                <a href="{{ route('customers.index') }}"
                   style="background: #f5f3ff; color: #6d28d9; padding: 18px; border-radius: 12px; font-weight: 800; text-decoration: none; border: 1px solid #ddd6fe;">
                    Customers
                </a>

                <a href="{{ route('orders.index') }}"
                   style="background: #fff7ed; color: #c2410c; padding: 18px; border-radius: 12px; font-weight: 800; text-decoration: none; border: 1px solid #fed7aa;">
                    Orders
                </a>
            </div>
        </div>

    </div>
</x-app-layout>