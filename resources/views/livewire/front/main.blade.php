<div class="bg-[#133E87]">
    @livewire('front.hero')
    <div class="px-6 py-5 flex justify-end">
        <a wire:navigate.hover href="/productAll"
            class="px-2 py-1 font-bold text-sm rounded bg-[#F3F3E0] text-[#133E87] ">See
            all
            product</a>
    </div>
    <div id="main" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-4 gap-4 mx-auto px-6 pb-4">
        @forelse ($product1 as $product)
            <div class="block rounded-lg p-4 shadow-sm hover:shadow-lg shadow-indigo-100 bg-[#F3F3E0]">
                <img alt=""
                    src="{{ $product->image ? asset('storage/' . $product->image) : asset('storage/placeholder-image.png') }}"
                    class="h-56 w-full rounded-md object-cover" data-aos-duration="1500" data-aos="fade-right" />

                <div class="mt-2 px-4">
                    <dl>
                        <div>
                            <dt class="sr-only">Name</dt>

                            <dd class="font-medium capitalize text-center">{{ $product->name }}</dd>
                        </div>

                        <div>
                            <dt class="sr-only">Category</dt>

                            <dd class="text-sm text-gray-800 font-semibold capitalize">{{ $product->category->name }}
                            </dd>
                        </div>

                        <div>
                            <dt class="sr-only">Price</dt>

                            <dd class="text-sm text-[#133E87] font-bold">IDR
                                {{ number_format($product->price, 0, ',', '.') }} /
                                Day</dd>
                        </div>
                    </dl>
                </div>
                <div class="flex justify-between px-3">
                    <a wire:navigate href="/product/{{ $product->id }}/details"
                        class="mt-4 inline-block rounded bg-[#CBDCEB] px-5 py-2 text-sm font-medium text-[#133E87] hover:bg-[#133E87] hover:text-[#CBDCEB]">
                        Details
                    </a>
                    <a href="/rent/{{ $product->id }}/now"
                        class="mt-4 inline-block rounded bg-[#133E87] px-5 py-2 text-sm font-medium text-[#F3F3E0] hover:text-[#133E87] hover:bg-[#CBDCEB]">
                        Rent
                    </a>
                </div>
            </div>
        @empty
            <p>No products found.</p>
        @endforelse
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-4 gap-4 mx-auto px-6 pb-4">
        @forelse ($product2 as $product)
            <div class="block rounded-lg p-4 shadow-sm hover:shadow-lg shadow-indigo-100 bg-[#F3F3E0]">
                <img alt=""
                    src="{{ $product->image ? asset('storage/' . $product->image) : asset('storage/placeholder-image.png') }}"
                    class="h-56 w-full rounded-md object-cover" data-aos-duration="1500" data-aos="fade-left" />

                <div class="mt-2 px-4">
                    <dl>
                        <div>
                            <dt class="sr-only">Name</dt>

                            <dd class="font-medium capitalize text-center">{{ $product->name }}</dd>
                        </div>

                        <div>
                            <dt class="sr-only">Category</dt>

                            <dd class="text-sm text-gray-800 font-semibold capitalize">{{ $product->category->name }}
                            </dd>
                        </div>

                        <div>
                            <dt class="sr-only">Price</dt>

                            <dd class="text-sm text-[#133E87] font-bold">IDR
                                {{ number_format($product->price, 0, ',', '.') }} /
                                Day</dd>
                        </div>
                    </dl>
                </div>
                <div class="flex justify-between px-3">
                    <a wire:navigate href="/product/{{ $product->id }}/details"
                        class="mt-4 inline-block rounded bg-[#CBDCEB] px-5 py-2 text-sm font-medium text-[#133E87] hover:bg-[#133E87] hover:text-[#CBDCEB]">
                        Details
                    </a>
                    <a href="/rent/{{ $product->id }}/now"
                        class="mt-4 inline-block rounded bg-[#133E87] px-5 py-2 text-sm font-medium text-[#F3F3E0] hover:text-[#133E87] hover:bg-[#CBDCEB]">
                        Rent
                    </a>
                </div>
            </div>
        @empty
            <p>No products found.</p>
        @endforelse
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-4 gap-4 mx-auto px-6 pb-4">
        @forelse ($product3 as $product)
            <div class="block rounded-lg p-4 shadow-sm hover:shadow-lg shadow-indigo-100 bg-[#F3F3E0]">
                <img alt=""
                    src="{{ $product->image ? asset('storage/' . $product->image) : asset('storage/placeholder-image.png') }}"
                    class="h-56 w-full rounded-md object-cover" data-aos-duration="1500" data-aos="fade-right" />

                <div class="mt-2 px-4">
                    <dl>
                        <div>
                            <dt class="sr-only">Name</dt>

                            <dd class="font-medium capitalize text-center">{{ $product->name }}</dd>
                        </div>

                        <div>
                            <dt class="sr-only">Category</dt>

                            <dd class="text-sm text-gray-800 font-semibold capitalize">{{ $product->category->name }}
                            </dd>
                        </div>

                        <div>
                            <dt class="sr-only">Price</dt>

                            <dd class="text-sm text-[#133E87] font-bold">IDR
                                {{ number_format($product->price, 0, ',', '.') }} /
                                Day</dd>
                        </div>
                    </dl>
                </div>
                <div class="flex justify-between px-3">
                    <a wire:navigate href="/product/{{ $product->id }}/details"
                        class="mt-4 inline-block rounded bg-[#CBDCEB] px-5 py-2 text-sm font-medium text-[#133E87] hover:bg-[#133E87] hover:text-[#CBDCEB]">
                        Details
                    </a>
                    <a href="/rent/{{ $product->id }}/now"
                        class="mt-4 inline-block rounded bg-[#133E87] px-5 py-2 text-sm font-medium text-[#F3F3E0] hover:text-[#133E87] hover:bg-[#CBDCEB]">
                        Rent
                    </a>
                </div>
            </div>
        @empty
            <p>No products found.</p>
        @endforelse
    </div>
    @livewire('front.faq')
</div>
