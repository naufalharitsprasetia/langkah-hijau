<x-layout :title="'Hasil Quiz - ' . $quiz->title" :active="'quiz'">
    <div class="min-h-screen flex justify-center p-4 md:mt-0 md:pt-0">
        <div id="container" class="w-full max-w-2xl rounded-3xl overflow-hidden flex flex-col">
            <div class="md:p-8 md:pt-0 flex-grow flex flex-col">
                <div id="content" class="text-center mb-8">
                    <h2 class="text-3xl font-semibold text-gray-800 dark:text-white mb-2">Detail Hasil Quiz :
                    </h2>
                </div>

                {{-- Konten utama hasil quiz --}}
                <div class="flex-grow">
                    <div
                        class="quiz-result-card bg-white dark:bg-zinc-800 rounded-xl shadow-md border border-gray-200 dark:border-gray-700 p-6 opacity-80">
                        <h1 class="text-3xl font-bold mb-6 text-center text-hijautua dark:text-hijaumuda">
                            Jawaban
                            Quiz Anda :
                        </h1>

                        {{-- Total Skor --}}
                        {{-- <div class="mb-6 p-4 bg-gray-50 dark:bg-gray-700 rounded-lg text-center">
                            <p class="text-lg text-gray-700 dark:text-gray-300">Total Poin yang Kamu Dapatkan:</p>
                            <p class="text-4xl font-extrabold text-hijautua dark:text-hijaumuda">{{ $totalScore }}</p>
                            <p class="text-md text-gray-600 dark:text-gray-400">Kamu menjawab
                                {{ $userAnswers->count() }} dari {{ $totalQuestions }} soal.
                            </p>
                        </div> --}}

                        <p class="text-gray-800 dark:text-white mb-2">Quiz : {{ $quiz->title }}</p>
                        <p class="text-gray-800 dark:text-white mb-2">Attempted At : {{ $attempt->created_at }}</p>
                        <h3 class="text-xl font-semibold mb-4 text-gray-800 dark:text-white">Detail Jawabanmu:</h3>
                        <div class="space-y-6">
                            @foreach ($userAnswers as $userAnswer)
                            <div class="border-b pb-4 border-gray-200 dark:border-gray-700 last:border-b-0 last:pb-0">
                                <p class="font-semibold text-lg mb-2 text-gray-900 dark:text-white">
                                    {{ $loop->iteration }}. {{ $userAnswer->question->question_text }}</p>
                                <p class="text-gray-700 dark:text-gray-300 mb-2">
                                    Kamu memilih: <span class="font-medium text-green-700 dark:text-green-400">{{
                                        $userAnswer->selectedOption->option_text ?? 'Tidak memilih opsi' }}</span>
                                    (Poin: {{ $userAnswer->selectedOption->points ?? 0 }})
                                </p>
                                {{-- Tampilkan semua opsi dengan poinnya agar user bisa melihat --}}
                                <p class="font-medium text-gray-800 dark:text-gray-200 mt-3 mb-1">Semua Opsi:</p>
                                <ul class="list-disc list-inside text-sm text-gray-600 dark:text-gray-400">
                                    @foreach ($userAnswer->question->options->sortByDesc('points') as $option)
                                    <li
                                        class="{{ $userAnswer->selectedOption && $userAnswer->selectedOption->id === $option->id ? 'font-bold text-hijautua dark:text-hijaumuda' : '' }}">
                                        {{ $option->option_text }} ({{ $option->points }} poin)
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            @endforeach
                        </div>

                        <div class="mt-8 text-center">
                            <a href="{{ route('quizzes.results', $quiz->id) }}"
                                class="rounded-md bg-hijautua px-6 py-3 text-lg font-semibold text-white shadow-sm hover:bg-hijaumuda focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-hijautua transition-colors duration-300">
                                Kembali
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
</x-layout>