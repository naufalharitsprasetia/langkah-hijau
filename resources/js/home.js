import { DotLottie } from "@lottiefiles/dotlottie-web";

const canvas = document.querySelector("#dotLottie-canvas");

if (canvas) {
    const dotLottie = new DotLottie({
        canvas,
        // src: "https://lottie.host/f0b535e1-d1a5-4d19-b15b-1493fa8acc34/Ryi3zVP83n.lottie", // selebrasi lottier
        // src: "https://lottie.host/bf045640-36ea-4174-b418-af306033be31/GvHcv11gdE.lottie", // stars medali
        // src: "https://lottie.host/5d3aba0b-280c-4fac-85ca-aa4920bfbe43/Lkmq9NNq9x.lottie", // tangan + bumi
        src: "https://lottie.host/09fc4e77-c3ff-4e63-be02-fa0d21c0cae5/2coQDv3uak.lottie", // bumi + pohon
        // src: "https://lottie.host/b5859729-bc44-4af9-bd3f-dfab0ad6620f/dZGOBDpaZ6.lottie", // giraffe celebration
        // src: "https://lottie.host/10e35ef5-caab-4b94-bda6-daea6f4290e6/ezJU2Hgt7Y.lottie", // earth with leaf
        loop: true,
        autoplay: true,
        speed: 1,
        duration: 1000,
    });
}
