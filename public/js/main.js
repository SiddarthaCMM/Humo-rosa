/*=============== SHOW MENU ===============*/
const navMenu = document.getElementById('nav-menu'),
      navToggle = document.getElementById('nav-toggle'),
      navClose = document.getElementById('nav-close')

/* Menu show */
if(navToggle){
   navToggle.addEventListener('click', () =>{
      navMenu.classList.add('show-menu')
   })
}

/* Menu hidden */
if(navClose){
   navClose.addEventListener('click', () =>{
      navMenu.classList.remove('show-menu')
   })
}

window.addEventListener("load", () => {
   setTimeout(() => {
     const letters = document.querySelectorAll(".smoke");
     letters.forEach(letter => {
       letter.classList.add("animate");
     });
   }, 1000); // Espera 1 segundo después de cargar
 });
