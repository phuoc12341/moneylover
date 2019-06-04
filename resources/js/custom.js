$( document ).ready(function() {
    new fullpage('#fullpage', {
        anchors:['firstPage', 'secondPage', 'thirdPage', 'fourthPage', 'fifth', 'sixth', 'seventh'],
        // scrollBar: true,
        scrollOverflowReset: false,
        controlArrows: true,
        fitToSection: true,
        easing: 'easeInOutCubic',



        afterLoad: function(origin, destination, direction){
            if (origin != null) {
                let originContent = $(origin.item).find(".content");
                originContent.addClass('d-none');
            }

            if (destination.index == 0) {
                $(".header").find('.firstHeader').removeClass('d-none');
                $(".header").find('.notFirstHeader').addClass('d-none');
                $(".header").removeClass("isNotFirstPage");

                $(".listSocial ol li a").addClass("white");
                $(".listSocial ol li").addClass("border-first-white");
            } else if (destination.index != 0) {
                $(".header").find('.firstHeader').addClass('d-none');
                $(".header").find('.notFirstHeader').removeClass('d-none');
                $(".header").addClass("isNotFirstPage");
                $(".listSocial ol li a").removeClass("white");
                $(".listSocial ol li").removeClass("border-first-white");
            } 

            if (destination.index == 6) {
                $(".header").find(".notFirstHeader").find("a:last-child").addClass("d-none");
                console.log($(".header").find(".notFirstHeader").find("a:last-child"))
            } else {
                $(".header").find(".notFirstHeader").find("a:last-child").removeClass("d-none");
            }

        },

        onLeave: function(origin, destination, direction){
            let $listIndicators = $(".slide-indicators").find("li");

            let $originIndicator = $("[data-slide-to =" + origin.index + "]");
            let $destinationIndicator = $("[data-slide-to =" + destination.index + "]");
            $listIndicators.removeClass('active');
            $destinationIndicator.addClass('active');

            let destinationContent = $(destination.item).find(".content")
            if (destinationContent.hasClass("d-none")) {
                destinationContent.removeClass('d-none');
            }
        }
    });

    fullpage_api.setAllowScrolling(true);

    let listContentOfSlide = $(".content");
    listContentOfSlide.each(function( index, value ) {
        if (index != 0) {
            $(this).addClass("d-none");
        }
    });

    if ($( window ).width() <= 991) {
        fullpage_api.setResponsive(true);
    } else if ($( window ).width() >= 992) {
        fullpage_api.setResponsive(false);
    }

    $(window).on('resize', function(){
        let win = $(this);
        if (win.width() >= 992) {
            fullpage_api.setResponsive(false);
        } else if (win.width() < 992) {
            fullpage_api.setResponsive(true);
        }
    });

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


    let $listIndicators = $(".slide-indicators").find("li");
    $listIndicators.click(function () {
        $indexSlideTo = $(this).attr("data-slide-to");
        fullpage_api.moveTo(++$indexSlideTo);
    });

    let $buttonShowVideo = $("#section_1").find("button");
    $buttonShowVideo.click(function () {
        $("#video").css("display", "block");
    });

    let $buttonCloseVideo = $("#video").find("button");
    $buttonCloseVideo.click(function () {
        $("#video").css("display", "none");
        let iframe = $("#video").find("iframe");
        iframe.attr('src', iframe.attr('src'));
    });

    let test = $("#section_2").find(".content").find(".khoitext");
    test.each(function () {
        $(this).mouseenter(function() {
            let $khoiTextIsHovered = $(this);
            let $indexOfKhoiText = $khoiTextIsHovered.attr("index");

            let test = $("#section_2").find(".containDeviceImage").find("div");

            test.each(function( index ) {
                let $image = $(this);
                if ($indexOfKhoiText == (++index)) {
                    $image.removeClass("d-none");
                } else {
                    $image.addClass("d-none");
                }
            });

            if ($indexOfKhoiText == 2) {
                let imgGif = $("#section_2").find(".containDeviceImage").find(".preview3").find("img");
                let imageGif1 = $(imgGif[1]);
                let imageGif2 = $(imgGif[3]);
                imageGif1.attr("src", "images/in_depth_1.gif?" +new Date().getTime());
                imageGif2.attr("src", "images/in_depth_2.gif?" +new Date().getTime());
            }
        });
    });

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

    $downloadBtn = $("#section_0 .row button:nth-child(2)");
    $downloadBtn.click(function () {
        fullpage_api.moveTo(7);
    })

});