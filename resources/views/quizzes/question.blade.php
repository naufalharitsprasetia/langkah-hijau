<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soal Quiz - {{ $quiz->title }}</title>
    {{-- Vite CSS --}}
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 p-8">
    <div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-4 text-center text-blue-700">{{ $quiz->title }}</h1>
        <p class="text-lg text-gray-700 mb-6 text-center">Soal ke-{{ $questionNumber }} dari
            {{ $quiz->questions->count() }}</p>

        <form action="{{ route('quizzes.submit_answer', ['quiz' => $quiz->id, 'question' => $question->id]) }}"
            method="POST">
            @csrf

            <div class="mb-6">
                <p class="text-xl font-semibold mb-4 text-gray-900">{{ $question->question_text }}</p>
                <div class="space-y-3">
                    @foreach ($question->options as $option)
                        <label
                            class="block cursor-pointer bg-gray-50 p-3 rounded-md border border-gray-200 hover:bg-gray-100 transition duration-200">
                            <input type="radio" name="answer_option_id" value="{{ $option->id }}"
                                class="mr-3 align-middle" required>
                            <span class="text-gray-800 text-lg">{{ $option->option_text }}</span>
                            {{-- Anda bisa menampilkan poin di sini untuk debug atau informasi --}}
                            {{-- <span class="text-gray-500 text-sm"> ({{ $option->points }} poin)</span> --}}
                        </label>
                    @endforeach
                </div>
            </div>

            @error('answer_option_id')
                {{-- Perbarui error message name --}}
                <p class="text-red-500 text-sm mb-4">{{ $message }}</p>
            @enderror

            <div class="text-center mt-6">
                <button type="submit"
                    class="bg-blue-600 text-white px-6 py-3 rounded-md hover:bg-blue-700 text-lg transition duration-300">
                    Jawab dan Lanjut
                </button>
            </div>
        </form>
    </div>

    {{-- Vite JS --}}
    @vite('resources/js/app.js')
</body>

</html>
