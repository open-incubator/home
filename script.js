ScrollReveal().reveal('section') // Reveal the sections with a fade in effect when scrolling

const hamburger = document.getElementsByClassName('hamburger')[0]
let isHamburgerActive = false

const nav = document.getElementsByTagName('nav')[0]

function unfade(element) {
    element.style.display = 'block'
    let op = 0.1;  // initial opacity
    const timer = setInterval(function () {
        if (op >= 1){
            clearInterval(timer);
        }
        element.style.opacity = op;
        element.style.filter = 'alpha(opacity=' + op * 100 + ")";
        op += op * 0.1;
    }, 10);
}

function fade(element) {
    let op = 1;  // initial opacity
    const timer = setInterval(function () {
        if (op <= 0.1){
            clearInterval(timer);
            element.style.display = 'none';
        }
        element.style.opacity = op;
        element.style.filter = 'alpha(opacity=' + op * 100 + ")";
        op -= op * 0.1;
    }, 10);
}

hamburger.onclick = () => {
    if (isHamburgerActive) {
        hamburger.innerHTML = '&#9776;'
        fade(nav)
        isHamburgerActive = false
    } else {
        hamburger.innerHTML = '&#10799;'
        unfade(nav)
        isHamburgerActive = true
    }
}