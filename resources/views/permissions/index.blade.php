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
							List permission
						</h3>
					</div>
				</div>
				<div class="m-portlet__head-tools">
					<ul class="m-portlet__nav">
						<li class="m-portlet__nav-item">
							<a href="{{ route('permission.create') }}" class="btn btn-accent m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air">
								<span>
									<i class="la la-plus"></i>
									<span>New permission</span>
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
							<th>Update</th>
							<th>Delete</th>
						</tr>
					</thead>
					<tbody>
						@isset($permissions)
						@foreach($permissions as $menu)
						<tr class="text-center">
							<td>{{ $menu->id }}</td>
							<td><p class="name"><a href="">{{ $menu->name }}</a></p></td>
							<td>
								<a href="{{ route('menu.edit', ['id' => $menu->id]) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
							</td>
							<td>
								<button type="button" class="btn btn-danger show-modal" data-toggle="modal" data-target="#m_modal" data-menu-id="{{ $menu->id }}"><i class="fas fa-trash-alt"></i></button>
							</td>
						</tr>
						@endforeach
						@endisset
					</tbody>
				</table>
			</div>
		</div>
		<!--end::Portlet-->


		<!--begin::Portlet-->
		<div class="m-portlet">
			<div class="m-portlet__head">
				<div class="m-portlet__head-caption">
					<div class="m-portlet__head-title">
						<span class="m-portlet__head-icon m--hide">
							<i class="la la-gear"></i>
						</span>
						<h3 class="m-portlet__head-text">
							Select Permission For Role
						</h3>
					</div>
				</div>
			</div>

			<!--begin::Form-->
			<form class="m-form" action="{{ route('permission.set_permission') }}" method="POST">
				@csrf
				<div class="m-portlet__body">
					<div class="khoi" data-index=1>
						<select name="role_id" class="browser-default custom-select">
							@foreach ($roles as $item)
							<option 
							value="{{ $item->id}}">{{ $item->name}}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="m-portlet__body">
					<div class="khoi" data-index=1>
						<div class="form-check form-check-inline">
							@foreach($permissions as $item)
							<input class="form-check-input" type="checkbox" name="permission_id[]" value="{{ old('id',$item->id) }}">
							<label class="form-check-label" for="inlineCheckbox1">{{ $item->name }}</label>&nbsp;&nbsp;
							@endforeach
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
				<form action="{{ route('menu.destroy', ['id' => '']) }}" method="POST">
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

