<!-- Comment Form -->
<div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
    <div class="mx-auto max-w-2xl">
        <div class="text-center">
            <h2 class="text-xl text-gray-800 font-bold sm:text-3xl">
                Edit product
            </h2>
        </div>

        <!-- Card -->
        <div class="mt-5 p-4 relative z-10 bg-white border border-gray-200 rounded-xl sm:mt-10 md:p-10">
            <form wire:submit.prevent='editProduct' enctype="multipart/form-data">
                <div class="mb-4 sm:mb-8">
                    <label class="block mb-2 text-sm font-medium">Name</label>
                    <input type="text" wire:model="name"
                        class="py-2.5 sm:py-3 px-4 block w-full border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
                    @error('name')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4 sm:mb-8">
                    <label class="block mb-2 text-sm font-medium">Category</label>

                    <select wire:model="category_id"
                        class="py-2.5 sm:py-3 px-4 block w-full border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
                        <option value="{{ $category_id }}">Select Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </Select>
                    @error('category_id')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4 sm:mb-8">
                    <label class="block mb-2 text-sm font-medium">Price</label>
                    <input type="number" wire:model="price"
                        class="py-2.5 sm:py-3 px-4 block w-full border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
                    @error('price')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4 sm:mb-8">
                    <label class="block mb-2 text-sm font-medium">Stock</label>
                    <input type="number" wire:model="stock"
                        class="py-2.5 sm:py-3 px-4 block w-full border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
                    @error('stock')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="grid grid-cols-2 gap-6">
                    <div class="mb-4 sm:mb-8 ">
                        <label class="block mb-2 text-sm font-medium">Start rent</label>
                        <input type="date" wire:model="start_rent"
                            class="py-2.5 sm:py-3 px-4 block w-full border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
                        @error('start_rent')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-4 sm:mb-8">
                        <label class="block mb-2 text-sm font-medium">End rent</label>
                        <input type="date" wire:model="end_rent"
                            class="py-2.5 sm:py-3 px-4 block w-full border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
                        @error('end_rent')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="mb-4 sm:mb-8">
                    <label class="block mb-2 text-sm font-medium">Status</label>
                    <select
                        class="py-2.5 sm:py-3 px-4 block w-full border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                        name="status" wire:model='status' id="">
                        <option value="">Select Status</option>
                        <option value="available">Available</option>
                        <option value="rented">Rented</option>
                    </select>
                    @error('status')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label class="block mb-2 text-sm font-medium">Description</label>
                    <div class="mt-1">
                        <textarea wire:model='description' rows="3"
                            class="py-2.5 sm:py-3 px-4 block w-full border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                            placeholder="Description of product"></textarea>
                    </div>
                    @error('description')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                {{-- image preview --}}
                <div class="flex justify-center mt-5">
                    @if ($image)
                        {{-- image lama --}}
                        @if (gettype($image) === 'string')
                            <img class="object-cover w-40 h-40 rounded" src="{{ asset('storage/' . $image) }}"
                                alt="">
                        @else
                            {{-- image baru --}}
                            <img class="object-cover w-40 h-40 rounded" src="{{ $image->temporaryUrl() }}"
                                alt="">
                        @endif
                    @else
                        <img class="object-cover w-40 h-40 rounded" src="{{ asset('storage/placeholder-image.png') }}"
                            alt="">
                    @endif
                </div>

                <div class="mt-6">
                    <label class="block mb-2 text-sm font-medium">Image</label>
                    <div class="mt-1">
                        <input type="file" wire:model="image"
                            class="py-2.5 sm:py-3 block w-full border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>
                    @error('image')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mt-6 grid">
                    <button type="submit"
                        class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-hidden focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">Submit</button>
                </div>
            </form>
        </div>
        <!-- End Card -->
    </div>
</div>
<!-- End Comment Form -->
