<x-layout :title="$title" :active="$active">

    {{-- tombol kembali --}}
    <div class="mb-6 md:mb-8">
        <a href="{{ route('challenges.index') }}"
            class="inline-flex items-center text-sm font-medium text-gray-600 dark:text-gray-200 hover:text-gray-900 dark:hover:text-gray-100 transition-colors duration-150 ease-in-out group">
            <svg xmlns="http://www.w3.org/2000/svg"
                class="h-5 w-5 mr-2 transform transition-transform duration-150 ease-in-out group-hover:-translate-x-1"
                fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Kembali
        </a>
        <h3 class="font-bold text-gray-800 dark:text-white mt-2">
            <span class="text-gray-500 font-normal">Challenge /</span> {{ $challenge->badge->icon }} {{
            $challenge->title
            }}
        </h3>
    </div>

    {{-- content utama --}}
    <div class="container mx-auto px-4 py-8">
        @if (session()->has('success'))
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            <div class="alert alert-success col-lg-12 mt-4" role="alert">
                {{ session('success') }}
            </div>
        </div>
        @endif
        @if ($errors->any())
        <div class="mx-auto max-w-7xl">
            <div class="alert alert-error col-lg-12 mt-4" role="alert">
                @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
                @endforeach
            </div>
        </div>
        @endif
        <div class="max-w-3xl mx-auto bg-white dark:bg-zinc-900 rounded-xl shadow-xl overflow-hidden">
            <div>
                <img class="w-full h-64 md:h-96 object-cover"
                    src="{{ asset('img/challenges') }}/{{ $challenge->image }}" alt="Gambar {{ $challenge->title }}">
            </div>

            <div class="p-6 md:p-8">
                <h1 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-3">
                    {{ $challenge->badge->icon }} {{ $challenge->title }}
                </h1>

                <div class="flex flex-wrap gap-x-6 gap-y-2 items-center text-md text-gray-600 dark:text-gray-300 mb-6">
                    <span class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1.5 text-indigo-500" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <span class="font-medium">{{ $challenge->duration_days }} Hari</span>
                    </span>
                    <span class="flex items-center">
                        <span class="font-medium text-hijautua dark:text-hijaumuda"><i
                                class="fa-solid fa-star me-1"></i> {{ $challenge->green_points }}
                            Poin Bonus
                            Penyelesaian</span>
                    </span>
                    <span class="flex items-center bg-white dark:bg-zinc-900 px-2 py-1 rounded-full">
                        <span class="text-xl mr-1.5">{{ $challenge->badge->icon }}</span>
                        <span class="font-medium text-sm">{{ $challenge->badge->badge }}</span>
                    </span>
                </div>

                <div class="prose prose-indigo max-w-none text-gray-600 dark:text-gray-300 leading-relaxed">
                    {!! nl2br(e($challenge->description)) !!}
                </div>

                {{-- checklist --}}
                @if (!isset($challenge->challenge_actions))
                <div class="mb-6">
                    <h3 class="text-xl font-semibold text-gray-700 mb-3 mt-7">Apa Saja yang Akan Dilakukan?</h3>
                    <ul class="list-disc list-inside pl-2 space-y-1 text-gray-700">
                        @foreach ($challenge->challenge_actions as $item)
                        <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                {{-- business logic untuk status progess --}}
                <div class="mt-8 pt-6 border-t border-gray-200">
                    @auth
                    @if ($canParticipate == false && $completed == false)
                    <div class="text-center">
                        <p class="text-lg font-semibold text-blue-600 mb-2">Anda sedang mengikuti tantangan ini!</p>
                        <a href="{{ route('challenges.progress', $participation->id) }}"
                            class="cursor-pointer inline-block bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-6 rounded-lg transition duration-150">
                            Lihat Progres Saya
                        </a>
                    </div>

                    @elseif ($canParticipate == false && $completed == true)
                    <div class="text-center">
                        <p class="text-lg font-semibold text-green-600">Selamat! Anda telah menyelesaikan tantangan ini.
                        </p>
                        <p class="text-md text-gray-700">Anda mendapatkan badge: {{ $challenge->badge->icon }} {{
                            $challenge->badge->badge }}</p>
                    </div>

                    @elseif ($canParticipate == true)
                    <form action="{{ route('challenges.participate', $challenge->id) }}" method="POST"
                        class="text-center">
                        @csrf
                        <button type="submit"
                            class="cursor-pointer bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-8 rounded-lg text-lg shadow-md hover:shadow-lg transition duration-150 transform hover:scale-105">
                            Mulai Tantangan Ini!
                        </button>
                    </form>
                    @endif
                    @else
                    <div class="text-center">
                        <p class="text-lg text-gray-700 mb-2">Ingin mencoba tantangan ini?</p>
                        <a href="{{ route('auth.login') }}"
                            class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-6 rounded-lg transition duration-150">
                            Login untuk Berpartisipasi
                        </a>
                        <p class="mt-2 text-sm text-gray-500">
                            Belum punya akun? <a href="{{ route('auth.signup') }}"
                                class="text-indigo-600 hover:underline cursor-pointer">Daftar di sini</a>.
                        </p>
                    </div>
                    @endauth
                </div>

            </div>
        </div>


    </div>
</x-layout>