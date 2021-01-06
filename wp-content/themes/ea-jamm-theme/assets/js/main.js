$(document).ready(function() {

	(function($) {
	    $.fn.clickToggle = function(func1, func2) {
	        var funcs = [func1, func2];
	        this.data('toggleclicked', 0);
	        this.click(function() {
	            var data = $(this).data();
	            var tc = data.toggleclicked;
	            $.proxy(funcs[tc], this)();
	            data.toggleclicked = (tc + 1) % 2;
	        });
	        return this;
	    };
	}(jQuery));
	
	$(window).scroll(function() {
		if ($(this).scrollTop() > 1){  
			$('.page-title').addClass("sticky");
		}
		else{
			$('.page-title').removeClass("sticky");
		}
	});

	// Toggle Collapse
	$('.faq li .question').click(function () {
		$(this).find('.plus-minus-toggle').toggleClass('collapsed');
		$(this).parent().toggleClass('active');
	});
	$(window).scroll(function() {
	    if ($(this).scrollTop() >= 50) {        // If page is scrolled more than 50px
	        jQuery('#return-to-top').fadeIn(200);    // Fade in the arrow
	    } else {
	        jQuery('#return-to-top').fadeOut(200);   // Else fade out the arrow
	    }
	});

	$('#return-to-top').click(function() {      // When arrow is clicked
		$('body,html').animate({
	        scrollTop : 0                       // Scroll to top of body
	    }, 500);
	});

	$('img.mb-3.mx-auto.logo').click(function() {      // When arrow is clicked
		$('body,html').animate({
	        scrollTop : 0                       // Scroll to top of body
	    }, 500);
	});

	$("a.nav-link").click(function(e){
		$('html, body').animate({
			scrollTop: $(e.target.hash).offset().top - 15
		});  
		$(this).parent().siblings().removeClass('active');
		var $parent = $(this).parent();
	    $parent.addClass('active');
	});

	$(".button").click(function(e){
		$('html, body').animate({
			scrollTop: $(e.target.hash).offset().top - 15
		});  

	});

	window.addEventListener('load', () => {
		const headings = document.querySelectorAll('section');
		var topMenu = $(".navbar-nav"),
		topMenuHeight = topMenu.outerHeight()+15,
	    menuItems = topMenu.find("a");

		document.addEventListener('scroll', (e) => {
			headings.forEach(ha => {
				const rect = ha.getBoundingClientRect();
				if(rect.top > 0 && rect.top < 150) {	
					if(ha.id != "presentation")
					{
						const location = window.location.toString().split('#')[0];
						history.replaceState(null, null, location + '#' + ha.id);
						//console.log(menuItems.filter("[href='/ea-jamm/#"+ha.id+"']").parent()[0].classList);
						if(menuItems.filter("[href='/ea-jamm/#"+ha.id+"']").parent()[0].classList.contains("active")){
						}
						else
						{
							menuItems
							.parent().removeClass("active")
							.end().filter("[href='/ea-jamm/#"+ha.id+"']").parent().addClass("active");
						}
					}
					else
					{
						menuItems
						.parent().removeClass("active")
						const location = window.location.toString().split('#')[0];
						history.replaceState(null, null, location);
					}
				}
			});
		});
	});

	$('.oeil').clickToggle(function functionName() {
    //Change the attribute to text
    var oeil = this.getElementsByTagName("use")[0];
    oeil.setAttributeNS('http://www.w3.org/1999/xlink', 'href', '#eye_open');
    $('#password').attr('type', 'text');
    //$('.oeil use').attr("xlink:href", "#eye_open");
	}, function () {
	    //Change the attribute back to password
	    var oeil = this.getElementsByTagName("use")[0];
   		oeil.setAttributeNS('http://www.w3.org/1999/xlink', 'href', '#eye_closed');
	    $('#password').attr('type', 'password');
	    //$('.oeil use').attr("xlink:href", "#eye_close");
	}
	);

	// $('#recipeCarousel').carousel({
	//   interval: 10000
	// })

	// $('.carousel .carousel-item').each(function(){
	//     var minPerSlide = 1;
	//     var next = $(this).next();
	//     if (!next.length) {
	//     next = $(this).siblings(':first');
	//     }
	//     //next.children(':first-child').clone().appendTo($(this));
	    
	//     for (var i=0;i<minPerSlide;i++) {
	//         next=next.next();
	//         if (!next.length) {
	//         	next = $(this).siblings(':first');
	//       	}
	        
	//         next.children(':first-child').clone().appendTo($(this));
	//       }
	// });

	$(function(){
		var cw = $('.img-fluid').width();
		console.log(cw-(20/100));
		$('.video-image').css({'height':cw/1.3+'px'});
		var el = $('.video-image');
		console.log( $ === jQuery, $.fn.jquery, el, el.height() );
	});

	$(function(){
		var ch = $('.img-fluid').height();
		$('.card-image').css({'height':ch+'px'});
		
	});

	// var ptoggle = document.getElementById("project-toggler");
	// function toggleSlide(x) {
	// if (x.matches) { // If media query matches
	// 	ptoggle.classList.toggle("slide");
	// } else{
	// 	ptoggle.classList.toggle("slide");
	// }  }
	// var x = window.matchMedia("(max-width: 700px)");
	// toggleSlide(x); // Call listener function at run time
	// x.addListener(toggleSlide); // Attach listener function on state 
	// changes


  $("#myCarousel").on("slide.bs.carousel", function(e) {
    var $e = $(e.relatedTarget);
    var idx = $e.index();
    var itemsPerSlide = 3;
    var totalItems = $(".carousel-item").length;

    if (idx >= totalItems - (itemsPerSlide - 1)) {
      var it = itemsPerSlide - (totalItems - idx);
      for (var i = 0; i < it; i++) {
        // append slides to end
        if (e.direction == "left") {
          $(".carousel-item")
            .eq(i)
            .appendTo(".carousel-inner");
        } else {
          $(".carousel-item")
            .eq(0)
            .appendTo($(this).find(".carousel-inner"));
        }
      }
    }
  });

  $('.openMdl').on('click',function(){
  		var url = $(this).closest('.card').find('a').attr("href");
  		console.log(url);
  		var video = document.getElementById('video');
  		video.setAttribute('src', url);
  });

$('#exampleModalCenter').on('hidden.bs.modal', function () {
	var video = $("#video").attr("src");
	$("#video").attr("src","");
	//$("#video").attr("src",video);
});

});


