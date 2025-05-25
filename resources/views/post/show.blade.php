<x-layout :title="$title" :active="$active">
    <div class="relative isolate max-w-7xl mx-auto px-4 sm:px-6 lg:px-16 pb-12 z-30 min-h-screen">
        <a href="{{ route('post.index') }}" class="text-hijaumuda"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
        <br><br>
        <!-- Article Image -->
        <div class="w-full xl:w-auto xl:flex-shrink-0">
            <div class="w-full max-w-xl rounded-lg flex items-center justify-center overflow-hidden">
                <img src="https://hebbkx1anhila5yf.public.blob.vercel-storage.com/image-bsxYju0wDVbprjHOjvtU6JiSucjMxW.png"
                    alt="Zero Waste Illustration" class="w-full h-full object-cover rounded-2xl">
            </div>
        </div>
        <br>
        <!-- Article Content -->
        <div class="flex-1 w-full">
            <!-- Category and Date -->
            <div class="flex flex-col xs:flex-row xs:items-center gap-2 xs:gap-3 mb-4">
                <span
                    class="bg-hijaumuda dark:bg-hijautua text-white px-3 py-1 rounded-full text-sm font-medium w-fit">Edukasi</span>
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
        </div>
    </div>
</x-layout>