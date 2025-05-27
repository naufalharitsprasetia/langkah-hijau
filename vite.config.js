import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import tailwindcss from "@tailwindcss/vite";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/js/app.js",
                "resources/js/404.js",
                "resources/js/hijauai.js",
                "resources/js/login.js",
                "resources/js/signup.js",
                "resources/js/sweetalert.js",
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
});
