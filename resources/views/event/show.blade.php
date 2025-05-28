<x-layout :title="$title" :active="$active">
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-16 pb-12">
        <!-- Event Details -->
        <div class="p-6 sm:p-8">
            <!-- Event Image/Header -->
            <div
                class="w-72 h-full sm:w-80 lg:w-96 bg-gradient-to-br from-green-100 to-blue-100 dark:from-green-900 dark:to-blue-900 rounded-2xl flex items-center justify-center overflow-hidden">
                <img src="{{ asset('img/events/kompos.png') }}" alt="" class="w-full h-full object-cover rounded-2xl">
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

            <!-- Organizer -->
            <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">
                oleh: <span class="font-medium">{{ $event->penyelenggara }}</span>
            </p>

            <!-- Event Description -->
            <p class="text-gray-700 dark:text-gray-300 mb-6 leading-relaxed">
                {{ $event->description }}
            </p>

            <!-- Event Stats -->
            <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center space-y-2 sm:space-y-0 text-sm">
                <div class="flex items-center space-x-4">
                    <div class="flex items-center space-x-1 text-gray-600 dark:text-gray-400">
                        <i class="fa-solid fa-location-dot"></i>
                        <span>Lokasi: <span class="font-semibold text-gray-900 dark:text-white">{{
                                $event->location }}</span></span>
                    </div>
                </div>
                <div class="flex items-center space-x-1 text-orange-600 dark:text-orange-400 font-medium">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span>{{ \Carbon\Carbon::parse($event->date_time)->locale('id')->diffForHumans() }}</span>
                </div>
            </div>
            {{-- time --}}
            <div class="">
                <p class="text-zinc-900 dark:text-white">Date : {{
                    \Carbon\Carbon::parse($event->date_time)->translatedFormat('d F Y') }}</p>
                <p class="text-zinc-900 dark:text-white">Time : {{
                    \Carbon\Carbon::parse($event->date_time)->format('H.i')
                    }} WIB</p>
                <p class="text-zinc-900 dark:text-white">Contact Person : {{ $event->contact_person }} ({{
                    $event->contact_person_number }})</p>
            </div>
        </div>


    </section>

</x-layout>