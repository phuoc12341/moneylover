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
                                Form Create Social 
                            </h3>
                        </div>
                    </div>
                </div>

                <!--begin::Form-->
                <form class="m-form" action="{{ route('menu.update', $menu->id) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="m-portlet__body">
                        <div class="khoi" data-index=1>
                            <div class="m-form__section m-form__section--first">
                                <div class="form-group m-form__group">
                                    <label for="example_input_full_name">Name</label>
                                    <input type="text" name="name" class="form-control m-input" placeholder="Enter name" value="{{ $menu->name }}">
                                </div>
                            </div>
                            <div class="m-form__section m-form__section--first">
                                <div class="form-group m-form__group">
                                    <label for="example_input_full_name">Link URL for name</label>
                                    <input type="text" name="link" class="form-control m-input" value="{{ $menu->link }}" placeholder="Enter Link URL for Name">
                                </div>
                            </div>
                            <div class="m-form__group form-group">
                                <label>Type</label>
                                <div class="m-radio-list">
                                    <label class="m-radio m-radio--state-success">
                                        <input type="radio" name="type" value="{{ config('custom.menu.header_menu') }}" id="header-menu"> Header Menu
                                        <span></span>
                                    </label>
                                    <label class="m-radio m-radio--state-brand">
                                        <input type="radio" name="type" value="{{ config('custom.menu.footer_menu') }}" id="footer-menu"> Footer Menu
                                        <span></span>
                                    </label>
                                </div>
                            </div>
                            <div class="m-form__section m-form__section--first">
                                <div class="form-group m-form__group">
                                    <label for="example_input_full_name">Order</label>
                                    <input type="number" name="order" class="form-control m-input" placeholder="Optional: Enter order of menu"
                                        @isset($menu->order)
                                            value="{{ $menu->order }}"
                                        @endisset
                                    >
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
    <script>
        var typeMenu = {!! $menu->type !!}
        if (typeMenu == 0) {
            $("#header-menu").attr('checked', 'checked')
        } else if (typeMenu == 1) {
            $("#footer-menu").attr('checked', 'checked')
        }
    </script>
@endsection
