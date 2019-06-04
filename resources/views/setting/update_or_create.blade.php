@extends('layouts.app')

@section('style')

@endsection

@section('content')
        <div class="row">
        <div class="col-lg-12">

            <!--begin::Portlet-->
            <div class="m-portlet">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <span class="m-portlet__head-icon m--hide">
                                <i class="la la-gear"></i>
                            </span>
                            <h3 class="m-portlet__head-text">
                                Form Update Setting 
                            </h3>
                        </div>
                    </div>
                </div>

                <!--begin::Form-->
                <form class="m-form" action="/setting" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="m-portlet__body">
                        <div class="m-form__section m-form__section--first">
                        	@if (isset($setting))
	                            <div class="form-group m-form__group">
	                                <label for="example_input_full_name">Site name:</label>
	                                <input type="text" name="site_name" class="form-control m-input" placeholder="Enter site name" value="{{ $setting->site_name }}">
	                                <span class="m-form__help">Please enter your site name</span>
	                            </div>
	                            <div class="form-group m-form__group">
	                                <label>Email address:</label>
	                                <input type="email" name="email" class="form-control m-input" placeholder="Enter email" value="{{ $setting->email }}">
	                                <span class="m-form__help">We'll never share your email with anyone else</span>
	                            </div>
	                            <div class="form-group m-form__group">
	                                <label>Phone:</label>
	                                <input type="text" name="phone" class="form-control m-input" placeholder="Enter phone" value="{{ $setting->phone }}">
	                            </div>
	                            <div class="form-group m-form__group">
	                                <label>Address:</label>
	                                <input type="text" name="address" class="form-control m-input" placeholder="Enter address" value="{{ $setting->address }}">
	                            </div>
	                            <div class="form-group m-form__group">
	                                <label>Logo:</label>
	                                <input type="file" name="logo" class="form-control m-input">
	                            </div>
	                        @else
	                        	<div class="form-group m-form__group">
	                                <label for="example_input_full_name">Site name:</label>
	                                <input type="text" name="site_name" class="form-control m-input" placeholder="Enter site name">
	                                <span class="m-form__help">Please enter your site name</span>
	                            </div>
	                            <div class="form-group m-form__group">
	                                <label>Email address:</label>
	                                <input type="email" name="email" class="form-control m-input" placeholder="Enter email">
	                                <span class="m-form__help">We'll never share your email with anyone else</span>
	                            </div>
	                            <div class="form-group m-form__group">
	                                <label>Phone:</label>
	                                <input type="text" name="phone" class="form-control m-input" placeholder="Enter phone">
	                            </div>
	                            <div class="form-group m-form__group">
	                                <label>Address:</label>
	                                <input type="text" name="address" class="form-control m-input" placeholder="Enter address">
	                            </div>
	                            <div class="form-group m-form__group">
	                                <label>Logo:</label>
	                                <input type="file" name="logo" class="form-control m-input">
	                            </div>
	                        @endif
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

@endsection
