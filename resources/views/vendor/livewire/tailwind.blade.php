@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-between mt-6">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span class="px-3 py-1 text-sm font-medium text-gray-400 bg-gray-100 rounded cursor-not-allowed">
                Prev
            </span>
        @else
            <button wire:click="previousPage" wire:loading.attr="disabled"
                class="px-3 py-1 text-sm font-medium text-[#133E87] bg-[#CBDCEB] rounded">
                Prev
            </button>
        @endif

        {{-- Pagination Elements --}}
        <div class="flex items-center gap-2">
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <span class="px-3 py-1 text-sm text-gray-500">{{ $element }}</span>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span class="px-3 py-1 text-sm font-medium text-white bg-[#133E87] rounded shadow">
                                {{ $page }}
                            </span>
                        @else
                            <button wire:click="gotoPage({{ $page }})"
                                class="px-3 py-1 text-sm font-medium text-[#133E87] bg-[#CBDCEB] rounded  ">
                                {{ $page }}
                            </button>
                        @endif
                    @endforeach
                @endif
            @endforeach
        </div>

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <button wire:click="nextPage" wire:loading.attr="disabled"
                class="px-3 py-1 text-sm font-medium text-[#133E87] bg-[#CBDCEB] rounded">
                Next
            </button>
        @else
            <span class="px-3 py-1 text-sm font-medium text-gray-400 bg-gray-100 rounded cursor-not-allowed">
                Next
            </span>
        @endif
    </nav>
@endif
