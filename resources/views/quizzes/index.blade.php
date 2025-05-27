<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soal Quiz</title>
    {{-- Vite CSS --}}
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 p-8">
    <div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-3xl font-bold mb-4 text-center text-blue-700">{{ $quiz->title }}</h1>
        <p class="text-gray-700 mb-6 text-center">{{ $quiz->description }}</p>

        @if ($quiz->duration_minutes)
        <p class="text-lg text-gray-600 mb-6 text-center">Durasi: {{ $quiz->duration_minutes }} menit</p>
        @endif

        @if ($quiz->questions->isEmpty())
        <p class="text-center text-red-500">Quiz ini belum memiliki soal.</p>
        @else
        <div class="text-center">
            <p class="text-gray-800 mb-4">Jumlah soal: {{ $quiz->questions->count() }}</p>
            <a href="{{ route('quizzes.start', $quiz->id) }}"
                class="bg-green-600 text-white px-6 py-3 rounded-md hover:bg-green-700 text-lg transition duration-300">
                Mulai Quiz Sekarang
            </a>
        </div>
        @endif

        <div class="mt-8 text-center">
            <a href="{{ route('quizzes.index') }}" class="text-blue-600 hover:underline">Kembali ke Daftar Quiz</a>
        </div>
    </div>

    {{-- Vite JS --}}
    @vite('resources/js/app.js')
</body>

</html>