<div
    class="px-10 py-6 min-h-screen bg-cover bg-[position:50%_30%] bg-no-repeat bg-[url('https://images.pexels.com/photos/1731427/pexels-photo-1731427.jpeg')]">

    {{-- Alert Message --}}
    @if (session()->has('message'))
        <div class="mb-4 rounded bg-green-100 border border-green-400 text-green-700 px-4 py-3" role="alert">
            <span class="block sm:inline">{{ session('message') }}</span>
        </div>
    @endif

    {{-- Product Card --}}
    <div class="grid grid-cols-1 md:grid-cols-2 bg-white rounded-lg overflow-hidden shadow transition hover:shadow-lg">
        {{-- Image --}}
        <div class="h-72">
            <img src="{{ $products->image ? asset('storage/' . $products->image) : asset('storage/placeholder-image.png') }}"
                alt="{{ $products->name }}" class="h-full w-full object-cover" />
        </div>

        {{-- Content --}}
        <div class="bg-[#F3F3E0] p-6 flex flex-col justify-between">
            <div>
                <h3 class="text-xl font-bold text-gray-900 capitalize">{{ $products->name }}</h3>
                <h5 class="text-sm text-gray-700 capitalize">{{ $products->category->name }}</h5>
                <p class="mt-2 text-gray-800 line-clamp-3">{{ $products->description }}</p>
                <h5 class="mt-2 text-sm">Stock : {{ $products->stock }}</h5>
                <h5 class="mt-1 text-lg font-bold text-[#133E87]">
                    IDR {{ number_format($products->price, 0, ',', '.') }} / Day
                </h5>
            </div>

            {{-- Action Buttons --}}
            <div class="mt-4 flex justify-end gap-3">
                @if (!auth()->check())
                    <a href="{{ route('login') }}"
                        class="px-4 py-2 bg-[#133E87] text-[#F3F3E0] hover:bg-[#CBDCEB] hover:text-[#133E87] rounded font-medium transition">
                        Login To Rent Now
                    </a>
                @else
                    @if ($products->stock > 0)
                        <button wire:click="addToCart" class="p-2 bg-green-500 hover:bg-green-600 rounded transition">
                            <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.25L19 7h-1M8 7h-.688M13 5v4m-2-2h4" />
                            </svg>
                        </button>
                    @else
                        <button type="button" disabled class="p-2 bg-gray-400 rounded cursor-not-allowed">
                            <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.25L19 7h-1M8 7h-.688M13 5v4m-2-2h4" />
                            </svg>
                        </button>
                    @endif

                    <a href="/rent/{{ $products->id }}/now"
                        class="px-4 py-2 bg-[#133E87] text-[#F3F3E0] hover:bg-[#CBDCEB] hover:text-[#133E87] rounded font-medium transition">
                        Rent Now
                    </a>
                @endif
            </div>
        </div>
    </div>

    {{-- Related Products --}}
    <div class="mt-6">
        @livewire('product.related', ['product_id' => $products->id, 'category_id' => $products->category_id])
    </div>
</div>
