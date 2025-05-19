<!doctype html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>GreenStyle | {{ $title }}</title>
    <link rel="icon" type="image/png" href="/img/logoweb.png">
    <script src="https://kit.fontawesome.com/5d8dfb0173.js" crossorigin="anonymous"></script>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
    <script src="//unpkg.com/alpinejs" defer></script>
</head>

<body>
    <div class="bg-white">
        <x-navbar></x-navbar>
        <main>
            <div class="relative isolate px-6 pt-14 lg:px-8">
                {{-- absoulute glow atas --}}
                <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80"
                    aria-hidden="true">
                    <div class="relative left-[calc(50%-11rem)] aspect-1155/678 w-144.5 -translate-x-1/2 rotate-30 bg-linear-to-tr from-[#44ff7c] to-[#80ff9b] opacity-30 sm:left-[calc(50%-30rem)] sm:w-288.75"
                        style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
                    </div>
                </div>
                {{ $slot }}
            </div>
        </main>
        {{-- <div class="relative isolate px-6 pt-14 lg:px-8"> --}}
            {{-- absoulute glow atas --}}
            {{-- <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80"
                aria-hidden="true">
                <div class="relative left-[calc(50%-11rem)] aspect-1155/678 w-144.5 -translate-x-1/2 rotate-30 bg-linear-to-tr from-[#44ff7c] to-[#80ff9b] opacity-30 sm:left-[calc(50%-30rem)] sm:w-288.75"
                    style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
                </div>
            </div> --}}
            {{-- absoulute glow bawah--}}
            {{-- <div
                class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]"
                aria-hidden="true">
                <div class="relative left-[calc(50%+3rem)] aspect-1155/678 w-144.5 -translate-x-1/2 bg-linear-to-tr from-[#46ff21] to-[#a0ffbc] opacity-30 sm:left-[calc(50%+36rem)] sm:w-288.75"
                    style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
                </div>
            </div> --}}
            {{-- </div> --}}
    </div>
    {{-- Footer --}}
    <footer class="text-gray-600 h-fit dark:text-gray-400 py-8 px-4 sm:px-6 lg:px-8">
        <div class="max-w-6xl mx-auto ">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 ">
                <!-- Logo and Social Icons -->
                <div class="space-y-4">
                    <div class="flex items-center space-x-2">
                        <img src="/img/logoweb.png" width="40" height="40" alt="AgriConnect Logo" class="w-10 h-10">
                        <span class="text-xl font-bold">GreenStyle</span>
                    </div>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-gray-500">
                            <span class="sr-only">Twitter</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path
                                    d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84">
                                </path>
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-gray-500">
                            <span class="sr-only">YouTube</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M19.812 5.418c.861.23 1.538.907 1.768 1.768C21.998 8.746 22 12 22 12s0 3.255-.418 4.814a2.504 2.504 0 0 1-1.768 1.768c-1.56.419-7.814.419-7.814.419s-6.255 0-7.814-.419a2.505 2.505 0 0 1-1.768-1.768C2 15.255 2 12 2 12s0-3.255.417-4.814a2.507 2.507 0 0 1 1.768-1.768C5.744 5 11.998 5 11.998 5s6.255 0 7.814.418ZM15.194 12 10 15V9l5.194 3Z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-gray-500">
                            <span class="sr-only">Facebook</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-gray-500">
                            <span class="sr-only">LinkedIn</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Company Links -->
                <div>
                    <h3 class="text-sm font-semibold text-gray-400 uppercase tracking-wider mb-4">Company</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:text-gray-900 dark:hover:text-white">About Us</a></li>
                        <li><a href="#" class="hover:text-gray-900 dark:hover:text-white">Contact</a></li>
                        <li><a href="#" class="hover:text-gray-900 dark:hover:text-white">Support</a></li>
                        <li><a href="#" class="hover:text-gray-900 dark:hover:text-white">News</a></li>
                        <li><a href="#" class="hover:text-gray-900 dark:hover:text-white">Careers</a></li>
                    </ul>
                </div>

                <!-- Legal Links -->
                <div>
                    <h3 class="text-sm font-semibold text-gray-400 uppercase tracking-wider mb-4">Legal</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:text-gray-900 dark:hover:text-white">Imprint</a></li>
                        <li><a href="#" class="hover:text-gray-900 dark:hover:text-white">Privacy Policy</a></li>
                        <li><a href="#" class="hover:text-gray-900 dark:hover:text-white">Terms of Use</a></li>
                        <li><a href="#" class="hover:text-gray-900 dark:hover:text-white">Cookies Policy</a></li>
                    </ul>
                </div>

                <!-- Services Links -->
                <div>
                    <h3 class="text-sm font-semibold text-gray-400 uppercase tracking-wider mb-4">Services</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:text-gray-900 dark:hover:text-white">IoT Sensors</a></li>
                        <li><a href="#" class="hover:text-gray-900 dark:hover:text-white">AI Monitoring</a></li>
                        <li><a href="#" class="hover:text-gray-900 dark:hover:text-white">Marketplace</a></li>
                        <li><a href="#" class="hover:text-gray-900 dark:hover:text-white">Farmer Support</a></li>
                        <li><a href="#" class="hover:text-gray-900 dark:hover:text-white">Smart Irrigation</a></li>
                    </ul>
                </div>
            </div>

            <!-- Bottom Section -->
            <div class="mt-8 pt-8 border-t border-gray-200 dark:border-gray-700">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <p class="text-xs">&copy; 2025 GreenStyle. All rights reserved.</p>
                    <nav class="flex space-x-4 mt-4 md:mt-0">
                        <a href="#" class="text-xs hover:text-gray-900 dark:hover:text-white">Privacy Policy</a>
                        <a href="#" class="text-xs hover:text-gray-900 dark:hover:text-white">Terms of Service</a>
                        <a href="#" class="text-xs hover:text-gray-900 dark:hover:text-white">Cookie Settings</a>
                    </nav>
                </div>
            </div>
        </div>
    </footer>

</body>

</html>