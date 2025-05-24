<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="min-h-screen flex justify-center p-4 pt-14 md:mt-0 md:pt-0">
        <div id="container" class="w-full max-w-2xl rounded-3xl overflow-hidden flex flex-col mt-24">
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
                        membantu Anda dengan informasi tentang pertanian di Indonesia.</p>
                </div>

                <div id="chat" class="flex-grow overflow-y-auto mb-4 hidden"></div>

                <div id="cards" class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
                    <div class="bg-gray-50 dark:bg-card rounded-xl p-4 hover:shadow-md transition-shadow duration-300">
                        <div class="w-8 h-8 bg-gray-200 rounded-full mb-3 flex items-center justify-center">
                            <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                        <h3 class="text-sm font-medium text-gray-800 dark:text-white">Peluang Pertanian 2024</h3>
                        <p class="text-xs text-gray-500 mt-1">Inovasi & Peluang</p>
                    </div>
                    <div class="bg-gray-50 dark:bg-card rounded-xl p-4 hover:shadow-md transition-shadow duration-300">
                        <div class="w-8 h-8 bg-gray-200 rounded-full mb-3 flex items-center justify-center">
                            <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                        <h3 class="text-sm font-medium text-gray-800 dark:text-white">Teknologi Pertanian Modern</h3>
                        <p class="text-xs text-gray-500 mt-1">Tren Teknologi</p>
                    </div>
                    <div class="bg-gray-50 dark:bg-card rounded-xl p-4 hover:shadow-md transition-shadow duration-300">
                        <div class="w-8 h-8 bg-gray-200 rounded-full mb-3 flex items-center justify-center">
                            <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                        <h3 class="text-sm font-medium text-gray-800 dark:text-white">Praktik Pertanian Berkelanjutan
                        </h3>
                        <p class="text-xs text-gray-500 mt-1">Pertanian Berkelanjutan</p>
                    </div>
                </div>

                <div class="fixed bottom-0 left-0 right-0 p-4 bg-white dark:bg-zinc-900 z-50">
                    <div class="max-w-2xl mx-auto">
                        <div class="input-field relative">
                            <input id="userInput" type="text" placeholder="Tanya tentang pertanian"
                                class="w-full py-3 px-4 bg-gray-100 dark:bg-card rounded-full text-gray-700 dark:text-zinc-200 focus:outline-none focus:ring-2 focus:ring-green-300"
                                autocomplete="off">
                            <button id="sendButton"
                                class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-green-600 text-white px-4 py-2 rounded-full text-sm hover:bg-green-600 transition-colors duration-300">
                                Send
                            </button>
                        </div>
                        <div class="ai-footer">
                            <p class="text-xs text-gray-500 dark:text-zinc-300 text-center mt-4">Powered by <a
                                    href="https://google.gemini.com" class="text-green-600 hover:underline">Google
                                    Gemini✨</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="h-20"></div>
</x-layout>

<script>
    document.addEventListener('DOMContentLoaded', function() {
    const container = document.getElementById('container');
    const content = document.getElementById('content');
    const cards = document.getElementById('cards');
    const chat = document.getElementById('chat');
    const userInput = document.getElementById('userInput');
    const sendButton = document.getElementById('sendButton');

    gsap.from(container, { opacity: 0, duration: 1 });
    gsap.from(content, { y: 20, opacity: 0, duration: 0.8, delay: 0.5 });
    gsap.from(cards.children, { y: 30, opacity: 0, duration: 0.5, stagger: 0.2, delay: 1 });
    gsap.from(userInput, { y: 20, opacity: 0, duration: 0.5, delay: 1.5 });
    gsap.from(sendButton, { y: 20, opacity: 0, duration: 0.5, delay: 1.5 });

    let isGenerating = false;
    let controller;

    function addMessage(type, message) {
        const messageDiv = document.createElement('div');
        messageDiv.className = `mb-4 ${type === 'user' ? 'text-right' : 'text-left'}`;
        messageDiv.innerHTML = `
            <div class="inline-block p-3 rounded-lg ${type === 'user' ? 'bg-green-600 text-white' : 'text-gray-800 dark:text-zinc-200'}">
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