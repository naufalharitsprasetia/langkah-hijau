<!doctype html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>LangkahHijau | {{ $title }}</title>
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- link --}}
    @vite('resources/css/app.css')
    <link rel="icon" type="image/png" href="/img/logoweb.png">
    <link rel="stylesheet" href="/css/frontend.css">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
    <link rel="stylesheet" href="https://unpkg.com/lenis@1.1.13/dist/lenis.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="canonical" href="{{ url()->current() }}">
    {{-- script --}}
    <script src="https://kit.fontawesome.com/5d8dfb0173.js" crossorigin="anonymous"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.8/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    {{-- Meta tag --}}
    <meta name="keywords" content="gaya hidup, langkah hijau, keberlanjutan, emisi karbon, recycle">
    <meta name="author" content="Langkah Hijau Team">
    <meta name="robots" content="index, follow">
    <meta name="description"
        content="LangkahHijau adalah platform online untuk petani yang menghubungkan mereka dengan teknologi pertanian terkini dan informasi pasar.">
    <meta property="og:title" content="LangkahHijau - Cek gaya hidupmu, hijaukan langkahmu!">
    <meta property="og:description" content="Mulai dari langkah kecil, untuk bumi yang lebih hijau.">
    <meta property="og:image" content="{{ asset('img/logoweb.png') }}">
    <meta property="og:url" content="{{ url()->current() }}">
</head>

<body class="antialiased">
    {{-- Cursor Custom -> nb: hilangkan ketika di menu seperti dropdown dll. --}}
    <div class="cursor-example z-[99999999999] hidden sm:block"></div>
    {{-- Loading animation --}}
    <div id="loader-overlay">
        <div class="loader">
            <div class="loader-inner"></div>
        </div>
    </div>
    {{-- Button Pojok Kanan bawah --}}
    <button onclick="topFunction()" id="myBtnTop" title="Go to top" style="display: block">
        <i class="fa-solid fa-arrow-up fa-flip fa-xl" style="color: white;"></i>
    </button>
    {{-- Body --}}
    <div class="bg-white dark:bg-zinc-900">
        <x-navbar />
        {{-- Main --}}
        <main>
            <div class="relative isolate px-6 pt-14 lg:px-8">
                {{ $slot }}
            </div>
        </main>
        {{-- End Main --}}
        <x-footer />
    </div>
    <script src="https://unpkg.com/lenis@1.1.14/dist/lenis.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/MotionPathPlugin.min.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('js/scrollnavbar.js') }}"></script>
    <script src="{{ asset('js/preload.js') }}"></script>
    <script src="{{ asset('js/gsap.js') }}"></script>
    {{-- Buat auth aja --}}
    {{-- <script src="{{ asset('js/auth-gsap.js') }}"></script> --}}
    <script>
        // lenis init
        const lenis = new Lenis();
        // gsap
        gsap.to(".cursor-example", {
            duration: 0.018,
            repeat: -1,
            onRepeat: () => {
                posX += (mouseX - posX) / 8;
                posY += (mouseY - posY) / 8;

                gsap.set(".cursor-example", {
                    css: {
                        left: posX - 1,
                        top: posY - 2
                    }
                });
            }
        });

        document.addEventListener("mousemove", (e) => {
            mouseX = e.clientX;
            mouseY = e.clientY;
        });

        // Synchronize Lenis scrolling with GSAP's ScrollTriggerplugin
        lenis.on('scroll', ScrollTrigger.update);
        // Add Lenis's requestAnimationFrame (raf) method to GSAP'sticker
        gsap.ticker.add((time) => {
            lenis.raf(time * 1000); // Convert time from seconds tomilliseconds
        });
        // Disable lag smoothing in GSAP to prevent any delay inscroll animations
        gsap.ticker.lagSmoothing(0);
    </script>
</body>

</html>