<x-app-layout>
    <x-slot name="header">
        <div>
            <h2 style="font-size: 24px; font-weight: 800; color: #111827;">
                Edit Customer
            </h2>
            <p style="color: #6b7280; font-size: 14px; margin-top: 4px;">
                Update customer profile, contact details, and address information.
            </p>
        </div>
    </x-slot>

    <div style="max-width: 760px; margin: 0 auto; padding: 32px 24px;">

        <div style="background: white; border-radius: 16px; box-shadow: 0 8px 24px rgba(15, 23, 42, 0.07); border: 1px solid #e5e7eb; overflow: hidden;">

            <div style="padding: 22px 24px; border-bottom: 1px solid #e5e7eb; background: linear-gradient(135deg, #fffbeb, #ffffff);">
                <h3 style="font-size: 20px; font-weight: 900; color: #111827;">
                    Update Customer Information
                </h3>
                <p style="color: #6b7280; font-size: 14px; margin-top: 4px;">
                    Modify the selected customer details below.
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

                <form action="{{ route('customers.update', $customer) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div style="margin-bottom: 18px;">
                        <label style="display: block; font-weight: 800; color: #374151; margin-bottom: 8px;">
                            Customer Name
                        </label>
                        <input type="text"
                               name="name"
                               value="{{ old('name', $customer->name) }}"
                               style="width: 100%; border: 1px solid #d1d5db; border-radius: 10px; padding: 12px 14px;"
                               required>
                    </div>

                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 18px;">
                        <div style="margin-bottom: 18px;">
                            <label style="display: block; font-weight: 800; color: #374151; margin-bottom: 8px;">
                                Email
                            </label>
                            <input type="email"
                                   name="email"
                                   value="{{ old('email', $customer->email) }}"
                                   style="width: 100%; border: 1px solid #d1d5db; border-radius: 10px; padding: 12px 14px;"
                                   required>
                        </div>

                        <div style="margin-bottom: 18px;">
                            <label style="display: block; font-weight: 800; color: #374151; margin-bottom: 8px;">
                                Phone
                            </label>
                            <input type="text"
                                   name="phone"
                                   value="{{ old('phone', $customer->phone) }}"
                                   style="width: 100%; border: 1px solid #d1d5db; border-radius: 10px; padding: 12px 14px;">
                        </div>
                    </div>

                    <div style="margin-bottom: 24px;">
                        <label style="display: block; font-weight: 800; color: #374151; margin-bottom: 8px;">
                            Address
                        </label>
                        <textarea name="address"
                                  rows="4"
                                  style="width: 100%; border: 1px solid #d1d5db; border-radius: 10px; padding: 12px 14px;">{{ old('address', $customer->address) }}</textarea>
                    </div>

                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <a href="{{ route('customers.index') }}"
                           style="background: #6b7280; color: white; padding: 11px 18px; border-radius: 8px; font-weight: 800; text-decoration: none;">
                            Back
                        </a>

                        <button type="submit"
                                style="background: #ca8a04; color: white; padding: 11px 18px; border-radius: 8px; font-weight: 800; border: none; cursor: pointer; box-shadow: 0 4px 12px rgba(202, 138, 4, 0.25);">
                            Update Customer
                        </button>
                    </div>
                </form>

            </div>
        </div>

    </div>
</x-app-layout>