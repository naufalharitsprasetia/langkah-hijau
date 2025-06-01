<!DOCTYPE html>
<html lang="id" x-data="{ darkMode: localStorage.getItem('darkMode') === 'true' }"
    x-init="$watch('darkMode', val => localStorage.setItem('darkMode', val))" :class="{ 'dark': darkMode }">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eco-Quiz - {{ $quiz->title }}</title>
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
                        // Menggunakan hijautua dan hijaumuda dari tema hasil quiz
                        hijautua: '#0D9488',
                        hijaumuda: '#34D399',
                    }
                }
            }
        }
    </script>
    <style>
        /* Gaya untuk efek dimmed saat pertanyaan sudah dijawab */
        .question-dimmed-answered {
            opacity: 0.7;
            /* Sedikit transparan */
            transition: opacity 0.3s ease;
            /* Transisi halus */
        }

        /* Gaya untuk pertanyaan yang sedang aktif/belum dijawab */
        .question-active {
            opacity: 1;
            /* Sepenuhnya terlihat */
            transition: opacity 0.3s ease;
            /* Transisi halus */
        }

        /* Gaya untuk efek scaling pada opsi jawaban saat hover */
        .scale-option {
            transition: all 0.3s ease;
        }

        .scale-option:hover {
            transform: scale(1.02);
            /* Sedikit scaling saat hover */
        }

        /* Gaya untuk lingkaran nomor pertanyaan */
        .question-number-circle {
            flex-shrink-0;
            width: 2.25rem;
            /* Ukuran sedikit lebih besar */
            height: 2.25rem;
            /* Ukuran sedikit lebih besar */
            border-radius: 9999px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.875rem;
            font-weight: 700;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        /* Gaya untuk glow effect pada container utama */
        #container {
            position: relative;
            z-index: 10;
        }

        /* Gaya untuk simulasi blur dan gradient seperti di layout hasil quiz */
        .glow-effect {
            position: absolute;
            width: 80%;
            height: 80%;
            /* Mengatur ukuran glow agar terlihat */
            background: radial-gradient(circle at center, var(--tw-gradient-stops));
            /* Menggunakan radial gradient */
            opacity: 0.2;
            /* Menyesuaikan opacity */
            filter: blur(80px);
            /* Menyesuaikan blur */
            border-radius: 50%;
            /* Membuat bentuk lingkaran */
            z-index: -1;
            /* Di belakang konten */
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            /* Posisi di tengah */
        }

        /* Posisi glow disesuaikan untuk bagian atas */
        .glow-top {
            background-image: linear-gradient(to bottom right, #a0ffbc, #46ff21);
            top: -20%;
            left: -20%;
            width: 60%;
            height: 60%;
            transform: translate(0, 0);
            /* Reset transform */
            filter: blur(100px);
            opacity: 0.25;
        }

        /* Posisi glow disesuaikan untuk bagian bawah */
        .glow-bottom {
            background-image: linear-gradient(to top left, #a0ffbc, #46ff21);
            bottom: -20%;
            right: -20%;
            width: 60%;
            height: 60%;
            transform: translate(0, 0);
            /* Reset transform */
            filter: blur(100px);
            opacity: 0.25;
        }
    </style>
</head>

<body class="bg-gray-50 dark:bg-gray-900 transition-colors duration-300">
    {{-- Meneruskan quiz ID ke Alpine data untuk localStorage key --}}
    <div x-data="quizApp({{ $questions }}, {{ $quiz->id }})" class="min-h-screen relative overflow-hidden">
        {{-- Glow effect di atas --}}
        <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80"
            aria-hidden="true">
            <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#46ff21] to-[#a0ffbc] opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]"
                style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%);">
            </div>
        </div>

        <header class="bg-white dark:bg-gray-800 shadow-sm border-b border-gray-200 dark:border-gray-700">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-16">
                    <div class="flex items-center space-x-4">
                        <div class="w-10 h-10 bg-hijautua rounded-full flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-lg font-semibold text-gray-900 dark:text-white">
                                {{ $user->name ?? 'Pengguna' }}</h1>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Eco-Quiz</p>
                        </div>
                    </div>

                    <button @click="darkMode = !darkMode"
                        class="p-2 rounded-lg bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors">
                        <svg x-show="!darkMode" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
                    <div class="bg-hijautua h-2 rounded-full transition-all duration-300"
                        :style="`width: ${(Object.keys(answers).length / questions.length) * 100}%`"></div>
                </div>
            </div>

            {{-- Form untuk submit jawaban, sekarang menggunakan Alpine.js submitQuiz() --}}
            <form @submit.prevent="submitQuiz" action="{{ route('quizzes.submit', $quiz->id) }}" method="POST"
                class="space-y-8">
                @csrf

                <template x-for="(question, index) in questions" :key="question.id">
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700 p-6 transition-all duration-300"
                        :class="{
                            'question-dimmed-answered': answers[question.id],
                            'question-active': !answers[question.id],
                            'ring-2 ring-hijautua dark:ring-hijaumuda': !answers[question.id],
                            'bg-green-50 dark:bg-green-900/10 border-green-200 dark:border-green-800': answers[question
                                .id]
                        }" :id="`question-${question.id}`" x-transition.opacity.duration.300>

                        <div class="flex items-start space-x-4 mb-6">
                            <div class="question-number-circle" :class="{
                                    'bg-green-500 text-white': answers[question.id],
                                    'bg-hijautua text-white': !answers[question.id],
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
                            </div>
                        </div>

                        <div class="space-y-3">
                            <template x-for="option in question.options" :key="option.id">
                                <label
                                    class="cursor-pointer scale-option flex items-center p-3 rounded-lg border dark:border-gray-700 transition-all duration-200"
                                    :class="{
                                        'bg-primary-50 dark:bg-gray-900 border-hijautua dark:border-hijaumuda': answers[
                                            question
                                            .id] == option.id,
                                        'bg-white dark:bg-gray-800 border-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700': answers[
                                            question.id] != option.id
                                    }">
                                    <input type="radio" :name="`question_${question.id}`" :value="option.id"
                                        @change="setAnswer(question.id, option.id); $nextTick(() => { scrollToNextUnanswered(question.id); })"
                                        :checked="answers[question.id] == option.id" class="hidden">
                                    <div class="w-5 h-5 rounded-full border-2 flex items-center justify-center mr-3 transition-colors duration-200"
                                        :class="{
                                            'border-hijautua bg-hijautua': answers[question.id] == option.id,
                                            'border-gray-400 dark:border-gray-600 bg-white dark:bg-gray-800': answers[
                                                question.id] != option.id
                                        }">
                                        <svg x-show="answers[question.id] == option.id" class="w-3 h-3 text-white"
                                            fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                    <span class="text-base text-gray-800 dark:text-gray-200"
                                        x-text="option.text"></span>
                                </label>
                            </template>
                        </div>
                    </div>
                </template>

                <div class="flex justify-center items-center pt-6">
                    <button type="submit" x-show="Object.keys(answers).length === questions.length"
                        :disabled="Object.keys(answers).length !== questions.length"
                        :class="{ 'opacity-50 cursor-not-allowed': Object.keys(answers).length !== questions.length }"
                        class="px-8 py-4 bg-hijautua text-white rounded-xl shadow-lg hover:bg-hijaumuda focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-hijautua transition-all duration-300 text-xl font-bold">
                        Selesai Quiz
                    </button>
                </div>
            </form>
        </div>

        {{-- Glow effect di bawah --}}
        <div class="absolute inset-x-0 top-[calc(100%-40rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-78rem)]"
            aria-hidden="true">
            <div class="relative left-[calc(50%+3rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 bg-gradient-to-tr from-[#46ff21] to-[#a0ffbc] opacity-30 sm:left-[calc(50%+36rem)] sm:w-[72.1875rem]"
                style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
            </div>
        </div>
    </div>

    <script>
        function quizApp(initialQuestions, quizId) { // Menerima quizId sebagai parameter
            return {
                answers: {},
                questions: initialQuestions,
                quizId: quizId, // Simpan quizId di data Alpine
                currentQuestion: initialQuestions[0] ? initialQuestions[0].id : null,

                init() {
                    // Gunakan quizId untuk key localStorage yang unik per quiz
                    const savedAnswers = localStorage.getItem(`quiz_${this.quizId}_answers`);
                    if (savedAnswers) {
                        try {
                            this.answers = JSON.parse(savedAnswers);
                        } catch (e) {
                            console.error("Error parsing saved answers from localStorage:", e);
                            this.answers = {}; // Reset jika ada error parsing
                        }
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
                    localStorage.setItem(`quiz_${this.quizId}_answers`, JSON.stringify(this.answers));
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

                    if (nextUnansweredQuestion) {
                        const element = document.getElementById(`question-${nextUnansweredQuestion.id}`);
                        if (element) {
                            element.scrollIntoView({
                                behavior: 'smooth',
                                block: 'start'
                            });
                        }
                    } else if (Object.keys(this.answers).length === this.questions.length) {
                        // Ini adalah fitur auto-scroll ke tombol submit
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
                    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                    fetch(form.action, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': csrfToken
                            },
                            body: JSON.stringify({
                                answers: formattedAnswers
                            })
                        })
                        .then(response => {
                            if (!response.ok) {
                                return response.json().then(err => Promise.reject(err));
                            }
                            return response.json();
                        })
                        .then(data => {
                            if (data.redirect) {
                                // Bersihkan localStorage setelah berhasil submit untuk quiz ini
                                localStorage.removeItem(`quiz_${this.quizId}_answers`);
                                window.location.href = data.redirect;
                            } else if (data.errors) {
                                // Ini bisa terjadi jika ada validasi dari backend yang terlewat di frontend
                                alert('Terjadi kesalahan: ' + JSON.stringify(data.errors));
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            let errorMessage = 'Terjadi kesalahan saat mengirim quiz. Silakan coba lagi.';

                            if (error instanceof TypeError) {
                                errorMessage = "Terjadi masalah koneksi atau server tidak merespons.";
                            } else if (error.errors) { // Validasi Laravel (422 Unprocessable Entity)
                                const validationErrors = Object.values(error.errors).flat().join('\n');
                                errorMessage = 'Validasi gagal:\n' + validationErrors;
                            } else if (error.message) { // Pesan error dari server (catch di controller)
                                errorMessage = error.message; // Hanya tampilkan pesan dari server jika ada
                            }

                            alert(errorMessage);
                        });

                }
            }
        }
    </script>
</body>

</html>