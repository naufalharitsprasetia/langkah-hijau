<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Quiz - {{ $quiz->title }}</title>
    {{-- Vite CSS --}}
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 p-8">
    <div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-3xl font-bold mb-4 text-center text-blue-700">Hasil Tes Anda</h1>
        <h2 class="text-2xl font-semibold mb-6 text-center text-gray-800">{{ $quiz->title }}</h2>

        {{-- Menampilkan Total Skor --}}
        <p class="text-xl font-bold text-center mb-6">Total Poin Anda: <span
                class="text-green-600">{{ $totalScore }}</span></p>
        <p class="text-md text-center mb-6">Jumlah soal dijawab: {{ $userAnswers->count() }} dari {{ $totalQuestions }}
        </p>

        <h3 class="text-xl font-semibold mb-4 text-gray-800">Detail Jawaban Anda:</h3>
        <div class="space-y-6">
            @foreach ($userAnswers as $userAnswer)
                <div class="border-b pb-4">
                    <p class="font-semibold text-lg mb-2">{{ $loop->iteration }}.
                        {{ $userAnswer->question->question_text }}</p>
                    <p class="text-gray-700">
                        Anda memilih: <span
                            class="font-medium text-blue-700">{{ $userAnswer->selectedOption->option_text ?? 'Tidak memilih opsi' }}</span>
                        ({{ $userAnswer->selectedOption->points ?? 0 }} poin)
                    </p>
                    {{-- Opsional: Tampilkan semua opsi dengan poinnya jika ingin user bisa melihat --}}
                    {{-- <ul class="list-disc list-inside text-sm text-gray-600 mt-2">
                        @foreach ($userAnswer->question->options as $option)
                            <li>{{ $option->option_text }} ({{ $option->points }} poin)</li>
                        @endforeach
                    </ul> --}}
                </div>
            @endforeach
        </div>

        <div class="mt-8 text-center">
            <a href="{{ route('quizzes.index') }}"
                class="bg-blue-600 text-white px-6 py-3 rounded-md hover:bg-blue-700 text-lg transition duration-300">
                Kembali ke Daftar Tes
            </a>
        </div>
    </div>

    {{-- Vite JS --}}
    @vite('resources/js/app.js')
</body>

</html>
