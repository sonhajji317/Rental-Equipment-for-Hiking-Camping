<div class="bg-[#CBDCEB] shadow-md rounded-lg p-6 min-h-screen">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">🛒 Cart List</h2>

    <div class="overflow-x-auto rounded-lg border border-gray-200">
        <table class="min-w-full text-sm text-center text-gray-700">
            <thead class="bg-gray-100 text-gray-700 uppercase text-xs">
                <tr>
                    <th class="py-3 px-4 border-b">Product Name</th>
                    <th class="py-3 px-4 border-b">Start Date</th>
                    <th class="py-3 px-4 border-b">End Date</th>
                    <th class="py-3 px-4 border-b">Duration (Days)</th>
                    <th class="py-3 px-4 border-b">Price / Day</th>
                    <th class="py-3 px-4 border-b">Total</th>
                    <th class="py-3 px-4 border-b text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="text-sm">
                @forelse ($cartItems as $index => $item)
                    <tr class="{{ $loop->odd ? 'bg-white' : 'bg-gray-50' }} hover:bg-blue-50 transition">
                        <td class="py-3 px-4 font-medium text-gray-900">{{ $item['name'] }}</td>
                        <td class="py-3 px-4">
                            <input type="date"
                                wire:change="updateStartDate({{ $index }}, $event.target.value)"
                                value="{{ $item['start_date'] }}" min="{{ now()->toDateString() }}"
                                class="w-full border-gray-300 rounded px-2 py-1 text-sm focus:ring-blue-500 focus:border-blue-500">
                        </td>
                        <td class="py-3 px-4">
                            <input type="date" wire:change="updateEndDate({{ $index }}, $event.target.value)"
                                value="{{ $item['end_date'] }}"
                                min="{{ \Carbon\Carbon::parse($item['start_date'])->addDay()->toDateString() }}"
                                class="w-full border-gray-300 rounded px-2 py-1 text-sm focus:ring-blue-500 focus:border-blue-500">
                        </td>
                        <td class="py-3 px-4 text-center">{{ $item['duration'] }}</td>
                        <td class="py-3 px-4">Rp {{ number_format($item['price'], 0, ',', '.') }}</td>
                        <td class="py-3 px-4 font-semibold text-gray-900">
                            Rp {{ number_format($item['total_price'], 0, ',', '.') }}
                        </td>
                        <td class="py-3 px-4 text-center">
                            <button wire:click="removeItem({{ $index }})"
                                class="bg-red-500 text-white px-3 py-1 rounded text-xs font-medium hover:bg-red-600 transition">
                                Remove
                            </button>
                            <a href="{{ route('rentNow', $item['product_id']) }}"
                                class="bg-blue-500 text-white px-3 py-1 rounded text-xs font-medium hover:bg-blue-600 transition ml-2">
                                Pay Now
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="py-6 px-4 text-center text-gray-500 bg-white">
                            Your cart is empty.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6 text-right">
        <span class="text-lg font-bold text-gray-800">
            Total Cart Value:
            <span class="text-blue-600">
                Rp {{ number_format(collect($cartItems)->sum('total_price'), 0, ',', '.') }}
            </span>
        </span>
    </div>
</div>
