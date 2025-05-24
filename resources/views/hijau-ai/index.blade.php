<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="underhero relative isolate">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-16 py-12">
            <div class="text-center">
                <h2 class="text-xl text-zinc-900 dark:text-white">Hijau AI✨</h2>
                <br>
                <form id="form-ai">
                    <input type="text" id="input-user-ai" value="" placeholder="Enter Prompt...">
                    <br>
                    <br>
                    <button type="submit"
                        class="bg-green-600 text-gray-100 rounded-md px-3 py-2 text-sm cursor-pointer">Ask</button>
                </form>
                <br>
                <p class="text-zinc-900 dark:text-white border-2 border-green-600 p-3" id="result"></p>
            </div>
        </div>
    </div>
</x-layout>

<script>
    async function callGemini(prompt) {
        const response = await fetch("/hijau-ai", {
            method: "POST",
            headers: {
            "Content-Type": "application/json",
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ prompt })
        });
        const data = await response.json();
        console.log(data);

         // Akses hasil teks dari Gemini
        const text = data?.candidates?.[0]?.content?.parts?.[0]?.text || "Tidak ada respon.";

        // Tampilkan ke elemen HTML
        document.getElementById("result").innerText = text;
    }
    document.getElementById('form-ai').addEventListener('submit', function(e) {
            e.preventDefault();
            const inputUser = document.getElementById('input-user-ai').value;
            callGemini(inputUser);
    });

</script>