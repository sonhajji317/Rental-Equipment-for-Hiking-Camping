<div class="min-h-screen py-8 px-4 bg-[#CBDCEB]">
    <div class="flex justify-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Product List</h1>
    </div>

    <div class="flex justify-center">
        @if (session('message'))
            <span class="px-3 py-1 text-sm text-green-700 bg-green-100 rounded">{{ session('message') }}</span>
        @endif
    </div>

    <div class="flex justify-end mb-4 max-w-7xl mx-auto">
        <a wire:navigate.hover href="/productCreate"
            class="bg-[#133E87] text-[#F3F3E0] px-3 py-1 rounded shadow hover:bg-[#608BC1] transition">
            + Add Product
        </a>
    </div>

    <div class="max-w-7xl mx-auto overflow-x-auto rounded-lg shadow bg-white">
        <table class="min-w-full text-sm text-center text-gray-700 border-collapse">
            <thead class="bg-gray-100 text-gray-900 font-semibold">
                <tr>
                    <th class="px-6 py-3 border-b">No</th>
                    <th class="px-6 py-3 border-b">Product Name</th>
                    <th class="px-6 py-3 border-b">Category</th>
                    <th class="px-6 py-3 border-b">Price</th>
                    <th class="px-6 py-3 border-b">Stock</th>
                    {{-- <th class="px-6 py-3 border-b">Start Rent</th>
                    <th class="px-6 py-3 border-b">End Rent</th> --}}
                    <th class="px-6 py-3 border-b">Status</th>
                    <th class="px-6 py-3 border-b">Image</th>
                    <th class="px-6 py-3 border-b">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse ($products as $product)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-3">{{ $loop->iteration + $products->firstItem() - 1 }}</td>
                        <td class="px-6 py-3">{{ $product->name }}</td>
                        <td class="px-6 py-3">{{ $product->category->name }}</td>
                        <td class="px-6 py-3">IDR {{ number_format($product->price, 0, ',', '.') }}</td>
                        <td class="px-6 py-3">{{ $product->stock }}</td>
                        {{-- <td class="px-6 py-3">{{ \Carbon\Carbon::parse($product->start_rent)->format('d M Y') }}</td>
                        <td class="px-6 py-3">{{ \Carbon\Carbon::parse($product->end_rent)->format('d M Y') }}</td> --}}
                        <td class="px-6 py-3">
                            <span
                                class="px-3 py-1 rounded text-xs font-medium text-gray-100
                            {{ $product->status === 'available' ? 'bg-green-500' : 'bg-red-500' }}">
                                {{ ucfirst($product->status) }}
                            </span>
                        </td>
                        <td class="px-6 py-3">
                            <img src="{{ $product->image ? asset('storage/' . $product->image) : asset('storage/placeholder-image.png') }}"
                                class="w-16 h-16 object-cover rounded mx-auto" alt="Product Image">
                        </td>
                        <td class="px-6 py-3">
                            <div class="flex flex-nowrap gap-2">
                                <a wire:navigate.hover href="/product/{{ $product->id }}/edit"
                                    class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 transition">
                                    Edit
                                </a>
                                <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded"
                                    wire:click='delete({{ $product->id }})'
                                    wire:confirm='Are you sure want to delete it?'>Delete</button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="13" class="px-6 py-4 text-center text-gray-500">
                            No products available.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="px-6">
        {{ $products->links() }}
    </div>
</div>
