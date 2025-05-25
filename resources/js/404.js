import gsap from "gsap";

document.addEventListener("DOMContentLoaded", () => {
    gsap.from(".message", {
        opacity: 0,
        y: -50,
        duration: 1,
        ease: "power2.out",
    });

    gsap.from(".description", {
        opacity: 0,
        y: 50,
        duration: 1,
        delay: 0.5,
        ease: "power2.out",
    });

    gsap.from(".btn-home", {
        opacity: 0,
        scale: 0.8,
        duration: 1,
        delay: 1,
        ease: "bounce.out",
    });
});
