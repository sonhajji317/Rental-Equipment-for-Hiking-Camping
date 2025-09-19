<div class="py-10">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-4 gap-5 mx-auto">
        @forelse ($products as $product)
            <a wire:navigate href="/product/{{ $product->id }}/details"
                class="block rounded-lg p-4 shadow-sm hover:shadow-lg shadow-indigo-100 bg-[#F3F3E0]">
                <img alt=""
                    src="{{ $product->image ? asset('storage/' . $product->image) : asset('storage/placeholder-image.png') }}"
                    class="h-56 w-full rounded-md object-cover" data-aos="fade-up" data-aos-duration="1500" />

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
            </a>
        @empty
            <p class="text-gray-500">No related products found.</p>
        @endforelse
    </div>
</div>
