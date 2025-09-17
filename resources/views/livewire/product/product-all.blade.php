<div>
    {{-- <form class="max-w-lg mx-auto py-5">
        <div class="flex w-full">
            <!-- Dropdown Categories -->
            <div class="relative">
                <button id="dropdown-button" type="button" wire:click='setCategory(null)'
                    class="inline-flex items-center justify-between px-4 py-2.5 text-sm font-medium text-gray-700 bg-gray-100 border border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white dark:border-gray-600 dark:hover:bg-gray-600">
                    {{ $selectedCategory ? $categories->firstWhere('id', $selectedCategory)->name : 'All Categories' }}
                    <svg class="w-3 h-3 ms-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 10 6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M1 1l4 4 4-4" />
                    </svg>
                </button>

                <!-- Dropdown Menu -->
                <div id="dropdown"
                    class="absolute left-0 mt-2 hidden w-44 bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 z-20">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200">
                        @foreach ($categories as $category)
                            <li>
                                <button type="button" wire:click='setCategory({{ $category->id }})'
                                    class="w-full px-4 py-2 text-left 
                                        {{ $selectedCategory === $category->id
                                            ? 'bg-blue-600 text-white'
                                            : 'hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white' }}">
                                    {{ $category->name }}
                                </button>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <!-- Search Input -->
            <div class="relative flex-1">
                <input type="search" id="search-dropdown" wire:model.live='search'
                    class="block w-full px-4 py-2.5 text-sm text-gray-900 bg-gray-50 border border-gray-300 rounded-e-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-400"
                    placeholder="Search products..." />
                <button type="submit"
                    class="absolute top-0 right-0 h-full px-4 text-sm font-medium text-white bg-blue-600 border border-blue-600 rounded-e-lg hover:bg-blue-700 focus:ring-2 focus:ring-blue-300 dark:bg-blue-500 dark:hover:bg-blue-600">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 20 20">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19 19l-4-4m0-7a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    <span class="sr-only">Search</span>
                </button>
            </div>
        </div>
    </form> --}}

    <div class="flex justify-center pt-5">
        <div class="relative w-full max-w-md">
            <input type="text" wire:model.live="search" placeholder="Search here..."
                class="w-full rounded border-gray-300 shadow-sm sm:text-sm capitalize pl-10" />
            <svg class="w-5 h-5 text-gray-500 absolute left-3 top-1/2 -translate-y-1/2" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M21 21l-3.5-3.5M17 10a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
        </div>
    </div>


    <div class="flex justify-center mx-auto py-5 gap-3">
        <!-- Tombol "All categories" -->
        <button type="button" wire:click='setCategory(null)'
            class="{{ is_null($selectedCategory) ? 'bg-[#133E87] text-[#F3F3E0]' : 'bg-[#F3F3E0] text-[#133E87] border border-[#133E87]' }} px-3 py-1 rounded">
            All Categories
        </button>

        <!-- Tombol kategori -->
        @foreach ($categories as $category)
            <button type="button" wire:click='setCategory({{ $category->id }})'
                class="{{ $selectedCategory === $category->id ? 'bg-[#133E87] text-[#F3F3E0]' : 'bg-[#F3F3E0] text-[#133E87] border border-[#133E87]' }} px-3 py-1 rounded">
                {{ $category->name }}
            </button>
        @endforeach
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-6 px-6 pb-5">
        @forelse ($products as $product)
            <a wire:navigate href="/product/{{ $product->id }}/details"
                class="block rounded-lg p-4 shadow-sm hover:shadow-lg shadow-indigo-100 bg-[#F3F3E0]">
                <img alt=""
                    src="{{ $product->image ? asset('storage/' . $product->image) : asset('storage/placeholder-image.png') }}"
                    class="h-56 w-full rounded-md object-cover" data-aos-duration="1500" data-aos="zoom-out-up" />

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
            <div class="col-span-full flex flex-col items-center text-gray-500">
                <img class="h-40 w-48 object-cover rounded-lg mb-3" src="{{ asset('storage/placeholder-image.png') }}"
                    alt="Product not found">
                <p>Oopss!!! No products available.</p>
            </div>
        @endforelse
    </div>
    <div class="px-6 pb-5">
        {{ $products->links() }}
    </div>
</div>
