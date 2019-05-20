<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="css/fullpage.css"/>
    <link rel="stylesheet" type="text/css" href="css/app.css"/>
    <link rel="stylesheet" type="text/css" href="css/animate.css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
</head>
<body>
    <div id="app"></div>
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
        <div class="border-header"></div>
    </div>

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

    <div id="video">
        <div>
            <iframe class="animated zoomIn" width="640" height="360" src="https://www.youtube.com/embed/jSv7DUqZ3pk" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        <button class="close">
            <span class="iconclosevideo"></span>
        </button>
    </div>

    <div id="fullpage">
        <div class="section" id="section_0">
            <div id="slide_1">
                <div class="tren">
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
        <div class="section" id="section_1">
            <div class="container">
                <div class="row content">
                    <div class="col-sm-6 video">
                        <img src="images/postervideo.png" alt="">
                        <button class="btn animated fadeIn">
                            <span id="triangle-right"></span>
                        </button>
                    </div>
                    <div class="col-sm-6 text">
                        <h3 class="animated fadeInUp">An intuitive and cross-platform finance app</h3>
                        <p class="animated fadeInUp">Money Lover helps you get just about everything managed. A smart, easy-to-use app that allows you to track and categorize your in-and-out money, create budgets that you can actually stick to. It works seamlessly across devices and platforms, available on phone, tablet, PC and Web.</p>
                    </div>
                </div>
            </div>
            Some section
        </div>
        <div class="section" id="section_2">Some section</div>
        <div class="section" id="section_3">Some section</div>
        <div class="section" id="section_4">Some section</div>
        <div class="section" id="section_5">Some section</div>
        <div class="section" id="section_6">Some section</div>
    </div>
    <script type="text/javascript" src="js/fullpage.js"></script>
    <script type="text/javascript" src="js/app.js"></script>
</body>
</html>