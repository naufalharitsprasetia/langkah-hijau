<x-sidebar.layout :title="$title" :active="$active">
    <!-- Konten Utama -->
    <div class="flex flex-col w-full">
        <main class="w-full">
            <div class="mx-auto py-6 sm:px-6 lg:px-8">
                <!-- Isi Halaman -->
                <h2 class="text-2xl font-semibold text-zinc-900 dark:text-white">LeaderBoard</h2>
                <br>
                {{-- flow bite table --}}
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    No
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Green Points
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $loop->iteration }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $user->name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $user->green_points }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{-- end flow bite table --}}
                {{-- v0 --}}
                <!-- League Badges -->
                <div class="px-4 py-6">
                    <div class="flex justify-center space-x-2 mb-6 overflow-x-auto pb-2">
                        @php
                        $badges = [
                        ['color' => 'bg-amber-600', 'active' => false],
                        ['color' => 'bg-gray-400', 'active' => false],
                        ['color' => 'bg-yellow-400', 'active' => false],
                        ['color' => 'bg-blue-500', 'active' => true],
                        ['color' => 'bg-gray-300', 'active' => false],
                        ['color' => 'bg-gray-300', 'active' => false],
                        ['color' => 'bg-gray-300', 'active' => false],
                        ];
                        @endphp

                        @foreach($badges as $badge)
                        <div class="flex-shrink-0">
                            <div
                                class="w-12 h-14 {{ $badge['color'] }} rounded-t-lg rounded-b-sm relative {{ $badge['active'] ? 'ring-2 ring-blue-400 ring-offset-2 dark:ring-offset-gray-800' : '' }} transition-all duration-200">
                                @if($badge['active'])
                                <div
                                    class="absolute -top-1 -right-1 w-4 h-4 bg-blue-500 rounded-full flex items-center justify-center">
                                    <svg class="w-2 h-2 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                @endif
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <!-- League Title -->
                    <div class="text-center mb-6">
                        <h1 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">Liga Safir</h1>
                        <p class="text-gray-600 dark:text-gray-400 text-sm mb-1">8 teratas akan maju ke liga berikutnya
                        </p>
                        <p class="text-yellow-500 font-semibold text-sm">5 hari</p>
                    </div>
                </div>

                <!-- Leaderboard -->
                <div class="px-4 pb-6">
                    @php
                    $users = [
                    ['rank' => 1, 'name' => 'Fulan Ahmad', 'xp' => 13, 'avatar' => '👩', 'badge' => null,
                    'zone' => 'promotion'],
                    ['rank' => 2, 'name' => 'Ahmad Fulan', 'xp' => 13, 'avatar' => '👩', 'badge' => null,
                    'zone' => 'promotion'],
                    ['rank' => 3, 'name' => 'Fulan Ahmad', 'xp' => 13, 'avatar' => '👩', 'badge' => null,
                    'zone' => 'promotion'],
                    ['rank' => 4, 'name' => 'Fulan Ahmad', 'xp' => 13, 'avatar' => '👩', 'badge' => null,
                    'zone' => 'promotion'],
                    ['rank' => 5, 'name' => 'Fulan Ahmad', 'xp' => 13, 'avatar' => '👩', 'badge' => null,
                    'zone' => 'promotion'],
                    ['rank' => 6, 'name' => 'Fulan Ahmad', 'xp' => 13, 'avatar' => '👩', 'badge' => null,
                    'zone' => 'promotion'],
                    ['rank' => 7, 'name' => 'Fulan Ahmad', 'xp' => 13, 'avatar' => '👩', 'badge' => null,
                    'zone' => 'promotion'],
                    ['rank' => 8, 'name' => 'Fulan Ahmad', 'xp' => 13, 'avatar' => '👩', 'badge' => '2+ tahun',
                    'zone' => 'promotion'],
                    ['rank' => 9, 'name' => 'Linh', 'xp' => 12, 'avatar' => '🕐', 'badge' => null, 'zone' =>
                    'promotion'],
                    ['rank' => 10, 'name' => 'Bappy 01999880666', 'xp' => 12, 'avatar' => '👨', 'badge' => null, 'zone'
                    => 'promotion'],
                    ['rank' => 11, 'name' => 'Chauncey', 'xp' => 12, 'avatar' => '👨', 'badge' => null, 'zone' =>
                    'promotion'],
                    ['rank' => 12, 'name' => 'Лидия', 'xp' => 10, 'avatar' => '👩', 'badge' => null, 'zone' =>
                    'promotion'],
                    ['rank' => 13, 'name' => 'めい', 'xp' => 10, 'avatar' => '💜', 'badge' => null, 'zone' =>
                    'promotion'],
                    ['rank' => 14, 'name' => 'Leah White', 'xp' => 10, 'avatar' => '👩', 'badge' => null, 'zone' =>
                    'promotion'],
                    ['rank' => 15, 'name' => 'Tommy', 'xp' => 10, 'avatar' => '👨', 'badge' => '1+ tahun', 'zone' =>
                    'promotion'],
                    ['rank' => 16, 'name' => 'jovanny', 'xp' => 8, 'avatar' => '👨', 'badge' => null, 'zone' => 'safe'],
                    ['rank' => 17, 'name' => 'Сергей', 'xp' => 6, 'avatar' => '👨', 'badge' => null, 'zone' =>
                    'demotion'],
                    ['rank' => 18, 'name' => 'Pram', 'xp' => 5, 'avatar' => '👨', 'badge' => '1+ tahun', 'zone' =>
                    'demotion'],
                    ['rank' => 19, 'name' => 'Naufal Harits Prasetia', 'xp' => 5, 'avatar' => '👨', 'badge' => null,
                    'zone' => 'current'],
                    ];
                    @endphp



                    <!-- User List -->
                    <div class="space-y-3">

                        @foreach($users as $user)
                        @if($user['rank'] == 9)
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
                        @endif
                        @if($user['rank'] == 17)
                        <!-- Demotion Zone Header -->
                        <div class="flex items-center justify-center my-6">
                            <div
                                class="flex items-center space-x-2 bg-red-100 dark:bg-red-900/30 px-4 py-2 rounded-full">
                                <svg class="w-4 h-4 text-red-600 dark:text-red-400" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M14.707 12.293a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 111.414-1.414L9 14.586V3a1 1 0 012 0v11.586l2.293-2.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-red-700 dark:text-red-300 font-semibold text-sm">ZONA PENURUNAN</span>
                                <svg class="w-4 h-4 text-red-600 dark:text-red-400" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M14.707 12.293a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 111.414-1.414L9 14.586V3a1 1 0 012 0v11.586l2.293-2.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                        </div>
                        @endif

                        <div
                            class="flex items-center p-3 rounded-xl transition-all duration-200 hover:bg-gray-50 dark:hover:bg-gray-700/50
                        {{ $user['zone'] == 'current' ? 'bg-red-100 dark:bg-red-900/30 border border-red-200 dark:border-red-800' : '' }}">
                            <!-- Rank -->
                            <div class="w-8 text-center">
                                <span
                                    class="text-lg font-bold {{ $user['zone'] == 'current' ? 'text-red-600 dark:text-red-400' : 'text-gray-700 dark:text-gray-300' }}">
                                    {{ $user['rank'] }}
                                </span>
                            </div>

                            <!-- Avatar -->
                            <div class="relative mx-3">
                                <div
                                    class="w-12 h-12 rounded-full bg-gradient-to-br from-blue-400 to-purple-500 flex items-center justify-center text-xl">
                                    {{ $user['avatar'] }}
                                </div>
                                <div
                                    class="absolute -bottom-1 -right-1 w-4 h-4 bg-green-500 rounded-full border-2 border-white dark:border-gray-800">
                                </div>
                            </div>

                            <!-- User Info -->
                            <div class="flex-1 min-w-0">
                                <div class="flex items-center space-x-2">
                                    <h3 class="font-semibold text-gray-900 dark:text-white truncate">{{ $user['name'] }}
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
                                <span class="text-lg font-bold text-gray-700 dark:text-gray-300">{{ $user['xp'] }}
                                    XP</span>
                            </div>
                        </div>
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