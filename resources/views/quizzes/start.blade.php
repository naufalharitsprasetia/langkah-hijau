<!DOCTYPE html>
<html lang="id" x-data="{ darkMode: localStorage.getItem('darkMode') === 'true' }" x-init="$watch('darkMode', val => localStorage.setItem('darkMode', val))" :class="{ 'dark': darkMode }">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Psikologi - {{ $quiz->title }}</title>
    {{-- Tambahkan CSRF Token untuk request AJAX --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                        },
                        hijautua: '#0D9488', // Tambahkan warna ini jika belum ada di tailwind.config utama
                        hijaumuda: '#34D399', // Tambahkan warna ini jika belum ada di tailwind.config utama
                    }
                }
            }
        }
    </script>
    <style>
        .question-dimmed-answered {
            opacity: 0.7;
            transition: opacity 0.3s ease;
        }

        .question-active {
            opacity: 1;
            transition: opacity 0.3s ease;
        }

        .question-ring {
            box-shadow: 0 0 0 2px var(--primary-500);
        }

        .scale-option {
            transition: all 0.3s ease;
        }

        .scale-option:hover {
            transform: scale(1.1);
        }

        .question-number-circle {
            flex-shrink-0;
            width: 2rem;
            height: 2rem;
            border-radius: 9999px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.875rem;
            font-weight: 700;
            transition: background-color 0.3s ease, color 0.3s ease;
        }
    </style>
</head>

<body class="bg-gray-50 dark:bg-gray-900 transition-colors duration-300">
    <div x-data="quizApp({{ $questions }})" class="min-h-screen">
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
                                {{ $user->name ?? 'Pengguna' }}</h1>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Quiz Psikologi</p>
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
            <div class="mb-8">
                <div class="flex justify-between items-center mb-2">
                    <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Progress</span>
                    <span class="text-sm text-gray-500 dark:text-gray-400"
                        x-text="`${Object.keys(answers).length}/${questions.length}`"></span>
                </div>
                <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2">
                    <div class="bg-primary-500 h-2 rounded-full transition-all duration-300"
                        :style="`width: ${(Object.keys(answers).length / questions.length) * 100}%`"></div>
                </div>
            </div>

            <form @submit.prevent="submitQuiz" action="{{ route('quizzes.submit_answers', $quiz->id) }}" method="POST"
                class="space-y-8">
                @csrf

                <template x-for="(question, index) in questions" :key="question.id">
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6 transition-all duration-300"
                        :class="{
                            'question-dimmed-answered': answers[question.id],
                            'question-active': !answers[question.id],
                            'ring-2 ring-primary-500': !answers[question.id],
                            'bg-green-50 dark:bg-green-900/10 border-green-200 dark:border-green-800': answers[question
                                .id]
                        }"
                        :id="`question-${question.id}`" x-transition.opacity.duration.300>

                        <div class="flex items-start space-x-4 mb-6">
                            <div class="question-number-circle"
                                :class="{
                                    'bg-green-500 text-white': answers[question.id],
                                    'bg-primary-500 text-white': !answers[question.id],
                                }">
                                <span x-show="!answers[question.id]" x-text="index + 1"></span>
                                <svg x-show="answers[question.id]" class="w-4 h-4" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-2"
                                    x-text="question.text"></h3>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Pilih tingkat persetujuan Anda
                                    dengan pernyataan di atas</p>
                            </div>
                        </div>

                        <div class="space-y-4">
                            <div class="flex justify-between items-center px-4">
                                <span class="text-sm font-medium text-primary-600 dark:text-primary-400">Sangat
                                    Setuju</span>
                                <span class="text-sm font-medium text-purple-600 dark:text-purple-400">Sangat Tidak
                                    Setuju</span>
                            </div>

                            <div class="flex justify-between items-center px-4">
                                <template x-for="option in question.options" :key="option.id">
                                    {{-- Pastikan label membungkus input untuk interaksi yang lebih baik --}}
                                    <label class="cursor-pointer scale-option flex flex-col items-center">
                                        <input type="radio" :name="`question_${question.id}`" :value="option.id"
                                            @change="setAnswer(question.id, option.id); $nextTick(() => { scrollToNextUnanswered(question.id); })"
                                            :checked="answers[question.id] == option.id" class="hidden">
                                        {{-- Gunakan 'hidden' untuk sembunyikan asli, dan style div sebagai pengganti --}}
                                        <div class="w-8 h-8 sm:w-10 sm:h-10 rounded-full border-2 flex items-center justify-center transition-all duration-200"
                                            :class="{
                                                'border-primary-500 bg-primary-500': answers[question.id] == option
                                                    .id && option.points >= 5,
                                                'border-gray-400 bg-gray-400': answers[question.id] == option.id &&
                                                    option.points >= 3 && option.points <= 4,
                                                'border-purple-500 bg-purple-500': answers[question.id] == option.id &&
                                                    option.points <= 2,
                                                'border-primary-300 dark:border-primary-700 text-primary-600 dark:text-primary-400': answers[
                                                    question.id] != option.id && option.points >= 5,
                                                'border-gray-300 dark:border-gray-700 text-gray-600 dark:text-gray-400': answers[
                                                        question.id] != option.id && option.points >= 3 && option
                                                    .points <= 4,
                                                'border-purple-300 dark:border-purple-700 text-purple-600 dark:text-purple-400': answers[
                                                    question.id] != option.id && option.points <= 2,
                                                'hover:bg-primary-100 dark:hover:bg-primary-900/20': option.points >=
                                                    5 && answers[question.id] != option.id,
                                                'hover:bg-gray-100 dark:hover:bg-gray-900/20': option.points >= 3 &&
                                                    option.points <= 4 && answers[question.id] != option.id,
                                                'hover:bg-purple-100 dark:hover:bg-purple-900/20': option.points <= 2 &&
                                                    answers[question.id] != option.id,
                                            }">
                                            <svg x-show="answers[question.id] == option.id" class="w-4 h-4 text-white"
                                                fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </div>
                                    </label>
                                </template>
                            </div>

                            <div class="flex justify-between items-center px-4">
                                <template x-for="option in question.options" :key="option.id">
                                    <span class="text-xs text-gray-500 dark:text-gray-400 w-8 sm:w-10 text-center"
                                        x-text="option.points"></span>
                                </template>
                            </div>
                        </div>
                    </div>
                </template>

                <div class="flex justify-center items-center pt-6">
                    <button type="submit" x-show="Object.keys(answers).length === questions.length"
                        :disabled="Object.keys(answers).length !== questions.length"
                        :class="{ 'opacity-50 cursor-not-allowed': Object.keys(answers).length !== questions.length }"
                        class="px-6 py-3 bg-hijautua text-white rounded-lg hover:bg-hijautua-darken transition-colors text-lg font-semibold">
                        Selesai Quiz
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function quizApp(initialQuestions) {
            return {
                answers: {},
                questions: initialQuestions,
                currentQuestion: initialQuestions[0] ? initialQuestions[0].id : null,

                init() {
                    // Coba muat jawaban dari localStorage jika ada (untuk melanjutkan quiz yang belum selesai)
                    const savedAnswers = localStorage.getItem(`quiz_${this.questions[0].quiz_id}_answers`);
                    if (savedAnswers) {
                        this.answers = JSON.parse(savedAnswers);
                    }

                    this.$nextTick(() => {
                        this.scrollToNextUnanswered(null);
                    });
                    console.log('Initial questions:', this.questions);
                    console.log('Initial answers:', this.answers);
                },

                setAnswer(questionId, optionId) {
                    this.answers[questionId] = optionId;
                    // Simpan jawaban ke localStorage setiap kali ada perubahan
                    localStorage.setItem(`quiz_${this.questions[0].quiz_id}_answers`, JSON.stringify(this.answers));
                    this.$nextTick(() => {
                        this.scrollToNextUnanswered(questionId);
                    });
                },

                getQuestionState(questionId) {
                    return this.answers[questionId] ? 'answered' : 'unanswered';
                },

                scrollToNextUnanswered(lastAnsweredQuestionId = null) {
                    let nextUnansweredQuestion = null;
                    let startIndex = 0;

                    if (lastAnsweredQuestionId !== null) {
                        const lastAnsweredIndex = this.questions.findIndex(q => q.id === lastAnsweredQuestionId);
                        if (lastAnsweredIndex !== -1) {
                            startIndex = lastAnsweredIndex + 1;
                        }
                    }

                    for (let i = startIndex; i < this.questions.length; i++) {
                        if (!this.answers[this.questions[i].id]) {
                            nextUnansweredQuestion = this.questions[i];
                            break;
                        }
                    }

                    if (!nextUnansweredQuestion && Object.keys(this.answers).length < this.questions.length) {
                        nextUnansweredQuestion = this.questions.find(q => !this.answers[q.id]);
                    }

                    if (nextUnansweredQuestion) {
                        const element = document.getElementById(`question-${nextUnansweredQuestion.id}`);
                        if (element) {
                            element.scrollIntoView({
                                behavior: 'smooth',
                                block: 'start'
                            });
                        }
                    } else if (Object.keys(this.answers).length === this.questions.length) {
                        const submitButton = document.querySelector(
                            'button[type="submit"][x-show="Object.keys(answers).length === questions.length"]');
                        if (submitButton) {
                            submitButton.scrollIntoView({
                                behavior: 'smooth',
                                block: 'center'
                            });
                        }
                    }
                },

                submitQuiz() {
                    console.log('Isi this.answers sebelum diformat:', this.answers);

                    const formattedAnswers = Object.entries(this.answers).map(([questionId, optionId]) => ({
                        question_id: parseInt(questionId),
                        option_id: parseInt(optionId)
                    }));

                    console.log('Isi formattedAnswers yang akan dikirim:', formattedAnswers);

                    const form = this.$el;
                    // Ambil CSRF token dari meta tag
                    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');


                    fetch(form.action, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': csrfToken // Menggunakan CSRF token dari meta tag
                            },
                            body: JSON.stringify({
                                answers: formattedAnswers
                            })
                        })
                        .then(response => {
                            if (!response.ok) {
                                // Jika respons bukan 2xx (misal 422, 500), coba parse JSON error
                                return response.json().then(err => Promise.reject(err));
                            }
                            return response.json();
                        })
                        .then(data => {
                            if (data.redirect) {
                                // Bersihkan localStorage setelah berhasil submit
                                localStorage.removeItem(`quiz_${this.questions[0].quiz_id}_answers`);
                                window.location.href = data.redirect;
                            } else if (data.errors) {
                                alert('Terjadi kesalahan: ' + JSON.stringify(data.errors));
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            let errorMessage = 'Terjadi kesalahan saat mengirim quiz. Silakan coba lagi.';

                            // Handle berbagai jenis error
                            if (error instanceof TypeError) {
                                errorMessage = "Terjadi masalah koneksi atau server tidak merespons.";
                            } else if (error.errors) { // Validasi Laravel (422 Unprocessable Entity)
                                // Ambil pesan error dari Laravel Validator
                                const validationErrors = Object.values(error.errors).flat().join('\n');
                                errorMessage = 'Validasi gagal:\n' + validationErrors;
                            } else if (error.message) { // Pesan error dari server (catch di controller)
                                errorMessage += '\n' + error.message;
                            }

                            alert(errorMessage);
                        });

                }
            }
        }
    </script>
</body>

</html>
