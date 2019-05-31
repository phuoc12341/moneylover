@extends('layouts.app')

@section('style')
	<link href="bower_components/moneylover-bower/fontawesome-iconpicker/fontawesome-iconpicker.min.css" rel="stylesheet" type="text/css" />
	<link href="css/datatables.bundle.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')
        <div class="row">
        <div class="col-lg-12">
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
							<li class="m-portlet__nav-item"></li>
							<li class="m-portlet__nav-item">
								<div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover" aria-expanded="true">
									<a href="#" class="m-portlet__nav-link btn btn-lg btn-secondary  m-btn m-btn--icon m-btn--icon-only m-btn--pill  m-dropdown__toggle">
										<i class="la la-ellipsis-h m--font-brand"></i>
									</a>
									<div class="m-dropdown__wrapper">
										<span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
										<div class="m-dropdown__inner">
											<div class="m-dropdown__body">
												<div class="m-dropdown__content">
													<ul class="m-nav">
														<li class="m-nav__section m-nav__section--first">
															<span class="m-nav__section-text">Quick Actions</span>
														</li>
														<li class="m-nav__item">
															<a href="" class="m-nav__link">
																<i class="m-nav__link-icon flaticon-share"></i>
																<span class="m-nav__link-text">Create Post</span>
															</a>
														</li>
														<li class="m-nav__item">
															<a href="" class="m-nav__link">
																<i class="m-nav__link-icon flaticon-chat-1"></i>
																<span class="m-nav__link-text">Send Messages</span>
															</a>
														</li>
														<li class="m-nav__item">
															<a href="" class="m-nav__link">
																<i class="m-nav__link-icon flaticon-multimedia-2"></i>
																<span class="m-nav__link-text">Upload File</span>
															</a>
														</li>
														<li class="m-nav__section">
															<span class="m-nav__section-text">Useful Links</span>
														</li>
														<li class="m-nav__item">
															<a href="" class="m-nav__link">
																<i class="m-nav__link-icon flaticon-info"></i>
																<span class="m-nav__link-text">FAQ</span>
															</a>
														</li>
														<li class="m-nav__item">
															<a href="" class="m-nav__link">
																<i class="m-nav__link-icon flaticon-lifebuoy"></i>
																<span class="m-nav__link-text">Support</span>
															</a>
														</li>
														<li class="m-nav__separator m-nav__separator--fit m--hide">
														</li>
														<li class="m-nav__item m--hide">
															<a href="#" class="btn btn-outline-danger m-btn m-btn--pill m-btn--wide btn-sm">Submit</a>
														</li>
													</ul>
												</div>
											</div>
										</div>
									</div>
								</div>
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
									<td>{{ $social->url }}</td>
									<td><i class="{{ $social->icon }}" style="font-size: 3rem;"></i></td>
									<td>
										<a href="{{ route('social.edit', ['id' => $social->id]) }}" class="btn btn-primary" role="button"><i class="fas fa-edit"></i></a>
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
