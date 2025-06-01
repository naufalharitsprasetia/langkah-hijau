@php
    $nextTier = auth()->user()->tier->max_points ?? 0;
    $now = auth()->user()->green_points;
    $kurang = max(0, $nextTier - $now);

    if ($nextTier > 0) {
        $persen = ($now / $nextTier) * 100;
        $persen = min(100, $persen);
    } else {
        $persen = 100;
    }
@endphp
<x-sidebar.layout :title="$title" :active="$active">
    <h1 class="text-lg font-semibold text-gray-900 dark:text-white">Dashboard User</h1>
    <div class="flex flex-col w-full">
        <main class="w-full bg-white dark:bg-zinc-900">
            <div class="mx-auto py-6 sm:px-6 lg:px-8">
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
                                        <dd id="points" class="text-lg font-semibold text-gray-900 dark:text-white">
                                            {{ auth()->user()->green_points }}
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
                                        <dd id="moisture" class="text-lg font-semibold text-gray-900 dark:text-white">
                                            {{ count(auth()->user()->badge) }}
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
                                            Quiz Attempted</dt>
                                        {{-- Menampilkan jumlah quiz yang sudah dikerjakan --}}
                                        <dd class="text-lg font-semibold text-gray-900 dark:text-white">
                                            {{ $quizAttempts->count() }} Kali
                                        </dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-200 dark:bg-zinc-700 px-5 py-3">
                            <div class="text-sm">
                                {{-- Link ke bagian riwayat quiz di halaman yang sama --}}
                                <a href="#quizHistory" class="font-medium text-green-600 hover:text-hijaumuda">Lihat
                                    detail</a>
                            </div>
                        </div>
                    </div>
                </div>

                <h2 class="text-lg font-semibold text-gray-900 dark:text-white mt-8 mb-4">Progress To Next Tier</h2>
                <div class="shadow-sm rounded-lg overflow-hidden border dark:border-zinc-600">
                    <div class="px-4 py-5 sm:p-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-white">Green Points</h3>
                        <div class="mt-5">
                            <div class="flex justify-between items-center">
                                <div class="text-sm font-medium text-hijaumuda dark:text-gray-400">Points needed =>
                                    Next
                                    Tier
                                </div>
                                <div class="text-lg font-semibold text-gray-900 dark:text-white">{{ $nextTier }}
                                </div>
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
                                        <div class="text-lg font-semibold text-gray-900 dark:text-white">
                                            {{ auth()->user()->green_points }}</div>
                                        <div class="text-lg font-semibold text-gray-900 dark:text-white">
                                            {{ $kurang }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @if (count(auth()->user()->badge) != 0)
                    <h2 class="text-lg font-semibold text-gray-900 dark:text-white mt-6 mb-3" id="userBadge">User
                        Badges
                    </h2>
                    <div class="user-badges flex gap-3 justify-center items-center mb-4">
                        @foreach (auth()->user()->badge as $badge)
                            <div
                                class="max-w-lg rounded-lg border-2 border-hijaumuda p-3 flex justify-center items-center">
                                <span class="text-xl">{{ $badge->icon }} </span>
                                <h2 class="font-semibold tracking-wide text-gray-900 dark:text-white">
                                    {{ $badge->badge }}</h2>
                            </div>
                        @endforeach
                    </div>
                @endif

                <h2 class="text-lg font-semibold text-gray-900 dark:text-white mt-6 mb-3" id="quizHistory">Riwayat
                    Pengerjaan Quiz</h2>
                @if ($quizAttempts->isEmpty())
                    <p class="text-gray-600 dark:text-gray-400">Anda belum mengerjakan quiz apa pun.</p>
                @else
                    <div class="overflow-x-auto shadow-sm rounded-lg border dark:border-zinc-600">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-zinc-800">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                        No.
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                        Nama Quiz
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                        Skor
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                        Waktu Pengerjaan
                                    </th>
                                    <th scope="col" class="relative px-6 py-3">
                                        <span class="sr-only">Detail</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-zinc-900 divide-y divide-gray-200 dark:divide-gray-700">
                                @foreach ($quizAttempts as $index => $attempt)
                                    <tr>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">
                                            {{ $index + 1 }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">
                                            {{ $attempt->quiz->title ?? 'Quiz Tidak Ditemukan' }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">
                                            {{ $attempt->score }}
                                        </td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                            {{ $attempt->created_at->format('d M Y H:i') }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            {{-- Anda bisa menambahkan link untuk melihat detail hasil quiz ini jika diperlukan --}}
                                            {{-- Misalnya, route('quizzes.results', $attempt->quiz->id) --}}
                                            <a href="{{ route('quizzes.results', $attempt->quiz->id) }}"
                                                class="text-hijautua hover:text-hijaumuda dark:text-hijaumuda dark:hover:text-hijautua">Lihat
                                                Hasil</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </main>
        <x-mitra />
    </div>

</x-sidebar.layout>
