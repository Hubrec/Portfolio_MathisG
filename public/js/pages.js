const sectGlobal = document.querySelector('.sectGears');
const header = document.querySelector('header');
const gears = document.querySelectorAll('.gear');

const sectCompetences = document.querySelector('.myCompetences');
const sectProjets = document.querySelector('.myProjects');
const sectContact = document.querySelector('.myContacts');

const buttonGrow = document.querySelectorAll('.grow');
const buttonCloser = document.querySelectorAll('.closer');

gears[0].onclick = function(e) {
    sectCompetences.classList.add("active");
    sectGlobal.style.opacity = "0%";
    sectGlobal.style.pointerEvents = "none";
}
gears[1].onclick = function(e) {
    sectProjets.classList.add("active");
    sectGlobal.style.opacity = "0%";
    sectGlobal.style.pointerEvents = "none";
}
gears[2].onclick = function(e) {
    //do nothing
}
gears[3].onclick = function(e) {
    sectContact.classList.add("active");
    sectGlobal.style.opacity = "0%";
    sectGlobal.style.pointerEvents = "none";
}


buttonCloser[0].onclick = function(e) {
    if (sectCompetences.classList.contains("grow")) {
        sectCompetences.classList.toggle("grow");
        header.classList.toggle("hide");
    }
    sectCompetences.classList.remove("active");
    sectGlobal.style.opacity = "100%";
    sectGlobal.style.pointerEvents = "all";
}
buttonCloser[1].onclick = function(e) {
    if (sectProjets.classList.contains("grow")) {
        sectProjets.classList.toggle("grow");
        header.classList.toggle("hide");
    }
    sectProjets.classList.remove("active");
    sectGlobal.style.opacity = "100%";
    sectGlobal.style.pointerEvents = "all";
}
buttonCloser[2].onclick = function(e) {
    //do nothing
}
buttonCloser[3].onclick = function(e) {
    if (sectContact.classList.contains("grow")) {
        sectContact.classList.toggle("grow");
        header.classList.toggle("hide");
    }
    sectContact.classList.remove("active");
    sectGlobal.style.opacity = "100%";
    sectGlobal.style.pointerEvents = "all";
}


buttonGrow[0].onclick = function(e) {
    sectCompetences.classList.toggle("grow");
    header.classList.toggle("hide");
}
buttonGrow[1].onclick = function(e) {
    sectProjets.classList.toggle("grow");
    header.classList.toggle("hide");
}
buttonGrow[2].onclick = function(e) {
    //do nothing
}
buttonGrow[3].onclick = function(e) {
    sectContact.classList.toggle("grow");
    header.classList.toggle("hide");
}