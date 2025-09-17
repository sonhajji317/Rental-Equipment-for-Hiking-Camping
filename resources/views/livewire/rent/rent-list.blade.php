<div class="min-h-screen py-8 px-4">
    <div class="flex justify-center mx-auto max-w-5xl">
        @session('message')
            <div class="mb-4 p-4 text-sm text-green-700 bg-green-100 rounded-lg" role="alert">
                {{ session('message') }}
            </div>
        @endsession
    </div>
    <div class="flex justify-center mx-auto max-w-5xl">
        <div class="overflow-x-auto rounded-lg shadow bg-white">
            <table class="min-w-full text-sm text-center text-gray-700 border-collapse">
                <thead class="bg-gray-100 text-gray-900 font-semibold">
                    <tr>
                        <th class="px-6 py-3 border-b">No</th>
                        <th class="px-6 py-3 border-b">Name</th>
                        <th class="px-6 py-3 border-b">Product</th>
                        <th class="px-6 py-3 border-b">Duration</th>
                        <th class="px-6 py-3 border-b">Total Price</th>
                        <th class="px-6 py-3 border-b">Status</th>
                        <th class="px-6 py-3 border-b">Created At</th>
                        <th class="px-6 py-3 border-b">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse ($rents as $rent)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-3">{{ $loop->iteration + $rents->firstItem() - 1 }}</td>
                            <td class="px-6 py-3">{{ $rent->user->name }}</td>
                            <td class="px-6 py-3">{{ $rent->product->name }}</td>
                            <td class="px-6 py-3">{{ $rent->rental_duration_days }} days</td>
                            <td class="px-6 py-3">
                                IDR {{ number_format($rent->total_price, 0, ',', '.') }}
                            </td>
                            <td class="px-6 py-3">
                                <span
                                    class="px-3 py-1 rounded text-xs font-medium text-gray-100
                                    {{ $rent->status_rent === 'unpaid' ? 'bg-red-500 ' : 'bg-green-500' }}">
                                    {{ ucfirst($rent->status_rent) }}
                                </span>
                            </td>
                            <td class="px-6 py-3">
                                {{ $rent->created_at->format('d M Y') }}
                            </td>
                            <td class="px-6 py-3">
                                @if ($rent->status_rent === 'unpaid')
                                    <button wire:confirm='Are you sure you want to proceed to payment?'
                                        class="pay-button bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition"
                                        wire:click="payRent({{ $rent->id }})">
                                        Pay Now
                                    </button>

                                    <button type="button" wire:click='delete({{ $rent->id }})'
                                        wire:confirm='Are you sure want to delete this data?'
                                        class="pay-button bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 transition">
                                        Delete
                                    </button>
                                @elseif ($rent->status_rent === 'paid')
                                    <span class="bg-green-500 text-white px-3 py-1 rounded text-xs font-medium">
                                        Success
                                    </span>
                                @else
                                    <span class="text-gray-500">No Action</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="10" class="px-6 py-4 text-center text-gray-500">
                                No rent records found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{ $rents->links() }}
        </div>
    </div>
</div>
<script type="text/javascript">
    document.addEventListener('startPayment', function(event) {
        let snapToken = event.detail.token;
        window.snap.pay(snapToken, {
            onSuccess: function(result) {
                alert("Payment success!");
                console.log(result);
            },
            onPending: function(result) {
                alert("Waiting for payment!");
                console.log(result);
            },
            onError: function(result) {
                alert("Payment failed!");
                console.log(result);
            },
            onClose: function() {
                alert("You closed the popup");
            }
        });
    });
</script>
