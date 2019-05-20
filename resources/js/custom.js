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
    });

    fullpage_api.setAllowScrolling(true);
});



