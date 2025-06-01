@php
$now = \Carbon\Carbon::now();
$nextSchedule = \Carbon\Carbon::now()->next(\Carbon\Carbon::SUNDAY)->setTime(0, 0);
$diffInDays = round($now->diffInDays($nextSchedule));
$diffInHours = ceil($now->diffInRealHours($nextSchedule));
@endphp
<x-sidebar.layout :title="$title" :active="$active">
    <!-- Konten Utama -->
    <div class="flex flex-col w-full">
        <main class="w-full">
            <div class="mx-auto py-6 sm:px-6 lg:px-8">
                <!-- Isi Halaman -->
                <h2 class="text-2xl font-semibold text-zinc-900 dark:text-white">Leaderboard</h2>
                <br>
                {{-- v0 --}}
                <!-- League Badges -->
                <div class="px-4 py-6">
                    <div class="flex justify-center space-x-2 mb-6 pb-2">
                        @foreach($tiers as $tier)
                        {{-- hidden state / sr-only --}}
                        <div class="bg-yellow-500 ring-yellow-500 hidden"></div>
                        <div class="bg-blue-500 ring-blue-500 hidden"></div>
                        <div class="bg-lime-300 ring-lime-300 hidden"></div>
                        <div class="bg-green-500 ring-green-500 hidden"></div>
                        {{-- hidden state / sr-only --}}
                        <div class="flex-shrink-0">
                            <div
                                class="w-12 h-14 md:w-20 md:h-24 flex items-center justify-center bg-{{ $tier->color }} rounded-t-lg rounded-b-sm relative {{ $tier->urutan == auth()->user()->tier->urutan ? 'ring-2 ring-offset-2 dark:ring-offset-gray-800' : '' }} ring-{{ $tier->color }} transition-all duration-200">
                                <span class="md:text-2xl p-1 bg-white rounded-full">{{ $tier->icon }}</span>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <!-- League Title -->
                    <div class="text-center mb-6">
                        <h1 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">Tier {{
                            auth()->user()->tier->name }} <a href="{{ route('user.tierInfo') }}"
                                class="cursor-pointer text-base text-hijautua hover:text-hijaumuda"
                                title="Informasi Tentang Tier"><i class="fa-solid fa-circle-info"></i></a>
                        </h1>
                        <p class="text-gray-600 dark:text-gray-400 text-sm mb-1">{{ count($topUsers) }} teratas akan
                            naik ke Tier berikutnya
                        </p>
                        <p class="text-yellow-500 font-semibold text-sm">
                            {{ $diffInDays == 0 ? "$diffInHours jam lagi" : "$diffInDays hari lagi" }}
                        </p>
                    </div>
                </div>

                <!-- Leaderboard -->
                <div class="sm:px-4 pb-6">
                    <!-- User List -->
                    <div class="space-y-3">
                        {{-- loop top user --}}
                        @foreach($topUsers as $user)
                        @if($user->green_points > 500)
                        <a href="{{ route('user.profile', $user->username) }}"
                            class="cursor-pointer flex items-center p-3 rounded-xl transition-all duration-200 hover:bg-gray-200 dark:hover:bg-gray-600/50
                            {{  $user->username == auth()->user()->username  ? 'bg-blue-100 dark:bg-blue-900/30 border border-blue-200 dark:border-blue-800' : '' }}">
                            <!-- Rank -->
                            <div class="w-8 text-center">
                                <span
                                    class="sm:text-lg font-bold {{ $user->username == auth()->user()->username ? 'text-blue-600 dark:text-blue-400' : 'text-gray-700 dark:text-gray-300' }}">
                                    {{ $user->rank }}
                                </span>
                            </div>

                            <!-- Avatar -->
                            <div class="relative mx-3">
                                <div
                                    class="w-8 h-8 sm:w-12 sm:h-12 rounded-full bg-gradient-to-br from-blue-400 to-purple-500 flex items-center justify-center text-xl">
                                    🙂
                                </div>
                                <div
                                    class="absolute -bottom-1 -right-1 w-4 h-4 bg-green-500 rounded-full border-2 border-white dark:border-gray-800">
                                </div>
                            </div>

                            <!-- User Info -->
                            <div class="flex-1 min-w-0">
                                <div class="flex items-center space-x-2">
                                    <h3
                                        class="text-sm sm:text-base font-semibold text-gray-900 dark:text-white truncate">
                                        {{
                                        $user->name }}
                                    </h3>
                                </div>
                            </div>

                            <!-- XP -->
                            <div class="text-right">
                                <span class="text-sm sm:text-lg font-bold text-gray-700 dark:text-gray-300">{{
                                    $user->green_points
                                    }}
                                    Points</span>
                            </div>
                        </a>
                        {{-- tampilkan user --}}
                        @endif
                        @endforeach
                        <!-- Promotion Zone Header -->
                        <div class="flex items-center justify-center mb-4">
                            <div
                                class="flex items-center space-x-2 bg-green-100 dark:bg-green-900/30 px-4 py-2 rounded-full">
                                <svg class="w-4 h-4 text-green-600 dark:text-green-400" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-green-700 dark:text-green-300 font-semibold text-sm">ZONA
                                    KENAIKAN</span>
                                <svg class="w-4 h-4 text-green-600 dark:text-green-400" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                        </div>
                        {{-- loop users --}}
                        @foreach($users as $user)
                        <a href="{{ route('user.profile', $user->username) }}" class="cursor-pointer  flex items-center p-3 rounded-xl transition-all duration-200 hover:bg-gray-50
                            dark:hover:bg-gray-700/50 {{ $user->username == auth()->user()->username ? 'bg-blue-100
                            dark:bg-blue-900/30 border border-blue-200 dark:border-blue-800' : '' }}">
                            <!-- Rank -->
                            <div class="w-8 text-center">
                                <span
                                    class="sm:text-lg font-bold {{ $user->username == auth()->user()->username ? 'text-blue-600 dark:text-blue-400' : 'text-gray-700 dark:text-gray-300' }}">
                                    {{ $user->rank }}
                                </span>
                            </div>

                            <!-- Avatar -->
                            <div class="relative mx-3">
                                <div
                                    class="w-12 h-12 rounded-full bg-gradient-to-br from-blue-400 to-purple-500 flex items-center justify-center text-xl">
                                    👨
                                </div>
                                <div
                                    class="absolute -bottom-1 -right-1 w-4 h-4 bg-green-500 rounded-full border-2 border-white dark:border-gray-800">
                                </div>
                            </div>

                            <!-- User Info -->
                            <div class="flex-1 min-w-0">
                                <div class="flex items-center space-x-2">
                                    <h3
                                        class="text-sm sm:text-base font-semibold text-gray-900 dark:text-white truncate">
                                        {{
                                        $user->name }}
                                    </h3>
                                </div>
                            </div>

                            <!-- XP -->
                            <div class="text-right">
                                <span class="text-sm sm:text-lg font-bold text-gray-700 dark:text-gray-300">{{
                                    $user->green_points
                                    }}
                                    Points</span>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>

        </main>
    </div>
    <!-- Bottom Navigation (Optional) -->
    <div
        class="sticky bottom-0 bg-white dark:bg-gray-800 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 p-4">
        <div class="flex flex-col justify-center items-center space-x-8">
            <p class="text-center mx-auto space-y-1 text-zinc-900 dark:text-white mb-2">
                Jadilah yang teratas ! Raih tambahan <span class="text-hijautua dark:text-hijaumuda">Green Points</span>
                dengan :
            </p>
            <div class="space-x-2 gap-2 flex items-center justify-center">
                <a href="{{ route('quizzes.index') }}"
                    class="flex flex-col justify-center items-center space-y-1 text-gray-400 dark:hover:text-hijaumuda hover:text-hijautua transition-colors">
                    <i class="fa-solid fa-earth-americas"></i>
                    <span class="text-xs">Eco-Quiz</span>
                </a>
                <a href="{{ route('challenges.index') }}"
                    class="flex flex-col justify-center items-center space-y-1 text-gray-400 dark:hover:text-hijaumuda hover:text-hijautua transition-colors">
                    <i class="fa-solid fa-trophy"></i>
                    <span class="text-xs">Tantangan Hijau</span>
                </a>
                <a href="{{ route('event.index') }}"
                    class="flex flex-col justify-center items-center space-y-1 text-gray-400 dark:hover:text-hijaumuda hover:text-hijautua transition-colors">
                    <i class="fa-solid fa-calendar-minus"></i>
                    <span class="text-xs">Green Event</span>
                </a>
            </div>
        </div>
    </div>
</x-sidebar.layout>