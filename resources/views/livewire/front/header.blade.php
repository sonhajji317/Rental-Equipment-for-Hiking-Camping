@if (auth()->check() && auth()->user()->role === 'admin')
    @livewire('admin.admin-header')
@else
    <header class="bg-[#133E87]">
        <div class="mx-auto max-w-screen-xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 items-center justify-between">
                <div class="flex-1 md:flex md:items-center md:gap-12">
                    <a wire:navigate class="block text-teal-600" href="/">
                        <img src="{{ asset('storage/logo-rent.png') }}" alt="logo-app" class="w-20 h-20">
                    </a>
                </div>

                <div class="md:flex md:items-center md:gap-12">
                    <nav aria-label="Global" class="hidden md:block">
                        <ul class="flex items-center gap-6 text-sm">
                            <li>
                                <a wire:navigate class="text-[#F3F3E0] transition font-semibold hover:text-[#CBDCEB]"
                                    href="/">
                                    Home </a>
                            </li>
                            <li>
                                <a class="text-[#F3F3E0] transition font-semibold hover:text-[#CBDCEB]" href="#faq">
                                    FAQ </a>
                            </li>
                            <li>
                                @guest
                                    {{-- Kalau belum login --}}
                                    <a class="text-[#F3F3E0] transition font-semibold hover:text-[#CBDCEB]"
                                        href="{{ route('login') }}">
                                        Rent
                                    </a>
                                @else
                                    {{-- Kalau sudah login --}}
                                    @if (auth()->user()->role === 'admin')
                                        <a class="text-[#F3F3E0] transition font-semibold hover:text-[#CBDCEB]"
                                            href="/rentList">
                                            Rent
                                        </a>
                                    @else
                                        <a class="text-[#F3F3E0] transition font-semibold hover:text-[#CBDCEB]"
                                            href="/rentList">
                                            Rent
                                        </a>
                                    @endif
                                @endguest
                            </li>
                            <li>
                                @if (auth()->check())
                                    @livewire('cart.cart-icon')
                                @else
                                    <a class="text-[#F3F3E0] transition hover:text-[#CBDCEB]"
                                        href="{{ route('login') }}">
                                        <svg class="w-6 h-6 text-[#F3F3E0]" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.25L19 7H7.312" />
                                        </svg>
                                    </a>
                                @endif
                            </li>
                        </ul>
                    </nav>

                    <div class="flex items-center gap-4">
                        <div class="sm:flex sm:gap-4">
                            @if (auth()->check())
                                <div class="hidden sm:flex">
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit"
                                            class="rounded bg-[#F3F3E0] hover:bg-[#CBDCEB] px-3 py-1.5 text-sm font-medium text-[#133E87] shadow-sm">Logout</button>
                                    </form>
                                </div>
                            @else
                                <a class="rounded bg-[#F3F3E0] hover:bg-[#CBDCEB] px-3 py-1.5 text-sm font-medium text-[#133E87] shadow-sm"
                                    href="{{ route('login') }}">
                                    Login/Register
                                </a>
                            @endif
                            @if (auth()->check())
                                <h1 class="py-1 text-[#F3F3E0] capitalize font-semibold">Hi, {{ $users->name }}.</h1>
                            @endif
                        </div>

                        <div class="block md:hidden">
                            <button class="rounded-sm bg-gray-100 p-2 text-gray-600 transition hover:text-gray-600/75">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

@endif
