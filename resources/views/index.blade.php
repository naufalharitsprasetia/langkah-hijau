<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <style>
        .hero-image {
            --offset: 2px;
            /* Adjusted for larger border */
            background: rgb(71, 71, 71);
            border-radius: 16px;
            /* You can adjust the radius as per your design */
            position: relative;
            overflow: hidden;
        }

        /* Conic gradient for rotating border */
        .hero-image::before {
            content: '';
            background: conic-gradient(transparent 270deg, #06C790, transparent);
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            aspect-ratio: 1;
            width: 200%;
            /* Increased size for larger element */
            animation: rotate 3s linear infinite;
            /* Adjust animation speed */
            z-index: 1;
            /* To keep it behind the image */
        }

        /* Overlay */
        .hero-image::after {
            content: '';
            background: inherit;
            border-radius: inherit;
            position: absolute;
            inset: var(--offset);
            z-index: 5;
        }
    </style>
    {{-- Hero Section --}}
    <div class="hero relative isolate z-10">
        {{-- absoulute glow atas --}}
        <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80"
            aria-hidden="true">
            <div class="relative left-[calc(50%-11rem)] aspect-1155/678 w-144.5 -translate-x-1/2 rotate-30 bg-linear-to-tr from-[#44ff7c] to-[#80ff9b] opacity-30 sm:left-[calc(50%-30rem)] sm:w-288.75"
                style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
            </div>
        </div>
        <div class="mx-auto max-w-2xl pb-20 sm:pb-28 lg:pb-32 pt-12 sm:pt-16 lg:pt-20">
            <div class="hidden sm:mb-8 sm:flex sm:justify-center">
                <div
                    class="relative rounded-full px-3 py-1 text-sm/6 text-gray-600 dark:text-gray-300 ring-1 ring-gray-900/10 hover:ring-gray-900/20 dark:ring-gray-100/10 dark:hover:ring-gray-100/20">
                    Cek gaya hidupmu, hijaukan langkahmu! <a href="#"
                        class="font-semibold text-green-600 dark:text-green-400 hover:opacity-85"><span
                            class="absolute inset-0" aria-hidden="true"></span>Cek Sekarang <span
                            aria-hidden="true">&rarr;</span></a>
                </div>
            </div>
            <div class="text-center">
                <h1
                    class="text-3xl font-semibold tracking-tight text-balance text-gray-900 dark:text-gray-100 sm:text-5xl md:text-6xl lg:text-7xl">
                    Hijaukan
                    Langkahmu, Hijaukan Dunia.</h1>
                <p class="mt-8 text-lg font-medium text-pretty text-gray-500 dark:text-gray-300 sm:text-xl/8">Mulai dari
                    langkah kecil,
                    untuk bumi yang lebih hijau.</p>
                <div class="mt-10 flex items-center justify-center gap-x-6">
                    <a href="#"
                        class="rounded-md bg-green-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-xs hover:bg-green-700 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600">Mulai
                        Langkahmu</a>
                    <a href="#" class="text-sm/6 font-semibold text-gray-900 dark:text-gray-200">Jelajahi <span
                            aria-hidden="true">→</span></a>
                </div>
            </div>
        </div>
        {{-- snap screenshoot --}}
        <div class="hero-image-wrapper w-full flex justify-center md:-mt-18 mb-20 ">
            <div
                class="hero-image fancy aspect-video rounded-md overflow-hidden max-w-5xl mx-auto relative p-[1.2px] bg-zinc-900">
                <img class="w-full h-full object-cover rounded-2xl hidden dark:block relative z-10"
                    src="{{ asset('img/langkahhijau/dashboard-dark.webp') }}" draggable="false" alt="LangkahHijau"
                    loading="lazy">
                <img class="w-full h-full object-cover rounded-2xl block dark:hidden relative z-10"
                    src="{{ asset('img/langkahhijau/dashboard.webp') }}" draggable="false" alt="LangkahHijau"
                    loading="lazy">

            </div>
        </div>
        {{-- glow bawah --}}
        <div class="absolute inset-x-0 top-[calc(100%-40rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-78rem)]"
            aria-hidden="true">
            <div class="relative left-[calc(50%+3rem)] aspect-1155/678 w-144.5 -translate-x-1/2 bg-linear-to-tr from-[#46ff21] to-[#a0ffbc] opacity-30 sm:left-[calc(50%+36rem)] sm:w-288.75"
                style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
            </div>
        </div>
    </div>
    {{-- under hero --}}
    <div class="underhero relative isolate">
        {{-- absoulute glow --}}
        <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80"
            aria-hidden="true">
            <div class="relative left-[calc(50%-11rem)] aspect-1155/678 w-144.5 -translate-x-1/2 rotate-30 bg-linear-to-tr from-[#44ff7c] to-[#80ff9b] opacity-30 sm:left-[calc(50%-30rem)] sm:w-288.75"
                style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
            </div>
        </div>
        {{-- centered grid 2x2--}}
        <div class="py-24 sm:py-32">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="mx-auto max-w-3xl lg:text-center">
                    <h2 class="text-base/7 font-semibold text-green-600 dark:text-green-400">Fokus Utama</h2>
                    <p
                        class="mt-2 text-4xl font-semibold tracking-tight text-pretty text-gray-900 dark:text-gray-100 sm:text-5xl lg:text-balance">
                        4 Pilar Utama yang Menjadi Fondasi Aplikasi LangkahHijau</p>
                    <p class="mt-6 text-lg/8 text-gray-600">Apa yang menjadi fokus utama kami dalam menghadirkan
                        Greenstye?
                        <br>
                        Kami membangun aplikasi ini sebagai ruang digital untuk hidup lebih bijak, berkelanjutan, dan
                        bernilai. Berikut adalah empat fokus utama yang kami gaungkan:
                    </p>
                </div>
                <div class="mx-auto mt-16 max-w-2xl sm:mt-20 lg:mt-24 lg:max-w-4xl">
                    <dl class="grid max-w-xl grid-cols-1 gap-x-8 gap-y-10 lg:max-w-none lg:grid-cols-2 lg:gap-y-16">
                        <div class="relative pl-16">
                            <dt class="text-base/7 font-semibold text-gray-900 dark:text-gray-100">
                                <div
                                    class="absolute top-0 left-0 flex size-10 items-center justify-center rounded-lg dark:bg-green-400 bg-green-600">
                                    <i class="fa-solid fa-book" style="color:#fff"></i>
                                </div>
                                Edukasi
                            </dt>
                            <dd class="mt-2 text-base/7 text-gray-600">Konten inspiratif dan praktis seputar gaya hidup
                                minim sampah, daur ulang DIY, dan kebiasaan hijau sehari-hari.</dd>
                        </div>
                        <div class="relative pl-16">
                            <dt class="text-base/7 font-semibold text-gray-900">
                                <div
                                    class="absolute top-0 left-0 flex size-10 items-center justify-center rounded-lg bg-green-600">
                                    <i class="fa-solid fa-shop" style="color:white"></i>
                                </div>
                                Marketplace
                            </dt>
                            <dd class="mt-2 text-base/7 text-gray-600">Jual beli barang bekas dengan sistem klasifikasi
                                pintar dan fitur lokasi, untuk konsumsi yang lebih bijak dan berkelanjutan.
                            </dd>
                        </div>
                        <div class="relative pl-16">
                            <dt class="text-base/7 font-semibold text-gray-900">
                                <div
                                    class="absolute top-0 left-0 flex size-10 items-center justify-center rounded-lg bg-green-600">
                                    <i class="fa-solid fa-star-and-crescent" style="color:white"></i>
                                </div>
                                Islamisasi
                            </dt>
                            <dd class="mt-2 text-base/7 text-gray-600">Menghidupkan nilai Islam dalam menjaga bumi
                                sebagai
                                amanah. Hadirkan kebaikan lewat gaya hidup hijau dan sedekah barang.</dd>
                        </div>
                        <div class="relative pl-16">
                            <dt class="text-base/7 font-semibold text-gray-900">
                                <div
                                    class="absolute top-0 left-0 flex size-10 items-center justify-center rounded-lg bg-green-600">
                                    <i class="fa-solid fa-circle-info" style="color:white"></i>

                                </div>
                                Informasi
                            </dt>
                            <dd class="mt-2 text-base/7 text-gray-600">Forum, artikel, dan update komunitas seputar
                                lingkungan. Terhubung dan tumbuh bersama komunitas hijau yang peduli.</dd>
                        </div>
                    </dl>
                </div>
            </div>
        </div>
        {{-- LOGO CLOUD--}}
        <div class="py-24 sm:py-32">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <h2 class="text-center text-lg/8 font-semibold text-gray-900">Trusted by the world’s most innovative
                    teams</h2>
                <div
                    class="mx-auto mt-10 grid max-w-lg grid-cols-4 items-center gap-x-8 gap-y-10 sm:max-w-xl sm:grid-cols-6 sm:gap-x-10 lg:mx-0 lg:max-w-none lg:grid-cols-5">
                    <img class="col-span-2 max-h-12 w-full object-contain lg:col-span-1"
                        src="https://tailwindcss.com/plus-assets/img/logos/158x48/transistor-logo-gray-900.svg"
                        alt="Transistor" width="158" height="48">
                    <img class="col-span-2 max-h-12 w-full object-contain lg:col-span-1"
                        src="https://tailwindcss.com/plus-assets/img/logos/158x48/reform-logo-gray-900.svg" alt="Reform"
                        width="158" height="48">
                    <img class="col-span-2 max-h-12 w-full object-contain lg:col-span-1"
                        src="https://tailwindcss.com/plus-assets/img/logos/158x48/tuple-logo-gray-900.svg" alt="Tuple"
                        width="158" height="48">
                    <img class="col-span-2 max-h-12 w-full object-contain sm:col-start-2 lg:col-span-1"
                        src="https://tailwindcss.com/plus-assets/img/logos/158x48/savvycal-logo-gray-900.svg"
                        alt="SavvyCal" width="158" height="48">
                    <img class="col-span-2 col-start-2 max-h-12 w-full object-contain sm:col-start-auto lg:col-span-1"
                        src="https://tailwindcss.com/plus-assets/img/logos/158x48/statamic-logo-gray-900.svg"
                        alt="Statamic" width="158" height="48">
                </div>
            </div>
        </div>

    </div>
    {{-- sc3 --}}
    <div class="underhero relative isolate">
        {{-- absoulute glow atas --}}
        <div class="absolute inset-x-0 -top-40 -z-50 transform-gpu overflow-hidden blur-3xl sm:-top-80"
            aria-hidden="true">
            <div class="relative left-[calc(50%-11rem)] aspect-1155/678 w-144.5 -translate-x-1/2 rotate-30 bg-linear-to-tr from-[#44ff7c] to-[#80ff9b] opacity-30 sm:left-[calc(50%-30rem)] sm:w-288.75"
                style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
            </div>
        </div>
        {{-- BENTO GRID --}}
        <div class="py-24 sm:py-32">
            <div class="mx-auto max-w-2xl px-6 lg:max-w-7xl lg:px-8">
                <h2 class="text-center text-base/7 font-semibold text-green-600">Deploy faster</h2>
                <p
                    class="mx-auto mt-2 max-w-lg text-center text-4xl font-semibold tracking-tight text-balance text-gray-950 sm:text-5xl">
                    Everything you need to deploy your app</p>
                <div class="mt-10 grid gap-4 sm:mt-16 lg:grid-cols-3 lg:grid-rows-2">
                    <div class="relative lg:row-span-2">
                        <div class="absolute inset-px rounded-lg bg-white lg:rounded-l-4xl"></div>
                        <div
                            class="relative flex h-full flex-col overflow-hidden rounded-[calc(var(--radius-lg)+1px)] lg:rounded-l-[calc(2rem+1px)]">
                            <div class="px-8 pt-8 pb-3 sm:px-10 sm:pt-10 sm:pb-0">
                                <p class="mt-2 text-lg font-medium tracking-tight text-gray-950 max-lg:text-center">
                                    Mobile friendly</p>
                                <p class="mt-2 max-w-lg text-sm/6 text-gray-600 max-lg:text-center">Anim aute id magna
                                    aliqua ad ad non deserunt sunt. Qui irure qui lorem cupidatat commodo.</p>
                            </div>
                            <div class="@container relative min-h-120 w-full grow max-lg:mx-auto max-lg:max-w-sm">
                                <div
                                    class="absolute inset-x-10 top-10 bottom-0 overflow-hidden rounded-t-[12cqw] border-x-[3cqw] border-t-[3cqw] border-gray-700 bg-gray-900 shadow-2xl">
                                    <img class="size-full object-cover object-top"
                                        src="https://tailwindcss.com/plus-assets/img/component-images/bento-03-mobile-friendly.png"
                                        alt="">
                                </div>
                            </div>
                        </div>
                        <div
                            class="pointer-events-none absolute inset-px rounded-lg shadow-sm ring-1 ring-black/5 lg:rounded-l-4xl">
                        </div>
                    </div>
                    <div class="relative max-lg:row-start-1">
                        <div class="absolute inset-px rounded-lg bg-white max-lg:rounded-t-4xl"></div>
                        <div
                            class="relative flex h-full flex-col overflow-hidden rounded-[calc(var(--radius-lg)+1px)] max-lg:rounded-t-[calc(2rem+1px)]">
                            <div class="px-8 pt-8 sm:px-10 sm:pt-10">
                                <p class="mt-2 text-lg font-medium tracking-tight text-gray-950 max-lg:text-center">
                                    Performance</p>
                                <p class="mt-2 max-w-lg text-sm/6 text-gray-600 max-lg:text-center">Lorem ipsum, dolor
                                    sit amet consectetur adipisicing elit maiores impedit.</p>
                            </div>
                            <div
                                class="flex flex-1 items-center justify-center px-8 max-lg:pt-10 max-lg:pb-12 sm:px-10 lg:pb-2">
                                <img class="w-full max-lg:max-w-xs"
                                    src="https://tailwindcss.com/plus-assets/img/component-images/bento-03-performance.png"
                                    alt="">
                            </div>
                        </div>
                        <div
                            class="pointer-events-none absolute inset-px rounded-lg shadow-sm ring-1 ring-black/5 max-lg:rounded-t-4xl">
                        </div>
                    </div>
                    <div class="relative max-lg:row-start-3 lg:col-start-2 lg:row-start-2">
                        <div class="absolute inset-px rounded-lg bg-white"></div>
                        <div class="relative flex h-full flex-col overflow-hidden rounded-[calc(var(--radius-lg)+1px)]">
                            <div class="px-8 pt-8 sm:px-10 sm:pt-10">
                                <p class="mt-2 text-lg font-medium tracking-tight text-gray-950 max-lg:text-center">
                                    Security</p>
                                <p class="mt-2 max-w-lg text-sm/6 text-gray-600 max-lg:text-center">Morbi viverra dui mi
                                    arcu sed. Tellus semper adipiscing suspendisse semper morbi.</p>
                            </div>
                            <div class="@container flex flex-1 items-center max-lg:py-6 lg:pb-2">
                                <img class="h-[min(152px,40cqw)] object-cover"
                                    src="https://tailwindcss.com/plus-assets/img/component-images/bento-03-security.png"
                                    alt="">
                            </div>
                        </div>
                        <div class="pointer-events-none absolute inset-px rounded-lg shadow-sm ring-1 ring-black/5">
                        </div>
                    </div>
                    <div class="relative lg:row-span-2">
                        <div class="absolute inset-px rounded-lg bg-white max-lg:rounded-b-4xl lg:rounded-r-4xl"></div>
                        <div
                            class="relative flex h-full flex-col overflow-hidden rounded-[calc(var(--radius-lg)+1px)] max-lg:rounded-b-[calc(2rem+1px)] lg:rounded-r-[calc(2rem+1px)]">
                            <div class="px-8 pt-8 pb-3 sm:px-10 sm:pt-10 sm:pb-0">
                                <p class="mt-2 text-lg font-medium tracking-tight text-gray-950 max-lg:text-center">
                                    Powerful APIs</p>
                                <p class="mt-2 max-w-lg text-sm/6 text-gray-600 max-lg:text-center">Sit quis amet rutrum
                                    tellus ullamcorper ultricies libero dolor eget sem sodales gravida.</p>
                            </div>
                            <div class="relative min-h-120 w-full grow">
                                <div
                                    class="absolute top-10 right-0 bottom-0 left-10 overflow-hidden rounded-tl-xl bg-gray-900 shadow-2xl">
                                    <div class="flex bg-gray-800/40 ring-1 ring-white/5">
                                        <div class="-mb-px flex text-sm/6 font-medium text-gray-400">
                                            <div
                                                class="border-r border-b border-r-white/10 border-b-white/20 bg-white/5 px-4 py-2 text-white">
                                                NotificationSetting.jsx</div>
                                            <div class="border-r border-gray-600/10 px-4 py-2">App.jsx</div>
                                        </div>
                                    </div>
                                    <div class="px-6 pt-6 pb-14">
                                        <!-- Your code example -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div
                            class="pointer-events-none absolute inset-px rounded-lg shadow-sm ring-1 ring-black/5 max-lg:rounded-b-4xl lg:rounded-r-4xl">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- absoulute glow bawah--}}
        <div class="absolute inset-x-0 top-[calc(100%-13rem)] -z-50 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]"
            aria-hidden="true">
            <div class="relative left-[calc(50%+3rem)] aspect-1155/678 w-144.5 -translate-x-1/2 bg-linear-to-tr from-[#46ff21] to-[#a0ffbc] opacity-30 sm:left-[calc(50%+36rem)] sm:w-288.75"
                style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
            </div>
        </div>
    </div>
    {{-- TESTIMONI --}}
    {{-- <section class="bg-white relative isolate overflow-hidden px-6 py-24 sm:py-32 lg:px-8">
        <div
            class="absolute inset-0 -z-10 bg-[radial-gradient(45rem_50rem_at_top,var(--color-green-100),white)] opacity-20">
        </div>
        <div
            class="absolute inset-y-0 right-1/2 -z-10 mr-16 w-[200%] origin-bottom-left skew-x-[-30deg] bg-white shadow-xl ring-1 shadow-green-600/10 ring-green-50 sm:mr-28 lg:mr-0 xl:mr-16 xl:origin-center">
        </div>
        <div class="mx-auto max-w-2xl lg:max-w-4xl">
            <img class="mx-auto h-12" src="https://tailwindcss.com/plus-assets/img/logos/workcation-logo-green-600.svg"
                alt="">
            <figure class="mt-10">
                <blockquote class="text-center text-xl/8 font-semibold text-gray-900 sm:text-2xl/9">
                    <p>“Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo expedita voluptas culpa
                        sapiente alias molestiae. Numquam corrupti in laborum sed rerum et corporis.”</p>
                </blockquote>
                <figcaption class="mt-10">
                    <img class="mx-auto size-10 rounded-full"
                        src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                        alt="">
                    <div class="mt-4 flex items-center justify-center space-x-3 text-base">
                        <div class="font-semibold text-gray-900">Judith Black</div>
                        <svg viewBox="0 0 2 2" width="3" height="3" aria-hidden="true" class="fill-gray-900">
                            <circle cx="1" cy="1" r="1" />
                        </svg>
                        <div class="text-gray-600">CEO of Workcation</div>
                    </div>
                </figcaption>
            </figure>
        </div>
    </section> --}}
</x-layout>