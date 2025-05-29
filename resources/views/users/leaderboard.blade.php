@php
$now = \Carbon\Carbon::now();
$nextSchedule = \Carbon\Carbon::now()->next(\Carbon\Carbon::SUNDAY)->setTime(0, 0);
$diffInDays = round($now->diffInDays($nextSchedule));
@endphp
<x-sidebar.layout :title="$title" :active="$active">
    <!-- Konten Utama -->
    <div class="flex flex-col w-full">
        <main class="w-full">
            <div class="mx-auto py-6 sm:px-6 lg:px-8">
                <!-- Isi Halaman -->
                <h2 class="text-2xl font-semibold text-zinc-900 dark:text-white">LeaderBoard</h2>
                <br>
                {{-- v0 --}}
                <!-- League Badges -->
                <div class="px-4 py-6">
                    <div class="flex justify-center space-x-2 mb-6 pb-2">
                        @foreach($tiers as $tier)
                        {{-- hidden state / sr-only --}}
                        <div class="bg-yellow-400 ring-yellow-400 hidden"></div>
                        <div class="bg-blue-500 ring-blue-500 hidden"></div>
                        <div class="bg-amber-600 ring-amber-600 hidden"></div>
                        <div class="bg-green-400 ring-green-400 hidden"></div>
                        {{-- hidden state / sr-only --}}
                        <div class="flex-shrink-0">
                            <div
                                class="w-12 h-14 md:w-20 md:h-24 flex items-center justify-center bg-{{ $tier->color }} rounded-t-lg rounded-b-sm relative {{ $tier->urutan == auth()->user()->tier->urutan ? 'ring-2 ring-offset-2 dark:ring-offset-gray-800' : '' }} ring-{{ $badge->color }} transition-all duration-200">
                                <span class="md:text-2xl">{{ $tier->icon }}</span>
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
                        <p class="text-yellow-500 font-semibold text-sm">{{ $diffInDays }} hari lagi</p>
                    </div>
                </div>

                <!-- Leaderboard -->
                <div class="px-4 pb-6">
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
                                    class="text-lg font-bold {{ $user->username == auth()->user()->username ? 'text-blue-600 dark:text-blue-400' : 'text-gray-700 dark:text-gray-300' }}">
                                    {{ $user->rank }}
                                </span>
                            </div>

                            <!-- Avatar -->
                            <div class="relative mx-3">
                                <div
                                    class="w-12 h-12 rounded-full bg-gradient-to-br from-blue-400 to-purple-500 flex items-center justify-center text-xl">
                                    🙂
                                </div>
                                <div
                                    class="absolute -bottom-1 -right-1 w-4 h-4 bg-green-500 rounded-full border-2 border-white dark:border-gray-800">
                                </div>
                            </div>

                            <!-- User Info -->
                            <div class="flex-1 min-w-0">
                                <div class="flex items-center space-x-2">
                                    <h3 class="font-semibold text-gray-900 dark:text-white truncate">{{
                                        $user->name }}
                                    </h3>
                                    @if($user['badge'])
                                    <span
                                        class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-orange-100 text-orange-800 dark:bg-orange-900/30 dark:text-orange-300">
                                        🏆 {{ $user['badge'] }}
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <!-- XP -->
                            <div class="text-right">
                                <span class="text-lg font-bold text-gray-700 dark:text-gray-300">{{ $user->green_points
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
                                    class="text-lg font-bold {{ $user->username == auth()->user()->username ? 'text-blue-600 dark:text-blue-400' : 'text-gray-700 dark:text-gray-300' }}">
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
                                    <h3 class="font-semibold text-gray-900 dark:text-white truncate">{{
                                        $user->name }}
                                    </h3>
                                    @if($user['badge'])
                                    <span
                                        class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-orange-100 text-orange-800 dark:bg-orange-900/30 dark:text-orange-300">
                                        🏆 {{ $user['badge'] }}
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <!-- XP -->
                            <div class="text-right">
                                <span class="text-lg font-bold text-gray-700 dark:text-gray-300">{{ $user->green_points
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
        <div class="flex justify-center items-center space-x-8">
            <p class="space-y-1 text-zinc-900 dark:text-white">
                Jadilah yang teratas ! Raih tambahan <span class="text-hijautua dark:text-hijaumuda">Green Points</span>
                dengan :
            </p>
            <a href="#"
                class="flex flex-col items-center space-y-1 text-gray-400 dark:hover:text-hijaumuda hover:text-hijautua transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7V3a2 2 0 012-2h4a2 2 0 012 2v4"></path>
                </svg>
                <span class="text-xs">Quiz</span>
            </a>
            <a href="{{ route('challenges.index') }}"
                class="flex flex-col items-center space-y-1 text-gray-400 dark:hover:text-hijaumuda hover:text-hijautua transition-colors">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                        clip-rule="evenodd"></path>
                </svg>
                <span class="text-xs">Challenges</span>
            </a>
            <a href="{{ route('post.index') }}"
                class="flex flex-col items-center space-y-1 text-gray-400 dark:hover:text-hijaumuda hover:text-hijautua transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
                <span class="text-xs">Edu-Zone</span>
            </a>
        </div>
    </div>
</x-sidebar.layout>