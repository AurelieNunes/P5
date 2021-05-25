/* Ouverture et fermeture des modals */

const modals = document.getElementsByClassName('modal');
const buttonModal = document.getElementsByClassName('btnModal');
const closeBtn = document.getElementsByClassName('closeBtn');


for (let i = 0; i < buttonModal.length; i++) {
    let modal = modals + i.toString();
    let close = closeBtn + i.toString();

    buttonModal[i].addEventListener("click", () => {
        modals[i].style.display = "block"
    })

    closeBtn[i].addEventListener("click", () => {
        modals[i].style.display = "none";
    })
}