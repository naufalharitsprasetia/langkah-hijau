// Get the button
let mybutton = document.getElementById("myBtnTop");
let myNavbar = document.getElementById("myNavbar");
// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function () {
    scrollFunction();
};
function scrollFunction() {
    if (
        document.body.scrollTop > 20 ||
        document.documentElement.scrollTop > 20
    ) {
        mybutton.style.display = "block";
        myNavbar.classList.add(
            "bg-white/80",
            "backdrop-blur",
            "dark:bg-gray-900/80"
        );
    } else {
        mybutton.style.display = "none";
        myNavbar.classList.remove(
            "bg-white/80",
            "backdrop-blur",
            "dark:bg-gray-900/80"
        );
    }
}
// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}
