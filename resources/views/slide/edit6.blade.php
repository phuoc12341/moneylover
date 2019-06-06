@extends('layouts.app')

@section('style')
    <link href="bower_components/moneylover-bower/fontawesome-iconpicker/fontawesome-iconpicker.min.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')
        <div class="row">
        <div class="col-lg-12">
            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!--begin::Portlet-->
            <div class="m-portlet">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <span class="m-portlet__head-icon m--hide">
                                <i class="la la-gear"></i>
                            </span>
                            <h3 class="m-portlet__head-text">
                                Form Update Slide 6
                            </h3>
                        </div>
                    </div>

                    <div class="m-portlet__head-tools">
                        <ul class="m-portlet__nav">
                            <li class="m-portlet__nav-item">
                                <button class="btn btn-accent m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air addNewButton">
                                    <span>
                                        <i class="la la-plus"></i>
                                        <span>Add New Button</span>
                                    </span>
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>

                <!--begin::Form-->
                <form class="m-form" action="{{ route('slide.update', ['id' => $slide->id]) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="m-portlet__body">
                        <div class="khoi" data-index=1>
                            <div class="m-form__section m-form__section--first">
                                <div class="form-group m-form__group">
                                    <label for="example_input_full_name">Key</label>
                                    <input type="text" name="key" class="form-control m-input" placeholder="Enter key" value="{{ $slide->key }}">
                                </div>
                            </div>
                            <div class="form-group m-form__group">
                                <label>Text Logo:</label>
                                <input type="file" name="text_logo" class="form-control m-input">
                            </div>
                            <div class="m-form__section m-form__section--first">
                                <div class="form-group m-form__group">
                                    <label for="example_input_full_name">Intro Text:</label>
                                    <input type="text" name="intro" class="form-control m-input" placeholder="Enter intro"
                                    @isset($slide->value->intro) 
                                        value="{{ $slide->value->intro }}"
                                    @endisset
                                    >
                                </div>
                            </div>
                            <div class="form-group m-form__group">
                                <label>Intro Image 1</label>
                                <input type="file" name="image[]" class="form-control m-input" value="bjgghjghj">
                            </div>
                            <div class="form-group m-form__group">
                                <label>Intro Image 2</label>
                                <input type="file" name="image[]" class="form-control m-input">
                            </div>
                            <div class="form-group m-form__group">
                                <label>Intro Image 3</label>
                                <input type="file" name="image[]" class="form-control m-input">
                            </div>
                            @isset($slide->value->buttons)
                            @foreach($slide->value->buttons as $key => $button)
                            <div class="m-form__section m-form__section--first">
                                <div class="form-group m-form__group">
                                    <label for="example_input_full_name">Button {{$key + 1}}</label>
                                    <div class="row">
                                        <div class="col-3">
                                            <label>Text</label>
                                            <input type="text" name="buttons[{{$key}}][text]" class="form-control m-input" placeholder="Enter intro" 
                                            @isset($button->text)    
                                                value="{{ $button->text }}"
                                            @endisset
                                            >
                                        </div>
                                        <div class="col-3">
                                            <label>Color</label>
                                            <input type="color" name="buttons[{{$key}}][color]" class="form-control m-input" placeholder="Enter intro" 
                                            @isset($button->color) 
                                                value="{{ $button->color }}"
                                            @endisset
                                            >
                                        </div>
                                        <div class="col-3">
                                            <label>Link</label>
                                            <input type="text" name="buttons[{{$key}}][link]" class="form-control m-input" placeholder="Enter intro" 
                                            @isset($button->link) 
                                                value="{{ $button->text }}"
                                            @endisset
                                            >
                                        </div>
                                        <div class="col-3">
                                            <div class="btn-group">
                                                <button data-selected="graduation-cap" type="button" class="icp iconpicker btn btn-default dropdown-toggle iconpicker-component float-right" data-toggle="dropdown">Icon
                                                    <i class="fa fa-fw"></i>
                                                    <span class="caret"></span>
                                                </button>
                                                <div class="dropdown-menu"></div>
                                            </div>
                                            <input type="text" name="buttons[{{$key}}][icon]" class="form-control m-input" placeholder="Select icon" 
                                            @if(isset($button->icon))
                                                value="{{ $button->icon }}"
                                            @endif
                                            >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @endisset
                        </div>
                    </div>
                    <div class="m-portlet__foot m-portlet__foot--fit">
                        <div class="m-form__actions m-form__actions">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="reset" class="btn btn-secondary">Cancel</button>
                        </div>
                    </div>
                </form>

                <!--end::Form-->
            </div>

            <!--end::Portlet-->

        </div>
    </div>
@endsection

@section('script')
    <script src="bower_components/moneylover-bower/fontawesome-iconpicker/fontawesome-iconpicker.js" type="text/javascript"></script>

    <script>
        $(".iconpicker").iconpicker({
            placement: 'bottomLeft',
            animation: true,
            hideOnSelect: true,
            inputSearch: true,
        });


        $('.iconpicker').on('iconpickerSelected', function(event){
            $icon = $(this).find("i").attr('class');
            $iconInput = $(this).parent().next("input");
            $iconInput.val($icon);
        });

        @if (isset($slide->value->buttons))
            $count = {{ count($slide->value->buttons) }};
        @else
            $count = 0;
        @endif

        $('.addNewButton').click(function () {
            $stringButton = `<div class="m-form__section m-form__section--first">
                                <div class="form-group m-form__group">
                                    <label for="example_input_full_name">Button ` + ($count + 1) + `</label>
                                    <div class="row">
                                        <div class="col-3">
                                            <label>Text</label>
                                            <input type="text" name="buttons[` + $count + `][text]" class="form-control m-input" placeholder="Enter text">
                                        </div>
                                        <div class="col-3">
                                            <label>Color</label>
                                            <input type="color" name="buttons[` + $count + `][color]" class="form-control m-input" placeholder="Enter color">
                                        </div>
                                        <div class="col-3">
                                            <label>Link</label>
                                            <input type="text" name="buttons[` + $count + `][link]" class="form-control m-input" placeholder="Enter link">
                                        </div>
                                        <div class="col-3">
                                            <div class="btn-group">
                                                <button data-selected="graduation-cap" type="button" class="icp iconpicker btn btn-default dropdown-toggle iconpicker-component float-right" data-toggle="dropdown">Icon
                                                    <i class="fa fa-fw"></i>
                                                    <span class="caret"></span>
                                                </button>
                                                <div class="dropdown-menu"></div>
                                            </div>
                                            <input type="text" name="buttons[` + $count + `][icon]" class="form-control m-input" placeholder="Select icon">
                                        </div>
                                    </div>
                                </div>
                            </div>`;
            $renderButton = $.parseHTML($stringButton);
            $('.khoi').append($renderButton);
            $count++;
            $(".iconpicker").iconpicker({
                placement: 'bottomLeft',
                animation: true,
                hideOnSelect: true,
                inputSearch: true,
            });
            $('.iconpicker').on('iconpickerSelected', function(event){
                $icon = $(this).find("i").attr('class');
                $iconInput = $(this).parent().next("input");
                $iconInput.val($icon);
            });
        })
    </script>
@endsection
