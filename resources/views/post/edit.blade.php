<link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />
<x-sidebar.layout :title="$title" :active="$active">
    @if (session()->has('success'))
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <div class="alert alert-success col-lg-12 mt-4" role="alert">
            {{ session('success') }}
        </div>
    </div>
    @endif
    @if ($errors->any())
    <div class="mx-auto max-w-7xl">
        <div class="alert alert-error col-lg-12 mt-4" role="alert">
            @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
            @endforeach
        </div>
    </div>
    @endif
    <!-- Konten Utama -->
    <div class="flex flex-col w-full">
        <main class="w-full">
            <div class="mx-auto py-6 sm:px-6 lg:px-8">
                <!-- Isi Halaman -->
                <a href="{{ route('post.manage') }}" class="mb-4 p-2 text-sm text-hijautua hover:text-hijaumuda">
                    <- Kembali</a>
                        <h2 class="text-2xl font-semibold text-zinc-900 dark:text-white">Edit Post</h2>
                        <br>
                        {{-- Form Create --}}
                        <section class="bg-white dark:bg-gray-900">
                            <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
                                <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Edit Post</h2>
                                {{-- edit --}}
                                <form action="{{ route('post.update', $post->id) }}" method="POST"
                                    enctype="multipart/form-data" id="formPost">
                                    @csrf
                                    @method('put')
                                    <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                                        <div class="sm:col-span-2">
                                            <label for="title"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                                            <input type="text" name="title" id="title"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="Write Post title..."
                                                value="{{ old('title', $post->title) }}" required>
                                        </div>
                                        <div class="sm:col-span-2">
                                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                                for="image">Upload image (max.5mb)</label>
                                            <input
                                                class="cursor-pointer bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                id="image" name="image" type="file">
                                        </div>
                                        <div class="sm:col-span-2">
                                            <label for="category"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                                            <select id="category" name="category" required
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                <option value="🌱 Zero Waste" {{ $post->category == '🌱 Zero Waste' ?
                                                    'selected' : '' }}>🌱 Zero Waste</option>
                                                <option value="🛍️ Konsumsi Berkelanjutan" {{ $post->category == '🛍️
                                                    Konsumsi Berkelanjutan' ?
                                                    'selected' : '' }}>🛍️ Konsumsi Berkelanjutan
                                                </option>
                                                <option value="🚶 Transportasi Hijau" {{ $post->category == '🚶
                                                    Transportasi Hijau' ?
                                                    'selected' : '' }}>🚶 Transportasi Hijau</option>
                                                <option value="🍽️ Makanan Ramah Lingkungan" {{ $post->category == '🍽️
                                                    Makanan Ramah Lingkungan' ?
                                                    'selected' : '' }}>🍽️ Makanan Ramah
                                                    Lingkungan</option>
                                                <option value="🔌 Energi dan Elektronik" {{ $post->category == '🔌
                                                    Energi dan Elektronik' ?
                                                    'selected' : '' }}>🔌 Energi dan Elektronik
                                                </option>
                                            </select>
                                        </div>
                                        {{-- <div class="sm:col-span-2">
                                            <label for="body"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Body</label>
                                            <textarea id="body" name="body" rows="8"
                                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="Your Body here"
                                                required>{{ old('body', $post->body) }}</textarea>
                                        </div> --}}
                                    </div>
                                    <br>
                                    <div class="sm:col-span-2">
                                        <label for="editor"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Body</label>
                                        <div id="editor" style="min-height: 200px;"
                                            class="bg-white dark:bg-gray-700 p-2 border border-gray-300 rounded">{!!
                                            $post->body !!}</div>
                                        <input type="hidden" name="body" id="body">
                                    </div>
                                    <button type="submit"
                                        class="cursor-pointer inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                                        Update Post
                                    </button>
                                </form>
                            </div>
                        </section>
            </div>
        </main>
    </div>
</x-sidebar.layout>

<script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
<script>
    const quill = new Quill('#editor', {
        theme: 'snow'
    });
    // Simpan isi Quill ke input hidden sebelum submit
    const form = document.getElementById('formPost');
    form.onsubmit = () => {
        const content = quill.root.innerHTML.trim();
        if (content === '<p><br></p>' || content === null) {
            alert('Isi body tidak boleh kosong');
            e.preventDefault();
            return false;
        }
        document.querySelector('#body').value = content;
    };
</script>