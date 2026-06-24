<x-app-layout>
    <x-slot name="header">
        <div>
            <h2 style="font-size: 24px; font-weight: 800; color: #111827;">
                Edit Product
            </h2>
            <p style="color: #6b7280; font-size: 14px; margin-top: 4px;">
                Update product details, pricing, stock quantity, and status.
            </p>
        </div>
    </x-slot>

    <div style="max-width: 860px; margin: 0 auto; padding: 32px 24px;">

        <div style="background: white; border-radius: 16px; box-shadow: 0 8px 24px rgba(15, 23, 42, 0.07); border: 1px solid #e5e7eb; overflow: hidden;">

            <div style="padding: 22px 24px; border-bottom: 1px solid #e5e7eb; background: linear-gradient(135deg, #fffbeb, #ffffff);">
                <h3 style="font-size: 20px; font-weight: 900; color: #111827;">
                    Update Product Information
                </h3>
                <p style="color: #6b7280; font-size: 14px; margin-top: 4px;">
                    Modify the selected product information below.
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

                <form action="{{ route('products.update', $product) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div style="margin-bottom: 18px;">
                        <label style="display: block; font-weight: 800; color: #374151; margin-bottom: 8px;">
                            Category
                        </label>
                        <select name="category_id"
                                style="width: 100%; border: 1px solid #d1d5db; border-radius: 10px; padding: 12px 14px;"
                                required>
                            <option value="">Select Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 18px;">
                        <div style="margin-bottom: 18px;">
                            <label style="display: block; font-weight: 800; color: #374151; margin-bottom: 8px;">
                                Product Name
                            </label>
                            <input type="text"
                                   name="name"
                                   value="{{ old('name', $product->name) }}"
                                   style="width: 100%; border: 1px solid #d1d5db; border-radius: 10px; padding: 12px 14px;"
                                   required>
                        </div>

                        <div style="margin-bottom: 18px;">
                            <label style="display: block; font-weight: 800; color: #374151; margin-bottom: 8px;">
                                SKU
                            </label>
                            <input type="text"
                                   name="sku"
                                   value="{{ old('sku', $product->sku) }}"
                                   style="width: 100%; border: 1px solid #d1d5db; border-radius: 10px; padding: 12px 14px;"
                                   required>
                        </div>
                    </div>

                    <div style="margin-bottom: 18px;">
                        <label style="display: block; font-weight: 800; color: #374151; margin-bottom: 8px;">
                            Description
                        </label>
                        <textarea name="description"
                                  rows="4"
                                  style="width: 100%; border: 1px solid #d1d5db; border-radius: 10px; padding: 12px 14px;">{{ old('description', $product->description) }}</textarea>
                    </div>

                    <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 18px; margin-bottom: 24px;">
                        <div>
                            <label style="display: block; font-weight: 800; color: #374151; margin-bottom: 8px;">
                                Price
                            </label>
                            <input type="number"
                                   step="0.01"
                                   name="price"
                                   value="{{ old('price', $product->price) }}"
                                   style="width: 100%; border: 1px solid #d1d5db; border-radius: 10px; padding: 12px 14px;"
                                   required>
                        </div>

                        <div>
                            <label style="display: block; font-weight: 800; color: #374151; margin-bottom: 8px;">
                                Stock Quantity
                            </label>
                            <input type="number"
                                   name="stock_quantity"
                                   value="{{ old('stock_quantity', $product->stock_quantity) }}"
                                   style="width: 100%; border: 1px solid #d1d5db; border-radius: 10px; padding: 12px 14px;"
                                   required>
                        </div>

                        <div>
                            <label style="display: block; font-weight: 800; color: #374151; margin-bottom: 8px;">
                                Status
                            </label>
                            <select name="status"
                                    style="width: 100%; border: 1px solid #d1d5db; border-radius: 10px; padding: 12px 14px;">
                                <option value="1" {{ old('status', $product->status) == 1 ? 'selected' : '' }}>
                                    Active
                                </option>
                                <option value="0" {{ old('status', $product->status) == 0 ? 'selected' : '' }}>
                                    Inactive
                                </option>
                            </select>
                        </div>
                    </div>

                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <a href="{{ route('products.index') }}"
                           style="background: #6b7280; color: white; padding: 11px 18px; border-radius: 8px; font-weight: 800; text-decoration: none;">
                            Back
                        </a>

                        <button type="submit"
                                style="background: #ca8a04; color: white; padding: 11px 18px; border-radius: 8px; font-weight: 800; border: none; cursor: pointer; box-shadow: 0 4px 12px rgba(202, 138, 4, 0.25);">
                            Update Product
                        </button>
                    </div>
                </form>

            </div>
        </div>

    </div>
</x-app-layout>