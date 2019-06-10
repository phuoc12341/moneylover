@extends('layouts.app')

@section('style')

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
                                <button class="btn btn-accent m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air addNewBlog">
                                    <span>
                                        <i class="la la-plus"></i>
                                        <span>Add New Blog</span>
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
                            <div class="row">
                                <div class="col-6">
                                    <label>Link 1</label>
                                    <input type="text" name="link_tren" class="form-control m-input" placeholder="Enter link"
                                        @isset($slide->value->link_tren)
                                            value="{{ $slide->value->link_tren }}" 
                                        @endisset
                                    >
                                </div>
                                <div class="col-6">
                                    <div class="form-group m-form__group">
                                        <label>Image 1</label>
                                        <input type="file" name="image[tren]" class="form-control m-input">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label>Link 2</label>
                                    <input type="text" name="link_duoi" class="form-control m-input" placeholder="Enter link"
                                        @isset($slide->value->link_duoi)
                                            value="{{ $slide->value->link_duoi }}" 
                                        @endisset
                                    >
                                </div>
                                <div class="col-6">
                                    <div class="form-group m-form__group">
                                        <label>Image 2</label>
                                        <input type="file" name="image[duoi]" class="form-control m-input">
                                    </div>
                                </div>
                                
                            </div>
                            @isset($slide->value->blog)
                            @foreach($slide->value->blog as $key => $blog)
                            <div class="m-form__section m-form__section--first">
                                <div class="form-group m-form__group">
                                    <label for="example_input_full_name">Blog {{$key + 1}}</label>
                                    <div class="row">
                                        <div class="col-4">
                                            <label>Title</label>
                                            <input type="text" name="blog[{{$key}}][title]" class="form-control m-input" placeholder="Enter Title" 
                                            @isset($blog->title)
                                                value="{{ $blog->title }}"
                                            @endisset
                                            >
                                        </div>
                                        <div class="col-4">
                                            <label>Link</label>
                                            <input type="text" name="blog[{{$key}}][link]" class="form-control m-input" placeholder="Enter Link" 
                                            @isset($blog->link) 
                                                value="{{ $blog->link }}"
                                            @endisset
                                            >
                                        </div>
                                        <div class="col-4">
                                            <label>Content</label>
                                            <input type="text" name="blog[{{$key}}][content]" class="form-control m-input" placeholder="Enter Content" 
                                            @isset($blog->content) 
                                                value="{{ $blog->content }}"
                                            @endisset
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
    <script>
        @if (isset($slide->value->blog))
            $count = {{ count($slide->value->blog) }};
        @else
            $count = 0;
        @endif

        $('.addNewBlog').click(function () {
            $stringBlog = `<div class="m-form__section m-form__section--first">
                                <div class="form-group m-form__group">
                                    <label for="example_input_full_name">Blog ` + ($count + 1) + `</label>
                                    <div class="row">
                                        <div class="col-4">
                                            <label>Title</label>
                                            <input type="text" name="blog[` + $count + `][title]" class="form-control m-input" placeholder="Enter title">
                                        </div>
                                        <div class="col-4">
                                            <label>Link</label>
                                            <input type="text" name="blog[` + $count + `][link]" class="form-control m-input" placeholder="Enter link">
                                        </div>
                                        <div class="col-4">
                                            <label>Content</label>
                                            <input type="text" name="blog[` + $count + `][content]" class="form-control m-input" placeholder="Enter content">
                                        </div>
                                    </div>
                                </div>
                            </div>`;
            $renderButton = $.parseHTML($stringBlog);
            $('.khoi').append($renderButton);
            $count++;
        })
    </script>
@endsection
