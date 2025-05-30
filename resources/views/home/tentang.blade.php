<x-layout :title="$title" :active="$active">
    {{-- <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap');

        body {
            font-family: 'Inter', sans-serif;
        }

        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .hero-gradient {
            background: linear-gradient(135deg, #1e3a8a 0%, #7c3aed 50%, #ec4899 100%);
        }

        .card-hover {
            transition: all 0.3s ease;
        }

        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        .animate-fade-in {
            animation: fadeIn 0.6s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .mobile-menu {
            transform: translateX(-100%);
            transition: transform 0.3s ease;
        }

        .mobile-menu.active {
            transform: translateX(0);
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }

        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }

        .dark ::-webkit-scrollbar-track {
            background: #1e293b;
        }

        .dark ::-webkit-scrollbar-thumb {
            background: #475569;
        }

        .dark ::-webkit-scrollbar-thumb:hover {
            background: #64748b;
        }
    </style> --}}

    <div class="hero z-10 transition-colors duration-300">
        <div class="text-center mb-12 sm:mb-16 md:mb-20 lg:mb-24 px-4">
            <h1
                class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl xl:text-7xl font-bold tracking-tight text-gray-900 dark:text-gray-100 leading-tight">
                <span class="text-hijautua dark:text-hijaumuda">Tentang LangkahHijau</span>
            </h1>
        </div>


        <!-- Latar Belakang -->
        <section id="about" class="relative isolate">
            <x-efek.glowatas />
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid lg:grid-cols-2 gap-12 items-center">
                    <div class="animate-fade-in">
                        <span
                            class="inline-block bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200 px-3 py-1 rounded-full text-sm font-medium mb-4 shadow-[0_0_10px_rgba(34,197,94,0.5)]"">
                            Latar Belakang
                        </span>
                        <h2 class=" text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 dark:text-white mb-6">
                            Tantangan Global dan
                            <br>
                            <span class="text-green-600">Peran Generasi Muda</span>
                            </h2>
                            <p class="text-gray-600 dark:text-gray-300 text-lg mb-8 leading-relaxed">
                                Isu lingkungan hidup dan kesehatan masyarakat saat ini menjadi tantangan global yang
                                semakin
                                mendesak.
                                Di Indonesia, berbagai permasalahan seperti polusi plastik, emisi karbon yang meningkat,
                                serta gaya hidup tidak sehat terus menjadi ancaman
                                bagi keberlangsungan hidup manusia dan kelestarian alam. Generasi muda sebagai agen
                                perubahan justru seringkali tidak memiliki media edukasi
                                yang menarik dan relevan dengan kebiasaan digital mereka. Di sinilah peran teknologi
                                digital
                                dapat menjadi jembatan penting untuk membentuk kesadaran baru.
                            </p>

                            <div class="mt-10 grid grid-cols-1 sm:grid-cols-2 gap-8 text-left">
                                <div>
                                    <p class="text-4xl font-bold text-green-600">80%</p>
                                    <p class="text-gray-600 dark:text-gray-400">Remaja Indonesia aktif menggunakan media
                                        digital setiap hari</p>
                                </div>
                                <div>
                                    <p class="text-4xl font-bold text-green-600">65%</p>
                                    <p class="text-gray-600 dark:text-gray-400">Mengaku kurang memahami dampak
                                        lingkungan
                                        dari gaya hidup mereka</p>
                                </div>
                            </div>

                    </div>

                    <div class="relative animate-fade-in">
                        <div class="relative z-10">
                            <img src="{{ asset('img/tentang/bumi-2.png') }}" alt="Digital Marketing Professional"
                                class="rounded-2xl shadow-2xl w-full h-auto">
                        </div>
                        <div class="absolute -top-4 -right-4 w-full h-full rounded-2xl -z-10">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Masalah yang diangkat -->
        <section id="services" class="py-16 lg:py-24">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16 animate-fade-in">
                    <span
                        class="inline-block bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200 px-3 py-1 rounded-full text-sm font-medium mb-4 shadow-[0_0_10px_rgba(34,197,94,0.5)]"">
                        THE PROBLEM
                    </span>
                    <h2 class=" text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 dark:text-white">
                        Masalah yang Diangkat
                        </h2>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                    <div
                        class="card-hover bg-gradient-to-br from-purple-50 to-blue-50 dark:from-purple-900/20 dark:to-blue-900/20 rounded-xl p-8 text-center border border-gray-100 dark:border-gray-700">
                        <div
                            class="w-16 h-16 bg-gradient-to-br from-green-500 via-green-500 to-green-300 ring-green-400/30 rounded-full flex items-center justify-center text-white text-2xl font-bold mx-auto mb-6">
                            01
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Rendahnya Kesadaran</h3>
                        <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                            Kesadaran akan gaya hidup sehat dan berkelanjutan masih rendah, terutama di kalangan
                            generasi muda yang cenderung mengabaikan dampak jangka panjang terhadap lingkungan dan
                            kesehatan.
                        </p>
                    </div>

                    <div
                        class="card-hover bg-gradient-to-br from-purple-50 to-blue-50 dark:from-purple-900/20 dark:to-blue-900/20 rounded-xl p-8 text-center border border-gray-100 dark:border-gray-700">
                        <div
                            class="w-16 h-16 bg-gradient-to-br from-green-500 via-green-500 to-green-300 ring-green-400/30 rounded-full flex items-center justify-center text-white text-2xl font-bold mx-auto mb-6">
                            02
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Edukasi Kurang Efektif</h3>
                        <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                            Program edukasi lingkungan saat ini bersifat satu arah dan kaku, sehingga gagal menciptakan
                            keterlibatan aktif dari masyarakat, khususnya anak muda.
                        </p>
                    </div>

                    <div
                        class="card-hover bg-gradient-to-br from-purple-50 to-blue-50 dark:from-purple-900/20 dark:to-blue-900/20 rounded-xl p-8 text-center border border-gray-100 dark:border-gray-700">
                        <div
                            class="w-16 h-16 bg-gradient-to-br from-green-500 via-green-500 to-green-300 ring-green-400/30 rounded-full flex items-center justify-center text-white text-2xl font-bold mx-auto mb-6">
                            03
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Kurangnya Apresiasi Aksi Kecil
                        </h3>
                        <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                            Kebiasaan kecil yang berdampak besar, seperti membawa botol sendiri atau memilah sampah,
                            jarang dihargai atau diapresiasi secara sosial maupun sistematis.
                        </p>
                    </div>

                    <div
                        class="card-hover bg-gradient-to-br from-purple-50 to-blue-50 dark:from-purple-900/20 dark:to-blue-900/20 rounded-xl p-8 text-center border border-gray-100 dark:border-gray-700">
                        <div
                            class="w-16 h-16 bg-gradient-to-br from-green-500 via-green-500 to-green-300 ring-green-400/30 rounded-full flex items-center justify-center text-white text-2xl font-bold mx-auto mb-6">
                            04
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Potensi Aksi Kolektif</h3>
                        <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                            Jika dilakukan secara kolektif dan konsisten, aksi-aksi sederhana sehari-hari memiliki
                            potensi besar untuk membawa perubahan positif terhadap lingkungan dan kebiasaan hidup
                            masyarakat.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- tujuan dan fungsi -->
        <section class="py-16 lg:py-24 duration-300 relative isolate">
            <x-efek.glowatas />
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid lg:grid-cols-2 gap-12 items-center">
                    <div class="relative animate-fade-in">
                        <img src="{{ asset('img/tentang/reusable.png') }}" alt="Professional Woman with Laptop"
                            class="rounded-2xl shadow-2xl w-full h-auto">
                    </div>

                    <div class="animate-fade-in">
                        <span
                            class="inline-block bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200 px-3 py-1 rounded-full text-sm font-medium mb-4 shadow-[0_0_10px_rgba(34,197,94,0.5)]">
                            THE OBJECTIVE
                        </span>

                        <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-8 text-black dark:text-white">Tujuan
                            dan Fungsi</h2>
                        <p class="text-black dark:text-gray-300 text-lg mb-8 leading-relaxed">
                            LangkahHijau dikembangkan sebagai solusi edukatif dan interaktif untuk mengubah aktivitas
                            harian menjadi aksi positif bagi kesehatan dan lingkungan melalui pendekatan gamifikasi.
                            Aplikasi ini bertujuan untuk:
                        </p>

                        <div class="space-y-6">
                            <div class="flex items-start space-x-4">
                                <div
                                    class="flex-shrink-0 w-12 h-12 bg-white/20 dark:bg-white/10 rounded-lg flex items-center justify-center text-green-800 dark:text-green-300">
                                    <i class="fas fa-users text-xl"></i>
                                </div>
                                <div>
                                    <h3 class="text-xl font-semibold mb-2 text-green-800 dark:text-green-300">
                                        Meningkatkan Literasi Lingkungan dan Kesehatan</h3>
                                    <p class="text-black dark:text-gray-300">Membangun kesadaran masyarakat tentang
                                        pentingnya hidup sehat dan ramah lingkungan melalui pendekatan edukatif yang
                                        relevan dan mudah dipahami.</p>
                                </div>
                            </div>

                            <div class="flex items-start space-x-4">
                                <div
                                    class="flex-shrink-0 w-12 h-12 bg-white/20 dark:bg-white/10 rounded-lg flex items-center justify-center text-green-800 dark:text-green-300">
                                    <i class="fas fa-bullseye text-xl"></i>
                                </div>
                                <div>
                                    <h3 class="text-xl font-semibold mb-2 text-green-800 dark:text-green-300">Edukasi
                                        Digital Interaktif</h3>
                                    <p class="text-black dark:text-gray-300">Menyediakan platform pembelajaran berbasis
                                        digital yang menyenangkan dan dapat diakses kapan saja, di mana saja oleh semua
                                        kalangan.</p>
                                </div>
                            </div>

                            <div class="flex items-start space-x-4">
                                <div
                                    class="flex-shrink-0 w-12 h-12 bg-white/20 dark:bg-white/10 rounded-lg flex items-center justify-center text-green-800 dark:text-green-300">
                                    <i class="fas fa-chart-line text-xl"></i>
                                </div>
                                <div>
                                    <h3 class="text-xl font-semibold mb-2 text-green-800 dark:text-green-300">Dorongan
                                        Aksi Berkelanjutan</h3>
                                    <p class="text-black dark:text-gray-300">Mengajak pengguna terlibat dalam tantangan,
                                        kuis, dan sistem penghargaan sebagai pemicu aksi nyata yang berdampak positif
                                        terhadap lingkungan.</p>
                                </div>
                            </div>

                            <div class="flex items-start space-x-4">
                                <div
                                    class="flex-shrink-0 w-12 h-12 bg-white/20 dark:bg-white/10 rounded-lg flex items-center justify-center text-green-800 dark:text-green-300">
                                    <i class="fas fa-comments text-xl"></i>
                                </div>
                                <div>
                                    <h3 class="text-xl font-semibold mb-2 text-green-800 dark:text-green-300">Komunitas
                                        Hijau yang Menginspirasi</h3>
                                    <p class="text-black dark:text-gray-300">Membangun ekosistem digital yang mendukung
                                        interaksi dan kolaborasi antar pengguna dalam gerakan gaya hidup hijau dan
                                        sehat.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- fitur unggulan -->
        <section class="py-16 lg:py-24 dark:bg-gray-800 relative isolate">
            <x-efek.glowatas />
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16 animate-fade-in">
                    <span
                        class="inline-block bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200 px-3 py-1 rounded-full text-sm font-medium mb-4 shadow-[0_0_10px_rgba(34,197,94,0.5)]">
                        THE FEATURES
                    </span>
                    <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 dark:text-white">
                        Fitur Unggulan
                    </h2>
                </div>

                <div class="grid md:grid-cols-3 gap-8">
                    <!-- Tantangan Hijau -->
                    <a href="{{ route('challenges.index') }}">
                        <div
                            class="bg-white dark:bg-gray-700 rounded-xl p-8 shadow-xl text-center transition-transform transform hover:scale-105 duration-300">
                            <div class="text-green-500 text-4xl mb-4">
                                <i class="fas fa-leaf"></i>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-3">Tantangan Hijau</h3>
                            <p class="text-gray-600 dark:text-gray-300">
                                Misi aksi nyata seperti hemat listrik, zero waste, dan aktivitas fisik yang bisa dicatat
                                dan diukur rutin.
                            </p>
                        </div>
                    </a>

                    <!-- Eco-Quiz -->
                    <a href="{{ route('quizzes.index') }}">
                        <div
                            class="bg-white dark:bg-gray-700 rounded-xl p-8 shadow-xl text-center transition-transform transform hover:scale-105 duration-300">
                            <div class="text-green-500 text-4xl mb-4">
                                <i class="fas fa-question-circle"></i>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-3">Eco-Quiz</h3>
                            <p class="text-gray-600 dark:text-gray-300">
                                Kuis harian ringan dan informatif untuk menguji pengetahuan seputar lingkungan dan
                                kesehatan.
                            </p>
                        </div>
                    </a>

                    <!-- Green Points & Badge -->
                    <a href="{{ route('user.leaderboard') }}">
                        <div
                            class="bg-white dark:bg-gray-700 rounded-xl p-8 shadow-xl text-center transition-transform transform hover:scale-105 duration-300">
                            <div class="text-green-500 text-4xl mb-4">
                                <i class="fas fa-award"></i>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-3">Green Points & Badge
                            </h3>
                            <p class="text-gray-600 dark:text-gray-300">
                                Raih poin dan badge eksklusif sebagai apresiasi atas setiap aksi hijau yang kamu
                                lakukan.
                            </p>
                        </div>
                    </a>

                    <!-- Edu-Zone -->
                    <a href="{{ route('post.index') }}">
                        <div
                            class="bg-white dark:bg-gray-700 rounded-xl p-8 shadow-xl text-center transition-transform transform hover:scale-105 duration-300">
                            <div class="text-green-500 text-4xl mb-4">
                                <i class="fas fa-book-open"></i>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-3">Edu-Zone</h3>
                            <p class="text-gray-600 dark:text-gray-300">
                                Baca artikel edukatif dan tips mudah tentang gaya hidup sehat dan ramah lingkungan.
                            </p>
                        </div>
                    </a>

                    <!-- Green Events -->
                    <a href="{{ route('event.index') }}">
                        <div
                            class="bg-white dark:bg-gray-700 rounded-xl p-8 shadow-xl text-center transition-transform transform hover:scale-105 duration-300">
                            <div class="text-green-500 text-4xl mb-4">
                                <i class="fas fa-calendar-alt"></i>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-3">Green Events</h3>
                            <p class="text-gray-600 dark:text-gray-300">
                                Temukan dan ikuti acara lingkungan. Tambahkan ke Google Calendar dan ajukan event
                                milikmu sendiri.
                            </p>
                        </div>
                    </a>

                    <!-- Leaderboard & Tier -->
                    <a href="{{ route('user.leaderboard') }}">
                        <div
                            class="bg-white dark:bg-gray-700 rounded-xl p-8 shadow-xl text-center transition-transform transform hover:scale-105 duration-300">
                            <div class="text-green-500 text-4xl mb-4">
                                <i class="fas fa-trophy"></i>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-3">Leaderboard & Tier</h3>
                            <p class="text-gray-600 dark:text-gray-300">
                                Lihat peringkatmu dan tingkatkan tier mingguan berdasarkan akumulasi Green Points yang
                                dikumpulkan.
                            </p>
                        </div>
                    </a>

                </div>
            </div>
        </section>

    </div>

    {{-- hilangkan batas di body hanya untuk id="tentang-kami" --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tentangKami = document.querySelector('#tentang-kami');
            if (tentangKami) {
                const layoutDiv = document.querySelector('main > div');
                if (layoutDiv) {
                    layoutDiv.removeAttribute('class');
                }
            }
        });
    </script>
</x-layout>