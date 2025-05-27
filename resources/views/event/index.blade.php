<x-layout :title="$title" :active="$active">
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-16 pb-12">
        <!-- Page Header -->
        <div class="text-center mb-8 sm:mb-12">
            <h2
                class="mx-auto mb-4 max-w-2xl text-center text-4xl font-semibold text-balance text-hijautua dark:text-hijaumuda sm:text-5xl">
                Green Events
            </h2>
            <p class="text-base sm:text-lg text-gray-600 dark:text-gray-400 max-w-3xl mx-auto leading-relaxed">
                Jangan ketinggalan event-event yang akan datang. Pilihkan sesuai dengan minat Anda dan silakan hadir di
                kota terdekat Anda.
            </p>
        </div>

        <!-- Event Card -->
        <div class="max-w-2xl mx-auto">
            <div
                class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-200 dark:border-gray-700">

                <!-- Event Image/Header -->
                <div class="relative bg-gradient-to-br from-purple-500 to-blue-600 p-6 sm:p-8">
                    <div
                        class="w-full xl:w-80 h-48 sm:h-56 lg:h-64 bg-gradient-to-br from-green-100 to-blue-100 dark:from-green-900 dark:to-blue-900 rounded-2xl flex items-center justify-center overflow-hidden">
                        <img src="./img/events/kompos.png" alt="" class="w-full h-full object-cover rounded-2xl">
                    </div>
                </div>

                <!-- Event Details -->
                <div class="p-6 sm:p-8">
                    <!-- Event Type Badge -->
                    <div class="mb-4">
                        <span
                            class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-300 border border-green-200 dark:border-green-800">
                            {{ $eventUtama->category }}
                        </span>
                    </div>

                    <!-- Event Title -->
                    <h3 class="text-xl sm:text-2xl font-bold text-pink-500 dark:text-pink-400 mb-2 leading-tight">
                        {{ $eventUtama->title }}
                    </h3>

                    <!-- Organizer -->
                    <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">
                        oleh: <span class="font-medium">{{ $eventUtama->penyelenggara }}</span>
                    </p>

                    <!-- Event Description -->
                    <p class="text-gray-700 dark:text-gray-300 mb-6 leading-relaxed">
                        {{ $eventUtama->description }}
                    </p>

                    <!-- Event Stats -->
                    <div
                        class="flex flex-col sm:flex-row sm:justify-between sm:items-center space-y-2 sm:space-y-0 text-sm">
                        <div class="flex items-center space-x-4">
                            <div class="flex items-center space-x-1 text-gray-600 dark:text-gray-400">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                                    </path>
                                </svg>
                                <span>Sisa Kuota: <span
                                        class="font-semibold text-gray-900 dark:text-white">1552</span></span>
                            </div>
                        </div>
                        <div class="flex items-center space-x-1 text-orange-600 dark:text-orange-400 font-medium">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span>2 Hari Lagi</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Call to Action Button -->
        <div class="text-center mt-8 sm:mt-12">
            <button
                class="bg-gradient-to-r from-pink-500 to-pink-600 hover:from-pink-600 hover:to-pink-700 text-white font-semibold px-8 py-3 rounded-full shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200 text-sm sm:text-base">
                LIHAT EVENT LAINNYA
            </button>
        </div>

        <!-- Additional Events Section (Optional) -->
        <div class="mt-16 sm:mt-20">
            <h2 class="text-2xl sm:text-3xl font-bold text-gray-900 dark:text-white text-center mb-8 sm:mb-12">
                Event Lainnya
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
                @foreach($events as $event)
                <div
                    class="bg-white dark:bg-gray-800 rounded-xl shadow-md hover:shadow-lg transition-all duration-300 overflow-hidden border border-gray-200 dark:border-gray-700">
                    <div class="bg-gradient-to-br from-blue-500 to-purple-600 h-32 sm:h-40"></div>
                    <div class="p-4 sm:p-6">
                        <span
                            class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900/30 dark:text-blue-300 mb-3">
                            Workshop
                        </span>
                        <h3 class="font-bold text-gray-900 dark:text-white mb-2 text-sm sm:text-base">
                            Event Title {{ $event->title }}
                        </h3>
                        <p class="text-gray-600 dark:text-gray-400 text-xs sm:text-sm mb-4">
                            {{ Str::limit($event->description, 100) }}
                        </p>
                        <div class="flex justify-between items-center text-xs sm:text-sm">
                            <span class="text-gray-500 dark:text-gray-400">1 hari lagi</span>
                            <span class="text-green-600 dark:text-green-400 font-medium">Gratis</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
    </section>

</x-layout>