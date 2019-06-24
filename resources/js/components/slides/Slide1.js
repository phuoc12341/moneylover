import React, { Component } from 'react';

class Slide1 extends Component {
    render() {

        let srcImage = "";
        if (typeof window.listSlide[0].value.text_logo != "undefined" && window.listSlide[0].value.text_logo !== null ) {
            srcImage = window.listSlide[0].value.text_logo;
            const image = "src=storage/".concat(srcImage) 
        }
        
        return (
            <div class="section" id="section_0">
                <div id="slide_1">
                    <div class="tren">
                        <div class="content">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-5 col-sm-12 col-12 trai">
                                        <img class="col-12 col-sm-12 col-md-12 animated fadeInUp" image />
                                        <p class="animated fadeInUp">
                                            {window.listSlide[0].value.text_logo !== null &&
                                                window.listSlide[0].value.text_logo
                                            }
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
            </div>
        );
    }
}

export default Slide1;