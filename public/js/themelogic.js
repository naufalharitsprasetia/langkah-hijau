// Theme toggle logic
const themeToggle = document.getElementById("theme-toggle");
const themeToggle2 = document.getElementById("theme-toggle2");
const themeIcon = document.getElementById("theme-icon");
const themeIcon2 = document.getElementById("theme-icon2");

const currentTheme = localStorage.getItem("theme") || "dark";
document.documentElement.classList.toggle("dark", currentTheme === "dark");
updateThemeIcon(currentTheme === "dark");

themeToggle.addEventListener("click", () => {
    document.documentElement.classList.toggle("dark");
    const isDark = document.documentElement.classList.contains("dark");
    localStorage.setItem("theme", isDark ? "dark" : "light");

    updateThemeIcon(isDark);
});

if (themeToggle2 !== null) {
    themeToggle2.addEventListener("click", () => {
        document.documentElement.classList.toggle("dark");
        const isDark = document.documentElement.classList.contains("dark");
        localStorage.setItem("theme", isDark ? "dark" : "light");

        updateThemeIcon2(isDark);
    });
}

function updateThemeIcon(isDark) {
    if (isDark) {
        themeIcon.innerHTML =
            '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />';
    } else {
        themeIcon.innerHTML =
            '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />';
    }
}
function updateThemeIcon2(isDark) {
    if (isDark) {
        themeIcon2.innerHTML =
            '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />';
    } else {
        themeIcon2.innerHTML =
            '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />';
    }
}
