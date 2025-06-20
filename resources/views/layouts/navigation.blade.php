<nav x-data="{ open: false }" 
     class="sticky top-0 z-50 shadow-sm"
     style="background: linear-gradient(to bottom, #d2b48c, #f5deb3);">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <!-- Logo dan Judul -->
            <div class="flex items-center space-x-3">
                <span class="text-[#6a1b9a] font-bold text-xl sm:text-2xl tracking-wide">
                    Sistem Manajemen Buku Perpustakaan
                </span>
            </div>

            <!-- Dropdown User -->
            <div class="hidden sm:flex sm:items-center">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm font-medium rounded-md text-[#6a1b9a] bg-transparent hover:bg-[#d1c4e9] focus:outline-none transition duration-150">
                            <div>{{ Auth::user()->name }}</div>
                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4 text-[#6a1b9a]" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')" class="text-[#6a1b9a]">
                            {{ __('Profile') }}
                        </x-dropdown-link>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')" 
                                onclick="event.preventDefault(); this.closest('form').submit();" class="text-[#6a1b9a]">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger Mobile -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-[#6a1b9a] hover:bg-[#d1c4e9] focus:outline-none transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke="#6a1b9a" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Dropdown Mobile -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden" style="background: linear-gradient(to bottom, #e1bee7, #ffffff); color: #6a1b9a;">
        <div class="pt-4 pb-1 border-t border-purple-300">
            <div class="px-4">
                <div class="font-medium text-base">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')" class="text-[#6a1b9a]">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')" 
                        onclick="event.preventDefault(); this.closest('form').submit();" class="text-[#6a1b9a]">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>

                {{-- Optional: Link navigasi tambahan (Buku, Anggota, dst.) --}}
                <x-responsive-nav-link :href="route('buku.index')" class="text-[#6a1b9a]">
                    Buku
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('kategori.index')" class="text-[#6a1b9a]">
                    Kategori
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('rak.index')" class="text-[#6a1b9a]">
                    Rak
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('anggota.index')" class="text-[#6a1b9a]">
                    Anggota
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('peminjaman.index')" class="text-[#6a1b9a]">
                    Peminjaman
                </x-responsive-nav-link>
            </div>
        </div>
    </div>
</nav>
