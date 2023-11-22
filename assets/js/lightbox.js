window.addEventListener("DOMContentLoaded", () => {

//*************/
// Lightbox
//*************/

  // Icone plein écran
  const iconFullscreen = document.getElementById('icone-plein-ecran');
  // Icone plein écran
  let iconFullscreenRecommandations = document.querySelectorAll('.icone-plein-ecran.icone-plein-ecran-recommadations');
  //Lightbox
  const lightbox = document.getElementById('lightbox');
  // Bouton de fermeture
  const btnCloseLightbox = document.querySelector('.lightbox_close');

  // Elements REF et CATEGORIE
  let lightboxRefElement = document.querySelector(".lightbox-ref");
  let lightboxCatElement = document.querySelector(".lightbox-categorie")

  let refValue ="";
  let catValue ="";

  // Ouverture de la lightbox
  if(iconFullscreen != null ) {
    iconFullscreen.addEventListener("click",function() {
      lightbox.style.display = "block";
      lightbox.style.animationName = "fadein";
      }
    )
  }

  function openLightbox(e) {
    // Récupération du lien de l'image à afficher
    let src = e.target.dataset.src;
    let img = document.getElementById("img-lightbox");
    img.src = src;

    // Référence et Catégorie
    let parentImageGalerie = e.target.parentElement.parentElement;
    let contenuRefElement = parentImageGalerie.querySelector(".contenu-ref");
    let contenuCatElement = parentImageGalerie.querySelector(".contenu-categorie");

    refValue = contenuRefElement.textContent;
    catValue = contenuCatElement.textContent;

    lightboxRefElement.textContent = refValue;
    lightboxCatElement.textContent = catValue;

    lightbox.style.display = "block";
    lightbox.style.animationName = "fadein";

    // Navigation lightbox
    // Flèche précédente
    let lightboxPrev = document.querySelector('.lightbox_prev');
    // Flèche suivante
    let lightboxNext = document.querySelector('.lightbox_next');

    lightboxPrev.addEventListener('click', lightboxNav );
    lightboxNext.addEventListener('click', lightboxNav );

    let allGaleriePosts = document.querySelectorAll('.galerie-post .attachment-post-thumbnail');
    let allGalerie = document.querySelectorAll('.page-recommandations_photo_img');

    let allGaleriePostsSrc = [];
    allGaleriePosts.forEach((element)=>{
      allGaleriePostsSrc.push(element.dataset.src);
    });

    function lightboxNav(e) {
      // Source de l'image
      let srcCurrentPicture = document.getElementById('img-lightbox').src;
      // Index de la source de l'image
      let currentIndex = allGaleriePostsSrc.indexOf(srcCurrentPicture);

      if( e.target == lightboxPrev && currentIndex > 0) {
        currentIndex--
      } else if( e.target == lightboxNext && currentIndex < allGaleriePostsSrc.length -1) {
        currentIndex++;
      }
      if( currentIndex == 0) {
        lightboxPrev.style.visibility = "hidden"; 
      } else {
        lightboxPrev.style.visibility = "visible";
      }
      if( currentIndex == allGaleriePostsSrc.length -1) {
        lightboxNext.style.visibility = "hidden"; 
      } else {
        lightboxNext.style.visibility = "visible";
      }
      
      // On change la source de l'image avec le nouvel index
      img.src = allGaleriePostsSrc[currentIndex];
      // Référence
      lightboxRefElement.textContent = allGalerie[currentIndex].children[2].children[2].textContent;
      // Catégorie
      lightboxCatElement.textContent = allGalerie[currentIndex].children[2].children[3].textContent;
    }
  }

  iconFullscreenRecommandations.forEach((element) =>
    element.addEventListener("click", openLightbox)
  )

  // Fermeture de la lightbox
  btnCloseLightbox.onclick = function(e) {
    lightbox.style.animationName = "fadeout";
    setTimeout( () => {
      lightbox.style.display = "none";
    }, "1000");
  };


  

})

