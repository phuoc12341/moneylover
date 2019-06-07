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
                            Edit Content Slide 2
                        </h3>
                    </div>
                </div>
            </div>

            <!--begin::Form-->
            <form class="m-form" action="{{ route('slide.update', ['id' => $slide->id]) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="m-portlet__body">
                    <div class="khoi" data-index=1>
                        <div class="m-form__section m-form__section--first">
                            <div class="form-group m-form__group">
                                <label for="example_input_full_name">Key</label>
                                <input type="text" name="key" class="form-control m-input" readonly="true" value="{{ $slide->key }}">
                            </div>
                        </div>
                        <div class="m-form__section m-form__section--first">
                            <div class="form-group m-form__group">
                                <label for="example_input_full_name">Describe</label>
                                <input type="text" name="describe" class="form-control m-input" placeholder="Enter Describe" @isset($slide->value->describe) value="{{ $slide->value->describe }}" @endisset>
                            </div>
                        </div>
                        <div class="m-form__section m-form__section--first">
                            <div class="form-group m-form__group">
                                <label for="example_input_full_name">Content</label>
                                <textarea class="form-control" id="summary-ckeditor" name="content">{{ $slide->value->content }}</textarea>
                            </div>
                        </div>
                        <div class="m-form__section m-form__section--first">
                            <div class="form-group m-form__group">
                                <label for="example_input_full_name">Link YouTube</label>
                                <input type="text" name="url_youtube" class="form-control m-input" placeholder="Enter Link" value="{{ $slide->value->url_youtube }}">
                            </div>
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
<script src="{{ asset('bower_components/moneylover-bower/ckeditor/ckeditor.js') }}"></script>
<script> CKEDITOR.replace('summary-ckeditor'); </script>
@endsection
