<x-layout :title="$title" :active="$active">
    <section class="max-w-7xl mx-auto sm:px-6 lg:px-16 pb-12">
        <!-- Event Details -->
        <div class="p-3 sm:p-6 md:p-8">
            <a href="{{ route('event.index') }}" class="text-hijaumuda"><i class="fa-solid fa-arrow-left"></i>
                Kembali</a>
            <br>
            <br>
            <!-- Event Image/Header -->
            <div
                class="w-72 h-full sm:w-80 lg:w-96 bg-gradient-to-br from-green-100 to-blue-100 dark:from-green-900 dark:to-blue-900 rounded-2xl flex items-center justify-center overflow-hidden">
                <img src="{{ asset('img/events/') }}/{{ $event->image }}" alt=""
                    class="w-full h-full object-cover rounded-2xl">
            </div>
            <br>
            <!-- Event Type Badge -->
            <div class="mb-4">
                <span
                    class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-300 border border-green-200 dark:border-green-800">
                    {{ $event->category }}
                </span>
            </div>

            <!-- Event Title -->
            <h3 class="text-xl sm:text-2xl font-bold text-hijautua dark:text-hijaumuda mb-2 leading-tight">
                {{ $event->title }}
            </h3>
            <div class="flex items-center space-x-1 text-orange-600 dark:text-orange-400 font-medium mb-1.5">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span>{{ \Carbon\Carbon::parse($event->date_time)->locale('id')->diffForHumans() }}</span>
            </div>
            <!-- Organizer -->
            <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">
                oleh: <span class="font-medium">{{ $event->penyelenggara }}</span>
            </p>

            <!-- Event Description -->
            <p class="text-gray-700 dark:text-gray-300 mb-4 leading-relaxed text-xl">
                {{ $event->description }}
            </p>

            <!-- Event Status -->
            <div class="flex items-center space-x-4 mb-4 text-lg">
                <div class="flex items-center space-x-1 text-gray-600 dark:text-gray-400">
                    <i class="fa-solid fa-location-dot"></i>
                    <span>Lokasi: <span class="font-semibold text-gray-900 dark:text-white">{{
                            $event->location }}</span></span>
                </div>
            </div>

            {{-- time --}}
            <p class="text-zinc-900 dark:text-white mb-1.5 text-lg">Date : {{
                \Carbon\Carbon::parse($event->date_time)->translatedFormat('d F Y') }}</p>
            <p class="text-zinc-900 dark:text-white mb-3 text-lg">Time : {{
                \Carbon\Carbon::parse($event->date_time)->format('H.i')
                }} WIB</p>
            <p class="text-zinc-900 dark:text-white mb-3 text-lg">Contact Person : <a
                    class="hover:underline cursor-pointer font-semibold hover:font-bold"
                    href="https://wa.me/{{ $event->contact_person_number  }}" target="_blank">{{ $event->contact_person
                    }} ({{
                    $event->contact_person_number }})</a> </p>

            @php
            // Format: YYYYMMDDTHHmmssZ (UTC), atau YYYYMMDD jika acara seharian
            $startTime = \Carbon\Carbon::parse($event->date_time)->format('Ymd\THis\Z');

            $googleCalendarUrl = 'https://www.google.com/calendar/render?action=TEMPLATE'
            . '&text=' . urlencode($event->title)
            . '&dates=' . $startTime
            . '&details=' . urlencode($event->description)
            . '&location=' . urlencode($event->location)
            . '&sf=true&output=xml';
            @endphp

            <a href="{{ $googleCalendarUrl }}" target="_blank"
                class="inline-block mt-4 bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded shadow">
                <i class="fa-brands fa-google me-2"></i> Tambahkan ke Google Calendar
            </a>

        </div>

    </section>

</x-layout>