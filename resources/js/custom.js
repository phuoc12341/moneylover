$( document ).ready(function() {
    new fullpage('#fullpage', {
        anchors:['firstPage', 'secondPage', 'thirdPage'],
        scrollBar: true,
        scrollOverflowReset: false,
        controlArrows: true,

        afterLoad: function(origin, destination, direction){
            if (origin != null) {
                let originContent = $(origin.item).find(".content");
                originContent.addClass('d-none');
            }

            if (destination.index == 0) {
                $(".header").find('.firstHeader').removeClass('d-none');
                $(".header").find('.notFirstHeader').addClass('d-none');
                $(".header").removeClass("isNotFirstPage");
            } else if (destination.index != 0) {
                $(".header").find('.firstHeader').addClass('d-none');
                $(".header").find('.notFirstHeader').removeClass('d-none');
                $(".header").addClass("isNotFirstPage");
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
            destinationContent.removeClass('d-none');

        }
    });

    fullpage_api.setAllowScrolling(true);

    var owl = $('.owl-carousel');
    owl.owlCarousel({
        items:1,
        loop:true,
        margin:10,
        autoplay:true,
        autoplayTimeout:3000,
        center: true,
        autoplayHoverPause:true
    });
    $('.play').on('click',function(){
        owl.trigger('play.owl.autoplay',[1000])
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
                owl.trigger('next.owl.carousel');
            });

            $('.owl-prev').click(function () {
                owl.trigger('prev.owl.carousel');
            });

            $('.owl-page').click(function () {
                indexSlideIsClicked = $(this).data("index-page");
                switch (indexSlideIsClicked) {
                    case 1:
                        $("#section_4").find(".owl-page").addClass("");
                        $("#section_4").find(".owl-page:nth-child(" + indexSlideIsClicked + ")").addClass("visible");
                        break;
                    case 2:
                        // statements_1
                        break;
                    case 3:
                        // statements_1
                        break;
                    default:
                        // statements_def
                        break;
                }
            })

            $("#section_4").find(".my-carousel").mouseenter(function () {
                owl.trigger("stop.owl.autoplay");
            });

            $("#section_4").find(".my-carousel").mouseleave(function () {
                owl.trigger("play.owl.autoplay");
            });

        });

});