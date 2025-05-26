import "./bootstrap";
import "./gsap";
import "./sweetalert";
import "flowbite";

import AOS from "aos";

AOS.init();

import Alpine from "alpinejs";
import collapse from "@alpinejs/collapse";

Alpine.plugin(collapse);
window.Alpine = Alpine;

Alpine.start();
