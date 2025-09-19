<div
    class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 bg-cover bg-[position:50%_30%] bg-no-repeat bg-[url('https://images.pexels.com/photos/1731427/pexels-photo-1731427.jpeg')]">
    <div>
        {{ $logo }}
    </div>

    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-[#F3F3E0] shadow-md overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>
</div>
