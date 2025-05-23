<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-16 py-12">
            <div class="lg:grid lg:grid-cols-2 lg:gap-8 mt-12">
                <div>
                    <h2 class="text-3xl font-extrabold text-gray-900 dark:text-white sm:text-4xl">
                        Hubungi Kami
                    </h2>
                    <p class="mt-3 text-lg text-gray-500 dark:text-gray-300">
                        Kami senang mendengar dari Anda! Silakan isi formulir di bawah ini atau hubungi kami langsung
                        melalui WhatsApp.
                    </p>
                    <dl class="mt-8 text-base text-gray-500 dark:text-gray-300">
                        <div class="mt-6">
                            <dt class="sr-only"> Nomor Telepon</dt>
                            <dd class="flex">
                                <svg class="flex-shrink-0 h-6 w-6 text-green-600" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                                <span class="ml-3">+62 812 2059 4202</span>
                            </dd>
                        </div>
                        <div class="mt-3">
                            <dt class="sr-only">Email</dt>
                            <dd class="flex">
                                <svg class="flex-shrink-0 h-6 w-6 text-green-600" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                <span class="ml-3">langkahhijau@gmail.com</span>
                            </dd>
                        </div>
                    </dl>
                </div>
                <div class="mt-8 lg:mt-0">
                    <div class="border dark:border-zinc-600 rounded-lg shadow sm:rounded-lg">
                        <div class="px-4 py-5 sm:p-6">
                            <h3 class="text-lg font-medium leading-6 text-gray-900 dark:text-gray-100">Kirim Pesan
                                kepada Kami
                            </h3>
                            <div class="mt-5">
                                <form action="{{ route('home.kontak') }}" method="POST" id="contact-form">
                                    @csrf
                                    <div>
                                        <label for="name"
                                            class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nama</label>
                                        <div class="mt-2">
                                            <input type="text" name="name" id="name"
                                                class="shadow-sm bg-transparent border dark:border-zinc-600 text-gray-900 dark:text-white py-2 px-1 focus:ring-green-600 focus:border-green-600 block w-full sm:text-sm border-gray-300 rounded-md"
                                                required>
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <label for="email"
                                            class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                                        <div class="mt-2">
                                            <input type="email" name="email" id="email"
                                                class="shadow-sm bg-transparent border dark:border-zinc-600 text-gray-900 dark:text-white py-2 px-1 focus:ring-green-600 focus:border-green-600 block w-full sm:text-sm border-gray-300 rounded-md"
                                                required>
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <label for="message"
                                            class="block text-sm font-medium text-gray-700 dark:text-gray-300">Pesan</label>
                                        <div class="mt-2">
                                            <textarea id="message" name="message" rows="4"
                                                class="shadow-sm bg-transparent border dark:border-zinc-600 text-gray-900 dark:text-white py-2 px-1 focus:ring-green-600 focus:border-green-600 block w-full sm:text-sm border-gray-300 rounded-md"
                                                required></textarea>
                                        </div>
                                    </div>
                                    <div class="mt-5">
                                        <button type="submit"
                                            class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-green-600 hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-600">
                                            Kirim Pesan
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('contact-form').addEventListener('submit', function(e) {
            e.preventDefault();

            const name = document.getElementById('name').value;
            const email = document.getElementById('email').value;
            const message = document.getElementById('message').value;

            // Construct the WhatsApp message
            const whatsappMessage =
                `Halo Agriconnect, Nama Saya: ${name}%0AEmail: ${email}%0A, Pesan: ${message}`;

            // Replace 'YOUR_PHONE_NUMBER' with your actual WhatsApp business number
            const whatsappUrl = `https://api.whatsapp.com/send?phone=6281220594202&text=${whatsappMessage}`;

            // Open WhatsApp in a new tab
            window.open(whatsappUrl, '_blank');

            // You can also submit the form to your backend here if needed
            // this.submit();
        });
    </script>
</x-layout>