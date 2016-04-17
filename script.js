
$.fn.isOnScreen = function(){

    var win = $(window);

    var viewport = {
        top : win.scrollTop(),
        left : win.scrollLeft()
    };
    viewport.right = viewport.left + win.width();
    viewport.bottom = viewport.top + win.height();

    var bounds = this.offset();
    bounds.right = bounds.left + this.outerWidth();
    bounds.bottom = bounds.top + this.outerHeight();

    return (!(viewport.right < bounds.left || viewport.left > bounds.right || viewport.bottom < bounds.top || viewport.top > bounds.bottom));

};

$(document).ready(function(){
    $(window).scroll(function(){
        if ($('#titleName').isOnScreen()) {
            $("#titleName").addClass("animated fadeInUp delay-three") ;
        }
        if ($('#skills').isOnScreen()) {
            $("#skills").addClass("animated fadeInUp delay-three") ;
        }


        ​$("#submit-btn").click(function() {
            return false;
        });

        $("#submit-btn").preventDefault();
    //     if ($('.lightbox1').isOnScreen()) {
    //         $(".lightbox1").addClass("animated fadeInUp delay-three") ;
    //     }
    //
    //     if ($('.lightbox2').isOnScreen()) {
    //         $(".lightbox2").addClass("animated fadeInUp delay-three") ;
    //     }
    //
    //     if ($('.lightbox3').isOnScreen()) {
    //         $(".lightbox3").addClass("animated fadeInUp delay-three") ;
    //     }
    //
    //     if ($('.lightbox4').isOnScreen()) {
    //         $(".lightbox4").addClass("animated fadeInUp delay-three") ;
    //     }
    // });


});
