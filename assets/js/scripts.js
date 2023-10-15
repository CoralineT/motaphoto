// MENU BURGER
window.addEventListener("DOMContentLoaded", (event) => {
  function toggleMenu () {  
    const navbar = document.querySelector('.navbar-header');
    const burger = document.querySelector('.burger');
    
    burger.addEventListener('click', (e) => {    
      navbar.classList.toggle('show-nav');
    });    
  };
    
  toggleMenu();



// MODALE CONTACT

// Modale
const modal = document.getElementById('myModal');
// Bouton contact
const btn = document.getElementById("menu-item-15");
// Bouton de fermeture de la modale
const span = document.getElementsByClassName("close")[0];

// Ouverture de la modale au clic sur "contact"
btn.onclick = function() {
    modal.style.display = "block";
    modal.style.animationName = "fadein";
}

// Fermeture de la modale au click sur le bouton fermeture
span.onclick = function() {
    modal.style.animationName = "fadeout";
    setTimeout( () => {
      modal.style.display = "none";
    }, "2000");
}
// Fermeture de la modale si on clique n'importe où autour de la modale
window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.animationName = "fadeout";
      setTimeout( () => {
        modal.style.display = "none";
      }, "2000");
    }
}


});