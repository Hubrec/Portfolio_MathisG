const section = document.querySelector('.myProjects');
const projects = section.querySelectorAll('div.pr');
const back = section.querySelector('div.rewind');

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
        
        project.classList.add('selected');
        back.classList.add('visible');
        
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
    back.classList.remove('visible');
});

function sideClass(project) {
    projects.forEach((p) => {
        p.classList.remove('side');
    });

    for (let i = 0; i < projects.length; i++) {
        if (projects[i] === project) {
            console.log("passage");

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