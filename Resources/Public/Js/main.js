function swingDoor(door) {

}

function showCe(door) {

    let ce = door.target.parentNode.querySelector('.ce');
    if (ce != null) {
        ce.classList.toggle('ce-open');

    }

}

let doors = document.getElementsByClassName('door');
let currentDayOfTheMonth = new Date().getDate();
Array.from(doors).forEach(function (door) {
    if (door.getAttribute('data-dayNum') <= currentDayOfTheMonth) {
        door.addEventListener('click', showCe);
    }
});