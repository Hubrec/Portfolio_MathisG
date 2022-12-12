var btnDrop = document.querySelector(".btn-drop");
var menuDeroulantContent = document.querySelector(".menu-deroulant-content");

btnDrop.addEventListener("click", function() {
    menuDeroulantContent.classList.toggle("show");
    btnDrop.classList.toggle("show");
});

// pour quand on clique autre part que sur le bouton ou le menu déroulant ca ferme le menu déroulant
// document.addEventListener("click", function(event) {
//     if (event.target !== btnDrop && event.target !== menuDeroulantContent) {
//         menuDeroulantContent.classList.remove("show");
//         btnDrop.classList.remove("show");
//     }
// });

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