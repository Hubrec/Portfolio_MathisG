const gear1 = document.getElementsByClassName('gear-1');
const gear2 = document.getElementsByClassName('gear-2');
const gear3 = document.getElementsByClassName('gear-3');
const gear4 = document.getElementsByClassName('gear-4');

const sqrt1 = gear1[0].getBoundingClientRect();
const sqrt2 = gear2[0].getBoundingClientRect();
const sqrt3 = gear3[0].getBoundingClientRect();
const sqrt4 = gear4[0].getBoundingClientRect();

const opacityPercent = "55%";

document.onmousemove = function(e) {
    var x = e.pageX;
    var y = e.pageY;
    
    //gear 1
    if (gear1[0].classList.contains('hover') == false) {
        var centerX_gear1 = sqrt1.left + gear1[0].clientHeight / 2;
        var centerY_gear1 = sqrt1.top + gear1[0].clientWidth / 2;
        var deltaX_gear1 = x - centerX_gear1;
        var deltaY_gear1 = y - centerY_gear1;
        var angle_gear1 = Math.atan2(deltaY_gear1, deltaX_gear1) * 180 / Math.PI;
        gear1[0].style.transform = 'rotate(' + angle_gear1 + 'deg)';
    }

    //gear 2
    if (gear2[0].classList.contains('hover') == false) {
        var centerX_gear2 = sqrt2.left + gear2[0].clientHeight / 2;
        var centerY_gear2 = sqrt2.top + gear2[0].clientWidth / 2;
        var deltaX_gear2 = x - centerX_gear2;
        var deltaY_gear2 = y - centerY_gear2;
        var angle_gear2 = Math.atan2(deltaY_gear2, deltaX_gear2) * 180 / Math.PI;
        gear2[0].style.transform = 'rotate(' + angle_gear2 + 'deg)';
    }

    //gear 3
    if (gear3[0].classList.contains('hover') == false) {
        var centerX_gear3 = sqrt3.left + gear3[0].clientHeight / 2;
        var centerY_gear3 = sqrt3.top + gear3[0].clientWidth / 2;
        var deltaX_gear3 = x - centerX_gear3;
        var deltaY_gear3 = y - centerY_gear3;
        var angle_gear3 = Math.atan2(deltaY_gear3, deltaX_gear3) * 180 / Math.PI;
        gear3[0].style.transform = 'rotate(' + angle_gear3 + 'deg)';
    }

    //gear4
    if (gear4[0].classList.contains('hover') == false) {
        var centerX_gear4 = sqrt4.left + gear4[0].clientHeight / 2;
        var centerY_gear4 = sqrt4.top + gear4[0].clientWidth / 2;
        var deltaX_gear4 = x - centerX_gear4;
        var deltaY_gear4 = y - centerY_gear4;
        var angle_gear4 = Math.atan2(deltaY_gear4, deltaX_gear4) * 180 / Math.PI;
        gear4[0].style.transform = 'rotate(' + angle_gear4 + 'deg)';
    }

};

gear1[0].onmouseenter = function() {
    this.classList.add('hover');
};

gear1[0].onmouseleave = function() {
    this.classList.remove('hover');
};

gear2[0].onmouseenter = function() {
    this.classList.add('hover');
};

gear2[0].onmouseleave = function() {
    this.classList.remove('hover');
};

gear3[0].onmouseenter = function() {
    this.classList.add('hover');
};

gear3[0].onmouseleave = function() {
    this.classList.remove('hover');
};

gear4[0].onmouseenter = function() {
    this.classList.add('hover');
};

gear4[0].onmouseleave = function() {
    this.classList.remove('hover');
};