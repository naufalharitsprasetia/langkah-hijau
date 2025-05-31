<x-layout :title="$title ?? 'Daftar Quiz'" :active="$active ?? 'quiz'">

    <div class="min-h-screen flex justify-center p-4 pt-14 md:mt-0 md:pt-0">
        <div id="container" class="w-full max-w-2xl rounded-3xl overflow-hidden flex flex-col">
            <div class="p-8 md:pt-0 flex-grow flex flex-col">
                <div id="content" class="text-center mb-8">

                    <div
                        class="w-16 h-16 bg-hijautua rounded-full pt-4 overflow-hidden mx-auto mb-4 flex items-center justify-center">
                        <svg class="w-10 h-10 text-hijautua dark:text-hijaumuda fill="currentColor" viewBox="0 0 24 24"
                            aria-hidden="true">
                            <path
                                d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z">
                            </path>
                        </svg>
                    </div>
                    <h2 class="text-2xl font-semibold text-gray-800 dark:text-white mb-2">Uji Pengetahuan Anda</h2>
                    <p class="text-xl text-gray-600 dark:text-white mb-4">Pilih quiz untuk memulai tes.</p>
                </div>

                {{-- Pesan flash dari controller --}}
                @if (session('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4"
                        role="alert">
                        <strong class="font-bold">Oops!</strong>
                        <span class="block sm:inline">{{ session('error') }}</span>
                    </div>
                @endif
                @if (session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4"
                        role="alert">
                        <strong class="font-bold">Berhasil!</strong>
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                @endif

                {{-- Konten utama daftar quiz --}}
                <div class="flex-grow">
                    <div
                        class="quiz-option bg-white dark:bg-zinc-800 rounded-xl shadow-md border border-gray-200 dark:border-gray-700 p-6 opacity-80">
                        <h1 class="text-3xl font-bold mb-6 text-center text-hijautua dark:text-hijaumuda">Daftar Quiz
                            Tersedia</h1>

                        @if ($quizzes->isEmpty())
                            <p class="text-center text-gray-600 dark:text-gray-400">Belum ada quiz yang tersedia saat
                                ini.</p>
                        @else
                            <div class="grid grid-cols-1 md:grid-cols-1 gap-6">
                                @foreach ($quizzes as $quiz)
                                    <div
                                        class="bg-gray-50 dark:bg-zinc-700 rounded-xl p-4 shadow-sm hover:shadow-lg transition-shadow duration-300 dark:border-gray-600">

                                        <h2 class="text-xl font-semibold mb-2 text-gray-800 dark:text-white">
                                            {{ $quiz->title }}</h2>
                                        <p class="text-gray-600 dark:text-gray-300 mb-3">
                                            {{ Str::limit($quiz->description, 100) }}</p>
                                        @if ($quiz->duration_minutes)
                                            <p class="text-sm text-gray-500 dark:text-gray-400 mb-3">Durasi:
                                                {{ $quiz->duration_minutes }} menit</p>
                                        @endif

                                        {{-- Logika untuk tombol Mulai Tes --}}
                                        @if (in_array($quiz->id, $takenQuizzesToday))
                                            <button
                                                class="rounded-md bg-gray-400 px-3.5 py-2.5 text-sm font-semibold text-white cursor-not-allowed opacity-70"
                                                disabled>
                                                Sudah Dikerjakan Hari Ini
                                            </button>
                                        @else
                                            <a href="{{ route('quizzes.start', $quiz->id) }}"
                                                class="rounded-md bg-hijautua px-3.5 py-2.5 text-sm font-semibold opacity-100 text-white shadow-xs hover:bg-hijaumuda focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-hijautua">
                                                Mulai Tes
                                            </a>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            {{-- glow tengah bawah --}}
            <div class="absolute inset-x-0 top-[calc(100%-40rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-78rem)]"
                aria-hidden="true">
                <div class="relative left-[calc(50%+3rem)] aspect-1155/678 w-144.5 -translate-x-1/2 bg-linear-to-tr from-[#46ff21] to-[#a0ffbc] opacity-30 sm:left-[calc(50%+36rem)] sm:w-288.75"
                    style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
                </div>
            </div>
        </div>
</x-layout>
