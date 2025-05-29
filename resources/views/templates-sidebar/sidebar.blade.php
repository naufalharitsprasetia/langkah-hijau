<button data-drawer-target="sidebar-multi-level-sidebar" data-drawer-toggle="sidebar-multi-level-sidebar"
    aria-controls="sidebar-multi-level-sidebar" type="button"
    class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
    <span class="sr-only">Open sidebar</span>
    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path clip-rule="evenodd" fill-rule="evenodd"
            d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
        </path>
    </svg>
</button>

<aside id="sidebar-multi-level-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0"
    aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
        <div class="flex lg:flex-1 ms-3 mt-3 mb-4">
            <a href="#" class="-m-1.5 p-1.5 flex justify-center items-center">
                <span class="sr-only">LangkahHijau</span>
                <img class="h-8 w-auto" src="/img/logoweb.png" alt="">
                <h2 class="text-xl ml-1 font-semibold text-gray-900 dark:text-gray-100">Langkah<span
                        class="text-hijautua dark:text-hijaumuda">Hijau</span></h2>
            </a>
        </div>
        <ul class="space-y-2 font-medium">
            <li>
                <a href="{{ route('home.index') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <span class="ms-3"><i class="fa-solid fa-house mr-3"></i> Beranda</span>
                </a>
            <li>
                <a href="{{ route('user.dashboard') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <span class="ms-3"><i class="fa-solid fa-table-columns mr-3"></i> Dashboard</span>
                </a>
            </li>
            @can('is_admin')
            <li>
                <button type="button"
                    class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                    aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                    <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap"><i
                            class="fa-solid fa-user-tie mr-3"></i> Admin Panel</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>
                </button>
                <ul id="dropdown-example" class="hidden py-2 space-y-2">
                    <li>
                        <a href="{{ route('post.manage') }}"
                            class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Manage
                            Posts</a>
                    </li>
                    <li>
                        <a href="{{ route('event.manage') }}"
                            class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Manage
                            Events</a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Manage
                            Challenges</a>
                    </li>
                </ul>
            </li>
            @endcan

            <li>
                <a href="{{ route('user.leaderboard') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group"><span
                        class="flex-1 ms-3 whitespace-nowrap"><i class="fa-solid fa-trophy mr-3"></i>
                        Leaderboard</span>
                </a>
            </li>
            <li>
                <a href="#"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <span class="flex-1 ms-3 whitespace-nowrap"><i class="fa-solid fa-apple-whole mr-3"></i> Jejak
                        Karbon</span>
                    <span
                        class="inline-flex items-center justify-center px-2 ms-3 text-sm font-medium text-green-800 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-300">Soon</span>
                </a>
            </li>
            <hr>
            <li>
                <p class="flex text-center items-center p-2 text-gray-900 rounded-lg dark:text-white group">
                    <span class="flex-1 ms-3 whitespace-nowrap">{{ auth()->user()->name }} </span>
                </p>
            </li>
            <li>
                <form action="{{ route('auth.logout') }}" method="POST" class="block" id="logoutForm">
                    @csrf
                    <button type="button" id="logoutBtn"
                        class="block w-full cursor-pointer items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <span class="flex-1 ms-3 whitespace-nowrap"><i class="fa-solid fa-right-to-bracket mr-3"></i>
                            Logout</span>
                    </button>
                </form>
            </li>
            <li class="text-center">
                <!-- Theme Toggle Button -->
                <button id="theme-toggle" aria-label="Toggle theme"
                    class="flex items-center justify-center w-full text-center mx-auto p-2 rounded-full text-accent dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700 cursor-pointer">
                    <svg id="theme-icon" class="h-6 w-6 text-center" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                    </svg>
                </button>
            </li>
        </ul>
    </div>
</aside>