<x-layout :title="$title" :active="$active">

    <div class="min-h-screen flex justify-center p-4 pt-14 md:mt-0 md:pt-0">
        <div id="container" class="w-full max-w-2xl rounded-3xl overflow-hidden flex flex-col">
            <div class="p-8 md:pt-0 flex-grow overflow-hidden flex flex-col">
                <div id="content" class="text-center mb-8">
                    <div
                        class="w-16 h-16 bg-gray-200 rounded-full pt-4 overflow-hidden mx-auto mb-4 flex items-center justify-center">
                        <img src="{{ asset('img/ask-ai.png') }}" alt="ai-bot">
                    </div>
                    @auth
                    <h2 class="text-2xl font-semibold text-gray-800 dark:text-white mb-2">Hi, {{ Auth::user()->name }}
                    </h2>
                    @else
                    <h2 class="text-2xl font-semibold text-gray-800 dark:text-white mb-2">Selamat Datang di Hijau AI
                    </h2>
                    @endauth
                    <p class="text-xl text-gray-600 dark:text-white mb-4">Tanya tentang Gaya Hidup Sehat dan Ramah
                        Lingkungan!</p>
                    <p class="text-sm text-gray-500 dark:text-zinc-300">Tanya Hijau Artificial Intelligence (Hijau AI)
                        siap
                        membantu Anda dengan informasi tentang gaya hidup sehat dan ramah
                        lingkungan.</p>
                </div>

                <div id="chat" class="flex-grow overflow-y-auto mb-4 hidden"></div>

                <div id="cards" class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
                    <!-- Card 1 -->
                    <div class="bg-gray-50 dark:bg-zinc-800 rounded-xl p-4 hover:shadow-md transition-shadow duration-300 cursor-pointer"
                        id="card1">
                        <div class="w-8 h-8 bg-green-100 rounded-full mb-3 flex items-center justify-center">
                            <svg class="w-4 h-4 text-hijautua" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                        <h3 class="text-sm font-medium text-gray-800 dark:text-white">Mulai Gaya Hidup Zero Waste</h3>
                        <p class="text-xs text-gray-500 mt-1">Kurangi Sampah Mulai Hari Ini</p>
                    </div>

                    <!-- Card 2 -->
                    <div class="bg-gray-50 dark:bg-zinc-800 rounded-xl p-4 hover:shadow-md transition-shadow duration-300 cursor-pointer"
                        id="card2">
                        <div class="w-8 h-8 bg-green-100 rounded-full mb-3 flex items-center justify-center">
                            <svg class="w-4 h-4 text-hijautua" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                        <h3 class="text-sm font-medium text-gray-800 dark:text-white">Kurangi Emisi Karbon Harian</h3>
                        <p class="text-xs text-gray-500 mt-1">Transportasi & Konsumsi Ramah Lingkungan</p>
                    </div>

                    <!-- Card 3 -->
                    <div class="bg-gray-50 dark:bg-zinc-800 rounded-xl p-4 hover:shadow-md transition-shadow duration-300 cursor-pointer"
                        id="card3">
                        <div class="w-8 h-8 bg-green-100 rounded-full mb-3 flex items-center justify-center">
                            <svg class="w-4 h-4 text-hijautua" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                        <h3 class="text-sm font-medium text-gray-800 dark:text-white">Kuis & Tantangan Harian</h3>
                        <p class="text-xs text-gray-500 mt-1">Uji Pengetahuan & Raih Green Points</p>
                    </div>
                </div>


                <div class="fixed bottom-0 left-0 right-0 p-4 bg-white dark:bg-zinc-900 z-50">
                    <div class="max-w-2xl mx-auto">
                        <div class="input-field relative">
                            <input id="userInput" type="text"
                                placeholder="Tanya tentang Gaya Hidup Sehat dan Ramah Lingkungan"
                                class="w-full py-3 px-4 bg-gray-100 dark:bg-zinc-800 rounded-full text-gray-700 dark:text-zinc-200 dark:placeholder:text-gray-200 focus:outline-none focus:ring-2 focus:ring-hijaumuda"
                                autocomplete="off">
                            <button id="sendButton"
                                class="absolute cursor-pointer right-2 top-1/2 transform -translate-y-1/2 bg-hijautua text-white px-4 py-2 rounded-full text-sm hover:bg-hijautua transition-colors duration-300">
                                Kirim
                            </button>
                        </div>
                        <div class="ai-footer">
                            <p class="text-xs text-gray-500 dark:text-zinc-300 text-center mt-4">Powered by <a
                                    href="https://google.gemini.com" class="text-hijautua hover:underline">Google
                                    Gemini✨</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="h-20"></div>
    {{-- Footer --}}
    <footer
        class="relative bg-white dark:bg-zinc-900 text-gray-600 h-fit dark:text-gray-400 py-8 px-4 sm:px-6 lg:px-8 z-30">
        <div class="max-w-6xl mx-auto ">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 ">
                <!-- Logo and Social Icons -->
                <div class="space-y-4">
                    <div class="flex items-center space-x-2">
                        <img src="/img/logoweb.png" width="40" height="40" alt="AgriConnect Logo" class="w-10 h-10">
                        <span class="text-xl font-bold">Langkah<span class="text-hijaumuda">Hijau</spanc></span>
                    </div>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-gray-500">
                            <span class="sr-only">Twitter</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path
                                    d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84">
                                </path>
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-gray-500">
                            <span class="sr-only">YouTube</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M19.812 5.418c.861.23 1.538.907 1.768 1.768C21.998 8.746 22 12 22 12s0 3.255-.418 4.814a2.504 2.504 0 0 1-1.768 1.768c-1.56.419-7.814.419-7.814.419s-6.255 0-7.814-.419a2.505 2.505 0 0 1-1.768-1.768C2 15.255 2 12 2 12s0-3.255.417-4.814a2.507 2.507 0 0 1 1.768-1.768C5.744 5 11.998 5 11.998 5s6.255 0 7.814.418ZM15.194 12 10 15V9l5.194 3Z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-gray-500">
                            <span class="sr-only">Facebook</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-gray-500">
                            <span class="sr-only">LinkedIn</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Company Links -->
                <div>
                    <h3 class="text-sm font-semibold text-gray-400 uppercase tracking-wider mb-4">Company</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:text-gray-900 dark:hover:text-white">About Us</a></li>
                        <li><a href="#" class="hover:text-gray-900 dark:hover:text-white">Contact</a></li>
                        <li><a href="#" class="hover:text-gray-900 dark:hover:text-white">Support</a></li>
                        <li><a href="#" class="hover:text-gray-900 dark:hover:text-white">News</a></li>
                        <li><a href="#" class="hover:text-gray-900 dark:hover:text-white">Careers</a></li>
                    </ul>
                </div>

                <!-- Legal Links -->
                <div>
                    <h3 class="text-sm font-semibold text-gray-400 uppercase tracking-wider mb-4">Legal</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:text-gray-900 dark:hover:text-white">Imprint</a></li>
                        <li><a href="#" class="hover:text-gray-900 dark:hover:text-white">Privacy Policy</a></li>
                        <li><a href="#" class="hover:text-gray-900 dark:hover:text-white">Terms of Use</a></li>
                        <li><a href="#" class="hover:text-gray-900 dark:hover:text-white">Cookies Policy</a></li>
                    </ul>
                </div>

                <!-- Services Links -->
                <div>
                    <h3 class="text-sm font-semibold text-gray-400 uppercase tracking-wider mb-4">Services</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:text-gray-900 dark:hover:text-white">IoT Sensors</a></li>
                        <li><a href="#" class="hover:text-gray-900 dark:hover:text-white">AI Monitoring</a></li>
                        <li><a href="#" class="hover:text-gray-900 dark:hover:text-white">Marketplace</a></li>
                        <li><a href="#" class="hover:text-gray-900 dark:hover:text-white">Farmer Support</a></li>
                        <li><a href="#" class="hover:text-gray-900 dark:hover:text-white">Smart Irrigation</a></li>
                    </ul>
                </div>
            </div>

            <!-- Bottom Section -->
            <div class="mt-8 pt-8 border-t border-gray-200 dark:border-gray-700">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <p class="text-xs">&copy; 2025 LangkahHijau. All rights reserved.</p>
                    <nav class="flex space-x-4 mt-4 md:mt-0">
                        <a href="#" class="text-xs hover:text-gray-900 dark:hover:text-white">Privacy Policy</a>
                        <a href="#" class="text-xs hover:text-gray-900 dark:hover:text-white">Terms of Service</a>
                        <a href="#" class="text-xs hover:text-gray-900 dark:hover:text-white">Cookie Settings</a>
                    </nav>
                </div>
            </div>
        </div>
    </footer>
</x-layout>

<script>
    // hapus footer, bikin sendiri
    const footlangkahhijau = document.getElementById('footerlangkahhijau');
    footlangkahhijau.classList.add('hidden');
    // klik Card
    const card1 = document.getElementById('card1');
    const card2 = document.getElementById('card2');
    const card3 = document.getElementById('card3');
    const userInputforcard = document.getElementById('userInput');
    card1.addEventListener('click', function() {
        userInputforcard.value = "Bantu saya mulai gaya hidup zero waste. Apa yang harus saya lakukan pertama kali?";
        userInputforcard.focus(); // Tambahkan fokus
    });
    card2.addEventListener('click', function() {
        userInputforcard.value = "Bagaimana cara sederhana untuk mengurangi emisi karbon dalam aktivitas harian saya?";
        userInputforcard.focus(); // Tambahkan fokus
    });
    card3.addEventListener('click', function() {
        userInputforcard.value = "Tantangan apa yang tersedia hari ini dan bagaimana saya bisa mendapatkan green points?";
        userInputforcard.focus(); // Tambahkan fokus
    });
</script>
@vite(['resources/js/404.js'])
<script>
    //
    document.addEventListener('DOMContentLoaded', function() {
    const container = document.getElementById('container');
    const content = document.getElementById('content');
    const cards = document.getElementById('cards');
    const chat = document.getElementById('chat');
    const userInput = document.getElementById('userInput');
    const sendButton = document.getElementById('sendButton');

    // pindah ke resources/js/gsap.js

    let isGenerating = false;
    let controller;

    function addMessage(type, message) {
        const messageDiv = document.createElement('div');
        messageDiv.className = `mb-4 ${type === 'user' ? 'text-right' : 'text-left'}`;
        messageDiv.innerHTML = `
            <div class="inline-block p-3 rounded-lg ${type === 'user' ? 'bg-hijautua text-white' : 'text-gray-800 dark:text-zinc-200'}">
                ${formatMessage(message)}
            </div>
            `;
        chat.appendChild(messageDiv);

        // Ensure the chat always scrolls to the latest message
        setTimeout(() => {
            chat.scrollTop = chat.scrollHeight;
        }, 100);
    }

    function formatMessage(message) {
        return message.replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>'); // Bold formatting
    }

    function addSkeleton() {
        const skeletonDiv = document.createElement('div');
        skeletonDiv.id = 'skeleton-loader';
        skeletonDiv.className = 'mb-4 text-left';
        skeletonDiv.innerHTML = `
            <div class="inline-block p-3 rounded-lg text-gray-800 animate-pulse w-[20rem]">
                <div class="h-4 bg-gray-300 rounded w-3/4 mb-2"></div>
                <div class="h-4 bg-gray-300 rounded w-1/2"></div>
            </div>
        `;
        chat.appendChild(skeletonDiv);

        // Ensure the chat always scrolls to the latest message
        setTimeout(() => {
            chat.scrollTop = chat.scrollHeight;
        }, 100);
    }

    function removeSkeleton() {
        const skeleton = document.getElementById('skeleton-loader');
        if (skeleton) skeleton.remove();
    }

    function handleSendMessage() {
        const message = userInput.value.trim();
        if (message === '') return;

        const context = "System = Kamu adalah Hijau AI, asisten virtual dari aplikasi LangkahHijau yang fokus pada edukasi gaya hidup sehat dan ramah lingkungan. Jawablah semua pertanyaan dengan singkat, jelas, dan to the point. Topik yang bisa kamu jawab meliputi: pengelolaan sampah, zero waste, pengurangan emisi karbon, gaya hidup berkelanjutan, kuis dan tantangan harian di aplikasi LangkahHijau, serta sistem Green Points dan Badge. Jangan menjawab pertanyaan yang berada di luar konteks tema gaya hidup sehat dan ramah lingkungan.  <br> prompt user = "

        if (chat.children.length === 0) {
            content.classList.add('hidden');
            cards.classList.add('hidden');
            chat.classList.remove('hidden');
        }

        addMessage('user', message);
        userInput.value = '';

        if (isGenerating) {
            stopGenerating();
        } else {
            addSkeleton();
            generateResponse(context + message );
        }
    }

    function stopGenerating() {
        if (controller) {
            controller.abort();
            controller = null;
            isGenerating = false;
            sendButton.textContent = 'Send'; // Change button back to 'Send'
        }
    }

    function generateResponse(text) {
        controller = new AbortController(); // Create a new controller for fetch
        isGenerating = true;
        sendButton.textContent = 'Stop'; // Change button to 'Stop'

        fetch("/hijau-ai", {
            method: "POST",
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ prompt: text }),
            signal: controller.signal // Attach the signal to the request
        })
        .then(response => response.json())
        .then(data => {
            // Remove skeleton loader
            removeSkeleton();
            isGenerating = false; // Reset generating state
            sendButton.textContent = 'Send'; // Change button back to 'Send'

            console.log(data);
            // Akses hasil teks dari Gemini
            const textHasil = data?.candidates?.[0]?.content?.parts?.[0]?.text || "Tidak ada respon.";
            // Simulate typing effect
            typeOutResponse(textHasil);
        })
        .catch(error => {
            if (error.name === 'AbortError') {
                console.log('Response generation aborted.');
            } else {
                console.error('Error:', error);
                removeSkeleton(); // Remove skeleton in case of error
            }
            isGenerating = false; // Reset generating state
            sendButton.textContent = 'Send'; // Change button back to 'Send'
        });
    }

    function typeOutResponse(text) {
        const typingDiv = document.createElement('div');
        typingDiv.className = 'mb-4 text-left';
        typingDiv.innerHTML = `
            <div class="inline-block p-3 rounded-lg text-gray-800 dark:text-zinc-200 typing-effect">
                <span></span>
            </div>
        `;
        chat.appendChild(typingDiv);
        chat.scrollTop = chat.scrollHeight; // Scroll to the bottom

        let index = 0;
        const typingSpeed = 50; // Adjust typing speed here
        const typeNextChar = () => {
            if (index < text.length) {
                const span = typingDiv.querySelector('span');
                span.innerHTML += text[index++];
                setTimeout(typeNextChar, typingSpeed);
            } else {
                // Remove typing effect div after typing is done
                setTimeout(() => {
                    typingDiv.innerHTML = `
                        <div class="inline-block p-3 rounded-lg text-gray-800 dark:text-zinc-200">
                            ${formatMessage(text)}
                        </div>
                    `;
                }, 500); // Delay before replacing with formatted text
            }
        };
        typeNextChar();
    }

    sendButton.addEventListener('click', handleSendMessage);
    userInput.addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            handleSendMessage();
        }
    });

    // Always focus input for better UX
    userInput.focus();
});
</script>