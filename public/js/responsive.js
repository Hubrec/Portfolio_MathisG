const project = document.querySelector('.myProjects');
const scrollSection = project.querySelector('.scroll');
const mobileSection = project.querySelector('.mobile-message');

if (screen.height > screen.width) {
    scrollSection.style.display = "none";
    mobileSection.style.display = "block";
} else {
    scrollSection.style.display = "block";
    mobileSection.style.display = "none";
}