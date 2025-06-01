<x-layout :title="'Hasil Quiz - ' . $quiz->title" :active="'quiz'">
    <div class="min-h-screen flex justify-center p-4 md:mt-0 md:pt-0">
        <div id="container" class="w-full max-w-2xl rounded-3xl overflow-hidden flex flex-col">
            <div class="md:p-8 md:pt-0 flex-grow flex flex-col">
                <div class="animasi flex items-center justify-center max-w-7xl mx-auto">
                    <canvas id="dotLottie-canvas" class="mx-auto w-80 h-80 md:w-96 md:h-96">
                    </canvas>
                </div>
                <div id="content" class="text-center mb-8">
                    {{-- <div
                        class="w-16 h-16 bg-hijautua rounded-full pt-4 overflow-hidden mx-auto mb-4 flex items-center justify-center">
                        <svg class="w-10 h-10 text-hijautua dark:text-hijaumuda fill-current" viewBox="0 0 24 24"
                            aria-hidden="true">
                            <path
                                d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8.59 10 17z">
                            </path>
                        </svg>
                    </div> --}}
                    <h2 class="text-3xl font-semibold text-gray-800 dark:text-white mb-2">Hasil Quiz :
                    </h2>
                </div>

                {{-- Konten utama hasil quiz --}}
                <div class="flex-grow">
                    <div
                        class="quiz-result-card bg-white dark:bg-zinc-800 rounded-xl shadow-md border border-gray-200 dark:border-gray-700 p-6 opacity-80">
                        <h1 class="text-3xl font-bold mb-6 text-center text-hijautua dark:text-hijaumuda">Rangkuman
                            Hasil
                        </h1>

                        {{-- Total Skor --}}
                        <div class="mb-6 p-4 bg-gray-50 dark:bg-gray-700 rounded-lg text-center">
                            <p class="text-lg text-gray-700 dark:text-gray-300">Skor yang Kamu Dapatkan:
                            </p>
                            <p class="text-4xl font-extrabold text-hijautua dark:text-hijaumuda">{{ $totalScore }}<sub
                                    class="text-sm">/{{$maxPossibleScore }}</sub></p>
                            <p class="text-md text-gray-600 dark:text-gray-400 mt-2">Kamu menjawab
                                {{ $userAnswers->count() }} dari {{ $totalQuestions }} soal.
                            </p>
                        </div>

                        {{-- Kategori --}}
                        <div class="bg-green-50 border-l-4 border-green-500 text-green-800 p-4 mb-6 dark:bg-green-900/20 dark:border-green-700 dark:text-green-300"
                            role="alert">
                            <p class="font-bold text-lg mb-1">Eco-Persona Kamu Adalah:</p>
                            <p class="text-3xl font-bold">{{ $category }}</p>
                            <p class="mt-3 text-base">{{ $staticRecommendation }}</p>
                        </div>

                        {{-- Rekomendasi AI Personal --}}
                        {{-- Gunakan $processedAiRecommendation dari controller --}}
                        @if(isset($processedAiRecommendation) && !empty(strip_tags($processedAiRecommendation,
                        '<strong><em><br>
                                <ul>
                                    <li>'))) {{-- Izinkan beberapa tag untuk pengecekan --}}
                                        <div class="bg-blue-50 border-l-4 border-blue-500 text-blue-800 p-4 mb-6 dark:bg-blue-900/20 dark:border-blue-700 dark:text-blue-300"
                                            role="alert">
                                            <span
                                                class="inline-flex items-center mb-2 gap-x-1.5 py-1.5 px-3 rounded-lg text-xs font-medium bg-hijaumuda/20 text-hijaumuda dark:bg-hijaumuda/30 dark:text-hijaumuda">Generated
                                                by Hijau AI ✨</span>
                                            <p class="font-bold text-lg mb-2 flex items-center">
                                                Rekomendasi Tindakan Untukmu:
                                            </p>
                                            <div id="aiRecommendationTarget"
                                                class="prose prose-sm sm:prose dark:prose-invert max-w-none">
                                                {{-- Konten akan diisi oleh JavaScript --}}
                                            </div>
                                            <script>
                                                // Menggunakan json_encode untuk mengirim string HTML dengan aman ke JavaScript
            const aiHtmlContentForTyping = {!! json_encode($processedAiRecommendation) !!};
                                            </script>
                                        </div>
                                        @else
                                        <div class="bg-yellow-50 border-l-4 border-yellow-500 text-yellow-800 p-4 mb-6 dark:bg-yellow-900/20 dark:border-yellow-700 dark:text-yellow-300"
                                            role="alert">
                                            <p class="font-bold text-lg mb-1">Info Rekomendasi AI:</p>
                                            {{-- Jika tidak ada rekomendasi yang diproses, tampilkan pesan dari
                                            quizAttempt atau default --}}
                                            {{-- Teks mentah dari DB perlu di-escape dan nl2br di sini jika ditampilkan
                                            langsung --}}
                                            <p>{!! nl2br(e($quizAttempt->rekomendasi_ai ?: 'Tidak ada rekomendasi AI
                                                saat ini atau sedang diproses.')) !!}</p>
                                        </div>
                                        @endif
                                        {{-- Akhir Rekomendasi AI --}}

                                        <a href="{{ route('quizzes.resultsDetail', $quiz->id) }}"
                                            class="cursor-pointer text-center mx-auto font-medium mb-4 text-hijaumuda hover:text-hijautua hover:underline">Klik
                                            untuk Detail
                                            Jawabanmu</a>

                                        <div class="mt-8 text-center">
                                            <a href="{{ route('quizzes.index') }}"
                                                class="rounded-md bg-hijautua px-6 py-3 text-lg font-semibold text-white shadow-sm hover:bg-hijaumuda focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-hijautua transition-colors duration-300">
                                                Kembali ke Daftar Tes
                                            </a>
                                        </div>
                    </div>
                </div>
            </div>

            {{-- glow tengah bawah --}}
            <div class="absolute inset-x-0 top-[calc(100%-40rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(10%-8rem)]"
                aria-hidden="true">
                <div class="isolation right-[calc(50%+3rem)] aspect-1155/678 w-144.5 -translate-x-1/2 bg-gradient-to-tr from-[#46ff21] to-[#a0ffbc] opacity-30 sm:left-[calc(50%+36rem)] sm:w-288.75"
                    style="clip-path: polygon(34.1% 74.1%, 100% 31.6%, 67.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
                </div>
            </div>
            <div class="absolute inset-x-0 top-[calc(100%-40rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-78rem)]"
                aria-hidden="true">
                <div class="relative left-[calc(50%+3rem)] aspect-1155/678 w-144.5 -translate-x-1/2 bg-gradient-to-tr from-[#46ff21] to-[#a0ffbc] opacity-30 sm:left-[calc(50%+36rem)] sm:w-288.75"
                    style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
                </div>
            </div>
        </div>
    </div>
    @vite('resources/js/lottiequiz.js')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const targetElement = document.getElementById('aiRecommendationTarget');

            // aiHtmlContentForTyping diambil dari <script> tag di atasnya
            if (targetElement && typeof aiHtmlContentForTyping !== 'undefined' && aiHtmlContentForTyping.trim() !== '') {
                let i = 0;
                const typingSpeed = 20; // milidetik per karakter, sesuaikan kecepatan

                function typeWriter() {
                    if (i < aiHtmlContentForTyping.length) {
                        // Cek jika karakter adalah awal dari sebuah tag HTML
                        if (aiHtmlContentForTyping[i] === '<') {
                            let tagEndIndex = aiHtmlContentForTyping.indexOf('>', i);
                            if (tagEndIndex !== -1) {
                                // Tambahkan seluruh tag HTML sekaligus
                                targetElement.innerHTML += aiHtmlContentForTyping.substring(i, tagEndIndex + 1);
                                i = tagEndIndex + 1; // Pindahkan indeks melewati tag
                            } else {
                                // Jika tag tidak lengkap (seharusnya tidak terjadi dengan HTML yang valid),
                                // tambahkan karakter seperti biasa untuk menghindari loop tak terbatas.
                                targetElement.innerHTML += aiHtmlContentForTyping[i];
                                i++;
                            }
                        } else {
                            // Tambahkan karakter biasa
                            targetElement.innerHTML += aiHtmlContentForTyping[i];
                            i++;
                        }
                        setTimeout(typeWriter, typingSpeed);
                    }
                }
                typeWriter();
            } else if (targetElement) {
                // Jika aiHtmlContentForTyping kosong atau tidak ada, pastikan target kosong
                targetElement.innerHTML = '';
            }
        });
    </script>
</x-layout>