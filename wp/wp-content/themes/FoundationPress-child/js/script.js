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

// Make video height

function videoHeight() {
    var windowHeight = $(window).height();
//    console.log(windowHeight);
    $(".trailerContainer").css("height", windowHeight + "px");
}

// Make video height - END

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
    var offset = $(".trailerContainer").offset().top,
        currentPos = $(document).scrollTop();
    //var video = document.getElementById("trailer");
    if (offset - 100 < currentPos) {
        if (flag !== 1) {
            toggleVideo();
            $("iframe").fadeIn();
            flag = 1;
        }
    } else {
//        alert(flag);
        if (flag === 1) {
            toggleVideo('hide');
            flag = 0;
        }
        //toggleVideo('hide');
    }
}

function trailerScroll() {
    $(".trailerIcon").bind('touchstart click', function () {
        $("html, body").animate({ scrollTop: $('.trailerContainer').position().top}, 1000);
    });
}

// Make height of header - END

//function centerHeaderH1() {
//    var windowHeight = $(window).height();
//    $("#backgroundImage").css("height", windowHeight + 100 + "px");
//};

function youtube_parser() {
    if ($(".trailerContainer").length) {
        var url = $(".trailerContainer").attr("data-url"),
            regExp = /^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#\&\?]*).*/,
            match = url.match(regExp);
        if (match && match[7].length === 11) {
            $(".trailerContainer").html('<iframe width="500" height="315" src="http://www.youtube.com/embed/' + match[7] + '?enablejsapi=1&showinfo=0&autohide=1&controls=0?modestbranding=1" frameborder="0" allowfullscreen></iframe>');
            videoControl();
        } else {
    //        console.log("Error parsing trailer url");
        }
    }
}

// Navigation - Slideout.js

var slideout = new Slideout({
    'panel': document.getElementById('wrapper'),
    'menu': document.getElementById('menu'),
    'padding': 256,
    'tolerance': 70
});

function initiateSlideout() {
    $(".menu-icon").click(function () {
        slideout.toggle();
    });
}

// Navigation - Slideout.js - END

// Ready
$(document).ready(function () {
    initiateScrollDown();
    backgroundHeight();
    videoHeight();
    trailerScroll();
    youtube_parser();
    initiateSlideout();
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
    videoHeight();
    trailerScroll();
});

//Resize - END