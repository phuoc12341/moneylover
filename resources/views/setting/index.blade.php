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
                            List Setting
                        </h3>
                    </div>
                </div>
                <div class="m-portlet__head-tools">
                    <ul class="m-portlet__nav">
                        <li class="m-portlet__nav-item">
                            <a href="{{ route('setting.create') }}" class="btn btn-accent m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air">
                                <span>
                                    <i class="la la-plus"></i>
                                    <span>New setting</span>
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
                            <th>Site Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>First Logo</th>
                            <th>Logo From Second</th>
                            <th>Update</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @isset($listSetting)
                        @foreach($listSetting as $item)
                        <tr class="text-center">
                            <td>{{ $item->id }}</td>
                            <td><p class="name">{{ $item->site_name }}</p></td>
                            <td><p>{{ $item->email }}</p></td>
                            <td><p>{{ $item->phone }}</p></td>
                            <td><p>{{ $item->address }}</p></td>
                            <td class="fix_img">
                                <img src="storage/{{ $item->first_logo }}" alt="">
                            </td>
                            <td class="fix_img">
                                <img src="storage/{{ $item->not_first_logo }}" alt="">
                            </td>
                            <td>
                                <a href="{{ route('setting.edit', ['id' => $item->id]) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger show-modal" data-toggle="modal" data-target="#m_modal" data-menu-id="{{ $item->id }}"><i class="fas fa-trash-alt"></i></button>
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

<div class="modal fade" id="m_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title">Delete Setting - </p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Do you really want to delete this setting ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                <form action="{{ route('setting.destroy', ['id' => '']) }}" method="POST">
                    @method('DELETE')   
                    @csrf
                    <button class="btn btn-danger" type="submit">Yes</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script>
    $(document).ready(function() {
        var $baseActionDelete = $('#m_modal').find('form').attr('action');

        $('.show-modal').click(function() {
            let $nameOfMenu = $(this).parents('tr').find('.name');
            $nameOfMenu = $nameOfMenu.text();

            $menuID = $(this).data('menu-id')
            $form = $('#m_modal').find('form')
            $form.attr('action', $baseActionDelete + '/' + $menuID);
            $modalContent = $('#m_modal').find('p.modal-title');
            $modalContent.children().remove();
            $modalContent.append('<span class="m--font-danger">' + $nameOfMenu + '</span>')
        });
    });
</script>
@endsection

