var btnDrop = document.querySelector(".btn-drop");
var menuDeroulantContent = document.querySelector(".menu-deroulant-content");

btnDrop.addEventListener("click", function() {
    menuDeroulantContent.classList.toggle("show");
    btnDrop.classList.toggle("show");
});

document.addEventListener("keydown", function(event) {

    if (event.key === "Enter") {
        menuDeroulantContent.classList.toggle("show");
        btnDrop.classList.toggle("show");
    }

    if (menuDeroulantContent.classList.contains("show")) {
        if (event.key === "Escape") {
        menuDeroulantContent.classList.toggle("show");
        btnDrop.classList.remove("show");
        }
    }
});