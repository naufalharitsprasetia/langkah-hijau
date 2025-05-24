@php
$faqs = [
[
'id-toggle' => 'toggle-1',
'question' =>
'Apa itu LangkahHijau?',
'answer' =>
'LangkahHijau adalah aplikasi edukatif yang mengajak masyarakat untuk menjalani gaya hidup sehat dan ramah lingkungan
melalui kuis harian, tantangan, dan konten inspiratif.',
],
[
'id-toggle' => 'toggle-2',
'question' =>
'Apa saja manfaat menggunakan LangkahHijau?',
'answer' =>
'Pengguna dapat meningkatkan kesadaran lingkungan, belajar praktik berkelanjutan, mengikuti tantangan harian, serta
mengumpulkan Green Points yang membuka badge dan gelar kehormatan.',
],
[
'id-toggle' => 'toggle-3',
'question' => 'Bagaimana LangkahHijau memastikan penggunanya tetap termotivasi?',
'answer' =>
'Dengan sistem poin, badge, dan tantangan harian yang dirancang menarik, LangkahHijau memadukan edukasi dengan
gamifikasi untuk mendorong keterlibatan berkelanjutan.',
],
[
'id-toggle' => 'toggle-4',
'question' => 'Bagaimana cara mendapatkan Green Points?',
'answer' =>
'Kamu bisa mendapatkan Green Points dengan menjawab kuis harian, menyelesaikan tantangan, dan aktif mengikuti kegiatan
yang mendukung gaya hidup hijau di aplikasi.

.',
],
[
'id-toggle' => 'toggle-5',
'question' => 'Apa dampak nyata dari menggunakan aplikasi ini?',
'answer' =>
'LangkahHijau mendorong perubahan perilaku nyata—dari mengurangi sampah plastik hingga menghemat energi—dan
berkontribusi pada pengurangan jejak karbon individu.

',
],
[
'id-toggle' => 'toggle-6',
'question' => 'Siapa saja yang cocok menggunakan LangkahHijau?',
'answer' =>
'Semua orang! Baik pelajar, pekerja, maupun masyarakat umum yang ingin memulai atau memperkuat gaya hidup berkelanjutan
bisa memanfaatkan aplikasi ini sebagai panduan praktis.

',
],
];
@endphp

<div x-data="{
    activeAccordion: '',
    setActiveAccordion(id) {
        this.activeAccordion = (this.activeAccordion == id) ? '' : id
    }
}"
    class="relative w-full mx-auto overflow-hidden text-sm font-normal bg-white/40 dark:bg-zinc-900/40 backdrop-blur-lg dark:text-white border border-gray-300 dark:border-zinc-700 divide-y dark:divide-zinc-700 rounded-md">

    @foreach ($faqs as $faq)
    <div x-data="{ active: false }" class="cursor-pointer group border-gray-300 dark:border-zinc-700 cursor-pointer">
        <button @click="active = !active"
            class="flex items-center justify-between w-full p-4 text-left select-none group-hover:underline cursor-pointer">
            <span>{{ $faq['question'] }}</span>
            <svg class="w-4 h-4 duration-200 ease-out" :class="{ 'rotate-180': active }" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round">
                <polyline points="6 9 12 15 18 9"></polyline>
            </svg>
        </button>
        <div x-show="active" x-collapse x-cloak class="border-gray-300 dark:border-zinc-700">
            <div class="p-4 pt-0 opacity-70 border-gray-300 dark:border-zinc-700">
                {{ $faq['answer'] }}
            </div>
        </div>
    </div>
    @endforeach


</div>