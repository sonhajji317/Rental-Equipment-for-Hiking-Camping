@if (auth()->check() && auth()->user()->role === 'admin')
    @livewire('admin.admin-header')
@else
    <header class="bg-[#133E87]" x-data="{ open: false }">
        <div class="mx-auto max-w-screen-xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 items-center justify-between">

                <!-- Logo -->
                <div class="flex-1 md:flex md:items-center md:gap-12">
                    <a wire:navigate href="/" class="flex items-center gap-2">
                        <img src="{{ asset('storage/camp&hike.png') }}"
                            class="w-12 h-12 md:w-14 md:h-14 object-contain rounded" alt="Logo">
                    </a>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden md:flex md:items-center md:gap-12">
                    <nav aria-label="Global">
                        <ul class="flex items-center gap-6 text-sm">
                            <li><a wire:navigate class="text-[#F3F3E0] hover:text-[#CBDCEB]" href="/">Home</a>
                            </li>
                            <li><a wire:navigate class="text-[#F3F3E0] hover:text-[#CBDCEB]"
                                    href="/productAll">Product</a></li>
                            <li><a class="text-[#F3F3E0] hover:text-[#CBDCEB]" href="#faq">FAQ</a></li>

                            <!-- Rent -->
                            <li>
                                @guest
                                    <a class="text-[#F3F3E0] hover:text-[#CBDCEB]" href="{{ route('login') }}">
                                        Rent
                                    </a>
                                @else
                                    <a class="text-[#F3F3E0] hover:text-[#CBDCEB]" href="/rentList">
                                        Rent
                                    </a>
                                @endguest
                            </li>

                            <!-- Right Side (Cart + Login/Logout + Hamburger) -->
                            <div class="flex items-center gap-4">
                                <!-- Cart -->
                                <div>
                                    @auth
                                        @livewire('cart.cart-icon')
                                    @else
                                        <a class="text-[#F3F3E0] hover:text-[#CBDCEB]" href="{{ route('login') }}">
                                            <svg class="w-6 h-6 text-[#F3F3E0]" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.25L19 7H7.312" />
                                            </svg>
                                        </a>
                                    @endauth
                                </div>

                                <!-- Login/Logout -->
                                <div class="sm:flex sm:gap-4">
                                    @auth
                                        <div class="hidden sm:flex">
                                            <form action="{{ route('logout') }}" method="POST">
                                                @csrf
                                                <button type="submit"
                                                    class="rounded bg-[#F3F3E0] hover:bg-[#CBDCEB] px-3 py-1.5 text-sm font-medium text-[#133E87] shadow-sm">
                                                    Logout
                                                </button>
                                            </form>
                                        </div>
                                        <h1 class="py-1 text-[#F3F3E0] capitalize font-semibold">
                                            Hi, {{ auth()->user()->name }}.
                                        </h1>
                                    @else
                                        <a class="rounded bg-[#F3F3E0] hover:bg-[#CBDCEB] px-3 py-1.5 text-sm font-medium text-[#133E87] shadow-sm"
                                            href="{{ route('login') }}">
                                            Login/Register
                                        </a>
                                    @endauth
                                </div>
                            </div>


                            <!-- Hamburger -->
                            <div class="block md:hidden">
                                <button @click="open = !open"
                                    class="rounded-sm bg-gray-100 p-2 text-gray-600 transition hover:text-gray-600/75">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M4 6h16M4 12h16M4 18h16" />
                                    </svg>
                                </button>
                            </div>
                </div>
            </div>

            <!-- Mobile Menu -->
            <nav x-show="open" x-transition class="md:hidden mt-2 bg-[#0d2b5b] p-4 rounded">
                <ul class="flex flex-col gap-4 text-sm">
                    <li><a wire:navigate class="text-[#F3F3E0] hover:text-[#CBDCEB]" href="/">Home</a></li>
                    <li><a wire:navigate class="text-[#F3F3E0] hover:text-[#CBDCEB]" href="/productAll">Product</a></li>
                    <li><a class="text-[#F3F3E0] hover:text-[#CBDCEB]" href="#faq">FAQ</a></li>

                    <!-- Rent -->
                    <li>
                        @guest
                            <a class="text-[#F3F3E0] hover:text-[#CBDCEB]" href="{{ route('login') }}">
                                Rent
                            </a>
                        @else
                            <a class="text-[#F3F3E0] hover:text-[#CBDCEB]" href="/rentList">
                                Rent
                            </a>
                        @endguest
                    </li>

                    <!-- Cart -->
                    <li>
                        @auth
                            @livewire('cart.cart-icon')
                        @else
                            <a class="text-[#F3F3E0] hover:text-[#CBDCEB]" href="{{ route('login') }}">
                                <svg class="w-6 h-6 text-[#F3F3E0]" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.25L19 7H7.312" />
                                </svg>
                            </a>
                        @endauth
                    </li>
                </ul>
            </nav>
        </div>
    </header>
@endif
