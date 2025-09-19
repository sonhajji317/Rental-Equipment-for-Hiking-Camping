@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
    'class' =>
        'border-gray-300 focus:border-[#CBDCEB] focus:ring-[#CBDCEB] rounded-md shadow-sm text-[#133E87] font-bold',
]) !!}>
