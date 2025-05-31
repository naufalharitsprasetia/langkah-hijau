<x-sidebar.layout :title="$title" :active="$active">
    <!-- Konten Utama -->
    <div class="flex flex-col w-full">
        <main class="w-full">
            <div class="mx-auto py-6 sm:px-6 lg:px-8">
                <!-- Isi Halaman -->
                <a href="{{ route('user.leaderboard') }}"
                    class="block mb-2 p-2 text-sm text-hijautua hover:text-hijaumuda">
                    Kembali</a>
                <h2 class="text-2xl font-semibold text-zinc-900 dark:text-white">Informasi Tentang Tier</h2>
                <br>
                {{-- Tier Info --}}
                <div class="tier-info">
                    @foreach ($tiers as $tier)
                    {{-- text-blue-600 dark:text-blue-400' : 'text-gray-700 dark:text-gray-300 --}}
                    <div
                        class="tier p-3 rounded-lg {{  $tier->id == auth()->user()->tier->id  ? 'text-blue-600 dark:text-blue-400 bg-blue-100 dark:bg-blue-900/30 border border-blue-200 dark:border-blue-800' : 'bg-gray-200 dark:bg-gray-600/50 text-gray-700 dark:text-gray-300' }}">
                        <h2>Tier Icon : {{ $tier->icon }}</h2>
                        <h2>Tier : {{ $tier->name }}</h2>
                        <p>Urutan : {{ $tier->urutan }}</p>
                        <p>Minimal Green Points : {{ $tier->min_points }}</p>
                        <p>Maximal Green Points : {{ $tier->max_points }}</p>
                        <p>Keterangan : {{ $tier->keterangan }}</p>
                    </div>
                    <br>
                    @endforeach
                </div>
            </div>
        </main>
    </div>
</x-sidebar.layout>