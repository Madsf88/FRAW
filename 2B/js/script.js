/*jslint browser: true*/
/*global $, jQuery, alert, func, Slideout*/

// Scroll Down Arrow in Header

function scrollDown() {
    var windowHeight = $(window).height(),
        buffer = 50;
    $("html, body").animate({ scrollTop: windowHeight - buffer });
}
function toggleScrollDown() {
    var offset = $(window).scrollTop(),
        treshold = 30,
        hasHide = $(".scrollDown").hasClass("hideScrollDown");
    if (offset > treshold) {
        $(".scrollDown").addClass("hideScrollDown");
        if ($(window).width() < 641) {
            $(".icon.trailer").addClass("hideScrollDown");
        }
    } else if (offset < treshold) {
        $(".scrollDown").removeClass("hideScrollDown");
        $(".icon.trailer").removeClass("hideScrollDown");
    }
}
function initiateScrollDown() {
    $(".scrollDown").click(function () {
        scrollDown();
    });
    toggleScrollDown();
}

// Scroll Down Arrow in Header - END



// Position Heading 1 on header

function backgroundHeight() {
    var windowHeight = $(window).height();
    $("#backgroundImage").css("height", windowHeight + 0 + "px");
    if ($("#title").hasClass("fullHeight")) {
        $("#title").css("height", windowHeight + "px");
    } else {
        $("#title").css("height", windowHeight + "px");
        $("#titleSecondary").css("height", windowHeight / 2 + "px");
    }
}

// Position Heading 1 on header - END

// Youtube

function toggleVideo(state) {
    if ($("#popupVid")[0]){
    var div = document.getElementById("popupVid"),
        iframe = div.getElementsByTagName("iframe")[0].contentWindow;
        div.style.display = state === 'hide' ? 'block' : '';
        func = state === 'hide' ? 'pauseVideo' : 'playVideo';
        iframe.postMessage('{"event":"command","func":"' + func + '","args":""}', '*');
    }
}

var flag = 0;
function videoControl() {
    if (Modernizr.touch) {
            
    }else{
        var pos = $(window).scrollTop() + $(window).height();
        var bottomCheck = pos == $(document).height();
        if(bottomCheck) {
            if (flag !== 1) {
                toggleVideo();
                $("iframe").addClass("show");
                flag = 1;
            }
        }
        if (pos < $(document).height()-150) {
           if (flag === 1) {
                toggleVideo('hide');
                flag = 0;
            }
        }
    }
}

function trailerScroll() {
    $(".icon.trailer").bind('touchstart click', function () {
        $("html, body").animate({ scrollTop: $('.trailerWrapper').position().top}, 1000);
    });
}

function menuToggle() {
    $("html").toggleClass("menu-active");
}

function initiateToggleMenu() {
    $(".overlay").click(function () {
        if($("html").hasClass("menu-active")) {
            menuToggle();
            
        }
    });
    $(".icon.menu").click(function () {
        menuToggle();
        return false;
    });
}

// Load the right background size

function BackgroundImageSrc() {
    var attr = $("#backgroundImage").attr('data-bg-large');
    if (typeof attr !== "undefined" && typeof attr !== "false") {
        var bgSrc = 0;
        if ($(window).width() > 1023) {
            bgSrc = $("#backgroundImage").attr("data-bg-full");
        } else {
            bgSrc = $("#backgroundImage").attr("data-bg-large");
        }
        $("#backgroundImage").css("background-image", "url(" + bgSrc + ")");
    }
}

// Load the right background size - END

// Change default scroll to hashtag behavior
function animateHashtagScroll(){
    if(window.location.hash)
    {
        $('html, body').animate({
            scrollTop: $(window.location.hash).offset().top-80
        }, 500);
    }
}

function hamburgerBG(){
    var scrollTop = $(window).scrollTop(),
        treshold = 40,
        elementOffset = $('.panel').offset().top;
    if (scrollTop > elementOffset - treshold) {
        $('.icon.menu').addClass("bgFix");
    } else {
        $('.icon.menu').removeClass("bgFix");  
    }
}


// Ready
$(document).ready(function () {
    BackgroundImageSrc();
    backgroundHeight();
    initiateScrollDown();
    initiateToggleMenu();
    // After the fold
    trailerScroll();
    animateHashtagScroll();
});

// Ready - END



// Scroll

$(window).scroll(function () {
    toggleScrollDown();
    videoControl();
    hamburgerBG();
});

// Scroll - END


// Resize

$(window).resize(function () {
    backgroundHeight();
});


//Resize - END