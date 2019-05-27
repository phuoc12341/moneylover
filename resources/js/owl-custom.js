$( document ).ready(function() {
    var owl = $('.owl-carousel');
    owl.owlCarousel({
        items:1,
        margin:10,
        autoplay:true,
        autoplayTimeout:3000,
        center: true,
        rewind: true,
        autoplayHoverPause:true
    });
    $('.play').on('click',function(){
        owl.trigger('play.owl.autoplay')
    })
    $('.stop').on('click',function(){
        owl.trigger('stop.owl.autoplay')
    })

    $('.owl-next').click(function () {
        owl.trigger('next.owl.carousel', [400]);
    });

    $('.owl-prev').click(function () {
        owl.trigger('prev.owl.carousel', [400]);
    });

    $("#section_4").find(".owl-page:nth-child(1)").addClass("isClicked isShowed");

    $('.owl-page').click(function () {
        indexImageIsClicked = $(this).data("index-page");
        $("#section_4").find(".owl-page").removeClass("isClicked isShowed");
        $("#section_4").find(".owl-page:nth-child(" + indexImageIsClicked + ")").addClass("isClicked isShowed");
        
        $("#section_4").find(".line-indicator").removeClass("firstImage secondImage thirdImage");
        if (indexImageIsClicked == 1) {
            $("#section_4").find(".line-indicator").addClass("firstImage");
        } else if (indexImageIsClicked == 2) {
            $("#section_4").find(".line-indicator").addClass("secondImage");
        } else if (indexImageIsClicked == 3) {
            $("#section_4").find(".line-indicator").addClass("thirdImage");
        }

        owl.trigger('to.owl.carousel', [--indexImageIsClicked, [400]]);
    });

    owl.on('changed.owl.carousel', function(event) {
        let indexOfSlide = event.item.index;
        indexOfSlide = ++indexOfSlide;

        $("#section_4").find(".owl-page").removeClass("isClicked isShowed");
        $("#section_4").find(".owl-page:nth-child(" + indexOfSlide + ")").addClass("isClicked isShowed");
        
        $("#section_4").find(".line-indicator").removeClass("firstImage secondImage thirdImage");
        if (indexOfSlide == 1) {
            $("#section_4").find(".line-indicator").addClass("firstImage");
        } else if (indexOfSlide == 2) {
            $("#section_4").find(".line-indicator").addClass("secondImage");
        } else if (indexOfSlide == 3) {
            $("#section_4").find(".line-indicator").addClass("thirdImage");
        }
    })

    $("#section_4").find(".my-carousel").mouseenter(function () {
        owl.trigger("stop.owl.autoplay");
    });

    $("#section_4").find(".my-carousel").mouseleave(function () {
        owl.trigger("play.owl.autoplay");
    });
});