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
//    console.log(hasHide);
    if (offset > treshold) {
        $(".scrollDown").addClass("hideScrollDown");
    } else if (offset < treshold) {
        $(".scrollDown").removeClass("hideScrollDown");
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
//    console.log(windowHeight);
//    $("#backgroundImage").css("height", windowHeight + 0 + "px"); // Denne bliver ikke brugt længere da vi nu wrapper baggrunden rundt om alt indholdet
    if ($("#title").hasClass("fullHeight")) {
        $("#title").css("height", windowHeight + "px");
//        console.log("test01");
    } else {
        $("#title").css("height", windowHeight / 2 + "px");
//        console.log("test02");
    }
}

// Position Heading 1 on header - END

// Youtube

function toggleVideo(state) {
    // if state == 'hide', hide. Else: show video
    var div = document.getElementById("popupVid"),
        iframe = div.getElementsByTagName("iframe")[0].contentWindow;
    div.style.display = state === 'hide' ? 'block' : '';
    func = state === 'hide' ? 'pauseVideo' : 'playVideo';
    iframe.postMessage('{"event":"command","func":"' + func + '","args":""}', '*');
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

function youtube_parser() {
    if ($(".trailerContainer").length) {
        var url = $(".trailerContainer").attr("data-url"),
            regExp = /^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#\&\?]*).*/,
            match = url.match(regExp);
        if (match && match[7].length === 11) {
            $(".trailerContainer").html('<iframe width="500" height="315" src="http://www.youtube.com/embed/' + match[7] + '?enablejsapi=1&showinfo=0&autohide=1&controls=0?modestbranding=1" frameborder="0" allowfullscreen></iframe>');
        } else {
    //        console.log("Error parsing trailer url");
        }
    }
}

// Youtube - END

// Navigation - Slideout.js

//var slideout = new Slideout({
//    'panel': document.getElementById('wrapper'),
//    'menu': document.getElementById('menu'),
//    'padding': 256,
//    'tolerance': 70
//});
//
//function initiateSlideout() {
//    $(".menu-icon").click(function () {
//        slideout.toggle();
//    });
//}

// Navigation - Slideout.js - END

function menuToggle() {
    $("html").toggleClass("menu-active");
}

$(document).ready(function () {
    $("#backgroundImage").click(function () {
        if($("html").hasClass("menu-active")) {
            menuToggle();
            
        }
    });
    $(".icon.menu").click(function () {
        menuToggle();
        event.cancelBubble = true; if (event.stopPropagation)           event.stopPropagation(); return false;
        
    });
});

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

// Ready
$(document).ready(function () {
    BackgroundImageSrc();
    backgroundHeight();
    initiateScrollDown();
    trailerScroll();
    youtube_parser();
});

// Ready - END



// Scroll

$(window).scroll(function () {
    toggleScrollDown();
    videoControl();
});

// Scroll - END


// Resize

$(window).resize(function () {
    backgroundHeight();
//    trailerScroll();
});

//Resize - END