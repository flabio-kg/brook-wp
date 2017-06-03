// RUN orbit
$(window).load(function() {
	$('#slider').orbit({
	    timer: true,
	    advanceSpeed: 5000, 
		captions: false,
		bullets: true
	});
				
	$("ul.orbit-bullets li:contains('1')").addClass("primo");
	$("ul.orbit-bullets li:contains('2')").addClass("secondo");
	$("ul.orbit-bullets li:contains('3')").addClass("terzo");
	$("ul.orbit-bullets li:contains('4')").addClass("quarto");
	$("ul.orbit-bullets li:contains('5')").addClass("quinto");
				
});





// smooth scrolling to in-page anchors.
$.fn.smoothScrollTo = function(){
  return this.live('click', function (e) {
    var elm = $(this).attr('href');
    $('html,body').animate({'scrollTop': $(elm).offset().top-40+'px'}); // 40px buffer to top.
    e.preventDefault();
  });
};


//
$(document).ready(function () {

   /* $('a.more').click(function () {
        $('#main').addClass('showstory2');
        $('a.more').hide();
        return false;
    });

    $('a.close').click(function () {
        $('#main').removeClass('showstory2');
        $('a.more').show();
        return false;
    });*/

    // RUN menu
    $("li.aprilista").hover(
        function () {
            $(this).addClass('mostradropdown');
        },
        function () {
            $(this).removeClass('mostradropdown');
        }
    );

    // RUN carousel
    $('#carousel').jCarouselLite({
        btnPrev: '.prev',
        btnNext: '.next',
        circular: true,
        mouseWheel: true,
        easing: 'swing',
        speed: 400,
        scroll: 1,
        visible: 3
    });

    // Feed from blog
    $("#feed").PaRSS(
        "http://blog.brooksengland.com/wps/feed/",   // rss feed url (required)
        5,                                   // number of items (optional)
        "",                        // date format (optional)
        false                                 // descriptions? (optional)
    );

    $("#freeDeliveryPopup").fancybox({ 
        type: 'iframe',
        autoDimensions: false,
        width: 445,
        height: 328,
        showCloseButton: true,
        enableEscapeButton: true
    });

  /*  // gestione searchbox
    $("input.searchbox").keypress(function (event) {
        if (event.which == 13) {
            event.preventDefault();
            var val = jQuery.trim($(this).val());
            if (val != '') location.href = "/en/Search.aspx?s=" + val;
        }
    });
    $("input.searchbox").autocomplete({
        minLength: 2,
        source: "/en/Search.ashx?o=ac"
    });*/

    // send mail popup
    /*$("a.sendm").fancybox({
        type: 'iframe',
        autoDimensions: false,
        width: 442,
        height: 600,
        showCloseButton: true,
        enableEscapeButton: true
    });*/
    // login b2b popup
    $("a.logstate").fancybox({
        type: 'iframe',
        autoDimensions: false,
        width: 228,
        height: 273,
        showCloseButton: true,
        enableEscapeButton: true
    });
    $("a.pic").fancybox({
       
    });
 
    // popup del video
    $("a#brooksvideo").click(function() {
	    $.fancybox({
			'padding'		: 0,
			'autoScale'		: false,
			'transitionIn'	: 'none',
			'transitionOut': 'none',
			'showCloseButton': true,
			'width'		: 680,
			'height'		: 495,
			'href'			: this.href.replace(new RegExp("watch\\?v=", "i"), 'v/'),
			'type'			: 'swf',
			'swf'			: {
			   	 'wmode'		: 'transparent',
				'allowfullscreen'	: 'true'
			}
		});
		

	return false;
});


});           // end of doc ready()






