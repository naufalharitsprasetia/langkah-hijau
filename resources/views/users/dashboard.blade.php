@php
$nextTier = auth()->user()->tier->max_points;
$now = auth()->user()->green_points;
$kurang = max(0, $nextTier - $now);

// Menghitung persentase
if ($kurang > 0) {
$persen = ($now / $nextTier) * 100;
// Pastikan persentase tidak melebihi 100%
$persen = min(100, $persen);
} else {
// Jika $nextTier adalah 0 atau kurang (mungkin sudah tier tertinggi), set persentase ke 100%
$persen = 100;
}
@endphp
<x-sidebar.layout :title="$title" :active="$active">
    <h1 class="text-lg font-semibold text-gray-900 dark:text-white">Dashboard User</h1>
    <!-- Konten Utama -->
    <div class="flex flex-col w-full">
        <!-- Isi Halaman -->
        <main class="w-full bg-white dark:bg-zinc-900">
            <div class="mx-auto py-6 sm:px-6 lg:px-8">
                <!-- Rekomendasi Tindakan AI -->
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Rekomendasi Tindakan</h2>
                    <span
                        class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-lg text-xs font-medium bg-hijaumuda/20 text-hijaumuda dark:bg-hijaumuda/30 dark:text-hijaumuda">Didukung
                        oleh AI ✨</span>
                </div>

                <div class="shadow-sm rounded-lg overflow-hidden mb-6 border dark:border-zinc-600">
                    <div class="px-4 py-5 sm:p-6">
                        <ul class="space-y-3" id="recommended-actions">
                            <li class="flex items-start">
                                <svg class="flex-shrink-0 h-5 w-5 text-hijaumuda" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd" />
                                </svg>
                                <p class="ml-3 text-sm text-gray-700 dark:text-gray-300">Gantilah penggunaan plastik
                                    sekali pakai dengan tas belanja kain, botol minum isi ulang, dan tempat makan
                                    sendiri. Langkah kecil ini mampu mengurangi sampah harian secara signifikan.

                                </p>
                            </li>
                            <li class="flex items-start">
                                <svg class="flex-shrink-0 h-5 w-5 text-hijaumuda" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd" />
                                </svg>
                                <p class="ml-3 text-sm text-gray-700 dark:text-gray-300">Matikan lampu, alat elektronik,
                                    dan AC saat tidak digunakan. Gunakan lampu LED yang hemat daya dan biasakan membuka
                                    jendela untuk pencahayaan alami di siang hari.</p>
                            </li>
                            <li class="flex items-start">
                                <svg class="flex-shrink-0 h-5 w-5 text-hijaumuda" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd" />
                                </svg>
                                <p class="ml-3 text-sm text-gray-700 dark:text-gray-300">Kurangi jejak karbon dari
                                    makanan dengan memilih produk lokal dan mengurangi konsumsi daging. Mulailah dengan
                                    satu hari tanpa daging (meatless day) dalam seminggu.</p>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Pencapaian -->
                <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Pencapaian</h2>
                <div class="grid grid-cols-1 gap-5 lg:grid-cols-2">
                    <div class="overflow-hidden shadow-sm rounded-lg border dark:border-zinc-600">
                        <div class="p-5">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 bg-hijaumuda rounded-md p-3">
                                    <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </div>
                                <div class="ml-5 w-0 flex-1">
                                    <dl>
                                        <dt class="text-sm font-medium text-hijaumuda dark:text-gray-400 truncate">
                                            Points
                                        </dt>
                                        <dd id="points" class="text-lg font-semibold text-gray-900 dark:text-white">{{
                                            auth()->user()->green_points }}
                                            Green Points
                                        </dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-200 dark:bg-zinc-700 px-5 py-3">
                            <div class="text-sm">
                                <a href="{{ route('user.leaderboard') }}"
                                    class="font-medium text-green-600 hover:text-hijaumuda">Lihat
                                    detail</a>
                            </div>
                        </div>
                    </div>
                    <div class="overflow-hidden shadow-sm rounded-lg border dark:border-zinc-600">
                        <div class="p-5">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 bg-hijaumuda rounded-md p-3">
                                    <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </div>
                                <div class="ml-5 w-0 flex-1">
                                    <dl>
                                        <dt class="text-sm font-medium text-hijaumuda dark:text-gray-400 truncate">
                                            Badges</dt>
                                        <dd id="moisture" class="text-lg font-semibold text-gray-900 dark:text-white">{{
                                            count(auth()->user()->badge) }}
                                            Badges</dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-200 dark:bg-zinc-700 px-5 py-3">
                            <div class="text-sm">
                                <a href="#userBadge" class="font-medium text-green-600 hover:text-hijaumuda">Lihat
                                    detail</a>
                            </div>
                        </div>
                    </div>
                    <div class="overflow-hidden shadow-sm rounded-lg border dark:border-zinc-600">
                        <div class="p-5">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 bg-hijaumuda rounded-md p-3">
                                    <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </div>
                                <div class="ml-5 w-0 flex-1">
                                    <dl>
                                        <dt class="text-sm font-medium text-hijaumuda dark:text-gray-400 truncate">
                                            Tier</dt>
                                        <dd class="text-lg font-semibold text-gray-900 dark:text-white">{{
                                            auth()->user()->tier->icon }} {{
                                            auth()->user()->tier->name }}</dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-200 dark:bg-zinc-700 px-5 py-3">
                            <div class="text-sm">
                                <a href="{{ route('user.tierInfo') }}"
                                    class="font-medium text-green-600 hover:text-hijaumuda">Lihat detail</a>
                            </div>
                        </div>
                    </div>
                    <div class="overflow-hidden shadow-sm rounded-lg border dark:border-zinc-600">
                        <div class="p-5">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 bg-hijaumuda rounded-md p-3">
                                    <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </div>
                                <div class="ml-5 w-0 flex-1">
                                    <dl>
                                        <dt class="text-sm font-medium text-hijaumuda dark:text-gray-400 truncate">
                                            Quiz Attempted</dt>
                                        <dd class="text-lg font-semibold text-gray-900 dark:text-white">- Kali</dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-200 dark:bg-zinc-700 px-5 py-3">
                            <div class="text-sm">
                                <a href="#" class="font-medium text-green-600 hover:text-hijaumuda">Lihat detail</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Progress to next level -->
                <h2 class="text-lg font-semibold text-gray-900 dark:text-white mt-8 mb-4">Progress To Next Tier</h2>
                <div class="shadow-sm rounded-lg overflow-hidden border dark:border-zinc-600">
                    <div class="px-4 py-5 sm:p-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-white">Green Points</h3>
                        <div class="mt-5">
                            <div class="flex justify-between items-center">
                                <div class="text-sm font-medium text-hijaumuda dark:text-gray-400">Points needed => Next
                                    Tier
                                </div>
                                <div class="text-lg font-semibold text-gray-900 dark:text-white">{{ $nextTier }}</div>
                            </div>
                            <div class="mt-4">
                                <div class="relative pt-1">
                                    <div
                                        class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-blue-200 dark:bg-blue-700">
                                        <div style="width: {{ $persen }}%"
                                            class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-hijaumuda">
                                        </div>
                                    </div>
                                    <div class="flex justify-between">
                                        <div class="text-sm font-medium text-hijaumuda dark:text-gray-400">Points
                                            Sekarang
                                        </div>
                                        <div class="text-sm font-medium text-hijaumuda dark:text-gray-400">Butuh Points
                                        </div>
                                    </div>
                                    <div class="flex justify-between mt-1">
                                        <div class="text-lg font-semibold text-gray-900 dark:text-white">{{
                                            auth()->user()->green_points }}</div>
                                        <div class="text-lg font-semibold text-gray-900 dark:text-white">{{ $kurang }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @if(count(auth()->user()->badge) != 0)
                <!-- User Badges -->
                <h2 class="text-lg font-semibold text-gray-900 dark:text-white mt-6 mb-3" id="userBadge">User Badges
                </h2>
                <div class="user-badges flex gap-3 justify-center items-center mb-4">
                    @foreach (auth()->user()->badge as $badge)
                    <div class="max-w-lg rounded-lg border-2 border-hijaumuda p-3 flex justify-center items-center">
                        <span class="text-xl">{{ $badge->icon }} </span>
                        <h2 class="font-semibold tracking-wide text-gray-900 dark:text-white">{{ $badge->badge }}</h2>
                    </div>
                    @endforeach
                </div>
                @endif

            </div>
        </main>
        <x-mitra />
    </div>

</x-sidebar.layout>