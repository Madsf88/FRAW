// Ready

$(document).ready(function() {
    initiateScrollDown();
});

// Ready - END



// Scroll

$(window).scroll(function () {
    toggleScrollDown();
});

// Scroll - END


// Resize

$(window).resize(function() {
    
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
    $("html, body").animate({ scrollTop: windowHeight });
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

var windowHeight = $(window).height();
console.log(windowHeight);
$("#backgroundImage").css("height",windowHeight + 100 + "px");

// Make height of header - END