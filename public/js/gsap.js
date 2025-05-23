document.addEventListener("DOMContentLoaded", () => {
    // Register ScrollTrigger plugin
    gsap.registerPlugin(ScrollTrigger);

    // Aurora Effects Animation
    // gsap.to(".aurora-green", {
    //     scale: 1.2,
    //     duration: 5,
    //     repeat: -1,
    //     yoyo: true,
    //     ease: "sine.inOut",
    // });

    // Hero Section Animations
    // gsap.from(".hero-title", {
    //     y: 100,
    //     duration: 1.5,
    //     scrollTrigger: {
    //         trigger: ".hero-title",
    //         start: "top 80%",
    //         end: "bottom 40%",
    //         scrub: true,
    //     },
    // });

    // // About Section Animations
    // gsap.from(".about-header", {
    //     y: 100,
    //     opacity: 0,
    //     duration: 1.5,
    //     scrollTrigger: {
    //         trigger: ".about-header",
    //         start: "top 80%",
    //         end: "bottom 40%",
    //         scrub: true
    //     }
    // });
});

let posX = 0;
let posY = 0;

let mouseX = 0;
let mouseY = 0;
