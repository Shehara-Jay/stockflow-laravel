<x-app-layout>
    <x-slot name="header">
        <div>
            <h2 style="font-size: 24px; font-weight: 800; color: #111827;">
                Customer Details
            </h2>
            <p style="color: #6b7280; font-size: 14px; margin-top: 4px;">
                View customer profile and contact information.
            </p>
        </div>
    </x-slot>

    <div style="max-width: 760px; margin: 0 auto; padding: 32px 24px;">

        <div style="background: white; border-radius: 16px; box-shadow: 0 8px 24px rgba(15, 23, 42, 0.07); border: 1px solid #e5e7eb; overflow: hidden;">

            <div style="padding: 28px 24px; background: linear-gradient(135deg, #111827, #7c3aed); color: white;">
                <h3 style="font-size: 26px; font-weight: 900;">
                    {{ $customer->name }}
                </h3>
                <p style="color: #ede9fe; margin-top: 6px;">
                    Customer ID: #{{ $customer->id }}
                </p>
            </div>

            <div style="padding: 24px;">

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px; margin-bottom: 24px;">
                    <div style="background: #f9fafb; border: 1px solid #e5e7eb; padding: 16px; border-radius: 12px;">
                        <p style="color: #6b7280; font-weight: 700; font-size: 13px;">Email</p>
                        <p style="color: #111827; font-weight: 900; margin-top: 6px;">
                            {{ $customer->email }}
                        </p>
                    </div>

                    <div style="background: #f9fafb; border: 1px solid #e5e7eb; padding: 16px; border-radius: 12px;">
                        <p style="color: #6b7280; font-weight: 700; font-size: 13px;">Phone</p>
                        <p style="color: #111827; font-weight: 900; margin-top: 6px;">
                            {{ $customer->phone ?? '-' }}
                        </p>
                    </div>
                </div>

                <div style="margin-bottom: 22px;">
                    <p style="font-size: 13px; font-weight: 900; color: #6b7280; text-transform: uppercase; margin-bottom: 6px;">
                        Address
                    </p>
                    <p style="color: #111827; line-height: 1.6;">
                        {{ $customer->address ?? 'No address added.' }}
                    </p>
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px; margin-bottom: 24px;">
                    <div style="background: #f9fafb; border: 1px solid #e5e7eb; padding: 16px; border-radius: 12px;">
                        <p style="color: #6b7280; font-weight: 700; font-size: 13px;">Created At</p>
                        <p style="color: #111827; font-weight: 800; margin-top: 4px;">
                            {{ $customer->created_at->format('Y-m-d H:i') }}
                        </p>
                    </div>

                    <div style="background: #f9fafb; border: 1px solid #e5e7eb; padding: 16px; border-radius: 12px;">
                        <p style="color: #6b7280; font-weight: 700; font-size: 13px;">Last Updated</p>
                        <p style="color: #111827; font-weight: 800; margin-top: 4px;">
                            {{ $customer->updated_at->format('Y-m-d H:i') }}
                        </p>
                    </div>
                </div>

                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <a href="{{ route('customers.index') }}"
                       style="background: #6b7280; color: white; padding: 11px 18px; border-radius: 8px; font-weight: 800; text-decoration: none;">
                        Back
                    </a>

                    <a href="{{ route('customers.edit', $customer) }}"
                       style="background: #7c3aed; color: white; padding: 11px 18px; border-radius: 8px; font-weight: 800; text-decoration: none; box-shadow: 0 4px 12px rgba(124, 58, 237, 0.25);">
                        Edit Customer
                    </a>
                </div>

            </div>
        </div>

    </div>
</x-app-layout>