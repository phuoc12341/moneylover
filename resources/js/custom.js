$( document ).ready(function() {
    new fullpage('#fullpage', {
        anchors:['firstPage', 'secondPage', 'thirdPage', 'fourthPage', 'fifth', 'sixth', 'seventh'],
        // scrollBar: true,
        scrollOverflowReset: false,
        controlArrows: true,
        // fitToSection: true,
        easing: 'easeInOutCubic',



        afterLoad: function(origin, destination, direction){
            if (origin != null) {
                let originContent = $(origin.item).find(".content");
                originContent.addClass('d-none');
            }

            if (destination.index == 0) {
                if ($( window ).width() >= 992) {
                    console.log('test')
                    $(".header").find('.firstHeader').removeClass('d-none');
                    $(".header").find('.notFirstHeader').addClass('d-none');
                    $(".header").removeClass("isNotFirstPage");
                }

                $(".listSocial ol li a").addClass("white");
                $(".listSocial ol li").addClass("border-first-white");
            } else if (destination.index != 0) {
                if ($( window ).width() >= 992) {
                    $(".header").find('.firstHeader').addClass('d-none');
                    $(".header").find('.notFirstHeader').removeClass('d-none');
                    $(".header").addClass("isNotFirstPage");
                }
                $(".listSocial ol li a").removeClass("white");
                $(".listSocial ol li").removeClass("border-first-white");
            }

            if (destination.index == 6) {
                $(".header").find(".notFirstHeader").find("button").addClass("d-none");
            } else {
                $(".header").find(".notFirstHeader").find("button").removeClass("d-none");
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

    $downloadBtn = $("#section_0 .row button:nth-child(2)");
    $downloadBtn.click(function () {
        fullpage_api.moveTo(7);
    })

});