// Ready
$(document).ready(function() {
    initiateScrollDown();
    backgroundHeight();
    videoHeight();
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

$(window).resize(function() {
    backgroundHeight();
    videoHeight();
    trailerScroll();
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

var flag=0;
function videoControl() {
    var offset = $(".trailerContainer").offset().top;
    var currentPos = $(document).scrollTop();
    //var video = document.getElementById("trailer");
    if (offset-100 < currentPos ){
        if (flag!==1){
            toggleVideo();
            $("iframe").fadeIn();
            flag = 1;
        }
    }
    else {
//        alert(flag);
        if (flag==1){
            toggleVideo('hide');
            flag = 0;
        }
        //toggleVideo('hide');
    }
};

function trailerScroll(){
    $(".trailerIcon").bind('touchstart click', function(){
        $("html, body").animate({ scrollTop: $('.trailerContainer').position().top}, 1000);
    }
)};

// Make height of header - END

//function centerHeaderH1() {
//    var windowHeight = $(window).height();
//    $("#backgroundImage").css("height", windowHeight + 100 + "px");
//};

function toggleVideo(state) {
    // if state == 'hide', hide. Else: show video
    var div = document.getElementById("popupVid");
    var iframe = div.getElementsByTagName("iframe")[0].contentWindow;
    div.style.display = state == 'hide' ? 'block' : '';
    func = state == 'hide' ? 'pauseVideo' : 'playVideo';
    iframe.postMessage('{"event":"command","func":"' + func + '","args":""}','*');
}

function youtube_parser(){
    var url = $(".trailerContainer").attr("data-url");
    var regExp = /^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#\&\?]*).*/;
    var match = url.match(regExp);
    if (match&&match[7].length==11){
        $(".trailerContainer").html('<iframe width="500" height="315" src="http://www.youtube.com/embed/' + match[7] + '?enablejsapi=1&showinfo=0&autohide=1&controls=0?modestbranding=1" frameborder="0" allowfullscreen></iframe>');
        videoControl();
    }else{
        console.log("Error parsing trailer url");
    }
}

// Navigation Fix - http://codepen.io/alexpivtorak/pen/oyrHm

$(document).foundation();

function sideNav() {
  if ($(window).width() < 769) {
    $('.off-canvas-wrap').removeClass('move-right');
    $('.left-off-canvas-toggle').show();
  } else {
    $('.off-canvas-wrap').addClass('move-right');
    $('.left-off-canvas-toggle').hide();
  }  
}

$(window).resize(function() {
  sideNav();
});