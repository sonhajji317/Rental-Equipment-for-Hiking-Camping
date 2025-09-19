<div class="min-h-screen py-8 px-4 bg-[#CBDCEB]">
    <h1 class="text-center text-2xl font-bold mb-4">Category List</h1>
    <div class="flex justify-center">
        @if (session('message'))
            <span class="px-3 py-1 text-sm text-green-700 bg-green-100 rounded">{{ session('message') }}</span>
        @endif
    </div>

    <div class="flex justify-end mt-4 mb-4 max-w-2xl mx-auto">
        <a wire:navigate.hover href="/categoryCreate"
            class="bg-[#133E87] text-[#F3F3E0] px-3 py-1 rounded shadow hover:bg-[#608BC1] transition">
            + Add Category
        </a>
    </div>

    <div class="max-w-2xl mx-auto overflow-x-auto rounded-lg shadow bg-white">
        <table class="min-w-full text-sm text-center text-gray-700 border-collapse">
            <thead class="bg-gray-100 text-gray-900 font-semibold">
                <tr>
                    <th class="px-6 py-3 border-b">No</th>
                    <th class="px-6 py-3 border-b">Category Name</th>
                    <th class="px-6 py-3 border-b">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse ($categories as $category)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-3">{{ $loop->iteration }}</td>
                        <td class="px-6 py-3">{{ $category->name }}</td>
                        <td class="px-6 py-3">
                            <a wire:navigate.hover href="/category/{{ $category->id }}/edit"
                                class="px-3 py-1 bg-yellow-500 hover:bg-yellow-600 text-white rounded">Edit</a>
                            <button wire:click='delete({{ $category->id }})'
                                wire:confirm='Are you sure want to delete this category?'
                                class="px-3 py-1 bg-red-500 hover:bg-red-600 text-white rounded">Delete</button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2" class="px-6 py-4 text-center text-gray-500">
                            No categories available.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
