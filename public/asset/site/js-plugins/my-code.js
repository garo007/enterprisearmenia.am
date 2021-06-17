$(document).ready(function() {
    $(".instruments>div.toggle-search").click(function (){
        $(".search-panel input").toggleClass("display");
        $(".search-panel i").toggleClass("display");
        $("div.toggle-search>*").toggleClass("display");
        $(".search-panel").toggleClass("search-open");
    });

    $('.stellarnav').stellarNav({
		theme: 'plain',
//        breakpoint: 960,
		position: 'right',
        openingSpeed:0,
        closingDelay:0,
//        scrollbarFix:true,
        closeLabel:""
	});

    if($("div").is(".slider-carousel")){
        $(".slider-carousel").owlCarousel({
            items:1,
            loop:true,
            // autoplay:true,
            smartSpeed:750,
            nav:true,
        });
    }

    if($("div").is(".slider-discover")){
        $(".slider-discover").owlCarousel({
            items:1,
            loop:true,
            // autoplay:true,
            autoplayTimeout:5000,
            smartSpeed:750,
            dots:true,
        });
    }

    /*Loader*/
    $(window).on("load",function (){
        if($("div").is(".slider-carousel")){
            var rellax = new Rellax('.parallax');
        }

        $(".preloader").fadeOut(100);
    });

    $("a.menu-toggle").click(function (){
        $("header").css({transform:"inherit"});
    });

    $(window).on("scroll",function (){
        $(".stellarnav.mobile.right>ul").css({display:"none"});
    });
});


$(".sub-knopka,.close").click(function (){
    $(".subscribe-block").fadeToggle();
});




