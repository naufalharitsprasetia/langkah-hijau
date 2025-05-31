<x-layout :title="$title" :active="$active">

    <div x-data="teamSlider()" x-init="init()"
        class="relative bg-gray-100 dark:bg-gray-900 min-h-screen flex flex-col items-center justify-center overflow-hidden px-4">

        <!-- Profile Section -->
        <div class="relative z-10 max-w-5xl w-full bg-transparent pt-12">
            <div class="grid grid-cols-1 lg:grid-cols-2 items-stretch gap-8">

                <!-- Text Content -->
                <div class="space-y-4 fade-in">
                    <p class="text-sm text-gray-500 dark:text-gray-400">Management Team</p>
                    <h1 class="text-4xl lg:text-5xl font-bold text-gray-900 dark:text-white"
                        x-text="members[current] ? members[current].name : ''"></h1>
                    <h2 class="text-lg text-gray-700 dark:text-gray-300 font-medium" x-text="members[current]?.position"></h2>
                    <p class="text-gray-600 dark:text-gray-300 leading-relaxed" x-text="members[current]?.description"></p>
                </div>

                <!-- Image + Navigation -->
                <div class="relative flex justify-center items-end self-end h-full lg:items-end lg:h-full lg:self-end">
                    <!-- Left Nav -->
                    <button @click="prev"
                        class="absolute left-0 top-1/2 -translate-y-1/2 bg-white dark:bg-gray-800 p-2 rounded-full shadow z-20">
                        <i class="fas fa-chevron-left text-gray-600 dark:text-white"></i>
                    </button>

                    <div
                        class="w-full sm:w-96 md:w-[28rem] lg:w-[40rem] xl:w-[50rem] h-full rounded-2xl overflow-hidden z-10">
                        <img :src="members[current]?.image" alt="Vicky Tsui" class="w-full h-full object-cover">
                    </div>

                    <!-- Right Nav -->
                    <button @click="next"
                        class="absolute right-0 top-1/2 -translate-y-1/2 bg-white dark:bg-gray-800 p-2 rounded-full shadow z-20">
                        <i class="fas fa-chevron-right text-gray-600 dark:text-white"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Team Members Thumbnails -->
        <div class="absolute bottom-0 left-0 w-full z-20">
            <div
                class="dark:bg-gray-800/70 backdrop-blur-[3px] border-t border-white dark:border-gray-600 shadow-2xl px-4 py-6 flex justify-center gap-6">
                <template x-for="(member, index) in members" :key="index">
                    <div class="text-center cursor-pointer" @click="goTo(index)">
                        <div :class="{
                            'ring-4 ring-blue-500 scale-110': current === index,
                            'ring-2 ring-gray-400': current !== index
                        }"
                            class="transition-all duration-300 w-16 h-16 rounded-full overflow-hidden mx-auto mb-2">
                            <img :src="member.image" alt="" class="w-full h-full object-cover">
                        </div>
                        <p class="text-sm font-semibold text-gray-900 dark:text-white" x-text="member.name"></p>
                        <p class="text-xs text-gray-500 dark:text-gray-400" x-text="member.short"></p>
                    </div>
                </template>
            </div>
        </div>



        <!-- Visit Button -->
        <div class="fixed bottom-6 left-6 z-30">
            <button
                class="bg-gray-900 dark:bg-gray-700 text-white px-6 py-3 rounded-full shadow hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                <i class="fas fa-external-link-alt mr-2"></i> Visit site
            </button>
        </div>

    </div>

    {{-- debuggin --}}
    {{-- <pre x-text="JSON.stringify(members[current], null, 2)"></pre> --}}

    {{-- for slider --}}
    <script>
        function teamSlider() {
            return {
                current: 0,
                members: [
                    {
                        name: 'Vicky Tsui',
                        position: 'Vice President of Sales & Marketing',
                        description: 'Ms. Tsui oversees business development...',
                        short: 'VP of Marketing',
                        image: '{{ asset('img/tentang/person-1.png') }}'
                    },
                    {
                        name: 'Alex Tan',
                        position: 'CTO',
                        description: 'Alex is responsible for tech operations...',
                        short: 'CTO',
                        image: '{{ asset('img/tentang/person-1.png') }}'
                    },
                    {
                        name: 'Jane Liu',
                        position: 'Chief Designer',
                        description: 'Jane leads the design innovation team...',
                        short: 'Designer',
                        image: '{{ asset('img/tentang/person-1.png') }}'
                    },
                ],
                init() {
                    // Optional: check if members exists
                    if (this.members.length === 0) {
                        console.error('No team members found!');
                    }
                },
                next() {
                    this.current = (this.current + 1) % this.members.length;
                },
                prev() {
                    this.current = (this.current - 1 + this.members.length) % this.members.length;
                },
                goTo(index) {
                    this.current = index;
                }
            };
        }
    </script>
    


</x-layout>
