import gsap from "gsap";

gsap.from(container, { opacity: 0, duration: 1 });
gsap.from(content, { y: 20, opacity: 0, duration: 0.8, delay: 0.5 });
gsap.from(cards.children, {
    y: 30,
    opacity: 0,
    duration: 0.5,
    stagger: 0.2,
    delay: 1,
});
gsap.from(userInput, { y: 20, opacity: 0, duration: 0.5, delay: 1.5 });
gsap.from(sendButton, { y: 20, opacity: 0, duration: 0.5, delay: 1.5 });
