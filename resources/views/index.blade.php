<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <base href="{{asset('/')}}" target="_blank">
    <link rel="stylesheet" type="text/css" href="bower_components/moneylover-bower/fullpage/fullpage.css"/>
    <link rel="stylesheet" type="text/css" href="css/app.css"/>
    <link rel="stylesheet" type="text/css" href="bower_components/moneylover-bower/animate.css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
</head>
<body>
    <div id="app"></div>
    <div class="header">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 firstHeader">
                    <img src="images/logo1.svg" height="40px">
                    <div class="dropdown float-right d-none d-lg-block" id="languege">
                        <button class="btn btn-secondary" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            English
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">English</a>
                            <a class="dropdown-item" href="#">Tiếng việt</a>
                        </div>
                    </div>
                    <button class="btn languege-for-mobile d-block d-lg-none float-right" type="button" data-toggle="modal" data-target="#languageModal">English <span class="caret"></span>
                    </button>
                </div>
                <div class="col-sm-12 notFirstHeader d-none">
                    <img class="col-12 col-md-6" src="images/logo2.svg" alt="" height="40px">
                    <div class="d-none col-md-6 d-sm-block float-right edit-label">

                        @isset($headerMenu)
                            @foreach($headerMenu as $menu)
                                @php
                                    $baseCurrentURL = Request::url();
                                    $isCurrentPage = strpos($menu->link, $baseCurrentURL);
                                    if ($isCurrentPage === 0) {
                                        $isCurrentPage = true;
                                    }
                                @endphp
                                <a href="{{ $menu->link }}"
                                    @if (!$isCurrentPage)
                                        target="_blank"
                                    @endif
                                    
                                    @if (!$loop->last)
                                        class="btn btn-primary btn-lg mr-3"
                                    @else
                                        class="btn btn-primary btn-lg"
                                    @endif
                                >{{ $menu->name }}</a>
                            @endforeach
                        @endisset
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="languageModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm languageModal col-12" >
            <div class="modal-content  animated flipInX">
                <div class="control">
                    <input type="radio" name="inlineRadioOptions" checked="checked"> 
                    <a href="">
                        <label>English</label>
                    </a>
                    <img src="images/flag_en.png" alt="nglish" height="24px" class="pull-right">
                </div>
                <div class="control">
                    <input type="radio" name="inlineRadioOptions">
                    <a href="">
                        <label>Tiếng Việt</label>
                    </a>
                    <img src="images/flag_vi.png" alt="nglish" height="24px" class="pull-right">
                </div>
            </div>
        </div>
    </div>

    <div class="slide-indicators animated fadeIn d-none d-lg-block">
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
    <div class="listSocial d-none d-lg-block">
        <ol>
            <li class="animated fadeInLeft"><a href="https://www.facebook.com/moneylover.me" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
            <li class="animated fadeInLeft"><a href="https://plus.google.com/+MoneyloverMe" target="_blank"><i class="fab fa-google-plus-g"></i></a></li>
            <li class="animated fadeInLeft"><a href="https://www.twitter.com/moneyloverapp" target="_blank"><i class="fab fa-twitter"></i></a></li>
        </ol>
    </div>

    <div id="video">
        <div>
            <iframe class="animated zoomIn" width="640" height="360" src="{{ $listSlide[1]->value->url_youtube }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
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
                                <div class="col-lg-5 col-sm-12 col-12 trai">
                                    {{-- <img class="col-12 col-sm-12 col-md-12 animated fadeInUp" src="images/logo_text.svg"> --}}
                                    <img class="col-12 col-sm-12 col-md-12 animated fadeInUp" src="{{ Storage::url($listSlide[0]->value->text_logo) }}">
                                    <p class="animated fadeInUp">Simplest way to manage personal finances.<br>
                                  Because money matters.</p>
                                    <div class="contain2button animated fadeInUp">
                                        <a href="https://web.moneylover.me" target="_blank" class="btn btn-primary btn-lg mr-3 d-none d-lg-inline-block">Try on browser</a>
                                        <button type="button" class="btn btn-primary green-background"><i class="fas fa-cloud-download-alt mr-2 "></i>Download for free</button>
                                    </div>
                                </div>
                                <div class="col-lg-7 phai d-none d-lg-block">
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
                <div class="row content detail">
                    <div class="col-lg-6 d-none d-lg-block video">
                        <img src="images/postervideo.png" alt="">
                        <button class="btn animated fadeIn">
                            <span id="triangle-right"></span>
                        </button>
                    </div>
                    <div class="col-lg-5 offset-lg-1 col-md-10 offset-md-1 col-sm-12 col-12 text">
                        <div>
                            <h3 class="animated fadeInUp center">{{ $listSlide[1]->value->describe }}</h3>
                            <iframe width="100%" src="{{ $listSlide[1]->value->url_youtube }}" frameborder="0" class="d-block d-lg-none boder" allowfullscreen="allowfullscreen" mozallowfullscreen="mozallowfullscreen" msallowfullscreen="msallowfullscreen" oallowfullscreen="oallowfullscreen" webkitallowfullscreen="webkitallowfullscreen"></iframe>

                            <p class="animated fadeInUp col-12 col-sm-12 col-md-12">{!! $listSlide[1]->value->content !!}.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section" id="section_2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 content">
                        <div class="col-12 col-sm-12 col-md-12 d-lg-none khoitrai">
                        </div>
                        <div class="khoitrai">
                            <div class="khoitext animated fadeInLeft" index="1">
                                <h3 class="col col-sm col-md d-lg-none text-center">Features</h3>
                            </div>
                            <div class="khoitext animated fadeInLeft" index="1">
                                <div>
                                    <h3>{{$listSlide[2]->value->describe_1}}</h3>
                                    <p>{{$listSlide[2]->value->content_1}}.</p>
                                </div>
                            </div>
                            <div class="khoitext animated fadeInLeft" index="2">
                                <div>
                                    <h3>{{$listSlide[2]->value->describe_2}}</h3>
                                    <p>{{$listSlide[2]->value->content_2}}.</p>
                                </div>
                            </div>
                            <div class="khoitext animated fadeInLeft" index="3">
                                <div>
                                    <h3>{{$listSlide[2]->value->describe_3}}</h3>
                                    <p>{{$listSlide[2]->value->content_3}}.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 d-none d-lg-block">
                        <div class="containDeviceImage">
                            <div class="preview1 animated fadeInRight">
                                <img src="{{ asset(config('app.img_path')) }}/{{$listSlide[2]->value->file}}" alt="">
                            </div>
                            <div class="preview2 animated fadeInRight d-none">
                                <img src="{{ asset(config('app.img_path')) }}/{{$listSlide[2]->value->file_1[2]->img}}" alt="">
                                <img src="{{ asset(config('app.img_path')) }}/{{$listSlide[2]->value->file_1[1]->img}}" class="animated flipInX" alt="">
                                <img src="{{ asset(config('app.img_path')) }}/{{$listSlide[2]->value->file_1[0]->img}}" class="animated flipInX" alt="">
                            </div>

                            <div class="preview3 animated fadeInRight d-none">
                                <img src="{{ asset(config('app.img_path')) }}/{{$listSlide[2]->value->file_2[0]->img}}" alt="">
                                <img src="{{ asset(config('app.img_path')) }}/{{$listSlide[2]->value->file_2[1]->img}}" alt="">
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section" id="section_3">
            <div class="container content">
                <div class="khoitext " index="1">
                    <h3 class="col col-sm col-md d-lg-none text-center feature">Features</h3>
                </div>
                <div class="row text-center">
                    <div class="col-lg-4 col-sm-6 col-6 mb-5 animated fadeIn">
                        <img src="images/feature1.png" alt="">
                        <h3>Multiple devices</h3>
                        <p>Safely synchronize across devices with Bank standard security.</p>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-6 mb-5 dangcohieuung animated fadeIn">
                        <img src="images/feature2.png" alt="">
                        <h3>Recurring transaction</h3>
                        <p>Get notified of recurring bills and transactions before due date.</p>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-6 mb-5 dangcohieuung animated fadeIn">
                        <img src="images/feature3.png" alt="">
                        <h3>Travel mode</h3>
                        <p>All currencies supported with up-to-date exchange rate.</p>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-6 animated fadeIn">
                        <img src="images/feature4.png" alt="">
                        <h3>Saving plan</h3>
                        <p>Keep track on savings process to meet your financial goals.</p>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-6 animated fadeIn">
                        <img src="images/feature5.png" alt="">
                        <h3>Debt and Loan</h3>
                        <p>Manage your debts, loans and payment process in one place.</p>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-6 animated fadeIn">
                        <img src="images/feature6.png" alt="">
                        <h3>Scan receipt</h3>
                        <p>Take pictures of your receipts to auto-process and organize them.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="section" id="section_4">
            <div class="row">
                <div class="col-md-10 offset-md-1 col-xl-6 offset-xl-3 col-lg-8 offset-lg-2 my-carousel">
                    <div id="testimonial" class=" col-12 col-sm-12 col-md-12 owl-carousel owl-theme">
                        <div class="item">A simple, accessible app that allows you to budget across weeks, months and years. The neat financial calendar lets you set up alerts and keep tabs on all transactions. Plus, it works with all currencies.</div>
                        <div class="item">Perfect app. My husband and I use it to track all our expenses and income. We generate our household accounts and budget using this fab app. Furthermore, the developers are hands-on and extremely helpful. Do not look any further. Get this app now!.</div>
                        <div class="item">This will keep you organized and in control, of money you do have and money you will have. This application is easy to use and will help you keep track of every dollar.</div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12  control-owl">
                        <div class="owl-pagination">
                            <div class="owl-page" data-index-page="1">
                            </div>
                            <div class="owl-page" data-index-page="2">
                            </div>
                            <div class="owl-page" data-index-page="3">
                            </div>
                        </div>
                        <div class="owl-button">
                            <div class="owl-prev"></div>
                            <div class="owl-next"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section" id="section_5">
            <div class="container content">
                <div class="row">
                    <div class="khoitrai">
                        <h3 class="heading text-center text-up d-none d-md-block">OUR BLOGS</h3>
                    </div>
                    <div class="d-none d-md-block col-md-5">
                        <div class="heads-blog">
                            <a href="http://note.moneylover.me/9-incredible-way-cut-monthly-expense/" title="9 INCREDIBLE WAYS TO CUT MONTHLY EXPENSES" target="_blank" class="animated fadeInLeft"></a>
                            <a href="http://note.moneylover.me/06-practical-budgeting-tips-dave-ramsey/" title="06 Best Practical Budgeting Tips from Dave Ramsey" target="_blank" class="animated fadeInLeft"></a>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-7 khoitrai">
                        <div class="childs-blog">
                            <div class="blog animated fadeInUp">
                                <h4><a href="http://note.moneylover.me/happy-lunar-new-year-2019/">Happy Lunar New Year 2019</a></h4>
                                <p><i>"Whether you celebrate Lunar New Year or not, we wish you good health , wealth, and happiness in this New Year."</i></p>
                            </div>
                            <div class="blog animated fadeInUp">
                                <h4><a href="http://note.moneylover.me/perfect-icon-packs-for-xmas/">Perfect Icon Packs For Xmas</a></h4>
                                <p><i>"Check out our Icon packs collection with Xmas & Winter themes. "</i></p>
                            </div>
                            <div class="blog animated fadeInUp">
                                <h4><a href="http://note.moneylover.me/10-new-year-resolutions-on-saving-2019/">10 New Year Resolutions on Saving Money for 2019</a></h4>
                                <p><i>"Saving money is one such resolution that’s on nearly everyone’s New Year Resolutions’ list almost every year. "</i></p>
                            </div>
                            <div class="blog animated fadeInUp">
                                <h4><a href="http://note.moneylover.me/new-web-version/">New Money Lover Web is here</a></h4>
                                <p><i>"What's new in Money Lover? It now support budgeting & reporting feature on Web version. We're still working to improve it. "</i></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section" id="section_6">
            <div class="container">
                <div class="row content">
                    <div class="col-md-4 offset-md-4 col-sm-12 col-12 text-center p-0">
                        <h2 class="getNow p-0">Get it now</h2>
                    </div>
                    <div class="col-8 offset-2">
                        <div class="row devices">
                            <div class="col-12 col-sm-12 col-lg-4 text-center">
                                <a href="https://play.google.com/store/apps/details?id=com.bookmark.money&referrer=utm_source%3Dlanding" target="_blank">
                                    <img src="images/android_page7n.png" class="animated fadeInLeft android">
                                </a>
                            </div>
                            <div class="col-lg-4 d-none d-lg-block text-center">
                                <a href="https://itunes.apple.com/app/apple-store/id486312413?pt=694013&ct=landing&mt=8" target="_blank">
                                    <img src="images/iPhone_page71.png" class="animated fadeIn ios">
                                </a>
                            </div>
                            <div class="col-lg-4 d-none d-lg-block text-center">
                                <a href="https://www.microsoft.com/en-us/store/p/money-lover-money-manager/9wzdncrdrg5v?ocid=badge" target="_blank">
                                    <img src="images/winphone_page777.png" class="animated fadeInRight winphone">
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="footer">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-6 col-sm-12 col-md-3 col-12">
                                    <p class="d-none d-lg-block m-0"><strong>Address:</strong> 11/1 Nguyen Van Huyen, Cau Giay, Hanoi, Vietnam</p>
                                    <p class="m-0 center">© 2019  Money Lover. All rights reserved.</p>
                                </div>
                                <div class="d-none d-md-block col-lg-6 padding-for-chatbox text-right-not-mobile">
                                @isset($footerMenu)
                                @foreach($footerMenu as $menu)
                                    <a href="{{ $menu->link }}" class="inPolicy" target="_blank"><strong>{{ $menu->name }}</strong></a>
                                    @if (! $loop->last && !$loop->first)
                                        |
                                    @endif
                                    @if ($loop->first)
                                        <br>
                                    @endif
                                @endforeach
                                @endisset
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="bower_components/moneylover-bower/fullpage/fullpage.js"></script>
    <script type="text/javascript" src="js/app.js"></script>
    <script type="text/javascript">
        $(function(){
            if( $(window).width() < 992) {
                $('#section_1').addClass('resetHeight');
                $('.fp-tableCell').addClass('fitSection');
                $('#section_4 .row').children('div');
            } else {
                $('#section_1').removeClass('resetHeight');
                $('.fp-tableCell').removeClass('fitSection');
            }
        });
        $(function(){
            if ($(window).width() < 768) {
                test = $('#section_5 .row .khoitrai');
                test.addClass('hihe')
            }
        });

    </script>
</body>
</html>
