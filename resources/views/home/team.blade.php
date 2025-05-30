<x-layout :title="$title" :active="$active">

    <div x-data="teamSlider()" x-init="init()"
        class="relative bg-green-100 dark:bg-gray-900 w-screen h-screen flex flex-col items-center justify-center overflow-hidden px-4">

        <!-- Profile Section -->
        <div class="relative z-10 max-w-5xl w-full bg-transparent pt-12">
            <div class="grid grid-cols-1 lg:grid-cols-2 items-stretch gap-8">

                <!-- Text Content -->
                <div class="space-y-4 fade-in">
                    <p class="text-xl text-black-500 dark:text-gray-400 font-bold">Our Team</p>
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
                            'ring-4 ring-green-500 scale-110': current === index,
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
                        description: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus veritatis, similique hic, pariatur id sunt excepturi placeat aliquam adipisci et quia, soluta modi odio magni molestiae nihil illo fugiat officiis! ',
                        short: 'VP of Marketing',
                        image: '{{ asset('img/tentang/person-1.png') }}'
                    },
                    {
                        name: 'Alex Tan',
                        position: 'CTO',
                        description: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus veritatis, similique hic, pariatur id sunt excepturi placeat aliquam adipisci et quia, soluta modi odio magni molestiae nihil illo fugiat officiis! ',
                        short: 'CTO',
                        image: '{{ asset('img/tentang/person-2.png') }}'
                    },
                    {
                        name: 'Jane Liu',
                        position: 'Chief Designer',
                        description: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus veritatis, similique hic, pariatur id sunt excepturi placeat aliquam adipisci et quia, soluta modi odio magni molestiae nihil illo fugiat officiis!',
                        short: 'Designer',
                        image: '{{ asset('img/tentang/person-3.png') }}'
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
