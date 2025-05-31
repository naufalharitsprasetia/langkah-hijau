<!-- Article Card -->
<div
    class="bg-white dark:bg-zinc-900 border border-gray-300 dark:border-zinc-700 rounded-2xl shadow-sm overflow-hidden hover:shadow-md dark:hover:shadow-lg transition-all duration-300 group">
    <div class="p-4 sm:p-6">
        <!-- Article Image -->
        <div
            class="w-full h-36 sm:h-40 lg:h-48 bg-gradient-to-br from-green-100 to-blue-100 dark:from-green-900 dark:to-blue-900 rounded-xl mb-4 flex items-center justify-center overflow-hidden group-hover:scale-105 transition-transform duration-300">
            @if($post->is_demo == true)
            <img src="{{ asset('img/posts/') }}/{{ $post->image }}" alt=""
                class="w-full h-full object-cover rounded-xl">
            @else
            <img src="{{ asset('storage/' . $post->image) }}" alt="" class="w-full h-full object-cover rounded-xl">
            @endif
        </div>

        <!-- Category and Date -->
        <div class="flex flex-col xs:flex-row xs:justify-between xs:items-center gap-2 xs:gap-0 mb-3">
            <span
                class="bg-hijaumuda dark:bg-hijautua text-white px-3 py-1 rounded-full text-xs sm:text-sm font-medium w-fit">
                {{ $post->category }}</span>
            <span class="text-gray-500 dark:text-gray-400 text-xs sm:text-sm">{{ $post->created_at }}</span>
        </div>

        <!-- Title -->
        <h4
            class="text-base sm:text-lg lg:text-xl font-bold text-gray-900 dark:text-white mb-3 leading-tight line-clamp-2">
            {{ $post->title }}
        </h4>

        <!-- Description -->
        <p class="text-gray-600 dark:text-gray-300 text-xs sm:text-sm leading-relaxed mb-4 line-clamp-3">
            {!! Str::limit(strip_tags($post->body), 150) !!}
        </p>

        <!-- Read More Link -->
        <a href="/edu-zone/{{ $post->id }}"
            class="inline-flex items-center text-hijautua dark:text-hijaumuda font-medium text-xs sm:text-sm hover:text-hijautua dark:hover:text-hijaumuda transition-colors">
            Read More
            <i class="fas fa-arrow-right ml-2 text-xs"></i>
        </a>
    </div>
</div>