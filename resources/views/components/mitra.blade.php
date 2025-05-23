<div x-data x-init="
            $nextTick(() => {
                const content = $refs.content;
                const item = $refs.item;
                const clone = item.cloneNode(true);
                content.appendChild(clone);
            });
    " class="relative w-full container-block">
    <div
        class="relative w-full py-3 mx-auto overflow-hidden text-lg italic tracking-wide text-white uppercase max-w-7xl sm:text-xs md:text-sm lg:text-base xl:text-xl 2xl:text-2xl">
        <div class="absolute left-0 z-20 w-64 h-full bg-gradient-to-r dark:from-zinc-900 from-white to-transparent">
        </div>
        <div class="absolute right-0 z-20 w-64 h-full bg-gradient-to-l dark:from-zinc-900 from-white to-transparent">
        </div>
        <div x-ref="content" class="flex animate-marquee gap-[130px] sm:gap-0">
            <div x-ref="item" class="flex items-center justify-around flex-shrink-0 w-full py-2 space-x-2 text-white">
                <img src="{{ asset('img/sponsor/kementrian-pertanian.svg') }}" alt="kementrian pertanian"
                    class="w-auto translate-y-0.5 fill-current h-9" draggable="false">
                <img src="{{ asset('img/sponsor/gemini.svg') }}" alt="kementrian pertanian"
                    class="w-auto translate-y-0.5 fill-current h-9" draggable="false">
                <img src="{{ asset('img/sponsor/paditech.svg') }}" alt="kementrian pertanian"
                    class="w-auto translate-y-0.5 fill-current h-9" draggable="false">
                <img src="{{ asset('img/sponsor/gdsc.svg') }}" alt="kementrian pertanian"
                    class="w-auto translate-y-0.5 fill-current h-9" draggable="false">
                <img src="{{ asset('img/sponsor/pg-candi.svg') }}" alt="kementrian pertanian"
                    class="w-auto translate-y-0.5 fill-current h-9" draggable="false">
            </div>
        </div>
    </div>
</div>
<style>
    /*
     *  This is the marquee animation styles.
     *  Instead of adding this CSS you may wish to implement in your tailwind config.
     *  Learn more in the marquee Tailwind Config section
     */
    @keyframes marquee {
        0% {
            transform: translateX(0);
        }

        100% {
            transform: translateX(-100%);
        }
    }

    .animate-marquee {
        animation: marquee 20s linear infinite;
    }
</style>
<style>
    /*
     *  This is a container query used for the demo that does not need to be included
     */
    .container-block {
        container-type: inline-size;
    }

    @media (max-width: 1100px) {

        .container-block svg:nth-child(3),
        .container-block svg:nth-child(4) {
            display: none;
        }
    }
</style>