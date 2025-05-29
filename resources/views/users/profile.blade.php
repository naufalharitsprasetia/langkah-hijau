@php
$nextTier = 1000;
$kurang = max(0, $nextTier - $user->green_points);
@endphp
<x-sidebar.layout :title="$title" :active="$active">
    <!-- Konten Utama -->
    <div class="flex flex-col w-full">
        <main class="w-full">
            <div class="mx-auto py-6 sm:px-6 lg:px-8">
                <!-- Isi Halaman -->
                <a href="{{ route('user.leaderboard') }}"
                    class="block mb-2 p-2 text-sm text-hijautua hover:text-hijaumuda">
                    <- Kembali</a>
                        <h2 class="text-2xl font-semibold text-zinc-900 dark:text-white">🙂 Profile</h2>
                        <br>
                        <h3 class="text-xl font-semibold text-zinc-900 dark:text-white">User Name : {{ $user->name }}
                        </h3>
                        <br>
                        <hr>
                        <!-- Pencapaian -->
                        <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Pencapaian</h2>
                        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4">
                            <div class="overflow-hidden shadow-sm rounded-lg border dark:border-zinc-600">
                                <div class="p-5">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 bg-hijaumuda rounded-md p-3">
                                            <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                            </svg>
                                        </div>
                                        <div class="ml-5 w-0 flex-1">
                                            <dl>
                                                <dt
                                                    class="text-sm font-medium text-hijaumuda dark:text-gray-400 truncate">
                                                    Points
                                                </dt>
                                                <dd id="points"
                                                    class="text-lg font-semibold text-gray-900 dark:text-white">{{
                                                    $user->green_points }}
                                                    Green Points
                                                </dd>
                                            </dl>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-gray-50 dark:bg-zinc-700 px-5 py-3">
                                    <div class="text-sm">
                                        <a href="" class="font-medium text-green-600 hover:text-hijaumuda">Lihat
                                            detail</a>
                                    </div>
                                </div>
                            </div>
                            <div class="overflow-hidden shadow-sm rounded-lg border dark:border-zinc-600">
                                <div class="p-5">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 bg-hijaumuda rounded-md p-3">
                                            <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                            </svg>
                                        </div>
                                        <div class="ml-5 w-0 flex-1">
                                            <dl>
                                                <dt
                                                    class="text-sm font-medium text-hijaumuda dark:text-gray-400 truncate">
                                                    Badges</dt>
                                                <dd id="moisture"
                                                    class="text-lg font-semibold text-gray-900 dark:text-white">-
                                                    Badges</dd>
                                            </dl>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-gray-50 dark:bg-zinc-700 px-5 py-3">
                                    <div class="text-sm">
                                        <a href="" class="font-medium text-green-600 hover:text-hijaumuda">Lihat
                                            detail</a>
                                    </div>
                                </div>
                            </div>
                            <div class="overflow-hidden shadow-sm rounded-lg border dark:border-zinc-600">
                                <div class="p-5">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 bg-hijaumuda rounded-md p-3">
                                            <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                            </svg>
                                        </div>
                                        <div class="ml-5 w-0 flex-1">
                                            <dl>
                                                <dt
                                                    class="text-sm font-medium text-hijaumuda dark:text-gray-400 truncate">
                                                    Tier</dt>
                                                <dd class="text-lg font-semibold text-gray-900 dark:text-white">{{
                                                    $user->tier->icon }} {{
                                                    $user->tier->name }}</dd>
                                            </dl>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-gray-50 dark:bg-zinc-700 px-5 py-3">
                                    <div class="text-sm">
                                        <a href="#" class="font-medium text-green-600 hover:text-hijaumuda">Lihat
                                            detail</a>
                                    </div>
                                </div>
                            </div>
                            <div class="overflow-hidden shadow-sm rounded-lg border dark:border-zinc-600">
                                <div class="p-5">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 bg-hijaumuda rounded-md p-3">
                                            <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                            </svg>
                                        </div>
                                        <div class="ml-5 w-0 flex-1">
                                            <dl>
                                                <dt
                                                    class="text-sm font-medium text-hijaumuda dark:text-gray-400 truncate">
                                                    Quiz Attempted</dt>
                                                <dd class="text-lg font-semibold text-gray-900 dark:text-white">- Kali
                                                </dd>
                                            </dl>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-gray-50 dark:bg-zinc-700 px-5 py-3">
                                    <div class="text-sm">
                                        <a href="#" class="font-medium text-green-600 hover:text-hijaumuda">Lihat
                                            detail</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Progress to next level -->
                        <h2 class="text-lg font-semibold text-gray-900 dark:text-white mt-8 mb-4">Progress To Next Tier
                        </h2>
                        <div class="shadow-sm rounded-lg overflow-hidden border dark:border-zinc-600">
                            <div class="px-4 py-5 sm:p-6">
                                <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-white">Green Points
                                </h3>
                                <div class="mt-5">
                                    <div class="flex justify-between items-center">
                                        <div class="text-sm font-medium text-hijaumuda dark:text-gray-400">Points needed
                                            => Next
                                            Tier
                                        </div>
                                        <div class="text-lg font-semibold text-gray-900 dark:text-white">{{ $nextTier }}
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <div class="relative pt-1">
                                            <div
                                                class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-blue-200 dark:bg-blue-700">
                                                {{-- @php
                                                $nextTier = 1000;
                                                $now = $user->green_points;
                                                $kurang = $nextTier - $now;
                                                $persen = $now / 10;
                                                @endphp --}}
                                                <div style="width: {{ $user->green_points/10 }}%"
                                                    class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-hijaumuda">
                                                </div>
                                            </div>
                                            <div class="flex justify-between">
                                                <div class="text-sm font-medium text-hijaumuda dark:text-gray-400">
                                                    Points
                                                    Sekarang
                                                </div>
                                                <div class="text-sm font-medium text-hijaumuda dark:text-gray-400">Butuh
                                                    Points
                                                </div>
                                            </div>
                                            <div class="flex justify-between mt-1">
                                                <div class="text-lg font-semibold text-gray-900 dark:text-white">{{
                                                    $user->green_points }}</div>
                                                <div class="text-lg font-semibold text-gray-900 dark:text-white">{{
                                                    $kurang }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

            </div>
        </main>
    </div>
</x-sidebar.layout>