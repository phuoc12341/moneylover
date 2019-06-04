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
                                Form Create Social 
                            </h3>
                        </div>
                    </div>
                </div>

                <!--begin::Form-->
                <form class="m-form" action="{{ route('social.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="m-portlet__body">
                        <div class="khoi" data-index=1>
                            <div class="m-form__section m-form__section--first">
                                <div class="form-group m-form__group">
                                    <label for="example_input_full_name">URL:</label>
                                    <input type="text" name="url" class="form-control m-input" placeholder="Enter URL" value="{{ old('url') }}">
                                </div>
                            </div>
                            <div class="m-form__section m-form__section--first">
                                <div class="form-group m-form__group">
                                    <label for="example_input_full_name">Icon:</label>
                                    <input type="text" name="icon" class="form-control m-input" value="{{ old('icon') }}">
                                </div>
                            </div>
                            <div class="btn-group">
                                <button data-selected="graduation-cap" type="button" class="icp iconpicker btn btn-default dropdown-toggle iconpicker-component float-right" data-toggle="dropdown">Icon
                                    <i class="fa fa-fw"></i>
                                    <span class="caret"></span>
                                </button>
                                <div class="dropdown-menu"></div>
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
