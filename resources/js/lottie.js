import { DotLottie } from "@lottiefiles/dotlottie-web";

const canvas = document.querySelector("#dotLottie-canvas");

if (canvas) {
    const dotLottie = new DotLottie({
        canvas,
        // src: "https://lottie.host/f0b535e1-d1a5-4d19-b15b-1493fa8acc34/Ryi3zVP83n.lottie", // selebrasi lottier
        // src: "https://lottie.host/bf045640-36ea-4174-b418-af306033be31/GvHcv11gdE.lottie", // stars medali
        src: "https://lottie.host/5d3aba0b-280c-4fac-85ca-aa4920bfbe43/Lkmq9NNq9x.lottie", // tangan + bumi
        loop: true,
        autoplay: true,
        speed: 1,
        duration: 100,
    });
}
