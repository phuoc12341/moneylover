@extends('layouts.app')

@section('style')
    <link href="bower_components/moneylover-bower/fontawesome-iconpicker/fontawesome-iconpicker.min.css" rel="stylesheet" type="text/css" />
    <link href="css/datatables.bundle.css" rel="stylesheet" type="text/css" />
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
                                List Social
                            </h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                        <ul class="m-portlet__nav">
                            <li class="m-portlet__nav-item">
                                <a href="{{ route('social.create') }}" class="btn btn-accent m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air">
                                    <span>
                                        <i class="la la-plus"></i>
                                        <span>New Social</span>
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
                                <th>URL</th>
                                <th>Icon</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @isset($listSocial)
                                @foreach($listSocial as $social)
                                <tr class="text-center">
                                    <td>{{ $social->id }}</td>
                                    <td><a href="{{ $social->url }}" style="text-decoration: underline;"  target="_blank">{{ $social->url }}</a></td>
                                    <td><i class="{{ $social->icon }}" style="font-size: 3rem;"></i></td>
                                    <td>
                                        <a href="{{ route('social.edit', ['id' => $social->id]) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                    </td>
                                    <td>
                                        <form action="{{ route('social.destroy', ['id' => $social->id]) }}" method="POST">
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
    <script src="bower_components/moneylover-bower/fontawesome-iconpicker/fontawesome-iconpicker.js" type="text/javascript"></script>
    <script src="js/basic.js" type="text/javascript"></script>
    <script src="js/datatables.bundle.js" type="text/javascript"></script>
    <script>
        $(".iconpicker").iconpicker({
            placement: 'bottomLeft',
            animation: true,
            hideOnSelect: true,
            inputSearch: true,
        });


        $('.iconpicker').on('iconpickerSelected', function(event){
            $icon = $(this).find("i").attr('class');
            $iconInput = $(this).parent().prev().find("input[name='icon']");
            $iconInput.val($icon);
        });

    </script>
@endsection
