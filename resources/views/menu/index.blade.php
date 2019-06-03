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
                                <th>About Us</th>
                                <th>Privacy Policy</th>
                                <th>Career</th>
                                <th>First Logo</th>
                                <th>Not First Logo</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @isset($listMenu)
                                @foreach($listMenu as $menu)
                                <tr class="text-center">
                                    <td>{{ $menu->id }}</td>
                                    <td><a href="{{ $menu->about_us }}" style="text-decoration: underline;"  target="_blank">{{ $menu->about_us }}</a></td>
                                    <td><a href="{{ $menu->privacy_policy }}" style="text-decoration: underline;"  target="_blank">{{ $menu->privacy_policy }}</a></td>
                                    <td><a href="{{ $menu->career }}" style="text-decoration: underline;"  target="_blank">{{ $menu->career }}</a></td>
                                    <td><img class="" src="{{ asset('storage/' . $menu->first_logo) }}"style="display: inline-block; width: 5rem; height: 5rem;"></td>
                                    <td><img class="" src="{{ asset('storage/' . $menu->not_first_logo) }}" style="display: inline-block; width: 5rem; height: 5rem;"></td>
                                    <td>
                                        <a href="{{ route('menu.edit', ['id' => $menu->id]) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                    </td>
                                    <td>
                                        <form action="{{ route('menu.destroy', ['id' => $menu->id]) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-danger" type="submit"><i class="fas fa-trash-alt"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            @endisset
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

            <!--end::Portlet-->

        </div>

    </div>
@endsection

@section('script')

@endsection
