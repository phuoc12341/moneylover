$( document ).ready(function() {
    new fullpage('#fullpage', {
        autoScrolling:true,
        anchors:['firstPage', 'secondPage', 'thirdPage'],
        scrollHorizontally: true,
        autoScrolling: true,

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

    let $listIndicators = $(".slide-indicators").find("li");
    $listIndicators.click(function () {
        $indexSlideTo = $(this).attr("data-slide-to");
        console.log($indexSlideTo)
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

});