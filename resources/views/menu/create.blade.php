@extends('layouts.app')

@section('style')
    <link href="bower_components/moneylover-bower/fontawesome-iconpicker/fontawesome-iconpicker.min.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')
        <div class="row">
        <div class="col-lg-12">
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
                                Form Create Menu 
                            </h3>
                        </div>
                    </div>
                </div>

                <!--begin::Form-->
                <form class="m-form" action="{{ route('menu.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="m-portlet__body">
                        <div class="khoi" data-index=1>
                            <div class="m-form__section m-form__section--first">
                                <div class="form-group m-form__group">
                                    <label for="example_input_full_name">URL for About us:</label>
                                    <input type="text" name="about_us" class="form-control m-input" placeholder="Enter URL for About" value="{{ old('about_us') }}">
                                </div>
                            </div>
                            <div class="m-form__section m-form__section--first">
                                <div class="form-group m-form__group">
                                    <label for="example_input_full_name">URL for Privacy Policy:</label>
                                    <input type="text" name="privacy_policy" class="form-control m-input" value="{{ old('privacy_policy') }}" placeholder="Enter URL for Privacy Policy">
                                </div>
                            </div>
                            <div class="m-form__section m-form__section--first">
                                <div class="form-group m-form__group">
                                    <label for="example_input_full_name">URL for Career:</label>
                                    <input type="text" name="career" class="form-control m-input" value="{{ old('career') }}" placeholder="Enter URL for Career">
                                </div>
                            </div>
                            <div class="form-group m-form__group">
                                <label>Image for First Slide:</label>
                                <input type="file" name="first_logo" class="form-control m-input">
                            </div>
                            <div class="form-group m-form__group">
                                <label>Image for Not First Slide:</label>
                                <input type="file" name="not_first_logo" class="form-control m-input">
                            </div>
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
            $iconInput = $(this).parent().prev().find("input[name='icon']");
            $iconInput.val($icon);
        });
    </script>
@endsection
