$(document).ready(function() {
    $(".scrollDown").click(function() {
        scrollDown()
    });
    $(window).scroll(function () {
        toggleScrollDown();
    });
    toggleScrollDown();
});
function scrollDown() {
    var windowHeight = $(window).height();
    $("html, body").animate({ scrollTop: windowHeight });
};
function toggleScrollDown() {
    var offset = $(window).scrollTop();
    var treshold = 30;
    var hasHide = $(".scrollDown").hasClass("hideScrollDown");
    console.log(hasHide);
    if (offset > treshold) {
        $(".scrollDown").addClass("hideScrollDown");
    } else if (offset < treshold) {
        $(".scrollDown").removeClass("hideScrollDown");
    };
};