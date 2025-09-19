@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-[#133E87]']) }}>
    {{ $value ?? $slot }}
</label>
