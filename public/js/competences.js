const pageCompetences = document.querySelector('.myCompetences');
const content = pageCompetences.querySelector('.content');
const selecting = content.querySelectorAll('li');

selecting.forEach((item) => {
    item.addEventListener('click', (e) => {
        selecting.forEach((item) => {
            item.classList.remove('selected');
        });
        e.target.classList.add('selected');
    });
});