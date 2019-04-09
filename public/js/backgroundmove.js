$(function () {
$(document).on('mousemove', function (e) {
   var x = parseInt(-e.pageX / 100);
   var y = parseInt(-e.pageY / 100);
    $('.jumbotron').css({
        'background-position': x + "px " + y + "px"
        //'background-position': left: + "px" + top: + "px"
    });
});
});
