const head = document.querySelector("header");
const body = document.querySelector("body");

var bgNumb = 1;
var sequence = [1, 2, 3];

document.addEventListener("keydown", function(event) {
    if (event.ctrlKey) {
        body.classList.toggle("bg" + bgNumb);
        head.classList.toggle("bg" + bgNumb);
        
        if (event.key === "ArrowLeft") {
            if (bgNumb > 1) {
                bgNumb--;
            } else {
                bgNumb = 3;
            }
        }
        if (event.key === "ArrowRight") {
            if (bgNumb < 3) {
                bgNumb++;
            } else {
                bgNumb = 1;
            }
        }

        body.classList.toggle("bg" + bgNumb);
        head.classList.toggle("bg" + bgNumb);
    }

    if (event.key === "ArrowUp" && event.ctrlKey) {
        
    }
});