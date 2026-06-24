@php
    use Illuminate\Support\Str;
@endphp
<x-app-layout>
    <x-slot name="header">
        <div>
            <h2 style="font-size: 24px; font-weight: 800; color: #111827;">
                Products
            </h2>
            <p style="color: #6b7280; font-size: 14px; margin-top: 4px;">
                Manage inventory products, pricing, stock levels, and product status.
            </p>
        </div>
    </x-slot>

    <div style="max-width: 1180px; margin: 0 auto; padding: 32px 24px;">

        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px;">
            <div>
                <h3 style="font-size: 20px; font-weight: 800; color: #111827;">
                    Product Inventory
                </h3>
                <p style="color: #6b7280; font-size: 14px; margin-top: 4px;">
                    View, update, and track products with stock indicators.
                </p>
            </div>

            <a href="{{ route('products.create') }}"
               style="background: #16a34a; color: white; padding: 11px 18px; border-radius: 8px; font-weight: 800; text-decoration: none; box-shadow: 0 4px 12px rgba(22, 163, 74, 0.25);">
                + Add Product
            </a>
        </div>

        @if (session('success'))
            <div style="margin-bottom: 18px; padding: 14px 16px; background: #dcfce7; color: #166534; border-radius: 10px; font-weight: 700;">
                {{ session('success') }}
            </div>
        @endif

        <div style="background: white; border-radius: 16px; box-shadow: 0 8px 24px rgba(15, 23, 42, 0.07); border: 1px solid #e5e7eb; overflow: hidden;">
            <div style="padding: 22px 24px; border-bottom: 1px solid #e5e7eb; background: #f9fafb;">
                <h4 style="font-size: 17px; font-weight: 800; color: #111827;">
                    All Products
                </h4>
            </div>

            <div style="overflow-x: auto;">
                <table style="width: 100%; border-collapse: collapse;">
                    <thead>
                        <tr>
                            <th style="padding: 15px 18px; text-align: left; font-size: 13px; font-weight: 900; color: #374151; border-bottom: 1px solid #e5e7eb;">Product</th>
                            <th style="padding: 15px 18px; text-align: left; font-size: 13px; font-weight: 900; color: #374151; border-bottom: 1px solid #e5e7eb;">Category</th>
                            <th style="padding: 15px 18px; text-align: left; font-size: 13px; font-weight: 900; color: #374151; border-bottom: 1px solid #e5e7eb;">SKU</th>
                            <th style="padding: 15px 18px; text-align: left; font-size: 13px; font-weight: 900; color: #374151; border-bottom: 1px solid #e5e7eb;">Price</th>
                            <th style="padding: 15px 18px; text-align: left; font-size: 13px; font-weight: 900; color: #374151; border-bottom: 1px solid #e5e7eb;">Stock</th>
                            <th style="padding: 15px 18px; text-align: left; font-size: 13px; font-weight: 900; color: #374151; border-bottom: 1px solid #e5e7eb;">Status</th>
                            <th style="padding: 15px 18px; text-align: left; font-size: 13px; font-weight: 900; color: #374151; border-bottom: 1px solid #e5e7eb;">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($products as $product)
                            <tr>
                                <td style="padding: 16px 18px; border-bottom: 1px solid #e5e7eb;">
                                    <div style="font-weight: 800; color: #111827;">
                                        {{ $product->name }}
                                    </div>
                                    <div style="font-size: 13px; color: #6b7280; margin-top: 3px;">
                                        {{ Str::limit($product->description, 45) ?? 'No description' }}
                                    </div>
                                </td>

                                <td style="padding: 16px 18px; border-bottom: 1px solid #e5e7eb; color: #374151;">
                                    {{ $product->category->name ?? '-' }}
                                </td>

                                <td style="padding: 16px 18px; border-bottom: 1px solid #e5e7eb;">
                                    <span style="background: #f3f4f6; color: #374151; padding: 6px 9px; border-radius: 8px; font-weight: 800; font-size: 12px;">
                                        {{ $product->sku }}
                                    </span>
                                </td>

                                <td style="padding: 16px 18px; border-bottom: 1px solid #e5e7eb; font-weight: 800; color: #111827;">
                                    Rs. {{ number_format($product->price, 2) }}
                                </td>

                                <td style="padding: 16px 18px; border-bottom: 1px solid #e5e7eb;">
                                    @if ($product->stock_quantity <= 5)
                                        <span style="background: #fee2e2; color: #991b1b; padding: 6px 10px; border-radius: 999px; font-size: 12px; font-weight: 900;">
                                            {{ $product->stock_quantity }} Low
                                        </span>
                                    @else
                                        <span style="background: #dcfce7; color: #166534; padding: 6px 10px; border-radius: 999px; font-size: 12px; font-weight: 900;">
                                            {{ $product->stock_quantity }} In Stock
                                        </span>
                                    @endif
                                </td>

                                <td style="padding: 16px 18px; border-bottom: 1px solid #e5e7eb;">
                                    @if ($product->status)
                                        <span style="background: #dcfce7; color: #166534; padding: 6px 10px; border-radius: 999px; font-size: 12px; font-weight: 900;">
                                            Active
                                        </span>
                                    @else
                                        <span style="background: #fee2e2; color: #991b1b; padding: 6px 10px; border-radius: 999px; font-size: 12px; font-weight: 900;">
                                            Inactive
                                        </span>
                                    @endif
                                </td>

                                <td style="padding: 16px 18px; border-bottom: 1px solid #e5e7eb;">
                                    <a href="{{ route('products.show', $product) }}" style="color: #2563eb; font-weight: 800; text-decoration: none;">View</a>

                                    <a href="{{ route('products.edit', $product) }}" style="color: #ca8a04; font-weight: 800; text-decoration: none; margin-left: 14px;">Edit</a>

                                    <form action="{{ route('products.destroy', $product) }}"
                                          method="POST"
                                          style="display: inline-block; margin-left: 14px;"
                                          onsubmit="return confirm('Are you sure you want to delete this product?')">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                style="color: #dc2626; font-weight: 800; background: none; border: none; cursor: pointer; padding: 0;">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" style="padding: 28px; text-align: center; color: #6b7280;">
                                    No products found. Add your first product to start managing inventory.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div style="padding: 18px 24px;">
                {{ $products->links() }}
            </div>
        </div>

    </div>
</x-app-layout>