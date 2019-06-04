@extends('layouts.app')

@section('style')

@endsection

@section('content')
        <div class="row">
        <div class="col-lg-12">

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success')}}
                </div>
            @endif

            <!--begin::Portlet-->
            <div class="m-portlet m-portlet--mobile">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                List Menu
                            </h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                        <ul class="m-portlet__nav">
                            <li class="m-portlet__nav-item">
                                <a href="{{ route('menu.create') }}" class="btn btn-accent m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air">
                                    <span>
                                        <i class="la la-plus"></i>
                                        <span>New Menu</span>
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="m-portlet__body">

                    <!--begin: Datatable -->
                    <table class="table table-striped- table-bordered table-hover table-checkable">
                        <thead>
                            <tr class="text-center">
                                <th>ID</th>
                                <th>Key</th>
                                <th>Value</th>
                                <th>Order</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @isset($listSlide)
                                @foreach($listSlide as $slide)
                                <tr class="text-center">
                                    <td>{{ $slide->id }}</td>
                                    <td><p>{{ $slide->key }}</p></td>
                                    <td><p>{{ $slide->value }}</p></td>
                                    <td>
                                        @isset($slide->order)
                                            <span class="m-badge m-badge--light m-badge--bordered m-badge-bordered--info">{{ $slide->order }}</span>
                                        @endisset
                                    </td>
                                    <td>
                                        <a href="{{ route('slide.edit', ['id' => $slide->id]) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                    </td>
                                    <td>
                                        
                                    </td>
                                </tr>
                                @endforeach
                            @endisset
                        </tbody>
                    </table>
                </div>
            </div>
            <!--end::Portlet-->
        </div>

        </div>

@endsection

@section('script')
    <script>

    </script>
@endsection

