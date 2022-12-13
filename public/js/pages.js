const sectGlobal = document.querySelector('.sectGears');
const header = document.querySelector('header');
const gears = document.querySelectorAll('.gear');

const sectCompetences = document.querySelector('.myCompetences');
const sectProjets = document.querySelector('.myProjects');
const sectSpotify = document.querySelector('.spotifyAlpha');
const sectContact = document.querySelector('.myContacts');

const pages = [sectCompetences, sectProjets, sectSpotify, sectContact];

const buttonGrow = document.querySelectorAll('.grow');
const buttonCloser = document.querySelectorAll('.closer');

gears[0].onclick = function(e) {
    sectCompetences.classList.add("active");
    sectGlobal.style.opacity = "0%";
    sectGlobal.style.pointerEvents = "none";
};
gears[1].onclick = function(e) {
    sectProjets.classList.add("active");
    sectGlobal.style.opacity = "0%";
    sectGlobal.style.pointerEvents = "none";
};
gears[2].onclick = function(e) {
    sectSpotify.classList.add("active");
    sectGlobal.style.opacity = "0%";
    sectGlobal.style.pointerEvents = "none";
};
gears[3].onclick = function(e) {
    sectContact.classList.add("active");
    sectGlobal.style.opacity = "0%";
    sectGlobal.style.pointerEvents = "none";
};


buttonCloser[0].onclick = function(e) {
    if (sectCompetences.classList.contains("grow")) {
        sectCompetences.classList.toggle("grow");
        header.classList.toggle("hide");
    }
    sectCompetences.classList.remove("active");
    sectGlobal.style.opacity = "100%";
    sectGlobal.style.pointerEvents = "all";
};
buttonCloser[1].onclick = function(e) {
    if (sectProjets.classList.contains("grow")) {
        sectProjets.classList.toggle("grow");
        header.classList.toggle("hide");
    }
    sectProjets.classList.remove("active");
    sectGlobal.style.opacity = "100%";
    sectGlobal.style.pointerEvents = "all";
};
buttonCloser[2].onclick = function(e) {
    if (sectSpotify.classList.contains("grow")) {
        sectSpotify.classList.toggle("grow");
        header.classList.toggle("hide");
    }
    sectSpotify.classList.remove("active");
    sectGlobal.style.opacity = "100%";
    sectGlobal.style.pointerEvents = "all";
};
buttonCloser[3].onclick = function(e) {
    if (sectContact.classList.contains("grow")) {
        sectContact.classList.toggle("grow");
        header.classList.toggle("hide");
    }
    sectContact.classList.remove("active");
    sectGlobal.style.opacity = "100%";
    sectGlobal.style.pointerEvents = "all";
};


buttonGrow[0].onclick = function(e) {
    sectCompetences.classList.toggle("grow");
    header.classList.toggle("hide");
};
buttonGrow[1].onclick = function(e) {
    sectProjets.classList.toggle("grow");
    header.classList.toggle("hide");
};
buttonGrow[2].onclick = function(e) {
    sectSpotify.classList.toggle("grow");
    header.classList.toggle("hide");
};
buttonGrow[3].onclick = function(e) {
    sectContact.classList.toggle("grow");
    header.classList.toggle("hide");
};

document.addEventListener("keydown", function(e) {
    if (e.key === "Escape") {
        pages.forEach( function(p) {
            if (p.classList.contains("active")) {
                p.classList.toggle("active");
                sectGlobal.style.opacity = "100%";
                sectGlobal.style.pointerEvents = "all";
                
                if (p.classList.contains("grow")) {
                    p.classList.toggle("grow");
                    header.classList.toggle("hide");
                }
            }
        });
    }
    
    if (e.key === "ArrowUp") {

    }

    if (e.key === "ArrowDown") {
        
    }
});