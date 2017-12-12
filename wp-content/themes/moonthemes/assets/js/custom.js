(function($) {
		
	function handlePreloader() {
		if($('.preloader').length){
			$('.preloader').delay(500).fadeOut(500);
			$('body').removeClass('page-load');
		}
	}
	
	function handleStickyHeader(){

        $(window).scroll(function() {
            var currentScrollPosition = $(window).scrollTop();

            if ($(window).scrollTop() > 150 ) {

                $('header').addClass('fixed-header');
                $('.logo-bottom').removeClass('hidden-lg');

            } else {
                $('header').removeClass('fixed-header');
                $('.logo-bottom').addClass('hidden-lg');
            }
        });
    }

    function handleTestimonial(){

		$('.testimonials-carousels').owlCarousel({
			loop:true,
			margin:30,
			nav:true,
			autoplayHoverPause:false,
			autoplay: 5000,
			smartSpeed: 700,
			navText: [ '<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>' ],
			responsive:{
				0:{
					items:1
				},
				600:{
					items:1
				},
				760:{
					items:2
				},
				1024:{
					items:3
				},
				1200:{
					items:3
				}
			}
		});    		
    }

    function handleClients(){

		$('.partner-slider').owlCarousel({
			loop:true,
			margin:30,
			nav:true,
			smartSpeed: 500,
			autoplay: 4000,
			navText: [ '<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>' ],
			responsive:{
				0:{
					items:1
				},
				480:{
					items:2
				},
				600:{
					items:3
				},
				800:{
					items:4
				},
				1200:{
					items:5
				}
			}
		});    		
    }
	
	function handleAcordion(){
		$('.according_title').on('click', function(){		
			if($(this).hasClass('active')){
				$(this).addClass('active');			
			}
			
			//if ($(this).next('.according_details').is(':visible')){
//				$(this).removeClass('active');
//			}
			else{
				$('.according_title').removeClass('active');
				$('.according_details').slideUp(300);
				$(this).addClass('active');
				$(this).next('.according_details').slideDown(300);	
			}
		});	
	}

	$(document).ready(function(){
		var rangeSlider = function(){
		  var slider = $('.range-slider'),
			  range = $('.range-slider__range'),
			  value = $('.range-slider__value');
			
		  slider.each(function(){

			value.each(function(){
			  var value = $(this).prev().attr('value');
			  $(this).html(value);
			});

			range.on('input', function(){
			  $(this).next(value).html(this.value);
			});
		  });
		};

		rangeSlider();
		handleStickyHeader();
		handleTestimonial();
		handleClients();
		handleAcordion();

	});
	
   
	$(window).on('load', function() {
		handlePreloader();
	});

})(jQuery);