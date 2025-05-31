<x-layout :title="$title" :active="$active">
    <div class="animasi flex items-center justify-center max-w-7xl mx-auto">
        <canvas id="dotLottie-canvas" class="mx-auto w-48 h-48 md:w-64 md:h-64">
        </canvas>
    </div>
    <x-post.article :active="$active" :postUtama="$postUtama" :posts="$posts" />
    @vite('resources/js/lottie.js')
</x-layout>