
// $(document).ready(function(){
//     x=0;
//     largeurSlide = 100;
//     // pour le next
//     $('.next').on('click',function(){
//         x=(x<=300)?(x+largeurSlide):0;
//         $('figure').css('left',-x+'%')
//     })
//     $('.prev').on('click',function(){
//         x=(x>=largeurSlide)?(x-largeurSlide):400;
//         $('figure').css('left',-x+'%')
//     })
// }) 
$(document).ready(function () {
    var x = 0; // Position actuelle du slide
    var slideWidth = $('.slide').outerWidth(); // Largeur d'un slide
    var $slides = $('.slides'); // Conteneur des slides
    var totalSlides = $('.slide').length; // Nombre total de slides

    function showSlide() {
        // Applique la transformation pour afficher le slide actuel
        $slides.css('transform', 'translateX(' + (-x * slideWidth) + 'px)');
    }

    $('.next').click(function () {
        x = (x + 1) % totalSlides; // Passe au slide suivant
        showSlide();
    });

    $('.prev').click(function () {
        x = (x - 1 + totalSlides) % totalSlides; // Passe au slide précédent
        showSlide();
    });

    showSlide();
})
// $(document).ready(function(){
//     X=0;
//     tailleSlide = 100;
//     totalSlide= 4;

//     // pour le neXt
//     $('.neXt').on('click',function(){
//         X=(X<(totalSlide-1)*tailleSlide)?(X+tailleSlide):0;
//         $('figure').css('left',-X+'%')
//     })
//     $('.prev').on('click',function(){
//         X=(X> 0)?(X-tailleSlide):((totalSlide-1)*tailleSlide);
//         $('figure').css('left',-X+'%')
//     })
// }) 