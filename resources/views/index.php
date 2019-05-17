<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="css/fullpage.css"/>
    <link rel="stylesheet" type="text/css" href="css/app.css"/>
    <link rel="stylesheet" type="text/css" href="css/animate.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
</head>
<body>
    <div id="app"></div>
    <div class="slide-indicators animated fadeIn">
        <ol>
            <li data-slide-to="0" class="active"></li>
            <li data-slide-to="1"></li>
            <li data-slide-to="2"></li>
            <li data-slide-to="3"></li>
            <li data-slide-to="4"></li>
            <li data-slide-to="5"></li>
            <li data-slide-to="6"></li>
        </ol>
    </div>
    <div class="listSocial">
        <ol>
            <li class="animated fadeInLeft"><i class="fab fa-facebook-f"></i></li>
            <li class="animated fadeInLeft"><i class="fab fa-google-plus-g"></i></li>
            <li class="animated fadeInLeft"><i class="fab fa-twitter"></i></li>
        </ol>
    </div>

    <div id="fullpage">
        <div class="section" id="section_0">
            <div id="slide_1">
                <div class="tren">
                    <div class="header">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-12">
                                    <img src="images/logo1.svg" height="40px">
                                    <div class="dropdown float-right" id="languege">
                                        <button class="btn btn-secondary" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            English
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="#">English</a>
                                            <a class="dropdown-item" href="#">Tiếng việt</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="border-header">

                        </div>
                    </div>
                    <div class="content">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-5 trai">
                                    <img class="animated fadeInUp" src="images/logo_text.svg" alt="">
                                    <p class="animated fadeInUp">Simplest way to manage personal finances. Because money matters.</p>
                                    <div class="contain2button animated fadeInUp">
                                        <button type="button" class="btn btn-primary mr-2">Try on browser</button>
                                        <button type="button" class="btn btn-primary green-background"><i class="fas fa-cloud-download-alt mr-2"></i>Download for free</button>
                                    </div>
                                </div>
                                <div class="col-sm-7 phai">
                                    <img class="animated fadeInRight" src="images/screenshot1.png">
                                    <img class="animated fadeInRight" src="images/screenshot2.png">
                                    <img class="animated fadeInRight" src="images/screenshot3.png">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="duoi">

                </div>
            </div>
        </div>
        <div class="section" id="section_1">Some section</div>
        <div class="section" id="section_2">Some section</div>
        <div class="section" id="section_3">Some section</div>
        <div class="section" id="section_4">Some section</div>
        <div class="section" id="section_5">Some section</div>
        <div class="section" id="section_6">Some section</div>
    </div>

    <script type="text/javascript" src="js/fullpage.js"></script>
    <script type="text/javascript" src="js/app.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script>
        new fullpage('#fullpage', {
            //options here
            autoScrolling:true,
            anchors:['firstPage', 'secondPage', 'thirdPage'],
            scrollHorizontally: true,
            autoScrolling: true,

            onLeave: function(origin, destination, direction){
                let $listIndicators = $(".slide-indicators").find("li");

                let $originIndicator = $("[data-slide-to =" + origin.index + "]");
                let $destinationIndicator = $("[data-slide-to =" + destination.index + "]");
                $listIndicators.removeClass('active');
                $destinationIndicator.addClass('active');
                
                switch (destination.index) {
                    case 0:
                        
                        break;
                    default:
                        // statements_def
                        break;
                }
                //after leaving section 2
                if( direction =='down'){

                }

                else if(direction == 'up'){

                }
            }
        });

        $( document ).ready(function() {
            let $listIndicators = $(".slide-indicators").find("li");
            $listIndicators.click(function(event, element) {
                $indexSlideTo = $(this).attr("data-slide-to");
                console.log($indexSlideTo)
                fullpage_api.moveTo(++$indexSlideTo);
            });

        });

        fullpage_api.setAllowScrolling(true);

    </script>
</body>
</html>