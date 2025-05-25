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
                top: posY - 2,
            },
        });
    },
});

document.addEventListener("mousemove", (e) => {
    mouseX = e.clientX;
    mouseY = e.clientY;
});

// Synchronize Lenis scrolling with GSAP's ScrollTriggerplugin
lenis.on("scroll", ScrollTrigger.update);
// Add Lenis's requestAnimationFrame (raf) method to GSAP'sticker
gsap.ticker.add((time) => {
    lenis.raf(time * 1000); // Convert time from seconds tomilliseconds
});
// Disable lag smoothing in GSAP to prevent any delay inscroll animations
gsap.ticker.lagSmoothing(0);
