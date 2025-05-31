<header x-data="{
    isOpen: false,
    isDropMain: false,
    isDropAbout: false,
    init() {
        // Cek ukuran layar saat load pertama
        this.closeDropdownIfSmallScreen();

        // Cek setiap kali ukuran layar berubah
        window.addEventListener('resize', () => {
            this.closeDropdownIfSmallScreen();
        });
    },
    closeDropdownIfSmallScreen() {
        if (window.innerWidth < 1024) { // Tailwind `lg` breakpoint = 1024px
            this.isDropMain = false;
            this.isDropAbout = false;
        }
    }
}" class="lg:sticky inset-x-0 top-0 z-50 relative" id="myNavbar">
    {{-- sebenernya ada add remove bg-white/80 di .js nya --}}
    <div class="bg-white/80 backdrop-blur dark:bg-zinc-900/80 hidden"></div>
    <nav class="flex items-center justify-between p-6 lg:px-8 mx-auto max-w-7xl" aria-label="Global">
        <div class="flex lg:flex-1">
            <a href="#" class="-m-1.5 p-1.5 flex justify-center items-center">
                <span class="sr-only">LangkahHijau</span>
                <img class="h-8 w-auto" src="/img/logoweb.png" alt="">
                <h2 class="text-xl ml-1 font-semibold text-gray-900 dark:text-gray-100">Langkah<span
                        class="text-hijautua dark:text-hijaumuda">Hijau</span></h2>
            </a>
        </div>
        <div class="flex lg:hidden">
            <button type="button" @click="isOpen = !isOpen"
                class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
                <span class="sr-only">Open main menu</span>
                <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                    aria-hidden="true" data-slot="icon">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
            </button>
        </div>
        <div class="hidden lg:flex lg:gap-x-12">
            <a href="{{ route('home.index') }}"
                class="text-sm/6 font-medium {{ $active == 'beranda' ? 'text-hijautua dark:text-hijaumuda' : 'text-gray-700 dark:text-gray-200 hover:text-hijautua' }}">Beranda
                🏠</a>
            {{-- dropdwon main --}}
            <div class="relative" @click="isDropMain = !isDropMain">
                <div>
                    <button type="button"
                        class="relative text-sm/6 font-medium text-gray-700 dark:text-gray-200 cursor-pointer"
                        aria-expanded="false" aria-haspopup="true">
                        <span class="sr-only">Open navbar dropdown menu</span>
                        Fitur Utama 🔻
                    </button>
                </div>
                <div x-show="isDropMain" x-transition:enter="transition ease-out duration-100 transform"
                    x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-75 transform"
                    x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                    class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black/5 focus:outline-none"
                    role="menu" aria-orientation="vertical">
                    <a href="/quizzes" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200">🌏 Eco-Quiz

                    </a>
                    <a href="{{ route('challenges.index') }}"
                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200">🏆 Tantangan Hijau
                    </a>
                    <a href="{{ route('post.index') }}"
                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200">♻️ Edu-Zone </a>
                    <a href="{{ route('event.index') }}"
                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200">📆 Green Events </a>
                </div>
            </div>
            {{-- Hijau AI --}}
            <a href="{{ route('hijau-ai.index') }}"
                class="text-sm/6 font-medium {{ $active == 'hijau-ai' ? 'text-hijautua dark:text-hijaumuda' : 'text-gray-700 dark:text-gray-200 hover:text-hijautua' }}">Hijau
                AI ✨</a>
            {{-- dropdown Tentang --}}
            <div class="relative" @click="isDropAbout = !isDropAbout">
                <div>
                    <button type="button"
                        class="relative text-sm/6 font-medium text-gray-700 dark:text-gray-200 cursor-pointer"
                        aria-expanded="false" aria-haspopup="true">
                        <span class="sr-only">Open navbar dropdown menu</span>
                        Tentang 🔻
                    </button>
                </div>
                <div x-show="isDropAbout" x-transition:enter="transition ease-out duration-100 transform"
                    x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-75 transform"
                    x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                    class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black/5 focus:outline-none"
                    role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                    <!-- Active: "bg-gray-100 outline-none", Not Active: "" -->
                    <a href="{{ route('home.tentang') }}"
                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200" role="menuitem" tabindex="-1"
                        id="user-menu-item-0">Tentang Aplikasi</a>
                    <a href="{{ route('home.kontak') }}"
                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200 hover:outline-none"
                        role="menuitem" tabindex="-1" id="user-menu-item-1">Kontak Kami</a>
                    <a href="{{ route('home.team') }}"
                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200 hover:outline-none"
                        role="menuitem" tabindex="-1" id="user-menu-item-2">Tim Kami</a>
                </div>
            </div>
            {{-- old --}}
            {{-- <a href="{{ route('home.kontak') }}"
                class="text-sm/6 font-medium text-gray-700 dark:text-gray-200">Tentang</a> --}}
        </div>
        <div class="hidden lg:flex lg:flex-1 lg:justify-end lg:items-center">
            @guest
            <a href="/login"
                class="text-sm/6 font-medium mr-3 text-gray-100 bg-hijautua rounded-sm px-3 py-1 hover:bg-hijaumuda hover:text-grey-200">
                <i class="fa-solid fa-sign-in"></i> Login</a>
            @else
            <!-- Profile dropdown -->
            <div class="relative ml-3">
                <div>
                    <button type="button" @click="isOpen = !isOpen"
                        class="relative flex items-center rounded-sm hover:bg-gray-200 dark:hover:bg-gray-700 text-sm px-3 py-2 focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800 cursor-pointer"
                        id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                        {{-- <span class="absolute -inset-1.5"></span> --}}
                        <span class="sr-only">Open user menu</span>
                        <span class="text-sm/6 font-medium mr-1 text-gray-700 dark:text-gray-200 rounded-sm block">{{
                            auth()->user()->name }}</span>
                        <img class="size-8 rounded-full"
                            src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                            alt="">
                    </button>
                </div>
                <div x-show="isOpen" x-transition:enter="transition ease-out duration-100 transform"
                    x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-75 transform"
                    x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                    class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white dark:bg-zinc-900 dark:border-2 dark:border-zinc-700 py-1 shadow-lg ring-1 ring-black/5 focus:outline-none"
                    role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                    <!-- Active: "bg-gray-100 outline-none", Not Active: "" -->
                    <p class="block text-center px-4 py-2 text-sm text-hijautua dark:text-hijaumuda" role="menuitem"
                        tabindex="-1" id="user-menu-item-0"><i class="fa-solid fa-star me-2"></i> {{
                        auth()->user()->green_points }} Green
                        Points</p>
                    <a href="{{ route('user.dashboard') }}"
                        class="block text-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-200 dark:text-gray-200 dark:hover:bg-zinc-700"
                        role="menuitem" tabindex="-1" id="user-menu-item-1">Dashboard</a>
                    <form action="{{ route('auth.logout') }}" method="POST" class="block" id="logoutForm">
                        @csrf
                        <button type="button" id="logoutBtn"
                            class="block w-full cursor-pointer px-4 py-2 text-sm text-gray-700 hover:bg-gray-200 dark:text-gray-200 dark:hover:bg-zinc-700"
                            role="menuitem" tabindex="-1" id="user-menu-item-2">Sign out</buttont>
                    </form>
                </div>
            </div>
            @endguest
            <!-- Theme Toggle Button -->
            <button id="theme-toggle" aria-label="Toggle theme"
                class="p-2 rounded-full text-accent dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700 cursor-pointer">
                <svg id="theme-icon" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                </svg>
            </button>
        </div>
    </nav>
    <!-- Mobile menu, show/hide based on menu open state. -->
    <div class="lg:hidden" role="dialog" aria-modal="true" x-show="isOpen">
        <!-- Background backdrop, show/hide based on slide-over state. -->
        <div class="fixed inset-0 z-50"></div>
        <div
            class="fixed inset-y-0 right-0 z-50 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
            <div class="flex items-center justify-between">
                <a href="#" class="-m-1.5 p-1.5">
                    <span class="sr-only">Your Company</span>
                    <img class="h-8 w-auto" src="{{ asset('img/logoweb.png') }}" alt="">
                </a>
                <button @click="isOpen = !isOpen, isDropMain= false, isDropAbout=false" type="button"
                    class="-m-2.5 rounded-md p-2.5 text-gray-700">
                    <span class="sr-only">Close menu</span>
                    <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        aria-hidden="true" data-slot="icon">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="mt-6 flow-root">
                <div class="-my-6 divide-y divide-gray-500/10">
                    <div class="space-y-2 py-6">
                        <a href="{{ route('home.index') }}"
                            class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-medium text-gray-700 hover:bg-gray-200">Beranda</a>
                        <a href="{{ route('challenges.index') }}"
                            class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-medium text-gray-700 hover:bg-gray-200">Tantangan
                            Hijau
                            🏆</a>
                        <a href="/quizzes"
                            class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-medium text-gray-700 hover:bg-gray-200">Eco-Quiz
                            🌏</a>

                        <a href="{{ route('post.index') }}"
                            class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-medium text-gray-700 hover:bg-gray-200">
                            Edu-Zone ♻️</a>
                        <a href="{{ route('event.index') }}"
                            class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-medium text-gray-700 hover:bg-gray-200">Green
                            Events 📆</a>
                        <a href="{{ route('hijau-ai.index') }}"
                            class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-medium text-gray-700 hover:bg-gray-200">Hijau
                            AI ✨</a>
                        <a href="{{ route('home.kontak') }}"
                            class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-medium text-gray-700 hover:bg-gray-200">Kontak</a>
                        <a href="{{ route('home.tentang') }}"
                            class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-medium text-gray-700 hover:bg-gray-200">Tentang
                            Aplikasi
                        </a>
                    </div>
                    <div class="py-6">
                        @auth

                        <p class="-mx-3 block rounded-lg px-3 py-2.5 text-base/7 font-medium text-gray-700">
                            <i class="fa-solid fa-profile mr-3"></i> {{ auth()->user()->name }}
                        </p>
                        <p class="block text-center px-4 py-2 text-sm text-hijautua dark:text-hijaumuda" role="menuitem"
                            tabindex="-1" id="user-menu-item-0"><i class="fa-solid fa-star me-2"></i> {{
                            auth()->user()->green_points }} Green
                            Points</p>
                        <a href="{{ route('user.dashboard') }}"
                            class="block text-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-200 " role="menuitem"
                            tabindex="-1" id="user-menu-item-1">Dashboard</a>
                        <form action="{{ route('auth.logout') }}" method="POST" class="block" id="logoutForm">
                            @csrf
                            <button type="button" id="logoutBtn"
                                class="block w-full cursor-pointer px-4 py-2 text-sm text-gray-700 hover:bg-gray-200 "
                                role="menuitem" tabindex="-1" id="user-menu-item-2">Sign out</buttont>
                        </form>
                        @else
                        <a href="{{ route('auth.login') }}"
                            class="-mx-3 block rounded-lg px-3 py-2.5 text-base/7 font-medium text-gray-700 hover:bg-gray-200">
                            <i class="fa-solid fa-sign-in mr-3"></i> Login</a>
                        @endauth
                        <!-- Theme Toggle Button -->
                        <button id="theme-toggle2" aria-label="Toggle theme"
                            class="p-2 rounded-full text-accent dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700 cursor-pointer">
                            <svg id="theme-icon" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
@vite('resources/js/sweetalert.js')

<script src="{{ asset('js/themelogic.js') }}"></script>