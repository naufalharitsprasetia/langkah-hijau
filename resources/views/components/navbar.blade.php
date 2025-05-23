<header class="sticky inset-x-0 top-0 z-50 " x-data="{ isOpen: false }" id="myNavbar">
    {{-- sebenernya ada add remove bg-white/80 di .js nya --}}
    <div class="bg-white/80 backdrop-blur dark:bg-gray-900/80 hidden"></div>
    <nav class="flex items-center justify-between p-6 lg:px-8 mx-auto max-w-7xl" aria-label="Global">
        <div class="flex lg:flex-1">
            <a href="#" class="-m-1.5 p-1.5 flex justify-center items-center">
                <span class="sr-only">LangkahHijau</span>
                <img class="h-8 w-auto" src="/img/logoweb.png" alt="">
                <h2 class="text-xl ml-1 font-semibold text-gray-900 dark:text-gray-100">Langkah<span
                        class="text-green-500">Hijau</span></h2>
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
            <a href="/" class="text-sm/6 font-medium text-green-600 dark:text-green-400">Beranda</a>
            <a href="/blog" class="text-sm/6 font-medium text-gray-700 dark:text-gray-200">Edu-Zone ♻️</a>
            <a href="/about" class="text-sm/6 font-medium text-gray-700 dark:text-gray-200">Tantangan</a>
            <a href="/about" class="text-sm/6 font-medium text-gray-700 dark:text-gray-200">Green AI ✨</a>
            <a href="/contact" class="text-sm/6 font-medium text-gray-700 dark:text-gray-200">Kontak</a>
        </div>
        <div class="hidden lg:flex lg:flex-1 lg:justify-end lg:items-center">
            <!-- Theme Toggle Button -->
            <button id="theme-toggle" aria-label="Toggle theme"
                class="p-2 rounded-full text-accent dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">
                <svg id="theme-icon" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                </svg>
            </button>
            <a href="/login"
                class="text-sm/6 font-medium text-gray-100 bg-green-600 rounded-sm px-3 py-1 hover:bg-green-500 hover:text-grey-200">Log
                in <span aria-hidden="true">&rarr;</span></a>
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
                    <img class="h-8 w-auto"
                        src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=green&shade=600" alt="">
                </a>
                <button @click="isOpen = !isOpen" type="button" class="-m-2.5 rounded-md p-2.5 text-gray-700">
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
                        <a href="/"
                            class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-medium text-gray-700 hover:bg-gray-50">Beranda</a>
                        <a href="/blog"
                            class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-medium text-gray-700 hover:bg-gray-50">
                            Edu-Zone ♻️</a>
                        <a href="/about"
                            class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-medium text-gray-700 hover:bg-gray-50">Tantangan</a>
                        <a href="/t"
                            class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-medium text-gray-700 hover:bg-gray-50">Green
                            AI ✨</a>
                        <a href="/contact"
                            class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-medium text-gray-700 hover:bg-gray-50">Kontak
                        </a>
                    </div>
                    <div class="py-6">
                        <a href="/login"
                            class="-mx-3 block rounded-lg px-3 py-2.5 text-base/7 font-medium text-gray-700 hover:bg-gray-50">Log
                            in</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<script src="{{ asset('js/themelogic.js') }}"></script>