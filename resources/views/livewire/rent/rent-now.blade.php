<div
    class="min-h-screen bg-cover bg-no-repeat bg-[url('https://images.pexels.com/photos/1731427/pexels-photo-1731427.jpeg')] px-4 py-6">
    <h1 class="text-2xl text-center py-3 font-semibold text-gray-900">Details Item</h1>

    <div class="w-full max-w-5xl mx-auto bg-[#133E87] p-6 rounded-lg shadow-md">
        <div class="flex flex-col md:flex-row gap-6">
            <!-- Bagian Gambar -->
            <div class="w-full md:w-1/2">
                <img src="{{ $products->image ? asset('storage/' . $products->image) : asset('storage/placeholder-image.png') }}"
                    alt="{{ $products->name }}" class="w-full h-auto object-cover rounded-lg shadow-sm">
            </div>

            <!-- Bagian Detail -->
            <div class="w-full md:w-1/2 flex flex-col">
                <h2 class="text-2xl font-bold mb-2 text-[#F3F3E0]">{{ $products->name }}</h2>
                <h2 class="text-lg font-semibold mb-4 text-[#F3F3E0]">Stock : {{ $products->stock }} Unit</h2>

                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-4">
                    <p class="text-lg font-semibold text-[#F3F3E0]">
                        Price per day: IDR {{ number_format($products->price, 0, ',', '.') }}
                    </p>

                    @if ($products->stock > 0)
                        <span
                            class="inline-block bg-green-500 text-white text-xs sm:text-sm px-2 py-1 rounded mt-2 sm:mt-0">
                            In Stock
                        </span>
                    @else
                        <span
                            class="inline-block bg-red-200 text-red-800 text-xs sm:text-sm px-2 py-1 rounded mt-2 sm:mt-0">
                            Out of Stock
                        </span>
                    @endif
                </div>

                <!-- Form -->
                <form wire:submit.prevent="addRent" class="flex-1 flex flex-col">
                    <div class="mb-4">
                        <label for="start_date" class="block text-[#F3F3E0] font-semibold mb-2">Start rent:</label>
                        <input type="date" wire:model="start_date" wire:change="calculateTotalPrice"
                            min="{{ now()->toDateString() }}" id="start_date"
                            class="w-full px-3 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300">
                        @error('start_date')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="end_date" class="block text-[#F3F3E0] font-semibold mb-2">End rent:</label>
                        <input type="date" wire:model="end_date" wire:change="calculateTotalPrice"
                            min="{{ now()->addDay()->toDateString() }}" id="end_date"
                            class="w-full px-3 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300">
                        @error('end_date')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="rental_duration_days" class="block text-[#F3F3E0] font-semibold mb-2">
                            Total rental duration:
                        </label>
                        <input type="number" value="{{ $rental_duration_days }}" id="rental_duration_days"
                            class="w-full px-3 py-2 border rounded text-gray-800 font-semibold" readonly>
                        <p class="text-[#F3F3E0] mt-2 text-end">
                            Total Price: IDR {{ number_format($total_price, 0, ',', '.') }}
                        </p>
                    </div>

                    <!-- Tombol -->
                    <div class="mt-auto flex justify-end">
                        @if (!auth()->check())
                            <a href="{{ route('login') }}"
                                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                                Login To Rent Now
                            </a>
                        @else
                            @if ($products->stock > 0)
                                <button type="submit" id="pay-button"
                                    onclick="return confirm('Are you sure you want to proceed to payment?')"
                                    class="bg-[#F3F3E0] text-[#133E87] font-semibold px-4 py-2 rounded hover:text-[#F3F3E0] hover:bg-[#608BC1] transition">
                                    Pay Now - IDR {{ number_format($total_price, 0, ',', '.') }}
                                </button>
                            @else
                                <button type="button" disabled
                                    class="bg-gray-400 text-white px-4 py-2 rounded cursor-not-allowed opacity-70">
                                    Out of Stock
                                </button>
                            @endif
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
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


{{-- <div>
    <form wire:submit.prevent="addRent">
        <div class="mb-4">
            <label>Start rent:</label>
            <input type="date" wire:model="start_date" class="w-full border rounded px-2 py-1">
            @error('start_date')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label>End rent:</label>
            <input type="date" wire:model="end_date" class="w-full border rounded px-2 py-1">
            @error('end_date')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <p class="font-bold">Total: IDR {{ number_format($total_price, 0, ',', '.') }}</p>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Proceed to Payment
        </button>
    </form>
</div> --}}
