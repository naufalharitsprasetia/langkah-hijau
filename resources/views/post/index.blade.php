<x-layout :title="$title" :active="$active">
    <x-post.article :active="$active" :postUtama="$postUtama" :posts="$posts" />
    @vite('resources/js/lottie.js')
</x-layout>