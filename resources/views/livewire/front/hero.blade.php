<div class="bg-[#133E87]">
    <section
        class="bg-cover bg-[position:50%_30%] bg-no-repeat bg-[url('https://images.pexels.com/photos/2517748/pexels-photo-2517748.jpeg')] bg-gray-700 bg-blend-multiply">
        <div class="px-4 mx-auto max-w-screen-xl text-center py-24 lg:py-56">
            <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-[#F3F3E0] md:text-5xl lg:text-6xl">
                Walk without limits until you reach the summit of your goals</h1>
            <p class="mb-8 text-lg font-normal text-[#F3F3E0] lg:text-xl sm:px-16 lg:px-48">Bekasi’s best and most
                complete camping equipment rental.
            </p>
            <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0">
                <a href="#main"
                    class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-[#F3F3E0] rounded bg-[#133E87] hover:bg-[#F3F3E0] hover:text-[#133E87] focus:ring-4 focus:ring-blue-300">
                    See equipment
                    <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                </a>

            </div>
        </div>
    </section>
    <div>
        {{-- popular product --}}
        <h1 class="text-2xl font-bold px-6 pt-3 text-center text-[#F3F3E0]">Popular Products</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-4 gap-6 px-6 mt-4">
            @forelse ($products as $product)
                <div class="group relative overflow-hidden rounded shadow-md">
                    <a wire:navigate.hover href="/product/{{ $product->id }}/details">
                        <img class="object-cover w-full h-48 transition-transform duration-300 group-hover:scale-105"
                            src="{{ $product->image ? asset('storage/' . $product->image) : asset('storage/placeholder-image.png') }}"
                            alt="{{ $product->name }}">

                        <!-- Overlay text muncul saat hover -->
                        <div
                            class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <div class="flex flex-col items-center space-y-1">
                                <span class="text-white text-sm font-semibold">{{ $product->name }}</span>
                                <span class="text-white text-sm font-semibold">IDR
                                    {{ number_format($product->price, 0, ',', '.') }} / Day</span>
                            </div>
                        </div>
                    </a>
                </div>

            @empty
                <div class="col-span-full flex justify-center items-center py-10">
                    <span class="text-gray-500 text-sm italic">No product popular available</span>
                </div>
            @endforelse
        </div>

    </div>
</div>
