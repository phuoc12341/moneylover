@extends('layouts.app')

@section('style')

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
                                    <label for="example_input_full_name">Name</label>
                                    <input type="text" name="name" class="form-control m-input" placeholder="Enter name" value="{{ old('name') }}">
                                </div>
                            </div>
                            <div class="m-form__section m-form__section--first">
                                <div class="form-group m-form__group">
                                    <label for="example_input_full_name">URL for name</label>
                                    <input type="text" name="link" class="form-control m-input" value="{{ old('link') }}" placeholder="Enter URL for Privacy Policy">
                                </div>
                            </div>
                            <div class="m-form__group form-group">
                                <label>Type</label>
                                <div class="m-radio-list">
                                    <label class="m-radio m-radio--state-success">
                                        <input type="radio" name="type" value="{{ config('custom.menu.header_menu') }}" checked> Header Menu
                                        <span></span>
                                    </label>
                                    <label class="m-radio m-radio--state-brand">
                                        <input type="radio" name="type" value="{{ config('custom.menu.footer_menu') }}"> Footer Menu
                                        <span></span>
                                    </label>
                                </div>
                            </div>
                            <div class="m-form__section m-form__section--first">
                                <div class="form-group m-form__group">
                                    <label for="example_input_full_name">Order</label>
                                    <input type="number" name="order" class="form-control m-input" value="{{ old('order') }}" placeholder="Optional: Enter order of menu">
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

@endsection
