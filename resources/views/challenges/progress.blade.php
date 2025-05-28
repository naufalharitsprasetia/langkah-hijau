<x-layout :title="$title" :active="$active">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6" x-data="{ selectedDay: null, selectedDate: null }">
        <!-- Breadcrumb -->
        <div class="mb-6">
            <nav class="flex items-center space-x-2 text-sm">
                <a href="{{ url()->previous() }}"
                    class="flex items-center text-gray-600 dark:text-gray-400 hover:text-green-600 dark:hover:text-green-400 transition-colors">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                        </path>
                    </svg>
                    Kembali
                </a>
            </nav>
            <div class="mt-2">
                <h3 class="font-bold text-gray-800 mt-2">
                    <span class="text-gray-500 font-normal">Challenge /</span>
                    {{ $participation->challenge->badge_icon }} {{ $participation->challenge->title }}
                </h3>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Challenge Image -->
            <div class="lg:col-span-1">
                <div
                    class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
                    <div class="aspect-square bg-gray-100 dark:bg-gray-700 flex items-center justify-center">
                        @if (isset($participation->challenge->image_url))
                            <img src="{{ $participation->challenge->image_url }}"
                                alt="{{ $participation->challenge->title }}" class="w-full h-full object-cover">
                        @else
                            <div class="text-center text-gray-400 dark:text-gray-500">
                                <svg class="w-16 h-16 mx-auto mb-2" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                                <p class="text-sm">Challenge Image</p>
                            </div>
                        @endif
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
                            {{ $participation->challenge->title }}
                        </h1>
                    </div>

                    <!-- Challenge Info -->
                    <div class="space-y-3">
                        <div class="flex flex-wrap items-center gap-4 text-sm">
                            <div class="flex items-center">
                                <span class="text-gray-600 dark:text-gray-400">Started from :</span>
                                <span class="ml-2 text-green-600 dark:text-green-400 font-medium">
                                    {{ $participation->start_date->format('d M Y') }}
                                </span>
                            </div>
                        </div>

                        <div class="flex flex-wrap items-center gap-4 text-sm">
                            <div class="flex items-center">
                                <span class="text-gray-600 dark:text-gray-400">Status :</span>
                                <span
                                    class="ml-2 px-3 py-1 bg-orange-100 dark:bg-orange-900/30 text-orange-600 dark:text-orange-400 rounded-full text-xs font-medium">
                                    {{ $participation->status ?? 'On Going' }}
                                </span>
                            </div>
                        </div>

                        <div class="flex flex-wrap items-center gap-4 text-sm">
                            <div class="flex items-center">
                                <span class="text-gray-600 dark:text-gray-400">Reward :</span>
                                <span class="ml-2 text-gray-900 dark:text-white font-medium">
                                    {{ $participation->challenge->badge_icon }}
                                    {{ $participation->challenge->badge_name }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Progress Tracker -->
                    <div class="space-y-4">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Progress Harian</h3>
                        <div class="flex flex-wrap gap-3">
                            @if ($participation && $participation->challenge)
                                @for ($day = 1; $day <= $participation->challenge->duration_days; $day++)
                                    @php
                                        $currentActionDateCarbon = \Carbon\Carbon::parse($participation->start_date)
                                            ->startOfDay()
                                            ->addDays($day - 1);

                                        // Ambil DailyUserAction sesuai tanggal
                                        $dailyAction = $participation->dailyActions?->firstWhere(
                                            'action_date',
                                            $currentActionDateCarbon,
                                        );

                                        $checklistStatus = $dailyAction?->checklist_status ?? [];
                                        $isDayCompleted = $dailyAction && $dailyAction->is_completed;

                                        // Default: belum bisa diakses (future)
                                        $buttonColor = 'bg-gray-300 dark:bg-gray-500';

                                        if ($isDayCompleted) {
                                            $buttonColor = 'bg-green-500 hover:bg-green-600';
                                        } elseif ($dailyAction) {
                                            $buttonColor = 'bg-yellow-500 hover:bg-yellow-600';
                                        } elseif (
                                            $currentActionDateCarbon->isPast() ||
                                            $currentActionDateCarbon->isToday()
                                        ) {
                                            // Sudah lewat tapi belum dikerjakan
                                            $buttonColor = 'bg-gray-600 hover:bg-gray-700';
                                        }

                                        $isClickable = $dailyAction && !$currentActionDateCarbon->isFuture();
                                    @endphp

                                    <button type="button"
                                        @if ($isClickable) @click="
                                        selectedDay = {{ $day }};
                                        selectedDate = '{{ $dailyAction->action_date }}';
                                    " @endif
                                        class="w-12 h-12 sm:w-14 sm:h-14 text-white rounded-lg flex items-center justify-center font-bold text-lg shadow-md transition-all duration-200 hover:scale-105 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800 {{ $buttonColor }}">
                                        {{ $day }}
                                    </button>
                                @endfor
                            @else
                                <p class="text-gray-500 dark:text-gray-400">Data partisipasi tantangan tidak tersedia.
                                </p>
                            @endif
                        </div>
                    </div>


                    {{-- modal --}}
                    <div x-show="selectedDay"
                        class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50"
                        style="display: none;" x-transition @keydown.escape.window="selectedDay = null">
                        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg max-w-md w-full p-6 relative"
                            @click.outside="selectedDay = null">

                            @php
                                $checklistItems = $participation->challenge->checklist ?? [];
                                $dailyActionData = $participation->dailyActions->keyBy(fn($item) => $item->action_date);
                                $today = \Carbon\Carbon::today();
                                $startDate = \Carbon\Carbon::parse($participation->start_date)->startOfDay();
                                $dayIndex = $today->diffInDays($startDate) + 1;
                                $todayFormatted = $today->translatedFormat('d F Y');
                            @endphp

                            @foreach ($dailyActionData as $actionDate => $dailyAction)
                                <template x-if="selectedDate === '{{ $actionDate }}'">
                                    <div>
                                        @php
                                            $checklistStatus = $dailyAction->checklist_status ?? [];
                                            $dayIndex =
                                                \Carbon\Carbon::parse($actionDate)->diffInDays(
                                                    \Carbon\Carbon::parse($participation->start_date),
                                                ) + 1;
                                            $isCompleted = $dailyAction->is_completed;
                                            $buttonColor = $isCompleted
                                                ? 'bg-green-500 hover:bg-green-600'
                                                : 'bg-gray-500 hover:bg-gray-600';
                                        @endphp

                                        <h4 class="text-lg font-semibold mb-4">
                                            Checklist Hari {{ $todayFormatted }}
                                        </h4>

                                        <form method="POST"
                                            action="{{ route('daily-actions.checklist', $dailyAction->id) }}">
                                            @csrf
                                            @foreach ($checklistItems as $item)
                                                @php
                                                    $isChecked = $checklistStatus[$item] ?? false;
                                                @endphp

                                                <div class="flex items-center space-x-2 mb-2">
                                                    <input type="checkbox"
                                                        id="item_{{ $dailyAction->id }}_{{ $loop->index }}"
                                                        name="checklist_status[{{ $item }}]" value="1"
                                                        {{ $isChecked ? 'checked' : '' }}>
                                                    <label for="item_{{ $dailyAction->id }}_{{ $loop->index }}"
                                                        class="text-gray-800 dark:text-gray-200">
                                                        {{ Str::headline(str_replace('_', ' ', $item)) }}
                                                    </label>
                                                </div>
                                            @endforeach

                                            <button type="submit"
                                                class="mt-4 px-4 py-2 text-white font-medium rounded {{ $buttonColor }}">
                                                Simpan Checklist
                                            </button>
                                        </form>

                                        <button @click="selectedDay = null"
                                            class="mt-4 text-sm text-gray-600 dark:text-gray-300 hover:underline">
                                            Tutup
                                        </button>
                                    </div>
                                </template>
                            @endforeach
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

                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row gap-3 pt-4">
                    <button
                        class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 p-3 rounded-lg font-medium transition-colors duration-200 flex items-center justify-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.367 2.684 3 3 0 00-5.367-2.684z">
                            </path>
                        </svg>
                        Bagikan
                    </button>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-layout>

{{-- <script defer src="//unpkg.com/alpinejs" crossorigin="anonymous"></script> --}}
