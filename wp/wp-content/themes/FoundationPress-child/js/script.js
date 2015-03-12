// Ready

$(document).ready(function() {
    initiateScrollDown();
    backgroundHeight();
    videoHeight();
    trailerScroll();
});

// Ready - END



// Scroll

$(window).scroll(function () {
    toggleScrollDown();
    videoControl();
});

// Scroll - END


// Resize

$(window).resize(function() {
    backgroundHeight();
});

//Resize - END



// Scroll Down Arrow in Header

function initiateScrollDown() {
    $(".scrollDown").click(function() {
        scrollDown()
    });
    toggleScrollDown();
};
function scrollDown() {
    var windowHeight = $(window).height();
    var buffer = 50;
    $("html, body").animate({ scrollTop: windowHeight - buffer });
};
function toggleScrollDown() {
    var offset = $(window).scrollTop();
    var treshold = 30;
    var hasHide = $(".scrollDown").hasClass("hideScrollDown");
//    console.log(hasHide);
    if (offset > treshold) {
        $(".scrollDown").addClass("hideScrollDown");
    } else if (offset < treshold) {
        $(".scrollDown").removeClass("hideScrollDown");
    };
};

// Scroll Down Arrow in Header - END



// Make height of header

function backgroundHeight() {
    var windowHeight = $(window).height();
//    console.log(windowHeight);
    $("#backgroundImage").css("height", windowHeight + 0 + "px");
    if ($("#title").hasClass("fullHeight")) {
        $("#title").css("height", windowHeight + "px");
        console.log("test01");
    } else {
        $("#title").css("height", windowHeight/2 + "px");
        console.log("test02");
    }
};


function videoHeight() {
    var windowHeight = $(window).height();
//    console.log(windowHeight);
    $(".trailerContainer").css("height", windowHeight + 0 + "px");
    
};

function videoControl() {
    var offset = $(".trailerContainer").offset().top;
    var currentPos = $(document).scrollTop()
    var video = document.getElementById("trailer");
     if (offset-100 < currentPos ){
        video.play();
        $("video").fadeIn('slow');
    }
    else {
        video.pause();
    }
};

function trailerScroll(){
    $(".trailerIcon").bind('touchstart click', function(){
        $("html, body").animate({ scrollTop: $('.trailerContainer').position().top}, 'slow');
  }
)};

// Make height of header - END

//function centerHeaderH1() {
//    var windowHeight = $(window).height();
//    $("#backgroundImage").css("height", windowHeight + 100 + "px");
//};