$(document).ready(function () {
    "use strict";
});
/* ----- Carousel Caption Animation ----- */
var $myCarousel = $('#myCarousel');
$myCarousel.carousel();

function doAnimations(elems) {
    var animEndEv = 'webkitAnimationEnd animationend';

    elems.each(function () {
        var $this = $(this),
                $animationType = $this.data('animation');

        $this.addClass($animationType).one(animEndEv, function () {
            $this.removeClass($animationType);
        });
    });
}

var $firstAnimatingElems = $myCarousel.find('.item:first').find('[data-animation ^= "animated"]');

doAnimations($firstAnimatingElems);

$myCarousel.carousel({
    interval: 7000
});

$myCarousel.on('slide.bs.carousel', function (e) {
    var $animatingElems = $(e.relatedTarget).find("[data-animation ^= 'animated']");
    doAnimations($animatingElems);
});

/* Beverage Carousel
 -----------------------------------------------------*/

$(document).ready(function () {
    $("#partners-carousel").owlCarousel({
        autoPlay: 7000,
        items: 1,
        pagination: false,
        itemsCustom: [
            [450, 1],
            [768, 2],
            [992, 3],
            [1200, 4],
            [1400, 4]
        ],
    });

    var owl = $("#partners-carousel");

    owl.owlCarousel();

    // Custom Navigation Events
    $(".next").click(function () {
        owl.trigger('owl.next');
    })
    $(".prev").click(function () {
        owl.trigger('owl.prev');
    });
});

