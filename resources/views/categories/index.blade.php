<x-app-layout>
    <x-slot name="header">
        <div>
            <h2 style="font-size: 24px; font-weight: 800; color: #111827;">
                Categories
            </h2>
            <p style="color: #6b7280; font-size: 14px; margin-top: 4px;">
                Manage product categories used across your inventory.
            </p>
        </div>
    </x-slot>

    <div style="max-width: 1180px; margin: 0 auto; padding: 32px 24px;">

        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px;">
            <div>
                <h3 style="font-size: 20px; font-weight: 800; color: #111827;">
                    Category List
                </h3>
                <p style="color: #6b7280; font-size: 14px; margin-top: 4px;">
                    Create, view, update, and remove inventory categories.
                </p>
            </div>

            <a href="{{ route('categories.create') }}"
               style="background: #2563eb; color: white; padding: 11px 18px; border-radius: 8px; font-weight: 800; text-decoration: none; box-shadow: 0 4px 12px rgba(37, 99, 235, 0.25);">
                + Add Category
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
                    All Categories
                </h4>
            </div>

            <div style="padding: 0; overflow-x: auto;">
                <table style="width: 100%; border-collapse: collapse;">
                    <thead>
                        <tr style="background: #ffffff;">
                            <th style="padding: 15px 18px; text-align: left; font-size: 13px; font-weight: 900; color: #374151; border-bottom: 1px solid #e5e7eb;">
                                Name
                            </th>
                            <th style="padding: 15px 18px; text-align: left; font-size: 13px; font-weight: 900; color: #374151; border-bottom: 1px solid #e5e7eb;">
                                Description
                            </th>
                            <th style="padding: 15px 18px; text-align: left; font-size: 13px; font-weight: 900; color: #374151; border-bottom: 1px solid #e5e7eb;">
                                Status
                            </th>
                            <th style="padding: 15px 18px; text-align: left; font-size: 13px; font-weight: 900; color: #374151; border-bottom: 1px solid #e5e7eb;">
                                Actions
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($categories as $category)
                            <tr>
                                <td style="padding: 16px 18px; border-bottom: 1px solid #e5e7eb; color: #111827; font-weight: 700;">
                                    {{ $category->name }}
                                </td>

                                <td style="padding: 16px 18px; border-bottom: 1px solid #e5e7eb; color: #6b7280;">
                                    {{ $category->description ?? '-' }}
                                </td>

                                <td style="padding: 16px 18px; border-bottom: 1px solid #e5e7eb;">
                                    @if ($category->status)
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
                                    <a href="{{ route('categories.show', $category) }}"
                                       style="color: #2563eb; font-weight: 800; text-decoration: none;">
                                        View
                                    </a>

                                    <a href="{{ route('categories.edit', $category) }}"
                                       style="color: #ca8a04; font-weight: 800; text-decoration: none; margin-left: 14px;">
                                        Edit
                                    </a>

                                    <form action="{{ route('categories.destroy', $category) }}"
                                          method="POST"
                                          style="display: inline-block; margin-left: 14px;"
                                          onsubmit="return confirm('Are you sure you want to delete this category?')">
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
                                <td colspan="4" style="padding: 28px; text-align: center; color: #6b7280; border-bottom: 1px solid #e5e7eb;">
                                    No categories found. Add your first category to get started.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div style="padding: 18px 24px;">
                {{ $categories->links() }}
            </div>
        </div>

    </div>
</x-app-layout>