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
                    @isset($listSetting->first_logo)
                    <img src="storage/{{$listSetting->first_logo}}" height="40px">
                    @endisset
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
                <div class="col-sm-12 notFirstHeader">
                    @isset($listSetting->not_first_logo)
                    <img src="storage/{{$listSetting->not_first_logo}}" alt="" height="40px">
                    @endisset
                    <div class="mt-0 d-none d-sm-block float-right edit-label">

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
            @foreach ($listSocial as $item)
            <li class="animated fadeInLeft"><a href="{{ $item->url }}" target="_blank"><i class="{{$item->icon}}"></i></a></li>
            @endforeach
        </ol>
    </div>

    <div id="video">
        <div>
            @isset( $listSlide[1]->value->url_youtube)
            <iframe class="animated zoomIn" width="640" height="360" src="{{ $listSlide[1]->value->url_youtube }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            @endisset
        </div>
        <button class="close">
            <span class="iconclosevideo"></span>
        </button>
    </div>
    {{-- {{dd($listSlide[0]->value)}} --}}
    <div id="fullpage">
        <div class="section" id="section_0">
            <div id="slide_1">
                <div class="tren">
                    <div class="content">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-5 col-sm-12 col-12 trai">
                                    <img class="col-12 col-sm-12 col-md-12 animated fadeInUp" 
                                    @isset($listSlide[0]->value->text_logo)
                                    src="{{ asset('storage/' . $listSlide[0]->value->text_logo) }}"
                                    @endisset
                                    >
                                    <p class="animated fadeInUp">
                                        @isset($listSlide[0]->value->intro)
                                        {{ $listSlide[0]->value->intro }}
                                        @endisset
                                    </p>

                                    <div class="contain2button animated fadeInUp">
                                        @isset($listSlide[0]->value->buttons)
                                        @foreach($listSlide[0]->value->buttons as $key => $button)
                                        @if($key == 0)
                                        <a target="_blank" class="btn btn-primary btn-lg mr-3 d-none d-lg-inline-block {{ $button->icon }}"
                                            @isset($button->link)
                                            href="{{ $button->link }}"
                                            @endisset
                                            >
                                            @isset($button->text)
                                            {{ $button->text }}
                                            @endisset
                                        </a>
                                        @endif
                                        @if($key != 0)
                                        <button type="button" class="btn btn-primary green-background" style="background-color: {{ $button->color }}"><i class="{{ $button->icon }} mr-2"></i>{{ $button->text }}</button>
                                        @endif
                                        @endforeach
                                        @endisset
                                    </div>
                                </div>
                                <div class="col-lg-7 phai d-none d-lg-block">
                                    @isset($listSlide[0]->value->image)
                                    @foreach($listSlide[0]->value->image as $key => $image)
                                    <img class="animated fadeInRight" src="{{ asset('storage/' . $image) }}">
                                    @endforeach
                                    @endisset
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
                            <h3 class="animated fadeInUp">@isset($listSlide[1]->value->describe){{ $listSlide[1]->value->describe }}@endisset</h3>
                            @isset($listSlide[1]->value->url_youtube)
                            <iframe width="100%" src="{{ $listSlide[1]->value->url_youtube }}" frameborder="0" class="d-block d-lg-none boder" allowfullscreen="allowfullscreen" mozallowfullscreen="mozallowfullscreen" msallowfullscreen="msallowfullscreen" oallowfullscreen="oallowfullscreen" webkitallowfullscreen="webkitallowfullscreen"></iframe>
                            @endisset

                            <div class="animated fadeInUp col-12 col-sm-12 col-md-12 contentSecondSlide">@isset($listSlide[1]->value->content){!! $listSlide[1]->value->content !!}@endisset</div>
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
                                <div>
                                    @isset($listSlide[2]->value->describe_1)
                                    <h3>{{$listSlide[2]->value->describe_1}}</h3>
                                    @endisset
                                    @isset($listSlide[2]->value->content_1)
                                    <p>{{$listSlide[2]->value->content_1}}.</p>
                                    @endisset
                                </div>
                            </div>
                            <div class="khoitext animated fadeInLeft" index="2">
                                <div>
                                    @isset($listSlide[2]->value->describe_2)
                                    <h3>{{$listSlide[2]->value->describe_2}}</h3>
                                    @endisset
                                    @isset($listSlide[2]->value->content_2)
                                    <p>{{$listSlide[2]->value->content_2}}.</p>
                                    @endisset
                                </div>
                            </div>
                            <div class="khoitext animated fadeInLeft" index="3">
                                <div>
                                    @isset($listSlide[2]->value->describe_3)
                                    <h3>{{$listSlide[2]->value->describe_3}}</h3>
                                    @endisset
                                    @isset($listSlide[2]->value->content_3)
                                    <p>{{$listSlide[2]->value->content_3}}.</p>
                                    @endisset
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 d-none d-lg-block">
                        <div class="containDeviceImage">
                            <div class="preview1 animated fadeInRight">
                                @isset($listSlide[2]->value->file)
                                <img src="{{ asset(config('app.img_path')) }}/{{$listSlide[2]->value->file}}" alt="">
                                @endisset
                            </div>
                            <div class="preview2 animated fadeInRight d-none">
                                @isset($listSlide[2]->value->file_1)
                                <img src="{{ asset(config('app.img_path')) }}/{{$listSlide[2]->value->file_1[2]->img}}" alt="">
                                <img src="{{ asset(config('app.img_path')) }}/{{$listSlide[2]->value->file_1[1]->img}}" class="animated flipInX" alt="">
                                <img src="{{ asset(config('app.img_path')) }}/{{$listSlide[2]->value->file_1[0]->img}}" class="animated flipInX" alt="">
                                @endisset
                            </div>

                            <div class="preview3 animated fadeInRight d-none">
                                @isset($listSlide[2]->value->file_1)
                                <img src="{{ asset(config('app.img_path')) }}/{{$listSlide[2]->value->file_1[0]->img}}" alt="">
                                <img src="{{ asset(config('app.img_path')) }}/{{$listSlide[2]->value->file_2[1]->img}}" alt="">
                                <img src="{{ asset(config('app.img_path')) }}/{{$listSlide[2]->value->file_2[2]->img}}" alt="">
                                <img src="{{ asset(config('app.img_path')) }}/{{$listSlide[2]->value->file_2[3]->img}}" alt="">
                                @endisset
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
                    @isset($listSlide[3]->value->slide)
                    @foreach($listSlide[3]->value->slide as $key => $value)    
                    <div class="col-lg-4 col-sm-6 col-6 animated fadeIn">
                        @isset($listSlide[3]->value->slide[$key]->image)
                        <img src="{{ asset(config('app.img_path')) }}/{{$listSlide[3]->value->slide[$key]->image}}" alt="">
                        @endisset
                        <h3>{{ $listSlide[3]->value->slide[$key]->describe }}</h3>
                        <p>{{$listSlide[3]->value->slide[$key]->content}}</p>
                    </div>
                    @endforeach
                    @endisset()
                </div>
            </div>
        </div>
        <div class="section" id="section_4">
            <div class="row">
                <div class="col-md-10 offset-md-1 col-xl-6 offset-xl-3 col-lg-8 offset-lg-2 my-carousel">
                    <div id="testimonial" class=" col-12 col-sm-12 col-md-12 owl-carousel owl-theme">
                        @isset($listSlide[4]->value->carousel)
                        @foreach($listSlide[4]->value->carousel as $key => $carousel)
                        <div class="item">
                            {{$carousel->quote}}
                        </div>
                        @endforeach
                        @endisset
                    </div>
                    @isset($listSlide[4]->value->carousel)
                        <div class="col-12 col-sm-12 col-md-12  control-owl">
                            <div class="owl-pagination">
                                @foreach($listSlide[4]->value->carousel as $key => $carousel)
                                    <div class="owl-page" data-index-page="{{$key + 1}}" style="background-image: url(storage/{{ $carousel->image }})" data-name="{{ $carousel->name }}"></div>
                                @endforeach
                            </div>
                            <div class="owl-button">
                                <div class="owl-prev"></div>
                                <div class="owl-next"></div>
                            </div>
                        </div>
                    @endisset
                </div>
            </div>
        </div>
        <div class="section" id="section_5">
            <div class="container content">
                <div class="row">
                    <div class="d-none d-md-block col-md-5">
                        <div class="heads-blog">
                            @isset($listSlide[5]->value->link_tren)
                            <a href="{{ $listSlide[5]->value->link_tren }}" title="9 INCREDIBLE WAYS TO CUT MONTHLY EXPENSES" target="_blank" class="animated fadeInLeft"
                                @isset($listSlide[5]->value->image->tren)
                                style="background: url(storage/{{ $listSlide[5]->value->image->tren }}) no-repeat center cover";
                                @endisset
                                ></a>
                                @endisset
                                @isset($listSlide[5]->value->link_tren)
                                <a href="{{ $listSlide[5]->value->link_duoi }}" title="06 Best Practical Budgeting Tips from Dave Ramsey" target="_blank" class="animated fadeInLeft"
                                    @isset($listSlide[5]->value->image->duoi)
                                    style="background: url(storage/{{ $listSlide[5]->value->image->duoi }}) no-repeat center cover";
                                    @endisset
                                ></a>
                            @endisset
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-7 khoitrai">
                        <div class="childs-blog">
                            @isset($listSlide[5]->value->blog)
                            @foreach($listSlide[5]->value->blog as $key => $blog)
                            <div class="blog animated fadeInUp">
                                <h4><a href="{{$blog->link}}}">{{$blog->title}}</a></h4>
                                <p><i>{{ $blog->content }}</i></p>
                            </div>
                            @endforeach
                            @endisset
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section" id="section_6">
            <div class="container">
                <div class="row content">
                    <div class="col-md-4 offset-md-4 col-sm-12 col-12 text-center p-0">
                        @isset($listSlide[6]->value->title)
                        <h2 class="getNow p-0">{{ $listSlide[6]->value->title }}</h2>
                        @endisset
                    </div>
                    <div class="col-8 offset-2">
                        <div class="row devices">
                            @isset($listSlide[6]->value->phone)
                            @foreach($listSlide[6]->value->phone as $key => $phone)
                            <div class="col-12 col-sm-12 col-lg-4 text-center">
                                <a href="{{ $phone->link }}" target="_blank">
                                    <img src="storage/{{ $phone->image }}" 
                                    @if($key == 0)
                                    class="animated fadeInLeft android"
                                    @elseif($key == 1)
                                    class="animated fadeIn ios"
                                    @elseif($key == 2)
                                    class="animated fadeInRight winphone"
                                    @endif
                                    >
                                </a>
                            </div>
                            @endforeach
                            @endisset
                        </div>
                    </div>
                    <div class="footer">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-6 col-sm-12 col-md-3 col-12">
                                    @isset($listSetting->address)
                                    <p class="d-none d-lg-block m-0"><strong>Address:</strong> {{$listSetting->address}} | &nbsp;{{ $listSetting->phone}}</p>
                                    @endisset
                                    <p class="m-0">© 2019  Money Lover. All rights reserved.</p>
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
