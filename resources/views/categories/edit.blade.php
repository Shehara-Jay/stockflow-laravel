<x-app-layout>
    <x-slot name="header">
        <div>
            <h2 style="font-size: 24px; font-weight: 800; color: #111827;">
                Edit Category
            </h2>
            <p style="color: #6b7280; font-size: 14px; margin-top: 4px;">
                Update category details and availability status.
            </p>
        </div>
    </x-slot>

    <div style="max-width: 760px; margin: 0 auto; padding: 32px 24px;">

        <div style="background: white; border-radius: 16px; box-shadow: 0 8px 24px rgba(15, 23, 42, 0.07); border: 1px solid #e5e7eb; overflow: hidden;">

            <div style="padding: 22px 24px; border-bottom: 1px solid #e5e7eb; background: linear-gradient(135deg, #fffbeb, #ffffff);">
                <h3 style="font-size: 20px; font-weight: 900; color: #111827;">
                    Update Category Information
                </h3>
                <p style="color: #6b7280; font-size: 14px; margin-top: 4px;">
                    Modify the selected category information below.
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

                <form action="{{ route('categories.update', $category) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div style="margin-bottom: 18px;">
                        <label style="display: block; font-weight: 800; color: #374151; margin-bottom: 8px;">
                            Category Name
                        </label>
                        <input type="text"
                               name="name"
                               value="{{ old('name', $category->name) }}"
                               style="width: 100%; border: 1px solid #d1d5db; border-radius: 10px; padding: 12px 14px;"
                               required>
                    </div>

                    <div style="margin-bottom: 18px;">
                        <label style="display: block; font-weight: 800; color: #374151; margin-bottom: 8px;">
                            Description
                        </label>
                        <textarea name="description"
                                  rows="4"
                                  style="width: 100%; border: 1px solid #d1d5db; border-radius: 10px; padding: 12px 14px;">{{ old('description', $category->description) }}</textarea>
                    </div>

                    <div style="margin-bottom: 24px;">
                        <label style="display: block; font-weight: 800; color: #374151; margin-bottom: 8px;">
                            Status
                        </label>
                        <select name="status"
                                style="width: 100%; border: 1px solid #d1d5db; border-radius: 10px; padding: 12px 14px;">
                            <option value="1" {{ old('status', $category->status) == 1 ? 'selected' : '' }}>
                                Active
                            </option>
                            <option value="0" {{ old('status', $category->status) == 0 ? 'selected' : '' }}>
                                Inactive
                            </option>
                        </select>
                    </div>

                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <a href="{{ route('categories.index') }}"
                           style="background: #6b7280; color: white; padding: 11px 18px; border-radius: 8px; font-weight: 800; text-decoration: none;">
                            Back
                        </a>

                        <button type="submit"
                                style="background: #ca8a04; color: white; padding: 11px 18px; border-radius: 8px; font-weight: 800; border: none; cursor: pointer; box-shadow: 0 4px 12px rgba(202, 138, 4, 0.25);">
                            Update Category
                        </button>
                    </div>
                </form>

            </div>
        </div>

    </div>
</x-app-layout>