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
                                Form Update Slide 5
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
                            <div class="row">
                                @for($i = 0; $i < 3; $i++ )
                                <div class="col-4">
                                    <div class="m-form__section m-form__section--first">
                                        <div class="form-group m-form__group">
                                            <label for="example_input_full_name">Personal Name {{ $i + 1 }}</label>
                                            <input type="text" name="carousel[{{ $i }}][name]" class="form-control m-input" placeholder="Enter name" 
                                            @isset($slide->value->carousel[$i]->name) 
                                                value="{{ $slide->value->carousel[$i]->name }}"
                                            @endisset
                                            >
                                        </div>
                                    </div>
                                    <div class="m-form__section m-form__section--first">
                                        <div class="form-group m-form__group">
                                            <label for="example_input_full_name">Quote {{ $i + 1 }}</label>
                                            <input type="text" name="carousel[{{ $i }}][quote]" class="form-control m-input" placeholder="Enter quote"
                                                @isset($slide->value->carousel[$i]->quote) 
                                                    value="{{ $slide->value->carousel[$i]->quote }}"
                                                @endisset
                                            >
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group">
                                        <label>Icon Image {{ $i + 1 }}</label>
                                        <input type="file" name="carousel[{{ $i }}][image]" class="form-control m-input" value="bjgghjghj">
                                    </div>
                                </div>
                                @endfor
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

    </script>
@endsection
