<x-layout :title="$title" :active="$active">

    @if (session('challenge_completed'))
    <div class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
        <div class="bg-white p-6 rounded-lg shadow-lg text-center">
            <img src="{{ asset('images/challenge-complete.png') }}" alt="Challenge Complete" class="w-32 mx-auto mb-4">
            <h2 class="text-xl font-bold text-green-600">Selamat! Challenge selesai!</h2>
            <p class="mt-2">Kamu mendapatkan badge dan poin!</p>
            <button onclick="window.location.reload()"
                class="mt-4 px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                Tutup
            </button>
        </div>
    </div>
    @endif


    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 relative"
        x-data="{ openModal: false, day: null, totalCheckboxes: {{ count($challenge->challenge_actions) }}, checkedCount: 0 }">
        <!-- Breadcrumb -->
        <div class="mb-6">
            <nav class="flex items-center space-x-2 text-sm">
                <a href="{{ route('challenges.index') }}"
                    class="flex items-center text-gray-600 dark:text-gray-400 hover:text-green-600 dark:hover:text-green-400 transition-colors">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                        </path>
                    </svg>
                    Kembali
                </a>
            </nav>
            <div class="mt-2">
                <h3 class="font-bold text-gray-900 dark:text-white mt-2">
                    <span class="text-gray-500 font-normal">Challenge /</span>
                    {{ $challenge->badge->icon }} {{ $challenge->title }}
                </h3>
            </div>
        </div>
        @if (session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
            <p>{{ session('success') }}</p>
        </div>
        @endif
        @if (session('error'))
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4" role="alert">
            <p>{{ session('error') }}</p>
        </div>
        @endif
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Challenge Image -->
            <div class="lg:col-span-1">
                <div
                    class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
                    <div class="aspect-square bg-gray-100 dark:bg-gray-700 flex items-center justify-center">
                        <img src="{{ asset('img/challenges') }}/{{ $challenge->image }}" alt="{{ $challenge->title }}"
                            class="w-full h-full object-cover">
                    </div>
                </div>
            </div>

            <!-- Challenge Details -->
            <div class="lg:col-span-2">
                <div class="space-y-6">
                    <!-- Title -->
                    <div>
                        <h1
                            class="text-2xl sm:text-3xl lg:text-4xl font-bold text-gray-900 dark:text-white leading-tight">
                            {{ $challenge->title }}
                        </h1>
                    </div>

                    <!-- Challenge Info -->
                    <div class="space-y-3">
                        <div class="flex flex-wrap items-center gap-4 text-sm">
                            <div class="flex items-center">
                                <span class="text-gray-600 dark:text-gray-400">Started from :</span>
                                @php
                                $tanggalAwal = $participation->start_date;
                                $carbonTanggal = \Carbon\Carbon::parse($tanggalAwal);
                                @endphp
                                <span class="ml-2 text-green-600 dark:text-green-400 font-medium">
                                    {{ $carbonTanggal->format('j F Y') }}
                                </span>
                            </div>
                        </div>

                        <div class="flex flex-wrap items-center gap-4 text-sm">
                            <div class="flex items-center">
                                <span class="text-gray-600 dark:text-gray-400">Status :</span>
                                <span
                                    class="ml-2 px-3 py-1 bg-orange-100 dark:bg-orange-900/30 text-orange-600 dark:text-orange-400 rounded-full text-xs font-medium">
                                    {{ $participation->is_completed == false ? 'Sedang Berlangsung' : 'Selesai' }}
                                </span>
                            </div>
                        </div>

                        <div class="flex flex-wrap items-center gap-4 text-sm">
                            <div class="flex items-center">
                                <span class="text-gray-600 dark:text-gray-400">Reward :</span>
                                <span class="ml-2 text-gray-900 dark:text-white font-medium">
                                    {{ $challenge->badge->icon }}
                                    {{ $challenge->badge->badge }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Progress Harian -->
                    <div class="space-y-4">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Progress Harian</h3>
                        <div class="flex flex-wrap gap-3">
                            <span class="bg-green-600 hidden"></span>
                            <span class="ring-2 ring-yellow-500 bg-yellow-500 hover:bg-yellow-600 hidden"></span>
                            @php
                            $today = \Carbon\Carbon::today();
                            $startDate = \Carbon\Carbon::parse($participation->start_date);
                            @endphp

                            @for ($i = 0; $i < $challenge->duration_days; $i++)
                                @php
                                $dayIndex = $i + 1;
                                $currentDate = $startDate->copy()->addDays($i);
                                $matchedAction = $daily_actions->firstWhere('day', 'day'.$dayIndex);
                                $todayAction = $daily_actions->firstWhere('checked_at', $today);
                                $jumlahAction = count($daily_actions);
                                $dayToday = "";
                                if (isset($todayAction)){
                                $dayToday = $todayAction->day;
                                }
                                $todayIndex = 'day'.$dayIndex;
                                @endphp
                                @if ($matchedAction)
                                {{-- ✅ Sudah dikerjakan (Hijau) --}}
                                @if($matchedAction->day != $dayToday)
                                <button type="button" title="Completed"
                                    class="w-12 h-12 sm:w-14 sm:h-14 bg-green-500 text-white rounded-lg flex items-center justify-center font-bold text-lg shadow-md">
                                    {{ $dayIndex }}
                                </button>
                                @else
                                <button type="button" id="day{{ $dayIndex }}" title="Hari Ini"
                                    class="w-12 h-12 sm:w-14 sm:h-14  bg-green-600 ring-2 ring-yellow-500 text-white rounded-lg flex items-center justify-center font-bold text-lg shadow-md transition-all duration-200 hover:scale-105">
                                    ✔️
                                </button>
                                @endif
                                @elseif (!isset($todayAction) && $jumlahAction == $i)
                                {{-- 🟡 Hari ini (Kuning, bisa klik) --}}
                                <button type="button" @click="openModal = true; day = 'day{{ $dayIndex }}'"
                                    id="day{{ $dayIndex }}" title="Hari Ini"
                                    class="w-12 h-12 sm:w-14 sm:h-14 @if($matchedAction) bg-green-600 ring-2 ring-yellow-500 @else bg-yellow-500 hover:bg-yellow-600 cursor-pointer @endif text-white rounded-lg flex items-center justify-center font-bold text-lg shadow-md transition-all duration-200 hover:scale-105">
                                    @if($matchedAction)
                                    ✔️
                                    @else
                                    {{ $dayIndex }}
                                    @endif
                                </button>
                                @else
                                {{-- ⚪ Belum bisa dikerjakan (Abu-abu) --}}
                                <button type="button" disabled title="Tidak Bisa Dilakukan Hari Ini"
                                    class="cursor-not-allowed w-12 h-12 sm:w-14 sm:h-14 bg-gray-600 text-white rounded-lg flex items-center justify-center font-bold text-lg shadow-md">
                                    {{ $dayIndex }}
                                </button>
                                @endif
                                @endfor
                        </div>


                    </div>
                </div>

                <!-- Challenge Description -->
                <div class="space-y-4 mt-5">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Deskripsi Challenge</h3>
                    <div class="prose prose-gray dark:prose-invert max-w-none">
                        <p class="text-gray-600 dark:text-gray-400 leading-relaxed">
                            {{ $participation->challenge->description }}
                        </p>
                    </div>
                </div>
                {{-- Modal Checklist --}}
                <div id="modalC" x-show="openModal" x-init="$watch('openModal', value => {
    document.body.classList.toggle('overflow-hidden', !!value);
})" class="absolute inset-0 z-50 flex items-center justify-center backdrop-blur-sm bg-white/30 dark:bg-black/20"
                    x-transition style="display: none;" @keydown.escape.window="openModal = false"
                    @click.outside="openModal = false">
                    <div class="bg-white dark:bg-gray-900 shadow-2xl rounded-2xl p-6 w-full max-w-lg mx-auto relative">
                        <template x-if="openModal">
                            <div>
                                <h2 class="text-xl font-semibold mb-4 text-gray-900 dark:text-white text-center">
                                    Checklist Tanggal
                                    {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}
                                </h2>
                                <form method="POST"
                                    @submit.prevent="checkedCount !== totalCheckboxes ? null : $el.submit()"
                                    action="{{ route('challenges.checklist', $participation->id) }}">
                                    @csrf
                                    <input type="hidden" name="day" :value="day">
                                    <div class="space-y-3">
                                        @foreach ($challenge->challenge_actions as $action)
                                        <div
                                            class="flex items-start space-x-3 bg-gray-100 dark:bg-gray-800 rounded-lg p-3">
                                            <input type="checkbox" class="mt-1 form-checkbox text-green-600 w-5 h-5"
                                                @change="checkedCount = [...$el.closest('form').querySelectorAll('input[type=checkbox]')].filter(cb => cb.checked).length">
                                            <label class="text-gray-800 dark:text-gray-200 leading-snug">
                                                {{ $action->action }}
                                            </label>
                                        </div>
                                        @endforeach
                                    </div>


                                    <button type="submit" :disabled="checkedCount !== totalCheckboxes" class="cursor-pointer mt-6 w-full px-4 py-2 text-white font-medium rounded-lg transition
                           bg-green-500 hover:bg-green-600 disabled:opacity-50 disabled:cursor-not-allowed">
                                        Simpan Progress
                                    </button>
                                </form>

                                <button @click="openModal = false"
                                    class="mt-4 w-full text-sm text-gray-500 dark:text-gray-300 hover:underline text-center">
                                    Tutup
                                </button>
                            </div>
                        </template>
                    </div>
                </div>
                <!-- Action Buttons -->
                {{-- <div class="flex flex-col sm:flex-row gap-3 pt-4">
                    <button
                        class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 p-3 rounded-lg font-medium transition-colors duration-200 flex items-center justify-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.367 2.684 3 3 0 00-5.367-2.684z">
                            </path>
                        </svg>
                        Bagikan
                    </button>
                </div> --}}
            </div>
        </div>

    </div>
    <script>
        // Hilangkan cursor bulat
        const modalC = document.getElementById('modalC');
        const cursorE = document.getElementById('cursor-example');

        const observer = new MutationObserver(() => {
            if (modalC.style.display !== 'none') {
                cursorE.style.display = 'none';
            } else {
                cursorE.style.display = 'block'; // atau kondisi default
            }
        });

        observer.observe(modalC, {
            attributes: true,
            attributeFilter: ['style']
        });
    </script>
</x-layout>