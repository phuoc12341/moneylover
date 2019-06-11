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
                            Edit Content Slide 3
                        </h3>
                    </div>
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
                                <input type="text" name="key" class="form-control m-input" readonly="true" value="{{ $slide->key }}" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="m-form__section m-form__section--first col-lg-6">
                                <div class="form-group m-form__group">
                                    <label for="example_input_full_name">Describe 1</label><span class="text-danger"> *</span>
                                    <textarea class="form-control" name="describe_1">@if(isset($slide->value->describe_1)){{ $slide->value->describe_1 }}@endif</textarea>
                                </div>
                            </div>
                            <div class="m-form__section m-form__section--first col-lg-6">
                                <div class="form-group m-form__group">
                                    <label for="example_input_full_name">Content 1</label><span class="text-danger"> *</span>
                                    <textarea class="form-control" name="content_1">@if(isset($slide->value->content_1)){{ $slide->value->content_1 }}@endif</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="m-form__section m-form__section--first">
                            <div class="form-group m-form__group">
                                <label for="example_input_full_name">Image for content 1</label><span class="text-danger"> *</span>
                                <input type="file" name="file" class="form-control m-input" placeholder="Enter Link" value="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="m-form__section m-form__section--first col-lg-6">
                                <div class="form-group m-form__group">
                                    <label for="example_input_full_name">Describe 2</label><span class="text-danger"> *</span>
                                    <textarea class="form-control" name="describe_2">@if(isset($slide->value->describe_2)){{ $slide->value->describe_2 }}@endif</textarea>
                                </div>
                            </div>
                            <div class="m-form__section m-form__section--first col-lg-6">
                                <div class="form-group m-form__group">
                                    <label for="example_input_full_name">Content 2</label><span class="text-danger"> *</span>
                                    <textarea class="form-control" name="content_2">@if(isset($slide->value->content_2)){{ $slide->value->content_2 }}@endif</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="m-form__section m-form__section--first">
                            <div class="form-group m-form__group">
                                <label for="example_input_full_name">Image for content 2</label><span class="text-danger"> *</span>
                                <input type="file" name="file_1[]" class="form-control m-input" multiple>
                            </div>
                        </div>
                        <div class="row">
                            <div class="m-form__section m-form__section--first col-lg-6">
                                <div class="form-group m-form__group">
                                    <label for="example_input_full_name">Describe 3</label><span class="text-danger"> *</span>
                                    <textarea class="form-control" name="describe_3">@if(isset($slide->value->describe_3)){{ $slide->value->describe_3 }}@endif</textarea>
                                </div>
                            </div>
                            <div class="m-form__section m-form__section--first col-lg-6">
                                <div class="form-group m-form__group">
                                    <label for="example_input_full_name">Content 3</label><span class="text-danger"> *</span>
                                    <textarea class="form-control" name="content_3">@if(isset($slide->value->content_3)){{ $slide->value->content_3 }}@endif</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="m-form__section m-form__section--first">
                            <div class="form-group m-form__group">
                                <label for="example_input_full_name">Image for content 3</label><span class="text-danger"> *</span>
                                <input type="file" name="file_2[]" class="form-control m-input" multiple>
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
<script> CKEDITOR.replace('edit-ckeditor'); </script>
@endsection

