<x-app-layout>
    <x-slot name="header">
        <div>
            <h2 style="font-size: 24px; font-weight: 800; color: #111827;">
                Category Details
            </h2>
            <p style="color: #6b7280; font-size: 14px; margin-top: 4px;">
                View category information and current status.
            </p>
        </div>
    </x-slot>

    <div style="max-width: 760px; margin: 0 auto; padding: 32px 24px;">

        <div style="background: white; border-radius: 16px; box-shadow: 0 8px 24px rgba(15, 23, 42, 0.07); border: 1px solid #e5e7eb; overflow: hidden;">

            <div style="padding: 26px 24px; background: linear-gradient(135deg, #111827, #2563eb); color: white;">
                <h3 style="font-size: 24px; font-weight: 900;">
                    {{ $category->name }}
                </h3>
                <p style="color: #dbeafe; margin-top: 6px;">
                    Category ID: #{{ $category->id }}
                </p>
            </div>

            <div style="padding: 24px;">

                <div style="margin-bottom: 20px;">
                    <p style="font-size: 13px; font-weight: 900; color: #6b7280; text-transform: uppercase; margin-bottom: 6px;">
                        Description
                    </p>
                    <p style="color: #111827; line-height: 1.6;">
                        {{ $category->description ?? 'No description added.' }}
                    </p>
                </div>

                <div style="margin-bottom: 20px;">
                    <p style="font-size: 13px; font-weight: 900; color: #6b7280; text-transform: uppercase; margin-bottom: 6px;">
                        Status
                    </p>

                    @if ($category->status)
                        <span style="background: #dcfce7; color: #166534; padding: 7px 12px; border-radius: 999px; font-size: 13px; font-weight: 900;">
                            Active
                        </span>
                    @else
                        <span style="background: #fee2e2; color: #991b1b; padding: 7px 12px; border-radius: 999px; font-size: 13px; font-weight: 900;">
                            Inactive
                        </span>
                    @endif
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px; margin-bottom: 24px;">
                    <div style="background: #f9fafb; border: 1px solid #e5e7eb; padding: 16px; border-radius: 12px;">
                        <p style="color: #6b7280; font-weight: 700; font-size: 13px;">Created At</p>
                        <p style="color: #111827; font-weight: 800; margin-top: 4px;">
                            {{ $category->created_at->format('Y-m-d H:i') }}
                        </p>
                    </div>

                    <div style="background: #f9fafb; border: 1px solid #e5e7eb; padding: 16px; border-radius: 12px;">
                        <p style="color: #6b7280; font-weight: 700; font-size: 13px;">Last Updated</p>
                        <p style="color: #111827; font-weight: 800; margin-top: 4px;">
                            {{ $category->updated_at->format('Y-m-d H:i') }}
                        </p>
                    </div>
                </div>

                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <a href="{{ route('categories.index') }}"
                       style="background: #6b7280; color: white; padding: 11px 18px; border-radius: 8px; font-weight: 800; text-decoration: none;">
                        Back
                    </a>

                    <a href="{{ route('categories.edit', $category) }}"
                       style="background: #2563eb; color: white; padding: 11px 18px; border-radius: 8px; font-weight: 800; text-decoration: none; box-shadow: 0 4px 12px rgba(37, 99, 235, 0.25);">
                        Edit Category
                    </a>
                </div>

            </div>
        </div>

    </div>
</x-app-layout>