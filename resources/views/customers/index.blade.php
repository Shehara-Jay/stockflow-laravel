<x-app-layout>
    <x-slot name="header">
        <div>
            <h2 style="font-size: 24px; font-weight: 800; color: #111827;">
                Customers
            </h2>
            <p style="color: #6b7280; font-size: 14px; margin-top: 4px;">
                Manage customer profiles, contact details, and order relationships.
            </p>
        </div>
    </x-slot>

    <div style="max-width: 1180px; margin: 0 auto; padding: 32px 24px;">

        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px;">
            <div>
                <h3 style="font-size: 20px; font-weight: 800; color: #111827;">
                    Customer Directory
                </h3>
                <p style="color: #6b7280; font-size: 14px; margin-top: 4px;">
                    View, add, update, and manage customer information.
                </p>
            </div>

            <a href="{{ route('customers.create') }}"
               style="background: #7c3aed; color: white; padding: 11px 18px; border-radius: 8px; font-weight: 800; text-decoration: none; box-shadow: 0 4px 12px rgba(124, 58, 237, 0.25);">
                + Add Customer
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
                    All Customers
                </h4>
            </div>

            <div style="overflow-x: auto;">
                <table style="width: 100%; border-collapse: collapse;">
                    <thead>
                        <tr>
                            <th style="padding: 15px 18px; text-align: left; font-size: 13px; font-weight: 900; color: #374151; border-bottom: 1px solid #e5e7eb;">
                                Customer
                            </th>
                            <th style="padding: 15px 18px; text-align: left; font-size: 13px; font-weight: 900; color: #374151; border-bottom: 1px solid #e5e7eb;">
                                Email
                            </th>
                            <th style="padding: 15px 18px; text-align: left; font-size: 13px; font-weight: 900; color: #374151; border-bottom: 1px solid #e5e7eb;">
                                Phone
                            </th>
                            <th style="padding: 15px 18px; text-align: left; font-size: 13px; font-weight: 900; color: #374151; border-bottom: 1px solid #e5e7eb;">
                                Actions
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($customers as $customer)
                            <tr>
                                <td style="padding: 16px 18px; border-bottom: 1px solid #e5e7eb;">
                                    <div style="font-weight: 900; color: #111827;">
                                        {{ $customer->name }}
                                    </div>
                                    <div style="font-size: 13px; color: #6b7280; margin-top: 3px;">
                                        {{ $customer->address ?? 'No address added' }}
                                    </div>
                                </td>

                                <td style="padding: 16px 18px; border-bottom: 1px solid #e5e7eb; color: #374151; font-weight: 700;">
                                    {{ $customer->email }}
                                </td>

                                <td style="padding: 16px 18px; border-bottom: 1px solid #e5e7eb; color: #374151;">
                                    {{ $customer->phone ?? '-' }}
                                </td>

                                <td style="padding: 16px 18px; border-bottom: 1px solid #e5e7eb;">
                                    <a href="{{ route('customers.show', $customer) }}"
                                       style="color: #2563eb; font-weight: 800; text-decoration: none;">
                                        View
                                    </a>

                                    <a href="{{ route('customers.edit', $customer) }}"
                                       style="color: #ca8a04; font-weight: 800; text-decoration: none; margin-left: 14px;">
                                        Edit
                                    </a>

                                    <form action="{{ route('customers.destroy', $customer) }}"
                                          method="POST"
                                          style="display: inline-block; margin-left: 14px;"
                                          onsubmit="return confirm('Are you sure you want to delete this customer?')">
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
                                <td colspan="4" style="padding: 28px; text-align: center; color: #6b7280;">
                                    No customers found. Add your first customer to start creating orders.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div style="padding: 18px 24px;">
                {{ $customers->links() }}
            </div>
        </div>

    </div>
</x-app-layout>