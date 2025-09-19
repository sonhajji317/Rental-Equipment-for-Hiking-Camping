<button
    {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-[#133E87] border border-transparent rounded-md font-semibold text-xs text-[#F3F3E0] uppercase tracking-widest hover:bg-[#CBDCEB] hover:text-[#133E87] focus:outline-none focus:ring-2 focus:ring-offset-2 disabled:opacity-50 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
