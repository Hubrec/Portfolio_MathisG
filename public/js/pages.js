const sectGlobal = document.querySelector('.sectGears');
const header = document.querySelector('header');
const gears = document.querySelectorAll('.gear');
const icon = document.querySelector('.iconAccueil');

const sectCompetences = document.querySelector('.myCompetences');
const sectProjets = document.querySelector('.myProjects');
const sectSpotify = document.querySelector('.spotifyAlpha');
const sectContact = document.querySelector('.myContacts');

const pages = [sectCompetences, sectProjets, sectSpotify, sectContact];

const buttonGrow = document.querySelectorAll('.grow');
const buttonCloser = document.querySelectorAll('.closer');

gears[0].onclick = function(e) {
    sectCompetences.classList.add("active");
    changeClass(icon, "competences");
    sectGlobal.style.opacity = "0%";
    sectGlobal.style.pointerEvents = "none";
};
gears[1].onclick = function(e) {
    sectProjets.classList.add("active");
    changeClass(icon, "projets");
    sectGlobal.style.opacity = "0%";
    sectGlobal.style.pointerEvents = "none";
};
gears[2].onclick = function(e) {
    sectSpotify.classList.add("active");
    changeClass(icon, "spotify");
    sectGlobal.style.opacity = "0%";
    sectGlobal.style.pointerEvents = "none";
};
gears[3].onclick = function(e) {
    sectContact.classList.add("active");
    changeClass(icon, "contact");
    sectGlobal.style.opacity = "0%";
    sectGlobal.style.pointerEvents = "none";
};


buttonCloser[0].onclick = function(e) {
    if (sectCompetences.classList.contains("grow")) {
        sectCompetences.classList.toggle("grow");
        header.classList.toggle("hide");
    }
    changeClass(icon, "none");
    sectCompetences.classList.remove("active");
    sectGlobal.style.opacity = "100%";
    sectGlobal.style.pointerEvents = "all";
};
buttonCloser[1].onclick = function(e) {
    if (sectProjets.classList.contains("grow")) {
        sectProjets.classList.toggle("grow");
        header.classList.toggle("hide");
    }
    changeClass(icon, "none");
    sectProjets.classList.remove("active");
    sectGlobal.style.opacity = "100%";
    sectGlobal.style.pointerEvents = "all";
};
buttonCloser[2].onclick = function(e) {
    if (sectSpotify.classList.contains("grow")) {
        sectSpotify.classList.toggle("grow");
        header.classList.toggle("hide");
    }
    changeClass(icon, "none");
    sectSpotify.classList.remove("active");
    sectGlobal.style.opacity = "100%";
    sectGlobal.style.pointerEvents = "all";
};
buttonCloser[3].onclick = function(e) {
    if (sectContact.classList.contains("grow")) {
        sectContact.classList.toggle("grow");
        header.classList.toggle("hide");
    }
    changeClass(icon, "none");
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
        changeClass(icon, "none");
    }
});

function changeClass(element, classe) {
    element.classList.remove("competences");
    element.classList.remove("projets");
    element.classList.remove("spotify");
    element.classList.remove("contact");

    if (classe !== "none") {    
        element.classList.add(classe);
    } else {
        element.setAttribute("src", "../public/ressources/logo MG.svg");
    }

    if (element.classList.contains("competences")) {
        element.setAttribute("src", "../public/ressources/competences.svg");
    } else if (element.classList.contains("projets")) {
        element.setAttribute("src", "../public/ressources/projets.svg");
    } else if (element.classList.contains("spotify")) {
        element.setAttribute("src", "../public/ressources/spotify.svg");
    } else if (element.classList.contains("contact")) {
        element.setAttribute("src", "../public/ressources/contact.svg");
    }
}