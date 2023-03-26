const section = document.querySelector('.myProjects');
const projects = section.querySelectorAll('div.pr');
const back = section.querySelector('li.rewind');
const title = section.querySelectorAll('h1.title');
const divPointed = section.querySelector('div.content-pointed');
const divGarbage = section.querySelector('div.content-garbage');

console.log(divPointed);

projects.forEach((project) => {
    project.addEventListener('mouseenter', () => {
        projects.forEach((p) => {
            p.classList.remove('hovered');
        });
        project.classList.add('hovered');
        sideClass(project);
        othersClass(project);
    });

    project.addEventListener('mouseleave', () => {
        project.classList.remove('hovered');
        projects.forEach((p) => {
            p.classList.remove('side');
            p.classList.remove('others');
        });
    });
});

projects.forEach((project) => {
    project.addEventListener('click', () => {
        projects.forEach((p) => {
            removeAll(p);
        });
        
        var tab = divPointed.querySelectorAll('div');
        
        for (let i = 0; i < tab.length; i++) {
            if (tab[i] == project) {
                divPointed.classList.add('visible');
                divGarbage.classList.add('invisible');
            }
        }

        if (!divPointed.classList.contains('visible')) {
            divGarbage.classList.add('visible');
            divPointed.classList.add('invisible');
        }

        project.classList.add('selected');
        section.classList.add('selected');
        back.classList.add('visible');
        title[0].classList.add('hide');
        title[1].classList.add('hide');
        
        projects.forEach((p) => {
            if (p !== project) {
                p.classList.add('hide');
            }
        });
    });
});

back.addEventListener('click', () => {
    projects.forEach((p) => {
        removeAll(p);
    });
    divPointed.classList.remove('visible');
    divGarbage.classList.remove('visible');
    divPointed.classList.remove('invisible');
    divGarbage.classList.remove('invisible');
    back.classList.remove('visible');
    title[0].classList.remove('hide');
    title[1].classList.remove('hide');
    section.classList.remove('selected');
});

function sideClass(project) {
    projects.forEach((p) => {
        p.classList.remove('side');
    });

    for (let i = 0; i < projects.length; i++) {
        if (projects[i] === project) {

            if (i === 0) {
                projects[i + 1].classList.add('side');
            } else if (i === projects.length - 1) {
                projects[i - 1].classList.add('side');
            } else {
                projects[i - 1].classList.add('side');
                projects[i + 1].classList.add('side');
            }
        }
    }
}

function othersClass(project) {
    projects.forEach((p) => {
        p.classList.remove('others');
    });

    for (let i = 0; i < projects.length; i++) {
        if (projects[i] !== project && projects[i] !== project.previousElementSibling && projects[i] !== project.nextElementSibling) {
            projects[i].classList.add('others');
        }
    }
}

function removeAll(project) {
    projects.forEach((p) => {
        p.classList.remove('selected');
        p.classList.remove('others');
        p.classList.remove('side');
        p.classList.remove('hovered');
        p.classList.remove('hide');
    });
}