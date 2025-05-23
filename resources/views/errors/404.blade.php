<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Page Not Found</title>
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #b2d8b2;
            overflow: hidden;
            font-family: Arial, sans-serif;
            color: #333;
        }

        .container {
            text-align: center;
            position: relative;
        }

        .message {
            font-size: 3rem;
            font-weight: bold;
            margin-bottom: 1rem;
        }

        .description {
            font-size: 1.5rem;
            margin-bottom: 2rem;
        }

        .btn-home {
            padding: 0.75rem 1.5rem;
            font-size: 1.25rem;
            color: black;
            background-color: white;
            border: none;
            border-radius: 0.5rem;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .btn-home:hover {
            background-color: rgb(206, 206, 206);
            color: rgb(39, 39, 39)
        }

        .plant {
            position: absolute;
            width: 60px;
            height: 60px;
            background-color: #228B22;
            border-radius: 50%;
            transform: rotate(15deg);
            cursor: grab;
        }

        .plant:nth-child(1) {
            left: 20%;
        }

        .plant:nth-child(2) {
            left: 40%;
        }

        .plant:nth-child(3) {
            left: 60%;
        }

        .plant:nth-child(4) {
            left: 80%;
        }

        .background-animation {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to right, #08c90e, #068002);
            opacity: 0.5;
            pointer-events: none;
        }
    </style>
</head>

<body>
    <div class="background-animation"></div>
    <div class="container">
        <div class="message">404 - Halaman Tidak Ditemukan</div>
        <div class="description">Ups! Sepertinya Anda tersesat. <br> Yuk, kembali ke halaman utama.</div>
        <a href="/" class="btn-home">Kembali ke Beranda</a>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/Draggable.min.js"></script>
    <script>
        // GSAP Animations
        gsap.from(".message", {
            opacity: 0,
            y: -50,
            duration: 1,
            ease: "power2.out"
        });

        gsap.from(".description", {
            opacity: 0,
            y: 50,
            duration: 1,
            delay: 0.5,
            ease: "power2.out"
        });

        gsap.from(".btn-home", {
            opacity: 0,
            scale: 0.8,
            duration: 1,
            delay: 1,
            ease: "bounce.out"
        });
    </script>
</body>

</html>