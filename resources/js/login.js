import gsap from "gsap";

// GSAP animations
gsap.from(".logo-img", {
    opacity: 0,
    y: -50,
    duration: 1,
    delay: 0.5,
    ease: "power4.out",
});
gsap.from(".title-text", {
    opacity: 0,
    y: 50,
    duration: 1,
    delay: 0.7,
    ease: "power4.out",
});
gsap.from(".login-form", {
    opacity: 0,
    y: 100,
    duration: 1,
    delay: 1,
    ease: "power4.out",
});

// Hover animation for inputs and button
gsap.utils.toArray(".input-field").forEach((input) => {
    input.addEventListener("focus", () => {
        gsap.to(input, { borderColor: "#34d399", duration: 0.3 });
    });
    input.addEventListener("blur", () => {
        gsap.to(input, { borderColor: "#5DBB63", duration: 0.3 });
    });
});

// GSAP animations on load
gsap.from(".login-left", {
    opacity: 0,
    x: -50,
    duration: 1,
    ease: "power2.out",
});
gsap.from(".login-right", {
    opacity: 0,
    x: 50,
    duration: 1,
    ease: "power2.out",
});
