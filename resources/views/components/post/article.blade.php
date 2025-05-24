{{-- artikel --}}
<div class="relative isolate max-w-7xl mx-auto mt-20 px-4 sm:px-6 lg:px-16 pb-8">
    <x-efek.glowatas />
    {{-- title --}}
    <p
        class="mt-4 mb-16 text-2xl text-center font-bold text-pretty text-gray-900 dark:text-gray-100 sm:text-5xl lg:text-balance">
        Edu-Zone<br><span class="text-green-600 dark:text-green-400 text-xl sm:text-2xl font-medium">Edukasi tentang
            gaya hidup
            sehat dan ramah
            lingkungan</span>
    </p>
    {{-- <h2 class="text-center text-lg/8 font-semibold text-zinc-900 dark:text-gray-200 my-12">Edu-Zone</h2> --}}
    <!-- Featured Article Section -->
    <div
        class="bg-white dark:bg-zinc-900 border border-gray-300 dark:border-zinc-700 rounded-2xl shadow-sm p-4 sm:p-6 lg:p-8 mb-8 sm:mb-12 transition-colors duration-300">
        <div class="flex flex-col xl:flex-row gap-6 lg:gap-8 items-center">
            <!-- Article Image -->
            <div class="w-full xl:w-auto xl:flex-shrink-0">
                <div
                    class="w-full xl:w-80 h-48 sm:h-56 lg:h-64 bg-gradient-to-br from-green-100 to-blue-100 dark:from-green-900 dark:to-blue-900 rounded-2xl flex items-center justify-center overflow-hidden">
                    <img src="https://hebbkx1anhila5yf.public.blob.vercel-storage.com/image-bsxYju0wDVbprjHOjvtU6JiSucjMxW.png"
                        alt="Zero Waste Illustration" class="w-full h-full object-cover rounded-2xl">
                </div>
            </div>

            <!-- Article Content -->
            <div class="flex-1 w-full">
                <!-- Category and Date -->
                <div class="flex flex-col xs:flex-row xs:items-center gap-2 xs:gap-3 mb-4">
                    <span
                        class="bg-green-500 dark:bg-green-600 text-white px-3 py-1 rounded-full text-sm font-medium w-fit">Edukasi</span>
                    <span class="text-gray-500 dark:text-gray-400 text-sm">20 Mei 2025</span>
                </div>

                <!-- Title -->
                <h2
                    class="text-xl sm:text-2xl lg:text-3xl xl:text-4xl font-bold text-gray-900 dark:text-white mb-3 sm:mb-4 leading-tight">
                    5 Cara Mudah Memulai Gaya Hidup Zero Waste
                </h2>

                <!-- Description -->
                <p class="text-gray-600 dark:text-gray-300 leading-relaxed mb-4 sm:mb-6 text-sm sm:text-base">
                    Gaya hidup zero waste bukan berarti hidup tanpa sampah sama sekali, tapi mengurangi semaksimal
                    mungkin. Mulailah dengan: Membawa tas belanja sendiri, Menggunakan botol minum dan tempat makan
                    reusable, Menghindari produk sekali pakai, Membeli produk tanpa kemasan berlebih, Daur ulang dan
                    kompos sisa makanan. Tips Praktis: "Mulai dari satu kebiasaan, lalu tambah perlahan. Konsisten
                    lebih penting daripada sempurna!"
                </p>

                <!-- Read More Link -->
                <a href="#"
                    class="inline-flex items-center text-green-500 dark:text-green-400 font-medium hover:text-green-600 dark:hover:text-green-300 transition-colors text-sm sm:text-base">
                    Read More
                    <i class="fas fa-arrow-right ml-2 text-sm"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- Tips Lainnya Section -->
    <section>
        <!-- Section Header -->
        <div class="flex flex-col sm:flex-row sm:justify-between sm:items-end gap-4 sm:gap-0 mb-6 sm:mb-8">
            <div>
                <h3 class="text-xl sm:text-2xl lg:text-3xl font-bold text-gray-900 dark:text-white mb-2">Tips
                    Lainnya</h3>
                <p class="text-gray-600 dark:text-gray-300 text-sm sm:text-base">Tips Edukasi & Artikel terkait
                    Langkah Hijau</p>
            </div>

            <!-- Navigation Arrows -->
            <div class="hidden gap-2 self-start sm:self-auto sm:flex">
                <button
                    class="cursor-pointer w-8 h-8 sm:w-10 sm:h-10 rounded-full border border-gray-300 dark:border-gray-600 flex items-center justify-center hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                    <i class="fas fa-chevron-left text-gray-400 dark:text-gray-500 text-sm"></i>
                </button>
                <button
                    class="cursor-pointer w-8 h-8 sm:w-10 sm:h-10 rounded-full border border-gray-300 dark:border-gray-600 flex items-center justify-center hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                    <i class="fas fa-chevron-right text-gray-400 dark:text-gray-500 text-sm"></i>
                </button>
            </div>
        </div>

        <!-- Articles Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6 mb-6 sm:mb-8">
            <x-post.articlecard />
            <x-post.articlecard />
            <x-post.articlecard />
        </div>

        @if($active == "beranda")
        <!-- View More Button -->
        <div class="text-center">
            <a href="#"
                class="inline-flex items-center bg-green-500 dark:bg-green-600 text-white px-6 sm:px-8 py-2 sm:py-3 rounded-full font-medium hover:bg-green-600 dark:hover:bg-green-700 transition-colors text-sm sm:text-base">
                Lihat Artikel Lainnya
                <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>
        @endif
    </section>
</div>