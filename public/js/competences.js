const pageCompetences = document.querySelector('.myCompetences');
const content = pageCompetences.querySelector('.content');
const selecting = content.querySelectorAll('li');
const sections = content.querySelectorAll('section');

selecting.forEach((item) => {
    item.addEventListener('click', (e) => {
        selecting.forEach((item) => {
            item.classList.remove('selected');
        });
        e.target.classList.add('selected');
        showSection();
    });
});

function showSection() {
    sections.forEach((item) => { item.remove() });

    for (let i = 0; i < sections.length; i++) {
        if(selecting[i].classList.contains('selected')) {
            content.appendChild(sections[i]);
        }
    }
}

showSection();