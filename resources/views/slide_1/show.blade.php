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
                                <th>Name</th>
                                <th>Link</th>
                                <th>Type</th>
                                <th>Order</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr class="text-center">
                                    <td></td>
                                    <td><p class="name"></p></td>
                                    <td><a href="" style="text-decoration: underline;"  target="_blank"></a></td>

                                        <td><span class="m-badge m-badge--success m-badge--wide">Header</span></td>
                                        <td><span class="m-badge m-badge--brand m-badge--wide">Footer</span></td>

                                    <td>
                                            <span class="m-badge m-badge--light m-badge--bordered m-badge-bordered--info"></span>
                                    </td>
                                    <td>
                                        <a href="" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-danger show-modal" data-toggle="modal" data-target="#m_modal" data-menu-id=""><i class="fas fa-trash-alt"></i></button>

                                    </td>
                                </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!--end::Portlet-->
        </div>

        </div>

        <div class="modal fade" id="m_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <p class="modal-title">Delete Menu - </p>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Do you really want to delete this menu ?</p>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                        <form action="#" method="POST">
                            @method('DELETE')   
                            @csrf
                            <button class="btn btn-danger" type="submit">Yes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

@endsection

