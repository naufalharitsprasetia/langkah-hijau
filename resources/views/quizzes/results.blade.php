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
                            <p class="text-4xl font-extrabold text-hijautua dark:text-hijaumuda">{{ $totalScore }}</p>
                            <p class="text-md text-gray-600 dark:text-gray-400">Kamu menjawab
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
                        {{-- Ganti nama variabel ke $aiRecommendationFromDB --}}
                        @if(isset($aiRecommendationFromDB) && !empty(strip_tags($aiRecommendationFromDB)) &&
                        strpos(strtolower($aiRecommendationFromDB), 'tidak tersedia') === false &&
                        strpos(strtolower($aiRecommendationFromDB), 'gagal') === false &&
                        strpos(strtolower($aiRecommendationFromDB), 'belum diatur') === false)
                        <div class="bg-blue-50 border-l-4 border-blue-500 text-blue-800 p-4 mb-6 dark:bg-blue-900/20 dark:border-blue-700 dark:text-blue-300"
                            role="alert">
                            <p class="font-bold text-lg mb-2 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 text-blue-500" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9.663 17h4.673M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M14.33 10.332C14.33 10.077 14.228 9.873 14.03 9.728L12.13 8.28c-.376-.285-.96-.038-.96.418V9h-.037c-.666 0-1.18.078-1.618.229-.438.15-.81.39-1.118.721a3.773 3.773 0 00-.92 1.268c-.21.512-.315 1.093-.315 1.744 0 .651.105 1.232.315 1.744.21.512.502.95.92 1.268.308.33.68.571 1.118.721.438.151.952.229 1.618.229h.037v.294c0 .456.584.703.96.418l1.898-1.448c.199-.145.301-.35.301-.604V10.332z" />
                                </svg>
                                Rekomendasi Tindakan Untukmu:
                            </p>
                            {{-- Target untuk typing effect --}}
                            <div id="aiRecommendationTarget"
                                class="prose prose-sm sm:prose dark:prose-invert max-w-none">
                                {{-- Konten akan diisi oleh JavaScript --}}
                            </div>
                            {{-- Data AI untuk JavaScript, pastikan di-escape dengan benar --}}
                            <script>
                                const aiFullText = `{!! nl2br(e($aiRecommendationFromDB)) !!}`;
                            </script>
                        </div>
                        @else
                        <div class="bg-yellow-50 border-l-4 border-yellow-500 text-yellow-800 p-4 mb-6 dark:bg-yellow-900/20 dark:border-yellow-700 dark:text-yellow-300"
                            role="alert">
                            <p class="font-bold text-lg mb-1">Info Rekomendasi AI:</p>
                            {{-- Ganti nama variabel ke $aiRecommendationFromDB dan gunakan nl2br juga jika teks mentah
                            --}}
                            <p>{!! nl2br(e($aiRecommendationFromDB)) !!}</p>
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
            // aiFullText diambil dari script tag di atasnya
            // const fullText = aiFullText; // Sudah ada variabel global aiFullText

            if (targetElement && typeof aiFullText !== 'undefined' && aiFullText.trim() !== '') {
                let i = 0;
                const typingSpeed = 20; // milidetik per karakter, sesuaikan kecepatan

                function typeWriter() {
                    if (i < aiFullText.length) {
                        // Cek jika karakter berikutnya adalah bagian dari tag <br>
                        if (aiFullText.substring(i, i + 4).toLowerCase() === '<br>') {
                            targetElement.innerHTML += '<br>';
                            i += 4;
                        } else if (aiFullText.substring(i, i + 6).toLowerCase() === '<br />') {
                            targetElement.innerHTML += '<br />';
                            i += 6;
                        }
                        else {
                            targetElement.innerHTML += aiFullText.charAt(i);
                            i++;
                        }
                        setTimeout(typeWriter, typingSpeed);
                    }
                }
                typeWriter();
            } else if (targetElement) {
                // Jika aiFullText kosong atau tidak ada, pastikan target kosong
                targetElement.innerHTML = '';
            }
        });
    </script>
</x-layout>