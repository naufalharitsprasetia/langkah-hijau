<!DOCTYPE html>
<html lang="id" x-data="{ darkMode: localStorage.getItem('darkMode') === 'true' }" x-init="$watch('darkMode', val => localStorage.setItem('darkMode', val))" :class="{ 'dark': darkMode }">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Quiz - {{ $quiz->title }}</title>
    {{-- Menggunakan CDN Tailwind dan Alpine.js agar konsisten dengan start.blade.php --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#f0fdfa',
                            500: '#14b8a6',
                            600: '#0d9488',
                            700: '#0f766e'
                        }
                    }
                }
            }
        }
    </script>
    <style>
        /* Style kustom jika ada yang relevan dari start.blade.php */
    </style>
</head>

<body class="bg-gray-50 dark:bg-gray-900 transition-colors duration-300">
    <div class="min-h-screen">
        <header class="bg-white dark:bg-gray-800 shadow-sm border-b border-gray-200 dark:border-gray-700">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-16">
                    <div class="flex items-center space-x-4">
                        <div class="w-10 h-10 bg-primary-500 rounded-full flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-lg font-semibold text-gray-900 dark:text-white">
                                {{ Auth::user()->name ?? 'Pengguna' }}</h1>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Hasil Tes</p> {{-- Deskripsi untuk halaman ini --}}
                        </div>
                    </div>

                    <button @click="darkMode = !darkMode"
                        class="p-2 rounded-lg bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors">
                        <svg x-show="!darkMode" class="w-5 h-5" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z">
                            </path>
                        </svg>
                        <svg x-show="darkMode" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z">
                            </path>
                        </svg>
                    </button>
                </div>
            </div>
        </header>

        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                <h1 class="text-3xl font-bold mb-4 text-center text-blue-700 dark:text-blue-500">Hasil Tes Anda</h1>
                <h2 class="text-2xl font-semibold mb-6 text-center text-gray-800 dark:text-gray-200">{{ $quiz->title }}
                </h2>

                {{-- Menampilkan Total Skor --}}
                <p class="text-xl font-bold text-center mb-6">Total Poin Anda: <span
                        class="text-green-600">{{ $totalScore }}</span></p>
                <p class="text-md text-center mb-6 text-gray-700 dark:text-gray-300">Jumlah soal dijawab:
                    {{ $userAnswers->count() }} dari {{ $totalQuestions }}
                </p>

                {{-- Tampilkan Kategori --}}
                <div class="bg-blue-50 border-l-4 border-blue-500 text-blue-800 p-4 mb-6 dark:bg-blue-900/20 dark:border-blue-700 dark:text-blue-300"
                    role="alert">
                    <p class="font-bold">Kategori Hasil Anda:</p>
                    <p class="text-2xl font-bold">{{ $category }}</p>
                    <p class="mt-2">{{ $recommendation }}</p>
                </div>

                <h3 class="text-xl font-semibold mb-4 text-gray-800 dark:text-gray-200">Detail Jawaban Anda:</h3>
                <div class="space-y-6">
                    @foreach ($userAnswers as $userAnswer)
                        <div class="border-b pb-4 border-gray-200 dark:border-gray-700">
                            <p class="font-semibold text-lg mb-2 text-gray-900 dark:text-white">{{ $loop->iteration }}.
                                {{ $userAnswer->question->question_text }}</p>
                            <p class="text-gray-700 dark:text-gray-300">
                                Anda memilih: <span
                                    class="font-medium text-blue-700 dark:text-blue-400">{{ $userAnswer->selectedOption->option_text ?? 'Tidak memilih opsi' }}</span>
                                ({{ $userAnswer->selectedOption->points ?? 0 }} poin)
                            </p>
                            {{-- Opsional: Tampilkan semua opsi dengan poinnya agar user bisa melihat --}}
                            <ul class="list-disc list-inside text-sm text-gray-600 dark:text-gray-400 mt-2">
                                @foreach ($userAnswer->question->options->sortBy('points', SORT_NUMERIC, true) as $option)
                                    <li
                                        class="{{ $userAnswer->selectedOption && $userAnswer->selectedOption->id === $option->id ? 'font-bold text-blue-700 dark:text-blue-400' : '' }}">
                                        {{ $option->option_text }} ({{ $option->points }} poin)
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endforeach
                </div>

                <div class="mt-8 text-center">
                    <a href="{{ route('quizzes.index') }}"
                        class="bg-blue-600 text-white px-6 py-3 rounded-md hover:bg-blue-700 transition duration-300">
                        Kembali ke Daftar Tes
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- Vite JS (Jika Anda tetap ingin memakainya, meskipun CDN sudah ada) --}}
    {{-- @vite('resources/js/app.js') --}}
</body>

</html>
