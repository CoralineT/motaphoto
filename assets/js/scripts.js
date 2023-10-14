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
});

